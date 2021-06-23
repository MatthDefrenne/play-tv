<?php

/**
 * This controller is used only for debug purposes.
 * Only Playmedia office ip address is allowed to access this controller.
 *
 * @author PLAYMEDIA
 */
class debug_controller extends ppl_app_controller
{
    /**
     * Main action.
     */
    public function index_action()
    {
        if (false === is_playmedia()) {
            return $this->createNotFoundResponse();
        }

        $content = '';

        // Display request informations
        $client = $this->request->get_client();
        $is_mobile = ($client->is_mobile()) ? 'true' : 'false';
        $is_tablet = ($client->is_tablet()) ? 'true' : 'false';
        $is_fhttps = ($this->request->is_forwarded_https) ? 'true' : 'false';
        $do_not_track = ($this->request->do_not_track) ? 'true' : 'false';

        $content .= "<b>client ip :</b> {$this->request->client_ip} <br />";
        $content .= "<b>is forwarded https :</b> {$is_fhttps} <br />";
        $content .= "<b>scheme :</b> {$this->request->scheme} <br />";
        $content .= "<b>protocol :</b> {$this->request->protocol} <br />";
        $content .= "<b>is mobile :</b> {$is_mobile} <br />";
        $content .= "<b>is tablet :</b> {$is_tablet} <br />";
        $content .= "<b>do no track :</b> {$do_not_track} <br />";

        // Display $_COOKIE
        $content .= "<br /><b>\$_COOKIE content :</b><pre>\n";
        $content .= var_export($_COOKIE, true);
        $content .= "</pre>\n";

        // Display $_SESSION
        $session = isset($_SESSION) ? $_SESSION : [];
        $content .= "<br /><b>\$_SESSION content :</b><pre>\n";
        $content .= var_export($session, true);
        $content .= "</pre>\n";

        // Display $_SERVER
        $content .= "<br /><b>\$_SERVER content :</b><pre>\n";
        $content .= var_export($_SERVER, true);
        $content .= "</pre>\n";

        // Uncomment to debug Uniroll "check" api
        // $uid = $this->convertZoneUid('desktop.preroll');
        // $config = $this->checkUnirollAdCampaign($uid);
        // $content .= "<br /><b>Uniroll check :</b><pre>\n";
        // $content .= var_export($config, true);
        // $content .= "</pre>\n";

        $this->response->setContent($content);
    }

    public function exception_action()
    {
        if (false === is_playmedia()) {
            return $this->createNotFoundResponse();
        }

        throw new Exception('Error Processing Request');
    }

    public function logic_exception_action()
    {
        if (false === is_playmedia()) {
            return $this->createNotFoundResponse();
        }

        throw new LogicException("There's some noob logic here");
    }

    public function trigger_error_action()
    {
        if (false === is_playmedia()) {
            return $this->createNotFoundResponse();
        }

        trigger_error('Division by zero impossible', E_USER_ERROR);
    }

    public function phpinfo_action()
    {
        if (false === is_playmedia()) {
            return $this->createNotFoundResponse();
        }

        phpinfo();
    }
}
