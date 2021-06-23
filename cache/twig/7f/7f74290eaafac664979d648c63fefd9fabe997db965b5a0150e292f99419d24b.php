<?php

/* controllers/live-tweets/_sidebar.twig */
class __TwigTemplate_d99c92fa8444471b054e82a8d0d8c419c1fc7d4eb68f2fdfe9bd11d891fe7580 extends Twig_Template
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
        echo "<div class=\"js-ptv-ProgrammePreview\">
  ";
        // line 2
        if ((isset($context["live_program_by_channel"]) ? $context["live_program_by_channel"] : $this->getContext($context, "live_program_by_channel"))) {
            // line 3
            echo "    ";
            echo (isset($context["live_program_by_channel"]) ? $context["live_program_by_channel"] : $this->getContext($context, "live_program_by_channel"));
            echo "
  ";
        }
        // line 5
        echo "</div>

<div class=\"margin\">
  ";
        // line 8
        $this->loadTemplate("controllers/live-tweets/_most-shared-urls.twig", "controllers/live-tweets/_sidebar.twig", 8)->display($context);
        // line 9
        echo "  </div>

<div class=\"margin\">
  ";
        // line 12
        $this->loadTemplate("controllers/live-tweets/_last-prime-chart.twig", "controllers/live-tweets/_sidebar.twig", 12)->display($context);
        // line 13
        echo "</div>

<div class=\"margin\">
  ";
        // line 16
        $this->loadTemplate("partials/ads-banner.twig", "controllers/live-tweets/_sidebar.twig", 16)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 17
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/live-tweets/_sidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 17,  49 => 16,  44 => 13,  42 => 12,  37 => 9,  35 => 8,  30 => 5,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="js-ptv-ProgrammePreview">*/
/*   {% if live_program_by_channel %}*/
/*     {{ live_program_by_channel|raw }}*/
/*   {% endif %}*/
/* </div>*/
/* */
/* <div class="margin">*/
/*   {% include "controllers/live-tweets/_most-shared-urls.twig" %}*/
/*   </div>*/
/* */
/* <div class="margin">*/
/*   {% include "controllers/live-tweets/_last-prime-chart.twig" %}*/
/* </div>*/
/* */
/* <div class="margin">*/
/*   {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/* </div>*/
/* */
