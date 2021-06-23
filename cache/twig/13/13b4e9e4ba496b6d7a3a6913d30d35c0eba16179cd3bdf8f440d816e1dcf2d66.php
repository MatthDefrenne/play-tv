<?php

/* controllers/faq/france-3-region.twig */
class __TwigTemplate_3a6e4de1ff1d39ec3f3ff51fd1db84363b630527cad171eb775ff5c7ebd7840d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/france-3-region.twig", 1);
        $this->blocks = array(
            'faq_content' => array($this, 'block_faq_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/faq/_header.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_faq_content($context, array $blocks = array())
    {
        // line 4
        echo "  <h2 class=\"margin\">4.1. Le journal régional diffusé sur France 3 n'est pas celui de ma région</h2>
  <p>La chaîne France 3 est uniquement disponible dans sa version nationale, cependant vous pouvez counsulter les programmes régionaux <a href=\"/replay-tv/videos/france-3/\" title=\"Replay France 3\">disponibles en Replay</a></p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/france-3-region.twig";
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
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">4.1. Le journal régional diffusé sur France 3 n'est pas celui de ma région</h2>*/
/*   <p>La chaîne France 3 est uniquement disponible dans sa version nationale, cependant vous pouvez counsulter les programmes régionaux <a href="/replay-tv/videos/france-3/" title="Replay France 3">disponibles en Replay</a></p>*/
/* {% endblock faq_content %}*/
/* */
