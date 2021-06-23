<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder base class
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_db_sql_base
{
    private $expr;

    protected $qs = "'",                       // Quote string
        $qi = '`',                       // Quote identifier
        $ai = '.',                       // Alias identifier (separator)
        $sep = ', ',                     // SQL separator
        $es = ';',                       // End statement
        $sql_parameter = '?',            // Anonymous SQL parameter (Used for prepared parameterized SQL statement)
        $sql_named_parameter = ':',      // Named SQL parameter
        $sql_parameter_marker = '¨°¨',   // A simple pattern for check type
        $sql_raw_marker = '°°¨',         // Raw SQL pattern for check type
        $alias,
        $tables;

    private $default_collate = 'utf8_unicode_ci',
        $default_charset = 'utf8',
        $default_engine = 'InnoDB';

    /**
     * Check non-empty string value.
     *
     * @param string $value   value
     * @param bool   $or_null set to TRUE to accept NULL value
     * @param int    $max_len maximum length of characters
     *
     * @return bool TRUE if non-empty string, otherwise FALSE
     */
    public function is_str($value, $or_null = false, $max_len = null)
    {
        if ($value === null) {
            return $or_null;
        }
        if (!is_string($value) || ($value === '')) {
            return false;
        }
        if (($max_len !== null) && (mb_strlen($value) > $max_len)) {
            return false;
        }

        return true;
    }

    /**
     * Check numeric value.
     *
     * @param mixed $value   numeric value
     * @param bool  $or_null set to TRUE to accept NULL value
     * @param int   $min     minimum value
     * @param int   $max     maximum value
     *
     * @return bool TRUE if value is correct, otherwise FALSE
     */
    public function is_num($value, $or_null = false, $min = null, $max = null)
    {
        if ($value === null) {
            return $or_null;
        }
        if (!is_numeric($value)) {
            return false;
        }
        if (($min !== null) && ($value < $min)) {
            return false;
        }
        if (($max !== null) && ($value > $max)) {
            return false;
        }

        return true;
    }

    /**
     * Set default collation name.
     *
     * @param string $collation_name collation name
     */
    public function set_default_collation($collation_name)
    {
        if (!$this->is_str($collation_name)) {
            throw new sqlException('Collation name must be a non-empty string');
        }
        $this->default_collate = $collation_name;
    }

    /**
     * Get default collation name.
     *
     * @return string default collation name
     */
    public function get_default_collation()
    {
        return $this->default_collate;
    }

    /**
     * Set default character set.
     *
     * @param string $charset_name character set
     */
    public function set_default_charset($charset_name)
    {
        if (!$this->is_str($charset_name)) {
            throw new sqlException('Character set must be a non-empty string');
        }
        $this->default_charset = $charset_name;
    }

    /**
     * Get default character set.
     *
     * @return string default character set
     */
    public function get_default_charset()
    {
        return $this->default_charset;
    }

    /**
     * Set default storage engine.
     *
     * @param string $storage_engine storage engine
     */
    public function set_default_engine($storage_engine)
    {
        if (!$this->is_str($storage_engine)) {
            throw new sqlException('Storage engine name must be a non-empty string');
        }
        $this->default_engine = $storage_engine;
    }

    /**
     * Get default storage engine.
     *
     * @return string default storage engine
     */
    public function get_default_engine()
    {
        return $this->default_engine;
    }

    /**
     * Return the Expression Builder Object.
     *
     * @return ppl_db_sql_expr the expr object
     */
    public function expr()
    {
        if (!isset($this->expr)) {
            $this->expr = new ppl_db_sql_expr(); // Lazy loading
        }

        return $this->expr;
    }

    /**
     * Set alias identifier (separator).
     *
     * @param string $ai alias separator
     */
    public function set_alias_identifier($ai = '.')
    {
        $this->ai = $ai;
    }

    /**
     * Get marker (SQL parameter).
     *
     * @param string $name marker name
     *
     * @return array the marker
     */
    public function marker($name = null)
    {
        if (!$this->is_str($name, true)) {
            throw new sqlException('Marker name must be a non-empty string');
        }
        // TODO : disallow ':' in name ?
        $name = ($name === null) ? $this->sql_parameter : (($name[0] === $this->sql_named_parameter) ? $name : "{$this->sql_named_parameter}{$name}");

        return array($name, $this->sql_parameter_marker);
    }

    /**
     * Check for valid marker (SQL parameter).
     *
     * @param array $marker PDO marker
     *
     * @return bool TRUE if marker, otherwise FALSE
     */
    public function is_marker($marker)
    {
        return is_array($marker) && (isset($marker[1])) && ($marker[1] === $this->sql_parameter_marker);
    }

    /**
     * Build a raw SQL expression to inject in statement.
     *
     *  - raw expression must be correectly escaped
     *  - beware SQL injections !
     *
     * @param string $raw_sql
     *
     * @return array the raw SQL expression
     */
    public function raw($raw_sql)
    {
        if (!$this->is_str($raw_sql, true)) {
            throw new sqlException('Raw SQL expression must be a non-empty string');
        }

        return array($raw_sql, $this->sql_raw_marker);
    }

    /**
     * Check for raw SQL expression.
     *
     * @param array $raw Raw SQL expression
     *
     * @return bool TRUE if raw SQL, otherwise FALSE
     */
    public function is_raw($raw)
    {
        return is_array($raw) && (isset($raw[1])) && ($raw[1] === $this->sql_raw_marker);
    }

    /**
     * Escape a value.
     *
     * @param mixed $value the value to escape
     */
    public function escape_value($value)
    {
        if (is_string($value)) {
            return addslashes($value);
        } elseif (is_bool($value)) {
            return ($value === true) ? 1 : 0;
        } elseif (is_array($value)) {
            throw new sqlException('Array value cannot be escaped');
        }

        return $value;
    }

    /**
     * Format a value.
     *
     * @param mixed $value condition expression value
     *
     * @return string SQL formated value
     */
    public function format_value($value)
    {
        $pattern = null;
        if (is_array($value)) {
            if ($this->expr()->is_expr($value) === true) {
                $pattern = $value[1];
                $value = $value[0];
            } elseif (($this->is_raw($value) === true) || ($this->is_marker($value) === true)) {
                return $value[0]; // unformatted !
            } else {
                throw new sqlException('Value in unknown format');
            }
        }
        $value = (is_string($value) === true) ? "'{$this->escape_value($value)}'" : $this->escape_value($value);

        return ($pattern === null) ? $value : $this->expr()->replace_pattern($pattern, $value);
    }

    /**
     * Quote identifier.
     *
     * @param string $identifier the identifier to quote
     *
     * @return string quoted identifier
     */
    public function quote_identifier($identifier)
    {
        return "{$this->qi}{$identifier}{$this->qi}";
    }

    /**
     * Format identifier.
     *
     * @param string $alias      alias identifier
     * @param string $identifier identifier to format
     * @param string $as         specify an alias name
     *
     * @return string SQL formated identifier
     */
    public function format_identifier($alias, $identifier, $as = null)
    {
        $alias = ($alias === null) ? '' : "{$this->quote_identifier($alias)}.";
        $as = ($as === null) ? '' : " AS {$this->quote_identifier($as)}";
        $identifier = ($identifier === '*') ? $identifier : $this->quote_identifier($identifier);

        return "{$alias}{$identifier}{$as}";
    }

    /**
     * Parse an identifier
     * (Split identifier into an array of 2 elements).
     *
     * @param string $identifier identifier
     * @param bool   $shift_left set to TRUE for put NULL in second element if no split
     *
     * @return array splitted identifier
     */
    public function parse_identifier($identifier, $shift_left = false)
    {
        if (!$this->is_str($identifier, true)) {
            throw new sqlException('Identifier must be a non-empty string');
        }
        $p = strpos($identifier, $this->ai);
        $l = mb_strlen($identifier) - 1;
        if ($p === false) {
            return ($shift_left === false) ? array(null, $identifier) : array($identifier, null);
        }
        if (($p === 0) || ($p === $l)) {
            throw new sqlException("Invalid identifier '{$identifier}'");
        }

        return explode($this->ai, $identifier, 2);
    }

    /**
     * Check table expression.
     *
     * @param mixed $table_expr table expression
     *
     * @return bool TRUE if valid table expression, otherwise FALSE
     */
    protected function is_table_expr($table_expr)
    {
        // non-empty string OR array of 2 non-empty string : 'tablename.alias' OR array('tablename.alias', 'databasename')
        return ($this->is_str($table_expr)) || (is_array($table_expr) && (count($table_expr) === 2) && $this->is_str($table_expr[0]) && $this->is_str($table_expr[1]));
    }

    /**
     * Parse table expression.
     *
     * @param mixed $table_expr table expression
     *
     * @return array always three elements : first is database name, second is table name and third is table alias (AS)
     */
    protected function parse_table_expr($table_expr)
    {
        // is_table_expr() skipped on purpose (setters must use it)
        if (is_array($table_expr)) {
            list($table, $alias) = $this->parse_identifier($table_expr[0], true);
            $db = $table_expr[1];
        } else {
            list($table, $alias) = $this->parse_identifier($table_expr, true);
            $db = null;
        }

        return array($db, $table, $alias);
    }

    /**
     * Add a table/alias (table reference).
     *
     * @param string $alias table alias
     * @param string $table table name
     */
    protected function add_table($alias, $table)
    {
        if ($alias === null) {
            $alias = 0;
            if (isset($this->tables[$table]) && ($this->tables[$table] === $alias)) {
                throw new sqlException("Not unique table/alias: '{$table}'");
            }
        } else {
            if (isset($this->alias[$alias])) {
                throw new sqlException("Not unique table/alias: '{$alias}'");
            }
            $this->alias[$alias] = $table;
        }
        $this->tables[$table] = $alias;
    }

    /**
     * Checks whether a table or alias exists.
     *
     * @param string $table table/alias
     *
     * @return bool TRUE if table reference exist in table/alias list, otherwise FALSE
     */
    protected function table_reference_exists($table_reference)
    {
        return isset($this->alias[$table_reference]) || isset($this->tables[$table_reference]);
    }

    /**
     * Parse column value of conditional expression (WHERE, ON).
     *
     * @param string $conditional_expr         conditional expression
     * @param bool   $table_reference_required set to TRUE if table reference is required
     *
     * @return string SQL formatted conditional expression value
     */
    public function parse_conditional_expr($conditional_expr, $table_reference_required = false)
    {
        list($tr, $cn) = (is_array($conditional_expr)) ? $this->parse_identifier($conditional_expr[0]) : $this->parse_identifier($conditional_expr);
        if (($tr === null) && ($table_reference_required === true)) {
            throw new sqlException("Table/alias required for conditional expression: '{$conditional_expr}'");
        }
        if (($tr !== null) && ($this->table_reference_exists($tr) === false)) {
            $expr = (is_array($conditional_expr)) ? $conditional_expr[0] : $conditional_expr;
            throw new sqlException("Invalid table/alias: '{$tr}' for conditional expression: '{$expr}'");
        }

        return (is_array($conditional_expr)) ? $this->expr()->replace_pattern($conditional_expr[1], $this->format_identifier($tr, $cn)) : $this->format_identifier($tr, $cn);
    }

    /**
     * Return key definition SQL substring.
     *
     * @param string $type       key type
     * @param array  $index_expr index expressions
     *
     * @return string key definition SQL substring
     */
    private function get_key_sql($type, $index_expr)
    {
        if ($index_expr === null) {
            return $type; // happen only for drop primary key
        }
        $cols = array();
        foreach ($index_expr as $index) {
            // Each element can be a string (column_name) or an array(column_name, prefix_length)

            if (is_array($index)) {
                $cols[] = "{$this->quote_identifier($index[0])}({$index[1]})";
            } else {
                $cols[] = $this->quote_identifier($index);
            }
        }

        return "{$type} (".implode($this->sep, $cols).')';
    }

    /**
     * Return primary key definition SQL substring.
     *
     * @param array $index_expr index expression
     *
     * @return string primary key definition SQL substring
     */
    public function primary_key_sql($index_expr)
    {
        return $this->get_key_sql('PRIMARY KEY', $index_expr);
    }

    /**
     * Return unique key definition SQL substring.
     *
     * @param array $index_expr index expression
     *
     * @return string unique key definition SQL substring
     */
    public function unique_key_sql($index_expr)
    {
        return $this->get_key_sql('UNIQUE', $index_expr);
    }

    /**
     * Return index key definition SQL substring.
     *
     * @param array $index_expr index expression
     *
     * @return string index key definition SQL substring
     */
    public function index_key_sql($index_expr)
    {
        return $this->get_key_sql('INDEX', $index_expr);
    }

    /**
     * Return fulltext key definition SQL substring.
     *
     * @param array $index_expr index expression
     *
     * @return string fulltext key definition SQL substring
     */
    public function fulltext_key_sql($index_expr)
    {
        return $this->get_key_sql('FULLTEXT', $index_expr);
    }
}
final class sqlException extends Exception
{
}
