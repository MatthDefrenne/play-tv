<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder SELECT Statement
 *
 * TODO : ON object extended from filters which override all (trigger exception) with one method on(expr1, expr2, operator) + andon() oron()
 * TODO : WITH ROLLUP instruction support ?
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_db_sql_select extends ppl_db_sql_filter
{
    private $distinct = false,
        $_join = array('LEFT', 'INNER', 'RIGHT'),
        $from,
        $join,
        $groupby;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Reset the statement.
     *
     * @return this object
     */
    public function reset()
    {
        $this->from = array();
        $this->join = array();
        $this->groupby = array();
        $this->having = array();
        $this->is_having = false;
        $this->where = array();
        $this->orderby = array();
        $this->limit = '';

        return $this;
    }

    /**
     * Get SQL statement.
     *
     * @param bool $es (internal use)
     *
     * @return string SQL statement
     */
    public function get_sql($es = true)
    {
        $this->alias = array();
        $this->tables = array();
        $sql = ($this->distinct === true) ? 'SELECT DISTINCT ' : 'SELECT ';
        $sql .= $this->build_select_from_join();
        $sql .= $this->build_where_condition($this->_clause[0], $this->where);
        $sql .= $this->build_groupby();
        $sql .= $this->build_where_condition($this->_clause[1], $this->having);
        $sql .= $this->build_orderby();
        $sql .= $this->limit;

        return ($es === true) ? $sql.$this->es : $sql;
    }

    /**
     * Distinct.
     *
     * @return this object
     */
    public function distinct()
    {
        $this->distinct = true;

        return $this;
    }

    /**
     * From.
     *
     * @param mixed $table   table name
     * @param mixed $columns column expression(s) to extract
     *
     * @return this object
     */
    public function from($table, $columns = null)
    {
        if (!$this->is_table_expr($table)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        if ((is_string($columns) && ($columns !== '')) || ($this->expr()->is_expr($columns) === true)) {
            $columns = array($columns);
        }
        if (($columns !== null) && (!is_array($columns))) {
            throw new sqlException('Columns must be an array or a string');
        }
        $this->from[] = array($table, $columns);

        return $this;
    }

    /**
     * Add a JOIN Clause.
     *
     * @param string $table   table name
     * @param array  $on      conditional join expression
     * @param mixed  $columns column(s) name to extract
     * @param int    $type    type of JOIN
     */
    private function add_join($table, $on, $columns = null, $type = 0)
    {
        if (count($this->from) === 0) {
            throw new sqlException('Expected from() in select statement');
        }
        if (!$this->is_table_expr($table)) {
            throw new sqlException('Table name must be a valid table expression');
        }
        if (!is_array($on) || (count($on) !== 2)) {
            throw new sqlException('On must be an array with two elements');
        }
        if (is_string($columns) && ($columns !== '')) {
            $columns = array($columns);
        }
        if (($columns !== null) && (!is_array($columns))) {
            throw new sqlException('Columns must be an array or a non-empty string');
        }
        $this->join[] = array($table, $on, $columns, $type);
    }

    /**
     * LEFT JOIN.
     *
     * @param string $table   table name
     * @param array  $on      conditional join expression
     * @param mixed  $columns column(s) name to extract
     *
     * @return this object
     */
    public function join($table, $on, $columns = null)
    {
        $this->add_join($table, $on, $columns, 0);

        return $this;
    }
    public function leftjoin($table, $on, $columns = null)
    {
        $this->add_join($table, $on, $columns, 0);

        return $this;
    }

    /**
     * INNER JOIN.
     *
     * @param string $table   table name
     * @param array  $on      conditional join expression
     * @param mixed  $columns column(s) name to extract
     *
     * @return this object
     */
    public function innerjoin($table, $on, $columns = null)
    {
        $this->add_join($table, $on, $columns, 1);

        return $this;
    }

    /**
     * RIGHT JOIN.
     *
     * @param string $table   table name
     * @param array  $on      conditional join expression
     * @param mixed  $columns column(s) name to extract
     *
     * @return this object
     */
    public function rightjoin($table, $on, $columns = null)
    {
        $this->add_join($table, $on, $columns, 2);

        return $this;
    }

    /**
     * Add a GROUPBY column.
     *
     * @param mixed $column column name or expression
     */
    private function add_groupby($column)
    {
        if (!is_array($column) && (!is_string($column) || ($column === ''))) {
            throw new sqlException('Column name in GROUP BY clause must be a non empty string');
        }
        $this->groupby[] = $column;
    }

    /**
     * GROUP BY
     * (Variadic function).
     *
     * @param mixed $column column name
     *
     * @return this object
     */
    public function groupby()
    {
        if (func_num_args() === 0) {
            throw new sqlException('groupby() require at least one parameter');
        }
        $columns = func_get_args();
        foreach ($columns as $column) {
            if (is_array($column)) {
                if ($this->expr()->is_expr($column) === false) {
                    foreach ($column as $col) {
                        $this->add_groupby($col);
                    }
                    continue;
                }
            }
            $this->add_groupby($column);
        }

        return $this;
    }

    /**
     * AND HAVING.
     *
     * @param mixed  $column          column name or expression
     * @param mixed  $value           conditionnal value or column name
     * @param string $operator        condition operator
     * @param bool   $value_is_column set to TRUE if value is a column
     *
     * @return this object
     */
    public function having($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        $this->is_having = true;
        $this->add_condition_expr(1, $column, $value, $operator, $value_is_column, 0);

        return $this;
    }
    public function andhaving($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        return $this->having($column, $value, $operator, $value_is_column);
    }

    /**
     * OR HAVING.
     *
     * @param mixed  $column          column name or expression
     * @param mixed  $value           conditionnal value or column name
     * @param string $operator        condition operator
     * @param bool   $value_is_column set to TRUE if value is a column
     *
     * @return this object
     */
    public function orhaving($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        $this->is_having = true;
        $this->add_condition_expr(1, $column, $value, $operator, $value_is_column, 1);

        return $this;
    }

    /**
     * Parse column value of select expression.
     *
     * @param mixed  $select_expr     select expression
     * @param string $table_reference table reference
     *
     * @return string SQL formatted select expression
     */
    private function parse_select_expr($select_expr, $table_reference)
    {
        list($cn, $ca) = (is_array($select_expr)) ? $this->parse_identifier($select_expr[0], true) : $this->parse_identifier($select_expr, true);
        if (is_array($select_expr)) {
            $cn = $this->expr()->replace_pattern($select_expr[1], $this->format_identifier($table_reference, $cn));

            return ($ca === null) ? $cn : "{$cn} AS {$this->quote_identifier($ca)}";
        }

        return $this->format_identifier($table_reference, $cn, $ca);
    }

    /**
     * Build SELECT column expressions, FROM and JOIN (if any) SQL statement substring.
     *
     * @return string SELECT-FROM-JOIN SQL statement substring
     */
    private function build_select_from_join()
    {
        $columns = array();
        $tables = array();

        if (count($this->from) === 0) {
            throw new sqlException('Expected from() in select statement');
        }

        // Read FROM table references
        foreach ($this->from as $from) {
            list($dbname, $table, $alias) = $this->parse_table_expr($from[0]);
            $this->add_table($alias, $table);
            $tables[] = $this->format_identifier($dbname, $table, $alias);

            // Read SELECT column expressions
            $c = $from[1];
            if ($c === null) {
                continue;
            }
            $single_table = (count($this->from) === 1) && (count($this->join) === 0);
            $alias = (($alias === null) && ($single_table === false)) ? $table : $alias; // We use tablename as alias on multi-table
            foreach ($c as $column) {
                $columns[] = $this->parse_select_expr($column, $alias);
            }
        }

        // Read JOIN table reference
        $sql_join = '';
        foreach ($this->join as $join) {
            $sql_join .= "\n{$this->_join[$join[3]]} JOIN ";
            list($dbname, $table, $alias) = $this->parse_table_expr($join[0]);
            $this->add_table($alias, $table);
            $sql_join .= $this->format_identifier($dbname, $table, $alias);

            // Read JOIN ON conditionnal expression
            $sql_join .= " ON {$this->parse_conditional_expr($join[1][0], true)}={$this->parse_conditional_expr($join[1][1], true)}";

            // Read JOIN column expressions
            $c = $join[2];
            if ($c === null) {
                continue;
            }
            $alias = ($alias === null) ? $table : $alias;
            foreach ($c as $column) {
                $columns[] = $this->parse_select_expr($column, $alias);
            }
        }

        $columns = (count($columns) === 0) ? array('*') : $columns; // no specified columns ?
        return implode($this->sep, $columns)."\nFROM ".implode($this->sep, $tables).$sql_join;
    }

    /**
     * Build GROUP BY SQL statement substring.
     *
     * @return string GROUP BY SQL statement substring
     */
    private function build_groupby()
    {
        if (count($this->groupby) === 0) {
            return '';
        }
        $columns = array();
        foreach ($this->groupby as $groupby) {
            $columns[] = $this->parse_conditional_expr($groupby);
        }

        return "\nGROUP BY ".implode($this->sep, $columns);
    }
}
