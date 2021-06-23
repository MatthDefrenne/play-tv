<?php
/**
 * PHPlay Framework.
 *
 * Variables Configuration Storage Object
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
final class ppl_var
{
    /**
     * Set an array into current object
     * (convert into ppl_var object).
     *
     * @param array $a the array to insert
     *
     * @return ppl_var the ppl_var object instance
     */
    public function set($a)
    {
        $this->ao($a, $this);
    }

    /**
     * Convert an array into ppl_var object.
     *
     * @param array   $a the array to convert
     * @param ppl_var $r (internal use only)
     *
     * @return array the converted object into array
     */
    private function ao($a, $r = null)
    {
        if ($r === null) {
            $r = new $this();
        }
        if (!is_array($a)) {
            return $a;
        }
        foreach ($a as $k => $v) {
            if (is_array($v)) {
                $r->$k = $this->ao($v);
            } else {
                $r->$k = $v;
            }
        }

        return $r;
    }

    /**
     * Get the current object as an array.
     *
     * @param ppl_var $o (internal use only)
     *
     * @return array the current object as an array
     */
    public function get($o = null)
    {
        if ($o === null) {
            $o = $this;
        }
        $r = (array) $o;
        foreach ($r as $k => $v) {
            if (is_object($v)) {
                $r[$k] = $this->get($v);
            }
        }

        return $r;
    }
}
