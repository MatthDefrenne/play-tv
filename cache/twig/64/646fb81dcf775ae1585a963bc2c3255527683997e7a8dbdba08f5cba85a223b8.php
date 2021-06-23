<?php

/* controllers/television/mosaique_mobile.twig */
class __TwigTemplate_98f0050714984cb3043442a6d59dbb821c6b71b03131b398fe6086e62ce51982 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/television/mosaique_mobile.twig", 1);
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
        echo "
    ";
        // line 5
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "direct")) {
            // line 6
            echo "      <h1>Votre bouquet de chaînes</h1>
      <h2>Liste des chaînes disponibles en direct dans votre bouquet</h2>
    ";
        } elseif ((        // line 8
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "categories")) {
            // line 9
            echo "      <h1>Liste des chaînes tv par catégorie</h1>
      <h2>Toutes les chaînes tv classées par catégorie (hors bouquet, ou non)</h2>
    ";
        } elseif ((        // line 11
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "themes")) {
            // line 12
            echo "      <h1>Liste des chaînes tv par thème</h1>
      <h2>Toutes les chaînes tv classées par thème (hors bouquet, ou non)</h2>
    ";
        } elseif ((        // line 14
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "replay-tv")) {
            // line 15
            echo "      <h1>Liste des chaînes tv en replay</h1>
      <h2>Toutes les chaînes tv disponibles en replay télé</h2>
    ";
        }
        // line 18
        echo "
    ";
        // line 19
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "

";
    }

    public function getTemplateName()
    {
        return "controllers/television/mosaique_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 19,  59 => 18,  54 => 15,  52 => 14,  48 => 12,  46 => 11,  42 => 9,  40 => 8,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*     {% if type == 'direct' %}*/
/*       <h1>Votre bouquet de chaînes</h1>*/
/*       <h2>Liste des chaînes disponibles en direct dans votre bouquet</h2>*/
/*     {% elseif type == 'categories' %}*/
/*       <h1>Liste des chaînes tv par catégorie</h1>*/
/*       <h2>Toutes les chaînes tv classées par catégorie (hors bouquet, ou non)</h2>*/
/*     {% elseif type == 'themes' %}*/
/*       <h1>Liste des chaînes tv par thème</h1>*/
/*       <h2>Toutes les chaînes tv classées par thème (hors bouquet, ou non)</h2>*/
/*     {% elseif type == 'replay-tv' %}*/
/*       <h1>Liste des chaînes tv en replay</h1>*/
/*       <h2>Toutes les chaînes tv disponibles en replay télé</h2>*/
/*     {% endif %}*/
/* */
/*     {{ block_mosaic|raw }}*/
/* */
/* {% endblock %}*/
/* */
