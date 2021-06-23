<?php

/* controllers/pages/cgu_mobile.twig */
class __TwigTemplate_a78d9d1a8ee1e80483c02b7225aa609923c5c890cdd6df6dcc0e8f79f4081e5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/pages/cgu_mobile.twig", 1);
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
        $this->loadTemplate("controllers/pages/_cgu.twig", "controllers/pages/cgu_mobile.twig", 6)->display($context);
        // line 7
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/cgu_mobile.twig";
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
/*     {% include "controllers/pages/_cgu.twig" %}*/
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
