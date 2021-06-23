<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder CREATE TABLE Statement
 *
 * BUG : $replace is disabled for now due to a bug (depending on PHP version) with multiple SQL statement in query
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_create_table extends ppl_db_sql_tableopts
{
    protected $tablename;

    private $like,
        $select,
        $replace,
        $duplicate_key,
        $columns,
        $keys;

    /**
     * Constructor.
     *
     * @param mixed $tablename table expression
     * @param bool  $replace   perform a DROP TABLE if set to TRUE
     */
    public function __construct($tablename, $replace = false)
    {
        $this->reset($tablename, $replace);
    }

    /**
     * Set table name.
     *
     * @param mixed $tablename table expression
     */
    private function set_tablename($tablename)
    {
        if (!$this->is_table_expr($tablename)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        $this->tablename = $tablename;
    }

    /**
     * Reset the SQL statement.
     *
     * @param mixed $tablename table expression
     * @param bool  $replace   perform a DROP TABLE if set to TRUE
     *
     * @return this object
     * @override
     */
    public function reset($tablename = null, $replace = false)
    {
        parent::reset();
        if ($tablename !== null) {
            $this->set_tablename($tablename);
        }
        $this->select = null;
        //$this->replace = ($replace === true) ? true : NULL;
        $this->replace = null; // replace is disabled for now due to a PHP bug
        $this->duplicate_key = null;
        $this->columns = array();
        $this->keys = array();
        $this->like = null;

        return $this;
    }

    /**
     * Add a key.
     *
     * @param string $key key SQL substring
     */
    private function add_key($key)
    {
        if ($key !== null) {
            $this->keys[] = "\n\t{$key}";
        }
    }

    /**
     * Add a column.
     *
     * @param ppl_db_sql_types_base $column column definition object
     *
     * @return this object
     */
    public function add_column(ppl_db_sql_types_base $column)
    {
        if ($this->like !== null) {
            throw new sqlException('add_column cannot be used after like()');
        }
        $this->columns[] = "\n\t{$column->get_sql()}";
        $this->add_key($column->get_index_sql());

        return $this;
    }

    /**
     * SELECT
     * (CREATE TABLE ... SELECT).
     *
     * @param ppl_db_sql_select $select SELECT SQL statement object
     *
     * @return this object
     */
    public function select(ppl_db_sql_select $select)
    {
        $this->select = $select;

        return $this;
    }

    /**
     * LIKE (tablename).
     *
     * @param mixed $tablename table expression
     *
     * @return this object
     */
    public function like($tablename)
    {
        if (count($this->columns) > 0) {
            throw new sqlException('LIKE cannot be used after add_column()');
        }
        if (!$this->is_table_expr($tablename)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        $this->like = $tablename;

        return $this;
    }

    /**
     * REPLACE rows with duplicate unique key
     * (CREATE TABLE ... SELECT).
     *
     * @return this object
     */
    public function replace_duplicate_unique_key()
    {
        $this->duplicate_key = true;

        return $this;
    }

    /**
     * IGNORE rows with duplicate unique key
     * (CREATE TABLE ... SELECT).
     *
     * @return this object
     */
    public function ignore_duplicate_unique_key()
    {
        $this->duplicate_key = false;

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        $sql = '';
        // DROP TABLE
        if ($this->replace === true) {
            $drop = new ppl_db_sql_drop($this->tablename, 0);
            $sql = $drop->get_sql()."\n";
        }
        // CREATE TABLE
        list($db, $table, $alias) = $this->parse_table_expr($this->tablename);
        $sql .= "CREATE TABLE IF NOT EXISTS {$this->format_identifier($db, $table)}";
        if ($this->like !== null) {
            // LIKE
            list($db, $table, $alias) = $this->parse_table_expr($this->like);
            $sql .= " LIKE {$this->format_identifier($db, $table)}";

            return $sql.$this->es;
        }
        if (($create_definition = implode($this->sep, array_merge($this->columns, $this->keys))) !== '') {
            $sql .= "\n({$create_definition}\n)";
        }
        $this->use_default_engine();
        $this->use_default_specification();
        $sql .= $this->get_table_options_sql();
        if ($this->select === null) {
            return $sql.$this->es;
        }
        // CREATE TABLE ... SELECT
        if ($this->duplicate_key !== null) {
            $sql .= ($this->duplicate_key === true) ? ' REPLACE' : ' IGNORE';
        }
        $sql .= "\n".$this->select->get_sql();

        return $sql;
    }
}
