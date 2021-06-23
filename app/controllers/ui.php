<?php

/**
 * UI kit (for ajax).
 *
 * @author playmedia
 */
class ui_controller extends ppl_app_controller
{
    public function block_account_header_action()
    {
        $this->robots(false);

        return $this->render();
    }

    public function block_account_facebook_connect_action()
    {
        $this->robots(false);

        return $this->render();
    }
}
