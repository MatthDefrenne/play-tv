<?php
/**
 * PHPlay Framework.
 *
 * DB Model class
 *
 * TODO : CRITICAL BUG : Archive engine cannot be indexed but support auto_increment column --> self::FAKE_PRIMARY
 *
 * TODO : "setted" state for each columns and make a query on __get() if "unsetted" ??
 * TODO : use $loadall flag for faster loading optimizations (ignore validator, etc...)
 * TODO : documentation (constants, select_all_expr(), repository, etc...)
 * TODO : ignore value on bad datatype in setter or still throws an exception ?
 * TODO : add comment support ???? or waste of memory ??
 * TODO : default validator : use REGEX for date & time datatypes ??
 * TODO : finish ppl_db_model_generator
 *
 * TODO : from_array( array, insert_mode=false ?, $use_column= false)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.4
 */
abstract class ppl_db_model extends ppl_db_model_base
{
    /**
     * The SELECT model statement object.
     *
     * @var ppl_db_sql_select
     */
    private $select = null;

    /**
     * The INSERT model statement object.
     *
     * @var ppl_db_sql_insert
     */
    private $insert = null;

    /**
     * The UPDATE model statement object.
     *
     * @var ppl_db_sql_update
     */
    private $update = null;

    /**
     * The DELETE model statement object.
     *
     * @var ppl_db_sql_delete
     */
    private $delete = null;

    /**
     * The database object.
     *
     * @var ppl_db
     */
    protected $db;

    /**
     * Indicates if the model if fully loaded.
     *
     * @var bool
     */
    protected $loadall;

    /**
     * The table name.
     *
     * @var string
     */
    protected $tablename = null;

    /**
     * The primary column name.
     *
     * @var string
     */
    protected $primary = null;

    /**
     * The primary column value.
     *
     * @var mixed
     */
    protected $primary_value = null;

    /**
     * The table engine name.
     *
     * @var string
     */
    protected $engine = null;

    /**
     * The table charset name.
     *
     * @var string
     */
    protected $charset = null;

    /**
     * The table collation name.
     *
     * @var string
     */
    protected $collate = null;

    /**
     * The Table autoincrement value.
     *
     * @var int
     */
    protected $auto_increment = null;

    /**
     * The model columns metadata.
     *
     * @var array
     */
    private $columns = array();

    /**
     * The table keys
     * (multi-column index expressions).
     *
     * @var array
     */
    private $keys = null;

    /**
     * The model mode.
     *
     * @var int
     */
    private $mode = null;

    /**
     * Model table definition (must be implemented in parent).
     */
    abstract public function __define();

    /**
     * Constructor.
     *
     * @param ppl_db $db      database object
     * @param bool   $loadall set to TRUE to load all metadata (used by ppl_db_model_generator)
     */
    final public function __construct(ppl_db $db, $loadall = false)
    {
        $this->db = $db;
        $this->loadall = ($loadall === true) ? true : false;
        $this->__define();

        if ($this->tablename === null) {
            throw new ModelException('Tablename is undefined');
        }
        if (count($this->columns) === 0) {
            throw new ModelException('Columns are undefined');
        }
        if ($this->primary === null) {
            throw new ModelException('Primary key is undefined');
        }
        $this->insert();
    }

    /**
     * Determine whether the model is fully loaded.
     *
     * @return bool TRUE if fully loaded, otherwise FALSE
     */
    final public function is_fully_loaded()
    {
        return $this->loadall;
    }

    /**
     * Set table name.
     *
     * @param string $tablename table name
     */
    final public function set_tablename($tablename)
    {
        if (!is_string($tablename) || ($tablename === '')) {
            throw new ModelException('Tablename must be a non-empty string');
        }
        $this->tablename = $tablename;
    }

    /**
     * Add a column to model.
     *
     * Possible key values in $column array are :
     *
     *    <ul>
     *    <li>'name'       : property name (is also table column name if none specified)
     *    <li>'type'       : column data type (see constants)
     *    <li>'key'        : (optional) key type --> can be an integer (see constants) or an array with key type and length ex: array(self::PRIMARY, 10)
     *    <li>'column'     : (optional) table column name
     *    <li>'length'     : (optional) column length (can be an integer or a coma-separated string)
     *    <li>'definition' : (optional) Array of column definition constants (see constants)
     *    <li>'default'    : (optional) column default value
     *    <li>'charset'    : (optional) column charset name (only CHAR or TEXT data types)
     *    <li>'collate'    : (optional) column collation name (only CHAR or TEXT data types)
     *    <li>'validation' : (optional) Array of callable (callable are methods in parent)
     *    </ul>
     *
     * Example :
     *
     *    <pre>
     *    $this->add_column(
     *            'name' => 'id',
     *            'type' => self::INT,
     *            'key' => self::PRIMARY,
     *            'definition' => array(self::AUTO_INCREMENT, self::UNSIGNED)
     *    );
     *    </pre>
     *
     * @param array $column column definition
     */
    final public function add_column(array $column)
    {
        // Check if model property name is defined
        if (!isset($column[self::COL_NAME])) {
            throw new ModelException("'".self::COL_NAME."' is undefined in column definition");
        }
        // Check if column name is defined
        if (!isset($column[self::COL_COLUMN])) {
            $column[self::COL_COLUMN] = $column[self::COL_NAME];
        }
        // Check if column type is defined
        if (!isset($column[self::COL_TYPE])) {
            throw new ModelException("'".self::COL_TYPE."' is undefined in column definition");
        }
        // Check if column key is defined
        if (isset($column[self::COL_KEY])) {
            // KEY may be an integer (constant) or an array with type and length
            $key = $column[self::COL_KEY];
            if (is_array($key) && (count($key) === 2) && is_int($key[0]) && is_int($key[1])) {
                $key = $key[0];
            } elseif (!is_int($key)) {
                throw new ModelException("'".self::COL_KEY."' is invalid in column definition");
            }
            if (($key === self::PRIMARY) || ($key === self::FAKE_PRIMARY)) {
                if ($this->primary !== null) {
                    throw new ModelException("Primary key already defined in '{$this->primary}' column definition");
                }
                $this->primary = $column['name'];
            }
        }
        // Check if column length is defined
        if (isset($column[self::COL_LENGTH])) {
            // LENGTH may be an integer or a comma-separated string
            $length = &$column[self::COL_LENGTH];
            if (is_int($length)) {
                $length = array($length, null);
            } elseif (is_string($length)) {
                // Format expected is 'precision' or 'precision, scale'
                $length = explode(',', $length, 2);
                if (isset($length[0])) {
                    $length[0] = trim($length[0]);
                    if (!is_numeric($length[0])) {
                        throw new ModelException("'".self::COL_LENGTH."' is invalid in column definition");
                    }
                    $length[0] = (int) $length[0];
                }
                if (isset($length[1])) {
                    $length[1] = trim($length[1]);
                    if (!is_numeric($length[1])) {
                        throw new ModelException("'".self::COL_LENGTH."' is invalid in column definition");
                    }
                    $length[1] = (int) $length[1];
                }
            } else {
                throw new ModelException("'".self::COL_LENGTH."' is invalid in column definition");
            }
        }
        // Check column definition
        if (isset($column[self::COL_DEFINITION]) && !is_array($column[self::COL_DEFINITION])) {
            throw new ModelException("'".self::COL_DEFINITION."' is invalid in column definition");
        }
        // Check if column charset is defined
        if (isset($column[self::COL_CHARSET]) && (!is_string($column[self::COL_CHARSET]) || $column[self::COL_CHARSET] === '')) {
            throw new ModelException("'".self::COL_CHARSET."' is invalid in column definition");
        }
        // Check if column collation is defined
        if (isset($column[self::COL_COLLATE]) && (!is_string($column[self::COL_COLLATE]) || $column[self::COL_COLLATE] === '')) {
            throw new ModelException("'".self::COL_COLLATE."' is invalid in column definition");
        }
        // Set default validator
        if (isset($column[self::COL_VALIDATE])) {
            $column[self::COL_VALIDATE][] = array($this, 'default_validator');
        } else {
            $column[self::COL_VALIDATE] = array(array($this, 'default_validator'));
        }
        // Add the column
        $this->columns[$column['name']] = array(self::DEFINITION => $column, self::STATUS => self::NOT_MODIFIED, self::VALUE => null);
    }

    /**
     * Get table name.
     *
     * @return string the table name
     */
    final public function get_tablename()
    {
        return $this->tablename;
    }

    /**
     * Get model columns.
     *
     * @return array model columns
     */
    final public function get_columns()
    {
        return $this->columns;
    }

    /**
     * Set table storage engine name.
     *
     * @param string $engine table storage engine name
     */
    final public function set_engine($engine)
    {
        if (!is_string($engine) || ($engine === '')) {
            throw new ModelException('Table storage engine name must be a non-empty string');
        }
        if ($this->loadall === true) {
            $this->engine = $engine;
        }
    }

    /**
     * Get table storage engine name.
     *
     * @return string the table storage engine name
     */
    final public function get_engine()
    {
        return $this->engine;
    }

    /**
     * Set table charset name.
     *
     * @param string $charset table charset name
     */
    final public function set_charset($charset)
    {
        if (!is_string($charset) || ($charset === '')) {
            throw new ModelException('Table charset name must be a non-empty string');
        }
        if ($this->loadall === true) {
            $this->charset = $charset;
        }
    }

    /**
     * Get table charset name.
     *
     * @return string the table charset name
     */
    final public function get_charset()
    {
        return $this->charset;
    }

    /**
     * Set table collation name.
     *
     * @param string $collate table collation name
     */
    final public function set_collate($collate)
    {
        if (!is_string($collate) || ($collate === '')) {
            throw new ModelException('Table collation name must be a non-empty string');
        }
        if ($this->loadall === true) {
            $this->collate = $collate;
        }
    }

    /**
     * Get table collation name.
     *
     * @return string the table collation name
     */
    final public function get_collate()
    {
        return $this->collate;
    }

    /**
     * Set initial auto increment value for the table.
     *
     * @param int $value initial auto increment value for the table
     */
    final public function set_auto_increment($value)
    {
        if (!is_int($value) || ($value < 1)) {
            throw new ModelException('Initial auto increment value for the table must be a positive integer');
        }
        if ($this->loadall === true) {
            $this->auto_increment = $value;
        }
    }

    /**
     * Get initial auto increment value for the table.
     *
     * @return int initial auto increment value for the table
     */
    final public function get_auto_increment()
    {
        return $this->auto_increment;
    }

    /**
     * Returns true if the model is new.
     *
     * @return bool
     */
    public function is_new()
    {
        return $this->mode === self::INSERT;
    }

    /**
     * Add a key.
     *
     * @param int   $type type of key
     * @param array $args index expressions
     */
    private function add_key($type, $args)
    {
        if ($this->keys === null) {
            $this->keys = array();
        }
        $this->keys[$type][] = $args;
    }

    /**
     * Get keys.
     *
     * @return array multi-column index expressions
     */
    final public function get_keys()
    {
        return $this->keys;
    }

    /**
     * ADD PRIMARY KEY
     * (Unsupported).
     *
     * @throws ModelException
     */
    final public function add_primary()
    {
        throw new ModelException('Multiple-column Primary key is not supported');
    }

    /**
     * ADD UNIQUE (KEY)
     * (This method is for multiple-column indexes).
     *
     * @see ppl_db_sql_alter_table::add_unique()
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     */
    final public function add_unique()
    {
        if (func_num_args() === 0) {
            throw new ModelException('add_unique() require at least one parameter');
        }
        if ($this->loadall === true) {
            $args = func_get_args();
            $this->add_key(self::UNIQUE, $args);
        }
    }

    /**
     * ADD INDEX (KEY)
     * (This method is for multiple-column indexes).
     *
     * @see ppl_db_sql_alter_table::add_index()
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     */
    final public function add_index()
    {
        if (func_num_args() === 0) {
            throw new ModelException('add_index() require at least one parameter');
        }
        if ($this->loadall === true) {
            $args = func_get_args();
            $this->add_key(self::INDEX, $args);
        }
    }

    /**
     * ADD FULLTEXT index
     * (This method is for multiple-column indexes).
     *
     * @see ppl_db_sql_alter_table::add_fulltext()
     *
     * @return this object
     */
    final public function add_fulltext($key_name)
    {
        if (func_num_args() === 0) {
            throw new ModelException('add_fulltext() require at least one parameter');
        }
        if ($this->loadall === true) {
            $args = func_get_args();
            $this->add_key(self::FULLTEXT, $args);
        }
    }

    /**
     * Check if a column is AUTO_INCREMENT.
     *
     * @param array $column column definition
     *
     * @return bool TRUE if auto increment, otherwise FALSE
     */
    private function is_auto_increment($column)
    {
        return isset($column[self::DEFINITION][self::COL_DEFINITION]) && in_array(self::AUTO_INCREMENT, $column[self::DEFINITION][self::COL_DEFINITION], true);
    }

    /**
     * Getter.
     *
     * @param string $name property name
     *
     * @return mixed property value
     */
    final public function __get($name)
    {
        if (isset($this->columns[$name])) {
            return $this->columns[$name][self::VALUE];
        }
    }

    /**
     * Setter.
     *
     * @param string $name  property name
     * @param string $value property value
     *
     * @return mixed property value
     */
    final public function __set($name, $value)
    {
        if (isset($this->columns[$name])) {
            // Set value
            $this->inject_column_value($this->columns[$name], $value);
            $this->columns[$name][self::STATUS] = self::MODIFIED;
        }
    }

    /**
     * Caller.
     *
     * @param string $name
     * @param mixed  $arguments
     *
     * @throws ModelException
     *
     * @return mixed current model object
     */
    final public function __call($name, $arguments)
    {
        if (strpos($name, 'find_by_') === 0) {
            $col = mb_substr($name, 8);
            if (isset($this->columns[$col])) {
                if (isset($arguments[0])) {
                    return $this->find_one(array($col => $arguments[0]));
                } else {
                    throw new ModelException("{$name} require one parameter");
                }
            } else {
                throw new ModelException("{$name}: Incorrect column name '{$col}'");
            }
        }
    }

    /**
     * Set model to INSERT mode.
     *
     * @return mixed current model object
     */
    final public function insert()
    {
        if ($this->mode === self::INSERT) {
            return $this;
        }
        foreach ($this->columns as &$column) {
            // Set default value if any and set status (modified or not modified)
            if (isset($column[self::DEFINITION][self::COL_DEFAULT])) {
                // Force data type (may result in strange behaviours IF default value not set properly in model)
                $this->inject_column_value($column, $column[self::DEFINITION][self::COL_DEFAULT]);
                $column[self::STATUS] = self::MODIFIED;
            } else {
                $column[self::VALUE] = null;
                $column[self::STATUS] = self::NOT_MODIFIED;
            }
        }
        $this->mode = self::INSERT;

        return $this;
    }

    /**
     * Find one or several records
     * (Variadic function, result depend on number of arguments).
     *
     * Arguments may be :
     *
     *    Primary key value (one argument)      : find(5)
     *    Column name and value (two arguments) : find('name', 'kenny')
     *    Array of column name and value        : find( array('name' => 'bob', 'level' = 8) )
     *
     * Reminder : this method does NOT perform any ORDER BY
     *
     * @return array results as array of row (empty array if none found)
     */
    final public function find()
    {
        $fna = func_num_args();
        $args = func_get_args();
        if ($fna === 1) {
            if (is_array($args[0])) {
                return $this->find_by($args[0], false);
            }

            return $this->find_by(array($this->primary => $args[0]), false);
        } elseif ($fna === 2) {
            return $this->find_by(array($args[0] => $args[1]), false);
        }
        throw new ModelException('Incorrect number of arguments for find()');
    }

    /**
     * Find all records.
     *
     * @return array all records in table
     */
    final public function find_all()
    {
        return $this->find_by(array(), false);
    }

    /**
     * Find one record
     * (Variadic function, result depend on number of arguments).
     *
     * Arguments may be :
     *
     *    Primary key value (one argument)      : find_one(5)
     *    Column name and value (two arguments) : find_one('name', 'kenny')
     *    Array of column name and value        : find_one( array('name' => 'bob', 'level' = 8) )
     *
     * Reminder : this method does NOT perform any ORDER BY and return the FIRST one found
     *
     * @return mixed current model object filled ($this) or FALSE if none found
     */
    final public function find_one()
    {
        $fna = func_num_args();
        $args = func_get_args();
        if ($fna === 1) {
            if (is_array($args[0])) {
                return $this->find_by($args[0]);
            }

            return $this->find_by(array($this->primary => $args[0]));
        } elseif ($fna === 2) {
            return $this->find_by(array($args[0] => $args[1]));
        }
        throw new ModelException('Incorrect number of arguments for find_one()');
    }

    /**
     * Return SQL SELECT expression of all columns of current model
     * (this method preserve column name used in model for alias real table column name).
     *
     * @return array column select expression
     */
    private function select_all_expr()
    {
        $fields = array();
        foreach ($this->columns as $column) {
            if ($column[self::DEFINITION][self::COL_COLUMN] === $column[self::DEFINITION][self::COL_NAME]) {
                $fields[] = $column[self::DEFINITION][self::COL_COLUMN];
            } else {
                $fields[] = $column[self::DEFINITION][self::COL_COLUMN].'.'.$column[self::DEFINITION][self::COL_NAME];
            }
        }

        return $fields;
    }

    /**
     * Find by conditions
     * (called by find() and find_one()).
     *
     * @param array $conditions array of conditions
     * @param bool  $one        set to FALSE may return an array of rows
     *
     * @return mixed current model object filled (FALSE if none found) or array of row (empty array if none found)
     */
    private function find_by($conditions, $one = true)
    {
        // SELECT all columns FROM tablename
        $select = $this->__select();
        // WHERE conditions
        foreach ($conditions as $name => $value) {
            if (!isset($this->columns[$name])) {
                throw new ModelException("Column '{$name}' not found in model");
            }
            $select = $select->where($this->columns[$name][self::DEFINITION][self::COL_COLUMN], $value);
        }
        // LIMIT
        if ($one === true) {
            $select = $select->limit(1);
        }
        // Execute SELECT query statement
        $result = $this->db->execute($select);

        // Return $this (or FALSE)
        if ($one === true) {
            return $this->from_array($result);
        }

        // Return Array of row (or empty array)
        if ($result === false) {
            return array();
        }

        return $result;
    }

    /**
     * Update primary value
     * (used for store initial value).
     */
    private function update_primary_value()
    {
        $this->primary_value = $this->columns[$this->primary][self::VALUE];
    }

    /**
     * Inject a record in current model (as an array).
     *
     *    - Model can be partially injected (only primary key is mandatory)
     *    - Row must be a non-empty array (which contain primary key identifier)
     *    - Otherwise, take the first valid element in multi-dimensional Array (which contains primary key identifier)
     *    - Model is set to EDIT mode on success
     *
     * @param array $row        the record to inject
     * @param bool  $use_column indicate if we use columns name or model properties for injection
     *
     * @return this model object or FALSE
     */
    final public function from_array($row, $use_column = false)
    {
        // Row must be a non-empty array
        if (!is_array($row) || (count($row) === 0)) {
            return false;
        }

        // Get expected primary column identifier
        $primary = ($use_column === true) ? $this->columns[$this->primary][self::DEFINITION][self::COL_COLUMN] : $this->columns[$this->primary][self::DEFINITION][self::COL_NAME];

        // Search the first matching array (which contains primary key identifier)
        if (!isset($row[$primary])) {
            // Consider row as multi-dimensionnal array with several records
            $found = false;
            foreach ($row as $record) {
                if (is_array($record) && isset($record[$primary]) && ($record[$primary] !== null)) {
                    $row = $record;
                    $found = true;
                    break;
                }
            }
            if ($found === false) {
                return false; // Primary key not found
            }
        }

        // At this point, row is non-empty array which contain at least primary key
        if ($use_column === true) {
            // Inject in model using columns name
            foreach ($row as $name => &$value) {
                foreach ($this->columns as $property => $column) {
                    if ($column[self::DEFINITION][self::COL_COLUMN] === $name) {
                        $this->inject_column_value($this->columns[$property], $value);
                        $this->columns[$property][self::STATUS] = self::NOT_MODIFIED;
                        break;
                    }
                }
            }
        } else {
            // Inject in model using properties name
            foreach ($row as $name => &$value) {
                if (isset($this->columns[$name])) {
                    $this->inject_column_value($this->columns[$name], $value);
                    $this->columns[$name][self::STATUS] = self::NOT_MODIFIED;
                }
            }
        }

        // Update primary value and set to EDIT mode
        $this->update_primary_value();
        $this->mode = self::EDIT;

        return $this;
    }

    /**
     * Return the current record as associative_array.
     * The model MUST be in EDIT mode, otherwise throw a model exception.
     *
     * @throws ModelException
     *
     * @return array The current record
     */
    public function to_array()
    {
        if ($this->mode === self::INSERT) {
            throw new ModelException('EDIT mode is required for to_array()');
        }
        $array = array();
        foreach ($this->columns as $name => &$column) {
            $array[$name] = $column[self::VALUE];
        }

        return $array;
    }

    /**
     * Delete one or several records
     * (Variadic function).
     *
     * Arguments may be :
     *
     *    Delete current record (no argument)	: delete()
     *    Primary key value (one argument)      : delete(5)
     *    Column name and value (two arguments) : delete('name', 'kenny')
     *    Array of column name and value        : delete( array('name' => 'bob', 'level' = 8) )
     *
     * @return int number of deleted rows
     */
    final public function delete()
    {
        $fna = func_num_args();
        $args = func_get_args();
        if ($fna === 0) {
            if ($this->mode === self::INSERT) {
                throw new ModelException('EDIT mode is required for delete() without arguments');
            }
            // Delete current record (no argument in edit mode) --> set to INSERT mode
            $r = $this->delete_by(array($this->primary => $this->columns[$this->primary][self::VALUE]));
            $this->insert();

            return $r;
        } elseif ($fna === 1) {
            if (is_array($args[0])) {
                if (count($args[0]) === 0) {
                    // Note : use delete_all() for delete all records from table
                    throw new ModelException('Empty array is an invalid arguments for delete()');
                }

                return $this->delete_by($args[0]);
            }

            return $this->delete_by(array($this->primary => $args[0]));
        } elseif ($fna === 2) {
            return $this->delete_by(array($args[0] => $args[1]));
        }
        throw new ModelException('Incorrect number of arguments for delete()');
    }

    /**
     * Delete all record from table.
     *
     * @return int number of deleted rows
     */
    final public function delete_all()
    {
        return $this->delete_by(array());
    }

    /**
     * Delete by conditions
     * (called by delete() and delete_all()).
     *
     * @param array $conditions array of conditions
     *
     * @return int number of deleted rows
     */
    private function delete_by($conditions)
    {
        // DELETE from tablename
        $delete = $this->__delete();
        // WHERE conditions
        foreach ($conditions as $name => $value) {
            if (!isset($this->columns[$name])) {
                throw new ModelException("Column '{$name}' not found in model");
            }
            $delete = $delete->where($this->columns[$name][self::DEFINITION][self::COL_COLUMN], $value);
        }
        // Execute DELETE query statement
        return $this->db->execute($delete);
    }

    /**
     * Check if a record exists.
     *
     * @param mixed $value primary key value
     *
     * @return bool TRUE if exists, otherwise FALSE
     */
    final public function exists($value)
    {
        if ($this->select === null) {
            $this->select = $this->db->sql->select();
        }
        $row = $this->execute($this->select->reset()->from($this->tablename, $this->primary)->where($this->primary, $value));

        return isset($row[0]);
    }

    /**
     * Inject a column value with correct data type.
     *
     * @param array $column column (as ref)
     * @param mixed $value  value to set (as ref)
     */
    private function inject_column_value(&$column, &$value)
    {
        // Column value validation
        $this->validate_column_value($column, $value);

        // Inject column value
        switch ($column[self::DEFINITION][self::COL_TYPE]) {
            // AS BOOLEAN
            case self::BOOLEAN:
                $column[self::VALUE] = (($value === null) ? null : (bool) $value);
                break;

                // AS INTEGER
            case self::INT:
            case self::INTEGER:
            case self::TINYINT:
            case self::SMALLINT:
            case self::MEDIUMINT:
            case self::BIGINT:
                $column[self::VALUE] = (($value === null) ? null : (int) $value);
                break;

                // AS FLOAT
            case self::FLOAT:
            case self::DOUBLE:
            case self::DECIMAL:
                $column[self::VALUE] = (($value === null) ? null : (float) $value);
                break;

                // AS STRING
            case self::CHAR:
            case self::VARCHAR:
            case self::BINARY:
            case self::VARBINARY:
            case self::TEXT:
            case self::TINYTEXT:
            case self::MEDIUMTEXT:
            case self::LONGTEXT:
            case self::BLOB:
            case self::TINYBLOB:
            case self::MEDIUMBLOB:
            case self::LONGBLOB:
            case self::DATETIME:
            case self::DATE:
            case self::TIME:
            case self::TIMESTAMP:
                $column[self::VALUE] = (($value === null) ? null : (string) $value);
                break;
        }
    }

    /**
     * Apply column validators on value (if any).
     *
     * @param array $column column (as ref)
     * @param mixed $value  value to set (as ref)
     *
     * @throws ModelException on validation error
     */
    private function validate_column_value(&$column, &$value)
    {
        // Check for column validators
        if (isset($column[self::DEFINITION][self::COL_VALIDATE])) {
            // Call column validator(s)
            $validators = &$column[self::DEFINITION][self::COL_VALIDATE];
            foreach ($validators as $callable) {
                // Reminder : ppl_callback will properly detect if static call required
                $result = ppl_callback::call($callable, array(&$value, &$column));
                if ($result !== true) {
                    $msg = (($result !== false) && is_string($result)) ? " ({$result})" : '';
                    throw new ModelException("Validation error for property '{$column[self::DEFINITION][self::COL_NAME]}'{$msg}");
                }
            }
        }
    }

    /**
     * Default Validator
     * (set to added columns).
     *
     * @param mixed $value  column value
     * @param array $column column definition array
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function default_validator(&$value, &$column)
    {
        // Check for NULL
        $allow_null = (isset($column[self::DEFINITION][self::COL_DEFINITION]) && !in_array(self::NOTNULL, $column[self::DEFINITION][self::COL_DEFINITION], true));
        if ($value === null) {
            return ($allow_null === true) ? true : 'NULL value is not allowed';
        }

        // Check for UNSIGNED in column definition
        $unsigned = (isset($column[self::DEFINITION][self::COL_DEFINITION]) && in_array(self::UNSIGNED, $column[self::DEFINITION][self::COL_DEFINITION], true));

        // Check value according column definition
        switch ($column[self::DEFINITION][self::COL_TYPE]) {
            // BOOLEAN
            case self::BOOLEAN:
                if (is_bool($value)) {
                    return true;
                }
                if (is_numeric($value)) {
                    // Truncate any float value and check for 0 or 1
                    $value = (int) $value;
                    if (($value === 0) || ($value === 1)) {
                        return true;
                    }
                }

                return 'Expected boolean value';

                // INTEGER
            case self::INT:
            case self::INTEGER:
                if ($unsigned === true) {
                    return ($this->db->sql->is_num($value, $allow_null, 0, 4294967295)) ? true : 'Expected integer value between 0 and 4294967295';
                } else {
                    return ($this->db->sql->is_num($value, $allow_null, -2147483648, 2147483647)) ? true : 'Expected integer value between -2147483648 and 2147483647';
                }
            case self::TINYINT:
                if ($unsigned === true) {
                    return ($this->db->sql->is_num($value, $allow_null, 0, 255)) ? true : 'Expected integer value between 0 and 255';
                } else {
                    return ($this->db->sql->is_num($value, $allow_null, -128, 127)) ? true : 'Expected integer value between -128 and 127';
                }
            case self::SMALLINT:
                if ($unsigned === true) {
                    return ($this->db->sql->is_num($value, $allow_null, 0, 65535)) ? true : 'Expected integer value between 0 and 65535';
                } else {
                    return ($this->db->sql->is_num($value, $allow_null, -32768, 32767)) ? true : 'Expected integer value between -32768 and 32767';
                }
            case self::MEDIUMINT:
                if ($unsigned === true) {
                    return ($this->db->sql->is_num($value, $allow_null, 0, 16777215)) ? true : 'Expected integer value between 0 and 16777215';
                } else {
                    return ($this->db->sql->is_num($value, $allow_null, -8388608, 8388607)) ? true : 'Expected integer value between -8388608 and 8388607';
                }
            case self::BIGINT:
                if ($unsigned === true) {
                    return ($this->db->sql->is_num($value, $allow_null, 0, 18446744073709551615)) ? true : 'Expected integer value between 0 and 18446744073709551615';
                } else {
                    return ($this->db->sql->is_num($value, $allow_null, -9223372036854775808, 9223372036854775807)) ? true : 'Expected integer value between -9223372036854775808 and 9223372036854775807';
                }

                // AS FLOAT
            case self::FLOAT:
            case self::DOUBLE:
            case self::DECIMAL:
                if (is_numeric($value)) {
                    if (($unsigned === true) && ((float) $value >= 0)) {
                        return true;
                    } elseif ($unsigned === false) {
                        return true;
                    }
                }

                return ($unsigned === true) ? 'Expected positive decimal value' : 'Expected decimal value';
                // TODO : check precision and scale ?

                // AS STRING
            case self::CHAR:
            case self::VARCHAR:
            case self::BINARY:
            case self::VARBINARY:
            case self::TEXT:
            case self::TINYTEXT:
            case self::MEDIUMTEXT:
            case self::LONGTEXT:
            case self::BLOB:
            case self::TINYBLOB:
            case self::MEDIUMBLOB:
            case self::LONGBLOB:
            case self::DATETIME:
            case self::DATE:
            case self::TIME:
            case self::TIMESTAMP: // reminder : set NULL to TIMESTAMP put NOW in datafield (MySQL) also TIMESTAMP is NOT NULL by default
                // Check type
                if (!is_string($value) && !is_numeric($value)) {
                    return 'Expected string value';
                }
                // Check length
                if (isset($column[self::DEFINITION][self::COL_LENGTH])) {
                    $length = &$column[self::DEFINITION][self::COL_LENGTH][0];
                    if (mb_strlen($value) > $length) {
                        return "Exceeds maximum length of {$length}";
                    }
                }

                return true;
                // TODO : Check date & time datatypes with REGEX ?

        }

        return false;
    }

    /**
     * Save current data by inserting or updating them in associated database row
     * (Depending on current mode).
     *
     * @param bool $ignore set to TRUE to use IGNORE option in statement (only MySQL)
     *
     * @return mixed the number of affected rows in table, otherwise FALSE if execution failed (throw an exception in dev mode)
     */
    public function save($ignore = false)
    {
        if ($this->mode === self::INSERT) {
            // INSERT MODE
            $insert = $this->__insert();
            if ($ignore === true) {
                $insert = $insert->ignore();
            }
            foreach ($this->columns as $column) {
                // Skip column if not modified
                if ($column[self::STATUS] === self::NOT_MODIFIED) {
                    continue;
                }
                $insert = $insert->set($column[self::DEFINITION][self::COL_COLUMN], $column[self::VALUE]);
                $column[self::STATUS] = self::NOT_MODIFIED;
            }
            // Execute INSERT query
            $result = $this->db->execute($insert);
            if ($result !== false) {
                if ($result > 0) {
                    // Update primary key if auto increment type
                    if ($this->is_auto_increment($this->columns[$this->primary])) {
                        $id = $this->db->last_insert_id();
                        $this->inject_column_value($this->columns[$this->primary], $id);
                    }
                    // Update primary value and set to EDIT mode
                    $this->update_primary_value();
                    $this->mode = self::EDIT;
                }

                return $result;
            }
        } elseif ($this->mode === self::EDIT) {
            // EDIT MODE
            $update = $this->__update();
            if ($ignore === true) {
                $update = $update->ignore();
            }
            foreach ($this->columns as $column) {
                // Skip column if not modified
                if ($column[self::STATUS] === self::NOT_MODIFIED) {
                    continue;
                }
                $update = $update->set($column[self::DEFINITION][self::COL_COLUMN], $column[self::VALUE]);
                $column[self::STATUS] = self::NOT_MODIFIED;
            }
            $update = $update->where($this->primary, $this->primary_value);
            // Execute UPDATE query
            $result = $this->db->execute($update);
            if ($result !== false) {
                $this->update_primary_value();

                return $result; // 0 as result may be issued because there was nothing to update in table (MySQL optimisation)
            }
        }

        return false;
    }

    /**
     * Advanced method which return a SELECT statement object (FROM all defined columns of current model)
     * (This method is usefull for create a custom SELECT * statement in a repository).
     *
     * Example :
     *
     *    $this->execute( $this->__select() );
     *    (execute a SELECT * query which return all results as an array of rows)
     *
     * Note : this method preserve column name used in model for alias real table column name
     *
     * @see SQL builder documentation (SELECT statement)
     *
     * @return ppl_db_sql_select select statement object
     */
    final public function __select()
    {
        if ($this->select === null) {
            $this->select = $this->db->sql->select();
        }

        return $this->select->reset()->from($this->tablename, $this->select_all_expr());
    }

    /**
     * Advanced method which return a INSERT statement object (INTO current model tablename)
     * (May be used with execute method).
     *
     * @see SQL builder documentation (INSERT statement)
     *
     * @return ppl_db_sql_insert insert statement object
     */
    final public function __insert()
    {
        if ($this->insert === null) {
            $this->insert = $this->db->sql->insert($this->tablename);
        }

        return $this->insert->reset($this->tablename);
    }

    /**
     * Advanced method which return a UPDATE statement object (with current model tablename)
     * (May be used with execute method).
     *
     * @see SQL builder documentation (UPDATE statement)
     *
     * @return ppl_db_sql_update update statement object
     */
    final public function __update()
    {
        if ($this->update === null) {
            $this->update = $this->db->sql->update($this->tablename);
        }

        return $this->update->reset($this->tablename);
    }

    /**
     * Advanced method which return a DELETE statement object (FROM current model tablename)
     * (May be used with execute method).
     *
     * @see SQL builder documentation (DELETE statement)
     *
     * @return ppl_db_sql_delete delete statement object
     */
    final public function __delete()
    {
        if ($this->delete === null) {
            $this->delete = $this->db->sql->delete($this->tablename);
        }

        return $this->delete->reset($this->tablename);
    }

    /**
     * Execute a Query with current DB connection
     * (Result vary with type of sql statement).
     *
     * @see Database helper class documentation (ppl_db)
     *
     * @param ppl_db_sql_base $sql SQL Statement Object
     *
     * @return mixed the query result
     */
    final public function execute(ppl_db_sql_base $sql)
    {
        return $this->db->execute($sql);
    }

    private function __clone()
    {
    }
}
final class ModelException extends Exception
{
}
