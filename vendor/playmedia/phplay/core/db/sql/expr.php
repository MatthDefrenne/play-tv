<?php
/**
 * PHPlay Framework.
 *
 * SQL Expressions Builder
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_db_sql_expr
{
    private $pattern = '°¨°';

    /**
     * Replace the expression pattern in subject.
     *
     * @param string $subject the subject
     * @param string $replace the replace string
     *
     * @return string the new subject
     */
    public function replace_pattern($subject, $replace)
    {
        return preg_replace("#{$this->pattern}#", $replace, $subject, 1);
    }

    /**
     * Check for valid expression.
     *
     * @param array $expr the expression array
     *
     * @return bool TRUE if valid expression, otherwise FALSE
     */
    public function is_expr($expr)
    {
        return is_array($expr) && (count($expr) === 3) && ($expr[2] === $this->pattern);
    }

    /**
     * Build an expression array.
     *
     * @param mixed  $value   the value or an expression array
     * @param string $pattern the expr pattern
     *
     * @return array the expression array
     */
    private function build($value, $pattern)
    {
        if ($this->is_expr($value) === true) {
            $value[1] = $this->replace_pattern($pattern, $value[1]);

            return $value;
        }

        return array($value, $pattern, $this->pattern);
    }

    /**
     * Build a DISTINCT expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function distinct($expr)
    {
        $pattern = "DISTINCT {$this->pattern}";

        return $this->build($expr, $pattern);
    }

    /**
     * Build an AVG expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function avg($expr)
    {
        $pattern = "AVG({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a COUNT expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function count($expr)
    {
        $pattern = "COUNT({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a MAX expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function max($expr)
    {
        $pattern = "MAX({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a MIN expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function min($expr)
    {
        $pattern = "MIN({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a SUM expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function sum($expr)
    {
        $pattern = "SUM({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a UCASE expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function ucase($expr)
    {
        $pattern = "UCASE({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a LCASE expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function lcase($expr)
    {
        $pattern = "LCASE({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a MID expression.
     *
     * @param mixed $expr the expression value
     * @param int   $pos  the starting position
     * @param int   $len  the len
     *
     * @return array the expression
     */
    public function mid($expr, $pos, $len = null)
    {
        // TODO: validations
        $len = ($len === null) ? '' : ", {$len}";
        $pattern = "MID({$this->pattern}, {$pos}{$len})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a LEN expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function len($expr)
    {
        $pattern = "CHAR_LENGTH({$this->pattern})"; // CHAR_LENGTH is MySQL
        return $this->build($expr, $pattern);
    }

    /**
     * Build a HEX expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function hex($expr)
    {
        $pattern = "HEX({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a UNHEX expression.
     *
     * @param mixed $expr the expression value
     *
     * @return array the expression
     */
    public function unhex($expr)
    {
        $pattern = "UNHEX({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a ROUND expression.
     *
     * @param mixed $expr the expression value
     * @param mixed $d    the number of decimals
     *
     * @return array the expression
     */
    public function round($expr, $d = null)
    {
        // TODO: validations
        $d = ($d === null) ? '' : ", {$d}";
        $pattern = "ROUND({$this->pattern}{$d})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a NOW expression.
     *
     * @param int $s the number of seconds to add or remove
     *
     * @return array the expression
     */
    public function now($s = null)
    {
        // TODO: validation
        if ($s !== null) {
            $s = ($s < 0) ? "{$s}" : "+{$s}";
        }
        $pattern = (($s === null) || ($s == 0)) ? 'NOW()' : "NOW(){$s}";

        return $this->build(null, $pattern);
    }

    /**
     * Build a RAND expression.
     *
     * @param string $as   the column alias
     * @param int    $seed the seed value (seed is MySQL)
     *
     * @return array the expression
     */
    public function rand($as = null, $seed = null)
    {
        if (!is_numeric($seed)) {
            $seed = '';
        }
        $expr = (($as !== null) && is_string($as)) ? " .{$as}" : null;
        $pattern = "RAND({$seed})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a INET_ATON expression (IPV4)
     * --> ip address to integer value.
     *
     * @param string $ip the ip address
     * @param string $as the column alias
     *
     * @return array the expression
     */
    public function inet_aton($ip, $as = null)
    {
        $pattern = "INET_ATON('{$ip}')";
        $expr = (($as !== null) && is_string($as)) ? " .{$as}" : null;

        return $this->build($expr, $pattern);
    }

    /**
     * Build a INET_NTOA expression (IPV4)
     * --> column expression value to ip address string representation.
     *
     * @param mixed  $expr the expression value
     * @param string $as   the column alias
     *
     * @return array the expression
     */
    public function inet_ntoa($expr)
    {
        $pattern = "INET_NTOA({$this->pattern})";

        return $this->build($expr, $pattern);
    }

    /**
     * Build a INET6_PTON expression (IPV6)
     * --> ip address to binary string value
     * (Require mysql_udf_ipv6.so plugin installed).
     *
     * @param string $ip the ip address
     * @param string $as the column alias
     *
     * @return array the expression
     */
    public function inet6_pton($ip, $as = null)
    {
        $pattern = "INET6_PTON('{$ip}')";
        $expr = (($as !== null) && is_string($as)) ? " .{$as}" : null;

        return $this->build($expr, $pattern);
    }

    /**
     * Build a INET6_NTOP expression (IPV6)
     * --> column expression value to ip address string representation
     * (Require mysql_udf_ipv6.so plugin installed).
     *
     * @param mixed  $expr the expression value
     * @param string $as   the column alias
     *
     * @return array the expression
     */
    public function inet6_ntop($expr)
    {
        $pattern = "INET6_NTOP({$this->pattern})";

        return $this->build($expr, $pattern);
    }
}
final class exprException extends Exception
{
}
