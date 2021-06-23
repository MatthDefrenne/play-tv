<?php

/* controllers/television/my-channels.twig */
class __TwigTemplate_04d15c5bb90bb5472f79fde0f93740ed70b1e6b140e01ffaf96eb8717dbaecd3 extends Twig_Template
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
        $this->loadTemplate("controllers/television/channel.twig", "controllers/television/my-channels.twig", 1)->display($context);
    }

    public function getTemplateName()
    {
        return "controllers/television/my-channels.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
/* {% include "controllers/television/channel.twig" %}*/
/* */
