<?php

/* controllers/faq/chaine-indisponible.twig */
class __TwigTemplate_d08fc9be1c533eeb56a3316428b3c37b400918a76d678bcb636865b52ea1116f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/chaine-indisponible.twig", 1);
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
        echo "  <h2 class=\"margin\">1.2. Un message indique &laquo; Cette chaîne est indisponible pour le moment »</h2>

  <p>Au lancement d'une chaîne de télévision dans le player vidéo, vous rencontrez le message suivant :</p>

  <div class=\"image\">
    <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-player-indisponible.png\" alt=\"Chaîne indisponible\">
  </div>

  <p>
    Vous rencontrez ce message car <strong>le player vidéo n'arrive pas à se connecter au flux vidéo</strong> de la chaîne de télévision que vous essayez de regarder. Les causes de ce problème peuvent-être multiples :
  </p>

  <ul>
    <li>
      <strong>Vous n'êtes pas/plus connecté(e) à Internet</strong>. Vérifiez l'état de votre connexion (wifi ou filaire) et de votre box Internet. Dès que vous serez à nouveau connecté(e), ré-essayez en cliquant sur le bouton \"play\" du player vidéo ou en rechargeant la page.
    </li>
    <li>
      <strong>Nos serveurs sont peut-être surchargés</strong>. Nous recevons parfois plus de connexions que ce que nos serveurs peuvent supporter. Nous augmentons régulièrement notre capacité de diffusion pour satisfaire tous nos utilisateurs.
    </li>
    <li>
      <strong>Nous rencontrons un problème technique temporaire</strong>. Un ou plusieurs flux vidéo sont inaccessibles pour le moment. Si le problème persiste après plusieurs tentatives espacées, <a href=\"/aide/support/\"><strong>contactez le support</strong></a> ou <a href=\"/faq/rapport-erreur/\">envoyer un rapport d'erreur</a>.
    </li>
  </ul>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/chaine-indisponible.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">1.2. Un message indique &laquo; Cette chaîne est indisponible pour le moment »</h2>*/
/* */
/*   <p>Au lancement d'une chaîne de télévision dans le player vidéo, vous rencontrez le message suivant :</p>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-player-indisponible.png" alt="Chaîne indisponible">*/
/*   </div>*/
/* */
/*   <p>*/
/*     Vous rencontrez ce message car <strong>le player vidéo n'arrive pas à se connecter au flux vidéo</strong> de la chaîne de télévision que vous essayez de regarder. Les causes de ce problème peuvent-être multiples :*/
/*   </p>*/
/* */
/*   <ul>*/
/*     <li>*/
/*       <strong>Vous n'êtes pas/plus connecté(e) à Internet</strong>. Vérifiez l'état de votre connexion (wifi ou filaire) et de votre box Internet. Dès que vous serez à nouveau connecté(e), ré-essayez en cliquant sur le bouton "play" du player vidéo ou en rechargeant la page.*/
/*     </li>*/
/*     <li>*/
/*       <strong>Nos serveurs sont peut-être surchargés</strong>. Nous recevons parfois plus de connexions que ce que nos serveurs peuvent supporter. Nous augmentons régulièrement notre capacité de diffusion pour satisfaire tous nos utilisateurs.*/
/*     </li>*/
/*     <li>*/
/*       <strong>Nous rencontrons un problème technique temporaire</strong>. Un ou plusieurs flux vidéo sont inaccessibles pour le moment. Si le problème persiste après plusieurs tentatives espacées, <a href="/aide/support/"><strong>contactez le support</strong></a> ou <a href="/faq/rapport-erreur/">envoyer un rapport d'erreur</a>.*/
/*     </li>*/
/*   </ul>*/
/* {% endblock faq_content %}*/
/* */
