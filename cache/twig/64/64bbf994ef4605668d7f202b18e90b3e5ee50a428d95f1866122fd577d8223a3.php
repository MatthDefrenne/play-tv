<?php

/* controllers/toplive/index.twig */
class __TwigTemplate_c61cb1aca36cf9c15803381cf986bfb7a813bc7c654556bcb8db32a7db14da82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/toplive/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/toplive/index.twig", 4)->display(array_merge($context, array("subnav_active" => "toplive")));
        // line 5
        echo "
<div id=\"content\">
  <div class=\"container\">

    <div class=\"row\">

      <div class=\"span-page\">

        <div class=\"section-title\">
          <p class=\"right clear-grey\">Les audiences TV en direct</p>
          <h1><a href=\"/toplive/\"><strong>Top Live!</strong> »</a></h1>
        </div>

        <div class=\"text margin xbigger\">
          <p>Vous ne savez pas quoi <strong>regarder à la télévision</strong> ? Découvrez <strong>Top Live!</strong> notre mesure d'audience TV en quasi temps-réel. Les données sont certifiées par l'organisme Médiamétrie. Suivez la tendance!</p>
        </div>

        <ul id=\"tabs\" class=\"tabs\">
          <li class=\"tab-selected\" title=\"";
        // line 23
        if (( !(null === (isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive"))) && $this->getAttribute($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), 0, array()), "last_update", array()))) {
            echo "Mise à jour : ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), 0, array()), "last_update", array()), "d/m/y à H:i"), "html", null, true);
        }
        echo "\">
            <a href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()), "html", null, true);
        echo "\" title=\"\">Dernière heure</a>
          </li>
          <li>
            <a href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()), "html", null, true);
        echo "\" title=\"\">Audience cumulée</a>
          </li>
        </ul>
        <div id=\"tab1\">
          ";
        // line 31
        $this->loadTemplate("controllers/toplive/_toplive.twig", "controllers/toplive/index.twig", 31)->display(array_merge($context, array("toplive" => (isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "by_trend" => false)));
        // line 32
        echo "        </div>
        <div id=\"tab2\">
          ";
        // line 34
        $this->loadTemplate("controllers/toplive/_toplive.twig", "controllers/toplive/index.twig", 34)->display(array_merge($context, array("toplive" => (isset($context["toplive_fullday"]) ? $context["toplive_fullday"] : $this->getContext($context, "toplive_fullday")), "by_trend" => false)));
        // line 35
        echo "        </div>

      </div>

      <div class=\"span-sidebar\">

        <div class=\"margin\">
          ";
        // line 42
        $this->loadTemplate("partials/ads-banner.twig", "controllers/toplive/index.twig", 42)->display(array_merge($context, array("unique" => "af2eb201", "zone_id" => 9)));
        // line 43
        echo "        </div>

        <div class=\"grey-box margin\">
          <div class=\"text center\">
            <p class=\"clear-grey\">Données certifiées par Médiamétrie eStat</p>
            <img src=\"";
        // line 48
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/icons/logo-estat.png\" alt=\"Médiamétrie eStat\" width=\"119\" height=\"60\">
          </div>
        </div>

        <div class=\"grey-box margin\">
          <div class=\"block-title\">
            <p class=\"right clear-grey\">Dernière heure</p>
            <h2><strong>Meilleures progressions</strong></h2>
          </div>
          ";
        // line 57
        $this->loadTemplate("controllers/toplive/_toplive.twig", "controllers/toplive/index.twig", 57)->display(array_merge($context, array("toplive" => (isset($context["trends_up"]) ? $context["trends_up"] : $this->getContext($context, "trends_up")), "by_trend" => true)));
        // line 58
        echo "        </div>

        <div class=\"grey-box\">
          <div class=\"block-title\">
            <p class=\"right clear-grey\">Dernière heure</p>
            <h2><strong class=\"red\">Audiences en baisse !</strong></h2>
          </div>
          ";
        // line 65
        $this->loadTemplate("controllers/toplive/_toplive.twig", "controllers/toplive/index.twig", 65)->display(array_merge($context, array("toplive" => (isset($context["trends_down"]) ? $context["trends_down"] : $this->getContext($context, "trends_down")), "by_trend" => true)));
        // line 66
        echo "        </div>

      </div>

    </div>

  </div>
</div> <!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/toplive/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 66,  122 => 65,  113 => 58,  111 => 57,  99 => 48,  92 => 43,  90 => 42,  81 => 35,  79 => 34,  75 => 32,  73 => 31,  66 => 27,  60 => 24,  53 => 23,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" with {"subnav_active": "toplive"} %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row">*/
/* */
/*       <div class="span-page">*/
/* */
/*         <div class="section-title">*/
/*           <p class="right clear-grey">Les audiences TV en direct</p>*/
/*           <h1><a href="/toplive/"><strong>Top Live!</strong> »</a></h1>*/
/*         </div>*/
/* */
/*         <div class="text margin xbigger">*/
/*           <p>Vous ne savez pas quoi <strong>regarder à la télévision</strong> ? Découvrez <strong>Top Live!</strong> notre mesure d'audience TV en quasi temps-réel. Les données sont certifiées par l'organisme Médiamétrie. Suivez la tendance!</p>*/
/*         </div>*/
/* */
/*         <ul id="tabs" class="tabs">*/
/*           <li class="tab-selected" title="{% if toplive is not null and toplive.0.last_update %}Mise à jour : {{ toplive.0.last_update|date("d/m/y à H:i") }}{% endif %}">*/
/*             <a href="{{ request.uri }}" title="">Dernière heure</a>*/
/*           </li>*/
/*           <li>*/
/*             <a href="{{ request.uri }}" title="">Audience cumulée</a>*/
/*           </li>*/
/*         </ul>*/
/*         <div id="tab1">*/
/*           {% include "controllers/toplive/_toplive.twig" with {"toplive": toplive, "by_trend": false} %}*/
/*         </div>*/
/*         <div id="tab2">*/
/*           {% include "controllers/toplive/_toplive.twig" with {"toplive": toplive_fullday, "by_trend": false} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*       <div class="span-sidebar">*/
/* */
/*         <div class="margin">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "af2eb201", "zone_id": 9} %}*/
/*         </div>*/
/* */
/*         <div class="grey-box margin">*/
/*           <div class="text center">*/
/*             <p class="clear-grey">Données certifiées par Médiamétrie eStat</p>*/
/*             <img src="{{ apps_base_url }}/images/icons/logo-estat.png" alt="Médiamétrie eStat" width="119" height="60">*/
/*           </div>*/
/*         </div>*/
/* */
/*         <div class="grey-box margin">*/
/*           <div class="block-title">*/
/*             <p class="right clear-grey">Dernière heure</p>*/
/*             <h2><strong>Meilleures progressions</strong></h2>*/
/*           </div>*/
/*           {% include "controllers/toplive/_toplive.twig" with {"toplive": trends_up, "by_trend": true} %}*/
/*         </div>*/
/* */
/*         <div class="grey-box">*/
/*           <div class="block-title">*/
/*             <p class="right clear-grey">Dernière heure</p>*/
/*             <h2><strong class="red">Audiences en baisse !</strong></h2>*/
/*           </div>*/
/*           {% include "controllers/toplive/_toplive.twig" with {"toplive": trends_down, "by_trend": true} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* </div> <!-- /#content -->*/
/* {% endblock %}*/
/* */
