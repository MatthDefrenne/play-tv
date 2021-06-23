<?php

/* layouts/mobile.twig */
class __TwigTemplate_c90bf7aa3eafbeae2cce51b46823032cf269c82aff2f8dbe920c9174073bd355 extends Twig_Template
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
        echo "<!doctype html>
<html class=\"controller-";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo " action-";
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")), "html", null, true);
        echo "\" lang=\"";
        echo twig_escape_filter($this->env, twig_lower_filter($this->env, twig_replace_filter((isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), array("_" => "-"))), "html", null, true);
        echo "\">
  <head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    ";
        // line 6
        $this->loadTemplate("partials/dns-prefetch.twig", "layouts/mobile.twig", 6)->display($context);
        // line 7
        echo "    <title>";
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "meta", array(), "any", false, true), "title", array()), "Play TV")) : ("Play TV")), "html", null, true);
        echo "</title>
    <meta name=\"description\" content=\"";
        // line 8
        echo twig_escape_filter($this->env, _twig_default_filter(twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "description", array()), 200, false), "La télévision gratuite en direct et les programmes TV en replay sur internet."), "html", null, true);
        echo "\">
    ";
        // line 9
        if (($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()) && (twig_length_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array())) > 0))) {
            // line 10
            echo "    <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, twig_truncate_filter($this->env, twig_lower_filter($this->env, twig_join_filter($this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "keywords", array()), ",")), 800, false), "html", null, true);
            echo "\">
    ";
        }
        // line 12
        echo "    ";
        if ((isset($context["canonical_url"]) ? $context["canonical_url"] : $this->getContext($context, "canonical_url"))) {
            // line 13
            echo "    <link rel=\"canonical\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
            echo twig_escape_filter($this->env, (isset($context["canonical_url"]) ? $context["canonical_url"] : $this->getContext($context, "canonical_url")), "html", null, true);
            echo "\">
    ";
        }
        // line 15
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "alternate_urls", array()));
        foreach ($context['_seq'] as $context["hreflang"] => $context["href"]) {
            // line 16
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
        // line 18
        echo "    ";
        if ($this->getAttribute((isset($context["head"]) ? $context["head"] : null), "robots", array(), "any", true, true)) {
            // line 19
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "robots", array()), "html", null, true);
            echo "\">
    ";
        }
        // line 21
        echo "    <meta name=\"viewport\" content=\"user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1\">
    <meta name=\"inmobi-site-verification\" content=\"1a409066317433fc2635ff6534ca082a\">
    ";
        // line 24
        echo "    <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "styles", array()), "main-mobile.css", array(), "array"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700\">
    ";
        // line 27
        echo "    ";
        $this->loadTemplate("partials/gdpr-banner.twig", "layouts/mobile.twig", 27)->display($context);
        // line 28
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-first-mobile.js", array(), "array"), "html", null, true);
        echo "\"></script>
    ";
        // line 30
        echo "    ";
        $this->loadTemplate("partials/tracking-google-analytics.twig", "layouts/mobile.twig", 30)->display($context);
        // line 31
        echo "    ";
        // line 32
        echo "    ";
        $this->loadTemplate("partials/opengraph.twig", "layouts/mobile.twig", 32)->display($context);
        // line 33
        echo "    ";
        $this->loadTemplate("partials/rich-snippets-google-sitelinks-search-box.twig", "layouts/mobile.twig", 33)->display($context);
        // line 34
        echo "    ";
        $this->loadTemplate("partials/structured-data-google-knowledge-graph.twig", "layouts/mobile.twig", 34)->display($context);
        // line 35
        echo "    ";
        // line 36
        echo "    ";
        $this->loadTemplate("partials/favicons.twig", "layouts/mobile.twig", 36)->display($context);
        // line 37
        echo "  </head>
  <body itemscope itemtype=\"http://schema.org/WebPage\">
    ";
        // line 39
        $this->loadTemplate("partials/svg-symbols.twig", "layouts/mobile.twig", 39)->display($context);
        // line 40
        echo "    <div class=\"pmd-BigDaddy
      ";
        // line 41
        if (((((        // line 42
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))) && !twig_in_filter(        // line 43
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "account", 1 => "bouncer", 2 => "adblock", 3 => "oauth", 4 => "order", 5 => "pages", 6 => "sales", 7 => "trailer", 8 => "url", 9 => "errors"))) &&         // line 44
(isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr")))) {
            // line 45
            echo " pmd-BigDaddy--adsGoogleAnchor";
        }
        echo "\">
    ";
        // line 49
        echo "      ";
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "minimal")) {
            // line 50
            echo "      <aside class=\"pmd-js-Menu pmd-Menu\">
        ";
            // line 51
            $this->loadTemplate("partials/nav_mobile.twig", "layouts/mobile.twig", 51)->display($context);
            // line 52
            echo "        ";
            $this->loadTemplate("partials/footer_mobile.twig", "layouts/mobile.twig", 52)->display($context);
            // line 53
            echo "      </aside>
      ";
        }
        // line 55
        echo "      <div class=\"pmd-js-MainContainer pmd-MainContainer\">
        ";
        // line 56
        if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "minimal")) {
            // line 57
            echo "        <header class=\"pmd-js-Header pmd-Header\">
          ";
            // line 58
            $this->loadTemplate("partials/header_mobile.twig", "layouts/mobile.twig", 58)->display($context);
            // line 59
            echo "          ";
            $this->displayBlock('fluidheader', $context, $blocks);
            // line 60
            echo "        </header>
        ";
        }
        // line 62
        echo "        <div class=\"pmd-js-Wrapper pmd-Wrapper\">
          <section class=\"pmd-js-Content pmd-Content\">
            ";
        // line 64
        $this->loadTemplate("partials/notifier-website.twig", "layouts/mobile.twig", 64)->display($context);
        // line 65
        echo "            ";
        $this->displayBlock('content', $context, $blocks);
        // line 66
        echo "          </section>
        </div>
        ";
        // line 71
        echo "      </div>
      <div class=\"pmd-js-MenuOverlay pmd-MenuOverlay\">
        ";
        // line 73
        if ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected"))) {
            // line 74
            echo "        <div class=\"pmd-MenuOverlay-choices\">
          <a href=\"/mon-compte/profil/\" class=\"pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice\">Mes informations</a>
          <a href=\"/mon-compte/abonnements/\" class=\"pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice\">Mes abonnements</a>
          <a href=\"/mon-compte/notifications/\" class=\"pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice\">Mes notifications</a>
          ";
            // line 78
            if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasPaymill", array())) {
                echo "<a href=\"/mon-compte/coordonnees-bancaires/\" class=\"pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice\">Mon moyen de paiement</a>";
            }
            // line 79
            echo "          <a href=\"/deconnexion/\" class=\"pmd-js-MenuOverlay-logout pmd-Button pmd-Button--block pmd-Button--warning pmd-MenuOverlay-choice\">Se déconnecter</a>
        </div>
        ";
        }
        // line 82
        echo "      </div>
    </div>

    ";
        // line 86
        echo "    ";
        if (!twig_in_filter(        // line 87
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "url"))) {
            // line 89
            echo "      ";
            $this->loadTemplate("partials/ppl.twig", "layouts/mobile.twig", 89)->display($context);
            // line 90
            echo "      ";
            // line 95
            echo "      <script>
        (function(win, doc, app) {
          app.Data = app.Data || {};
        })(window, window.document, window.pmd || (window.pmd = {}));
      </script>
      <script src=\"";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-main-mobile.js", array(), "array"), "html", null, true);
            echo "\"></script>
      ";
            // line 102
            echo "      ";
            if ($this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "scripts", array(), "any", false, true), (("bundle-" . twig_replace_filter((isset($context["bundle_name"]) ? $context["bundle_name"] : $this->getContext($context, "bundle_name")), array("_" => "-"))) . "-mobile.js"), array(), "array", true, true)) {
                // line 103
                echo "        <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), (("bundle-" . twig_replace_filter((isset($context["bundle_name"]) ? $context["bundle_name"] : $this->getContext($context, "bundle_name")), array("_" => "-"))) . "-mobile.js"), array(), "array"), "html", null, true);
                echo "\"></script>
      ";
            }
            // line 105
            echo "      ";
            // line 106
            echo "      ";
            if ($this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : null), "scripts", array(), "any", false, true), (("page-" . twig_replace_filter((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), array("_" => "-"))) . "-mobile.js"), array(), "array", true, true)) {
                // line 107
                echo "        <script src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), (("page-" . twig_replace_filter((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), array("_" => "-"))) . "-mobile.js"), array(), "array"), "html", null, true);
                echo "\"></script>
      ";
            }
            // line 109
            echo "    ";
        }
        // line 110
        echo "
    ";
        // line 112
        echo "    ";
        $this->loadTemplate("partials/sdk-paymill.twig", "layouts/mobile.twig", 112)->display($context);
        // line 113
        echo "    ";
        $this->loadTemplate("partials/sdk-facebook.twig", "layouts/mobile.twig", 113)->display($context);
        // line 114
        echo "    ";
        $this->loadTemplate("partials/quantcast-pixel.twig", "layouts/mobile.twig", 114)->display($context);
        // line 115
        echo "    ";
        // line 116
        echo "    ";
        $this->loadTemplate("partials/ads-banner_mobile.twig", "layouts/mobile.twig", 116)->display($context);
        // line 117
        echo "    ";
        $this->loadTemplate("partials/ads-skin_mobile.twig", "layouts/mobile.twig", 117)->display($context);
        // line 118
        echo "    ";
        $this->loadTemplate("partials/sdk-livereload.twig", "layouts/mobile.twig", 118)->display($context);
        // line 119
        echo "  </body>
</html>
";
    }

    // line 59
    public function block_fluidheader($context, array $blocks = array())
    {
    }

    // line 65
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "layouts/mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  293 => 65,  288 => 59,  282 => 119,  279 => 118,  276 => 117,  273 => 116,  271 => 115,  268 => 114,  265 => 113,  262 => 112,  259 => 110,  256 => 109,  250 => 107,  247 => 106,  245 => 105,  239 => 103,  236 => 102,  232 => 100,  225 => 95,  223 => 90,  220 => 89,  218 => 87,  216 => 86,  211 => 82,  206 => 79,  202 => 78,  196 => 74,  194 => 73,  190 => 71,  186 => 66,  183 => 65,  181 => 64,  177 => 62,  173 => 60,  170 => 59,  168 => 58,  165 => 57,  163 => 56,  160 => 55,  156 => 53,  153 => 52,  151 => 51,  148 => 50,  145 => 49,  140 => 45,  138 => 44,  137 => 43,  136 => 42,  135 => 41,  132 => 40,  130 => 39,  126 => 37,  123 => 36,  121 => 35,  118 => 34,  115 => 33,  112 => 32,  110 => 31,  107 => 30,  102 => 28,  99 => 27,  93 => 24,  89 => 21,  83 => 19,  80 => 18,  69 => 16,  64 => 15,  57 => 13,  54 => 12,  48 => 10,  46 => 9,  42 => 8,  37 => 7,  35 => 6,  24 => 2,  21 => 1,);
    }
}
/* <!doctype html>*/
/* <html class="controller-{{ controller_name }} action-{{ action_name }}" lang="{{ locale|replace({'_': '-'})|lower }}">*/
/*   <head>*/
/*     <meta charset="utf-8">*/
/*     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">*/
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
/*     <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">*/
/*     <meta name="inmobi-site-verification" content="1a409066317433fc2635ff6534ca082a">*/
/*     {# STYLES #}*/
/*     <link rel="stylesheet" type="text/css" href="{{ assets.styles['main-mobile.css'] }}">*/
/*     <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">*/
/*     {# SCRIPTS #}*/
/*     {% include "partials/gdpr-banner.twig" %}*/
/*     <script src="{{ assets.scripts['app-first-mobile.js'] }}"></script>*/
/*     {# TRACKING #}*/
/*     {% include "partials/tracking-google-analytics.twig" %}*/
/*     {# OPENGRAPH and RICH SNIPPETS #}*/
/*     {% include "partials/opengraph.twig" %}*/
/*     {% include "partials/rich-snippets-google-sitelinks-search-box.twig" %}*/
/*     {% include "partials/structured-data-google-knowledge-graph.twig" %}*/
/*     {# FAVICONS #}*/
/*     {% include "partials/favicons.twig" %}*/
/*   </head>*/
/*   <body itemscope itemtype="http://schema.org/WebPage">*/
/*     {% include "partials/svg-symbols.twig" %}*/
/*     <div class="pmd-BigDaddy*/
/*       {% if*/
/*       (is_connected == false or (is_connected and current_account.isPremium() == false)) and*/
/*       (controller_name not in ['account', 'bouncer', 'adblock', 'oauth', 'order', 'pages', 'sales', 'trailer', 'url', 'errors']) and*/
/*       is_website_fr*/
/*       %} pmd-BigDaddy--adsGoogleAnchor{% endif %}">*/
/*     {#*/
/*     <div class="pmd-BigDaddy">*/
/*       #}*/
/*       {% if skin != 'minimal' %}*/
/*       <aside class="pmd-js-Menu pmd-Menu">*/
/*         {% include "partials/nav_mobile.twig" %}*/
/*         {% include "partials/footer_mobile.twig" %}*/
/*       </aside>*/
/*       {% endif %}*/
/*       <div class="pmd-js-MainContainer pmd-MainContainer">*/
/*         {% if skin != 'minimal' %}*/
/*         <header class="pmd-js-Header pmd-Header">*/
/*           {% include "partials/header_mobile.twig" %}*/
/*           {% block fluidheader %}{% endblock %}*/
/*         </header>*/
/*         {% endif %}*/
/*         <div class="pmd-js-Wrapper pmd-Wrapper">*/
/*           <section class="pmd-js-Content pmd-Content">*/
/*             {% include 'partials/notifier-website.twig' %}*/
/*             {% block content %}{% endblock %}*/
/*           </section>*/
/*         </div>*/
/*         {#*/
/*         <div class="pmd-js-Loader"></div>*/
/*         #}*/
/*       </div>*/
/*       <div class="pmd-js-MenuOverlay pmd-MenuOverlay">*/
/*         {% if is_connected %}*/
/*         <div class="pmd-MenuOverlay-choices">*/
/*           <a href="/mon-compte/profil/" class="pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice">Mes informations</a>*/
/*           <a href="/mon-compte/abonnements/" class="pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice">Mes abonnements</a>*/
/*           <a href="/mon-compte/notifications/" class="pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice">Mes notifications</a>*/
/*           {% if current_account.hasPaymill %}<a href="/mon-compte/coordonnees-bancaires/" class="pmd-js-MenuOverlay-profile pmd-Button pmd-Button--block pmd-Button--white pmd-MenuOverlay-choice">Mon moyen de paiement</a>{% endif %}*/
/*           <a href="/deconnexion/" class="pmd-js-MenuOverlay-logout pmd-Button pmd-Button--block pmd-Button--warning pmd-MenuOverlay-choice">Se déconnecter</a>*/
/*         </div>*/
/*         {% endif %}*/
/*       </div>*/
/*     </div>*/
/* */
/*     {# PMD #}*/
/*     {% if*/
/*       (controller_name not in ['url'])*/
/*     %}*/
/*       {% include "partials/ppl.twig" %}*/
/*       {#*/
/*       <div style="display: none">*/
/*         {% include "partials/sales-crowdfunding-popin.twig" %}*/
/*       </div>*/
/*       #}*/
/*       <script>*/
/*         (function(win, doc, app) {*/
/*           app.Data = app.Data || {};*/
/*         })(window, window.document, window.pmd || (window.pmd = {}));*/
/*       </script>*/
/*       <script src="{{ assets.scripts['app-main-mobile.js'] }}"></script>*/
/*       {# add js bundle if exists #}*/
/*       {% if assets.scripts['bundle-'~bundle_name|replace({'_':'-'})~'-mobile.js'] is defined %}*/
/*         <script src="{{ assets.scripts['bundle-'~bundle_name|replace({'_':'-'})~'-mobile.js'] }}"></script>*/
/*       {% endif %}*/
/*       {# add js page if exists #}*/
/*       {% if assets.scripts['page-'~route_name|replace({'_':'-'})~'-mobile.js'] is defined %}*/
/*         <script src="{{ assets.scripts['page-'~route_name|replace({'_':'-'})~'-mobile.js'] }}"></script>*/
/*       {% endif %}*/
/*     {% endif %}*/
/* */
/*     {# THIRD PARTIES #}*/
/*     {% include "partials/sdk-paymill.twig" %}*/
/*     {% include "partials/sdk-facebook.twig" %}*/
/*     {% include "partials/quantcast-pixel.twig" %}*/
/*     {# ADS (not only skin) #}*/
/*     {% include "partials/ads-banner_mobile.twig" %}*/
/*     {% include "partials/ads-skin_mobile.twig" %}*/
/*     {% include "partials/sdk-livereload.twig" %}*/
/*   </body>*/
/* </html>*/
/* */
