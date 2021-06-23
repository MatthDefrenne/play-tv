<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder string column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_string extends ppl_db_sql_types_strings
{
    private $string_type;

    protected $length;

    /**
     * Set maximum length of char column.
     *
     * @param int $length char length
     */
    private function set_length($length)
    {
        if (!$this->parent->is_num($length, true, 0, 255)) {
            // 0 to 65,535 in 5.0.3 and later versions of MySQL

            throw new sqlException('Length must be an integer value from 0 to 255');
        }
        $this->length = ($length === null) ? 1 : $length;
    }

    /**
     * Reset the column definition object.
     *
     * @param string $char_type SQL char data type (default is NULL for avoid E_STRICT error)
     * @param int    $length    char length
     *
     * @return this object
     * @override
     */
    public function reset($string_type = null, $length = null)
    {
        parent::reset();
        $this->string_type = $string_type;
        $this->set_length($length);

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

        return $this->get_column_name().$new_col_name.$this->string_type."({$this->length})".parent::get_sql();
    }
}
