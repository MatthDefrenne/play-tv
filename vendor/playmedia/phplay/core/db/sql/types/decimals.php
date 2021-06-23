<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder floating-point and fixed-point columns definition methods
 * (all decimal column data types extends this class)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_types_decimals extends ppl_db_sql_types_base
{
    protected $_unsigned,
        $_zerofill,
        $_auto_increment;

    /**
     * Reset the column definition object.
     *
     * @return this object
     */
    public function reset()
    {
        parent::reset();
        $this->_unsigned = null;
        $this->_zerofill = null;
        $this->_auto_increment = null;

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
        if (($value !== null) && !$this->parent->is_num($value)) {
            throw new sqlException('Default value must be numeric');
        }

        return parent::default_value($value);
    }

    /**
     * UNSIGNED [ZEROFILL].
     *
     * @param bool $zerofill fill with zero if TRUE
     *
     * @return this object
     */
    public function unsigned($zerofill = null)
    {
        $this->_zerofill = ($zerofill === true) ? true : null;
        $this->_unsigned = true;

        return $this;
    }

    /**
     * SIGNED
     * (Cannot be ZEROFILL).
     *
     * @return this object
     */
    public function signed()
    {
        $this->_zerofill = null;
        $this->_unsigned = false;

        return $this;
    }

    /**
     * Check if current column is floating-point.
     *
     * @return bool TRUE if current column is floating-point type, otherwise FALSE
     */
    public function is_floating_point()
    {
        return isset($this->decimal_type) && (($this->decimal_type === 'FLOAT') || ($this->decimal_type === 'DOUBLE'));
    }

    /**
     * AUTO_INCREMENT.
     *
     * @return this object
     */
    public function auto_increment()
    {
        if ($this->_default !== null) {
            throw new sqlException('Column with default value cannot be auto increment');
        }
        if ($this->is_floating_point() === false) {
            throw new sqlException('Auto_increment applies only to integer and floating-point types');
        }
        $this->_auto_increment = true;

        return $this;
    }
}
