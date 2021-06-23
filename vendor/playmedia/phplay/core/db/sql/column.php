<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder Column definition object
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_column
{
    private $parent,
        $column_name,
        $_int,
        $_bool,
        $_decimal,
        $_char,
        $_text,
        $_datetime,
        $_blob;

    /**
     * Constructor.
     *
     * @param ppl_db_sql $parent SQL Builder object
     */
    public function __construct(ppl_db_sql $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Set column name.
     *
     * @param string $column_name column name
     */
    public function set_column_name($name)
    {
        if (!$this->parent->is_str($name)) {
            throw new sqlException('Column name must be a non empty string');
        }
        $this->column_name = $name;

        return $this;
    }

    /**
     * Return an integer column definition object.
     *
     * @param string $integer_type  SQL integer data type
     * @param int    $display_width display width
     *
     * @return ppl_db_sql_types_integer integer column definition object
     */
    private function get_integer($type, $display_width)
    {
        if ($this->_int === null) {
            $this->_int = new ppl_db_sql_types_integer($this->parent);
        }

        return $this->_int->reset($type, $display_width)->set_column_name($this->column_name);
    }

    /**
     * Return a float column definition object.
     *
     * @param string $decimal_type SQL decimal data type
     * @param int    $length       total of digits (precision for fixed-point)
     * @param int    $decimals     digits may be after the decimal point (scale for fixed-point)
     *
     * @return ppl_db_sql_types_integer integer column definition object
     */
    private function get_decimal($type, $length, $decimals)
    {
        if ($this->_decimal === null) {
            $this->_decimal = new ppl_db_sql_types_decimal($this->parent);
        }

        return $this->_decimal->reset($type, $length, $decimals)->set_column_name($this->column_name);
    }

    /**
     * Return a string column definition object.
     *
     * @param string $string_type SQL string data type
     * @param int    $length      char length
     *
     * @return ppl_db_sql_types_string string column definition object
     */
    private function get_string($type, $length)
    {
        if ($this->_char === null) {
            $this->_char = new ppl_db_sql_types_string($this->parent);
        }

        return $this->_char->reset($type, $length)->set_column_name($this->column_name);
    }

    /**
     * Return a text column definition object.
     *
     * @param string $text_type SQL text data type
     * @param bool   $binary    set to TRUE for assign the binary collation of the column charset
     *
     * @return ppl_db_sql_types_text string column definition object
     */
    private function get_text($type, $binary)
    {
        if ($this->_text === null) {
            $this->_text = new ppl_db_sql_types_text($this->parent);
        }

        return $this->_text->reset($type, $binary)->set_column_name($this->column_name);
    }

    /**
     * Return a blob column definition object.
     *
     * @param string $blob_type SQL text data type
     *
     * @return ppl_db_sql_types_blob string column definition object
     */
    private function get_blob($type)
    {
        if ($this->_blob === null) {
            $this->_blob = new ppl_db_sql_types_blob($this->parent);
        }

        return $this->_blob->reset($type)->set_column_name($this->column_name);
    }

    /**
     * Return a date/time column definition object.
     *
     * @param string $date_type SQL date/time data type
     *
     * @return ppl_db_sql_types_dates date/time column definition object
     */
    private function get_datetime($type)
    {
        if ($this->_datetime === null) {
            $this->_datetime = new ppl_db_sql_types_dates($this->parent);
        }

        return $this->_datetime->reset($type)->set_column_name($this->column_name);
    }

    /**
     * BOOLEAN column definition.
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function boolean()
    {
        return $this->tinyint(1);
    }
    public function bool()
    {
        return $this->boolean();
    }

    /**
     * INTEGER column definition.
     *
     * @param int $display_width display width
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function integer($display_width = null)
    {
        return $this->get_integer('INT', $display_width);
    }
    public function int($display_width = null)
    {
        return $this->integer($display_width);
    }

    /**
     * TINYINT column definition.
     *
     * @param int $display_width display width
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function tinyint($display_width = null)
    {
        return $this->get_integer('TINYINT', $display_width);
    }

    /**
     * SMALLINT column definition.
     *
     * @param int $display_width display width
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function smallint($display_width = null)
    {
        return $this->get_integer('SMALLINT', $display_width);
    }

    /**
     * MEDIUMINT column definition.
     *
     * @param int $display_width display width
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function mediumint($display_width = null)
    {
        return $this->get_integer('MEDIUMINT', $display_width);
    }

    /**
     * BIGINT column definition.
     *
     * @param int $display_width display width
     *
     * @return ppl_db_sql_types_integer column definition object
     */
    public function bigint($display_width = null)
    {
        return $this->get_integer('BIGINT', $display_width);
    }

    /**
     * FLOAT column definition.
     *
     * @param int $length   total of digits (precision for fixed-point)
     * @param int $decimals digits may be after the decimal point (scale for fixed-point)
     *
     * @return ppl_db_sql_types_decimal column definition object
     */
    public function float($length = null, $decimals = null)
    {
        return $this->get_decimal('FLOAT', $length, $decimals);
    }

    /**
     * DOUBLE column definition.
     *
     * @param int $length   total of digits (precision for fixed-point)
     * @param int $decimals digits may be after the decimal point (scale for fixed-point)
     *
     * @return ppl_db_sql_types_decimal column definition object
     */
    public function double($length = null, $decimals = null)
    {
        return $this->get_decimal('DOUBLE', $length, $decimals);
    }

    /**
     * DECIMAL column definition.
     *
     * @param int $length   total of digits (precision for fixed-point)
     * @param int $decimals digits may be after the decimal point (scale for fixed-point)
     *
     * @return ppl_db_sql_types_decimal column definition object
     */
    public function decimal($length = null, $decimals = null)
    {
        return $this->get_decimal('DECIMAL', $length, $decimals);
    }

    /**
     * CHAR column definition.
     *
     * @param int $length char length
     *
     * @return ppl_db_sql_types_string column definition object
     */
    public function char($length = null)
    {
        return $this->get_string('CHAR', $length);
    }

    /**
     * VARCHAR column definition.
     *
     * @param int $length char length
     *
     * @return ppl_db_sql_types_string column definition object
     */
    public function varchar($length)
    {
        if ($length === null) {
            throw new sqlException('Column length is required');
        }

        return $this->get_string('VARCHAR', $length);
    }

    /**
     * BINARY column definition.
     *
     * @param int $length char length
     *
     * @return ppl_db_sql_types_string column definition object
     */
    public function binary($length = null)
    {
        return $this->get_string('BINARY', $length);
    }

    /**
     * VARBINARY column definition.
     *
     * @param int $length char length
     *
     * @return ppl_db_sql_types_string column definition object
     */
    public function varbinary($length)
    {
        if ($length === null) {
            throw new sqlException('Column length is required');
        }

        return $this->get_string('VARBINARY', $length);
    }

    /**
     * TEXT column definition.
     *
     * @param bool $binary set to TRUE for assign the binary collation of the column charset
     *
     * @return ppl_db_sql_types_text column definition object
     */
    public function text($binary = null)
    {
        return $this->get_text('TEXT', $binary);
    }

    /**
     * TINYTEXT column definition.
     *
     * @param bool $binary set to TRUE for assign the binary collation of the column charset
     *
     * @return ppl_db_sql_types_text column definition object
     */
    public function tinytext($binary = null)
    {
        return $this->get_text('TINYTEXT', $binary);
    }

    /**
     * MEDIUMTEXT column definition.
     *
     * @param bool $binary set to TRUE for assign the binary collation of the column charset
     *
     * @return ppl_db_sql_types_text column definition object
     */
    public function mediumtext($binary = null)
    {
        return $this->get_text('MEDIUMTEXT', $binary);
    }

    /**
     * LONGTEXT column definition.
     *
     * @param bool $binary set to TRUE for assign the binary collation of the column charset
     *
     * @return ppl_db_sql_types_text column definition object
     */
    public function longtext($binary = null)
    {
        return $this->get_text('LONGTEXT', $binary);
    }

    /**
     * BLOB column definition.
     *
     * @return ppl_db_sql_types_blob column definition object
     */
    public function blob()
    {
        return $this->get_blob('BLOB');
    }

    /**
     * TINYBLOB column definition.
     *
     * @return ppl_db_sql_types_blob column definition object
     */
    public function tinyblob()
    {
        return $this->get_blob('TINYBLOB');
    }

    /**
     * MEDIUMBLOB column definition.
     *
     * @return ppl_db_sql_types_blob column definition object
     */
    public function mediumblob()
    {
        return $this->get_blob('MEDIUMBLOB');
    }

    /**
     * LONGBLOB column definition.
     *
     * @return ppl_db_sql_types_blob column definition object
     */
    public function longblob()
    {
        return $this->get_blob('LONGBLOB');
    }

    /**
     * DATETIME column definition.
     *
     * @return ppl_db_sql_types_dates column definition object
     */
    public function datetime()
    {
        return $this->get_datetime('DATETIME');
    }

    /**
     * DATE column definition.
     *
     * @return ppl_db_sql_types_dates column definition object
     */
    public function date()
    {
        return $this->get_datetime('DATE');
    }

    /**
     * TIME column definition.
     *
     * @return ppl_db_sql_types_dates column definition object
     */
    public function time()
    {
        return $this->get_datetime('TIME');
    }

    /**
     * TIMESTAMP column definition.
     *
     * @return ppl_db_sql_types_dates column definition object
     */
    public function timestamp()
    {
        return $this->get_datetime('TIMESTAMP');
    }
}
