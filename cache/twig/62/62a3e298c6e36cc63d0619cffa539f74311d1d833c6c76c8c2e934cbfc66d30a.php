<?php

/* controllers/programmes-tv/ce-soir_mobile.twig */
class __TwigTemplate_63e7cefedd895e39ab65f1b49c0823ada1e3a24b84b4572cf479ee90ca387a47 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/programmes-tv/ce-soir_mobile.twig", 1);
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
        echo "<div class=\"pmd-TvProgramme\">

  ";
        // line 6
        $this->loadTemplate("partials/subnav-guide-tv_mobile.twig", "controllers/programmes-tv/ce-soir_mobile.twig", 6)->display(array_merge($context, array("subnav_active" => (isset($context["presets"]) ? $context["presets"] : $this->getContext($context, "presets")))));
        // line 7
        echo "
  <div class=\"pmd-js-TvProgrammeContent\">
    ";
        // line 9
        echo (isset($context["broadcasts_presets"]) ? $context["broadcasts_presets"] : $this->getContext($context, "broadcasts_presets"));
        echo "
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/ce-soir_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  37 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-TvProgramme">*/
/* */
/*   {% include "partials/subnav-guide-tv_mobile.twig" with {"subnav_active": presets} %}*/
/* */
/*   <div class="pmd-js-TvProgrammeContent">*/
/*     {{ broadcasts_presets|raw }}*/
/*   </div>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
