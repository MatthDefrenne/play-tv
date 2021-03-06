<?php

/**
 * This classes is provided by Cellpass to simplify the use of the Cellpass API.
 *
 *
 * @example use bill function
 *
 * //include Cellpass Stub
 * require_once 'StubCellpass.php';
 *
 * //init the Stub
 * $stub_cellpass = new StubCellpass ();
 * try{
 *      //do a billing in simple one function
 *      $info_transaction = array();
 *      if($stub_cellpass->bill(136, 'mon_client', $info_transaction)){
 *           //@todo bill succeed
 *      }
 *      else{
 *          //@todo bill failed
 *      }
 * }
 * catch (Exception $e){
 *      //@todo technical error
 * }
 *
 * @author Cellpass
 *
 * @version 1.0.1
 */
class StubCellpass
{
    //Your data
    public static $EDITOR_ID = '511';
    public static $SECRET = '4861H7RLjXa34K8953725graUFrO45Or';

    //Theses variables are only for advanced user
    public static $WORDING_REDIRECTION = '<a href="%url%">%url%</a>';          //wording to display in case of wording redirection
    public static $LOG_FILE = null;                                 //name of the log (if null no log in file)
    public static $LOG_PRIORITY_FILTER = StubCellpass_Log::WARN;               //filter the information to log according priority
    public static $CELLPASS_URL = 'https://api.cellpass.fr/cellpass/';  //Cellpass Api Url. Change only on Cellpass request
    public static $CELLPASS_DEBUG = false;                                //Change only on Cellpass request
    public static $DEBUG = false;                                //display all the log on the screen: must be false on production
    public static $TIME_OUT = 10;                                   //cURL parameter
    public static $MAXREDIRS = 10;                                   //cURL parameter
    public static $COOKIE = 'cellpass';                           //Cookie name to store transaction id (not cookie if null)
    public static $REDIR_TYPE = 'location_js_wording';                //location, refresh, js, wording, return, no-store ou or a combinaison (cf. fonction redirect)
    public static $TIME_DIFF_ALLOW = 600;                                  //1200 sec = 20 minutes
    public static $SSL_VERIFY = true;                                 //curl parameter put to false in ssl problem in dev, always to true in production

    const VERSION = '1.0.1';                              //Stub Version


    protected $_transaction_id = null;
    protected $_url = null;
    protected $_is_resil = null;
    protected $_info = null;
    protected static $_LOGGERS = null;

    //Possible return state
    const STATE_VALUE_UNKNOWN = 'Error unknown';
    const STATE_VALUE_NOT_EXISTS = 'This does not exist or does not belong to the right editor, site or service';
    const STATE_VALUE_DEACTIVATED = 'This is not activated';
    const STATE_VALUE_NO_OFFER = 'No offer found';
    const STATE_VALUE_INVALID_URL = 'Url is invalid';
    const STATE_VALUE_CLIENT_CANCEL = 'Client cancel the billing';
    const STATE_VALUE_CLIENT_ALREADY_SUBSCRIBE = 'This User has already subscribed to this service';
    const STATE_VALUE_CLIENT_NOT_AUTHORIZED = 'Client is not authorized to purchase this offer';
    const STATE_VALUE_CLIENT_SUBSCRIPTION_DATA = 'Subscription of the user is in an invalid state';
    const STATE_VALUE_OPERATOR = 'An error occurs on Operator side';
    const STATE_VALUE_CELLPASS = 'An error occurs on Cellpass side';
    const STATE_VALUE_CONFIGURATION = 'This service seems to not be correctly configured';
    const STATE_VALUE_UNEXPECTED_BEHAVIOUR = 'Unexpected client behaviour';
    const STATE_VALUE_TOO_OLD = 'This transaction is too old';
    const STATE_VALUE_INCOMPATIBLE = 'The service or the offer chosen is not compatible with this End-User';
    const STATE_VALUE_BILL_KO = 'Client does not complete billing';

    //Error generated by the Stub

    const ERROR_STUB_NO_SUBSCRIPTION = 'Error this user has no subscription';
    const ERROR_STUB_NO_TRANSACTION = 'Error no transaction found';
    const ERROR_STUB_INVALID_TS = 'Error timestamp invalid';
    const ERROR_STUB_CURL = 'Error requesting Cellpass Api (curl erro: %error%)';
    const ERROR_STUB_HTTP = 'Error requesting Cellpass Api (http status code: %code%)';
    const ERROR_STUB_JSON = 'Error decoding json return';
    const ERROR_STUB_INVALID_URL = 'Error invalid Url';
    const ERROR_STUB_UNKNOWN = 'Error Unknown';

    /**
     * Constructor
     * if not transaction are passed on contruction
     * we try to retrieve it
     * from $_GET variable
     * from $_COOKIE variable.
     *
     * @param string $transaction_id
     * @param bool   $is_resil
     */
    public function __construct($transaction_id = null, $is_resil = false)
    {
        if (!empty($transaction_id)) {
            $this->_transaction_id = $transaction_id;
            $this->_is_resil = $is_resil;
        } elseif ($transaction_id !== false) {
            if (isset($_GET['transaction_id'])) {
                $this->_transaction_id = $_GET['transaction_id'];
                $this->_is_resil = isset($_GET['resil']);
            } elseif ($transaction_id == null && self::$COOKIE && isset($_COOKIE[self::$COOKIE]) && !empty($_COOKIE[self::$COOKIE])) {
                $info = $this->getCookie();
                $this->_transaction_id = $info['transaction_id'];
                $this->_url = $info['route_url'];
                $this->_is_resil = $info['is_resil'];
            }
        }
        $this->deleteCookie();
        self::log('contructor', StubCellpass_Log::DEBUG);
    }

    /**
     * Do the whole paiement journey.
     *
     *
     * ATTENTION: This fonction will redirect user. All code before it, could be executed more than once.
     * POST parameter will not be conserved on second execution.
     *
     * @param string $service_id
     * @param string $customer_editor_id
     * @param array  $transaction_info   ATTENTION  Passing by reference: provides information on transaction
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return bool true iof paiement succeed or user is already subscriber.
     */
    public function bill($service_id, $customer_editor_id, &$transaction_info = null, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $transaction_info = null;
        //si on a une transaction on teste sa validit??
        if ($this->_transaction_id != null) {
            $burn = isset($options['burn']) ? $options['burn'] : true;
            $info = $this->end($burn);
            $transaction_info = $info;
            if (!$this->_is_resil && $info['success'] && $info['service_id'] == $service_id && $info['customer_editor_id'] == $customer_editor_id) {
                return true;
            }

            return false;
        } else {
            try {
                $this->init($service_id, $customer_editor_id, null, $options);

                return $this->route();
            } catch (Exception $e) {
                if (strpos($e->getMessage(), self::STATE_VALUE_CLIENT_ALREADY_SUBSCRIBE) !== false) {
                    return true;
                } else {
                    throw $e;
                }
            }
        }
    }

    /**
     * Stop a subscription.
     *
     * ATTENTION: This fonction will redirect user. All code before it, could be executed more than once.
     * POST parameter will not be conserved on second execution.
     *
     * @param string $subscription_id
     * @param array  $transaction_info ATTENTION  Passing by reference: provides information on resiliation transaction
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return bool
     */
    public function resil($subscription_id, &$transaction_info, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $transaction_info = null;
        //si on a une transaction on teste sa validit??
        if (!empty($this->_transaction_id)) {
            $info = $this->end();
            $transaction_info = $info;
            if ($this->_is_resil && $info['subscription_id'] == $subscription_id) {
                return $info['success'];
            }

            return false;
        } else {
            $this->initResil($subscription_id, null, $options);

            return $this->route();
        }
    }

    /**
     * Stop a subscription defined by customer_editor_id and un service_id.
     *
     * ATTENTION: This fonction will redirect user. All code before it, could be executed more than once.
     * POST parameter will not be conserved on second execution.
     *
     * @param string $service_id
     * @param string $customer_editor_id
     * @param array  $transaction_info   ATTENTION  Passing by reference: provides information on resiliation transaction
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return bool
     */
    public function resilByCustomerEditorId($service_id, $customer_editor_id, &$transaction_info, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $transaction_info = null;
        if (!empty($this->_transaction_id)) {
            $info = $this->end();
            $transaction_info = $info;
            if ($this->_is_resil && $info['subscription']['customer_editor_id'] == $customer_editor_id && $info['subscription']['service_id'] == $service_id) {
                return $info['success'];
            }

            return false;
        } else {
            $options_synchro = array();
            //$options_synchro['service_id'] = $service_id;
            $options_synchro['customer_editor_id'] = $customer_editor_id;
            $res = self::synchro($options_synchro);

            if (!isset($res[0])) {
                throw new StubCellpass_Exception(self::ERROR_STUB_NO_SUBSCRIPTION);
            }
            $subscription_id = $res[0]['id'];

            return $this->resil($subscription_id, $transaction_info, $options);
        }
    }

    /**
     * Stop a subscription defined by customer_id et un service_id.
     *
     * ATTENTION: This fonction will redirect user. All code before it, could be executed more than once.
     * POST parameter will not be conserved on second execution.
     *
     * @param string $service_id
     * @param string $customer_id
     * @param array  $transaction_info ATTENTION  Passing by reference: provides information on resiliation transaction
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return bool
     */
    public function resilByCustomerId($service_id, $customer_id, &$transaction_info, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $transaction_info = null;
        if (!empty($this->_transaction_id)) {
            $info = $this->end();
            $transaction_info = $info;
            if ($this->_is_resil && $info['subscription']['customer_id'] == $customer_id && $info['subscription']['service_id'] == $service_id) {
                return $info['success'];
            }

            return false;
        } else {
            $options_synchro = array();
            //$options_synchro['service_id'] = $service_id;
            $options_synchro['customer_id'] = $customer_id;
            $res = self::synchro($options_synchro);
            if (!isset($res[0])) {
                throw new StubCellpass_Exception(self::ERROR_STUB_NO_SUBSCRIPTION);
            }
            $subscription_id = $res[0]['id'];

            return $this->resil($subscription_id, $transaction_info, $options);
        }
    }

    /**
     * Initialize a billing transaction.
     *
     * @param string $service_id
     * @param string $customer_editor_id
     * @param string $url_ok             it can be a relative url
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return string the transaction id
     */
    public function init($service_id, $customer_editor_id, $url_ok, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $params = $options;
        if ($params == null) {
            $params = array();
        }

        $params['service_id'] = $service_id;
        if ($customer_editor_id != null) {
            $params['customer_editor_id'] = $customer_editor_id;
        }
        if ($url_ok != null) {
            $params['url_ok'] = $url_ok;
        }

        $transaction_id = $this->initCommun('init', $params);
        $this->_is_resil = false;

        return $transaction_id;
    }

    /**
     * Initialize a resiliation transaction.
     *
     *
     * @param string $subscription_id
     * @param string $url_ok          it can be a relative url
     * @param array  $options
     *
     * @throws StubCellpass_Exception
     *
     * @return string the resiliation id
     */
    public function initResil($subscription_id, $url_ok, $options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $params = $options;
        if ($params == null) {
            $params = array();
        }

        $params['subscription_id'] = $subscription_id;
        if ($url_ok != null) {
            $params['url_ok'] = $url_ok;
        }

        $transaction_id = $this->initCommun('init_resil', $params);
        $this->_is_resil = true;

        return $transaction_id;
    }

    /**
     * Redirect a user on billing or resiliation page
     * to be use after a init (or initResil).
     *
     * ATTENTION: will do a "exit();" a the end.
     * The code after will never be executed
     *
     * @throws StubCellpass_Exception
     */
    public function route()
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        if (!empty($this->_url)) {
            $this->setCookie();

            return self::redirect($this->_url);
        } else {
            throw new StubCellpass_Exception(self::ERROR_STUB_NO_TRANSACTION);
        }
    }

    /**
     * Return information on a transaction
     * optionally "burn" the transaction.
     *
     * @param bool $burn
     *
     * @throws StubCellpass_Exception
     *
     * @return array
     */
    public function end($burn = false)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        if (is_array($this->_info) && $this->_info['state'] == 'end' && $this->_info['state_value'] != 'ok') {
            return $this->_info;
        }

        if (empty($this->_transaction_id)) {
            throw new StubCellpass_Exception(self::ERROR_STUB_NO_TRANSACTION);
        }

        $params = array();
        $params['transaction_id'] = $this->_transaction_id;
        $params['burn'] = $burn;

        $method = 'end';
        if ($this->_is_resil) {
            $method = 'end_resil';
        }

        $this->_info = self::call($method, $params);

        return $this->_info;
    }

    /**
     * To retrieve identification information.
     *
     * ATTENTION: This fonction will redirect user. All code before it, could be executed more than once.
     * POST parameter will not be conserved on second execution.
     *
     * @param bool  $force_redir
     * @param array $params
     *
     * @throws StubCellpass_Exception
     *
     * @return array
     */
    public static function id($force_redir = false, $params = array())
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        if (isset($_GET['ret_id_cellpass']) && !$force_redir) {
            $res = $_GET;
            unset($res['ret_id_cellpass']);
            try {
                if (!self::isSecurizedUrl()) {
                    return false;
                }
            } catch (StubCellpass_Exception $e) {
                if (strpos($e->getMessage(), 'timestamp invalid' !== false)) {
                    $this->id(true);
                }
            }

            return $res;
        } else {
            //get redirection url
            if (isset($params['url'])) {
                $url = $params['url'];
                $url = self::toAbsUrl($url);
            } else {
                $url = self::getCurrentUrl();
            }

            if (!self::isAbsUrl($url)) {
                throw new StubCellpass_Exception(ERROR_STUB_INVALID_URL);
            }

            if (strpos($url, '?') !== false) {
                $url .= '&';
            } else {
                $url .= '?';
            }
            $url .= 'ret_id_cellpass=1';

            $params['url'] = $url;

            $res = self::call('id', $params);

            //redirection
            $redirection = $res['url'];

            return self::redirect($redirection);
        }
    }

    /**
     * To retrieve information about subscription and act purchase.
     *
     * @params array $options
     *
     * @return array
     */
    public static function synchro($options = null)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        $params = $options;
        if ($params === null) {
            $params = array();
        }
        $ret = self::call('synchro', $params);

        return $ret['data'];
    }

    /**
     * Commun part of both init: init et initResil.
     *
     * @param string $method
     * @param array  $params
     *
     * @throws StubCellpass_Exception
     *
     * @return string transaction_id
     */
    protected function initCommun($method, $params)
    {
        self::log('begin', StubCellpass_Log::DEBUG);
        foreach ($params as $key => $value) {
            if ($value === null) {
                unset($params[$key]);
            }
        }

        //url_ok
        if (!isset($params['url_ok'])) {
            $params['url_ok'] = self::getCurrentUrl();
        }
        $params['url_ok'] = self::toAbsUrl($params['url_ok']);

        //url_nok
        if (isset($params['url_ko'])) {
            $params['url_ko'] = self::toAbsUrl($params['url_ko']);
            $params['url_ko'] = $params['url_ko'];
        }

        $res = self::call($method, $params);

        $this->_url = $res['url'];
        $this->_transaction_id = isset($res['transaction_id']) ? $res['transaction_id'] : false;

        return $this->_transaction_id;
    }

    /**
     * Add security paramater to a url (signature).
     *
     * @param string $url
     *
     * @return string
     */
    protected static function getSecurizeUrl($url)
    {
        //getting the url without protocol and hostname
        $parsed_url = parse_url($url);
        $uri = $parsed_url['path'].'?'.$parsed_url['query'];

        $uri .= '&ts='.(time());                            //adding a timestamp
        $uri .= '&rnd='.base_convert(mt_rand(), 10, 36);    //adding a random variable
        $uri .= '&sign='.md5($uri.self::$SECRET);          //adding the signature

        //building the url with protocol and hostname
        $res = '';
        $res .= isset($parsed_url['scheme']) ? $parsed_url['scheme'].'://' : '';
        $res .= $parsed_url['host'];
        $res .= $uri;

        return $res;
    }

    /**
     * Return true is url is correctly signed.
     *
     * @param string $url
     *
     * @throws StubCellpass_Exception
     *
     * @return bool
     */
    protected static function isSecurizedUrl($url = null)
    {
        if (empty($url)) {
            $url = self::getCurrentUrl();
        }

        $parsed_url = parse_url($url);
        $query = $parsed_url['query'];
        parse_str($query, $parsed_query);

        $ts = $parsed_query['ts'];
        $sign = $parsed_query['sign'];

        $uri = $parsed_url['path'].'?'.$parsed_url['query'];
        $pattern = '%[?&]sign=[a-zA-Z0-9]+%';
        $uri = preg_replace($pattern, '', $uri);

        $cal_sign = md5($uri.self::$SECRET);

        if ($cal_sign != $sign) {
            return false;
        }

        //check time stamp
        if ($ts < (time() - self::$TIME_DIFF_ALLOW) || $ts > (time() + self::$TIME_DIFF_ALLOW)) {
            throw new StubCellpass_Exception(self::ERROR_STUB_INVALID_TS);
        }

        return true;
    }

    /**
     * Do the http call.
     *
     * @param string $method
     * @param array  $params
     * @param bool   $check_status
     *
     * @throws StubCellpass_Exception
     *
     * @return array
     */
    protected static function call($method, $params, $check_status = true)
    {
        try {
            $params['editor_id'] = self::$EDITOR_ID;

            //construct the request
            $url = self::$CELLPASS_URL.$method.'';
            if (strpos($url, '?') === false) {
                $url .= '?';
            } else {
                $url .= '&';
            }

            if (!empty(self::$CELLPASS_DEBUG)) {
                $params['debug'] = self::$CELLPASS_DEBUG;
            }

            $url .= http_build_query($params, null, '&');
            $url = self::getSecurizeUrl($url);

            self::log('Call url: '.$url, StubCellpass_Log::INFO);

            //construction cURL object
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_TIMEOUT, self::$TIME_OUT);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::$TIME_OUT);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_MAXREDIRS, self::$MAXREDIRS);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, self::$SSL_VERIFY);

            //execute request and get resultat
            $data = curl_exec($ch);
            $ret = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);

            self::log('Return '.$ret.': '.var_export($data, true), StubCellpass_Log::INFO);

            //analyse resultat
            if ($data === false) {
                $message = str_replace('%error%', $error, self::ERROR_STUB_CURL);
                $res = array('status' => 'failure', 'message' => $message);
            } else {
                $res = json_decode($data, true);
                if ($res === null) {
                    if ($ret != 200) {
                        $message = $message = str_replace('%code%', $ret, self::ERROR_STUB_HTTP);
                        $res = array('status' => 'failure', 'message' => $message);
                    } else {
                        $res = array('status' => 'failure', 'message' => self::ERROR_STUB_JSON);
                    }
                }
            }
        } catch (Exception $e) {
            $res = array('status' => 'failure', 'message' => $e->getMessage());
        }
        if ($check_status && $res['status'] != 'success') {
            $message = isset($res['message']) ? $res['message'] : self::ERROR_STUB_UNKNOWN;
            self::log($message, StubCellpass_Log::ERR);
            throw new StubCellpass_Exception($message);
        }

        return $res;
    }

    /**
     * Get the current url (if behind a proxy, the current url from user point of view).
     *
     * @return string
     */
    protected static function getCurrentUrl()
    {
        $url = '';
        if (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS'])) {
            $url = 'https://';
        } else {
            $url = 'http://';
        }
        $host = $_SERVER['HTTP_HOST'];
        if (isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
            $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
        }
        $url .= $host;
        if (isset($_SERVER['HTTPS'])) {
            if ($_SERVER['SERVER_PORT'] != 443) {
                $url .= ':'.$_SERVER['SERVER_PORT'];
            }
        } else {
            if ($_SERVER['SERVER_PORT'] != 80) {
                $url .= ':'.$_SERVER['SERVER_PORT'];
            }
        }
        $url .= $_SERVER['REQUEST_URI'];

        self::log('Current url: '.$url, StubCellpass_Log::DEBUG);

        return $url;
    }

    /**
     * @param string $url
     *
     * @return bool true is url is absolute
     */
    protected static function isAbsUrl($url)
    {
        self::log('begin', StubCellpass_Log::DEBUG);

        return (strpos($url, '://') > 0);
    }

    /**
     * Convert a absolute url on relative url.
     *
     * @param string $url
     *
     * @throws StubCellpass_Exception
     *
     * @return string
     */
    protected static function toAbsUrl($url)
    {
        //is url already absolute
        if (self::isAbsUrl($url)) {
            return $url;
        }

        $base = self::getCurrentUrl();

        //parsing both url the current and the given one
        $parsed_base = parse_url($base);
        $parsed_url = parse_url($url);

        self::log('toAbsUrl: '.$url.' ('.$base.')', StubCellpass_Log::DEBUG);

        //get elements to add to the given url
        if (!isset($parsed_url['scheme'])) {
            $parsed_url['scheme'] = $parsed_base['scheme'];
        }
        if (!isset($parsed_url['host'])) {
            $parsed_url['host'] = $parsed_base['host'];
            if (!isset($parsed_url['user']) && isset($parsed_base['user'])) {
                $parsed_url['user'] = $parsed_base['user'];
                if (!isset($parsed_url['pass']) && isset($parsed_base['pass'])) {
                    $parsed_url['pass'] = $parsed_base['pass'];
                }
            }

            if (!isset($parsed_url['path'])) {
                $parsed_url['path'] = $parsed_base['path'];
                if (!isset($parsed_url['query']) && isset($parsed_base['query'])) {
                    $parsed_url['query'] = $parsed_base['query'];
                }
            } else {
                if (substr($parsed_url['path'], 0, 1) != '/') {
                    $pos = strrpos($parsed_base['path'], '/');
                    $dir = substr($parsed_base['path'], 0, $pos + 1);
                    $parsed_url['path'] = $dir.$parsed_url['path'];
                }
            }
        }

        //reconstruct the given url
        $url = $parsed_url['scheme'].'://';
        if (isset($parsed_url['user'])) {
            $url .=  $parsed_url['user'];
            if (isset($parsed_url['pass'])) {
                $url .=  ':'.$parsed_url['pass'];
            }
            $url .= '@';
        }
        $url .=  $parsed_url['host'].$parsed_url['path'];
        if (isset($parsed_url['query'])) {
            $url .=  '?'.$parsed_url['query'];
        }
        if (isset($parsed_url['fragment'])) {
            $url .=  '#'.$parsed_url['fragment'];
        }

        self::log('res: '.$url, StubCellpass_Log::DEBUG);

        if ($url == false) {
            throw new StubCellpass_Exception(self::ERROR_STUB_INVALID_URL);
        }

        self::log('AbsUrl: '.$url, StubCellpass_Log::DEBUG);

        return $url;
    }

    /**
     * delete the cookie.
     */
    protected function deleteCookie()
    {
        if (self::$COOKIE && isset($_COOKIE[self::$COOKIE])) {
            setcookie(self::$COOKIE, '', 0, '/');
        }
    }

    /**
     * Store information of the current transaction in a cookie.
     */
    protected function setCookie()
    {
        if (self::$COOKIE) {
            if ($this->_transaction_id) {
                $info = array();
                $info['transaction_id'] = $this->_transaction_id;
                $info['route_url'] = $this->_url;
                $info['is_resil'] = $this->_is_resil;
                $cookie = serialize($info);
                setcookie(self::$COOKIE, $cookie, 0, '/');
            } else {
                $this->deleteCookie();
            }
        }
    }

    /**
     * Retrieve information of the current transaction from the cookie.
     *
     * @return array
     */
    protected function getCookie()
    {
        if (isset($_COOKIE[self::$COOKIE])) {
            $cookie = $_COOKIE[self::$COOKIE];
            if (get_magic_quotes_gpc()) {
                $cookie = stripslashes($cookie);
            }
            $info = unserialize($cookie);

            return $info;
        }

        return;
    }

    /**
     * Do a redirection for a given url.
     *
     * ATTENTION: will do a "exit();" a the end.
     * The code after will never be executed
     *
     * @param string $url
     * @param string $url_history url a ajouter ?? l'historique navigateur
     */
    protected static function redirect($url)
    {
        self::log('Redirect: '.$url, StubCellpass_Log::INFO);
        if (strpos(self::$REDIR_TYPE, 'no-store') !== false) {
            header('Cache-Control: no-store, no-cache, must-revalidate');
        }
        if (strpos(self::$REDIR_TYPE, 'refresh') !== false) {
            header('Refresh:0;'.$url);
        }
        if (strpos(self::$REDIR_TYPE, 'location') !== false) {
            header('Location:'.$url);
        }
        if (strpos(self::$REDIR_TYPE, 'wording') !== false) {
            echo str_replace('%url%', $url, self::$WORDING_REDIRECTION);
        }
        /*
        if(strpos(self::$REDIR_TYPE,'historyjs') !== false){
            echo '<script type="text/javascript">';
            echo 'if (typeof history.pushState !== "undefined") {history.pushState("back_from_billing", "Paiement back", window.location.href);}';
            echo '</script>';
        }
        */
        if (strpos(self::$REDIR_TYPE, 'js') !== false) {
            echo '<script type="text/javascript">';
            echo 'window.location.href = "'.$url.'"; ';
            echo '</script>';
        }
        if (strpos(self::$REDIR_TYPE, 'return') !== false) {
            return $url;
        }
        exit();
    }

/**
 * Log (or display) information.
 *
 * @param string $str
 * @param int    $priority
 * @param int    $rank
 * @param bool   $display_func_args
 */
    /*protected*/ public static function log($str, $priority = StubCellpass_Log::WARN, $rank = 1, $display_func_args = true)
 {
     $lst_loggers = self::getLoggers();
     if (!empty($lst_loggers)) {
         $backtrace = debug_backtrace();
         $called_info = '';
         if (count($backtrace) > $rank) {
             $called_trace = $backtrace[$rank];
             $called_info = $called_trace['function'];
             if ($display_func_args) {
                 $lst_args = isset($called_trace['args']) ? $called_trace['args'] : array();
                 $str_args = '';
                 foreach ($lst_args as $one_args) {
                     if (!empty($str_args)) {
                         $str_args .= ',';
                     }
                     $str_args .= var_export($one_args, true);
                 }
                 $called_info .= '('.$str_args.')';
             }
             $called_trace = $backtrace[max(0, $rank - 1)];
             $called_info .= ' - ('.$called_trace['file'].':'.$called_trace['line'].') ';
         }
         $str = ' (v'.self::VERSION.') '.$called_info.' -  '.$str;
         foreach ($lst_loggers as $logger) {
             $logger->log($str, $priority);
         }
     }
 }

    protected static function getLoggers()
    {
        if (self::$_LOGGERS == null) {
            self::$_LOGGERS = array();
            if (!empty(self::$LOG_FILE)) {
                self::$_LOGGERS[] = new StubCellpass_Log(self::$LOG_FILE, self::$LOG_PRIORITY_FILTER);
            }
            if (self::$DEBUG) {
                self::$_LOGGERS[] = new StubCellpass_Log('php://output', StubCellpass_Log::DEBUG);
            }
        }

        return self::$_LOGGERS;
    }
}

class StubCellpass_Log
{
    const EMERG = 0;
    const ALERT = 1;
    const CRIT = 2;
    const ERR = 3;
    const WARN = 4;
    const NOTICE = 5;
    const INFO = 6;
    const DEBUG = 7;

    protected $_destination;
    protected $_priority_filter;

    protected static $_EXTRA_HEADERS = '';

    /**
     * @param mixed $destination
     * @param int   $level_filter
     */
    public function __construct($destination, $priority_filter = self::WARN)
    {
        $this->_destination = $destination;
        $this->_priority_filter = $priority_filter;
    }

    /**
     * @param string $message
     * @param int    $priority
     */
    public function log($message, $priority)
    {
        if ($priority <= $this->_priority_filter) {
            $message = date('Y-m-d H:i:s').$message;
            $this->write($message);
        }
    }

    /**
     * @param string $message
     */
    protected function write($message)
    {
        $res = false;
        //if is an email
        if (preg_match('/^[_a-zA-Z0-9-]+(.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+.)+[a-zA-Z]{2,4}$/', $this->_destination)) {
            $res = error_log($message, 1, $this->_destination, self::$_EXTRA_HEADERS);
        }
        //if is the stderr
        elseif ($this->_destination == 'php://stderr') {
            $res = error_log($message);
        }
        //if output
        elseif ($this->_destination == 'php://output') {
            echo $message.'<br/>'."\n";
            $res = true;
        } else {
            $res = error_log($message."\n", 3, $this->_destination);
        }

        return $res;
    }
}

class StubCellpass_Exception extends Exception
{
    public function __construct($message, $priority = StubCellpass_Log::ERR)
    {
        $message = 'Error: '.$message;
        StubCellpass::log($message, $priority, 2);
        parent::__construct($message);
    }
}
