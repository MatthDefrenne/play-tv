<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder Table options sub-statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_tableopts extends ppl_db_sql_specification
{
    private $engine,
        $auto_increment,
        $comment;

    /**
     * Reset the SQL sub-statement.
     *
     * @return this object
     * @override
     */
    public function reset()
    {
        parent::reset();
        $this->engine = null;
        $this->auto_increment = null;
        $this->comment = null;

        return $this;
    }

    /**
     * Set table storage engine.
     *
     * @param string $storage_engine storage engine
     *
     * @return this object
     */
    public function engine($storage_engine)
    {
        if (!$this->is_str($storage_engine)) {
            throw new sqlException('Storage engine must be a non empty string');
        }
        $this->engine = $storage_engine;

        return $this;
    }

    /**
     * Set the initial auto_increment value for the table.
     *
     * @param string $value initial value
     *
     * @return this object
     */
    public function auto_increment($value)
    {
        if (!$this->is_num($value, false, 0)) {
            throw new sqlException("Incorrect auto_increment value for table '{$this->tablename}'");
        }
        $this->auto_increment = $value;

        return $this;
    }

    /**
     * Set a comment for the table.
     *
     * @param string $comment table comment
     *
     * @return this object
     */
    public function comment($comment)
    {
        if (!$this->is_str($comment, false, 60)) {
            throw new sqlException('Collation name must be a non empty string up to 60 characters long');
        }
        $this->comment = $comment;

        return $this;
    }

    /**
     * Use default engine.
     */
    protected function use_default_engine()
    {
        $this->engine = ($this->engine !== null) ? $this->engine : $this->get_default_engine();
    }

    /**
     * Get table options SQL sub-statement.
     *
     * @return string SQL sub-statement
     */
    public function get_table_options_sql()
    {
        $sql = '';
        if ($this->engine !== null) {
            $sql .= " ENGINE={$this->engine}";
        }
        $sql .= $this->get_specification_sql();
        if ($this->auto_increment !== null) {
            $sql .= " AUTO_INCREMENT={$this->auto_increment}";
        }
        if ($this->comment !== null) {
            $sql .= " COMMENT={$this->format_value($this->comment)}";
        }

        return $sql;
    }

    private function __clone()
    {
    }
}
