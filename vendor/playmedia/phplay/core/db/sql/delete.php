<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder DELETE Statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_delete extends ppl_db_sql_filter
{
    private $tablename;

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
        $this->where = array();
        $this->orderby = array();
        $this->limit = '';

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
        $sql = "DELETE FROM {$this->format_identifier($db, $table)} ";
        $sql .= $this->build_where_condition('WHERE', $this->where);
        $sql .= $this->build_orderby();
        $sql .= $this->limit;

        return $sql.$this->es;
    }
}
