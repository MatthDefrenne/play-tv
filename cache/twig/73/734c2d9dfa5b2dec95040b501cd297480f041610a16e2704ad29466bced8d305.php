<?php

/* controllers/faq/vo-sous-titres.twig */
class __TwigTemplate_c2dd868d9fc3adc42cc30f377a81542e16e677edd20e918e3145fba8f14d40a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/vo-sous-titres.twig", 1);
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
        echo "  <h2 class=\"margin\">3.4. Je souhaite regarder un programme en VO et/ou en version sous-titrée (VOSTFR)</h2>

  <p><strong>Vous ne pouvez pas choisir la langue</strong> (version originale, doublage) et <strong>le sous-titre</strong> du programme que vous visionnez sur le site.</p>

  <p>Parfois, la chaîne de télévision choisit indépendamment de diffuser des programmes en version originale avec les sous-titres (VOSTFR).</p>

  <p><strong class=\"red\">Néanmoins</strong>, sachez que nos équipes travaillent à l'implémentation prochaine de cette fonctionnalité.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/vo-sous-titres.twig";
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
/*   <h2 class="margin">3.4. Je souhaite regarder un programme en VO et/ou en version sous-titrée (VOSTFR)</h2>*/
/* */
/*   <p><strong>Vous ne pouvez pas choisir la langue</strong> (version originale, doublage) et <strong>le sous-titre</strong> du programme que vous visionnez sur le site.</p>*/
/* */
/*   <p>Parfois, la chaîne de télévision choisit indépendamment de diffuser des programmes en version originale avec les sous-titres (VOSTFR).</p>*/
/* */
/*   <p><strong class="red">Néanmoins</strong>, sachez que nos équipes travaillent à l'implémentation prochaine de cette fonctionnalité.</p>*/
/* {% endblock faq_content %}*/
/* */
