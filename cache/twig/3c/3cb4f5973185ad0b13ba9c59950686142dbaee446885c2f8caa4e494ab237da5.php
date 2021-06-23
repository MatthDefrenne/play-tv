<?php

/* partials/subnav-guide-tv_mobile.twig */
class __TwigTemplate_e36e7133f24e5108772d6889c98933aa3101b65420341a55f53738e7b8c0f8fb extends Twig_Template
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
        echo "<div class=\"pmd-Heading pmd-Heading--large pmd-Heading--3x pmd-Heading--multichoice\">
  ";
        // line 3
        ob_start();
        // line 4
        echo "  <a href=\"";
        echo $this->env->getExtension('routing')->getPath("programmes_en_direct");
        echo "\" class=\"pmd-Heading-words";
        if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "live")) {
            echo " pmd-Heading-words--active";
        }
        echo "\">
    <span>";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Now", array(), "messages");
        echo "</span>
  </a>
  <a href=\"";
        // line 7
        echo $this->env->getExtension('routing')->getPath("programmes_prime_tonight");
        echo "\" class=\"pmd-Heading-words";
        if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "primetime")) {
            echo " pmd-Heading-words--active";
        }
        echo "\">
    <span>";
        // line 8
        echo $this->env->getExtension('translator')->getTranslator()->trans("Prime time", array(), "messages");
        echo "</span>
  </a>
  <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("programmes_prime_tonight", array("presets" => "latefringe"));
        echo "\" class=\"pmd-Heading-words";
        if (((isset($context["subnav_active"]) ? $context["subnav_active"] : $this->getContext($context, "subnav_active")) == "latefringe")) {
            echo " pmd-Heading-words--active";
        }
        echo "\">
    <span>";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("Late fringe", array(), "messages");
        echo "</span>
  </a>
  ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "partials/subnav-guide-tv_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 14,  63 => 11,  55 => 10,  50 => 8,  42 => 7,  37 => 5,  28 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
/* {% if subnav_active is not defined %}{% set subnav_active = "" %}{% endif %}*/
/* <div class="pmd-Heading pmd-Heading--large pmd-Heading--3x pmd-Heading--multichoice">*/
/*   {% spaceless %}*/
/*   <a href="{{ path('programmes_en_direct') }}" class="pmd-Heading-words{% if subnav_active == 'live' %} pmd-Heading-words--active{% endif %}">*/
/*     <span>{% trans %}Now{% endtrans %}</span>*/
/*   </a>*/
/*   <a href="{{ path('programmes_prime_tonight') }}" class="pmd-Heading-words{% if subnav_active == 'primetime' %} pmd-Heading-words--active{% endif %}">*/
/*     <span>{% trans %}Prime time{% endtrans %}</span>*/
/*   </a>*/
/*   <a href="{{ path('programmes_prime_tonight', {'presets': 'latefringe'}) }}" class="pmd-Heading-words{% if subnav_active == 'latefringe' %} pmd-Heading-words--active{% endif %}">*/
/*     <span>{% trans %}Late fringe{% endtrans %}</span>*/
/*   </a>*/
/*   {% endspaceless %}*/
/* </div>*/
/* */
