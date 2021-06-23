<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder ALTER DATABASE Statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_alter_database extends ppl_db_sql_specification
{
    private $dbname;

    /**
     * Constructor.
     *
     * @param string $dbname database name
     */
    public function __construct($dbname)
    {
        $this->reset($dbname);
    }

    /**
     * Set database name.
     *
     * @param string $dbname database name
     */
    private function set_dbname($dbname)
    {
        if (!is_string($dbname) || ($dbname === '')) {
            throw new sqlException('Database name must be a non empty string');
        }
        $this->dbname = $dbname;
    }

    /**
     * Reset the SQL statement.
     *
     * @param string $dbname database name
     *
     * @return this object
     * @override
     */
    public function reset($dbname = null)
    {
        parent::reset();
        if ($dbname !== null) {
            $this->set_dbname($dbname);
        }

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        $this->use_default_specification();

        return "ALTER DATABASE {$this->format_identifier(null, $this->dbname)}".$this->get_specification_sql().$this->es;
    }
}
