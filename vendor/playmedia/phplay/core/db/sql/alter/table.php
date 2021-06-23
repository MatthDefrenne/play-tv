<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder ALTER TABLE Statement
 *
 * TODO : FOREIGN KEY Constraints ?(InnoDB)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_db_sql_alter_table extends ppl_db_sql_tableopts
{
    protected $tablename;

    private $duplicate_key,
        $online,
        $alter_specifications;

    /**
     * Constructor.
     *
     * @param mixed $tablename table expression
     */
    public function __construct($tablename)
    {
        $this->reset($tablename);
    }

    /**
     * Set table name.
     *
     * @param mixed $tablename table expression
     */
    private function set_tablename($tablename)
    {
        if (!$this->is_table_expr($tablename)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        $this->tablename = $tablename;
    }

    /**
     * Reset the SQL statement.
     *
     * @param mixed $tablename table expression
     *
     * @return this object
     * @override
     */
    public function reset($tablename = null)
    {
        parent::reset();
        if ($tablename !== null) {
            $this->set_tablename($tablename);
        }
        $this->duplicate_key = null;
        $this->online = null;
        $this->alter_specifications = array();

        return $this;
    }

    /**
     * Add a key.
     *
     * @param string $key key SQL substring
     */
    private function add_key($key)
    {
        if ($key !== null) {
            $this->alter_specifications[] = "\n\tADD {$key}";
        }
    }

    /**
     * Drop a key.
     *
     * @param string $key key SQL substring
     */
    private function drop_key($key)
    {
        if ($key !== null) {
            $this->alter_specifications[] = "\n\tDROP {$key}";
        }
    }

    /**
     * Add a column.
     *
     * @param ppl_db_sql_types_base $column column definition object
     *
     * @return this object
     */
    public function add_column(ppl_db_sql_types_base $column)
    {
        $this->alter_specifications[] = "\n\tADD COLUMN {$column->get_sql()}";
        $this->add_key($column->get_index_sql());

        return $this;
    }

    /**
     * Edit a column.
     *
     * @param ppl_db_sql_types_base $column          column definition object
     * @param string                $new_column_name new column name
     *
     * @return this object
     */
    public function edit_column(ppl_db_sql_types_base $column, $new_column_name = null)
    {
        if (!$this->is_str($new_column_name, true)) {
            throw new sqlException('New column name must be a non empty string');
        }
        $this->alter_specifications[] = ($new_column_name === null) ? "\n\tMODIFY COLUMN {$column->get_sql()}" : "\n\tCHANGE COLUMN {$column->get_sql($new_column_name)}";
        $this->add_key($column->get_index_sql());

        return $this;
    }

    /**
     * Drop a column.
     *
     * @param string $column_name column name
     *
     * @return this object
     */
    public function drop_column($column_name)
    {
        if (!$this->is_str($column_name)) {
            throw new sqlException('Column name must be a non empty string');
        }
        $this->alter_specifications[] = "\n\tDROP COLUMN {$this->quote_identifier($column_name)}";

        return $this;
    }

    /**
     * Check index expression.
     *
     * @param mixed $index_expr table expression
     *
     * @return bool TRUE if valid index expression, otherwise FALSE
     */
    private function is_index_expr($index_expr)
    {
        // non-empty string OR array of non-empty string with a number between 1 and 767
        return ($this->is_str($index_expr)) || (is_array($index_expr) && (count($index_expr) === 2) && $this->is_str($index_expr[0]) && $this->is_num($index_expr[1], false, 1, 767));
    }

    /**
     * Check argument list for variadic index functions.
     *
     * @see #add_primary()
     * @see #add_unique()
     * @see #add_index()
     * @see #add_fulltext()
     *
     * @param mixed $args arguments
     *
     * @return array index expressions
     */
    private function get_index_exprs($args)
    {
        if ((count($args) === 2) && ($this->is_str($args[0])) && ($this->is_num($args[1], false, 1, 767))) {
            return array(array($args[0], $args[1]));
        } else {
            foreach ($args as $index_expr) {
                if (!$this->is_index_expr($index_expr)) {
                    throw new sqlException('Invalid index expression');
                }
            }

            return $args;
        }
    }

    /**
     * ADD PRIMARY KEY
     * (Variadic function).
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     *
     * @return this object
     */
    public function add_primary()
    {
        if (func_num_args() === 0) {
            throw new sqlException('add_primary() require at least one parameter');
        }
        $this->add_key($this->primary_key_sql($this->get_index_exprs(func_get_args())));

        return $this;
    }

    /**
     * ADD UNIQUE (KEY)
     * (Variadic function).
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     *
     * @return this object
     */
    public function add_unique()
    {
        if (func_num_args() === 0) {
            throw new sqlException('add_unique() require at least one parameter');
        }
        $this->add_key($this->unique_key_sql($this->get_index_exprs(func_get_args())));

        return $this;
    }

    /**
     * ADD INDEX (KEY)
     * (Variadic function).
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     *
     * @return this object
     */
    public function add_index()
    {
        if (func_num_args() === 0) {
            throw new sqlException('add_index() require at least one parameter');
        }
        $this->add_key($this->index_key_sql($this->get_index_exprs(func_get_args())));

        return $this;
    }

    /**
     * ADD FULLTEXT index
     * (Variadic function).
     *
     * @param mixed $index_expr index expression (colname/prefix length)
     *
     * @return this object
     */
    public function add_fulltext()
    {
        if (func_num_args() === 0) {
            throw new sqlException('add_fulltext() require at least one parameter');
        }
        $this->add_key($this->fulltext_key_sql($this->get_index_exprs(func_get_args())));

        return $this;
    }

    /**
     * DROP PRIMARY KEY.
     *
     * @return this object
     */
    public function drop_primary()
    {
        $this->drop_key($this->primary_key_sql(null));

        return $this;
    }

    /**
     * DROP INDEX (any except primary).
     *
     * @param string $key_name key name
     *
     * @return this object
     */
    public function drop_index($key_name)
    {
        if (!$this->is_str($key_name)) {
            throw new sqlException('Key name must be a non empty string');
        }
        $this->drop_key($this->index_key_sql(array($key_name)));

        return $this;
    }
    public function drop_unique($key_name)
    {
        return $this->drop_index($key_name);
    }
    public function drop_fulltext($key_name)
    {
        return $this->drop_index($key_name);
    }

    /**
     * IGNORE rows with duplicate unique key
     * (ALTER TABLE).
     *
     * @return this object
     */
    public function ignore_duplicate_unique_key()
    {
        $this->duplicate_key = false;

        return $this;
    }

    /**
     * ONLINE.
     *
     * @return this object
     */
    public function online()
    {
        $this->online = true;

        return $this;
    }

    /**
     * OFFLINE.
     *
     * @return this object
     */
    public function offline()
    {
        $this->online = false;

        return $this;
    }

    /**
     * RENAME (TABLE).
     *
     * @param mixed $new_tbl_name new table name (table expression)
     *
     * @return this object
     */
    public function rename($new_tbl_name)
    {
        if (!$this->is_table_expr($new_tbl_name)) {
            throw new sqlException('New table name must be a valid table expression');
        }
        list($db, $table, $alias) = $this->parse_table_expr($new_tbl_name);
        $this->alter_specifications[] = "\n\tRENAME TO {$this->format_identifier($db, $table)}";

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @return string SQL statement
     */
    public function get_sql()
    {
        $sql = 'ALTER';
        if ($this->online !== null) {
            $sql .= ($this->online === true) ? ' ONLINE' : ' OFFLINE';
        }
        if ($this->duplicate_key === false) {
            $sql .= ' IGNORE';
        }
        list($db, $table, $alias) = $this->parse_table_expr($this->tablename);
        $sql .= " TABLE {$this->format_identifier($db, $table)}";
        $tbl_options = $this->get_table_options_sql();
        $tbl_options = ($tbl_options === '') ? array() : array("\n\t{$tbl_options}");
        $sql .= implode($this->sep, array_merge($tbl_options, $this->alter_specifications));

        return $sql.$this->es;
    }
}
