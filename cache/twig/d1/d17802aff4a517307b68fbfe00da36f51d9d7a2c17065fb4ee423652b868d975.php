<?php

/* controllers/adblock/index.twig */
class __TwigTemplate_72aff738ba79ad6adf88116ebcf96d300644316dbfdca33fb884100cab2dee38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/player.twig", "controllers/adblock/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/player.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo (isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/adblock/index.twig";
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
/* {% extends "layouts/player.twig" %}*/
/* */
/* {% block content %}*/
/* {{ adb|raw }}*/
/* {% endblock %}*/
/* */
