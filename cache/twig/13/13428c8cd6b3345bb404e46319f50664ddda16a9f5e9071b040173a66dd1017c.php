<?php

/* layouts/full.twig */
class __TwigTemplate_7da8b347cdbd046d2c8a4008417ea27d79df34f688133a94724c34e21bae2b4a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'fluidheader' => array($this, 'block_fluidheader'),
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
        if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "order", 1 => "adblock"))) {
            echo " responsive";
        }
        if ((twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "index")) || (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "replay_tv")) && !twig_in_filter((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")), array(0 => "replay"))))) {
            echo " responsive-inverse";
        }
        echo " naked-theme\"
  lang=\"";
        // line 4
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_replace_filter((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), array("_" => "-"))), "html", null, true);
        echo "\"
>
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    ";
        // line 9
        if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "order"))) {
            // line 10
            echo "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, minimal-ui\">
    ";
        }
        // line 12
        echo "    ";
        $this->loadTemplate("partials/dns-prefetch.twig", "layouts/full.twig", 12)->display($context);
        // line 13
        echo "    <title>";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array()), "Play TV")) : ("Play TV")), "html", null, true);
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 14
        echo twig_escape_filter($this->env, _twig_default_filter(twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "description", array()), 200, false), "La télévision gratuite en direct et les programmes TV en replay sur internet."), "html", null, true);
        echo "\">
    ";
        // line 15
        if (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array())) > 0))) {
            // line 16
            echo "    <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, twig_lower_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()), ",")), 800, false), "html", null, true);
            echo "\">
    ";
        }
        // line 18
        echo "    ";
        if ((isset($context["canonical_url"]) ? $context["canonical_url"] : $this->getContext($context, "canonical_url"))) {
            // line 19
            echo "    <link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["canonical_url"]) ? $context["canonical_url"] : $this->getContext($context, "canonical_url")), "html", null, true);
            echo "\">
    ";
        }
        // line 21
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "alternate_urls", array()));
        foreach ($context['_seq'] as $context["hreflang"] => $context["href"]) {
            // line 22
            echo "    <link rel=\"alternate\" href=\"";
            echo twig_escape_filter($this->env, $context["href"], "html", null, true);
            echo "\" hreflang=\"";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_replace_filter($context["hreflang"], array("_" => "-"))), "html", null, true);
            echo "\">
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['hreflang'], $context['href'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    ";
        if ($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "robots", array(), "any", true, true)) {
            // line 25
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "robots", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 27
        echo "
    ";
        // line 29
        echo "    ";
        if ( !(isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 30
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "styles", array()), "main-i18n.css", array(), "array"), "html", null, true);
            echo "\">
    ";
        } else {
            // line 32
            echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "styles", array()), "main.css", array(), "array"), "html", null, true);
            echo "\">
    ";
        }
        // line 34
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700\">
    ";
        // line 36
        echo "    ";
        $this->loadTemplate("partials/gdpr-banner.twig", "layouts/full.twig", 36)->display($context);
        // line 37
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-first.js", array(), "array"), "html", null, true);
        echo "\"></script>
    ";
        // line 39
        echo "    ";
        $this->loadTemplate("partials/tracking-google-analytics.twig", "layouts/full.twig", 39)->display($context);
        // line 40
        echo "    ";
        // line 41
        echo "    ";
        $this->loadTemplate("partials/opengraph.twig", "layouts/full.twig", 41)->display($context);
        // line 42
        echo "    ";
        $this->loadTemplate("partials/rich-snippets-google-sitelinks-search-box.twig", "layouts/full.twig", 42)->display($context);
        // line 43
        echo "    ";
        $this->loadTemplate("partials/structured-data-google-knowledge-graph.twig", "layouts/full.twig", 43)->display($context);
        // line 44
        echo "    ";
        // line 45
        echo "    ";
        $this->loadTemplate("partials/favicons.twig", "layouts/full.twig", 45)->display($context);
        // line 46
        echo "  </head>
  <body itemscope itemtype=\"http://schema.org/WebPage\" data-features=\"\">
    ";
        // line 48
        $this->loadTemplate("partials/svg-symbols.twig", "layouts/full.twig", 48)->display($context);
        // line 49
        echo "    ";
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "minimal")) {
            // line 50
            echo "    <div class=\"pmd-FluidHeader\">
      <div class=\"ptv-Notifier ptv-js-OldBrowserNotifier\"></div>
      ";
            // line 52
            $this->loadTemplate("partials/notifier-website.twig", "layouts/full.twig", 52)->display($context);
            // line 53
            echo "      ";
            $this->loadTemplate("partials/header.twig", "layouts/full.twig", 53)->display($context);
            // line 54
            echo "      <div class=\"ptv-Notifier ptv-js-Notifier\"></div>
      ";
            // line 55
            $this->displayBlock('fluidheader', $context, $blocks);
            // line 56
            echo "    </div>
    <div id=\"page\">
    ";
        }
        // line 59
        echo "
      ";
        // line 60
        $this->displayBlock('content', $context, $blocks);
        // line 61
        echo "
    ";
        // line 62
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "minimal")) {
            // line 63
            echo "    </div>
    ";
            // line 64
            $this->loadTemplate("partials/footer.twig", "layouts/full.twig", 64)->display($context);
            // line 65
            echo "    ";
        }
        // line 66
        echo "
  ";
        // line 67
        if (!twig_in_filter(        // line 68
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "url"))) {
            // line 70
            echo "    ";
            // line 75
            echo "    <script>
      (function(win, doc, app) {
        app.Data = app.Data || {};
      })(window, window.document, window.pmd || (window.pmd = {}));
    </script>
    <script src=\"";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-main.js", array(), "array"), "html", null, true);
            echo "\"></script>
    ";
            // line 81
            $this->loadTemplate("partials/ppl.twig", "layouts/full.twig", 81)->display($context);
            // line 82
            echo "    ";
            // line 83
            echo "    ";
            if ($this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "scripts", array(), "any", false, true), (("bundle-" . twig_replace_filter((isset($context["bundle_name"]) ? $context["bundle_name"] : $this->getContext($context, "bundle_name")), array("_" => "-"))) . ".js"), array(), "array", true, true)) {
                // line 84
                echo "      <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), (("bundle-" . twig_replace_filter((isset($context["bundle_name"]) ? $context["bundle_name"] : $this->getContext($context, "bundle_name")), array("_" => "-"))) . ".js"), array(), "array"), "html", null, true);
                echo "\"></script>
    ";
            }
            // line 86
            echo "    ";
            // line 87
            echo "    ";
            if ($this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "scripts", array(), "any", false, true), (("page-" . twig_replace_filter((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), array("_" => "-"))) . ".js"), array(), "array", true, true)) {
                // line 88
                echo "      <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), (("page-" . twig_replace_filter((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), array("_" => "-"))) . ".js"), array(), "array"), "html", null, true);
                echo "\"></script>
    ";
            }
            // line 90
            echo "
    <script>
      \$(document).ready(function() {
        ";
            // line 93
            if (($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "popin_login", array(), "array", true, true) && ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false))) {
                // line 94
                echo "        ptv.Events.Main.trigger('flow:login');
        ";
            }
            // line 96
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "popin_register", array(), "array", true, true)) {
                // line 97
                echo "        ptv.Events.Main.trigger('flow:register');
        ";
            }
            // line 99
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "popin_forgot_password", array(), "array", true, true)) {
                // line 100
                echo "        ptv.Events.Main.trigger('flow:forgotPassword');
        ";
            }
            // line 102
            echo "        ";
            if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "popin_crowdfunding", array(), "array", true, true)) {
                // line 103
                echo "        ptv.Events.Main.trigger('flow:crowdfunding');
        ";
            }
            // line 105
            echo "      })
    </script>
  ";
        }
        // line 108
        echo "
    ";
        // line 110
        echo "    ";
        $this->loadTemplate("partials/sdk-paymill.twig", "layouts/full.twig", 110)->display($context);
        // line 111
        echo "    ";
        $this->loadTemplate("partials/sdk-facebook.twig", "layouts/full.twig", 111)->display($context);
        // line 112
        echo "    ";
        $this->loadTemplate("partials/quantcast-pixel.twig", "layouts/full.twig", 112)->display($context);
        // line 113
        echo "    ";
        // line 114
        echo "    ";
        // line 115
        echo "    ";
        // line 116
        echo "    ";
        $this->loadTemplate("partials/ads-skin.twig", "layouts/full.twig", 116)->display($context);
        // line 117
        echo "    ";
        $this->loadTemplate("partials/sdk-livereload.twig", "layouts/full.twig", 117)->display($context);
        // line 118
        echo "  </body>
</html>
";
    }

    // line 55
    public function block_fluidheader($context, array $blocks = array())
    {
    }

    // line 60
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/full.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 60,  310 => 55,  304 => 118,  301 => 117,  298 => 116,  296 => 115,  294 => 114,  292 => 113,  289 => 112,  286 => 111,  283 => 110,  280 => 108,  275 => 105,  271 => 103,  268 => 102,  264 => 100,  261 => 99,  257 => 97,  254 => 96,  250 => 94,  248 => 93,  243 => 90,  237 => 88,  234 => 87,  232 => 86,  226 => 84,  223 => 83,  221 => 82,  219 => 81,  215 => 80,  208 => 75,  206 => 70,  204 => 68,  203 => 67,  200 => 66,  197 => 65,  195 => 64,  192 => 63,  190 => 62,  187 => 61,  185 => 60,  182 => 59,  177 => 56,  175 => 55,  172 => 54,  169 => 53,  167 => 52,  163 => 50,  160 => 49,  158 => 48,  154 => 46,  151 => 45,  149 => 44,  146 => 43,  143 => 42,  140 => 41,  138 => 40,  135 => 39,  130 => 37,  127 => 36,  124 => 34,  118 => 32,  112 => 30,  109 => 29,  106 => 27,  100 => 25,  97 => 24,  86 => 22,  81 => 21,  74 => 19,  71 => 18,  65 => 16,  63 => 15,  59 => 14,  54 => 13,  51 => 12,  47 => 10,  45 => 9,  37 => 4,  25 => 3,  21 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html*/
/*   class="controller-{{ controller_name }} action-{{ action_name }}{% if controller_name in ['order', 'adblock'] %} responsive{% endif %}{% if controller_name in ['index'] or (controller_name in ['replay_tv'] and action_name not in ['replay']) %} responsive-inverse{% endif %} naked-theme"*/
/*   lang="{{ locale|replace({'_': '-'})|lower }}"*/
/* >*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
/*     {% if controller_name in ['order'] %}*/
/*     <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">*/
/*     {% endif %}*/
/*     {% include "partials/dns-prefetch.twig" %}*/
/*     <title>{{ head.meta.title|default('Play TV') }}</title>*/
/*     <meta name="description" content="{{ head.meta.description|truncate(200, false)|default("La télévision gratuite en direct et les programmes TV en replay sur internet.") }}">*/
/*     {% if head.meta.keywords and head.meta.keywords|length > 0 %}*/
/*     <meta name="keywords" content="{{ head.meta.keywords|join(',')|lower|truncate(800, false) }}">*/
/*     {% endif %}*/
/*     {% if canonical_url %}*/
/*     <link rel="canonical" href="{{ hosts.current_full }}{{ canonical_url }}">*/
/*     {% endif %}*/
/*     {% for hreflang,href in head.alternate_urls %}*/
/*     <link rel="alternate" href="{{ href }}" hreflang="{{ hreflang|replace({'_': '-'})|lower }}">*/
/*     {% endfor %}*/
/*     {% if head.robots is defined %}*/
/*     <meta name="robots" content="{{ head.robots }}">*/
/*     {% endif %}*/
/* */
/*     {# STYLES #}*/
/*     {% if not is_website_fr %}*/
/*     <link rel="stylesheet" type="text/css" href="{{ assets.styles['main-i18n.css'] }}">*/
/*     {% else %}*/
/*     <link rel="stylesheet" type="text/css" href="{{ assets.styles['main.css'] }}">*/
/*     {% endif %}*/
/*     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">*/
/*     {# SCRIPTS #}*/
/*     {% include "partials/gdpr-banner.twig" %}*/
/*     <script src="{{ assets.scripts['app-first.js'] }}"></script>*/
/*     {# TRACKING #}*/
/*     {% include "partials/tracking-google-analytics.twig" %}*/
/*     {# OPENGRAPH and RICH SNIPPETS #}*/
/*     {% include "partials/opengraph.twig" %}*/
/*     {% include "partials/rich-snippets-google-sitelinks-search-box.twig" %}*/
/*     {% include "partials/structured-data-google-knowledge-graph.twig" %}*/
/*     {# FAVICONS #}*/
/*     {% include "partials/favicons.twig" %}*/
/*   </head>*/
/*   <body itemscope itemtype="http://schema.org/WebPage" data-features="">*/
/*     {% include "partials/svg-symbols.twig" %}*/
/*     {% if skin != 'minimal' %}*/
/*     <div class="pmd-FluidHeader">*/
/*       <div class="ptv-Notifier ptv-js-OldBrowserNotifier"></div>*/
/*       {% include 'partials/notifier-website.twig' %}*/
/*       {% include "partials/header.twig" %}*/
/*       <div class="ptv-Notifier ptv-js-Notifier"></div>*/
/*       {% block fluidheader %}{% endblock %}*/
/*     </div>*/
/*     <div id="page">*/
/*     {% endif %}*/
/* */
/*       {% block content %}{% endblock %}*/
/* */
/*     {% if skin != 'minimal' %}*/
/*     </div>*/
/*     {% include "partials/footer.twig" %}*/
/*     {% endif %}*/
/* */
/*   {% if*/
/*     (controller_name not in ['url'])*/
/*   %}*/
/*     {#*/
/*     <div style="display: none">*/
/*       {% include "partials/sales-crowdfunding-popin.twig" %}*/
/*     </div>*/
/*     #}*/
/*     <script>*/
/*       (function(win, doc, app) {*/
/*         app.Data = app.Data || {};*/
/*       })(window, window.document, window.pmd || (window.pmd = {}));*/
/*     </script>*/
/*     <script src="{{ assets.scripts['app-main.js'] }}"></script>*/
/*     {% include "partials/ppl.twig" %}*/
/*     {# add js bundle if exists #}*/
/*     {% if assets.scripts['bundle-'~bundle_name|replace({'_':'-'})~'.js'] is defined %}*/
/*       <script src="{{ assets.scripts['bundle-'~bundle_name|replace({'_':'-'})~'.js'] }}"></script>*/
/*     {% endif %}*/
/*     {# add js page if exists #}*/
/*     {% if assets.scripts['page-'~route_name|replace({'_':'-'})~'.js'] is defined %}*/
/*       <script src="{{ assets.scripts['page-'~route_name|replace({'_':'-'})~'.js'] }}"></script>*/
/*     {% endif %}*/
/* */
/*     <script>*/
/*       $(document).ready(function() {*/
/*         {% if request.get['popin_login'] is defined and is_connected == false %}*/
/*         ptv.Events.Main.trigger('flow:login');*/
/*         {% endif %}*/
/*         {% if request.get['popin_register'] is defined %}*/
/*         ptv.Events.Main.trigger('flow:register');*/
/*         {% endif %}*/
/*         {% if request.get['popin_forgot_password'] is defined %}*/
/*         ptv.Events.Main.trigger('flow:forgotPassword');*/
/*         {% endif %}*/
/*         {% if request.get['popin_crowdfunding'] is defined %}*/
/*         ptv.Events.Main.trigger('flow:crowdfunding');*/
/*         {% endif %}*/
/*       })*/
/*     </script>*/
/*   {% endif %}*/
/* */
/*     {# THIRD PARTIES #}*/
/*     {% include "partials/sdk-paymill.twig" %}*/
/*     {% include "partials/sdk-facebook.twig" %}*/
/*     {% include "partials/quantcast-pixel.twig" %}*/
/*     {# {% include "partials/bottombar-social.twig" %} #}*/
/*     {# {% include "partials/bottombar-crowdfunding.twig" %} #}*/
/*     {# ADS (not only skin) #}*/
/*     {% include "partials/ads-skin.twig" %}*/
/*     {% include "partials/sdk-livereload.twig" %}*/
/*   </body>*/
/* </html>*/
/* */
