<?php

namespace PlayTv;

class PHPlay extends \phplay
{
    public function __construct($application_name, $root_dir, $debug = false, $report_level = 0, $cache_type = 'none')
    {
        parent::__construct($application_name, $root_dir, $debug, $report_level, $cache_type);

        $root_dir = $this->environment['root_dir'];

        // Overload paths
        $this->environment['path']['config'] = "{$root_dir}app/config/";
        $this->environment['path']['views'] = "{$root_dir}app/templates/";
    }
}
