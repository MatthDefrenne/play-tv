<?php

/* controllers/pages/donnees-personnelles_mobile.twig */
class __TwigTemplate_a04e934144f79dd566262e7f7e71a58365f503b61e9b9fc266f1f9619240a9de extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/pages/donnees-personnelles_mobile.twig", 1);
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
        $this->loadTemplate("controllers/pages/_donnees-personnelles.twig", "controllers/pages/donnees-personnelles_mobile.twig", 6)->display($context);
        // line 7
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/donnees-personnelles_mobile.twig";
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
/*     {% include "controllers/pages/_donnees-personnelles.twig" %}*/
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
