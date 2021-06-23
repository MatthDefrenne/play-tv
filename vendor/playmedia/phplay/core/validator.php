<?php
/**
 * PHPlay Framework.
 *
 * validator base class
 *
 * TODO: re-think validators : build a true API who check for param type, default params, etc...
 *
 * If we create a custom configuration file in the application, we MUST be able de build own validator but they must be outside /core/validator/ directory
 * (find a solution for this case to make config loader able to be reusable anywhere in application)
 * VERY IMPORTANT FEATURE --> REALLY FIND A SOLUTION !!!
 *
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.2.1
 */
abstract class ppl_validator
{
    protected $config,
        $file,
        $allowed = array(),
        $default_section = '_default_';

    /**
     * $this->allowed must be an array of sections filled by an associative array of parameters with default value.
     *
     * example :
     *           $this->allowed = array(
     *                                  'section_name' = array(
     *                                                         'param_name01' => 'default_value01',
     *                                                         'param_name02' => 'default_value02'
     *                                                         )
     *                                  );
     *
     * NULL as default value means there is no default value (parameter is left unsetted)
     */
    abstract public function parse(&$content, ppl_var $config);

    /**
     * Constructor.
     *
     * @param ppl_var $config configuration
     * @param string  $name   configuration name
     */
    final public function __construct(ppl_var $config, $name)
    {
        $this->config = $config;
        $this->file = "{$config->path->config}{$name}.conf";
    }

    /**
     * Basic Content Validation
     * (Search invalid sections and parameters, set default parameters).
     *
     * @param array $content        the data (by reference)
     * @param bool  $match_section  ignore section name if false and search in $this->allowed[$this->default_section]
     * @param bool  $disallow_empty ignore empty data if false
     */
    final public function validate(&$content, $match_section = true, $disallow_empty = true)
    {
        if ((!is_array($content)) || (count($content) === 0) && ($disallow_empty == true)) {
            throw new ValidatorException("Invalid data configuration in {$this->file}");
        }
        if ($match_section === true) {
            foreach ($this->allowed as $section => $conf) {
                if (!isset($content[$section])) {
                    throw new ValidatorException("Missing section '{$section}' in {$this->file}");
                }
            }
        }
        foreach ($content as $k => $v) {
            if (isset($this->allowed[$k]) || ($match_section === false)) {
                $section_name = $k;
                if (($section_name == '') || !is_array($v)) {
                    throw new ValidatorException("Invalid section data in {$this->file}");
                }
                if ($match_section === false) {
                    $k = $this->default_section;
                }
                $params = &$content[$section_name];
                $errors = array_diff(array_keys($v), array_keys($this->allowed[$k]));
                if (count($errors) > 0) {
                    // unknown parameter
                    $p = current($errors);
                    throw new ValidatorException("Invalid parameter '{$p}' in {$this->file} at section '{$section_name}'");
                }
            } else {
                // unknown section
                throw new ValidatorException("Invalid section '{$k}' in {$this->file}");
            }
        }
        foreach ($content as $s => $p) {
            $s_content = &$content[$s];
            $s_allowed = ($match_section === false) ? $this->allowed[$this->default_section] : $this->allowed[$s];
            foreach ($s_allowed as $k => $v) {
                if (!isset($s_content[$k]) && ($s_allowed[$k] !== null)) {
                    // set default parameter
                    $s_content[$k] = $s_allowed[$k];
                }
            }
        }
    }

    private function __clone()
    {
    }
}
final class ValidatorException extends Exception
{
}
