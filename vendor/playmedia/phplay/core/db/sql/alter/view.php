<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder ALTER VIEW Statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_alter_view extends ppl_db_sql_base
{
    private $viewname,
        $select;

    /**
     * Constructor.
     *
     * @param mixed $viewname view name (table expression)
     * @param mixed $select   SELECT SQL Statement
     */
    public function __construct($viewname, $select)
    {
        $this->reset($viewname, $select);
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
     *
     * @return this object
     */
    public function reset($viewname = null, $select)
    {
        if ($viewname !== null) {
            $this->set_viewname($viewname);
        }
        if ($select !== null) {
            $this->set_select($select);
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
        list($db, $table, $alias) = $this->parse_table_expr($this->viewname);

        return "ALTER VIEW {$this->format_identifier($db, $table)} AS \n".$this->select->get_sql();
    }
}
