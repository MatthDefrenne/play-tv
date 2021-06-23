<?php

/**
 * Controller used to display "static" pages.
 *
 * @author PLAYMEDIA
 */
class pages_controller extends ppl_app_controller
{
    /**
     * Display the "a propos" page.
     */
    public function a_propos_action()
    {
        $this->set_page_title('À propos. Qui sommes-nous ?');

        return $this->render();
    }

    /**
     * Display the "cgu" page.
     */
    public function cgu_action()
    {
        $this->set_page_title("Conditions générales d'utilisation du service Play TV gratuit");

        return $this->render();
    }

    /**
     * Display the "cgv" page.
     */
    public function cgv_action()
    {
        $this->set_page_title("Conditions générales d'utilisation et de vente du service Play TV premium");

        return $this->render();
    }

    /**
     * Display the "données personnelles" page.
     */
    public function donnees_personnelles_action()
    {
        $this->set_page_title('Données personnelles');

        return $this->render();
    }

    /**
     * Display the "jobs" page.
     */
    public function jobs_action()
    {
        $this->set_page_title('Rejoignez l\'équipe du site');

        return $this->render();
    }

    /**
     * Display the "mentions legales" page.
     */
    public function mentions_legales_action()
    {
        $this->set_page_title('Mentions légales du service');

        return $this->render();
    }

    /**
     * Display the "presse" page.
     */
    public function presse_action()
    {
        $this->set_page_title('On parle de nous dans la presse !');

        return $this->render();
    }

    /**
     * Display the "publicite" page.
     */
    public function publicite_action()
    {
        $this->set_page_title('Votre campagne publicitaire sur playtv.fr');

        return $this->render();
    }

    public function csa_inscription_action()
    {
        $this->robots(false);
        $this->set_page_title('CSA inscriptions sur playtv.fr');

        return $this->render();
    }

    /**
     * Display the "questionnaire" page.
     */
    public function questionnaire_action()
    {
        $this->set_page_title('Questionnaire Play TV');

        return $this->render();
    }

    /**
     * Display the "browser choice" page.
     */
    public function browser_choice_action()
    {
        $this->robots(false);
        $this->set_page_title('Il est temps de changer...');

        $browsers = array(
            array(
                'key' => 'chrome',
                'name' => 'Chrome',
                'url' => 'https://www.google.com/chrome?hl=fr',
            ),
            array(
                'key' => 'firefox',
                'name' => 'Firefox',
                'url' => 'http://www.mozilla.org/fr/firefox/fx/',
            ),
            array(
                'key' => 'ie',
                'name' => 'Internet Explorer',
                'url' => 'http://windows.microsoft.com/fr-fr/internet-explorer/download-ie/',
            ),
            array(
                'key' => 'safari',
                'name' => 'Safari',
                'url' => 'http://www.apple.com/fr/safari/',
            ),
            array(
                'key' => 'opera',
                'name' => 'Opera',
                'url' => 'http://www.opera.com/browser/',
            ),
        );

        shuffle($browsers); // To restore original order, just remove this line

        return $this->render(array(
            'browsers' => $browsers,
        ));
    }
}
