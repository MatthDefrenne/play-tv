<?php

/* controllers/live-tweets/index_mobile.twig */
class __TwigTemplate_22c92a12812d37915652f151fcccc7133a6c9b7b8d52fb8c547791fda9b61b5f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/live-tweets/index_mobile.twig", 1);
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
        echo "  ";
        echo (isset($context["social_tv_posts"]) ? $context["social_tv_posts"] : $this->getContext($context, "social_tv_posts"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/live-tweets/index_mobile.twig";
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
/*   {{ social_tv_posts|raw }}*/
/* {% endblock %}*/
/* */
