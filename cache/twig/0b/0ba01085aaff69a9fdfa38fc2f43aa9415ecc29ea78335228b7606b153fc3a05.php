<?php

/* controllers/television/_remote.twig */
class __TwigTemplate_fe19ea066327523ce7413bc9c3e6eeba6c43b328b7d260cf1fc9749f3d32e021 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"pmd-Remote ptv-js-RemoteControl\">

  <div class=\"pmd-RemoteMenu\">

    ";
        // line 5
        ob_start();
        // line 6
        echo "      <ul class=\"pmd-RemoteMenu-list\">
        <li class=\"pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator\">
          <a href=\"";
        // line 8
        echo $this->env->getExtension('routing')->getPath("television_index");
        echo "\" class=\"ptv-js-RemoteMenu-home pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-RemoteMenu-button--active pmd-SvgEvent\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("All TV channels", array(), "messages");
        echo "\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--mosaic\">
              <use xlink:href=\"#pmd-Svg--mosaic\"></use>
            </svg>
            <span class=\"pmd-SvgEvent-handler\"></span>
          </a>
        </li>
        <li class=\"pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator\">
          <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("television_streamable_filter");
        echo "\" class=\"ptv-js-RemoteMenu-streamable pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV channels available on Play TV", array(), "messages");
        echo "\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--play\">
              <use xlink:href=\"#pmd-Svg--play\"></use>
            </svg>
            <span class=\"pmd-SvgEvent-handler\"></span>
          </a>
        </li>
        ";
        // line 23
        if ($this->env->getExtension('playtv_feature')->hasFeature("sales")) {
            // line 24
            echo "        <li class=\"pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator\">
          <a href=\"";
            // line 25
            echo $this->env->getExtension('routing')->getPath("television_subscribe_filter");
            echo "\" class=\"ptv-js-RemoteMenu-pack pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent\" title=\"Mes Chaînes TV\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--cart\">
              <use xlink:href=\"#pmd-Svg--cart\"></use>
            </svg>
            <span class=\"pmd-SvgEvent-handler\"></span>
          </a>
        </li>
        ";
        }
        // line 33
        echo "        ";
        if ( !(isset($context["is_website_uk"]) ? $context["is_website_uk"] : $this->getContext($context, "is_website_uk"))) {
            // line 34
            echo "        <li class=\"pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator\">
          <button type=\"button\" class=\"ptv-js-RemoteMenu-world pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent\" title=\"";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Filter by country", array(), "messages");
            echo "\">
            <span class=\"ptv-js-RemoteMenu-flag\"></span>
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--country\">
              <use xlink:href=\"#pmd-Svg--country\"></use>
            </svg>
            <span class=\"pmd-SvgEvent-handler\"></span>
          </button>
        </li>
        ";
        }
        // line 44
        echo "        <li class=\"pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--search\">
          <input type=\"text\" name=\"\" class=\"pmd-Input pmd-Input--reset pmd-RemoteMenu-searchInput ptv-js-RemoteMenu-search\" placeholder=\"";
        // line 45
        echo $this->env->getExtension('translator')->getTranslator()->trans("Search a channel", array(), "messages");
        echo "\">
        </li>
      </ul>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 49
        echo "
  </div>

  <div class=\"pmd-RemoteContent\">
    ";
        // line 53
        echo (isset($context["mosaic"]) ? $context["mosaic"] : $this->getContext($context, "mosaic"));
        echo "
  </div>

</div>

<script type=\"text/javascript\">
    ;(function(win, doc, app) {
        app.Data = app.Data || {};
        app.Data.Remote = app.Data.Remote || {};
        app.Data.Remote.lang = \"";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")), "html", null, true);
        echo "\";

        ";
        // line 64
        $context["whitelist"] = array(0 => "id", 1 => "name", 2 => "alias", 3 => "has_programs", 4 => "images", 5 => "has_social_tv", 6 => "disabled", 7 => "skip_ads", 8 => "highlight", 9 => "streaming_source", 10 => "is_adult", 11 => "streaming_spec", 12 => "is_radio");
        // line 65
        echo "        ";
        if (array_key_exists("channel", $context)) {
            // line 66
            echo "          app.Data.Remote.channel = ";
            echo twig_jsonencode_filter($this->env->getExtension('Playtv')->channelsWhitelist((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), (isset($context["whitelist"]) ? $context["whitelist"] : $this->getContext($context, "whitelist")), false));
            echo ";
        ";
        } else {
            // line 68
            echo "          app.Data.Remote.channel = undefined;
        ";
        }
        // line 70
        echo "
        ";
        // line 71
        if (array_key_exists("country_filter", $context)) {
            // line 72
            echo "          app.Data.Remote.filter = {
            type: \"country\",
            params: {
              country: \"";
            // line 75
            echo twig_escape_filter($this->env, ((array_key_exists("country_filter", $context)) ? (_twig_default_filter((isset($context["country_filter"]) ? $context["country_filter"] : $this->getContext($context, "country_filter")), "fr")) : ("fr")), "html", null, true);
            echo "\"
            }
          };
        ";
        }
        // line 79
        echo "        ";
        if (array_key_exists("my_channels_filter", $context)) {
            // line 80
            echo "          app.Data.Remote.filter = {
            type: \"pack\"
          };
        ";
        }
        // line 84
        echo "        ";
        if (array_key_exists("streamable_filter", $context)) {
            // line 85
            echo "          app.Data.Remote.filter = {
            type: \"streamable\"
          };
        ";
        }
        // line 89
        echo "    })(window, window.document, window.ptv || (window.ptv = {}));
</script>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/_remote.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  173 => 89,  167 => 85,  164 => 84,  158 => 80,  155 => 79,  148 => 75,  143 => 72,  141 => 71,  138 => 70,  134 => 68,  128 => 66,  125 => 65,  123 => 64,  118 => 62,  106 => 53,  100 => 49,  93 => 45,  90 => 44,  78 => 35,  75 => 34,  72 => 33,  61 => 25,  58 => 24,  56 => 23,  44 => 16,  31 => 8,  27 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="pmd-Remote ptv-js-RemoteControl">*/
/* */
/*   <div class="pmd-RemoteMenu">*/
/* */
/*     {% spaceless %}*/
/*       <ul class="pmd-RemoteMenu-list">*/
/*         <li class="pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator">*/
/*           <a href="{{ path('television_index') }}" class="ptv-js-RemoteMenu-home pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-RemoteMenu-button--active pmd-SvgEvent" title="{% trans %}All TV channels{% endtrans %}">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--mosaic">*/
/*               <use xlink:href="#pmd-Svg--mosaic"></use>*/
/*             </svg>*/
/*             <span class="pmd-SvgEvent-handler"></span>*/
/*           </a>*/
/*         </li>*/
/*         <li class="pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator">*/
/*           <a href="{{ path('television_streamable_filter') }}" class="ptv-js-RemoteMenu-streamable pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent" title="{% trans %}TV channels available on Play TV{% endtrans %}">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--play">*/
/*               <use xlink:href="#pmd-Svg--play"></use>*/
/*             </svg>*/
/*             <span class="pmd-SvgEvent-handler"></span>*/
/*           </a>*/
/*         </li>*/
/*         {% if has_feature('sales') %}*/
/*         <li class="pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator">*/
/*           <a href="{{ path('television_subscribe_filter') }}" class="ptv-js-RemoteMenu-pack pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent" title="Mes Chaînes TV">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--cart">*/
/*               <use xlink:href="#pmd-Svg--cart"></use>*/
/*             </svg>*/
/*             <span class="pmd-SvgEvent-handler"></span>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*         {% if not is_website_uk %}*/
/*         <li class="pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--separator">*/
/*           <button type="button" class="ptv-js-RemoteMenu-world pmd-Button pmd-Button--reset pmd-RemoteMenu-button pmd-SvgEvent" title="{% trans %}Filter by country{% endtrans %}">*/
/*             <span class="ptv-js-RemoteMenu-flag"></span>*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--country">*/
/*               <use xlink:href="#pmd-Svg--country"></use>*/
/*             </svg>*/
/*             <span class="pmd-SvgEvent-handler"></span>*/
/*           </button>*/
/*         </li>*/
/*         {% endif %}*/
/*         <li class="pmd-RemoteMenu-listItem pmd-RemoteMenu-listItem--search">*/
/*           <input type="text" name="" class="pmd-Input pmd-Input--reset pmd-RemoteMenu-searchInput ptv-js-RemoteMenu-search" placeholder="{% trans %}Search a channel{% endtrans %}">*/
/*         </li>*/
/*       </ul>*/
/*     {% endspaceless %}*/
/* */
/*   </div>*/
/* */
/*   <div class="pmd-RemoteContent">*/
/*     {{ mosaic|raw }}*/
/*   </div>*/
/* */
/* </div>*/
/* */
/* <script type="text/javascript">*/
/*     ;(function(win, doc, app) {*/
/*         app.Data = app.Data || {};*/
/*         app.Data.Remote = app.Data.Remote || {};*/
/*         app.Data.Remote.lang = "{{ locale }}";*/
/* */
/*         {% set whitelist = ["id", "name", "alias", "has_programs", "images", "has_social_tv", "disabled", "skip_ads", "highlight", "streaming_source", "is_adult", "streaming_spec", "is_radio"] %}*/
/*         {% if channel is defined %}*/
/*           app.Data.Remote.channel = {{ channels_whitelist(channel, whitelist, false)|json_encode()|raw }};*/
/*         {% else %}*/
/*           app.Data.Remote.channel = undefined;*/
/*         {% endif %}*/
/* */
/*         {% if country_filter is defined %}*/
/*           app.Data.Remote.filter = {*/
/*             type: "country",*/
/*             params: {*/
/*               country: "{{ country_filter|default('fr') }}"*/
/*             }*/
/*           };*/
/*         {% endif %}*/
/*         {% if my_channels_filter is defined %}*/
/*           app.Data.Remote.filter = {*/
/*             type: "pack"*/
/*           };*/
/*         {% endif %}*/
/*         {% if streamable_filter is defined %}*/
/*           app.Data.Remote.filter = {*/
/*             type: "streamable"*/
/*           };*/
/*         {% endif %}*/
/*     })(window, window.document, window.ptv || (window.ptv = {}));*/
/* </script>*/
/* */
