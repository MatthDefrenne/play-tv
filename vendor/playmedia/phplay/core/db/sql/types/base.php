<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder base column definition
 *
 * TODO : ALTER COLUMN ... DROP DEFAULT is currently unsupported
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_types_base
{
    protected $column_name,
        $parent,
        $_null,
        $_not_null,
        $_default,
        $_default_isnull,
        //$_default_drop,
        $_comment,
        $_primary,
        $_unique,
        $_index,
        $_fulltext,
        $_first;

    /**
     * Constructor.
     *
     * @param ppl_db_sql $parent parent ppl_db_sql object
     */
    public function __construct($parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get SQL formatted column name.
     *
     * @return string SQL formatted column name
     */
    public function get_column_name()
    {
        return "{$this->parent->quote_identifier($this->column_name)} ";
    }

    /**
     * Set column name.
     *
     * @param string $column_name column name
     *
     * @return this object
     */
    public function set_column_name($column_name)
    {
        $this->column_name = $column_name;

        return $this;
    }

    /**
     * Reset the column definition object.
     *
     * @return this object
     */
    public function reset()
    {
        $this->_null = null;
        $this->_not_null = null;
        $this->_default = null;
        $this->_default_isnull = null;
        //$this->_default_drop = NULL;
        $this->_comment = null;
        $this->_primary = null;
        $this->_unique = null;
        $this->_index = null;
        $this->_fulltext = null;
        $this->_first = null;

        return $this;
    }

    /**
     * Get column definition SQL substring.
     *
     * @return string column definition SQL substring
     */
    public function get_sql()
    {
        $sql = '';
        if (isset($this->_unsigned) && ($this->_unsigned !== null)) {
            $sql .= ($this->_unsigned === true) ? ' UNSIGNED' : ' SIGNED';
            $sql .= ($this->_zerofill === true) ? ' ZEROFILL' : '';
        }
        if (isset($this->_charset) && ($this->_charset !== null)) {
            $sql .= " CHARACTER SET {$this->_charset}";
        }
        if (isset($this->_collate) && ($this->_collate !== null)) {
            $sql .= " COLLATE {$this->_collate}";
        }
        if ($this->_null === true) {
            $sql .= ' NULL';
        }
        if ($this->_not_null === true) {
            $sql .= ' NOT NULL';
        }
        /*
         if ($this->_default_drop === true)
         {
        $sql .= " DROP DEFAULT";
        }
        else
            */
        if ($this->_default !== null) {
            $sql .= " DEFAULT {$this->parent->format_value($this->_default)}";
        } elseif ($this->_default_isnull === true) {
            $sql .= ' DEFAULT NULL';
        }
        if (isset($this->_auto_increment) && ($this->_auto_increment === true)) {
            if ($this->is_index() === false) {
                throw new sqlException('Auto column must be defined as a key');
            }
            $sql .= ' AUTO_INCREMENT';
        }
        if ($this->_comment !== null) {
            $sql .= " COMMENT {$this->parent->format_value($this->_comment)}";
        }
        if ($this->_first !== null) {
            $sql .= ($this->_first === true) ? ' FIRST' : " AFTER {$this->parent->quote_identifier($this->_first)}";
        }

        return $sql;
    }

    /**
     * Check if current column is indexed.
     *
     * @return bool TRUE if column is indexed, otherwise FALSE
     */
    public function is_index()
    {
        return ($this->_primary !== null) || ($this->_unique !== null) || ($this->_index !== null) || ($this->_fulltext !== null);
    }

    /**
     * Get column index definition SQL substring.
     *
     * @param $index_name index name
     *
     * @return string column index definition SQL substring
     */
    public function get_index_sql()
    {
        if ($this->_primary !== null) {
            $index_expr = ($this->_primary === true) ? $this->column_name : array($this->column_name, $this->_primary);

            return $this->parent->primary_key_sql(array($index_expr));
        } elseif ($this->_unique !== null) {
            $index_expr = ($this->_unique === true) ? $this->column_name : array($this->column_name, $this->_unique);

            return $this->parent->unique_key_sql(array($index_expr));
        } elseif ($this->_index !== null) {
            $index_expr = ($this->_index === true) ? $this->column_name : array($this->column_name, $this->_index);

            return $this->parent->index_key_sql(array($index_expr));
        } elseif ($this->_fulltext !== null) {
            return $this->parent->fulltext_key_sql(array($this->column_name));
        }

        return;
    }

    /**
     * PRIMARY KEY.
     *
     * @return this object
     */
    public function primary()
    {
        if (($this->_unique !== null) || ($this->_index !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        $this->_primary = true;

        return $this;
    }

    /**
     * UNIQUE (KEY).
     *
     * @return this object
     */
    public function unique()
    {
        if (($this->_primary !== null) || ($this->_index !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        $this->_unique = true;

        return $this;
    }

    /**
     * INDEX (KEY).
     *
     * @return this object
     */
    public function index()
    {
        if (($this->_primary !== null) || ($this->_unique !== null)) {
            throw new sqlException('Another key type is already defined for this column');
        }
        $this->_index = true;

        return $this;
    }

    /**
     * NULL.
     *
     * @return this object
     */
    public function null()
    {
        if ($this->_not_null === true) {
            throw new sqlException('Column definition already set to NOT NULL');
        }
        $this->_null = true;

        return $this;
    }

    /**
     * NOT NULL.
     *
     * @return this object
     */
    public function not_null()
    {
        if ($this->_null === true) {
            throw new sqlException('Column definition already set to NULL');
        }
        $this->_not_null = true;

        return $this;
    }

    /**
     * Set default column value.
     *
     * @param mixed $value column default value
     *
     * @return this object
     */
    public function default_value($value)
    {
        if (isset($this->_auto_increment) && ($this->_auto_increment === true)) {
            throw new sqlException('Cannot add default value to auto increment column');
        }
        /*
         if ($this->is_index() === true)
         {
        throw new sqlException("Cannot add default value to indexed column");
        }
        */
        if ($value === null) {
            $this->_default_isnull = true;
        }
        $this->_default = $value;

        return $this;
    }

    /**
     * Drop default column value
     * (ALTER TABLE only).
     *
     * @return this object
     */
    /*
     public function drop_default()
     {
    if (($this->_default !== NULL) || ($this->_default_isnull === true))
    {
    throw new sqlException("Cannot use drop_default() after default_value()");
    }
    $this->_default_drop = true;
    return $this;
    }
    */

    /**
     * Set column comment.
     *
     * @param string $comment column comment
     *
     * @return this object
     */
    public function comment($comment)
    {
        if (!$this->parent->is_str($comment, false, 255)) {
            throw new sqlException('Column comment must be a 255 maximum characters long string');
        }
        $this->_comment = $comment;

        return $this;
    }

    /**
     * FIRST
     * (Used in ALTER TABLE to add or move a column to a specific position).
     *
     * @param string $comment column comment
     *
     * @return this object
     */
    public function first()
    {
        $this->_first = true;

        return $this;
    }

    /**
     * AFTER column_name
     * (Used in ALTER TABLE to add or move a column to a specific position).
     *
     * @param string $column_name column name
     *
     * @return this object
     */
    public function after($column_name)
    {
        if (!$this->parent->is_str($column_name)) {
            throw new sqlException('Column name must be a non-empty string');
        }
        $this->_first = $column_name;

        return $this;
    }
}
