<?php

/* controllers/faq/flash-player.twig */
class __TwigTemplate_5e0d024e929d1006f2bb5ab9c61e9dd334ee8de52f36ec66b9eb945a16632947 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/flash-player.twig", 1);
        $this->blocks = array(
            'faq_content' => array($this, 'block_faq_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/faq/_header.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_faq_content($context, array $blocks = array())
    {
        // line 4
        echo "  <h2 class=\"margin\">1.1. Un message m'indique de télécharger le plugin Adobe Flash Player</h2>
  <p>
    Le logiciel ou plugin <strong>Adobe Flash Player doit être installé sur votre ordinateur</strong> pour regarder la télévision sur notre site web.
  </p>

  <p>
    Vous pouvez le télécharger gratuitement à l'adresse suivante : <a href=\"https://get.adobe.com/flashplayer/?loc=fr\" rel=\"nofollow\" target=\"_blank\"><strong>http://get.adobe.com/fr/flashplayer/</strong></a>
  </p>

  <div class=\"image\">
    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-flash-message.png\" alt=\"Télécharger Adobe Flash Player\" />
  </div>

  <h3>
    <strong>J'ai déjà installé le plugin Adobe Flash Player</strong>
  </h3>

  <p class=\"margin\">
    Si vous avez déjà installé Adobe Flash Player mais que vous rencontrez toujours ce message d'erreur, veuillez vérifier votre numéro de version sur la page suivante : <a href=\"http://www.adobe.com/fr/software/flash/about/\" rel=\"nofollow\" target=\"_blank\"><strong>http://www.adobe.com/fr/software/flash/about/</strong></a>
  </p>

  <p class=\"margin\">
    Si Adobe Flash Player est correctement installé, vous devez voir une animation puis le message &laquo; Successfully installed ».<br>Si non, c'est que vous ne l'avez pas correctement installé. Dans ce cas, veuillez-vous référer aux indications ci-dessus.
  </p>

  <p>
    Sur la même page, vous trouverez une boite grise qui s'intitule \"Version information\" (ex : &laquo; You have version 11,1 installed »).<br><strong>Si votre numéro de version d'Adobe Flash Player est inférieur à 10.1</strong>, vous devez mettre le logiciel à jour ou le ré-installer.
  </p>

  <h3>
    <strong>À propos de Adobe Flash Player</strong>
  </h3>

  <p>
    <em>
      Adobe Flash Player permet de consulter les sites internet dernière génération, intégrant (notamment) de la vidéo. Ce plugin est compatible avec tous les navigateurs web modernes. Flash est un standard incontournable puisqu'il est déjà installé sur 98 % des ordinateurs de bureau. Flash est aussi disponible sur la plateforme Android mais pas sous le système d'exploitation mobile d'Apple, iOS.
    </em>
  </p>

";
    }

    public function getTemplateName()
    {
        return "controllers/faq/flash-player.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 14,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">1.1. Un message m'indique de télécharger le plugin Adobe Flash Player</h2>*/
/*   <p>*/
/*     Le logiciel ou plugin <strong>Adobe Flash Player doit être installé sur votre ordinateur</strong> pour regarder la télévision sur notre site web.*/
/*   </p>*/
/* */
/*   <p>*/
/*     Vous pouvez le télécharger gratuitement à l'adresse suivante : <a href="https://get.adobe.com/flashplayer/?loc=fr" rel="nofollow" target="_blank"><strong>http://get.adobe.com/fr/flashplayer/</strong></a>*/
/*   </p>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-flash-message.png" alt="Télécharger Adobe Flash Player" />*/
/*   </div>*/
/* */
/*   <h3>*/
/*     <strong>J'ai déjà installé le plugin Adobe Flash Player</strong>*/
/*   </h3>*/
/* */
/*   <p class="margin">*/
/*     Si vous avez déjà installé Adobe Flash Player mais que vous rencontrez toujours ce message d'erreur, veuillez vérifier votre numéro de version sur la page suivante : <a href="http://www.adobe.com/fr/software/flash/about/" rel="nofollow" target="_blank"><strong>http://www.adobe.com/fr/software/flash/about/</strong></a>*/
/*   </p>*/
/* */
/*   <p class="margin">*/
/*     Si Adobe Flash Player est correctement installé, vous devez voir une animation puis le message &laquo; Successfully installed ».<br>Si non, c'est que vous ne l'avez pas correctement installé. Dans ce cas, veuillez-vous référer aux indications ci-dessus.*/
/*   </p>*/
/* */
/*   <p>*/
/*     Sur la même page, vous trouverez une boite grise qui s'intitule "Version information" (ex : &laquo; You have version 11,1 installed »).<br><strong>Si votre numéro de version d'Adobe Flash Player est inférieur à 10.1</strong>, vous devez mettre le logiciel à jour ou le ré-installer.*/
/*   </p>*/
/* */
/*   <h3>*/
/*     <strong>À propos de Adobe Flash Player</strong>*/
/*   </h3>*/
/* */
/*   <p>*/
/*     <em>*/
/*       Adobe Flash Player permet de consulter les sites internet dernière génération, intégrant (notamment) de la vidéo. Ce plugin est compatible avec tous les navigateurs web modernes. Flash est un standard incontournable puisqu'il est déjà installé sur 98 % des ordinateurs de bureau. Flash est aussi disponible sur la plateforme Android mais pas sous le système d'exploitation mobile d'Apple, iOS.*/
/*     </em>*/
/*   </p>*/
/* */
/* {% endblock faq_content %}*/
/* */
