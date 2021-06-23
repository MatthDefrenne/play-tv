<?php

/* layouts/inflow.twig */
class __TwigTemplate_90823fa7e31d96f7e40c08af54e82be8737cf5fe8d904b4ddde1c818fc14bd88 extends Twig_Template
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
        echo "<!DOCTYPE html>
<html
  class=\"controller-";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo " action-";
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")), "html", null, true);
        echo " responsive naked-theme\"
  lang=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_replace_filter((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), array("_" => "-"))), "html", null, true);
        echo "\"
>
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimal-ui\">
    <title>";
        // line 10
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array()), "Play TV")) : ("Play TV")), "html", null, true);
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 11
        echo twig_escape_filter($this->env, _twig_default_filter(twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "description", array()), 200, false), "La télévision gratuite en direct et les programmes TV en replay sur internet."), "html", null, true);
        echo "\">
    ";
        // line 12
        if (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array())) > 0))) {
            // line 13
            echo "    <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, twig_lower_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()), ",")), 800, false), "html", null, true);
            echo "\">
    ";
        }
        // line 15
        echo "    ";
        if ($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "robots", array(), "any", true, true)) {
            // line 16
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "robots", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 18
        echo "    ";
        // line 19
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "styles", array()), "inflow.css", array(), "array"), "html", null, true);
        echo "\">
    ";
        // line 21
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-first.js", array(), "array"), "html", null, true);
        echo "\"></script>
    ";
        // line 23
        echo "    ";
        $this->loadTemplate("partials/tracking-google-analytics.twig", "layouts/inflow.twig", 23)->display($context);
        // line 24
        echo "    ";
        // line 25
        echo "    ";
        $this->loadTemplate("partials/favicons.twig", "layouts/inflow.twig", 25)->display($context);
        // line 26
        echo "  </head>
  <body itemscope itemtype=\"http://schema.org/WebPage\" data-features=\"\">
    ";
        // line 28
        $this->loadTemplate("partials/svg-symbols.twig", "layouts/inflow.twig", 28)->display($context);
        // line 29
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
        // line 30
        echo "
    ";
        // line 31
        if ( !(isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"))) {
            // line 32
            echo "    <script>
    ;(function(win, doc, App) {
      App.Data = App.Data || {}
      App.Data = ";
            // line 35
            echo twig_jsonencode_filter((isset($context["inflow"]) ? $context["inflow"] : $this->getContext($context, "inflow")), twig_constant("JSON_PRETTY_PRINT"));
            echo "
    })( window, window.document, window.pmd || ( window.pmd = {} ) );
    </script>
    <script src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "page-inflow.js", array(), "array"), "html", null, true);
            echo "\"></script>
    ";
        }
        // line 40
        echo "  </body>
</html>
";
    }

    // line 29
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/inflow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  120 => 29,  114 => 40,  109 => 38,  103 => 35,  98 => 32,  96 => 31,  93 => 30,  90 => 29,  88 => 28,  84 => 26,  81 => 25,  79 => 24,  76 => 23,  71 => 21,  66 => 19,  64 => 18,  58 => 16,  55 => 15,  49 => 13,  47 => 12,  43 => 11,  39 => 10,  30 => 4,  24 => 3,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html*/
/*   class="controller-{{ controller_name }} action-{{ action_name }} responsive naked-theme"*/
/*   lang="{{ locale|replace({'_': '-'})|lower }}"*/
/* >*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">*/
/*     <title>{{ head.meta.title|default('Play TV') }}</title>*/
/*     <meta name="description" content="{{ head.meta.description|truncate(200, false)|default("La télévision gratuite en direct et les programmes TV en replay sur internet.") }}">*/
/*     {% if head.meta.keywords and head.meta.keywords|length > 0 %}*/
/*     <meta name="keywords" content="{{ head.meta.keywords|join(',')|lower|truncate(800, false) }}">*/
/*     {% endif %}*/
/*     {% if head.robots is defined %}*/
/*     <meta name="robots" content="{{ head.robots }}">*/
/*     {% endif %}*/
/*     {# STYLES #}*/
/*     <link rel="stylesheet" type="text/css" href="{{ assets.styles['inflow.css'] }}">*/
/*     {# SCRIPTS #}*/
/*     <script src="{{ assets.scripts['app-first.js'] }}"></script>*/
/*     {# TRACKING #}*/
/*     {% include "partials/tracking-google-analytics.twig" %}*/
/*     {# FAVICONS #}*/
/*     {% include "partials/favicons.twig" %}*/
/*   </head>*/
/*   <body itemscope itemtype="http://schema.org/WebPage" data-features="">*/
/*     {% include "partials/svg-symbols.twig" %}*/
/*     {% block content %}{% endblock %}*/
/* */
/*     {% if not adb %}*/
/*     <script>*/
/*     ;(function(win, doc, App) {*/
/*       App.Data = App.Data || {}*/
/*       App.Data = {{ inflow|json_encode(constant('JSON_PRETTY_PRINT'))|raw }}*/
/*     })( window, window.document, window.pmd || ( window.pmd = {} ) );*/
/*     </script>*/
/*     <script src="{{ assets.scripts['page-inflow.js'] }}"></script>*/
/*     {% endif %}*/
/*   </body>*/
/* </html>*/
/* */
