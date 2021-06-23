<?php

/* controllers/faq/hors-bouquet.twig */
class __TwigTemplate_d15616d6b83dd2817cbc80e64e7206df1ac582b359e39d83327fc0d6cb3d5879 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/hors-bouquet.twig", 1);
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
        echo "  <h2 class=\"margin\">1.3. Un message indique &laquo; La chaîne X n'est pas disponible en live sur playtv.fr »</h2>

  <p>Au lancement d'une chaîne de télévision, à la place du player vidéo, vous rencontrez un message de ce genre :</p>

  <div class=\"image\">
    <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-hors-bouquet.png\" alt=\"Chaîne hors bouquet\">
  </div>

  <p>Vous rencontrez ce message car vous ne pourrez pas regarder cette chaîne de télévision pour l'une des raisons suivantes :</p>

  <ul>
    <li class=\"margin\">
      <p>
        <strong>Le flux vidéo de cette chaîne de télévision est géo-localisé</strong>, c'est-à-dire qu'il ne peut être visionné que dans certaines zones géographiques (pays, régions etc.) pour des raisons techniques ou de droits, qui sont indépendantes de notre volonté.
      </p>
      <p>
        <em>Ex : France 2 n'est disponible qu'en France métropolitaine, à Monaco et en Suisse.</em>
      </p>
      <p>
        Si vous pensez que ";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " ne vous géo-localise pas correctement, veuillez <a href=\"/aide/support/\">contacter le support.</a>
      </p>
    </li>

    <li>
      <p>
        <strong>Nous n'avons pas (encore) signé d'accord de diffusion avec cette chaîne</strong> de télévision <strong>sur ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo "</strong>. Nous essayons d'ajouter régulièrement de nouvelles chaînes à notre bouquet télé, mais les négociations sont parfois longues. Merci de votre patience.
      </p>
      <p>
        Si vous souhaitez nous suggérer l'ajout d'une chaîne de télé à notre bouquet, <a href=\"/aide/support/\"><strong>contactez le support</strong></a>.
      </p>
    </li>
  </ul>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/hors-bouquet.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 29,  55 => 23,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">1.3. Un message indique &laquo; La chaîne X n'est pas disponible en live sur playtv.fr »</h2>*/
/* */
/*   <p>Au lancement d'une chaîne de télévision, à la place du player vidéo, vous rencontrez un message de ce genre :</p>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-hors-bouquet.png" alt="Chaîne hors bouquet">*/
/*   </div>*/
/* */
/*   <p>Vous rencontrez ce message car vous ne pourrez pas regarder cette chaîne de télévision pour l'une des raisons suivantes :</p>*/
/* */
/*   <ul>*/
/*     <li class="margin">*/
/*       <p>*/
/*         <strong>Le flux vidéo de cette chaîne de télévision est géo-localisé</strong>, c'est-à-dire qu'il ne peut être visionné que dans certaines zones géographiques (pays, régions etc.) pour des raisons techniques ou de droits, qui sont indépendantes de notre volonté.*/
/*       </p>*/
/*       <p>*/
/*         <em>Ex : France 2 n'est disponible qu'en France métropolitaine, à Monaco et en Suisse.</em>*/
/*       </p>*/
/*       <p>*/
/*         Si vous pensez que {{ request.host }} ne vous géo-localise pas correctement, veuillez <a href="/aide/support/">contacter le support.</a>*/
/*       </p>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <p>*/
/*         <strong>Nous n'avons pas (encore) signé d'accord de diffusion avec cette chaîne</strong> de télévision <strong>sur {{ request.host }}</strong>. Nous essayons d'ajouter régulièrement de nouvelles chaînes à notre bouquet télé, mais les négociations sont parfois longues. Merci de votre patience.*/
/*       </p>*/
/*       <p>*/
/*         Si vous souhaitez nous suggérer l'ajout d'une chaîne de télé à notre bouquet, <a href="/aide/support/"><strong>contactez le support</strong></a>.*/
/*       </p>*/
/*     </li>*/
/*   </ul>*/
/* {% endblock faq_content %}*/
/* */
