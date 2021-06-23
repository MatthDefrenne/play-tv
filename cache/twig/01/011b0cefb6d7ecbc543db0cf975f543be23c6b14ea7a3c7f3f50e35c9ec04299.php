<?php

/* partials/subnav-guide-tv.twig */
class __TwigTemplate_9e16e0e68eeadff8ce9e089fc575f1a3d9bb99f9d8678ac42cde5425760dca3b extends Twig_Template
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
        if ( !array_key_exists("subnav_active", $context)) {
            $context["subnav_active"] = "";
        }
        // line 2
        echo "
<div class=\"sub-menu\">
  <div class=\"container\">

    ";
        // line 6
        ob_start();
        // line 7
        echo "    <ul>
    ";
        // line 8
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 9
            echo "      <li";
            if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "home")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
        <a href=\"";
            // line 10
            echo $this->env->getExtension('routing')->getPath("programmes");
            echo "\">
          <span class=\"sub-menu_text\">";
            // line 11
            echo $this->env->getExtension('translator')->getTranslator()->trans("TV guide", array(), "messages");
            echo "</span>
        </a>
      </li>
    ";
        }
        // line 15
        echo "      <li";
        if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "live")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
      <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("programmes_en_direct");
        echo "\">
        <span class=\"sub-menu_text\">";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV listings now", array(), "messages");
        echo "</span>
      </a>
      </li>
      <li";
        // line 20
        if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "prime-time")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
        <a href=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("programmes_prime_tonight");
        echo "\">
          <span class=\"sub-menu_text\">";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("Tonight on TV", array(), "messages");
        echo "</span>
        </a>
      </li>
    ";
        // line 25
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 26
            echo "      <li";
            if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "featured")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
        <a href=\"";
            // line 27
            echo $this->env->getExtension('routing')->getPath("programmes_prime_a_ne_pas_manquer");
            echo "\">
          <span class=\"sub-menu_text\">";
            // line 28
            echo $this->env->getExtension('translator')->getTranslator()->trans("Do not miss", array(), "messages");
            echo "</span>
        </a>
      </li>
      <li";
            // line 31
            if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "toplive")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
        <a href=\"/toplive/\">
          <span class=\"sub-menu_text\">Top Live!</span>
        </a>
      </li>
    ";
        }
        // line 37
        echo "
    </ul>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 40
        echo "
    ";
        // line 41
        $this->loadTemplate("partials/share.twig", "partials/subnav-guide-tv.twig", 41)->display($context);
        // line 42
        echo "
  </div>
</div> <!-- /.sub-menu -->
";
    }

    public function getTemplateName()
    {
        return "partials/subnav-guide-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 42,  125 => 41,  122 => 40,  117 => 37,  106 => 31,  100 => 28,  96 => 27,  89 => 26,  87 => 25,  81 => 22,  77 => 21,  71 => 20,  65 => 17,  61 => 16,  54 => 15,  47 => 11,  43 => 10,  36 => 9,  34 => 8,  31 => 7,  29 => 6,  23 => 2,  19 => 1,);
    }
}
/* {% if subnav_active is not defined %}{% set subnav_active = "" %}{% endif %}*/
/* */
/* <div class="sub-menu">*/
/*   <div class="container">*/
/* */
/*     {% spaceless %}*/
/*     <ul>*/
/*     {% if is_website_fr %}*/
/*       <li{% if subnav_active == 'home' %} class="tab-selected"{% endif %}>*/
/*         <a href="{{ path('programmes') }}">*/
/*           <span class="sub-menu_text">{% trans %}TV guide{% endtrans %}</span>*/
/*         </a>*/
/*       </li>*/
/*     {% endif %}*/
/*       <li{% if subnav_active == 'live' %} class="tab-selected"{% endif %}>*/
/*       <a href="{{ path('programmes_en_direct') }}">*/
/*         <span class="sub-menu_text">{% trans %}TV listings now{% endtrans %}</span>*/
/*       </a>*/
/*       </li>*/
/*       <li{% if subnav_active == 'prime-time' %} class="tab-selected"{% endif %}>*/
/*         <a href="{{ path('programmes_prime_tonight') }}">*/
/*           <span class="sub-menu_text">{% trans %}Tonight on TV{% endtrans %}</span>*/
/*         </a>*/
/*       </li>*/
/*     {% if is_website_fr %}*/
/*       <li{% if subnav_active == 'featured' %} class="tab-selected"{% endif %}>*/
/*         <a href="{{ path('programmes_prime_a_ne_pas_manquer') }}">*/
/*           <span class="sub-menu_text">{% trans %}Do not miss{% endtrans %}</span>*/
/*         </a>*/
/*       </li>*/
/*       <li{% if subnav_active == 'toplive' %} class="tab-selected"{% endif %}>*/
/*         <a href="/toplive/">*/
/*           <span class="sub-menu_text">Top Live!</span>*/
/*         </a>*/
/*       </li>*/
/*     {% endif %}*/
/* */
/*     </ul>*/
/*     {% endspaceless %}*/
/* */
/*     {% include "partials/share.twig" %}*/
/* */
/*   </div>*/
/* </div> <!-- /.sub-menu -->*/
/* */
