<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder DROP Statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_drop extends ppl_db_sql_base
{
    private $name,
        $type,
        $_types = array('TABLE', 'VIEW', 'DATABASE');

    /**
     * Constructor.
     *
     * @param mixed $name drop entity name (table expression)
     * @param int   $type drop type
     */
    public function __construct($name, $type = 0)
    {
        $this->type = $type;
        $this->set_name($name);
    }

    /**
     * Set entity name.
     *
     * @param mixed $name drop entity name (table expression)
     */
    private function set_name($name)
    {
        if (!$this->is_table_expr($name)) {
            if ($this->type === 2) {
                throw new sqlException("DROP {$this->_types[$this->type]} name must be a non empty string");
            } else {
                throw new sqlException("DROP {$this->_types[$this->type]} name must be a valid table expression");
            }
        }
        $this->name = $name;
    }

    /**
     * Reset the SQL statement.
     *
     * @param mixed $name drop entity name (table expression)
     *
     * @return this object
     */
    public function reset($name = null)
    {
        if ($name !== null) {
            $this->set_name($name);
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
        $alias = null;
        $name = $this->name;
        list($db, $table, $alias) = $this->parse_table_expr($this->name);

        return "DROP {$this->_types[$this->type]} IF EXISTS {$this->format_identifier($db, $table)}".$this->es;
    }
}
