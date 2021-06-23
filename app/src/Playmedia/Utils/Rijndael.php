<?php

namespace Playmedia\Utils;

/**
 * Crypt a string allowing bidirectionnal use. (encrypt/decrypt).
 *
 * @author David Guyon <d.guyon@playmedia.fr>
 */
class Rijndael
{
    const KEY = '91fb617ad5b7775074daade1f56c6dc35d7a127a';

    /**
     * Encrypt a string with key.
     * (using mcrypt & RIJNDAEL 256).
     *
     * @param array $data The array to encrypt
     *
     * @return string The encrypted cipher
     */
    public static function encrypt($data)
    {
        return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5(self::KEY), json_encode($data), MCRYPT_MODE_CBC, md5(md5(self::KEY))));
    }

    /**
     * Decrypt a cipher with key.
     * (using mcrypt & RIJNDAEL 256).
     *
     * @param string $cipher The cipher to decrypt
     *
     * @return string The decrypted string
     */
    public static function decrypt($cipher)
    {
        return json_decode(rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5(self::KEY), base64_decode($cipher), MCRYPT_MODE_CBC, md5(md5(self::KEY))), "\0"), true);
    }
}
