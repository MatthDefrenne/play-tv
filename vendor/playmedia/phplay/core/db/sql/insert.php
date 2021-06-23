<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder INSERT Statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_insert extends ppl_db_sql_base
{
    private $tablename,
        $columns,
        $select,
        $ignore,
        $delayed;

    /**
     * Constructor.
     *
     * @param mixed $tablename table expression
     */
    public function __construct($tablename)
    {
        $this->reset($tablename);
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
     *
     * @return this object
     */
    public function reset($tablename = null)
    {
        if ($tablename !== null) {
            $this->set_tablename($tablename);
        }
        $this->columns = array();
        $this->select = null;
        $this->delayed = null;
        $this->ignore = null;

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        list($db, $table, $alias) = $this->parse_table_expr($this->tablename);

        return "INSERT {$this->delayed}{$this->ignore}INTO {$this->format_identifier($db, $table)} ".(($this->select === null) ? $this->build_set() : $this->select->get_sql());
    }

    /**
     * Set DELAYED option for the INSERT statement (MySQL only)
     * (INSERT ... DELAYED).
     *
     * Works only with MyISAM, MEMORY, ARCHIVE, and BLACKHOLE
     * For engines that do not support DELAYED, an error occurs.
     *
     * @return this object
     */
    public function delayed()
    {
        $this->delayed = 'DELAYED ';

        return $this;
    }

    /**
     * Set IGNORE option for the INSERT statement (MySQL only)
     * (INSERT ... IGNORE).
     *
     * Issue only a warning on duplicate key instead of an error
     * Data conversion errors are also ignored and values are adjusted to to the closest values and inserted
     *
     * @return this object
     */
    public function ignore()
    {
        $this->ignore = 'IGNORE ';

        return $this;
    }

    /**
     * Set value expression of column.
     *
     * @param string $column          column name
     * @param mixed  $value           value expression
     * @param bool   $value_is_column set to TRUE if value is a column name
     *
     * @return this object
     */
    public function set($column, $value, $value_is_column = false)
    {
        if ($this->select !== null) {
            throw new sqlException('set() cannot be used after select()');
        }
        if (!$this->is_str($column)) {
            throw new sqlException('Column name must be a non empty string');
        }
        $this->columns[] = array($column, $value, $value_is_column);

        return $this;
    }

    /**
     * SELECT
     * (INSERT ... SELECT).
     *
     * @param ppl_db_sql_select $select SELECT SQL statement object
     *
     * @return this object
     */
    public function select(ppl_db_sql_select $select)
    {
        if (count($this->columns) !== 0) {
            throw new sqlException('select() cannot be used after set()');
        }
        $this->select = $select;

        return $this;
    }

    /**
     * Build SET column name=expression.
     *
     * @return string COLUMNNAME=EXPR SQL statement substring
     */
    public function build_set()
    {
        if (count($this->columns) === 0) {
            throw new sqlException('SET column expression expected in INSERT statement');
        }
        $sql = ' SET ';
        $cols = array();
        foreach ($this->columns as $column) {
            $col = $this->format_identifier(null, $column[0]);
            $expr = ($column[2] === false) ? $this->format_value($column[1]) : $this->parse_conditional_expr($column[1]);
            $expr = ($expr === null) ? 'NULL' : $expr;
            $cols[] = "\n\t{$col} = {$expr}";
        }

        return $sql.implode($this->sep, $cols).$this->es;
    }
}
