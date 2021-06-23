<?php
/**
 * PHPlay Framework.
 *
 * Simple SQL Builder
 *
 * TODO : USE DATABASE ?
 * TODO : Think about implement adapter (MySQL) which override everything
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql extends ppl_db_sql_base
{
    private $column = null;

    /**
     * Constructor.
     */
    public function __construct()
    {
    }

    /**
     * SELECT statement.
     *
     * @return ppl_db_sql_select statement object
     */
    public function select()
    {
        return new ppl_db_sql_select();
    }

    /**
     * INSERT statement.
     *
     * @param string $tablename table name (table expression)
     *
     * @return ppl_db_sql_insert statement object
     */
    public function insert($tablename)
    {
        return new ppl_db_sql_insert($tablename);
    }

    /**
     * UPDATE statement.
     *
     * @param mixed $tablename table name (table expression)
     *
     * @return ppl_db_sql_update statement object
     */
    public function update($tablename)
    {
        return new ppl_db_sql_update($tablename);
    }

    /**
     * DELETE statement.
     *
     * @param mixed $tablename table name (table expression)
     *
     * @return ppl_db_sql_delete statement object
     */
    public function delete($tablename)
    {
        return new ppl_db_sql_delete($tablename);
    }

    /**
     * CREATE TABLE.
     *
     * @param mixed $tablename table name (table expression)
     * @param bool  $replace   perform a DROP TABLE if set to TRUE
     *
     * @return ppl_db_sql_create statement object
     */
    public function create_table($tablename, $replace = false)
    {
        return new ppl_db_sql_create_table($tablename, $replace);
    }

    /**
     * ALTER TABLE.
     *
     * @param mixed $tablename table name (table expression)
     *
     * @return ppl_db_sql_create statement object
     */
    public function alter_table($tablename)
    {
        return new ppl_db_sql_alter_table($tablename);
    }

    /**
     * DROP TABLE.
     *
     * @param mixed $tablename table name (table expression)
     *
     * @return ppl_db_sql_drop statement object
     */
    public function drop_table($tablename)
    {
        return new ppl_db_sql_drop($tablename, 0);
    }

    /**
     * CREATE VIEW.
     *
     * @param mixed  $viewname view name (table expression)
     * @param mixed  $select   SELECT SQL Statement
     * @param string $viewname view name
     *
     * @return ppl_db_sql_create statement object
     */
    public function create_view($viewname, $select, $replace = false)
    {
        return new ppl_db_sql_create_view($viewname, $select, $replace);
    }

    /**
     * ALTER VIEW.
     *
     * @param mixed $viewname view name (table expression)
     *
     * @return ppl_db_sql_create statement object
     */
    public function alter_view($viewname, $select)
    {
        return new ppl_db_sql_alter_view($viewname, $select);
    }

    /**
     * DROP VIEW.
     *
     * @param mixed $viewname view name (table expression)
     *
     * @return ppl_db_sql_drop statement object
     */
    public function drop_view($viewname)
    {
        return new ppl_db_sql_drop($viewname, 1);
    }

    /**
     * CREATE DATABASE / SCHEMA.
     *
     * @param string $dbname database name
     *
     * @return ppl_db_sql_create_database statement object
     */
    public function create_database($dbname)
    {
        return new ppl_db_sql_create_database($dbname);
    }

    /**
     * ALTER DATABASE / SCHEMA.
     *
     * @param string $dbname database name
     *
     * @return ppl_db_sql_alter_database statement object
     */
    public function alter_database($dbname)
    {
        return new ppl_db_sql_alter_database($dbname);
    }

    /**
     * DROP DATABASE / SCHEMA.
     *
     * @param string $dbname database name
     *
     * @return ppl_db_sql_drop statement object
     */
    public function drop_database($dbname)
    {
        return new ppl_db_sql_drop($dbname, 2);
    }

    /**
     * Return a column definition object.
     *
     * @param string $column_name column name
     *
     * @return ppl_db_sql_column column definition object
     */
    public function column($column_name)
    {
        if ($this->column === null) {
            $this->column = new ppl_db_sql_column($this);
        }

        return $this->column->set_column_name($column_name);
    }

    /**
     * RENAME TABLE.
     *
     * @return ppl_db_sql_rename_table statement object
     */
    public function rename_table()
    {
        return new ppl_db_sql_rename();
    }

    private function __clone()
    {
    }
}
