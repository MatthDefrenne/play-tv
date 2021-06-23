<?php

/* controllers/television/index_mobile.twig */
class __TwigTemplate_2cefee723331cf727477d19a26f8ba94911a5a66377e583d080c29dc7cc4c8c4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/television/index_mobile.twig", 1);
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
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "inline-television-index-mobile.js", array(), "array"), "html", null, true);
        echo "\"></script>
<div class=\"pmd-Remote\">
  <div class=\"pmd-MosaicChannels\">
    <ul class=\"pmd-MosaicChannels-container\">
    ";
        // line 8
        echo (isset($context["mosaic"]) ? $context["mosaic"] : $this->getContext($context, "mosaic"));
        echo "
    </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/index_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <script src="{{ assets.scripts['inline-television-index-mobile.js'] }}"></script>*/
/* <div class="pmd-Remote">*/
/*   <div class="pmd-MosaicChannels">*/
/*     <ul class="pmd-MosaicChannels-container">*/
/*     {{ mosaic|raw }}*/
/*     </ul>*/
/* </div>*/
/* {% endblock content %}*/
/* */
