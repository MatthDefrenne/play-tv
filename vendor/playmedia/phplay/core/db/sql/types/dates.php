<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder date/time column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_dates extends ppl_db_sql_types_base
{
    private $date_type;

    /**
     * Reset the column definition object.
     *
     * @param string $date_type SQL date data type (default is NULL for avoid E_STRICT error)
     *
     * @return this object
     * @override
     */
    public function reset($date_type = null)
    {
        parent::reset();
        $this->date_type = $date_type;

        return $this;
    }

    /**
     * Get column definition SQL substring.
     *
     * @param string $new_col_name new column name
     *
     * @return string column definition SQL substring
     * @override
     */
    public function get_sql($new_col_name = null)
    {
        if ($new_col_name !== null) {
            $new_col_name = "{$this->parent->quote_identifier($new_col_name)} ";
        }

        return $this->get_column_name().$new_col_name.$this->date_type.parent::get_sql();
    }

    /**
     * Set default column value.
     *
     * @param mixed $value column default value
     *
     * @return this object
     * @override
     */
    public function default_value($value)
    {
        if (($value !== null) && !is_string($value) && !is_int($value)) {
            // TODO : better date validation ?

            throw new sqlException('Default value must be a date and/or time or timestamp');
        }

        return parent::default_value($value);
    }
}
