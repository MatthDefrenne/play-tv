<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder blob column definition
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_types_blob extends ppl_db_sql_types_strings
{
    private $blob_type;

    /**
     * Reset the column definition object.
     *
     * @param string $blob_type SQL blob data type (default is NULL for avoid E_STRICT error)
     *
     * @return this object
     * @override
     */
    public function reset($blob_type = null)
    {
        parent::reset();
        $this->blob_type = $blob_type;

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

        return $this->get_column_name().$new_col_name.$this->blob_type.parent::get_sql();
    }

    /**
     * No collation for BLOB column type.
     *
     * @throw sqlException
     * @override
     */
    public function collate($collation_name)
    {
        throw new sqlException('Cannot set collation to BLOB column');
    }

    /**
     * No character set for BLOB column type.
     *
     * @throw sqlException
     * @override
     */
    public function charset($charset_name)
    {
        throw new sqlException('Cannot set charset to BLOB column');
    }
}
