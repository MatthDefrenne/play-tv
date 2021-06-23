<?php

/**
 * Legacy controller for partners related endpoints
 * Redirect to dedicated subdomains.
 */
class partners_controller extends ppl_app_controller
{
    protected $logger;
    protected $hosts;

    public function before_action()
    {
        $this->logger = $this->get_logger('partners');
        $this->hosts = $this->app()->get_hosts();
    }

    public function redirect_adsltv_action($action = '')
    {
        $qs = substr($_SERVER['REQUEST_URI'], (strrpos($_SERVER['REQUEST_URI'], '/') + 1));
        if (false == $qs) {
            $qs = '';
        }

        if (!empty($action)) {
            $action .= '/';
        }

        $url = sprintf('http:%s/adsltv/%s%s',
            $this->hosts['partners'],
            $action,
            $qs
        );
        $this->logger->notice(sprintf('URI %s is ADSTLV : redirect URL is %s',
            $_SERVER['REQUEST_URI'],
            $url
        ));

        return $this->response->redirect($url);
    }

    public function redirect_cotep_action()
    {
        $url = sprintf('http:%s/cotep/', $this->hosts['partners']);
        $this->logger->notice(sprintf('URI %s is Cotep : redirect URL is %s',
            $_SERVER['REQUEST_URI'],
            $url
        ));

        return $this->response->redirect($url);
    }

    public function redirect_novancia_action()
    {
        $url = sprintf('http:%s/novancia/', $this->hosts['partners']);
        $this->logger->notice(sprintf('URI %s is Novancia : redirect URL is %s',
            $_SERVER['REQUEST_URI'],
            $url
        ));

        return $this->response->redirect($url);
    }
}
