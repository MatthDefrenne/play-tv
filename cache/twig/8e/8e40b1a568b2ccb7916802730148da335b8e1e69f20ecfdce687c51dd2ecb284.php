<?php

/* controllers/chaine-tv/skeleton.twig */
class __TwigTemplate_ce245cc839ef1de0cf05e61374df6fc5b92a68c4a1aa11926cf9111a9341303f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'embed_content' => array($this, 'block_embed_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 2
            echo "  ";
            $context["route_params"] = array("channel_alias" => $this->getAttribute(            // line 3
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()));
        } else {
            // line 6
            echo "  ";
            $context["route_params"] = array("channel_id" => $this->getAttribute(            // line 7
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), "channel_alias" => $this->getAttribute(            // line 8
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()));
        }
        // line 11
        echo "
<div id=\"content\">

  ";
        // line 14
        if (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "streamable", array()) && !twig_in_filter($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), twig_get_array_keys_filter((isset($context["france_television"]) ? $context["france_television"] : $this->getContext($context, "france_television")))))) {
            // line 15
            echo "  <div id=\"program-is-live\">
    ";
            // line 16
            if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "is_radio", array())) {
                // line 17
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Listen %channel% live", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
                echo "\">
      ";
                // line 18
                echo $this->env->getExtension('translator')->getTranslator()->trans("Listen <strong>%channel%</strong> live online", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
                // line 19
                echo "    </a>
    ";
            } else {
                // line 21
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
                echo "\">
      ";
                // line 22
                if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "is_freemium", array())) {
                    // line 23
                    echo "        ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Watch <strong>%channel%</strong> live online for free", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
                    // line 24
                    echo "      ";
                } else {
                    // line 25
                    echo "        ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Watch <strong>%channel%</strong> live online", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
                    // line 26
                    echo "      ";
                }
                // line 27
                echo "    </a>
    ";
            }
            // line 29
            echo "  </div>
  ";
        }
        // line 31
        echo "
  <div class=\"container\">
    <div class=\"row\">

      <div class=\"span-menubar left-menu sep\">

      <div class=\"text\">
        ";
        // line 39
        echo "          <img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "images", array()), "medium", array()), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
        echo "\" width=\"120\" height=\"120\">
        ";
        // line 41
        echo "      </div>
      ";
        // line 42
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "is_radio", array())) {
            // line 43
            echo "      <h2>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Type", array(), "messages");
            echo "</h2>
      ";
        } else {
            // line 45
            echo "      <h2>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Type of TV channel", array(), "messages");
            echo "</h2>
      ";
        }
        // line 47
        echo "      <p>
        <strong>";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "category", array()), "html", null, true);
        echo "</strong>
      </p>

      <h2>";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("Category", array(), "messages");
        echo "</h2>
      <p>
        <strong>";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "theme", array()), "html", null, true);
        echo "</strong>
      </p>

      <h2>";
        // line 56
        echo $this->env->getExtension('translator')->getTranslator()->trans("Official website", array(), "messages");
        echo "</h2>
      <p>
        <a href=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "website", array()), "html", null, true);
        echo "\" target=\"_blank\" rel=\"nofollow\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, twig_truncate_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "website", array()), array("http://" => "", "https://" => "")), 22), "html", null, true);
        echo "</a>
      </p>

      <h2>";
        // line 61
        echo $this->env->getExtension('translator')->getTranslator()->trans("Creation date", array(), "messages");
        echo "</h2>
      <p>
        ";
        // line 63
        if ( !(null === $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "created", array()))) {
            echo "<strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "created", array()), "html", null, true);
            echo "</strong>";
        } else {
            echo "<span class=\"clear-grey\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Unknown date", array(), "messages");
            echo "</span>";
        }
        // line 64
        echo "      </p>

      ";
        // line 66
        if (($this->env->getExtension('playtv_feature')->hasFeature("sales") && $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "products", array()))) {
            // line 67
            echo "      <h2>Chaîne incluse dans</h2>
      <div style=\"margin-right: 4px;\">
        ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "products", array()), "retail", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 70
                echo "        <button class=\"pmd-js-PopinProduct pmd-Button pmd-Button--block pmd-Button--bold pmd-Button--block pmd-Button--sm pmd-Text--truncate pmd-Button--dark\" type=\"button\" data-product-alias=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "alias", array()), "html", null, true);
                echo "\">
          ";
                // line 71
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["product"], "price", array()) / 100), 2, ","), "html", null, true);
                echo "€ /mois
        </button>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "products", array()), "pack", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 75
                echo "        <button class=\"pmd-js-PopinProduct pmd-Button pmd-Button--block pmd-Button--bold pmd-Button--block pmd-Button--sm pmd-Text--truncate pmd-Button--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "alias", array()), "html", null, true);
                echo "\" type=\"button\" data-product-alias=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "alias", array()), "html", null, true);
                echo "\">
          ";
                // line 76
                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                echo " - ";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute($context["product"], "price", array()) / 100), 2, ","), "html", null, true);
                echo "€ /mois
        </button>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "      </div>
      ";
        }
        // line 81
        echo "
    </div>

    <div class=\"span-content\">

      <div class=\"page-title\">

        <a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("About %channel%", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
        echo "\">
          <h1>
            <span class=\"red\">";
        // line 90
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
        echo "</span>
          </h1>
        </a>

        ";
        // line 94
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "tagline", array())) {
            // line 95
            echo "        <p class=\"sub-title\">&laquo; ";
            echo twig_escape_filter($this->env, strip_tags($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "tagline", array())), "html", null, true);
            echo " »</p>
        ";
        }
        // line 97
        echo "
      </div>

      <ul class=\"tabs pmd-LegacyTabs\">
        <li";
        // line 101
        if (((isset($context["tab_active"]) ? $context["tab_active"] : $this->getContext($context, "tab_active")) == "resume")) {
            echo " class=\"tab-selected\"";
        }
        echo ">
          <a href=\"";
        // line 102
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\" class=\"pmd-LegacyTabs-text pmd-Text--truncate\">
            ";
        // line 103
        echo $this->env->getExtension('translator')->getTranslator()->trans("Summary", array(), "messages");
        // line 104
        echo "          </a>
        </li>

        ";
        // line 107
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 108
            echo "        <li";
            if (((isset($context["tab_active"]) ? $context["tab_active"] : $this->getContext($context, "tab_active")) == "live")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
          <a rel=\"nofollow\" href=\"";
            // line 109
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv_en_direct", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\" class=\"pmd-LegacyTabs-text pmd-Text--truncate\">
            En direct
          </a>
        </li>
        <li";
            // line 113
            if (((isset($context["tab_active"]) ? $context["tab_active"] : $this->getContext($context, "tab_active")) == "next")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
          <a rel=\"nofollow\" href=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv_a_suivre", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\" class=\"pmd-LegacyTabs-text pmd-Text--truncate\">
            À suivre
          </a>
        </li>
        ";
        }
        // line 119
        echo "
        ";
        // line 120
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "has_programs", array())) {
            // line 121
            echo "        <li";
            if (((isset($context["tab_active"]) ? $context["tab_active"] : $this->getContext($context, "tab_active")) == "broadcasts")) {
                echo " class=\"tab-selected\"";
            }
            echo ">
          <a href=\"";
            // line 122
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv_programmes", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\" class=\"pmd-LegacyTabs-text pmd-Text--truncate pmd-LegacyTabs-text--large\">
            <strong>";
            // line 123
            echo $this->env->getExtension('translator')->getTranslator()->trans("TV guide", array(), "messages");
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
            echo "</strong>
          </a>
        </li>
        ";
        }
        // line 127
        echo "        ";
        if (($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv") && $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "has_replay_tv", array()))) {
            // line 128
            echo "        <li>
          <a href=\"";
            // line 129
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("replay_channel_videos", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\" class=\"pmd-LegacyTabs-text pmd-Text--truncate pmd-LegacyTabs-text--large\">
            <strong>";
            // line 130
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
            echo " ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up", array(), "messages");
            echo "</strong>
          </a>
        </li>
        ";
        }
        // line 134
        echo "      </ul>

      ";
        // line 136
        $this->displayBlock('embed_content', $context, $blocks);
        // line 137
        echo "
    </div><!-- /.span-content -->

      <div class=\"span-sidebar\">

        ";
        // line 142
        if (((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")) && ($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array()) > 0))) {
            // line 143
            echo "          <div class=\"block-title\" style=\"margin-top:0;\">
            <p class=\"right clear-grey\">Dernière heure</p>
            <h2><strong>Audience en temps réel</strong></h2>
          </div>

          <div id=\"channel-top-live\" class=\"clearfix margin\">
            <div class=\"progress-bar big\" title=\"";
            // line 149
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array()), 1, ","), "html", null, true);
            echo "% de part d'audience\">
              <div class=\"filled\" style=\"width:";
            // line 150
            if (($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array()) < 0)) {
                echo "0";
            } else {
                echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array())), "html", null, true);
            }
            echo "%;\"></div>
              <div class=\"cache\"></div>
            </div>
            <span class=\"clear-grey\" style=\"margin-left:10px;\" title=\"";
            // line 153
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array()), 1, ","), "html", null, true);
            echo "% de part d'audience\">";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "share", array()), 1, ","), "html", null, true);
            echo "%</span>
            <div class=\"trend-icon ";
            // line 154
            if ((twig_round($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "trend", array())) > 0)) {
                echo "up";
            } elseif ((twig_round($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "trend", array())) < 0)) {
                echo "down";
            } else {
                echo "steady";
            }
            echo "\" title=\"Audience ";
            if ((twig_round($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "trend", array())) > 0)) {
                echo "en progression";
            } elseif ((twig_round($this->getAttribute((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")), "trend", array())) < 0)) {
                echo "en baisse";
            } else {
                echo "stable";
            }
            echo "\"></div>
          </div>
        ";
        }
        // line 157
        echo "
        ";
        // line 158
        $this->loadTemplate("partials/ads-banner.twig", "controllers/chaine-tv/skeleton.twig", 158)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 159
        echo "
      </div><!-- /.span-sidebar -->

    </div><!-- /.row -->
  </div>

</div>

";
    }

    // line 136
    public function block_embed_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/skeleton.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  435 => 136,  423 => 159,  421 => 158,  418 => 157,  398 => 154,  392 => 153,  382 => 150,  378 => 149,  370 => 143,  368 => 142,  361 => 137,  359 => 136,  355 => 134,  346 => 130,  342 => 129,  339 => 128,  336 => 127,  327 => 123,  323 => 122,  316 => 121,  314 => 120,  311 => 119,  303 => 114,  297 => 113,  290 => 109,  283 => 108,  281 => 107,  276 => 104,  274 => 103,  270 => 102,  264 => 101,  258 => 97,  252 => 95,  250 => 94,  243 => 90,  236 => 88,  227 => 81,  223 => 79,  212 => 76,  205 => 75,  200 => 74,  189 => 71,  184 => 70,  180 => 69,  176 => 67,  174 => 66,  170 => 64,  160 => 63,  155 => 61,  145 => 58,  140 => 56,  134 => 53,  129 => 51,  123 => 48,  120 => 47,  114 => 45,  108 => 43,  106 => 42,  103 => 41,  96 => 39,  87 => 31,  83 => 29,  79 => 27,  76 => 26,  73 => 25,  70 => 24,  67 => 23,  65 => 22,  58 => 21,  54 => 19,  52 => 18,  45 => 17,  43 => 16,  40 => 15,  38 => 14,  33 => 11,  30 => 8,  29 => 7,  27 => 6,  24 => 3,  22 => 2,  20 => 1,);
    }
}
/* {% if is_website_fr %}*/
/*   {% set route_params = {*/
/*     'channel_alias': infos.alias*/
/*   } %}*/
/* {% else %}*/
/*   {% set route_params = {*/
/*     'channel_id': infos.id,*/
/*     'channel_alias': infos.alias*/
/*   } %}*/
/* {% endif %}*/
/* */
/* <div id="content">*/
/* */
/*   {% if infos.streamable and infos.id not in france_television|keys %}*/
/*   <div id="program-is-live">*/
/*     {% if infos.is_radio %}*/
/*     <a href="{{ path('television_channel_single', route_params) }}" title="{% trans with {'%channel%': infos.name} %}Listen %channel% live{% endtrans %}">*/
/*       {% trans with {'%channel%': infos.name} %}Listen <strong>%channel%</strong> live online{% endtrans %}*/
/*     </a>*/
/*     {% else %}*/
/*     <a href="{{ path('television_channel_single', route_params) }}" title="{% trans with {'%channel%': infos.name} %}Watch %channel% live{% endtrans %}">*/
/*       {% if infos.is_freemium %}*/
/*         {% trans with {'%channel%': infos.name} %}Watch <strong>%channel%</strong> live online for free{% endtrans %}*/
/*       {% else %}*/
/*         {% trans with {'%channel%': infos.name} %}Watch <strong>%channel%</strong> live online{% endtrans %}*/
/*       {% endif %}*/
/*     </a>*/
/*     {% endif%}*/
/*   </div>*/
/*   {% endif %}*/
/* */
/*   <div class="container">*/
/*     <div class="row">*/
/* */
/*       <div class="span-menubar left-menu sep">*/
/* */
/*       <div class="text">*/
/*         {#<a href="{{ path('chaine_tv', route_params) }}">#}*/
/*           <img src="{{ infos.images.medium }}" alt="{{ infos.name }}" width="120" height="120">*/
/*         {#</a>#}*/
/*       </div>*/
/*       {% if infos.is_radio %}*/
/*       <h2>{% trans %}Type{% endtrans %}</h2>*/
/*       {% else %}*/
/*       <h2>{% trans %}Type of TV channel{% endtrans %}</h2>*/
/*       {% endif %}*/
/*       <p>*/
/*         <strong>{{ infos.category }}</strong>*/
/*       </p>*/
/* */
/*       <h2>{% trans %}Category{% endtrans %}</h2>*/
/*       <p>*/
/*         <strong>{{ infos.theme }}</strong>*/
/*       </p>*/
/* */
/*       <h2>{% trans %}Official website{% endtrans %}</h2>*/
/*       <p>*/
/*         <a href="{{ infos.website }}" target="_blank" rel="nofollow" title="{{ infos.name }}">{{ infos.website|replace({"http://": "", "https://": ""})|truncate(22) }}</a>*/
/*       </p>*/
/* */
/*       <h2>{% trans %}Creation date{% endtrans %}</h2>*/
/*       <p>*/
/*         {% if infos.created is not null %}<strong>{{ infos.created }}</strong>{% else %}<span class="clear-grey">{% trans %}Unknown date{% endtrans %}</span>{% endif %}*/
/*       </p>*/
/* */
/*       {% if has_feature('sales') and infos.products %}*/
/*       <h2>Chaîne incluse dans</h2>*/
/*       <div style="margin-right: 4px;">*/
/*         {% for product in infos.products.retail %}*/
/*         <button class="pmd-js-PopinProduct pmd-Button pmd-Button--block pmd-Button--bold pmd-Button--block pmd-Button--sm pmd-Text--truncate pmd-Button--dark" type="button" data-product-alias="{{ product.alias }}">*/
/*           {{ product.name }} - {{ (product.price / 100)|number_format(2, ',') }}€ /mois*/
/*         </button>*/
/*         {% endfor %}*/
/*         {% for product in infos.products.pack %}*/
/*         <button class="pmd-js-PopinProduct pmd-Button pmd-Button--block pmd-Button--bold pmd-Button--block pmd-Button--sm pmd-Text--truncate pmd-Button--{{ product.alias }}" type="button" data-product-alias="{{ product.alias }}">*/
/*           {{ product.name }} - {{ (product.price / 100)|number_format(2, ',') }}€ /mois*/
/*         </button>*/
/*         {% endfor %}*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/* */
/*     <div class="span-content">*/
/* */
/*       <div class="page-title">*/
/* */
/*         <a href="{{ path('chaine_tv', route_params) }}" title="{% trans with {'%channel%': infos.name} %}About %channel%{% endtrans %}">*/
/*           <h1>*/
/*             <span class="red">{{ infos.name }}</span>*/
/*           </h1>*/
/*         </a>*/
/* */
/*         {% if infos.tagline %}*/
/*         <p class="sub-title">&laquo; {{ infos.tagline|striptags }} »</p>*/
/*         {% endif %}*/
/* */
/*       </div>*/
/* */
/*       <ul class="tabs pmd-LegacyTabs">*/
/*         <li{% if tab_active == "resume" %} class="tab-selected"{% endif %}>*/
/*           <a href="{{ path('chaine_tv', route_params) }}" class="pmd-LegacyTabs-text pmd-Text--truncate">*/
/*             {% trans %}Summary{% endtrans %}*/
/*           </a>*/
/*         </li>*/
/* */
/*         {% if is_website_fr %}*/
/*         <li{% if tab_active == "live" %} class="tab-selected"{% endif %}>*/
/*           <a rel="nofollow" href="{{ path('chaine_tv_en_direct', route_params) }}" class="pmd-LegacyTabs-text pmd-Text--truncate">*/
/*             En direct*/
/*           </a>*/
/*         </li>*/
/*         <li{% if tab_active == "next" %} class="tab-selected"{% endif %}>*/
/*           <a rel="nofollow" href="{{ path('chaine_tv_a_suivre', route_params) }}" class="pmd-LegacyTabs-text pmd-Text--truncate">*/
/*             À suivre*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/* */
/*         {% if infos.has_programs %}*/
/*         <li{% if tab_active == "broadcasts" %} class="tab-selected"{% endif %}>*/
/*           <a href="{{ path('chaine_tv_programmes', route_params) }}" class="pmd-LegacyTabs-text pmd-Text--truncate pmd-LegacyTabs-text--large">*/
/*             <strong>{% trans %}TV guide{% endtrans %} {{ infos.name }}</strong>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*         {% if has_feature('catchup_tv') and infos.has_replay_tv %}*/
/*         <li>*/
/*           <a href="{{ path('replay_channel_videos', route_params) }}" class="pmd-LegacyTabs-text pmd-Text--truncate pmd-LegacyTabs-text--large">*/
/*             <strong>{{ infos.name }} {% trans %}Catch Up{% endtrans %}</strong>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*       </ul>*/
/* */
/*       {% block embed_content %}{% endblock %}*/
/* */
/*     </div><!-- /.span-content -->*/
/* */
/*       <div class="span-sidebar">*/
/* */
/*         {% if toplive and toplive.share > 0 %}*/
/*           <div class="block-title" style="margin-top:0;">*/
/*             <p class="right clear-grey">Dernière heure</p>*/
/*             <h2><strong>Audience en temps réel</strong></h2>*/
/*           </div>*/
/* */
/*           <div id="channel-top-live" class="clearfix margin">*/
/*             <div class="progress-bar big" title="{{ toplive.share|number_format(1, ",") }}% de part d'audience">*/
/*               <div class="filled" style="width:{% if toplive.share < 0 %}0{% else %}{{ toplive.share|round }}{% endif %}%;"></div>*/
/*               <div class="cache"></div>*/
/*             </div>*/
/*             <span class="clear-grey" style="margin-left:10px;" title="{{ toplive.share|number_format(1, ",") }}% de part d'audience">{{ toplive.share|number_format(1, ",") }}%</span>*/
/*             <div class="trend-icon {% if toplive.trend|round > 0 %}up{% elseif toplive.trend|round < 0 %}down{% else %}steady{% endif %}" title="Audience {% if toplive.trend|round > 0 %}en progression{% elseif toplive.trend|round < 0 %}en baisse{% else %}stable{% endif %}"></div>*/
/*           </div>*/
/*         {% endif %}*/
/* */
/*         {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/* */
/*       </div><!-- /.span-sidebar -->*/
/* */
/*     </div><!-- /.row -->*/
/*   </div>*/
/* */
/* </div>*/
/* */
/* */
