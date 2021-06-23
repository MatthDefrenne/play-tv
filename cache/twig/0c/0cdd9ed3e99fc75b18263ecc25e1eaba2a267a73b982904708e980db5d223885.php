<?php

/* controllers/television/channel.twig */
class __TwigTemplate_ffcc3c7372aa8ddc31d40ba1e022ab3e5d269bf156df0389f793eef51fe35e6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/television/channel.twig", 1);
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
        echo "  ";
        $this->loadTemplate("controllers/television/_television.twig", "controllers/television/channel.twig", 4)->display($context);
        // line 5
        echo "  ";
        $this->loadTemplate("controllers/television/_submenu.twig", "controllers/television/channel.twig", 5)->display($context);
        // line 6
        echo "  ";
        $this->loadTemplate("controllers/television/_content.twig", "controllers/television/channel.twig", 6)->display($context);
    }

    public function getTemplateName()
    {
        return "controllers/television/channel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   {% include "controllers/television/_television.twig" %}*/
/*   {% include "controllers/television/_submenu.twig" %}*/
/*   {% include "controllers/television/_content.twig" %}*/
/* {% endblock content %}*/
/* */
