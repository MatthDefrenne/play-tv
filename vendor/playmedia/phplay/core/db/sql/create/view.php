<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder CREATE VIEW Statement
 *
 * TODO : OR REPLACE seems to be bug ---> user ALTER VIEW instead
 * TODO : ALGORITHM = {UNDEFINED | MERGE | TEMPTABLE} ?
 * TODO : DEFINER = { user | CURRENT_USER } ?
 * TODO : SQL SECURITY { DEFINER | INVOKER } ?
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_create_view extends ppl_db_sql_base
{
    private $viewname,
        $select,
        $replace;

    /**
     * Constructor.
     *
     * @param mixed $viewname view name (table expression)
     * @param mixed $select   SELECT SQL Statement
     * @param bool  $replace  set to TRUE to replace existing view
     */
    public function __construct($viewname, $select, $replace = false)
    {
        $this->reset($viewname, $select, $replace);
    }

    /**
     * Set view name.
     *
     * @param mixed $viewname view name (table expression)
     */
    private function set_viewname($viewname)
    {
        if (!$this->is_table_expr($viewname)) {
            throw new sqlException('View name must be a valid table expression');
        }
        $this->viewname = $viewname;
    }

    /**
     * Set select statement object.
     *
     * @param ppl_db_sql_select $select select statement object
     */
    private function set_select(ppl_db_sql_select $select)
    {
        $this->select = $select;
    }

    /**
     * Reset the SQL statement.
     *
     * @param mixed $viewname view name (table expression)
     * @param mixed $select   SELECT SQL Statement
     * @param bool  $replace  set to TRUE to replace existing view
     *
     * @return this object
     */
    public function reset($viewname = null, $select, $replace = false)
    {
        if ($viewname !== null) {
            $this->set_viewname($viewname);
        }
        if ($select !== null) {
            $this->set_select($select);
        }
        $this->replace = ($replace === true) ? true : false;

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        $replace = ($this->replace === true) ? 'OR REPLACE ' : '';
        list($db, $table, $alias) = $this->parse_table_expr($this->viewname);

        return "CREATE VIEW {$replace}{$this->format_identifier($db, $table)} AS \n".$this->select->get_sql();
    }
}
