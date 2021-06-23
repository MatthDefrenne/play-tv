<?php

/* partials/header.twig */
class __TwigTemplate_d32201a74dbf545b006a3b7fda600167ede1ed3ea9800f6ab20aec8fa66c46c7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<header class=\"pmd-Header\">
    ";
        // line 3
        if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "index")) {
            // line 4
            echo "    <h1 class=\"pmd-Header-logo\">
    ";
        } else {
            // line 6
            echo "    <p class=\"pmd-Header-logo\">
    ";
        }
        // line 8
        echo "      <a href=\"/\">
        <img src=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/icons/logo-play-tv.png\" alt=\"Play TV\" title=\"Play TV\" width=\"219\" height=\"60\">
        <span>Play TV</span>
      </a>
    ";
        // line 12
        if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "index")) {
            // line 13
            echo "    </h1>
    ";
        } else {
            // line 15
            echo "    </p>
    ";
        }
        // line 17
        echo "
    ";
        // line 18
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light")) {
            // line 19
            echo "    <nav class=\"pmd-HeaderMenu\">

      <ul class=\"pmd-HeaderMenu-list\">

        <li class=\"pmd-HeaderMenu-listItem\">
          <a href=\"";
            // line 24
            echo $this->env->getExtension('routing')->getPath("television_index");
            echo "\" class=\"pmd-HeaderMenu-link";
            if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "television", 1 => "chaine_tv", 2 => "player"))) {
                echo " pmd-HeaderMenu-link--active";
            }
            echo "\">

            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--tv pmd-HeaderMenu-icon\">
              <use xlink:href=\"#pmd-Svg--tv\"></use>
            </svg>
            <span>";
            // line 29
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live TV", array(), "messages");
            echo "</span>

          </a>
        </li>

        <li class=\"pmd-HeaderMenu-listItem\">
          <a href=\"";
            // line 35
            if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                echo $this->env->getExtension('routing')->getPath("programmes");
            } else {
                echo $this->env->getExtension('routing')->getPath("programmes_en_direct");
            }
            echo "\" class=\"pmd-HeaderMenu-link";
            if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "programmes_tv", 1 => "programme_tv", 2 => "people", 3 => "toplive"))) {
                echo " pmd-HeaderMenu-link--active";
            }
            echo "\">

            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--guide pmd-HeaderMenu-icon\">
              <use xlink:href=\"#pmd-Svg--guide\"></use>
            </svg>
            <span>";
            // line 40
            echo $this->env->getExtension('translator')->getTranslator()->trans("TV Guide", array(), "messages");
            echo "</span>

          </a>
        </li>

        ";
            // line 45
            if ($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv")) {
                // line 46
                echo "        <li class=\"pmd-HeaderMenu-listItem\">
          <a href=\"";
                // line 47
                echo $this->env->getExtension('routing')->getPath("replay_tv_index");
                echo "\" class=\"pmd-HeaderMenu-link";
                if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "replay_tv", 1 => "video"))) {
                    echo " pmd-HeaderMenu-link--active";
                }
                echo "\">

            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--replay pmd-HeaderMenu-icon\">
              <use xlink:href=\"#pmd-Svg--replay\"></use>
            </svg>
            <span>";
                // line 52
                echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up TV", array(), "messages");
                echo "</span>

          </a>
        </li>
        ";
            }
            // line 57
            echo "
      </ul>

    </nav>
    ";
        }
        // line 62
        echo "

    <div class=\"pmd-HeaderSide\">

      ";
        // line 74
        echo "
      ";
        // line 75
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light")) {
            // line 76
            echo "      <div class=\"pmd-HeaderSearch pmd-js-HeaderSearch\">
        <form action=\"";
            // line 77
            echo $this->env->getExtension('routing')->getPath("recherche");
            echo "\" class=\"pmd-js-HeaderSearch-form\">
          <button type=\"submit\" class=\"pmd-js-HeaderSearch-button pmd-Button pmd-Button--reset pmd-HeaderSearch-button\" title=\"";
            // line 78
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search", array(), "messages");
            echo "\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--search pmd-HeaderSearch-buttonIcon\">
              <use xlink:href=\"#pmd-Svg--search\"></use>
            </svg>
          </button>
           <input type=\"text\" placeholder=\"";
            // line 83
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search on Play TV...", array(), "messages");
            echo "\" name=\"q\" class=\"pmd-js-HeaderSearch-input pmd-HeaderSearch-input pmd-Input\" value=\"";
            if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "q", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, _twig_default_filter(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array()), "q", array())), ""), "html", null, true);
            }
            echo "\">
        </form>
      </div>
      ";
        }
        // line 87
        echo "
      ";
        // line 88
        if (($this->env->getExtension('playtv_feature')->hasFeature("account") && ((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light"))) {
            // line 89
            echo "      <div class=\"pmd-HeaderSide-split\"></div>

      ";
            // line 96
            echo "
      <div class=\"pmd-js-HeaderAccount pmd-HeaderAccount\">
        ";
            // line 98
            $this->loadTemplate("controllers/ui/block-account-header.twig", "partials/header.twig", 98)->display($context);
            // line 99
            echo "      </div>
      ";
        }
        // line 101
        echo "
      ";
        // line 102
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light")) {
            // line 103
            echo "        ";
            $this->loadTemplate("partials/header-country.twig", "partials/header.twig", 103)->display($context);
            // line 104
            echo "      ";
        }
        // line 105
        echo "
      ";
        // line 106
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) == "light")) {
            // line 107
            echo "      <a href=\"/\" class=\"pmd-js-HeaderReturn pmd-HeaderReturn\">< Retour</a>
      ";
        }
        // line 109
        echo "
    </div>

</header>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  218 => 109,  214 => 107,  212 => 106,  209 => 105,  206 => 104,  203 => 103,  201 => 102,  198 => 101,  194 => 99,  192 => 98,  188 => 96,  184 => 89,  182 => 88,  179 => 87,  168 => 83,  160 => 78,  156 => 77,  153 => 76,  151 => 75,  148 => 74,  142 => 62,  135 => 57,  127 => 52,  115 => 47,  112 => 46,  110 => 45,  102 => 40,  86 => 35,  77 => 29,  65 => 24,  58 => 19,  56 => 18,  53 => 17,  49 => 15,  45 => 13,  43 => 12,  37 => 9,  34 => 8,  30 => 6,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <header class="pmd-Header">*/
/*     {% if controller_name == 'index' %}*/
/*     <h1 class="pmd-Header-logo">*/
/*     {% else %}*/
/*     <p class="pmd-Header-logo">*/
/*     {% endif %}*/
/*       <a href="/">*/
/*         <img src="{{ apps_base_url }}/images/icons/logo-play-tv.png" alt="Play TV" title="Play TV" width="219" height="60">*/
/*         <span>Play TV</span>*/
/*       </a>*/
/*     {% if controller_name == 'index' %}*/
/*     </h1>*/
/*     {% else %}*/
/*     </p>*/
/*     {% endif %}*/
/* */
/*     {% if skin != 'light' %}*/
/*     <nav class="pmd-HeaderMenu">*/
/* */
/*       <ul class="pmd-HeaderMenu-list">*/
/* */
/*         <li class="pmd-HeaderMenu-listItem">*/
/*           <a href="{{ path('television_index') }}" class="pmd-HeaderMenu-link{% if controller_name in ['television', 'chaine_tv', 'player'] %} pmd-HeaderMenu-link--active{% endif %}">*/
/* */
/*             <svg role="img" class="pmd-Svg pmd-Svg--tv pmd-HeaderMenu-icon">*/
/*               <use xlink:href="#pmd-Svg--tv"></use>*/
/*             </svg>*/
/*             <span>{% trans %}Live TV{% endtrans %}</span>*/
/* */
/*           </a>*/
/*         </li>*/
/* */
/*         <li class="pmd-HeaderMenu-listItem">*/
/*           <a href="{% if is_website_fr %}{{ path('programmes') }}{% else %}{{ path('programmes_en_direct') }}{% endif %}" class="pmd-HeaderMenu-link{% if controller_name in ['programmes_tv', 'programme_tv', 'people', 'toplive'] %} pmd-HeaderMenu-link--active{% endif %}">*/
/* */
/*             <svg role="img" class="pmd-Svg pmd-Svg--guide pmd-HeaderMenu-icon">*/
/*               <use xlink:href="#pmd-Svg--guide"></use>*/
/*             </svg>*/
/*             <span>{% trans %}TV Guide{% endtrans %}</span>*/
/* */
/*           </a>*/
/*         </li>*/
/* */
/*         {% if has_feature('catchup_tv') %}*/
/*         <li class="pmd-HeaderMenu-listItem">*/
/*           <a href="{{ path('replay_tv_index') }}" class="pmd-HeaderMenu-link{% if controller_name in ['replay_tv', 'video'] %} pmd-HeaderMenu-link--active{% endif %}">*/
/* */
/*             <svg role="img" class="pmd-Svg pmd-Svg--replay pmd-HeaderMenu-icon">*/
/*               <use xlink:href="#pmd-Svg--replay"></use>*/
/*             </svg>*/
/*             <span>{% trans %}Catch Up TV{% endtrans %}</span>*/
/* */
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/* */
/*       </ul>*/
/* */
/*     </nav>*/
/*     {% endif %}*/
/* */
/* */
/*     <div class="pmd-HeaderSide">*/
/* */
/*       {#*/
/*       {% if skin != 'light'}*/
/*       <button class="pmd-HeaderSide-icon pmd-HeaderSide-facebook pmd-Icon pmd-Icon--facebook pmd-Button pmd-Button--reset"></button>*/
/*       <button class="pmd-HeaderSide-icon pmd-HeaderSide-twitter pmd-Icon pmd-Icon--twitter pmd-Button pmd-Button--reset"></button>*/
/*       <button class="pmd-HeaderSide-icon pmd-HeaderSide-googleplus pmd-Icon pmd-Icon--googleplus pmd-Button pmd-Button--reset"></button>*/
/*       <button class="pmd-HeaderSide-icon pmd-HeaderSide-share pmd-Icon pmd-Icon--share pmd-Button pmd-Button--reset"></button>*/
/*       {% endif %}*/
/*       #}*/
/* */
/*       {% if skin != 'light' %}*/
/*       <div class="pmd-HeaderSearch pmd-js-HeaderSearch">*/
/*         <form action="{{ path('recherche') }}" class="pmd-js-HeaderSearch-form">*/
/*           <button type="submit" class="pmd-js-HeaderSearch-button pmd-Button pmd-Button--reset pmd-HeaderSearch-button" title="{% trans %}Search{% endtrans %}">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--search pmd-HeaderSearch-buttonIcon">*/
/*               <use xlink:href="#pmd-Svg--search"></use>*/
/*             </svg>*/
/*           </button>*/
/*            <input type="text" placeholder="{% trans %}Search on Play TV...{% endtrans %}" name="q" class="pmd-js-HeaderSearch-input pmd-HeaderSearch-input pmd-Input" value="{%if request.get.q is defined %}{{ request.get.q|escape|default('') }}{% endif %}">*/
/*         </form>*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*       {% if has_feature('account') and skin != 'light' %}*/
/*       <div class="pmd-HeaderSide-split"></div>*/
/* */
/*       {#*/
/*       <a href="{{ path('sales_plans') }}" class="pmd-HeaderHighlight">*/
/*         <span class="pmd-HeaderHighlight-button pmd-Button pmd-Button--premium">Premium</Pas>*/
/*       </a>*/
/*       #}*/
/* */
/*       <div class="pmd-js-HeaderAccount pmd-HeaderAccount">*/
/*         {% include "controllers/ui/block-account-header.twig" %}*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*       {% if skin != 'light' %}*/
/*         {% include "partials/header-country.twig" %}*/
/*       {% endif %}*/
/* */
/*       {% if skin == 'light' %}*/
/*       <a href="/" class="pmd-js-HeaderReturn pmd-HeaderReturn">< Retour</a>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/* */
/* </header>*/
/* {% endspaceless %}*/
/* */
