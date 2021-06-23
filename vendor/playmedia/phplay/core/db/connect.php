<?php
/**
 * PHPlay Framework.
 *
 * Database connection class (Use PDO)
 *
 * BUG : PDO is bugged with unbuffered queries with multiple SQL statements (depending on PHP version)
 *       Only one SQL statement per query fix the problem
 *
 * TODO : set Fetch mode method
 * TODO : way to disable database error log ???
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_connect
{
    private $config,
        $pdo = null,
        $identifier,
        $driver_options;

    /**
     * Constructor.
     *
     * @param ppl_var $config         application configuration
     * @param string  $identifier     database connection unique identifier
     * @param array   $driver_options optional driver-specific connection options
     */
    public function __construct(ppl_var $config, $identifier, $driver_options = array())
    {
        $this->config = $config;
        $this->identifier = $identifier;

        // Add default timeout if none set
        if (!isset($driver_options[PDO::ATTR_TIMEOUT])) {
            $driver_options[PDO::ATTR_TIMEOUT] = $config->db->$identifier->timeout;
        }
        $this->driver_options = $driver_options;
    }

    /**
     * Check if application is in dev mode.
     *
     * @return bool TRUE if dev mode, otherwise FALSE
     */
    private function is_dev()
    {
        return $this->config->application->report_level > 1;
    }

    /**
     * Check if connected to database.
     *
     * @return bool TRUE if connected, otherwise FALSE
     */
    public function connected()
    {
        return $this->pdo !== null;
    }

    /**
     * Connect to database.
     *
     * @throws DbException on error
     *
     * @param $string $force_id forced database identifier
     *
     * @return this object
     */
    public function connect($force_id = null)
    {
        if (!$this->connected()) {
            try {
                // Seek database connection configuration
                $id = ($force_id === null) ? $this->identifier : $force_id;
                $db = $this->config->db->$id;
                // Try to connect to database (create PDO object)
                $this->pdo = new PDO($db->dsn, $db->username, $db->password, $this->driver_options);
                //$this->pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
            } catch (PDOException $e) {
                // Try failover if set and exists
                if (isset($db->failover)) {
                    $fo = $db->failover;
                    if (isset($this->config->db->$fo)) {
                        $this->error_log("Connection failed to '{$id}', trying failover '{$db->failover}'");

                        return $this->connect($db->failover);
                    }
                }
                // PDOException Message may contains full database connection details
                $msg = ($this->is_dev() === true) ? $e->getMessage() : "Connection failed to database '{$this->identifier}'";
                throw new DbException($msg, $e->getCode());
            }
        }

        return $this;
    }

    /**
     * Disconnect from database.
     */
    public function disconnect()
    {
        if ($this->connected()) {
            $this->pdo = null;
        }
    }

    /**
     * Get Database PDO object.
     *
     * @return PDO Database PDO object
     */
    public function get_pdo()
    {
        return $this->connect()->pdo;
    }

    /**
     * Executes an SQL statement
     * (returning a result set as an associative array).
     *
     * @param string $sql SQL Statement
     *
     * @return mixed the query result or FALSE on failure
     *
     * @throws DbException
     */
    public function query($sql)
    {
        $pso = $this->connect()->pdo->query($sql);
        if ($pso !== false) {
            return $pso->fetchAll(PDO::FETCH_ASSOC);
            /*
             $results = $pso->fetchAll(PDO::FETCH_ASSOC);
            $pso->closeCursor();
            $pso = NULL;
            return $results;
            */
        }
        $this->trigger_db_exception();

        return false;
    }

    /**
     * Executes an SQL statement
     * (returning the number of affected rows).
     *
     * Note : this method cannot be used with any queries that return results. (SELECT, OPTIMIZE TABLE, etc...)
     *
     * @param string $sql SQL Statement
     *
     * @return mixed the number of affected rows or FALSE on failure
     *
     * @throws DbException
     */
    public function exec($sql)
    {
        $count = $this->connect()->pdo->exec($sql);
        if ($count !== false) {
            return $count;
        }
        $this->trigger_db_exception();

        return false;
    }

    /**
     * Returns the ID of the last inserted row or sequence value.
     *
     * @see PDO documentation
     *
     * @param string $name Name of the sequence object from which the ID should be returned
     *
     * @return string row ID of the last row that was inserted into the database or last value retrieved from the specified sequence object
     *
     * @throws DbException
     */
    public function last_insert_id($name = null)
    {
        if ($this->connected() === false) {
            $this->trigger_db_exception("last_insert_id failed (not connected to database '{$this->identifier}')");

            return; // TODO : return empty string ?
        }

        return $this->pdo->lastInsertId($name); // May trigger IM001 SQLSTATE if PDO driver does not support this capability
    }

    /**
     * Query current database and return database name.
     *
     * @see MySQL documentation
     *
     * @return string the current connected database name, otherwise NULL on error
     *
     * @throws DbException
     */
    public function get_current_dbname()
    {
        $row = $this->query('SELECT DATABASE() AS `dbname`');
        if (($row !== false) && isset($row[0]['dbname'])) {
            return $row[0]['dbname'];
        }

        return;
    }

    /**
     * Log database query error and may trigger a DbException.
     *
     * @param string $msg error message
     *
     * @throws DbException
     */
    private function trigger_db_exception($msg = null)
    {
        if ($msg === null) {
            $e = $this->pdo->errorInfo();
            $msg = "'{$this->identifier}' Database Query Error - {$e[0]}";
            if (count($e) === 3) {
                $msg .= " ({$e[1]}) : {$e[2]}";
            }
        }
        if ($this->is_dev()) {
            throw new DbException($msg);
        }
        $this->error_log($msg);
    }

    /**
     * Write a message to database error log.
     *
     * @param string $message the error message
     */
    public function error_log($message)
    {
        ppl_log::write('database', $message);
    }

    private function __clone()
    {
    }
}
