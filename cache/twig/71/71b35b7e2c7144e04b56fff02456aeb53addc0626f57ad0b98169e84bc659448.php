<?php

/* controllers/widgets/mosaic.twig */
class __TwigTemplate_9dc14ad0955b7c238f102a4bd758c0dc0135a427fed663241076c0f972b74cef extends Twig_Template
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
        // line 5
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "homepage")) {
            // line 6
            echo "
    ";
            // line 7
            $context["vars"] = array("data_attributes" => array("tooltip" => "true"), "channels" =>             // line 11
(isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")), "channel" => array("title" => "television_channel_single.title", "domain" => "seo"), "link_route_name" => "television_channel_single");
            // line 18
            echo "
    <div class=\"pmd-PatchworkWrapper\">
      ";
            // line 20
            $this->loadTemplate("partials/patchwork.twig", "controllers/widgets/mosaic.twig", 20)->display(array_merge($context, (isset($context["vars"]) ? $context["vars"] : $this->getContext($context, "vars"))));
            // line 21
            echo "    </div>

";
            // line 27
            echo "
";
        } elseif ((        // line 28
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "social_tv")) {
            // line 29
            echo "
";
            // line 30
            $context["vars"] = array("data_attributes" => array("tooltip" => "true"), "channels" =>             // line 35
(isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")), "channel" => array("title" => "Social TV suivez le Live Tweet %channel%"), "link_route_name" => "live_tweets_channel");
            // line 42
            echo "
<div class=\"pmd-js-LivetweetFilter pmd-PatchworkWrapper\">
  ";
            // line 44
            $this->loadTemplate("partials/patchwork.twig", "controllers/widgets/mosaic.twig", 44)->display(array_merge($context, (isset($context["vars"]) ? $context["vars"] : $this->getContext($context, "vars"))));
            // line 45
            echo "</div>

";
            // line 51
            echo "
";
        } elseif ((        // line 52
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "live")) {
            // line 53
            echo "
";
            // line 54
            ob_start();
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
            foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                // line 56
                echo "<a class=\"channel-button channel-button-mini\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["channel_item"], "id", array()), "channel_alias" => $this->getAttribute($context["channel_item"], "alias", array()))), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                echo "\">
  <span>";
                // line 57
                echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute($context["channel_item"], "name", array())), "messages");
                echo "</span>
  <img src=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel_item"], "images", array()), "mini", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                echo "\" width=\"36px\" height=\"36px\">
  <div class=\"cache\"></div>
</a>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 63
            echo "
";
            // line 68
            echo "
";
        } elseif ((        // line 69
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "categories")) {
            // line 70
            echo "
<div class=\"row fluid\">
  ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
            foreach ($context['_seq'] as $context["key"] => $context["category_channels"]) {
                // line 73
                echo "  <div class=\"span\" style=\"width:389px;\">
    <div class=\"grey-box margin text\">
      <h2 class=\"margin\">";
                // line 75
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "</h2>
      ";
                // line 76
                ob_start();
                // line 77
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["category_channels"]);
                foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                    // line 78
                    echo "      <a class=\"channel-button channel-button-mini\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["channel_item"], "id", array()), "channel_alias" => $this->getAttribute($context["channel_item"], "alias", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                    echo "\">
        <span>Regarder ";
                    // line 79
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                    echo " en direct</span>
        <img src=\"";
                    // line 80
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel_item"], "images", array()), "mini", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                    echo "\" width=\"36px\" height=\"36px\">
        <div class=\"cache\"></div>
      </a>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 84
                echo "      ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 85
                echo "    </div>
  </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['category_channels'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "</div>

";
            // line 94
            echo "
";
        } elseif ((        // line 95
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "themes")) {
            // line 96
            echo "
<div class=\"row fluid\">
  ";
            // line 98
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
            foreach ($context['_seq'] as $context["key"] => $context["theme_channels"]) {
                // line 99
                echo "  <div class=\"span\" style=\"width:389px;\">
    <div class=\"grey-box margin text\">
      <h2 class=\"margin\">";
                // line 101
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "</h2>
        ";
                // line 102
                ob_start();
                // line 103
                echo "        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["theme_channels"]);
                foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                    // line 104
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["channel"], "id", array()), "channel_alias" => $this->getAttribute($context["channel"], "alias", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                    echo "\" class=\"channel-button channel-button-mini\">
          <span>Regarder ";
                    // line 105
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                    echo " en direct</span>
          <img src=\"";
                    // line 106
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel"], "images", array()), "mini", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                    echo "\" width=\"36px\" height=\"36px\">
          <div class=\"cache\"></div>
        </a>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 110
                echo "        ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 111
                echo "    </div>
  </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['theme_channels'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "</div>

";
            // line 120
            echo "
";
        } elseif ((        // line 121
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "replay_tv")) {
            // line 122
            echo "
  ";
            // line 123
            ob_start();
            // line 124
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
            foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                // line 125
                echo "      <a class=\"channel-button channel-button-mini\" href=\"/replay-tv/videos/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "alias", array()), "html", null, true);
                echo "/\" title=\"Revoir ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                echo " en replay (";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "replay_count", array()), "html", null, true);
                echo " vidéos)\">
        <span>";
                // line 126
                echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up videos from %channel%", array("%channel%" => $this->getAttribute($context["channel"], "name", array())), "messages");
                echo "</span>
        <img src=\"";
                // line 127
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel"], "images", array()), "mini", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
                echo "\" width=\"36px\" height=\"36px\">
        <div class=\"cache\"></div>
      </a>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 131
            echo "  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 132
            echo "
";
            // line 137
            echo "
";
        } elseif ((        // line 138
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "replay_tv_page")) {
            // line 139
            echo "
";
            // line 140
            $context["vars"] = array("channels" =>             // line 141
(isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")), "channel" => array("title" => "replay_videos:channel.title", "domain" => "seo"), "link_route_name" => "replay_channel_videos");
            // line 149
            echo "
<div class=\"pmd-js-ReplayTvFilter pmd-PatchworkWrapper\" data-main-url=\"";
            // line 150
            echo $this->env->getExtension('routing')->getPath("replay_videos");
            echo "\">
  ";
            // line 151
            $this->loadTemplate("partials/patchwork.twig", "controllers/widgets/mosaic.twig", 151)->display(array_merge($context, (isset($context["vars"]) ? $context["vars"] : $this->getContext($context, "vars"))));
            // line 152
            echo "</div>

";
            // line 158
            echo "
";
        } else {
            // line 160
            echo "  ";
            ob_start();
            // line 161
            echo "    <div class=\"ptv-js-MosaicContent pmd-MosaicContent\">
      <div class=\"container pmd-MosaicChannels-container\" id=\"mosaic-channels\">
        ";
            // line 163
            ob_start();
            // line 164
            echo "        ";
            $context["counter"] = 1;
            // line 165
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                // line 166
                echo "          ";
                if (((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) == 1)) {
                    // line 167
                    echo "            <ul class=\"pmd-MosaicChannels-list\">
          ";
                }
                // line 169
                echo "            ";
                $this->loadTemplate("partials/item-mosaic-channel.twig", "controllers/widgets/mosaic.twig", 169)->display(array_merge($context, array("channel" => $context["channel_item"])));
                // line 170
                echo "          ";
                if (((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) == 36)) {
                    // line 171
                    echo "            </ul>
            ";
                    // line 172
                    $context["counter"] = 0;
                    // line 173
                    echo "          ";
                }
                // line 174
                echo "          ";
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) + 1);
                // line 175
                echo "        ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 176
            echo "        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 177
            echo "      </div>
      <div class=\"container pmd-MosaicCountries-container\">
        <p class=\"pmd-MosaicCountries-legend\">";
            // line 179
            echo $this->env->getExtension('translator')->getTranslator()->trans("Select a country in the list below", array(), "messages");
            echo "</p>
        <ul class=\"ptv-js-MosaicCountries pmd-MosaicCountries-list\">
            ";
            // line 181
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["countries"]) ? $context["countries"] : $this->getContext($context, "countries")));
            foreach ($context['_seq'] as $context["_key"] => $context["code"]) {
                // line 182
                echo "              <li class=\"pmd-MosaicCountries-listItem\">
                <a href=\"";
                // line 183
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_country_filter", array("country_slug" => $this->getAttribute((isset($context["country_slugs"]) ? $context["country_slugs"] : $this->getContext($context, "country_slugs")), $context["code"], array(), "array"))), "html", null, true);
                echo "\" class=\"pmd-MosaicCountries-link\" data-country=\"";
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "\">
                  <span class=\"pmd-MosaicCountries-flag flag flag-";
                // line 184
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["code"]), "html", null, true);
                echo "\"></span>
                  <span class=\"pmd-MosaicCountries-code\">";
                // line 185
                echo twig_escape_filter($this->env, $context["code"], "html", null, true);
                echo "</span>
                </a>
              </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            echo "        </ul>
      </div>
    </div>

    <div id=\"mosaic-slider\" class=\"pmd-MosaicSlider\">
      ";
            // line 194
            $this->loadTemplate("partials/paginate-mosaic.twig", "controllers/widgets/mosaic.twig", 194)->display(array_merge($context, array("pages" => (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")))));
            // line 195
            echo "    </div>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 197
            echo "
  ";
            // line 198
            ob_start();
            // line 199
            echo "    <script type=\"text/javascript\">
    ;(function(win, doc, app) {
        app.Data = app.Data || {};
        app.Data.Remote = app.Data.Remote || {};
        app.Data.Remote.baseUri = \"";
            // line 203
            echo $this->env->getExtension('routing')->getPath("television_index");
            echo "\";

        ";
            // line 205
            $context["whitelist"] = array(0 => "id", 1 => "name", 2 => "alias", 3 => "has_programs", 4 => "images", 5 => "has_social_tv", 6 => "disabled", 7 => "highlight", 8 => "skip_ads", 9 => "is_adult", 10 => "streaming_source", 11 => "streaming_spec", 12 => "is_radio");
            // line 206
            echo "        app.Data.Remote.channels = ";
            echo twig_jsonencode_filter($this->env->getExtension('Playtv')->channelsWhitelist((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")), (isset($context["whitelist"]) ? $context["whitelist"] : $this->getContext($context, "whitelist"))));
            echo ";

        app.Data.Remote.countryChannels = {};
        ";
            // line 209
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels_by_country"]) ? $context["channels_by_country"] : $this->getContext($context, "channels_by_country")));
            foreach ($context['_seq'] as $context["country_code"] => $context["channels_country"]) {
                // line 210
                echo "          app.Data.Remote.countryChannels.";
                echo twig_escape_filter($this->env, $context["country_code"], "html", null, true);
                echo " = ";
                echo twig_jsonencode_filter($this->env->getExtension('Playtv')->channelsWhitelist($context["channels_country"], (isset($context["whitelist"]) ? $context["whitelist"] : $this->getContext($context, "whitelist"))));
                echo ";
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['country_code'], $context['channels_country'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 212
            echo "    })(window, window.document, window.ptv || (window.ptv = {}));
    </script>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 215
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/mosaic.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  470 => 215,  465 => 212,  454 => 210,  450 => 209,  443 => 206,  441 => 205,  436 => 203,  430 => 199,  428 => 198,  425 => 197,  421 => 195,  419 => 194,  412 => 189,  402 => 185,  398 => 184,  392 => 183,  389 => 182,  385 => 181,  380 => 179,  376 => 177,  373 => 176,  359 => 175,  356 => 174,  353 => 173,  351 => 172,  348 => 171,  345 => 170,  342 => 169,  338 => 167,  335 => 166,  317 => 165,  314 => 164,  312 => 163,  308 => 161,  305 => 160,  301 => 158,  297 => 152,  295 => 151,  291 => 150,  288 => 149,  286 => 141,  285 => 140,  282 => 139,  280 => 138,  277 => 137,  274 => 132,  271 => 131,  259 => 127,  255 => 126,  246 => 125,  241 => 124,  239 => 123,  236 => 122,  234 => 121,  231 => 120,  227 => 114,  219 => 111,  216 => 110,  204 => 106,  200 => 105,  193 => 104,  188 => 103,  186 => 102,  182 => 101,  178 => 99,  174 => 98,  170 => 96,  168 => 95,  165 => 94,  161 => 88,  153 => 85,  150 => 84,  138 => 80,  134 => 79,  127 => 78,  122 => 77,  120 => 76,  116 => 75,  112 => 73,  108 => 72,  104 => 70,  102 => 69,  99 => 68,  96 => 63,  83 => 58,  79 => 57,  72 => 56,  68 => 55,  66 => 54,  63 => 53,  61 => 52,  58 => 51,  54 => 45,  52 => 44,  48 => 42,  46 => 35,  45 => 30,  42 => 29,  40 => 28,  37 => 27,  33 => 21,  31 => 20,  27 => 18,  25 => 11,  24 => 7,  21 => 6,  19 => 5,);
    }
}
/* {#*/
/*     @container: #mini-mosaic*/
/*     @data: $channels*/
/* #}*/
/* {% if context =='homepage' %}*/
/* */
/*     {% set vars = {*/
/*       data_attributes: {*/
/*         tooltip: "true"*/
/*       },*/
/*       channels: channels,*/
/*       channel: {*/
/*         title: 'television_channel_single.title',*/
/*         domain: 'seo'*/
/*       },*/
/*       link_route_name: 'television_channel_single'*/
/*     } %}*/
/* */
/*     <div class="pmd-PatchworkWrapper">*/
/*       {% include 'partials/patchwork.twig' with vars %}*/
/*     </div>*/
/* */
/* {#*/
/*     @container: .livetweet-container*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'social_tv' %}*/
/* */
/* {% set vars = {*/
/*     data_attributes: {*/
/*       tooltip: "true"*/
/*     },*/
/* */
/*     channels: channels,*/
/*     channel: {*/
/*       title: 'Social TV suivez le Live Tweet %channel%'*/
/*     },*/
/*     link_route_name: 'live_tweets_channel'*/
/*   }*/
/* %}*/
/* */
/* <div class="pmd-js-LivetweetFilter pmd-PatchworkWrapper">*/
/*   {% include 'partials/patchwork.twig' with vars %}*/
/* </div>*/
/* */
/* {#*/
/*     @container: #mosaic 'votre bouquet'*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'live' %}*/
/* */
/* {% spaceless %}*/
/* {% for channel_item in channels %}*/
/* <a class="channel-button channel-button-mini" href="{{ path('chaine_tv', {'channel_id': channel_item.id, 'channel_alias': channel_item.alias}) }}" title="{{ channel_item.name }}">*/
/*   <span>{% trans with {'%channel%': channel_item.name} %}Watch %channel% live{% endtrans %}</span>*/
/*   <img src="{{ channel_item.images.mini }}" alt="{{ channel_item.name }}" width="36px" height="36px">*/
/*   <div class="cache"></div>*/
/* </a>*/
/* {% endfor %}*/
/* {% endspaceless %}*/
/* */
/* {#*/
/*     @container: #mosaic categories*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'categories' %}*/
/* */
/* <div class="row fluid">*/
/*   {% for key, category_channels in channels %}*/
/*   <div class="span" style="width:389px;">*/
/*     <div class="grey-box margin text">*/
/*       <h2 class="margin">{{ key }}</h2>*/
/*       {% spaceless %}*/
/*       {% for channel_item in category_channels %}*/
/*       <a class="channel-button channel-button-mini" href="{{ path('chaine_tv', {'channel_id': channel_item.id, 'channel_alias': channel_item.alias}) }}" title="{{ channel_item.name }}">*/
/*         <span>Regarder {{ channel_item.name }} en direct</span>*/
/*         <img src="{{ channel_item.images.mini }}" alt="{{ channel_item.name }}" width="36px" height="36px">*/
/*         <div class="cache"></div>*/
/*       </a>*/
/*       {% endfor %}*/
/*       {% endspaceless %}*/
/*     </div>*/
/*   </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
/* {#*/
/*     @container: #mosaic themes*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'themes' %}*/
/* */
/* <div class="row fluid">*/
/*   {% for key, theme_channels in channels %}*/
/*   <div class="span" style="width:389px;">*/
/*     <div class="grey-box margin text">*/
/*       <h2 class="margin">{{ key }}</h2>*/
/*         {% spaceless %}*/
/*         {% for channel in theme_channels %}*/
/*         <a href="{{ path('chaine_tv', {'channel_id': channel.id, 'channel_alias': channel.alias}) }}" title="{{ channel.name }}" class="channel-button channel-button-mini">*/
/*           <span>Regarder {{ channel.name }} en direct</span>*/
/*           <img src="{{ channel.images.mini }}" alt="{{ channel.name }}" width="36px" height="36px">*/
/*           <div class="cache"></div>*/
/*         </a>*/
/*         {% endfor %}*/
/*         {% endspaceless %}*/
/*     </div>*/
/*   </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
/* {#*/
/*     @container: #mosaic replay-tv*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'replay_tv' %}*/
/* */
/*   {% spaceless %}*/
/*     {% for channel in channels %}*/
/*       <a class="channel-button channel-button-mini" href="/replay-tv/videos/{{ channel.alias }}/" title="Revoir {{ channel.name }} en replay ({{ channel.replay_count }} vidéos)">*/
/*         <span>{% trans with {'%channel%': channel.name} %}Catch Up videos from %channel%{% endtrans %}</span>*/
/*         <img src="{{ channel.images.mini }}" alt="{{ channel.name }}" width="36px" height="36px">*/
/*         <div class="cache"></div>*/
/*       </a>*/
/*     {% endfor %}*/
/*   {% endspaceless %}*/
/* */
/* {#*/
/*     @container: #mosaic replay-tv-page*/
/*     @data: $channels*/
/* #}*/
/* */
/* {% elseif context == 'replay_tv_page' %}*/
/* */
/* {% set vars = {*/
/*     channels: channels,*/
/*     channel: {*/
/*       title: 'replay_videos:channel.title',*/
/*       domain: 'seo'*/
/*     },*/
/*     link_route_name: 'replay_channel_videos'*/
/*   }*/
/* %}*/
/* */
/* <div class="pmd-js-ReplayTvFilter pmd-PatchworkWrapper" data-main-url="{{ path('replay_videos') }}">*/
/*   {% include 'partials/patchwork.twig' with vars %}*/
/* </div>*/
/* */
/* {#*/
/*     @container: #mosaic*/
/*     @data: $channels, $pages*/
/* #}*/
/* */
/* {% else %}*/
/*   {% spaceless %}*/
/*     <div class="ptv-js-MosaicContent pmd-MosaicContent">*/
/*       <div class="container pmd-MosaicChannels-container" id="mosaic-channels">*/
/*         {% spaceless %}*/
/*         {% set counter = 1 %}*/
/*         {% for channel_item in channels %}*/
/*           {% if counter == 1 %}*/
/*             <ul class="pmd-MosaicChannels-list">*/
/*           {% endif %}*/
/*             {% include "partials/item-mosaic-channel.twig" with {"channel": channel_item} %}*/
/*           {% if counter == 36 %}*/
/*             </ul>*/
/*             {% set counter = 0 %}*/
/*           {% endif %}*/
/*           {% set counter = counter + 1 %}*/
/*         {% endfor %}*/
/*         {% endspaceless %}*/
/*       </div>*/
/*       <div class="container pmd-MosaicCountries-container">*/
/*         <p class="pmd-MosaicCountries-legend">{% trans %}Select a country in the list below{% endtrans %}</p>*/
/*         <ul class="ptv-js-MosaicCountries pmd-MosaicCountries-list">*/
/*             {% for code in countries %}*/
/*               <li class="pmd-MosaicCountries-listItem">*/
/*                 <a href="{{ path('television_country_filter', {'country_slug': country_slugs[code]}) }}" class="pmd-MosaicCountries-link" data-country="{{ code }}">*/
/*                   <span class="pmd-MosaicCountries-flag flag flag-{{ code|lower }}"></span>*/
/*                   <span class="pmd-MosaicCountries-code">{{ code }}</span>*/
/*                 </a>*/
/*               </li>*/
/*             {% endfor %}*/
/*         </ul>*/
/*       </div>*/
/*     </div>*/
/* */
/*     <div id="mosaic-slider" class="pmd-MosaicSlider">*/
/*       {% include "partials/paginate-mosaic.twig" with {"pages": pages} %}*/
/*     </div>*/
/*   {% endspaceless %}*/
/* */
/*   {% spaceless %}*/
/*     <script type="text/javascript">*/
/*     ;(function(win, doc, app) {*/
/*         app.Data = app.Data || {};*/
/*         app.Data.Remote = app.Data.Remote || {};*/
/*         app.Data.Remote.baseUri = "{{ path('television_index') }}";*/
/* */
/*         {% set whitelist = ["id", "name", "alias", "has_programs", "images", "has_social_tv", "disabled", "highlight", "skip_ads", "is_adult", "streaming_source", "streaming_spec", "is_radio"] %}*/
/*         app.Data.Remote.channels = {{ channels_whitelist(channels, whitelist)|json_encode()|raw }};*/
/* */
/*         app.Data.Remote.countryChannels = {};*/
/*         {% for country_code, channels_country in channels_by_country %}*/
/*           app.Data.Remote.countryChannels.{{ country_code }} = {{ channels_whitelist(channels_country, whitelist)|json_encode()|raw }};*/
/*         {% endfor %}*/
/*     })(window, window.document, window.ptv || (window.ptv = {}));*/
/*     </script>*/
/*   {% endspaceless %}*/
/* */
/* {% endif %}*/
/* */
