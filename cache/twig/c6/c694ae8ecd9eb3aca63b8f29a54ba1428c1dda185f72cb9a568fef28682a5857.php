<?php

/* controllers/faq/probleme-son.twig */
class __TwigTemplate_64cea90c5c3eda7ef0e89ee7dbd436c38386fe9c6ebd0ac534f9033c1d3d0517 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/probleme-son.twig", 1);
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
        echo "  <h2 class=\"margin\">2.2. Le son est de mauvaise qualité (ex: grésillements, volume faible etc.)</h2>
  <h3>
    <strong>Le son est de mauvaise qualité</strong>
  </h3>
  <p>Sur une ou plusieurs chaînes de télévision, le son (flux audio) grésille, est étouffé, est de mauvaise qualité etc.</p>
  <ul>
    <li>
      Vérifiez tout d'abord que le problème ne provient pas de votre ordinateur.<br><em>Ex : essayez de regarder une vidéo sur un autre site Internet, lancez un fichier audio sur votre ordinateur etc.</em>
    </li>
    <li>
      Si vous ne rencontrez ce problème que sur une seule chaîne, il s'agit peut-être d'un problème isolé et passager.
      </li>
  </ul>
  <p>
    Si le problème persiste ou qu'il concerne plusieurs chaînes de télévision, veuillez <a href=\"/aide/support/\"><strong>contacter le support</strong></a> ou <a href=\"/faq/rapport-erreur/\">envoyer un rapport d'erreur</a>.
  </p>

  <h3>
    <strong>Le volume sonore est faible</strong>
  </h3>

  <div class=\"clearfix\">
    <div class=\"image xmargin\" style=\"margin-top:5px;float:left;margin-right:20px;\">
      <img src=\"";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-volume.png\" alt=\"Volume sonore\">
    </div>
    <p>Pour augmenter le volume sonore, utilisez le \"slider\" de volume du player vidéo.</p>
    <p>Si le volume est toujours faible, vérifiez que le volume de votre ordinateur (ou de votre casque, enceintes etc.) est correctement réglé.</p>
  </div>

  <p>
    Si le volume sonore reste trop faible malgré ces manipulations, veuillez <a href=\"/aide/support/\"><strong>contacter le support</strong></a> ou <a href=\"/faq/rapport-erreur/\">envoyer un rapport d'erreur</a>.
  </p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/probleme-son.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 27,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">2.2. Le son est de mauvaise qualité (ex: grésillements, volume faible etc.)</h2>*/
/*   <h3>*/
/*     <strong>Le son est de mauvaise qualité</strong>*/
/*   </h3>*/
/*   <p>Sur une ou plusieurs chaînes de télévision, le son (flux audio) grésille, est étouffé, est de mauvaise qualité etc.</p>*/
/*   <ul>*/
/*     <li>*/
/*       Vérifiez tout d'abord que le problème ne provient pas de votre ordinateur.<br><em>Ex : essayez de regarder une vidéo sur un autre site Internet, lancez un fichier audio sur votre ordinateur etc.</em>*/
/*     </li>*/
/*     <li>*/
/*       Si vous ne rencontrez ce problème que sur une seule chaîne, il s'agit peut-être d'un problème isolé et passager.*/
/*       </li>*/
/*   </ul>*/
/*   <p>*/
/*     Si le problème persiste ou qu'il concerne plusieurs chaînes de télévision, veuillez <a href="/aide/support/"><strong>contacter le support</strong></a> ou <a href="/faq/rapport-erreur/">envoyer un rapport d'erreur</a>.*/
/*   </p>*/
/* */
/*   <h3>*/
/*     <strong>Le volume sonore est faible</strong>*/
/*   </h3>*/
/* */
/*   <div class="clearfix">*/
/*     <div class="image xmargin" style="margin-top:5px;float:left;margin-right:20px;">*/
/*       <img src="{{ apps_base_url }}/images/faq/faq-volume.png" alt="Volume sonore">*/
/*     </div>*/
/*     <p>Pour augmenter le volume sonore, utilisez le "slider" de volume du player vidéo.</p>*/
/*     <p>Si le volume est toujours faible, vérifiez que le volume de votre ordinateur (ou de votre casque, enceintes etc.) est correctement réglé.</p>*/
/*   </div>*/
/* */
/*   <p>*/
/*     Si le volume sonore reste trop faible malgré ces manipulations, veuillez <a href="/aide/support/"><strong>contacter le support</strong></a> ou <a href="/faq/rapport-erreur/">envoyer un rapport d'erreur</a>.*/
/*   </p>*/
/* {% endblock faq_content %}*/
/* */
