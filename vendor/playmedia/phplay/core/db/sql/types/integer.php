<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder Integer column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_integer extends ppl_db_sql_types_integers
{
    private $integer_type,
        $display_width;

    /**
     * Set display width.
     *
     * @param int $display_width display width
     */
    private function set_display_width($display_width)
    {
        if (!$this->parent->is_num($display_width, true, 0)) {
            throw new sqlException('Display width must be an integer > 0');
        }
        $this->display_width = $display_width;
    }

    /**
     * Reset the column definition object.
     *
     * @param string $integer_type  SQL integer data type (default is NULL for avoid E_STRICT error)
     * @param int    $display_width display width
     *
     * @return this object
     * @override
     */
    public function reset($integer_type = null, $display_width = null)
    {
        parent::reset();
        $this->integer_type = $integer_type;
        $this->set_display_width($display_width);

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
        $sql_dw = ($this->display_width !== null) ? "({$this->display_width})" : '';

        return $this->get_column_name().$new_col_name.$this->integer_type.$sql_dw.parent::get_sql();
    }
}
