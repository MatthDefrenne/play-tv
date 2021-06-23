<?php
/**
 * PHPlay Framework.
 *
 * DB Model base class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_model_base
{
    const
        INSERT = 0,
        EDIT = 1,
        MODIFIED = 0,
        NOT_MODIFIED = 1,
        DEFINITION = 0,
        STATUS = 1,
        VALUE = 3,
        COL_NAME = 'name',
        COL_COLUMN = 'column',
        COL_TYPE = 'type',
        COL_KEY = 'key',
        COL_LENGTH = 'length',
        COL_DEFINITION = 'definition',
        COL_DEFAULT = 'default',
        COL_CHARSET = 'charset',
        COL_COLLATE = 'collate',
        COL_VALIDATE = 'validation',

        // COLUMN DEFINITION
        AUTO_INCREMENT = 0,
        SIGNED = 1,    // only numeric types
        UNSIGNED = 2,    // only numeric types
        ZEROFILL = 3,    // only numeric types
        ISNULL = 4,
        NOTNULL = 5,
        ISBINARY = 6,    // only TEXT types

        // COLUMN KEY TYPE
        PRIMARY = 0,
        UNIQUE = 1,
        INDEX = 2,
        FULLTEXT = 3,
        FAKE_PRIMARY = 4,    // Assign a column as primary in model without primary key in table (usefull for ARCHIVE storage engine)

        // COLUMN DATA TYPES
        BOOL = 100,
        BOOLEAN = 100,
        INT = 101,
        INTEGER = 101,
        TINYINT = 102,
        SMALLINT = 103,
        MEDIUMINT = 104,
        BIGINT = 105,
        FLOAT = 106,
        DOUBLE = 107,
        DECIMAL = 108,
        CHAR = 109,
        VARCHAR = 110,
        BINARY = 111,
        VARBINARY = 112,
        TEXT = 113,
        TINYTEXT = 114,
        MEDIUMTEXT = 115,
        LONGTEXT = 116,
        BLOB = 117,
        TINYBLOB = 118,
        MEDIUMBLOB = 119,
        LONGBLOB = 120,
        DATETIME = 121,
        DATE = 122,
        TIME = 123,
        TIMESTAMP = 124;
}
