<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder text column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_text extends ppl_db_sql_types_strings
{
    private $text_type;

    protected $binary;

    /**
     * Reset the column definition object.
     *
     * @param string $text_type SQL text data type (default is NULL for avoid E_STRICT error)
     * @param bool   $binary    set to TRUE for assign the binary collation of the column charset
     *
     * @return this object
     * @override
     */
    public function reset($text_type = null, $binary = null)
    {
        parent::reset();
        $this->text_type = $text_type;
        $this->binary = ($binary === true) ? ' BINARY' : null;

        return $this;
    }

    /**
     * Get column definition SQL substring.
     *
     * @param string $new_col_name new column name
     *
     * @return string column definition SQL substring
     */
    public function get_sql($new_col_name = null)
    {
        if ($new_col_name !== null) {
            $new_col_name = "{$this->parent->quote_identifier($new_col_name)} ";
        }

        return $this->get_column_name().$new_col_name."{$this->text_type}{$this->binary}".parent::get_sql();
    }
}
