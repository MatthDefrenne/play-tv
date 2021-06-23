<?php

/* controllers/player/_not-streamable.twig */
class __TwigTemplate_21e954cae09ea6cfe6cb47345cf36a74917e644bcbdc1b8402d1fee41681f6cf extends Twig_Template
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
        echo "<div class=\"pmd-HandleChannel-subtitle";
        if (((isset($context["display_ads_ga"]) ? $context["display_ads_ga"] : $this->getContext($context, "display_ads_ga")) == true)) {
            echo " pmd-HandleChannel-subtitle--ads";
        }
        echo "\">
  <span>
    ";
        // line 3
        if (($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "stream_access", array()), "country", array()) == false)) {
            // line 4
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("channel_unavailable_in_country", array(), "player");
            // line 5
            echo "    ";
        } else {
            // line 6
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("channel_unavailable", array(), "player");
            // line 7
            echo "    ";
        }
        // line 8
        echo "  </span>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/player/_not-streamable.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 8,  38 => 7,  35 => 6,  32 => 5,  29 => 4,  27 => 3,  19 => 1,);
    }
}
/* <div class="pmd-HandleChannel-subtitle{% if display_ads_ga == true %} pmd-HandleChannel-subtitle--ads{% endif %}">*/
/*   <span>*/
/*     {% if channel.stream_access.country == false %}*/
/*     {% trans from "player" %}channel_unavailable_in_country{% endtrans %}*/
/*     {% else %}*/
/*     {% trans from "player" %}channel_unavailable{% endtrans %}*/
/*     {% endif %}*/
/*   </span>*/
/* </div>*/
/* */
