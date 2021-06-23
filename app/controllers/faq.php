<?php

/**
 * Controller used to display FAQ pages.
 *
 * @author PLAYMEDIA
 */
class faq_controller extends ppl_app_controller
{
    /**
     * Set the page title.
     *
     * @see ppl_app_controller::set_page_title()
     */
    public function set_page_title($title, $add_suffix = true)
    {
        parent::set_page_title(($this->action !== 'index' ? 'FAQ. ' : '')."{$title}", $add_suffix);
    }

    /**
     * Display FAQ main page.
     */
    public function index_action()
    {
        $this->set_page_title('Questions fréquentes');

        return $this->render();
    }

    /**
     * Display FAQ flash player page.
     */
    public function flash_player_action()
    {
        $this->set_page_title('Adobe Flash Player');

        return $this->render();
    }

    /**
     * Display FAQ "chaîne indisponible" page.
     */
    public function chaine_indisponible_action()
    {
        $this->set_page_title('Chaîne indisponible');

        return $this->render();
    }

    /**
     * Display FAQ "hors bouquet" page.
     */
    public function hors_bouquet_action()
    {
        $this->set_page_title('Chaîne de télé hors bouquet');

        return $this->render();
    }

    /**
     * Display FAQ "adblock" page.
     */
    public function adblock_action()
    {
        $this->set_page_title('Adblock Plus');

        return $this->render();
    }

    /**
     * Display FAQ "saccades video" page.
     */
    public function saccades_video_action()
    {
        $this->set_page_title('Saccades vidéo');

        return $this->render();
    }

    /**
     * Display FAQ "problèmes de son" page.
     */
    public function probleme_son_action()
    {
        $this->set_page_title('Problème de son');

        return $this->render();
    }

    /**
     * Display FAQ "qualité vidéo" page.
     */
    public function qualite_video_action()
    {
        $this->set_page_title('Qualité vidéo');

        return $this->render();
    }

    /**
     * Display FAQ "rapport erreur" page.
     */
    public function rapport_erreur_action()
    {
        $this->set_page_title('Envoyer un rapport d\'erreur');

        return $this->render();
    }

    /**
     * Display FAQ "revoir enregistrer" page.
     */
    public function revoir_enregistrer_action()
    {
        $this->set_page_title('Revoir ou enregistrer');

        return $this->render();
    }

    /**
     * Display FAQ "smartphones" page.
     */
    public function smartphones_action()
    {
        $this->set_page_title('Application smartphones');

        return $this->render();
    }

    /**
     * Display FAQ "tablettes" page.
     */
    public function tablettes_action()
    {
        $this->set_page_title('Application tablettes');

        return $this->render();
    }

    /**
     * Display FAQ "vo sous titres" page.
     */
    public function vo_sous_titres_action()
    {
        $this->set_page_title('VO et sous-titres');

        return $this->render();
    }

    /**
     * Display FAQ "france 3 region" page.
     */
    public function france_3_region_action()
    {
        $this->set_page_title('France 3 région');

        return $this->render();
    }

    /**
     * Display FAQ "erreur programme" page.
     */
    public function erreur_programme_action()
    {
        $this->set_page_title('Erreur sur une fiche programme');

        return $this->render();
    }

    /**
     * Display FAQ "remarques programmation" page.
     */
    public function remarques_programmation_action()
    {
        $this->set_page_title('Remarques sur la programmation');

        return $this->render();
    }

    /**
     * Display FAQ "compte" page.
     */
    public function compte_utilisateur_action()
    {
        $this->set_page_title('Remarques sur les comptes utilisateurs');

        return $this->render();
    }

    /**
     * Display FAQ "supprimer compte utilisateur" page.
     */
    public function supprimer_compte_utilisateur_action()
    {
        $this->set_page_title('Supprimer un compte utilisateur');

        return $this->render();
    }

    /**
     * Display FAQ "supprimer compte utilisateur" page.
     */
    public function resilier_abonnement_action()
    {
        $this->set_page_title('Résilier un abonnement en cours');

        return $this->render();
    }
}
