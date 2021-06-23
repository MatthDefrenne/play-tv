<?php

/* layouts/player.twig */
class __TwigTemplate_5061c77b1be188a83dcf9cd515e3c88d122821aface64a3e30979b5b269b58f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ( !array_key_exists("mode", $context)) {
            // line 2
            echo "  ";
            $context["mode"] = "default";
        }
        // line 4
        echo "<!doctype html>
<html class=\"controller-";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo " action-";
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")), "html", null, true);
        echo " responsive\" lang=\"fr\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">

    ";
        // line 10
        $this->loadTemplate("partials/dns-prefetch.twig", "layouts/player.twig", 10)->display($context);
        // line 11
        echo "
    <meta name=\"viewport\" content=\"user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1\">

    <title>";
        // line 14
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array()), "Play TV")) : ("Play TV")), "html", null, true);
        echo "</title>

    ";
        // line 16
        if ($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "robots", array(), "any", true, true)) {
            // line 17
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "robots", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 19
        echo "
    ";
        // line 21
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "styles", array()), "player.css", array(), "array"), "html", null, true);
        echo "\">

    ";
        // line 25
        echo "    ";
        // line 26
        echo "    ";
        if ( !$this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "webapp", array(), "array", true, true)) {
            // line 27
            echo "      ";
            $this->loadTemplate("partials/tracking-google-analytics.twig", "layouts/player.twig", 27)->display($context);
            // line 28
            echo "    ";
        }
        // line 29
        echo "
    ";
        // line 31
        echo "    ";
        $this->loadTemplate("partials/favicons.twig", "layouts/player.twig", 31)->display($context);
        // line 32
        echo "  </head>
  <body>

    ";
        // line 35
        $this->loadTemplate("partials/svg-symbols.twig", "layouts/player.twig", 35)->display($context);
        // line 36
        echo "
    ";
        // line 37
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "
    ";
        // line 39
        $this->loadTemplate("partials/sdk-livereload.twig", "layouts/player.twig", 39)->display($context);
        // line 40
        echo "
  </body>
</html>

";
    }

    // line 37
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/player.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 37,  104 => 40,  102 => 39,  99 => 38,  97 => 37,  94 => 36,  92 => 35,  87 => 32,  84 => 31,  81 => 29,  78 => 28,  75 => 27,  72 => 26,  70 => 25,  65 => 22,  62 => 21,  59 => 19,  53 => 17,  51 => 16,  46 => 14,  41 => 11,  39 => 10,  29 => 5,  26 => 4,  22 => 2,  20 => 1,);
    }
}
/* {% if mode is not defined %}*/
/*   {% set mode = 'default' %}*/
/* {% endif %}*/
/* <!doctype html>*/
/* <html class="controller-{{ controller_name }} action-{{ action_name }} responsive" lang="fr">*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
/* */
/*     {% include "partials/dns-prefetch.twig" %}*/
/* */
/*     <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">*/
/* */
/*     <title>{{ head.meta.title|default('Play TV') }}</title>*/
/* */
/*     {% if head.robots is defined %}*/
/*     <meta name="robots" content="{{ head.robots }}">*/
/*     {% endif %}*/
/* */
/*     {# STYLES #}*/
/*     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">*/
/*     <link rel="stylesheet" type="text/css" href="{{ assets.styles['player.css'] }}">*/
/* */
/*     {# TRACKING #}*/
/*     {# avoid internal tracking twice #}*/
/*     {% if request.get['webapp'] is not defined %}*/
/*       {% include "partials/tracking-google-analytics.twig" %}*/
/*     {% endif %}*/
/* */
/*     {# FAVICONS #}*/
/*     {% include "partials/favicons.twig" %}*/
/*   </head>*/
/*   <body>*/
/* */
/*     {% include "partials/svg-symbols.twig" %}*/
/* */
/*     {% block content %}{% endblock %}*/
/* */
/*     {% include "partials/sdk-livereload.twig" %}*/
/* */
/*   </body>*/
/* </html>*/
/* */
/* */
