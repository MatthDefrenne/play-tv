<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder strings column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_types_strings extends ppl_db_sql_types_base
{
    protected $_collate,
        $_charset;

    /**
     * Reset the column definition object.
     *
     * @return this object
     */
    public function reset()
    {
        parent::reset();
        $this->_collate = null;
        $this->_charset = null;

        return $this;
    }

    /**
     * Check if current object is TEXT/BLOB columns.
     *
     * @return bool TRUE if TEXT/BLOB columns, otherwise FALSE
     */
    private function is_text()
    {
        return in_array(get_class($this), array('ppl_db_sql_types_text', 'ppl_db_sql_types_blob'), true);
    }

    /**
     * PRIMARY KEY.
     *
     * @param int $prefix_length prefix length of column value
     *
     * @return this object
     * @override
     */
    public function primary($prefix_length = null)
    {
        if (!$this->parent->is_num($prefix_length, true, 1, 767)) {
            // 767 bytes max for InnoDB table

            throw new sqlException('Column primary key length must be an integer between 1 and 767');
        }
        if (($this->_unique !== null) || ($this->_index !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        if (($prefix_length === null) && ($this->is_text() === true)) {
            throw new sqlException('BLOB/TEXT column primary key require a length');
        }
        if (($prefix_length !== null) && isset($this->length) && ($this->length !== null) && ($prefix_length > $this->length)) {
            throw new sqlException('Column primary key length is longer than the column length');
        }
        $this->_primary = ($prefix_length === null) ? true : $prefix_length;

        return $this;
    }

    /**
     * UNIQUE (KEY).
     *
     * @param int $prefix_length prefix length of column value
     *
     * @return this object
     * @override
     */
    public function unique($prefix_length = null)
    {
        if (!$this->parent->is_num($prefix_length, true, 1, 767)) {
            // 767 bytes max for InnoDB table

            throw new sqlException('Column unique key length must be an integer between 1 and 767');
        }
        if (($this->_primary !== null) || ($this->_index !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        if (($prefix_length === null) && ($this->is_text() === true)) {
            throw new sqlException('BLOB/TEXT column unique key require a length');
        }
        if (($prefix_length !== null) && isset($this->length) && ($this->length !== null) && ($prefix_length > $this->length)) {
            throw new sqlException('Column unique index length is longer than the column length');
        }
        $this->_unique = ($prefix_length === null) ? true : $prefix_length;

        return $this;
    }

    /**
     * INDEX (KEY).
     *
     * @param int $prefix_length prefix length of column value
     *
     * @return this object
     * @override
     */
    public function index($prefix_length = null)
    {
        if (!$this->parent->is_num($prefix_length, true, 1, 767)) {
            // 767 bytes max for InnoDB table

            throw new sqlException('Column index length must be an integer between 1 and 767');
        }
        if (($this->_primary !== null) || ($this->_unique !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        if (($prefix_length === null) && ($this->is_text() === true)) {
            throw new sqlException('BLOB/TEXT column index require a length');
        }
        if (($prefix_length !== null) && isset($this->length) && ($this->length !== null) && ($prefix_length > $this->length)) {
            throw new sqlException('Column index length is longer than the column length');
        }
        $this->_index = ($prefix_length === null) ? true : $prefix_length;

        return $this;
    }

    /**
     * FULLTEXT index.
     *
     * @param int $prefix_length prefix length of column value
     *
     * @return this object
     * @override
     */
    public function fulltext()
    {
        // TODO : Full-text indexes can be used only with MyISAM tables, and can be created only for CHAR, VARCHAR, or TEXT columns.
        $this->_fulltext = true;

        return $this;
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
        if (($value !== null) && !is_string($value)) {
            throw new sqlException('Default value must be a string');
        }
        if ($this->is_text() === true) {
            throw new sqlException("BLOB/TEXT column can't have a default value");
        }

        return parent::default_value($value);
    }

    /**
     * Set collation name to use for current column.
     *
     * @see http://dev.mysql.com/doc/refman/5.1/en/charset.html
     *
     * @param string $collation_name collation name
     *
     * @return this object
     */
    public function collate($collation_name)
    {
        if (!$this->parent->is_str($collation_name)) {
            throw new sqlException('Collation name must be a non-empty string');
        }
        $this->_collate = $collation_name;

        return $this;
    }

    /**
     * Set character set to use for current column.
     *
     * @see http://dev.mysql.com/doc/refman/5.1/en/charset.html
     *
     * @param string $charset_name character encoding name
     *
     * @return this object
     */
    public function charset($charset_name)
    {
        if (!$this->parent->is_str($charset_name)) {
            throw new sqlException('Charset name must be a non-empty string');
        }
        $this->_charset = $charset_name;

        return $this;
    }
}
