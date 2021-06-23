<?php

/* controllers/television/index.twig */
class __TwigTemplate_ef772c7aaeaf06cd086145ee1e1950efecdcbf0033ccd7e8c4969ebf41287011 extends Twig_Template
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
        $this->loadTemplate("controllers/television/channel.twig", "controllers/television/index.twig", 1)->display($context);
    }

    public function getTemplateName()
    {
        return "controllers/television/index.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {% include "controllers/television/channel.twig" %}*/
/* */
