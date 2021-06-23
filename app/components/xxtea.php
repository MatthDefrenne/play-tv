<?php

/**
 * XXTea component.
 *
 * Encrypts and decrypts text with the TEA (Block) algorithm.
 *
 * @author Karim <karim at playmedia dot fr>
 *
 * @version 2.0
 *
 * @see AS3 implementation from Mika Palmu (http://www.meychi.com)
 * @see Original Javascript implementation from Chris Veness, Movable Type Ltd (http://www.movable-type.co.uk)
 * @see Algorithm from David Wheeler & Roger Needham, Cambridge University Computer Lab (http://www.movable-type.co.uk/scripts/TEAblock.html)
 * @see Original PHP implementation from Ma Bingyao (andot@ujn.edu.cn)
 * @see Bitwise Unsigned Right Shift function from an anonymous forum poster on www.phpbuilder.com (http://www.phpbuilder.com/board/showthread.php?threadid=10366408)
 */
class xxtea_component extends ppl_component
{
    /**
     * Encrypt string with key.
     *
     * @param string $str string to encrypt
     * @param string $key encryption key (16 characters max.)
     *
     * @return string encrypted cipher, otherwise NULL on error
     */
    public function encrypt($str, $key)
    {
        if (($str == '') || ($key == '')) {
            return;
        }
        $v = $this->str2long($str, false);
        $k = $this->str2long($key, false);
        if (count($k) < 4) {
            for ($i = count($k); $i < 4; ++$i) {
                $k[$i] = 0;
            }
        }
        $n = count($v) - 1;
        $z = $v[$n];
        $y = $v[0];
        $delta = 0x9E3779B9;
        $q = floor(6 + 52 / ($n + 1));
        $sum = 0;
        while (0 < $q--) {
            $sum = $this->int32($sum + $delta);
            $e = $sum >> 2 & 3;
            for ($p = 0; $p < $n; ++$p) {
                $y = $v[$p + 1];
                $mx = $this->int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ $this->int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
                $z = $v[$p] = $this->int32($v[$p] + $mx);
            }
            $y = $v[0];
            $mx = $this->int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ $this->int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
            $z = $v[$n] = $this->int32($v[$n] + $mx);
        }

        return $this->longtocipher($v);
    }

    /**
     * Decrypt cipher with key.
     *
     * @param string $cipher cipher to decrypt
     * @param string $key    encryption key (16 characters max.)
     *
     * @return string decrypted data, otherwise NULL on error
     */
    public function decrypt($cipher, $key)
    {
        if (($cipher == '') || ($key == '')) {
            return;
        }
        $cipher = $this->ciphertostr($cipher);
        $v = $this->str2long($cipher, false);
        $k = $this->str2long($key, false);
        if (count($k) < 4) {
            for ($i = count($k); $i < 4; ++$i) {
                $k[$i] = 0;
            }
        }
        $n = count($v) - 1;
        $z = $v[$n];
        $y = $v[0];
        $delta = 0x9E3779B9;
        $q = floor(6 + 52 / ($n + 1));
        $sum = $this->int32($q * $delta);
        while ($sum != 0) {
            $e = $sum >> 2 & 3;
            for ($p = $n; $p > 0; --$p) {
                $z = $v[$p - 1];
                $mx = $this->int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ $this->int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
                $y = $v[$p] = $this->int32($v[$p] - $mx);
            }
            $z = $v[$n];
            $mx = $this->int32((($z >> 5 & 0x07ffffff) ^ $y << 2) + (($y >> 3 & 0x1fffffff) ^ $z << 4)) ^ $this->int32(($sum ^ $y) + ($k[$p & 3 ^ $e] ^ $z));
            $y = $v[0] = $this->int32($v[0] - $mx);
            $sum = $this->int32($sum - $delta);
        }

        return $this->longtostring($v);
    }

    /**
     * Bitwise unsigned right shift.
     *
     * @param int $x 32 bits long integer to right shift
     * @param int $n number of bits
     *
     * @return int right shifted integer
     */
    private function SHR($x, $n)
    {
        $mask = 0x40000000;
        if ($x < 0) {
            $x &= 0x7FFFFFFF;
            $mask = $mask >> ($n - 1);
            $r = ($x >> $n) | $mask;
            // Fix comes here (setting the bit '32' as positive):
            $r = str_pad(decbin($r), 32, '0', STR_PAD_LEFT);
            $r[0] = '1';
            $r = bindec($r);
        } else {
            $r = (int) $x >> (int) $n;
        }

        return $r;
    }

    /**
     * Simulate 32 bits long integer.
     *
     * The simulation of integer overflow is needed because a number beyond the bounds of the integer type is automatically interpreted as a float in PHP
     *
     * @param int $n the integer to convert
     *
     * @return int 32 bits simulated integer
     */
    private function int32($n)
    {
        while ($n >= 2147483648) {
            $n -= 4294967296;
        }
        while ($n <= -2147483649) {
            $n += 4294967296;
        }

        return (int) $n;
    }

    /**
     * Convert a string into an array of long.
     *
     * @param string $s the string to convert
     * @param bool   $w indicate if we include the length of string
     *
     * @return array the array of long
     */
    private function str2long($s, $w)
    {
        $v = unpack('V*', $s.str_repeat("\0", (4 - strlen($s) % 4) & 3));
        $v = array_values($v);
        if ($w) {
            $v[count($v)] = strlen($s);
        }

        return $v;
    }

    /**
     * Convert an array of long into cipher (hexadecimal string).
     *
     * @param array $v the array of long
     *
     * @return string the cipher
     */
    private function longtocipher($v)
    {
        $r = '';
        $len = count($v);
        for ($i = 0; $i < $len; ++$i) {
            $c = array();
            array_push($c, $v[$i] & 0xFF);
            array_push($c, $this->SHR($v[$i], 8) & 0xFF);
            array_push($c, $this->SHR($v[$i], 16) & 0xFF);
            array_push($c, $this->SHR($v[$i], 24) & 0xFF);
            for ($j = 0; $j < 4; ++$j) {
                $hex = dechex($c[$j]);
                if (strlen($hex) == 1) {
                    $r .= '0'; // 'a' --> '0a'
                }
                $r .= $hex;
            }
        }

        return $r;
    }

    /**
     * Convert a cipher into binary string.
     *
     * @param string $hex the cipher
     *
     * @return string the binary string
     */
    private function ciphertostr($hex)
    {
        $r = '';
        $lh = strlen($hex);
        for ($i = 0; $i < $lh; $i += 2) {
            $c = chr(hexdec(substr($hex, $i, 2)));
            $r = $r.$c;
        }

        return $r;
    }

    /**
     * Convert array of long into binary string
     * (beta version).
     *
     * @param array $v the array of long
     *
     * @return string the binary string
     */
    private function longtostring($v)
    {
        $r = '';
        $len = count($v);
        for ($i = 0; $i < $len; ++$i) {
            $c = array();
            array_push($c, $v[$i] & 0xFF);
            array_push($c, $this->SHR($v[$i], 8) & 0xFF);
            array_push($c, $this->SHR($v[$i], 16) & 0xFF);
            array_push($c, $this->SHR($v[$i], 24) & 0xFF);
            for ($j = 0; $j < 4; ++$j) {
                // trick : we consider zero as end of string
                if ($c[$j] > 0) {
                    $r .= chr($c[$j]);
                }
            }
        }

        return $r;
    }
}
