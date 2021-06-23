<?php

/* controllers/faq/qualite-video.twig */
class __TwigTemplate_a3f82a84436a4f96fffd84e8016367fc75014b68c0c56140d05e2831c0612e16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/qualite-video.twig", 1);
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
        echo "  <h2 class=\"margin\">2.3. L'image vidéo est de basse ou mauvaise qualité</h2>

  <p>Le flux vidéo est de mauvaise qualité (pixels, artefacts, saturation des couleurs, image coupée, aliasing etc.) ?</p>

  <p>Vérifiez tout d'abord que vous n'avez pas sélectionné le flux \"basse définition\", en vous reportant à la section :</p>
  <p>
    <a href=\"/faq/saccades-video/#flux-alternatif\">Flux vidéo alternatif (basse définition)</a>
  </p>

  <p>
    <strong>Sinon, la mauvaise qualité d'un flux vidéo peut avoir plusieurs causes :</strong>
  </p>

  <ul>
    <li>
      Une minorité de chaînes de télévision comme Nasa TV par exemple, ne sont pas diffusées avec notre infrastructure.<br>Nous ne garantissons donc pas le niveau de qualité vidéo de ces quelques chaînes.
    </li>
    <li>
      Nous pouvons parfois rencontrer des problèmes techniques lors de l'encodage et la diffusion des chaînes de télévision.<br>Si le problème de qualité persiste, veuillez <a href=\"/aide/support/\"><strong>contacter le support</strong></a> ou <a href=\"/faq/rapport-erreur/\">envoyer un rapport d'erreur</a>.
    </li>
  </ul>

  <h3>
    <strong>À propos de la qualité vidéo sur Play TV</strong>
  </h3>

  <p>Sachez que notre équipe technique améliore régulièrement la qualité d'encodage et de diffusion des chaînes de télévision sur le site. Mais nous devons tenir compte des configurations matérielles et des vitesses de connexion de tous nos utilisateurs.</p>

  <p>Enfin, il est important de rappeler que ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " est un service gratuit pour nos internautes et que l'augmentation de la qualité vidéo entraîne (aussi) une augmentation importante de nos coûts de diffusion.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/qualite-video.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 32,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">2.3. L'image vidéo est de basse ou mauvaise qualité</h2>*/
/* */
/*   <p>Le flux vidéo est de mauvaise qualité (pixels, artefacts, saturation des couleurs, image coupée, aliasing etc.) ?</p>*/
/* */
/*   <p>Vérifiez tout d'abord que vous n'avez pas sélectionné le flux "basse définition", en vous reportant à la section :</p>*/
/*   <p>*/
/*     <a href="/faq/saccades-video/#flux-alternatif">Flux vidéo alternatif (basse définition)</a>*/
/*   </p>*/
/* */
/*   <p>*/
/*     <strong>Sinon, la mauvaise qualité d'un flux vidéo peut avoir plusieurs causes :</strong>*/
/*   </p>*/
/* */
/*   <ul>*/
/*     <li>*/
/*       Une minorité de chaînes de télévision comme Nasa TV par exemple, ne sont pas diffusées avec notre infrastructure.<br>Nous ne garantissons donc pas le niveau de qualité vidéo de ces quelques chaînes.*/
/*     </li>*/
/*     <li>*/
/*       Nous pouvons parfois rencontrer des problèmes techniques lors de l'encodage et la diffusion des chaînes de télévision.<br>Si le problème de qualité persiste, veuillez <a href="/aide/support/"><strong>contacter le support</strong></a> ou <a href="/faq/rapport-erreur/">envoyer un rapport d'erreur</a>.*/
/*     </li>*/
/*   </ul>*/
/* */
/*   <h3>*/
/*     <strong>À propos de la qualité vidéo sur Play TV</strong>*/
/*   </h3>*/
/* */
/*   <p>Sachez que notre équipe technique améliore régulièrement la qualité d'encodage et de diffusion des chaînes de télévision sur le site. Mais nous devons tenir compte des configurations matérielles et des vitesses de connexion de tous nos utilisateurs.</p>*/
/* */
/*   <p>Enfin, il est important de rappeler que {{ request.host }} est un service gratuit pour nos internautes et que l'augmentation de la qualité vidéo entraîne (aussi) une augmentation importante de nos coûts de diffusion.</p>*/
/* {% endblock faq_content %}*/
/* */
