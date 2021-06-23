<?php

/* partials/nav_mobile.twig */
class __TwigTemplate_d6e6400b18e06f81b0d293ccc7faee685d7b1073f14ab95ed38b1014f8ddfa8b extends Twig_Template
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
        if ($this->env->getExtension('playtv_feature')->hasFeature("account")) {
            // line 2
            echo "<div class=\"pmd-MenuHeading\">
  ";
            // line 3
            if ( !(null === (isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")))) {
                // line 4
                echo "  <a href=\"#\" class=\"pmd-js-Menu-account pmd-MenuHeading-link pmd-js-Action--touchify\">
    <img src=\"";
                // line 5
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 32, 1 => 32), "method", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 32, 1 => 32), "method"), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture-mobile.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture-mobile.svg"))), "html", null, true);
                echo "\" class=\"pmd-MenuHeading-avatar\" class=\"pmd-MenuHeading-avatar\" width=\"32\" height=\"32\">
    <span>";
                // line 6
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getUsername", array()), "html", null, true);
                echo "</span>
  </a>
  ";
            } else {
                // line 9
                echo "  <a href=\"/connexion/\" class=\"pmd-js-Menu-login pmd-js-Action--touchify pmd-MenuHeading-link\">
    <img src=\"";
                // line 10
                echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
                echo "/images/avatars/user-picture-mobile.svg\" class=\"pmd-MenuHeading-avatar\" width=\"32\" height=\"32\">
    <span>Me connecter</span>
  </a>
  ";
            }
            // line 14
            echo "</div>
";
        }
        // line 16
        echo "
";
        // line 17
        ob_start();
        // line 18
        echo "<ul class=\"pmd-MenuChoice\">
  <li>
    <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("television_index");
        echo "\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item";
        if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "television", 1 => "chaine_tv"))) {
            echo " pmd-MenuChoice-item--active";
        }
        echo "\">

      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--tv pmd-MenuChoice-icon\">
        <use xlink:href=\"#pmd-Svg--tv\"></use>
      </svg>
      <span>";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("Live TV", array(), "messages");
        // line 26
        echo "
    </a>
  </li>
  <li>
    <a href=\"";
        // line 30
        echo $this->env->getExtension('routing')->getPath("programmes_en_direct");
        echo "\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item";
        if ((twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "programmes_tv", 1 => "programme_tv", 2 => "people", 3 => "toplive")) && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) != "a_ne_pas_manquer"))) {
            echo " pmd-MenuChoice-item--active";
        }
        echo "\">

      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--guide pmd-MenuChoice-icon\">
        <use xlink:href=\"#pmd-Svg--guide\"></use>
      </svg>
      <span>";
        // line 35
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV Guide", array(), "messages");
        echo "</span>

  </li>
  ";
        // line 38
        if ($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv")) {
            // line 39
            echo "  <li>
    <a href=\"";
            // line 40
            echo $this->env->getExtension('routing')->getPath("replay_tv_index");
            echo "\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item";
            if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "replay_tv", 1 => "video"))) {
                echo " pmd-MenuChoice-item--active";
            }
            echo "\">

      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--replay pmd-MenuChoice-icon\">
        <use xlink:href=\"#pmd-Svg--replay\"></use>
      </svg>
      <span>";
            // line 45
            echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up TV", array(), "messages");
            echo "</span>

    </a>
  </li>
  ";
        }
        // line 50
        echo "  ";
        if ($this->env->getExtension('playtv_feature')->hasFeature("broadcast_highlights")) {
            // line 51
            echo "  <li>
    <a href=\"";
            // line 52
            echo $this->env->getExtension('routing')->getPath("programmes_prime_a_ne_pas_manquer");
            echo "\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item";
            if ((((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "programmes_tv") && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "a_ne_pas_manquer"))) {
                echo " pmd-MenuChoice-item--active";
            }
            echo "\">

      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--star pmd-MenuChoice-icon\">
        <use xlink:href=\"#pmd-Svg--star\"></use>
      </svg>
      <span>Notre sélection</span>

    </a>
  </li>
  ";
        }
        // line 62
        echo "</ul>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/nav_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 62,  131 => 52,  128 => 51,  125 => 50,  117 => 45,  105 => 40,  102 => 39,  100 => 38,  94 => 35,  82 => 30,  76 => 26,  74 => 25,  62 => 20,  58 => 18,  56 => 17,  53 => 16,  49 => 14,  42 => 10,  39 => 9,  33 => 6,  29 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if has_feature('account') %}*/
/* <div class="pmd-MenuHeading">*/
/*   {% if current_account is not null %}*/
/*   <a href="#" class="pmd-js-Menu-account pmd-MenuHeading-link pmd-js-Action--touchify">*/
/*     <img src="{{ current_account.getAvatar(32, 32)|default(apps_base_url ~ "/images/avatars/user-picture-mobile.svg") }}" class="pmd-MenuHeading-avatar" class="pmd-MenuHeading-avatar" width="32" height="32">*/
/*     <span>{{ current_account.getUsername }}</span>*/
/*   </a>*/
/*   {% else %}*/
/*   <a href="/connexion/" class="pmd-js-Menu-login pmd-js-Action--touchify pmd-MenuHeading-link">*/
/*     <img src="{{ apps_base_url }}/images/avatars/user-picture-mobile.svg" class="pmd-MenuHeading-avatar" width="32" height="32">*/
/*     <span>Me connecter</span>*/
/*   </a>*/
/*   {% endif %}*/
/* </div>*/
/* {% endif %}*/
/* */
/* {% spaceless %}*/
/* <ul class="pmd-MenuChoice">*/
/*   <li>*/
/*     <a href="{{ path('television_index') }}" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item{% if controller_name in ['television', 'chaine_tv'] %} pmd-MenuChoice-item--active{% endif %}">*/
/* */
/*       <svg role="img" class="pmd-Svg pmd-Svg--tv pmd-MenuChoice-icon">*/
/*         <use xlink:href="#pmd-Svg--tv"></use>*/
/*       </svg>*/
/*       <span>{% trans %}Live TV{% endtrans %}*/
/* */
/*     </a>*/
/*   </li>*/
/*   <li>*/
/*     <a href="{{ path('programmes_en_direct') }}" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item{% if controller_name in ['programmes_tv', 'programme_tv', 'people', 'toplive'] and action_name != 'a_ne_pas_manquer' %} pmd-MenuChoice-item--active{% endif %}">*/
/* */
/*       <svg role="img" class="pmd-Svg pmd-Svg--guide pmd-MenuChoice-icon">*/
/*         <use xlink:href="#pmd-Svg--guide"></use>*/
/*       </svg>*/
/*       <span>{% trans %}TV Guide{% endtrans %}</span>*/
/* */
/*   </li>*/
/*   {% if has_feature('catchup_tv') %}*/
/*   <li>*/
/*     <a href="{{ path('replay_tv_index') }}" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item{% if controller_name in ['replay_tv', 'video'] %} pmd-MenuChoice-item--active{% endif %}">*/
/* */
/*       <svg role="img" class="pmd-Svg pmd-Svg--replay pmd-MenuChoice-icon">*/
/*         <use xlink:href="#pmd-Svg--replay"></use>*/
/*       </svg>*/
/*       <span>{% trans %}Catch Up TV{% endtrans %}</span>*/
/* */
/*     </a>*/
/*   </li>*/
/*   {% endif %}*/
/*   {% if has_feature('broadcast_highlights') %}*/
/*   <li>*/
/*     <a href="{{ path('programmes_prime_a_ne_pas_manquer') }}" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuChoice-item{% if controller_name == 'programmes_tv' and action_name == 'a_ne_pas_manquer' %} pmd-MenuChoice-item--active{% endif %}">*/
/* */
/*       <svg role="img" class="pmd-Svg pmd-Svg--star pmd-MenuChoice-icon">*/
/*         <use xlink:href="#pmd-Svg--star"></use>*/
/*       </svg>*/
/*       <span>Notre sélection</span>*/
/* */
/*     </a>*/
/*   </li>*/
/*   {% endif %}*/
/* </ul>*/
/* {% endspaceless %}*/
/* */
