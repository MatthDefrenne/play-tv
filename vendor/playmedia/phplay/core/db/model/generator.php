<?php
/**
 * PHPlay Framework.
 *
 * DB Model generator class (under construction !)
 *
 * This class is used generate a model from a database table or create a table from a model
 *
 * TODO : function to_sql() which return SQL statements from push, etc ...
 * TODO : support synchronizing between model and database table
 * TODO :
 *        - At the moment, work only with MySQL !
 *        - Synchronized __push() (alter_table)
 *        - __pull()
 *
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.5
 */
final class ppl_db_model_generator extends ppl_db_model_base
{
    // PUSH & PULL mode constants
    const PUSH_PRESERVE = 0;
    const PUSH_DELETE = 1;
    const PULL_PRESERVE = 2;
    const PULL_DELETE = 3;

    /**
     * The database object instance.
     *
     * @var ppl_db
     */
    private $db;

    /**
     * The model table name.
     *
     * @var string
     */
    private $tablename;

    /**
     * The model columns metadata.
     *
     * @var array
     */
    private $columns;

    /**
     * The model table storage engine name.
     *
     * @var string
     */
    private $engine;

    /**
     * The model table charset name.
     *
     * @var string
     */
    private $charset;

    /**
     * The model table collation name.
     *
     * @var string
     */
    private $collate;

    /**
     * The initial auto increment value for the table associated to current model.
     *
     * @var int
     */
    private $auto_increment;

    /**
     * The model multi-column index expressions.
     *
     * @var array
     */
    private $keys;

    /**
     * Constructor.
     *
     * @param ppl_db $db database object
     */
    public function __construct(ppl_db $db)
    {
        $this->db = $db;
    }

    /**
     * PUSH model to database (PRESERVE MODE)
     * Create a new table if does not exists in current database, otherwise alter table in PRESERVE MODE.
     *
     * TODO : explain PUSH in PRESERVE MODE
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param bool   $replace    set to TRUE to create a new empty table from model (deleting any existing table and records !)
     * @param string $dest_name  optional destination table name
     */
    public function push_preserve($model_name, $replace = false, $dest_name = null)
    {
        $this->__push($model_name, $replace, self::PUSH_PRESERVE, $dest_name);
    }

    /**
     * PUSH model to database (DELETE MODE)
     * Create a new table if does not exists in current database, otherwise alter table in DELETE MODE.
     *
     * TODO : explain PUSH in DELETE MODE
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param bool   $replace    set to TRUE to create a new empty table from model (deleting any existing table and records !)
     * @param string $dest_name  optional destination table name
     */
    public function push_delete($model_name, $replace = false, $dest_name = null)
    {
        $this->__push($model_name, $replace, self::PUSH_DELETE, $dest_name);
    }

    /**
     * PUSH model to database.
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param bool   $replace    set to TRUE to create a new empty table from model (deleting any existing table and records !)
     * @param int    $mode       Push mode
     * @param string $dest_name  optional destination table name
     */
    private function __push($model_name, $replace, $mode, $dest_name = null)
    {
        // Load model metadata
        $this->load_model($model_name, $dest_name);

        // Proceed to PUSH
        if ($this->table_exists($this->tablename) && ($replace === false)) {
            $this->alter_table($mode); // Table exists
        } else {
            $this->create_table($replace); // Table does not exists (or replace requested)
        }
    }

    /**
     * PULL model from database (PRESERVE MODE)
     * Create a new model from table in current database, may also alter table depending on mode.
     *
     * TODO : explain PULL in PRESERVE MODE
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param string $dest_name  optional destination model name
     */
    public function pull_preserve($model_name, $dest_name = null)
    {
        $this->__pull($model_name, $replace, self::PULL_PRESERVE, $dest_name);
    }

    /**
     * PULL model from database (DELETE MODE)
     * Create a new model from table in current database, may also alter table depending on mode.
     *
     * TODO : explain PULL in DELETE MODE
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param string $dest_name  optional destination model name
     */
    public function pull_delete($model_name, $dest_name = null)
    {
        $this->__pull($model_name, $replace, self::PULL_DELETE, $dest_name);
    }

    /**
     * PULL model from database.
     *
     * @param mixed  $model_name model name (as string) or fully loaded model (as ppl_db_model)
     * @param int    $mode       pull mode
     * @param string $dest_name  optional destination model name
     */
    private function __pull($model_name, $mode, $dest_name = null)
    {
        throw new GeneratorException('Sorry, PULL is currently unsupported !');

        /*
        TODO :

        - Depending on mode, lod the existing model and read metadata
        - Backup existing model (move to /path/to/application/models/backup/model_name.php.timestamp_with_milliseconds)
        - Read database table schema
        - Create new model and alter table depending on mode (backup table ???)
        */

        // Load model metadata
        //$this->load_model($model_name, $dest_name);

        // Proceed to PULL
        if ($this->table_exists($this->tablename)) {

            // depending on $mode we may or not alter the table ???

            //$this->alter_table($mode); // Table exists
        } else {
            // Table not found
            // throw exception ???
        }
    }

    /**
     * Alter an existing table from model in current database.
     *
     * @param int $mode PULL/PUSH mode
     *
     * @return mixed the number of affected rows or FALSE on failure
     */
    private function alter_table($mode)
    {
        /*
        TODO :

        depending on mode and loaded model columns metadata, we are gonna add, edit or drop columns in database table
        */
    }

    /**
     * Create table from model in current database
     * (Used by __push method).
     *
     * @param bool $replace set to TRUE to create a new empty table from model (deleting any existing table and records !)
     */
    private function create_table($replace)
    {
        // DROP TABLE ?
        if ($replace === true) {
            $this->db->execute($this->db->sql->drop_table($this->tablename));
        }

        // CREATE TABLE
        $table = $this->db->sql->create_table($this->tablename);
        foreach ($this->columns as &$column) {
            // Get column definition (also remove validators for easier debug)
            $column = &$column[self::DEFINITION];
            unset($column[self::COL_VALIDATE]);

            // Create column object
            $col = $this->db->sql->column($column[self::COL_COLUMN]);

            // Set column type
            if (!isset($column[self::COL_LENGTH])) {
                $column[self::COL_LENGTH] = array(null, null);
            }
            $col = $this->set_column_type($col, $column);

            // Check for key
            if (isset($column[self::COL_KEY])) {
                $col = $this->set_column_key($col, $column);
            }

            // Check for default value
            if (isset($column[self::COL_DEFAULT])) {
                $col = $col->default_value($column[self::COL_DEFAULT]);
            }

            // Check for additionnal column definition
            if (isset($column[self::COL_DEFINITION])) {
                $col = $this->set_column_def($col, $column);
            }

            // Check for column charset
            if (isset($column[self::COL_CHARSET])) {
                $col = $col->charset($column[self::COL_CHARSET]);
            }

            // Check for column collation
            if (isset($column[self::COL_COLLATE])) {
                $col = $col->collate($column[self::COL_COLLATE]);
            }

            // Add column to statement
            $table->add_column($col);
        }

        // Check table options
        if ($this->engine !== null) {
            $table = $table->engine($this->engine);
        }
        if ($this->charset !== null) {
            $table = $table->charset($this->charset);
        }
        if ($this->collate !== null) {
            $table = $table->collate($this->collate);
        }
        if ($this->auto_increment !== null) {
            $table = $table->auto_increment($this->auto_increment);
        }

        // Check for multiple-column indexes (SQL Builder allow multi-column keys only for ALTER TABLE)
        $alter = $this->get_alter_from_keys();

        // Try to create table in current database
        $this->db->execute($table);

        // Alter the table for add multiple-column indexes (if any)
        if ($alter !== null) {
            $this->db->execute($alter);
        }
    }

    /**
     * Make an alter table object from optionnals keys (assumed multi-columns, but single column may work also)
     * (Internal) used by create_table().
     *
     * @return mixed the alter table object, otherwise NULL if no keys defined
     */
    private function get_alter_from_keys()
    {
        if ($this->keys === null) {
            return;
        }

        // Build ALTER TABLE SQL query object
        $alter = $this->db->sql->alter_table($this->tablename);
        foreach ($this->keys as $type => &$keys) {
            foreach ($keys as $args) {
                switch ($type) {
                    // Reminder : Multiple-column PRIMARY KEY is not supported
                    case self::UNIQUE:
                        $alter = call_user_func_array(array($alter, 'add_unique'), $args);
                        break;
                    case self::INDEX:
                        $alter = call_user_func_array(array($alter, 'add_index'), $args);
                        break;
                    case self::FULLTEXT:
                        $alter = call_user_func_array(array($alter, 'add_fulltext'), $args);
                        break;
                }
            }
        }

        return $alter;
    }

    /**
     * Set column object additionnal data type definition.
     *
     * @param ppl_db_sql_column $column  typed column object
     * @param array             $col_def column definition array
     *
     * @return ppl_db_sql_column the column with key set
     */
    private function set_column_def(ppl_db_sql_types_base $column, $col_def)
    {
        $definitions = &$col_def[self::COL_DEFINITION];
        $zerofill = in_array(self::ZEROFILL, $definitions, true);
        foreach ($definitions as $def) {
            switch ($def) {
                case self::AUTO_INCREMENT:
                    $column = $column->auto_increment();
                    break;

                case self::SIGNED:
                    $column = $column->signed($zerofill);
                    break;

                case self::UNSIGNED:
                    $column = $column->unsigned($zerofill);
                    break;

                case self::ISNULL:
                    $column = $column->null();
                    break;

                case self::NOTNULL:
                    $column = $column->not_null();
                    break;
            }
        }

        // Should never happen
        return $column;
    }

    /**
     * Set column object key from column definition.
     *
     * @param ppl_db_sql_column $column  typed column object
     * @param array             $col_def column definition array
     *
     * @return ppl_db_sql_column the column with key set
     */
    private function set_column_key(ppl_db_sql_types_base $column, $col_def)
    {
        // Read key info
        $length = null;
        $key = &$col_def[self::COL_KEY];
        if (is_array($key)) {
            $length = $key[1];
            $key = $key[0];
        }

        // Set column key
        switch ($key) {
            case self::PRIMARY:
                return $column->primary($length);

            case self::UNIQUE:
                return $column->unique($length);

            case self::INDEX:
                return $column->index($length);

            case self::FULLTEXT:
                return $column->fulltext();
        }

        // Column is FAKE_PRIMARY
        return $column;
    }

    /**
     * Set column object type from column definition.
     *
     * @param ppl_db_sql_column $column  column object
     * @param array             $col_def column definition array
     *
     * @return ppl_db_sql_column the column with type set
     */
    private function set_column_type(ppl_db_sql_column $column, $col_def)
    {
        // Read some required column metadata
        list($length, $decimal) = $col_def[self::COL_LENGTH];
        $is_binary = null;
        if (isset($col_def[self::COL_DEFINITION])) {
            $is_binary = in_array(self::ISBINARY, $col_def[self::COL_DEFINITION], true);
        }

        // Set column type
        switch ($col_def[self::COL_TYPE]) {
            case self::BOOL:
            case self::BOOL:
                return $column->boolean();

            case self::INT:
            case self::INTEGER:
                return $column->integer($length);

            case self::TINYINT:
                return $column->tinyint($length);

            case self::SMALLINT:
                return $column->smallint($length);

            case self::MEDIUMINT:
                return $column->mediumint($length);

            case self::BIGINT:
                return $column->bigint($length);

            case self::FLOAT:
                return $column->float($length, $decimal);

            case self::DOUBLE:
                return $column->double($length, $decimal);

            case self::DECIMAL:
                return $column->decimal($length, $decimal);

            case self::CHAR:
                return $column->char($length);

            case self::VARCHAR:
                return $column->varchar($length);

            case self::BINARY:
                return $column->binary($length);

            case self::VARBINARY:
                return $column->varbinary($length);

            case self::TEXT:
                return $column->text($is_binary);

            case self::TINYTEXT:
                return $column->tinytext($is_binary);

            case self::MEDIUMTEXT:
                return $column->mediumtext($is_binary);

            case self::LONGTEXT:
                return $column->longtext($is_binary);

            case self::BLOB:
                return $column->blob();

            case self::TINYBLOB:
                return $column->tinyblob();

            case self::MEDIUMBLOB:
                return $column->mediumblob();

            case self::LONGBLOB:
                return $column->longblob();

            case self::DATETIME:
                return $column->datetime();

            case self::DATE:
                return $column->date();

            case self::TIME:
                return $column->time();

            case self::TIMESTAMP:
                return $column->timestamp();
        }

        // Should never happen
        throw new GeneratorException('Unknown column type');
    }

    /**
     * Load model metadata.
     *
     * @param mixed  $name      model name (as string) or fully loaded model (as ppl_db_model)
     * @param string $dest_name optional destination table name
     *
     * @throws GeneratorException
     */
    private function load_model($name, $dest_name = null)
    {
        if (is_string($name)) {
            $model = $this->db->load($name, true); // Load full model (with metadata)
        } else {
            $model = $name; // Use provided model

            // Model object validation
            $parents = class_parents($model, true);
            if (($parents === false) || !isset($parents['ppl_db_model'])) {
                throw new GeneratorException('Loaded model must be a children of ppl_db_model class');
            }
            if (!$model->is_fully_loaded()) {
                throw new GeneratorException('Loaded Model must be fully loaded');
            }
        }

        // Set destination table name (if required)
        if ($dest_name !== null) {
            $model->set_tablename($dest_name);
        }

        // Read model metadata
        $this->tablename = $model->get_tablename();
        $this->columns = $model->get_columns();
        $this->engine = $model->get_engine();
        $this->charset = $model->get_charset();
        $this->collate = $model->get_collate();
        $this->auto_increment = $model->get_auto_increment();
        $this->keys = $model->get_keys();
    }

    /**
     * Check if table exists in current database.
     *
     * @param string $table_name table name
     *
     * @throws GeneratorException
     *
     * @return bool TRUE if table exitst, otherwise FALSE
     */
    private function table_exists($table_name)
    {
        $result = $this->db->query("SHOW TABLES LIKE '{$table_name}';");
        if ($result === false) {
            // Throws an exception to protect data
            throw new GeneratorException('table_exists() SHOW query failed');
        }

        return count($result) > 0;
    }

    /**
     * Archive a table in database (using model).
     *
     *  - CREATE temporary table using source model metadata
     *  - RENAME model table name to destination table name
     *  - RENAME temporary table to model table name
     *
     * Note : Renames are performed with single SQL query (Atomic in MySQL)
     *
     * @param string $source_model_name source model name
     * @param string $dest_table_name   destination table name
     * @param bool   $replace           set to TRUE to overwrite destination table (if exists)
     *
     * @throws GeneratorException
     */
    public function archive_to($source_model_name, $dest_table_name, $replace = false)
    {
        $replace = ($replace === true) ? true : false;

        if ($replace) {
            // Delete destination table (if exists)
            $this->db->execute(
                    $this->db->sql->drop_table($dest_table_name)
            );
        } else {
            // Check if destination table exists
            if ($this->table_exists($dest_table_name)) {
                throw new GeneratorException("Destination table '{$dest_table_name}' already exists, archive_to() aborted");
            }
        }

        // Generate temporary table name
        $tmp_table_name = $dest_table_name.'_'.rand(9999, 99999).'_tmp';

        // Get source table name
        $source_table_name = (is_string($source_model_name)) ? $source_model_name : $source_model_name->get_tablename();

        // Create temporary table name using source model
        $this->push_preserve($source_model_name, true, $tmp_table_name);

        // Rename tables (atomic)
        $this->db->execute(
                $sql = $this->db->sql->rename_table()
                ->to($source_table_name, $dest_table_name)  // Source model table to destination table
                ->to($tmp_table_name, $source_table_name)   // Temporary table to source table
        );
    }

    private function __clone()
    {
    }
}
final class GeneratorException extends Exception
{
}
