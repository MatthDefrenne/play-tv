<?php

/* controllers/faq/revoir-enregistrer.twig */
class __TwigTemplate_b5b99ae0b26c3b0dcf60c09e0ebbcea0e42a8054e13218dedf9baa23bb78d926 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/revoir-enregistrer.twig", 1);
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
        echo "  <h2 class=\"margin\">3.1. Je cherche à revoir ou à enregistrer un programme TV en particulier</h2>
  <p>
    Vous avez manqué un programme qui passait à la télévision ? Vous souhaitez revoir un événement sportif qui a été diffusé en direct ou le dernier journal télévisé ? Vous aimeriez enregistrer un film qui passera prochainement ? Nous répondons à vos questions.
  </p>

  <h3>
    <strong>Comment revoir une émission ou un film diffusé à la télévision ?</strong>
  </h3>

  <p>
    La plupart des chaînes de télévision développent des solutions de \"replay\" ou \"catchup tv\" depuis quelques années. Nous pensons que cette offre n'est pas toujours facile à parcourir ou rechercher, et que l'internaute s'y perd.
  </p>

  <p>
    <strong>C'est pourquoi nous avons décidé</strong> de proposer un répertoire ou annuaire de <strong>l'offre de &laquo; <a href=\"/replay-tv/\">Replay TV</a> » </strong> en France.
  </p>

  <p>Avec ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " vous pouvez :</p>

  <ul>
    <li>Retrouver les <strong>dernières vidéos publiées</strong> par les chaînes, en filtrant les résultats par chaîne ou par date.</li>
    <li>Vous ne cherchez rien de particulier ? Nous vous suggérons des <strong>séries TV</strong>, <strong>films</strong> ou <strong>documentaires</strong> à revoir.</li>
    <li>Un programme spécifique ? Retrouvez la vidéo à partir de son titre dans notre <strong>moteur de recherche</strong>.</li>
  </ul>

  <div class=\"image\">
    <img src=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-replay.png\" alt=\"Replay TV\">
  </div>

  <h3>
    <strong>Comment enregistrer un programme ?</strong>
  </h3>

  <p>
    <strong>Nous n'offrons pas de service d'enregistrement à distance</strong>. Cette fonctionnalité ne fait pas partie de nos priorité à court terme.
  </p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/revoir-enregistrer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 30,  50 => 21,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">3.1. Je cherche à revoir ou à enregistrer un programme TV en particulier</h2>*/
/*   <p>*/
/*     Vous avez manqué un programme qui passait à la télévision ? Vous souhaitez revoir un événement sportif qui a été diffusé en direct ou le dernier journal télévisé ? Vous aimeriez enregistrer un film qui passera prochainement ? Nous répondons à vos questions.*/
/*   </p>*/
/* */
/*   <h3>*/
/*     <strong>Comment revoir une émission ou un film diffusé à la télévision ?</strong>*/
/*   </h3>*/
/* */
/*   <p>*/
/*     La plupart des chaînes de télévision développent des solutions de "replay" ou "catchup tv" depuis quelques années. Nous pensons que cette offre n'est pas toujours facile à parcourir ou rechercher, et que l'internaute s'y perd.*/
/*   </p>*/
/* */
/*   <p>*/
/*     <strong>C'est pourquoi nous avons décidé</strong> de proposer un répertoire ou annuaire de <strong>l'offre de &laquo; <a href="/replay-tv/">Replay TV</a> » </strong> en France.*/
/*   </p>*/
/* */
/*   <p>Avec {{ request.host }} vous pouvez :</p>*/
/* */
/*   <ul>*/
/*     <li>Retrouver les <strong>dernières vidéos publiées</strong> par les chaînes, en filtrant les résultats par chaîne ou par date.</li>*/
/*     <li>Vous ne cherchez rien de particulier ? Nous vous suggérons des <strong>séries TV</strong>, <strong>films</strong> ou <strong>documentaires</strong> à revoir.</li>*/
/*     <li>Un programme spécifique ? Retrouvez la vidéo à partir de son titre dans notre <strong>moteur de recherche</strong>.</li>*/
/*   </ul>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-replay.png" alt="Replay TV">*/
/*   </div>*/
/* */
/*   <h3>*/
/*     <strong>Comment enregistrer un programme ?</strong>*/
/*   </h3>*/
/* */
/*   <p>*/
/*     <strong>Nous n'offrons pas de service d'enregistrement à distance</strong>. Cette fonctionnalité ne fait pas partie de nos priorité à court terme.*/
/*   </p>*/
/* {% endblock faq_content %}*/
/* */
