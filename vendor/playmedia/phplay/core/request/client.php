<?php
/**
 * PHPlay Framework.
 *
 * Client information object
 *
 * Use the php class Mobile_Detect for device detection (https://github.com/serbanghita/Mobile-Detect)
 * Use php get_browser() for additionnal detection (http://php.net/manual/en/function.get-browser.php)
 * Use php GeoIP NGINX headers for location and organisation (isp) detections (http://php.net/manual/en/book.geoip.php)
 *
 * @author Playmedia <contact at playmedia dot fr>
 *
 * @version 0.1.0
 */
final class ppl_request_client
{
    /**
     * The application configuration object.
     *
     * @var ppl_var
     */
    private $config;

    /**
     * The request object.
     *
     * @var ppl_request
     */
    private $request;

    /**
     * The Mobile_Detect object instance.
     *
     * @var Mobile_Detect
     */
    private $mobile_detect = null;

    /**
     * Indicates if client is a mobile.
     *
     * @var bool
     */
    private $is_mobile = null;

    /**
     * Indicates if client is a tablet.
     *
     * @var bool
     */
    private $is_tablet = null;

    /**
     * The UA Parser object instance.
     *
     * @var UAParser\Parser
     */
    private $parsed_ua = null;

    /**
     * Constructor.
     *
     * @param ppl_var $config application configuration
     */
    public function __construct(ppl_var $config, ppl_request $request)
    {
        $this->config = $config;
        $this->request = $request;
    }

    /**
     * Get browser information object.
     *
     * @return object the browser information object
     */

    /**
     * Get browser information object.
     *
     * @param mixed $user_agent   Null or a valid UA
     * @param bool  $return_array Return flag array or stdClass
     *
     * @return mixed
     */
    public function get_browser($user_agent = null, $return_array = false)
    {
        return get_browser($user_agent, $return_array);
    }

    /**
     * Get Mobile_Detect object instance.
     *
     * @see https://github.com/serbanghita/Mobile-Detect
     *
     * @return Mobile_Detect The Mobile_Detect object instance, otherwise NULL on error
     */
    public function mobile_detect()
    {
        if ($this->mobile_detect === null) {
            $this->mobile_detect = new Mobile_Detect();
        }

        return $this->mobile_detect;
    }

    /**
     * Checks if client is a crawler
     * (work only if browscap.ini is configured in php.ini).
     *
     * @return bool TRUE if crawler, otherwise false
     */
    public function is_crawler()
    {
        return isset($this->get_browser()->crawler) && ($this->get_browser()->crawler == '1');
    }

    /**
     * Checks if client is a computer.
     *
     * @return bool TRUE if computer, otherwise false
     */
    public function is_computer()
    {
        return !$this->is_crawler() && !$this->is_mobile() && !$this->is_tablet();
    }

    /**
     * Checks if client is a mobile.
     *
     * @return bool TRUE if mobile, otherwise false
     */
    public function is_mobile()
    {
        if ($this->is_mobile === null) {
            $this->is_mobile = $this->mobile_detect()->isMobile();
        }

        return $this->is_mobile;
    }

    /**
     * Checks if client is a tablet.
     *
     * @return bool TRUE if tablet, otherwise false
     */
    public function is_tablet()
    {
        if ($this->is_tablet === null) {
            $this->is_tablet = $this->mobile_detect()->isTablet();
        }

        return $this->is_tablet;
    }

    /**
     * Get the client two letter country code.
     *
     * @return mixed The country code as string, otherwise NULL
     */
    public function get_country_code()
    {
        return (isset($_SERVER['HTTP_X_GEOIP_COUNTRY_CODE'])) ? $_SERVER['HTTP_X_GEOIP_COUNTRY_CODE'] : null;
    }

    /**
     * Get the client full country name.
     *
     * @return mixed The country name as string, otherwise NULL
     */
    public function get_country_name()
    {
        return (isset($_SERVER['HTTP_X_GEOIP_COUNTRY_NAME'])) ? $_SERVER['HTTP_X_GEOIP_COUNTRY_NAME'] : null;
    }

    /**
     *
     */
    public function get_language()
    {
        if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
            if ($locale = \Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
                return \Locale::getPrimaryLanguage($locale);
            }
        }

        return;
    }

    /**
     * Get the client Internet Service Provider (ISP) name.
     *
     * @return mixed the isp name, otherwise NULL
     */
    public function get_isp_name()
    {
        return (isset($_SERVER['HTTP_X_GEOIP_ORG'])) ? $_SERVER['HTTP_X_GEOIP_ORG'] : null;
    }

    /**
     * Get parsed user agent if any.
     *
     * @return mixed
     */
    public function get_parsed_ua()
    {
        if (null === $this->parsed_ua && null !== $this->request->user_agent) {
            $parser = \UAParser\Parser::create();

            $this->parsed_ua = $parser->parse($this->request->user_agent);
        }

        return $this->parsed_ua;
    }
}
