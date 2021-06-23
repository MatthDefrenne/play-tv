<?php
/**
 * PHPlay Framework.
 *
 * SQL Builder common filter clauses (WHERE, ORDER BY and LIMIT)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
class ppl_db_sql_filter extends ppl_db_sql_base
{
    protected $_clause = array('WHERE', 'HAVING'),
        $_bool = array('AND', 'OR'),
        $_ops = array('=', '>', '<', '>=', '<=', '<>', '!=', 'LIKE', 'NOT LIKE', 'IS NULL', 'IS NOT NULL', 'IN', 'NOT IN', 'BETWEEN', 'NOT BETWEEN'),
        $_par = array('(', ')'),
        $_order = array('ASC', 'DESC');

    protected $where,
        $orderby,
        $limit,
        $having,
        $is_having = false;

    /**
     * Add a clause condition expression(WHERE or HAVING).
     *
     * @param int    $type            type of clause condition (where/having)
     * @param mixed  $column          column name or expression
     * @param mixed  $value           conditionnal value or column name
     * @param string $operator        condition operator
     * @param bool   $value_is_column set to TRUE if value is a column
     * @param int    $bool_operator   type of boolean condition (AND/OR)
     *
     * @return this object
     */
    protected function add_condition_expr($type, $column, $value, $operator, $value_is_column = false, $bool_operator)
    {
        $clause = ($type === 0) ? $this->_clause[0] : $this->_clause[1];
        // Check column expression
        if (is_string($column) && ($column === '')) {
            throw new sqlException("Column expression cannot be an empty string in {$clause} clause condition");
        } elseif (is_array($column) && ($this->expr()->is_expr($column) === false)) {
            throw new sqlException("Invalid column expression in {$clause} clause condition");
        }
        // Check operator
        $operator = $this->parse_operator($operator);
        // Check value expression
        if (!$this->is_value_expr($value, $operator)) {
            throw new sqlException("Invalid value with '{$operator}' operator in {$clause} clause condition");
        }
        if (!is_bool($value_is_column)) {
            throw new sqlException("value_is_column in {$clause} clause condition must be boolean");
        }
        // Check for nested condition
        if (($column === null) && ($value === null)) {
            $operator = $this->_par[0];
        }
        // Check type and add clause condition
        if ($type === 0) {
            $this->where[] = array($column, $value, $operator, $value_is_column, $bool_operator);
        } else {
            $this->having[] = array($column, $value, $operator, $value_is_column, $bool_operator);
        }
    }

    /**
     * Parse a condition operator
     * (WHERE or HAVING condition operator).
     *
     * @param string $op condition operator
     *
     * @return string SQL formatted operator
     */
    protected function parse_operator($op)
    {
        $op = mb_strtoupper(trim($op));
        switch ($op) {
            case 'NOTLIKE':
                $op = $this->_ops[8];
                break;

            case 'NOTIN':
                $op = $this->_ops[12];
                break;

            case 'NOTBETWEEN':
                $op = $this->_ops[14];
                break;
        }
        if (!in_array($op, $this->_ops, true)) {
            $clause = ($this->is_having === false) ? $this->_clause[0] : $this->_clause[1];
            throw new sqlException("Invalid condition operator '{$op}' in {$clause} clause condition");
        }

        return $op;
    }

    /**
     * Check value condition expression
     * (WHERE or HAVING value condition).
     *
     * @param mixed  $value    conditionnal value or column name
     * @param string $operator condition operator
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    protected function is_value_expr($value, $operator)
    {
        $is_in = ($operator === $this->_ops[11]) || ($operator === $this->_ops[12]);
        $is_between = ($operator === $this->_ops[13]) || ($operator === $this->_ops[14]);
        if (is_array($value)) {
            if ($this->expr()->is_expr($value) || $this->is_marker($value)) {
                return true;
            } else {
                if ($is_in === true) {
                    return count($value) > 0;
                } elseif ($is_between === true) {
                    return count($value) === 2;
                } elseif ($this->is_raw($value)) {
                    return true;
                }

                return false;
            }
        } elseif (is_object($value)) {
            return ($is_in === true) && (get_class($value) === 'ppl_db_sql_select');
        }
        if (($is_in === true) || ($is_between === true)) {
            return false;
        }
        // TODO : test type for LIKE ?
        return true;
    }

    /**
     * AND WHERE.
     *
     * @param mixed  $column          column name or expression
     * @param mixed  $value           conditionnal value or column name
     * @param string $operator        condition operator
     * @param bool   $value_is_column set to TRUE if value is a column
     *
     * @return this object
     */
    public function where($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        $this->is_having = false;
        $this->add_condition_expr(0, $column, $value, $operator, $value_is_column, 0);

        return $this;
    }
    public function andwhere($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        return $this->where($column, $value, $operator, $value_is_column);
    }

    /**
     * OR WHERE.
     *
     * @param mixed  $column          column name or expression
     * @param mixed  $value           conditionnal value or column name
     * @param string $operator        condition operator
     * @param bool   $value_is_column set to TRUE if value is a column
     *
     * @return this object
     */
    public function orwhere($column = null, $value = null, $operator = '=', $value_is_column = false)
    {
        $this->is_having = false;
        $this->add_condition_expr(0, $column, $value, $operator, $value_is_column, 1);

        return $this;
    }

    /**
     * END (close a nested condition).
     *
     * @return this object
     */
    public function end()
    {
        if ($this->is_having === false) {
            $this->where[] = array(null, null, $this->_par[1], false, 0);
        } else {
            $this->having[] = array(null, null, $this->_par[1], false, 0);
        }

        return $this;
    }

    /**
     * Parse IN list expression
     * (list expression can be a SELECT SQL statement object or an Array).
     *
     * @param mixed $in_expr IN list expression
     *
     * @return string SQL formatted IN list expression
     */
    protected function parse_in_expr($in_expr)
    {
        if (is_object($in_expr)) {
            return $this->_par[0].$in_expr->get_sql(false).$this->_par[1];
        } elseif (is_array($in_expr) && (count($in_expr) > 0)) {
            $list = array();
            foreach ($in_expr as &$value) {
                $list[] = $this->format_value($value);
            }

            return $this->_par[0].implode(', ', $list).$this->_par[1];
        }
        throw new sqlException('Invalid IN expression value'); // Must neven happen
    }

    /**
     * Parse BETWEEN expression
     * (must be a 2 elements Array).
     *
     * @param array $between_expr    BETWEEN expression
     * @param bool  $value_is_column set to TRUE if value is a column
     *
     * @return string SQL formatted BETWEEN expression
     */
    protected function parse_between_expr($between_expr, $value_is_column)
    {
        if (is_array($between_expr) && (count($between_expr) === 2)) {
            if ($value_is_column === true) {
                return $this->parse_conditional_expr($between_expr[0])." {$this->_bool[0]} ".$this->parse_conditional_expr($between_expr[1]);
            } else {
                return $this->format_value($between_expr[0])." {$this->_bool[0]} ".$this->format_value($between_expr[1]);
            }
        }
        throw new sqlException('Invalid BETWEEN expression value'); // Must neven happen
    }

    /**
     * ORDER BY.
     *
     * @param mixed  $column column name or expression
     * @param string $order  sort order (ASC or DESC)
     *
     * @return this object
     */
    public function orderby($column, $order = 'ASC')
    {
        if (is_string($column) && ($column === '')) {
            // $column can also be an array

            throw new sqlException('Column name in ORDER BY clause must be a non empty string');
        } elseif (is_array($column) && ($this->expr()->is_expr($column) === false)) {
            throw new sqlException('Invalid column expression in ORDER BY clause');
        } elseif (is_int($column) && ($column > 0) && ($column < 65536)) {
            // The number of columns vary because of character set (Every table has a maximum row size of 65,535 bytes)
            $this->orderby[] = array($column, 0);

            return $this;
        }
        switch (mb_strtoupper($order)) {
            case $this->_order[0]:
                $this->orderby[] = array($column, 0);
                break;
            case $this->_order[1]:
                $this->orderby[] = array($column, 1);
                break;
            default:
                throw new sqlException("Invalid order: {$order} in ORDER BY clause");
        }

        return $this;
    }

    /**
     * LIMIT.
     *
     * Note : limit(0) quickly return an empty set (MySQL). Usefull for checking the validity of a query
     *
     * @param int $offset   offset of the first row to return OR maximum number of rows to return if $rowcount is NULL
     * @param int $rowcount maximum number of rows to return
     *
     * @return this object
     */
    public function limit($offset, $rowcount = null)
    {
        if (!is_int($offset) || (($rowcount !== null) && !is_int($rowcount))) {
            throw new sqlException('LIMIT offset and rowcount must be an integer');
        }
        $this->limit = "\nLIMIT ".(($rowcount === null) ? "{$offset}" : "{$offset}{$this->sep}{$rowcount}");

        return $this;
    }

    /**
     * Build where condition SQL statement substring.
     *
     * @param string $clause     the clause (WHERE or HAVING)
     * @param array  $conditions the where conditions
     *
     * @return string where condition SQL statement substring
     */
    protected function build_where_condition($clause, $conditions)
    {
        if (count($conditions) === 0) {
            return ''; // Could also return 'WHERE 1;' ?
        }
        $sql = "\n{$clause} ";
        $nest_level = 0;
        $first_param = true;
        foreach ($conditions as $condition) {
            $where_operator = $condition[2];
            $bool_operator = $condition[4];
            if (in_array($where_operator, $this->_par, true)) {
                // Nested condition ?

                if ($where_operator === $this->_par[0]) {
                    ++$nest_level;
                    if ($first_param === false) {
                        $sql .= " {$this->_bool[$bool_operator]} "; // Boolean operator for opening nested condition
                    }
                    $sql .= $where_operator;
                    $first_param = true;
                } else {
                    --$nest_level;
                    $sql .= $where_operator;
                }
                if ($nest_level < 0) {
                    throw new sqlException("Misplaced end() in SQL statement'");
                }
                continue;
            }
            if ($first_param === false) {
                $sql .= " {$this->_bool[$bool_operator]} "; // Boolean operator for condition
            }
            $sql .= $this->parse_conditional_expr($condition[0]);
            if ($condition[1] === null) {
                // Value is NULL ?

                switch ($where_operator) {
                    case $this->_ops[0]:
                        $sql .= " {$this->_ops[9]}";
                        break;
                    case $this->_ops[5]:
                    case $this->_ops[6]:
                        $sql .= " {$this->_ops[10]}";
                        break;
                    default:
                        throw new sqlException("Unexpected operator: '{$where_operator}' for NULL value in {$clause} condition'");
                }
            } else {
                $sql .= " {$where_operator} ";
                if (($where_operator === $this->_ops[11]) || ($where_operator === $this->_ops[12])) {
                    $sql .= $this->parse_in_expr($condition[1]); // [NOT] IN operator
                } elseif (($where_operator === $this->_ops[13]) || ($where_operator === $this->_ops[14])) {
                    $sql .= $this->parse_between_expr($condition[1], $condition[3]); // [NOT] BETWEEN operator
                } else {
                    $sql .= ($condition[3] === true) ? $this->parse_conditional_expr($condition[1]) : $this->format_value($condition[1]);
                }
            }
            $first_param = false;
        }
        if ($nest_level > 0) {
            throw new sqlException("Expected End() on unclosed nested condition in SQL statement'");
        }

        return $sql;
    }

    /**
     * Build ORDER BY SQL statement substring.
     *
     * @return string ORDER BY SQL statement substring
     */
    protected function build_orderby()
    {
        if (count($this->orderby) === 0) {
            return '';
        }
        $columns = array();
        foreach ($this->orderby as $orderby) {
            $order = $this->_order[$orderby[1]];
            $columns[] = is_int($orderby[0]) ? "{$orderby[0]} {$order}" : $this->parse_conditional_expr($orderby[0])." {$order}";
        }

        return "\nORDER BY ".implode($this->sep, $columns);
    }
}
