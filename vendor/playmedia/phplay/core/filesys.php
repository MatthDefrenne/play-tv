<?php
/**
 * PHPlay Framework.
 *
 * File system functions
 *
 * @static
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_filesys
{
    /**
     * Write text in a file.
     *
     * @static
     *
     * @param string $file     path and name of file
     * @param string $text     text to write
     * @param bool   $truncate truncate the file if true
     *
     * @return mixed returns the number of bytes written, or false on error
     */
    public static function write($file, $text, $truncate = false)
    {
        $dir = dirname($file);
        if ((self::mkdir($dir) === false) || !is_writable($dir)) {
            return false; // Cannot create directory or write files in directory : check permissions
        }
        $r = false;
        $mode = 'a'; // a+ ?
        if ($truncate !== false) {
            $mode = 'w'; // w+ ?
        }
        $fp = fopen($file, $mode);
        if ($fp) {
            stream_set_blocking($fp, 0);
            if (flock($fp, LOCK_EX)) {
                $r = fwrite($fp, $text);
            }
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        return $r;
    }

    /**
     * Recursive chmoded mkdir.
     *
     * @static
     *
     * @param string $pathname the directory path
     * @param int    $mode     the mode (not implemented yet)
     *
     * @return bool true on success, or false on error
     */
    public static function mkdir($pathname, $mode = 0755)
    {
        if (!is_dir($pathname)) {
            return mkdir($pathname, $mode, 1); // E_WARNING may happen if no sufficient permissions
        }

        return true;
    }

    /**
     * Recursive rmdir.
     *
     * @static
     *
     * @param string $realpath the real directory path (absolute path)
     * @param bool   $rmroot   delete specified top-level directory as well
     *
     * @return bool true on success, or false on error
     */
    public static function rrmdir($realpath, $rmroot = true)
    {
        $ds = DIRECTORY_SEPARATOR;
        $realpath = mb_substr($realpath, -1) == $ds ? mb_substr($realpath, 0, -1) : $realpath;
        if (is_dir($realpath) && $handle = opendir($realpath)) {
            while ($file = readdir($handle)) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $cdir = "{$realpath}{$ds}{$file}";
                if (is_dir($cdir)) {
                    self::rrmdir($cdir);
                } else {
                    unlink($cdir);
                }
            }
            closedir($handle);
            if ($rmroot === true) {
                rmdir($realpath);
            }

            return true;
        } else {
            return false;
        }
    }

    private function __construct()
    {
    }
    private function __clone()
    {
    }
}
