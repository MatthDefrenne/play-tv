<?php

/* controllers/faq/rapport-erreur.twig */
class __TwigTemplate_301c56de7471c6b525dd8431bc909cefb74811a5c047110fb87e925b10510ed6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/rapport-erreur.twig", 1);
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
        echo "  <h2 class=\"margin\">2.4. Envoyer un rapport d'erreur</h2>

  <p>
    Lorsque vous <a href=\"/aide/support/\"><strong>contactez le support</strong></a> parce que vous rencontrez des problèmes avec la télévision par exemple (qualité, freezes etc.), il n'est pas toujours facile pour les techniciens d'en identifier la source, car nous pouvons manquer d'informations.
  </p>
  <p>Nous avons donc ajouté une fonctionnalité qui vous permet de <strong>joindre un rapport d'erreur</strong> à vos messages au support.</p>
  <p>Ce rapport contiendra un \"journal d'activité\" des actions et événements (play, stop, connexion etc.) qui ont été déclenché pendant que vous regardiez (ou essayiez de regarder) une chaîne de télé.</p>

  <h3>
    <strong>Comment envoyer un rapport d'erreur ?</strong>
  </h3>

  <p>
    <strong>Cliquez avec le bouton droit de la souris</strong> sur le player vidéo puis sélectionnez \"<strong>Signaler un problème de connexion</strong>\".
  </p>

  <div class=\"image no-margin\">
    <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-report.png\" alt=\"Envoyer un rapport\">
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/rapport-erreur.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 21,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">2.4. Envoyer un rapport d'erreur</h2>*/
/* */
/*   <p>*/
/*     Lorsque vous <a href="/aide/support/"><strong>contactez le support</strong></a> parce que vous rencontrez des problèmes avec la télévision par exemple (qualité, freezes etc.), il n'est pas toujours facile pour les techniciens d'en identifier la source, car nous pouvons manquer d'informations.*/
/*   </p>*/
/*   <p>Nous avons donc ajouté une fonctionnalité qui vous permet de <strong>joindre un rapport d'erreur</strong> à vos messages au support.</p>*/
/*   <p>Ce rapport contiendra un "journal d'activité" des actions et événements (play, stop, connexion etc.) qui ont été déclenché pendant que vous regardiez (ou essayiez de regarder) une chaîne de télé.</p>*/
/* */
/*   <h3>*/
/*     <strong>Comment envoyer un rapport d'erreur ?</strong>*/
/*   </h3>*/
/* */
/*   <p>*/
/*     <strong>Cliquez avec le bouton droit de la souris</strong> sur le player vidéo puis sélectionnez "<strong>Signaler un problème de connexion</strong>".*/
/*   </p>*/
/* */
/*   <div class="image no-margin">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-report.png" alt="Envoyer un rapport">*/
/*   </div>*/
/* {% endblock faq_content %}*/
/* */
