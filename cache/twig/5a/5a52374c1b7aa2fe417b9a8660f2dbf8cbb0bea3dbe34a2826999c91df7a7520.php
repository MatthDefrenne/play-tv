<?php

/* controllers/pages/mentions-legales.twig */
class __TwigTemplate_318f3a8c38349dd483706f08c5f4c84b9d381c2f7dc9a69c600d04c5da92229e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/mentions-legales.twig", 1);
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
        echo "<div id=\"content\">
  <div class=\"container\">

    <div class=\"row\">

      <div class=\"span3 sep\">
        ";
        // line 10
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/mentions-legales.twig", 10)->display($context);
        // line 11
        echo "      </div>

      ";
        // line 13
        $this->loadTemplate("controllers/pages/_mentions-legales.twig", "controllers/pages/mentions-legales.twig", 13)->display($context);
        // line 14
        echo "
    </div>

  </div>
</div>
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/mentions-legales.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 14,  45 => 13,  41 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row">*/
/* */
/*       <div class="span3 sep">*/
/*         {% include "controllers/pages/_menu.twig" %}*/
/*       </div>*/
/* */
/*       {% include "controllers/pages/_mentions-legales.twig" %}*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* </div>*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
