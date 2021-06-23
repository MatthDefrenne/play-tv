<?php

/* controllers/account/subscriptions_mobile.twig */
class __TwigTemplate_195dd5d934b40233212ff6a747af96b946b2fbb9987c9a2ed0ff97e280bb4768 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/account/subscriptions_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->loadTemplate("controllers/account/_offer.twig", "controllers/account/subscriptions_mobile.twig", 4)->display($context);
    }

    public function getTemplateName()
    {
        return "controllers/account/subscriptions_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "controllers/account/_offer.twig" %}*/
/* {% endblock %}*/
/* */
