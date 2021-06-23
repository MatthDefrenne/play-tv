<?php

/* controllers/aide/_menu.twig */
class __TwigTemplate_26dd1f530199d33862e1df55149fe5d5b5e73a6c9d440b8b43560653220d86c5 extends Twig_Template
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
        echo "<nav>
  ";
        // line 2
        ob_start();
        // line 3
        echo "  ";
        if ($this->env->getExtension('playtv_feature')->hasFeature("support")) {
            // line 4
            echo "  <p class=\"grey-box xmargin\">
    <a href=\"/faq/\" class=\"";
            // line 5
            if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "faq")) {
                echo "clear-grey";
            }
            echo "\" title=\"Questions fréquentes\">
    <strong>Questions fréquentes</strong>
    </a>
  </p>
  <p class=\"grey-box xmargin\">
    <a href=\"/aide/config/\" class=\"";
            // line 10
            if ((((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "aide") && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "config"))) {
                echo "clear-grey";
            }
            echo "\" title=\"Configuration\">
    <strong>Configuration</strong>
    </a>
  </p>
  ";
        }
        // line 15
        echo "  <p class=\"grey-box\">
    <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("help_support");
        echo "\" class=\"";
        if ((((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "aide") && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "support"))) {
            echo "clear-grey";
        }
        echo "\" title=\"Contacter le support\">
    <strong>";
        // line 17
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact support", array(), "messages");
        echo "</strong>
    </a>
  </p>
  ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 21
        echo "</nav>
";
    }

    public function getTemplateName()
    {
        return "controllers/aide/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 21,  61 => 17,  53 => 16,  50 => 15,  40 => 10,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <nav>*/
/*   {% spaceless %}*/
/*   {% if has_feature('support') %}*/
/*   <p class="grey-box xmargin">*/
/*     <a href="/faq/" class="{% if controller_name == 'faq' %}clear-grey{% endif %}" title="Questions fréquentes">*/
/*     <strong>Questions fréquentes</strong>*/
/*     </a>*/
/*   </p>*/
/*   <p class="grey-box xmargin">*/
/*     <a href="/aide/config/" class="{% if controller_name == 'aide' and action_name == 'config' %}clear-grey{% endif %}" title="Configuration">*/
/*     <strong>Configuration</strong>*/
/*     </a>*/
/*   </p>*/
/*   {% endif %}*/
/*   <p class="grey-box">*/
/*     <a href="{{ path('help_support') }}" class="{% if controller_name == 'aide' and action_name == 'support' %}clear-grey{% endif %}" title="Contacter le support">*/
/*     <strong>{% trans %}Contact support{% endtrans %}</strong>*/
/*     </a>*/
/*   </p>*/
/*   {% endspaceless %}*/
/* </nav>*/
/* */
