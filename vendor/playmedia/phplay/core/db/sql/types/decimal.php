<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder Decimals column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_decimal extends ppl_db_sql_types_decimals
{
    protected $decimal_type;

    private $length,
        $decimals;

    /**
     * Set digits.
     *
     * @param int $length   total of digits (precision for fixed-point)
     * @param int $decimals digits may be after the decimal point (scale for fixed-point)
     */
    private function set_digits($length, $decimals)
    {
        if (!$this->parent->is_num($length, true, 0)) {
            throw new sqlException('Length must be an integer > 0');
        }
        if (!$this->parent->is_num($decimals, true, 0)) {
            throw new sqlException('Length must be an integer > 0');
        }
        $this->length = $length;
        $this->decimals = (($length !== null) && ($decimals !== null)) ? $decimals : 0;
    }

    /**
     * Reset the column definition object.
     *
     * @param string $decimal_type SQL decimal data type (default is NULL for avoid E_STRICT error)
     * @param int    $length       total of digits (precision for fixed-point)
     * @param int    $decimals     digits may be after the decimal point (scale for fixed-point)
     *
     * @return this object
     * @override
     */
    public function reset($decimal_type = null, $length = null, $decimals = null)
    {
        parent::reset();
        $this->decimal_type = $decimal_type;
        $this->set_digits($length, $decimals);

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
        $sql_digits = '';
        if ($this->length !== null) {
            $sql_digits = '('.$this->length.', '.$this->decimals.')';
        }

        return $this->get_column_name().$new_col_name.$this->decimal_type.$sql_digits.parent::get_sql();
    }
}
