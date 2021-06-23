<?php

/* controllers/pages/mentions-legales_mobile.twig */
class __TwigTemplate_d2d461f23d15041cbfb34cd9a07fac1d936a8166f83e9fe723664c582ceadfff extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/pages/mentions-legales_mobile.twig", 1);
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
        echo "<div class=\"pmd-StaticPage\">
  <div class=\"pmd-StaticPage-wrapper\">
    ";
        // line 6
        $this->loadTemplate("controllers/pages/_mentions-legales.twig", "controllers/pages/mentions-legales_mobile.twig", 6)->display($context);
        // line 7
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/mentions-legales_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-StaticPage">*/
/*   <div class="pmd-StaticPage-wrapper">*/
/*     {% include "controllers/pages/_mentions-legales.twig" %}*/
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
