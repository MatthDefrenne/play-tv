<?php
/**
 * PHPlay Framework.
 *
 * (Request) uploaded file
 *
 * TODO : default upload directory ?
 * TODO : set_name() --> overrride filename
 * TODO : this class is useless ?
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.2
 */
final class ppl_request_file
{
    private $config,
        $tmpname,
        $error;

    public $name,
        $mime,
        $size;

    /**
     * Constructor.
     *
     * @param ppl_var $config application configuration
     * @param array   $file   uploaded file informations
     */
    public function __construct(ppl_var $config, $file)
    {
        if (isset($file['name']) && is_array($file['name'])) {
            throw new CoreException('HTML array feature with uploaded file is currently unsupported');
        }
        $this->config = $config;
        $this->name = (isset($file['name'])) ? $file['name'] : '';
        $this->mime = (isset($file['type'])) ? $file['type'] : '';
        $this->size = (isset($file['size'])) ? $file['size'] : 0;
        $this->tmpname = (isset($file['tmp_name'])) ? $file['tmp_name'] : null;
        $this->error = (isset($file['error'])) ? $file['error'] : 4; // 4 = No file was uploaded
    }

    /**
     * Check if file successfully uploaded.
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function uploaded()
    {
        return $this->error === 0;
    }

    /**
     * Get file error code.
     *
     * @see http://www.php.net/manual/en/features.file-upload.errors.php
     *
     * @return int file error code
     */
    public function get_error()
    {
        return $this->error;
    }

    /**
     * Get temporary file name.
     *
     * @return mixed filename as string, otherwise NULL
     */
    public function get_tmp_filename()
    {
        return ($this->uploaded()) ? $this->tmpname : null;
    }

    /**
     * Save the uploaded file.
     *
     * @param string $path      file save path
     * @param bool   $overwrite does not overwrite existing file if set to FALSE
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    public function save($path, $overwrite = true)
    {
        if ($this->uploaded() === false) {
            return false;
        }
        $ds = DIRECTORY_SEPARATOR;
        if (mb_substr($path, -1, 1) !== $ds) {
            $path .= $ds;
        }
        if (!is_writable($path)) {
            return false;
        }
        $destination = $path.basename($this->name);
        if (($overwrite === false) && is_file($destination)) {
            return true; // file already exists (no overwrite) TODO : return true or false ???
        }

        return move_uploaded_file($this->tmpname, $destination);
    }

    private function __clone()
    {
    }
}
