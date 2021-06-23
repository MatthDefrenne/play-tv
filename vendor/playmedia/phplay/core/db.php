<?php
/**
 * PHPlay Framework.
 *
 * Database helper class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.3
 */
final class ppl_db
{
    private $config,
        $sql = null,
        $generator = null,
        $current = null,
        $dbc = array();

    /**
     * Constructor.
     *
     * @param ppl_var $config application configuration
     */
    public function __construct(ppl_var $config)
    {
        $this->config = $config;
        if ($config->db !== null) {
            // read database configuration

            foreach ($config->db as $identifier => &$db) {
                if (!isset($this->current)) {
                    $this->current = $identifier;
                }
                $this->__add($identifier);
            }
        }
    }

    /**
     * Add a database connection object.
     *
     * @param string $identifier     database unique identifier
     * @param array  $driver_options optional driver-specific connection options
     */
    private function __add($identifier, $driver_options = null)
    {
        if (isset($this->dbc[$identifier])) {
            throw new DbException("Db identifier '{$identifier}' already exists");
        }
        if (($driver_options !== null) && !is_array($driver_options)) {
            throw new DbException("Driver options for db '{$identifier}' must be an associative array");
        }
        $this->dbc[$identifier] = new ppl_db_connect($this->config, $identifier, $driver_options);
    }

    /**
     * Add a database connection to runtime configuration.
     *
     * @param string $identifier     database unique identifier
     * @param string $dsn            data source name
     * @param string $username       optional user name for DSN string
     * @param string $password       optional password for DSN string
     * @param array  $driver_options optional driver-specific connection options
     */
    public function add($identifier, $dsn, $username = null, $password = null, $driver_options = null)
    {
        // Check if database identifier already exist in application configuration
        if (isset($this->config->db->$identifier)) {
            throw new DbException("Db identifier '{$identifier}' already exists in application configuration");
        }
        // Add database configuration to runtime application configuration
        $this->config->db->set(array($identifier => array('dsn' => $dsn, 'username' => $username, 'password' => $password)));
        // Add database connection
        $this->__add($identifier, $driver_options);
    }

    /**
     * Set current database.
     *
     * @param string $identifier         database unique identifier
     * @param bool   $disconnect_current disconnect current database if set to TRUE
     *
     * @return mixed this object
     */
    public function set($identifier, $disconnect_current = false)
    {
        if (!isset($this->dbc[$identifier])) {
            throw new DbException("Db identifier '{$identifier}' does not exists");
        }
        if ($disconnect_current === true) {
            $this->dbc[$this->current]->disconnect();
        }
        $this->current = $identifier;

        return $this;
    }

    /**
     * Get current database.
     *
     * @return string database unique identifier
     */
    public function get()
    {
        return $this->current;
    }

    /**
     * Get current database connection object.
     *
     * @return ppl_db_connect current database connection object
     */
    public function get_connection()
    {
        if (!isset($this->dbc[$this->current])) {
            throw new DbException('No database configured');
        }

        return $this->dbc[$this->current];
    }

    /**
     * Property getter overloader
     * Used for lazy loading and read only public property.
     *
     * @param string $name property name
     *
     * @return mixed property value
     */
    public function __get($name)
    {
        switch ($name) {
            case 'sql':
                if (!isset($this->sql)) {
                    $this->sql = new ppl_db_sql(); // SQL Builder Object
                }

                return $this->sql;

            case 'generator':
                if (!isset($this->generator)) {
                    $this->generator = new ppl_db_model_generator($this); // Model Generator Object
                }

                return $this->generator;
        }
    }

    /**
     * Property setter overloader
     * Used for read only public property.
     *
     * @param string $name property name
     *
     * @return mixed property value
     */
    public function __set($name, $value)
    {
        switch ($name) {
            case 'sql':
            case 'generator':
                throw new DbException("Db property '{$name}' is read only");
        }
    }

    /**
     * Execute a Query with current DB connection
     * (Result vary with type of sql statement).
     *
     * @param ppl_db_sql_base $sql SQL Statement Object
     *
     * @return mixed the query result
     */
    public function execute(ppl_db_sql_base $sql)
    {
        if (get_class($sql) === 'ppl_db_sql_select') {
            return $this->get_connection()->query($sql->get_sql());
        }

        return $this->get_connection()->exec($sql->get_sql());
    }

    /**
     * Alias to current connection query() method
     * (Only single statement query, or you will get an 2014 error).
     *
     * @see query() method in ppl_db_connect
     *
     * @param string $sql SQL Statement
     *
     * @return mixed the query result or FALSE on failure
     *
     * @throws DbException
     */
    public function query($sql)
    {
        if (!is_string($sql) || $sql === '') {
            return false;
        }

        return $this->get_connection()->query($sql);
    }

    /**
     * Alias to current connection exec() method.
     *
     * Note : this method cannot be used with any queries that return results. (SELECT, OPTIMIZE TABLE, etc...)
     *
     * @see exec() method in ppl_db_connect
     *
     * @param string $sql SQL Statement
     *
     * @return mixed the number of affected rows or FALSE on failure
     *
     * @throws DbException
     */
    public function exec($sql)
    {
        if (!is_string($sql) || $sql === '') {
            return false;
        }

        return $this->get_connection()->exec($sql);
    }

    /**
     * Returns the ID of the last inserted row or sequence value.
     *
     * @see PDO documentation
     *
     * @throws DbException
     *
     * @param string $name Name of the sequence object from which the ID should be returned
     *
     * @return string row ID of the last row that was inserted into the database or last value retrieved from the specified sequence object
     */
    public function last_insert_id($name = null)
    {
        return $this->get_connection()->last_insert_id($name);
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
        return $this->get_connection()->get_current_dbname();
    }

    /**
     * Return the PDO object of the current database connection
     * (Alias on ppl_db_connect::get_pdo()).
     *
     * @return PDO the PDO object
     */
    public function get_pdo()
    {
        return $this->get_connection()->get_pdo();
    }

    /**
     * Initiates a transaction.
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function transaction()
    {
        return $this->get_connection()->get_pdo()->beginTransaction();
    }

    /**
     * Rolls back a transaction.
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function rollback()
    {
        return $this->get_connection()->get_pdo()->rollBack();
    }

    /**
     * Commits a transaction.
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function commit()
    {
        return $this->get_connection()->get_pdo()->commit();
    }

    /**
     * Load a model (or an extended model).
     *
     * @param string $model model name
     * @param bool   $all   set to TRUE to fully load model metadata
     *
     * @return mixed the instantiated model
     */
    final public function load($model, $all = false)
    {
        $model = "{$model}_model";
        $parents = class_parents($model, true);
        if (!isset($parents['ppl_db_model'])) {
            throw new ControllerException("Model '{$model}' must be a children of ppl_db_model class");
        }

        return new $model($this, $all);
    }

    private function __clone()
    {
    }
}
final class DbException extends Exception
{
}
