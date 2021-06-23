<?php

/**
 * Controller used to display Adblock warning page.
 *
 * @author PLAYMEDIA
 */
class adblock_controller extends ppl_app_controller
{
    /**
     * Display Adblock warning page.
     */
    public function index_action()
    {
        $this->robots(false);
        $this->set_page_title($this->trans('adblock_index.title', [], 'seo'));
        $this->set_skin('minimal');

        return $this->render([
            'adb' => $this->adblock(),
        ]);
    }
}
