<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder RENAME TABLE Statement (MySQL)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.1.1
 */
final class ppl_db_sql_rename extends ppl_db_sql_base
{
    private $_to;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Reset the SQL statement.
     *
     * @return this object
     */
    public function reset()
    {
        $this->_to = array();

        return $this;
    }

    /**
     * To.
     *
     * @param mixed $table   table name
     * @param mixed $totable new table name
     *
     * @return this object
     */
    public function to($table, $totable)
    {
        if (!$this->is_table_expr($table)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        if (!$this->is_table_expr($totable)) {
            throw new sqlException('Totable name must be a valid table expression');
        }
        $this->_to[] = array($table, $totable);

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        if (count($this->_to) === 0) {
            throw new sqlException('Expected to() in rename table statement');
        }
        $tos = array();
        foreach ($this->_to as $to) {
            list($db, $table, $alias) = $this->parse_table_expr($to[0]);
            $tbl = $this->format_identifier($db, $table, $alias);
            list($db, $table, $alias) = $this->parse_table_expr($to[1]);
            $totbl = $this->format_identifier($db, $table, $alias);
            $tos[] = "{$tbl} TO {$totbl}";
        }

        return 'RENAME TABLE '.implode($this->sep, $tos).$this->es;
    }
}
