<?php

/**
 * Controller used to display top live page.
 *
 * @author PLAYMEDIA
 */
class toplive_controller extends ppl_app_controller
{
    /**
     * Display the top live page.
     *
     * @TODOS HTTP CACHE 5 MINS
     */
    public function index_action()
    {
        $this->set_page_title("Top Live! L'audience en temps-réel");

        $country_code = $this->container['sdk_country_code'];

        return $this->render(array(
            'toplive' => $this->getSdk()['services.audience']->shareByHour($country_code),
            'toplive_fullday' => $this->getSdk()['services.audience']->shareByDay($country_code),
            'trends_up' => $this->getSdk()['services.audience']->trendUp($country_code),
            'trends_down' => $this->getSdk()['services.audience']->trendDown($country_code),
        ));
    }
}
