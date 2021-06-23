<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder create/alter specification sub-statement
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_specification extends ppl_db_sql_base
{
    protected $charset,
        $collate;

    /**
     * Reset the SQL sub-statement.
     *
     * @return this object
     */
    public function reset()
    {
        $this->charset = null;
        $this->collate = null;

        return $this;
    }

    /**
     * Set the default character set for the table.
     *
     * @param string $charset_name character set name
     *
     * @return this object
     */
    public function charset($charset_name)
    {
        if (!$this->is_str($charset_name)) {
            throw new sqlException('Character set must be a non empty string');
        }
        $this->charset = $charset_name;

        return $this;
    }

    /**
     * Set the default collation for the table.
     *
     * @param string $collation_name collation name
     *
     * @return this object
     */
    public function collate($collation_name)
    {
        if (!$this->is_str($collation_name)) {
            throw new sqlException('Collation name must be a non empty string');
        }
        $this->collate = $collation_name;

        return $this;
    }

    /**
     * Use default table specifications
     * (Character set and collation).
     */
    protected function use_default_specification()
    {
        // TODO : if only charset set, we don't use default collation (and vice-versa)
        $this->charset = ($this->charset !== null) ? $this->charset : $this->get_default_charset();
        $this->collate = ($this->collate !== null) ? $this->collate : $this->get_default_collation();
    }

    /**
     * Get specification SQL sub-statement.
     *
     * @return string SQL sub-statement
     */
    public function get_specification_sql()
    {
        $sql = '';
        if ($this->charset !== null) {
            $sql .= " CHARSET={$this->charset}";
        }
        if ($this->collate !== null) {
            $sql .= " COLLATE={$this->collate}";
        }

        return $sql;
    }

    private function __clone()
    {
    }
}
