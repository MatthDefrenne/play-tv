<?php

/* controllers/player/embed_mobile.twig */
class __TwigTemplate_607cb2f4ea9003bbfe488569fd6ee5bf26cba012795169e7b6d689d3a1c22ab9 extends Twig_Template
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
        // line 2
        $this->loadTemplate("controllers/player/embed.twig", "controllers/player/embed_mobile.twig", 2)->display($context);
    }

    public function getTemplateName()
    {
        return "controllers/player/embed_mobile.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 2,);
    }
}
/* {# FIXME this template exists solely to make sure app_controller::hasMobileFriendly returns true even when player_controller::embed_action is called via a sub request #}*/
/* {% include "controllers/player/embed.twig" %}*/
/* */
