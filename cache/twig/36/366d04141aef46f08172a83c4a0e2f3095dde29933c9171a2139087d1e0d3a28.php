<?php

/* controllers/programmes-tv/index.twig */
class __TwigTemplate_6d96f7503af3516d3b25bb52c12e8bbf06bb106deb6add0a4a0ce50da3029e15 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/programmes-tv/index.twig", 1);
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
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/programmes-tv/index.twig", 4)->display(array_merge($context, array("subnav_active" => "home")));
        // line 5
        echo "
<div id=\"content\">
  <div class=\"container\">

    <div class=\"row\">

      <div class=\"span-page\">

        <div class=\"section-title margin\">

          <form id=\"programs-date-select\" class=\"right\">
            <select onchange=\"window.location.assign(\$(this).val());return false;\" class=\"pmd-Select\">
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 18
            echo "              ";
            $context["route_params"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? (array("date" => twig_date_format_filter($this->env, $context["date"], "d-m-Y"))) : (array("date" => twig_date_format_filter($this->env, $context["date"], "Y-m-d"))));
            // line 19
            echo "              <option value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("programmes_prime_date", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\"";
            if (((isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")) == $context["date"])) {
                echo " selected=\"selected\"";
            }
            echo ">
                ";
            // line 20
            if (((isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")) == $context["date"])) {
                echo $this->env->getExtension('translator')->getTranslator()->trans("Today", array(), "messages");
            } else {
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $context["date"], "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            }
            // line 21
            echo "              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 23
        echo "            </select>
          </form>

          <h1>
            <a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("programmes");
        echo "\"><strong>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV guide", array(), "messages");
        echo "</strong></a>
          </h1>

        </div>

        <div class=\"xmargin\">
          ";
        // line 33
        echo (isset($context["broadcasts_presets"]) ? $context["broadcasts_presets"] : $this->getContext($context, "broadcasts_presets"));
        echo "
        </div>

        <div class=\"text margin right\">
          <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("programmes_prime_tonight");
        echo "\" class=\"pmd-Button pmd-Button--default pmd-Button--xs\">
            ";
        // line 38
        echo $this->env->getExtension('translator')->getTranslator()->trans("More TV channels »", array(), "messages");
        // line 39
        echo "          </a>
        </div>

        ";
        // line 42
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 43
            echo "        ";
            // line 44
            echo "        ";
            $this->loadTemplate("partials/ads-ga.twig", "controllers/programmes-tv/index.twig", 44)->display($context);
            // line 45
            echo "        <div id=\"taboola-guide-programme\"></div>
        ";
        }
        // line 47
        echo "
        ";
        // line 48
        if ($this->env->getExtension('playtv_feature')->hasFeature("toplive")) {
            // line 49
            echo "
        <div class=\"section-title xmargin\">
          <h2><a href=\"";
            // line 51
            echo $this->env->getExtension('routing')->getPath("toplive_index");
            echo "\"><strong>Audience Top live TV</strong></a></h2>
        </div>

        <div class=\"xmargin\">
          ";
            // line 55
            $this->loadTemplate("controllers/toplive/_toplive.twig", "controllers/programmes-tv/index.twig", 55)->display(array_merge($context, array("toplive" => (isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "by_trend" => false)));
            // line 56
            echo "        </div>

        <div class=\"pmd-Text--right\">
          <a href=\"";
            // line 59
            echo $this->env->getExtension('routing')->getPath("toplive_index");
            echo "\" class=\"pmd-Button pmd-Button--default pmd-Button--xs\">Audience TV complète »</a>
        </div>

        ";
        }
        // line 63
        echo "
      </div>

      <div class=\"span-sidebar\">

        <div class=\"margin\">
          ";
        // line 69
        $this->loadTemplate("partials/ads-banner.twig", "controllers/programmes-tv/index.twig", 69)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 70
        echo "        </div>

        ";
        // line 72
        if ($this->env->getExtension('playtv_feature')->hasFeature("broadcast_highlights")) {
            // line 73
            echo "
        <div class=\"block-title xmargin\">
          <h2><a href=\"";
            // line 75
            echo $this->env->getExtension('routing')->getPath("programmes_prime_a_ne_pas_manquer");
            echo "\"><strong>À ne pas manquer</strong> »</a></h2>
        </div>

        <div class=\"text clear-grey justify margin\">
          <p>Voici notre sélection de <strong>films</strong>, <strong>séries</strong> ou <strong>émissions</strong> qu'il ne faut pas manquer prochainement à la télé ...</p>
        </div>

        <div class=\"featured-programs xmargin\">
          ";
            // line 83
            $this->loadTemplate("controllers/programmes-tv/_featured.twig", "controllers/programmes-tv/index.twig", 83)->display(array_merge($context, array("broadcasts" => (isset($context["featured_broadcasts"]) ? $context["featured_broadcasts"] : $this->getContext($context, "featured_broadcasts")), "has_column" => false)));
            // line 84
            echo "        </div>

        <div class=\"pmd-Text--right\">
          <a href=\"";
            // line 87
            echo $this->env->getExtension('routing')->getPath("programmes_prime_a_ne_pas_manquer");
            echo "\" class=\"pmd-Button pmd-Button--default pmd-Button--xs\">Plus de programmes TV à ne pas manquer »</a>
        </div>
        ";
        }
        // line 90
        echo "
      </div>

    </div>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  196 => 90,  190 => 87,  185 => 84,  183 => 83,  172 => 75,  168 => 73,  166 => 72,  162 => 70,  160 => 69,  152 => 63,  145 => 59,  140 => 56,  138 => 55,  131 => 51,  127 => 49,  125 => 48,  122 => 47,  118 => 45,  115 => 44,  113 => 43,  111 => 42,  106 => 39,  104 => 38,  100 => 37,  93 => 33,  82 => 27,  76 => 23,  69 => 21,  63 => 20,  54 => 19,  51 => 18,  47 => 17,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" with {"subnav_active": "home"} %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row">*/
/* */
/*       <div class="span-page">*/
/* */
/*         <div class="section-title margin">*/
/* */
/*           <form id="programs-date-select" class="right">*/
/*             <select onchange="window.location.assign($(this).val());return false;" class="pmd-Select">*/
/*             {% for date in dates %}*/
/*               {% set route_params = is_website_fr ? {'date': date|date('d-m-Y')} : {'date': date|date('Y-m-d')} %}*/
/*               <option value="{{ path('programmes_prime_date', route_params) }}"{% if now_date == date %} selected="selected"{% endif%}>*/
/*                 {% if now_date == date %}{% trans %}Today{% endtrans %}{% else %}{{ date|localizeddate('full', 'none', locale)|capitalize }}{% endif %}*/
/*               </option>*/
/*             {% endfor %}*/
/*             </select>*/
/*           </form>*/
/* */
/*           <h1>*/
/*             <a href="{{ path('programmes') }}"><strong>{% trans %}TV guide{% endtrans %}</strong></a>*/
/*           </h1>*/
/* */
/*         </div>*/
/* */
/*         <div class="xmargin">*/
/*           {{ broadcasts_presets|raw }}*/
/*         </div>*/
/* */
/*         <div class="text margin right">*/
/*           <a href="{{ path('programmes_prime_tonight') }}" class="pmd-Button pmd-Button--default pmd-Button--xs">*/
/*             {% trans %}More TV channels »{% endtrans %}*/
/*           </a>*/
/*         </div>*/
/* */
/*         {% if is_website_fr %}*/
/*         {# {% include "partials/ads-beopinion.twig" %} #}*/
/*         {% include "partials/ads-ga.twig" %}*/
/*         <div id="taboola-guide-programme"></div>*/
/*         {% endif %}*/
/* */
/*         {% if has_feature('toplive') %}*/
/* */
/*         <div class="section-title xmargin">*/
/*           <h2><a href="{{ path('toplive_index') }}"><strong>Audience Top live TV</strong></a></h2>*/
/*         </div>*/
/* */
/*         <div class="xmargin">*/
/*           {% include "controllers/toplive/_toplive.twig" with {"toplive": toplive, "by_trend": false} %}*/
/*         </div>*/
/* */
/*         <div class="pmd-Text--right">*/
/*           <a href="{{ path('toplive_index') }}" class="pmd-Button pmd-Button--default pmd-Button--xs">Audience TV complète »</a>*/
/*         </div>*/
/* */
/*         {% endif %}*/
/* */
/*       </div>*/
/* */
/*       <div class="span-sidebar">*/
/* */
/*         <div class="margin">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*         </div>*/
/* */
/*         {% if has_feature('broadcast_highlights') %}*/
/* */
/*         <div class="block-title xmargin">*/
/*           <h2><a href="{{ path('programmes_prime_a_ne_pas_manquer') }}"><strong>À ne pas manquer</strong> »</a></h2>*/
/*         </div>*/
/* */
/*         <div class="text clear-grey justify margin">*/
/*           <p>Voici notre sélection de <strong>films</strong>, <strong>séries</strong> ou <strong>émissions</strong> qu'il ne faut pas manquer prochainement à la télé ...</p>*/
/*         </div>*/
/* */
/*         <div class="featured-programs xmargin">*/
/*           {% include "controllers/programmes-tv/_featured.twig" with {"broadcasts": featured_broadcasts, "has_column": false} %}*/
/*         </div>*/
/* */
/*         <div class="pmd-Text--right">*/
/*           <a href="{{ path('programmes_prime_a_ne_pas_manquer') }}" class="pmd-Button pmd-Button--default pmd-Button--xs">Plus de programmes TV à ne pas manquer »</a>*/
/*         </div>*/
/*         {% endif %}*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
