<?php

/* controllers/index/index.twig */
class __TwigTemplate_ad9aa8a804d44cd38d28452c111036aa3e20370a326c14c8ca173b4fff0332bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/index/index.twig", 1);
        $this->blocks = array(
            'fluidheader' => array($this, 'block_fluidheader'),
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
    public function block_fluidheader($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"content\" class=\"pmd-Homepage\">

  ";
        // line 10
        $this->loadTemplate("controllers/index/_carrousel.twig", "controllers/index/index.twig", 10)->display($context);
        // line 11
        echo "
  <div class=\"container pmd-Homepage-container\">

    ";
        // line 14
        $context["classes"] = array(0 => "pmd-HomepageHead");
        // line 15
        echo "
    ";
        // line 16
        if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 17
            echo "    ";
            $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => "pmd-HomepageHead--ads"));
            // line 18
            echo "    ";
        }
        // line 19
        echo "
    ";
        // line 20
        $context["classes"] = twig_join_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), " ");
        // line 21
        echo "
    <div class=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), "html", null, true);
        echo "\">

      ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")), 0, 3));
        foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
            // line 25
            echo "        ";
            echo $context["widget"];
            echo "
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "
      <div class=\"pmd-HomepageHeadAds\">
        ";
        // line 29
        $this->loadTemplate("partials/ads-banner.twig", "controllers/index/index.twig", 29)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 30
        echo "      </div>

    </div>

    ";
        // line 34
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")), 3, twig_length_filter($this->env, (isset($context["widgets"]) ? $context["widgets"] : $this->getContext($context, "widgets")))));
        foreach ($context['_seq'] as $context["_key"] => $context["widget"]) {
            // line 35
            echo "      ";
            echo $context["widget"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['widget'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/index/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 37,  108 => 35,  104 => 34,  98 => 30,  96 => 29,  92 => 27,  83 => 25,  79 => 24,  74 => 22,  71 => 21,  69 => 20,  66 => 19,  63 => 18,  60 => 17,  58 => 16,  55 => 15,  53 => 14,  48 => 11,  46 => 10,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block fluidheader %}*/
/*   {{ block_mosaic|raw }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* <div id="content" class="pmd-Homepage">*/
/* */
/*   {% include "controllers/index/_carrousel.twig" %}*/
/* */
/*   <div class="container pmd-Homepage-container">*/
/* */
/*     {% set classes = ['pmd-HomepageHead'] %}*/
/* */
/*     {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/*     {% set classes = classes|merge(['pmd-HomepageHead--ads']) %}*/
/*     {% endif %}*/
/* */
/*     {% set classes = classes|join(' ') %}*/
/* */
/*     <div class="{{ classes }}">*/
/* */
/*       {% for widget in widgets|slice(0, 3) %}*/
/*         {{ widget|raw }}*/
/*       {% endfor %}*/
/* */
/*       <div class="pmd-HomepageHeadAds">*/
/*         {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*       </div>*/
/* */
/*     </div>*/
/* */
/*     {% for widget in widgets|slice(3, widgets|length) %}*/
/*       {{ widget|raw }}*/
/*     {% endfor %}*/
/* */
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
