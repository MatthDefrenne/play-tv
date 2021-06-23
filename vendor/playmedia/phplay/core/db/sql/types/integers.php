<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder integer columns definition methods
 * (all integer column data types extends this class)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_types_integers extends ppl_db_sql_types_base
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
        if ($value !== null) {
            // $value may be a boolean --> tinyint(1)
            if (is_bool($value)) {
                $value = ($value) ? 1 : 0;
            }
            if (!is_int($value)) {
                throw new sqlException('Default value must be an integer');
            }
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
     * AUTO_INCREMENT.
     *
     * @return this object
     */
    public function auto_increment()
    {
        if ($this->_default !== null) {
            throw new sqlException('Column with default value cannot be auto increment');
        }
        $this->_auto_increment = true;

        return $this;
    }
}
