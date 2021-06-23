<?php

/**
 * Contains partners utils & detection functions
 * (Wibox, Dartybox, etc ...).
 *
 * @see ip to cidr convertor : http://ip2cidr.com/
 * @see cidr to ip convertor : http://magic-cookie.co.uk/iplist.html
 *
 * @author PLAYMEDIA
 */
class partners_component extends ppl_component
{
    /**
     * App component instance.
     *
     * @var ppl_component_app
     */
    private $app;

    /**
     * The logger object instance.
     *
     * @var ppl_log_logger
     */
    private $logger;

    /**
     * Dartybox cidr list.
     * Last update : 2013-04-17.
     *
     * @var array
     */
    private $dartybox_cidr_list = array(
        '89.157.128.0/19',
        '89.157.160.0/19',
        '89.157.192.0/18',
        '89.157.0.0/16',
        '89.158.0.0/16',
        '89.159.0.0/17',
        '89.159.128.0/18',
        '89.159.192.0/19',
        '89.159.224.0/20',
        '89.159.240.0/21',
        '89.159.248.0/22',
        '89.159.252.0/23',
        '89.224.0.0/14',
        '89.227.0.0/16',
        '92.102.0.0/16',
    );

    /**
     * Wibox cidr list
     * Last update : 2013-04-17.
     *
     * @var array
     */
    private $wibox_cidr_list = array(
        '5.158.240.0/20',
        '37.220.48.0/20',
        '46.162.128.0/18',
        '79.174.201.200/29',
        '92.250.140.0/22',
        '92.250.150.0/23',
        '92.250.152.0/23',
        '92.250.160.0/22',
        '95.174.72.0/21',
        '109.120.107.0/24',
        '109.120.108.0/23',
        '109.120.110.0/24',
        '185.9.96.0/22',
        '188.73.0.0/18',
        '212.56.231.0/24',
        '212.56.233.0/24',
        '212.56.245.0/24',
        '212.56.246.0/23',
        '212.56.248.0/24',
        '212.56.252.0/24',
        '62.64.32.0/19',
        '213.151.176.0/20',
        '213.151.160.0/21',
    );

    /**
     * Playmedia cidr list
     * Last update : 2013-11-28.
     *
     * @var array
     */
    private $playmedia_cidr_list = array(
        '78.200.61.65/32',     // Freebox Playmedia
        '89.202.139.128/25',   // Interoute
        '84.233.174.88/29',    // Interoute
        '192.168.1.0/24',      // Local network Magenta
        '82.224.201.2/32',     // Freebox SK
        '10.0.0.0/24',         // Vagrant
    );

    /**
     * Contains ip address ranges calculated from cidr lists.
     *
     * @var array
     */
    private $ip_ranges = array();

    /**
     * Constructor.
     */
    public function construct()
    {
        $this->logger = $this->get_logger('partners');
        $this->load_cidr_list('dartybox', $this->dartybox_cidr_list);
        $this->load_cidr_list('wibox', $this->wibox_cidr_list);
        $this->load_cidr_list('playmedia', $this->playmedia_cidr_list);
    }

    /**
     * Load a cidr list into ip address ranges list.
     *
     * @param string $id        The cidr list identifier
     * @param array  $cidr_list The cidr list
     *
     * @return bool TRUE on success, otherwise FALSE
     */
    private function load_cidr_list($id, $cidr_list)
    {
        if (mb_strlen($id) === 0) {
            $this->logger->error('cidr list identifier is invalid');

            return false;
        }
        if (!is_array($cidr_list)) {
            return $this->logger->error('cidr list is invalid');

            return false;
        }
        if (isset($this->ip_ranges[$id])) {
            $this->logger->warning("overloading '{$id}' cidr list");
        }
        foreach ($cidr_list as $cidr_notation) {
            // Read cidr notation
            $cidr = explode('/', trim($cidr_notation));
            switch (count($cidr)) {
                case 1 :
                    // If no prefix found, default to /32
                    $from = $cidr[0];
                    $prefix = 32;
                    break;

                case 2 :
                    // Cidr notation must contains 2 elements (IP address & routing prefix)
                    $from = $cidr[0];
                    $prefix = (is_numeric($cidr[1])) ? (int) $cidr[1] : false;
                    if ($prefix === false) {
                        $this->logger->error("invalid prefix in cidr notation : {$cidr_notation}");
                        continue;
                    }
                    break;

                default :
                    // Should *never* happen
                    $this->logger->error("invalid cidr notation : {$cidr_notation}");
                    continue;
            }

            // Checks if ipv4 address
            $from = filter_var($from, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
            if ($from === false) {
                $this->logger->error("invalid ipv4 address in cidr notation : {$cidr_notation}");
                continue;
            }

            // Calculate ip address range & store it
            $from = ip2long($from);
            $to = $from + pow(2, (32 - $prefix)) - 1;
            $this->ip_ranges[$id][] = array($from, $to);
        }

        return true;
    }

    /**
     * Checks if an ipv4 address exists in a range list.
     *
     * @param string $id   The range list identifier
     * @param string $ipv4 The ipv4 address
     *
     * @return bool TRUE if range list contains the ip, otherwise FALSE
     */
    private function ipv4_in_range($id, $ipv4)
    {
        // Checks range identifier
        if (!isset($this->ip_ranges[$id])) {
            $this->logger->warning("ipv4_in_range: range list identifier '{$id}' not found");

            return false;
        }

        // Checks ip address
        $ip = filter_var($ipv4, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        if ($ip === false) {
            $this->logger->warning("ipv4_in_range: invalid ipv4 address : {$ipv4}");

            return false;
        }
        $ip = ip2long($ip);

        // Check if a range contains ip address
        $ranges = &$this->ip_ranges[$id];
        foreach ($ranges as $range) {
            list($from, $to) = $range;
            if (($ip >= $from) && ($ip <= $to)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Checks if an ip address is Dartybox.
     *
     * @param string $ip The ipv4 address (Default is request ip address)
     *
     * @return bool TRUE if Dartybox, otherwise FALSE
     */
    public function is_dartybox($ip = null)
    {
        $ip = ($ip === null) ? $this->request->client_ip : $ip;

        return $this->ipv4_in_range('dartybox', $ip);
    }

    /**
     * Checks if an ip address is Wibox.
     *
     * @param string $ip The ipv4 address (Default is request ip address)
     *
     * @return bool TRUE if Wibox, otherwise FALSE
     */
    public function is_wibox($ip = null)
    {
        $ip = ($ip === null) ? $this->request->client_ip : $ip;

        return $this->ipv4_in_range('wibox', $ip);
    }

    /**
     * Checks if an ip address is Playmedia.
     *
     * @param string $ip The ipv4 address (Default is request ip address)
     *
     * @return bool TRUE if Playmedia, otherwise FALSE
     */
    public function is_playmedia($ip = null)
    {
        $ip = ($ip === null) ? $this->request->client_ip : $ip;

        return $this->ipv4_in_range('playmedia', $ip);
    }
}
