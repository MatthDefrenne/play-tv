<?php

/* controllers/programme-tv/index_mobile.twig */
class __TwigTemplate_c02357cafbbe0f8e125bc561836bbda72c1e9a4f5a40451f679d8dd8be6bd8fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/programme-tv/index_mobile.twig", 1);
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
        echo "<div class=\"pmd-ProgrammeDetails\">

  <div class=\"pmd-ProgrammeDetailsHeading pmd-Cf\">

    ";
        // line 8
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array())) {
            // line 9
            echo "    <a class=\"pmd-ProgrammeDetailsHeading-preview\" rel=\"nofollow\" target=\"_blank\" href=\"/trailer/";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id", array()), "html", null, true);
            echo "/?autoplay=1\">
    ";
        } else {
            // line 11
            echo "    <div class=\"pmd-ProgrammeDetailsHeading-preview\">
    ";
        }
        // line 13
        echo "
      <img
        src=\"";
        // line 15
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : null), "images", array(), "any", false, true), "medium", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : null), "images", array(), "any", false, true), "medium", array()), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))), "html", null, true);
        echo "\"
        width=\"107\"
        height=\"80\"
      />

      ";
        // line 20
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array())) {
            // line 21
            echo "      <span class=\"pmd-TrailerIcon pmd-Icons-trailer pmd-ProgrammeDetailsHeading-preview-trailer\"></span>
      ";
        }
        // line 23
        echo "
    ";
        // line 24
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array())) {
            // line 25
            echo "    </a>
    ";
        } else {
            // line 27
            echo "    </div>
    ";
        }
        // line 29
        echo "
    <h2 class=\"pmd-ProgrammeDetailsHeading-title\">";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "</h2>

    <div class=\"pmd-ProgrammeDetailsHeading-info\">
      ";
        // line 33
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender", array())) {
            // line 34
            echo "      <span class=\"pmd-ProgrammeGenre pmd-ProgrammeGenre--";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender_id", array()), "html", null, true);
            echo " pmd-ProgrammeGenre--white pmd-ProgrammeGenre--small\">
        ";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender", array()), "html", null, true);
            echo "
      </span>
      ";
        }
        // line 38
        echo "
      ";
        // line 39
        if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "stars", array()) > 0)) {
            // line 40
            echo "      <span class=\"pmd-ProgrammeDetailsHeading-stars\">
        <img
          src=\"";
            // line 42
            echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
            echo "/images/stars-";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "stars", array()), "html", null, true);
            echo "-mobile.svg\"
          width=\"36\"
        />
      </span>
      ";
        }
        // line 47
        echo "
      ";
        // line 48
        if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) && ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) != 1))) {
            // line 49
            echo "        ";
            if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 2)) {
                // line 50
                echo "          ";
                $context["csa_id"] = 10;
                // line 51
                echo "        ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 3)) {
                // line 52
                echo "          ";
                $context["csa_id"] = 12;
                // line 53
                echo "        ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 4)) {
                // line 54
                echo "          ";
                $context["csa_id"] = 16;
                // line 55
                echo "        ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 5)) {
                // line 56
                echo "          ";
                $context["csa_id"] = 18;
                // line 57
                echo "        ";
            }
            // line 58
            echo "      <span class=\"pmd-ProgrammeDetailsHeading-ageLimitation\">
        <img
          src=\"";
            // line 60
            echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
            echo "/images/csa-";
            echo twig_escape_filter($this->env, (isset($context["csa_id"]) ? $context["csa_id"] : $this->getContext($context, "csa_id")), "html", null, true);
            echo "-mobile.svg\"
          width=\"15\"
        />
      </span>
      ";
        }
        // line 65
        echo "
    </div>

    ";
        // line 68
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "duration", array())) {
            // line 69
            echo "    <div class=\"pmd-ProgrammeDetailsHeading-time\">
      <em>";
            // line 70
            echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "duration", array())), "html", null, true);
            echo "</em>
    </div>
    ";
        }
        // line 73
        echo "
  </div>

  ";
        // line 76
        if ((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live"))) {
            // line 77
            echo "    ";
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "streamable", array())) {
                // line 78
                echo "    <a
      href=\"";
                // line 79
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "alias", array()))), "html", null, true);
                echo "\"
      class=\"pmd-ProgrammeDetailsLive\"
    >
      ";
                // line 82
                echo $this->env->getExtension('translator')->getTranslator()->trans("This program is on air. Watch it now.", array(), "messages");
                // line 83
                echo "    </a>
    ";
            } else {
                // line 85
                echo "    <div class=\"pmd-ProgrammeDetailsLive\">
      ";
                // line 86
                echo $this->env->getExtension('translator')->getTranslator()->trans("This program is on air.", array(), "messages");
                // line 87
                echo "    </div>
    ";
            }
            // line 89
            echo "  ";
        }
        // line 90
        echo "
  <div class=\"pmd-ProgrammeDetailsContent\">

    <div class=\"pmd-Heading pmd-Heading--2x pmd-Heading--light\">
    ";
        // line 94
        ob_start();
        // line 95
        echo "      <a href=\"#\" class=\"pmd-js-ProgrammeDetails-summary pmd-Heading-words\">
        <span>";
        // line 96
        echo $this->env->getExtension('translator')->getTranslator()->trans("Summary", array(), "messages");
        echo "</span>
      </a>
      <a href=\"#\" class=\"pmd-js-ProgrammeDetails-broadcast pmd-Heading-words\">
        <span>";
        // line 99
        echo $this->env->getExtension('translator')->getTranslator()->trans("Rebroadcasts", array(), "messages");
        echo "</span>
      </a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 102
        echo "    </div>

    <div class=\"pmd-js-ProgrammeDetails-summaryContent pmd-ProgrammeDetailsSummary\">

      <div class=\"pmd-ProgrammeDetailsMiniSummary\">
        <h3 class=\"pmd-ProgrammeDetailsMiniSummary-heading\">";
        // line 107
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo " ";
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "year", array())) {
            echo "(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "year", array()), "html", null, true);
            echo ")";
        }
        echo "</h3>
        ";
        // line 108
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array())) {
            // line 109
            echo "        <h4 class=\"pmd-ProgrammeDetailsMiniSummary-subheading\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array()), "html", null, true);
            echo "</h4>
        ";
        }
        // line 111
        echo "        <p class=\"pmd-ProgrammeDetailsMiniSummary-sentence\">
          ";
        // line 112
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "summary", array())) {
            // line 113
            echo "            ";
            echo $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "summary", array());
            echo "
          ";
        } else {
            // line 115
            echo "          ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No summary for this program", array(), "messages");
            // line 116
            echo "          ";
        }
        // line 117
        echo "        </p>
      </div>

      ";
        // line 120
        if ((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts"))) {
            // line 121
            echo "      <div class=\"pmd-ProgrammeDetailsCasting\">

        <ul class=\"pmd-ProgrammeDetailsCasting-headingList\">
          ";
            // line 124
            if ($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "according_to", array(), "any", true, true)) {
                // line 125
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "according_to", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                    // line 126
                    echo "          <li class=\"pmd-ProgrammeDetailsCasting-headingListItem\">
            <p class=\"pmd-ProgrammeDetailsCasting-headingWord\">";
                    // line 127
                    echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                    echo " :</p>
            <ul class=\"pmd-ProgrammeDetailsCasting-contentList\">
              ";
                    // line 129
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                        // line 130
                        echo "              <li class=\"pmd-ProgrammeDetailsCasting-contentListItem\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                        if ($this->getAttribute($context["cast"], "role", array())) {
                            echo " (";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                            echo ")";
                        }
                        echo "</li>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 132
                    echo "            </ul>
          </li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 135
                echo "          ";
            }
            // line 136
            echo "
          ";
            // line 137
            if ($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", true, true)) {
                // line 138
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                    // line 139
                    echo "          <li class=\"pmd-ProgrammeDetailsCasting-headingListItem\">
            <p class=\"pmd-ProgrammeDetailsCasting-headingWord\">";
                    // line 140
                    echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                    echo " :</p>
            <ul class=\"pmd-ProgrammeDetailsCasting-contentList\">
              ";
                    // line 142
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                        // line 143
                        echo "              <li class=\"pmd-ProgrammeDetailsCasting-contentListItem\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                        if ($this->getAttribute($context["cast"], "role", array())) {
                            echo " (";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                            echo ")";
                        }
                        echo "</li>
              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 145
                    echo "            </ul>
          </li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 148
                echo "          ";
            }
            // line 149
            echo "        </ul>

      </div>
      ";
        }
        // line 153
        echo "
    </div>

    <div class=\"pmd-js-ProgrammeDetails-broadcastContent pmd-ProgrammeDetailsBroadcast\">

      <ul class=\"pmd-ProgrammeDetailsBroadcast-list\">
        ";
        // line 159
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
            // line 160
            echo "        ";
            ob_start();
            // line 161
            echo "        <li class=\"pmd-ProgrammeDetailsBroadcast-listItem\">
          ";
            // line 162
            echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>%date%</strong> at %hour% on %channel%", array("%date%" => twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($this->getAttribute($context["broadcast"], "start", array()))), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short")), "%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array())), "messages");
            // line 165
            echo "        </li>
        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 167
            echo "        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 168
            echo "        <li class=\"pmd-ProgrammeDetailsBroadcast-listItem\">
          ";
            // line 169
            echo $this->env->getExtension('translator')->getTranslator()->trans("No rebroadcast for <strong>%program%</strong> in the next 7 days.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            // line 172
            echo "        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 174
        echo "      </ul>

    </div>

  </div>

  ";
        // line 180
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 181
            echo "  <div id=\"taboola-fiche-programme-mobile\"></div>
  ";
        }
        // line 183
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programme-tv/index_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  450 => 183,  446 => 181,  444 => 180,  436 => 174,  429 => 172,  427 => 169,  424 => 168,  419 => 167,  415 => 165,  413 => 162,  410 => 161,  407 => 160,  402 => 159,  394 => 153,  388 => 149,  385 => 148,  377 => 145,  363 => 143,  359 => 142,  354 => 140,  351 => 139,  346 => 138,  344 => 137,  341 => 136,  338 => 135,  330 => 132,  316 => 130,  312 => 129,  307 => 127,  304 => 126,  299 => 125,  297 => 124,  292 => 121,  290 => 120,  285 => 117,  282 => 116,  279 => 115,  273 => 113,  271 => 112,  268 => 111,  262 => 109,  260 => 108,  250 => 107,  243 => 102,  237 => 99,  231 => 96,  228 => 95,  226 => 94,  220 => 90,  217 => 89,  213 => 87,  211 => 86,  208 => 85,  204 => 83,  202 => 82,  196 => 79,  193 => 78,  190 => 77,  188 => 76,  183 => 73,  177 => 70,  174 => 69,  172 => 68,  167 => 65,  157 => 60,  153 => 58,  150 => 57,  147 => 56,  144 => 55,  141 => 54,  138 => 53,  135 => 52,  132 => 51,  129 => 50,  126 => 49,  124 => 48,  121 => 47,  111 => 42,  107 => 40,  105 => 39,  102 => 38,  96 => 35,  91 => 34,  89 => 33,  83 => 30,  80 => 29,  76 => 27,  72 => 25,  70 => 24,  67 => 23,  63 => 21,  61 => 20,  53 => 15,  49 => 13,  45 => 11,  39 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-ProgrammeDetails">*/
/* */
/*   <div class="pmd-ProgrammeDetailsHeading pmd-Cf">*/
/* */
/*     {% if program.trailer %}*/
/*     <a class="pmd-ProgrammeDetailsHeading-preview" rel="nofollow" target="_blank" href="/trailer/{{ program.id }}/?autoplay=1">*/
/*     {% else %}*/
/*     <div class="pmd-ProgrammeDetailsHeading-preview">*/
/*     {% endif %}*/
/* */
/*       <img*/
/*         src="{{ program.images.medium|default(apps_base_url ~ "/images/tv-default-mobile.svg") }}"*/
/*         width="107"*/
/*         height="80"*/
/*       />*/
/* */
/*       {% if program.trailer %}*/
/*       <span class="pmd-TrailerIcon pmd-Icons-trailer pmd-ProgrammeDetailsHeading-preview-trailer"></span>*/
/*       {% endif %}*/
/* */
/*     {% if program.trailer %}*/
/*     </a>*/
/*     {% else %}*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*     <h2 class="pmd-ProgrammeDetailsHeading-title">{{ program.fulltitle }}</h2>*/
/* */
/*     <div class="pmd-ProgrammeDetailsHeading-info">*/
/*       {% if program.gender %}*/
/*       <span class="pmd-ProgrammeGenre pmd-ProgrammeGenre--{{ program.gender_id }} pmd-ProgrammeGenre--white pmd-ProgrammeGenre--small">*/
/*         {{ program.gender }}*/
/*       </span>*/
/*       {% endif %}*/
/* */
/*       {% if program.stars > 0 %}*/
/*       <span class="pmd-ProgrammeDetailsHeading-stars">*/
/*         <img*/
/*           src="{{ apps_base_url }}/images/stars-{{ program.stars }}-mobile.svg"*/
/*           width="36"*/
/*         />*/
/*       </span>*/
/*       {% endif %}*/
/* */
/*       {% if program.csa_id and program.csa_id != 1 %}*/
/*         {% if program.csa_id == 2 %}*/
/*           {% set csa_id = 10 %}*/
/*         {% elseif program.csa_id == 3 %}*/
/*           {% set csa_id = 12 %}*/
/*         {% elseif program.csa_id == 4 %}*/
/*           {% set csa_id = 16 %}*/
/*         {% elseif program.csa_id == 5 %}*/
/*           {% set csa_id = 18 %}*/
/*         {% endif %}*/
/*       <span class="pmd-ProgrammeDetailsHeading-ageLimitation">*/
/*         <img*/
/*           src="{{ apps_base_url }}/images/csa-{{ csa_id }}-mobile.svg"*/
/*           width="15"*/
/*         />*/
/*       </span>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/* */
/*     {% if program.duration %}*/
/*     <div class="pmd-ProgrammeDetailsHeading-time">*/
/*       <em>{{ program.duration|diff_for_humans }}</em>*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*   </div>*/
/* */
/*   {% if is_live %}*/
/*     {% if is_live.broadcast.channel.streamable %}*/
/*     <a*/
/*       href="{{ path('television_channel_single', {'channel_id': is_live.broadcast.channel.id, 'channel_alias': is_live.broadcast.channel.alias}) }}"*/
/*       class="pmd-ProgrammeDetailsLive"*/
/*     >*/
/*       {% trans %}This program is on air. Watch it now.{% endtrans %}*/
/*     </a>*/
/*     {% else %}*/
/*     <div class="pmd-ProgrammeDetailsLive">*/
/*       {% trans %}This program is on air.{% endtrans %}*/
/*     </div>*/
/*     {% endif %}*/
/*   {% endif %}*/
/* */
/*   <div class="pmd-ProgrammeDetailsContent">*/
/* */
/*     <div class="pmd-Heading pmd-Heading--2x pmd-Heading--light">*/
/*     {% spaceless %}*/
/*       <a href="#" class="pmd-js-ProgrammeDetails-summary pmd-Heading-words">*/
/*         <span>{% trans %}Summary{% endtrans %}</span>*/
/*       </a>*/
/*       <a href="#" class="pmd-js-ProgrammeDetails-broadcast pmd-Heading-words">*/
/*         <span>{% trans %}Rebroadcasts{% endtrans %}</span>*/
/*       </a>*/
/*     {% endspaceless %}*/
/*     </div>*/
/* */
/*     <div class="pmd-js-ProgrammeDetails-summaryContent pmd-ProgrammeDetailsSummary">*/
/* */
/*       <div class="pmd-ProgrammeDetailsMiniSummary">*/
/*         <h3 class="pmd-ProgrammeDetailsMiniSummary-heading">{{ program.fulltitle }} {% if program.year %}({{ program.year }}){% endif %}</h3>*/
/*         {% if program.subtitle %}*/
/*         <h4 class="pmd-ProgrammeDetailsMiniSummary-subheading">{{ program.subtitle }}</h4>*/
/*         {% endif %}*/
/*         <p class="pmd-ProgrammeDetailsMiniSummary-sentence">*/
/*           {% if program.summary %}*/
/*             {{ program.summary|raw }}*/
/*           {% else %}*/
/*           {% trans %}No summary for this program{% endtrans %}*/
/*           {% endif %}*/
/*         </p>*/
/*       </div>*/
/* */
/*       {% if casts %}*/
/*       <div class="pmd-ProgrammeDetailsCasting">*/
/* */
/*         <ul class="pmd-ProgrammeDetailsCasting-headingList">*/
/*           {% if casts.according_to is defined %}*/
/*           {% for status in casts.according_to %}*/
/*           <li class="pmd-ProgrammeDetailsCasting-headingListItem">*/
/*             <p class="pmd-ProgrammeDetailsCasting-headingWord">{{ status.status }} :</p>*/
/*             <ul class="pmd-ProgrammeDetailsCasting-contentList">*/
/*               {% for cast in status.casts %}*/
/*               <li class="pmd-ProgrammeDetailsCasting-contentListItem">{{ cast.fullname }}{% if cast.role %} ({{ cast.role }}){% endif %}</li>*/
/*               {% endfor %}*/
/*             </ul>*/
/*           </li>*/
/*           {% endfor %}*/
/*           {% endif %}*/
/* */
/*           {% if casts.casting is defined %}*/
/*           {% for status in casts.casting %}*/
/*           <li class="pmd-ProgrammeDetailsCasting-headingListItem">*/
/*             <p class="pmd-ProgrammeDetailsCasting-headingWord">{{ status.status }} :</p>*/
/*             <ul class="pmd-ProgrammeDetailsCasting-contentList">*/
/*               {% for cast in status.casts %}*/
/*               <li class="pmd-ProgrammeDetailsCasting-contentListItem">{{ cast.fullname }}{% if cast.role %} ({{ cast.role }}){% endif %}</li>*/
/*               {% endfor %}*/
/*             </ul>*/
/*           </li>*/
/*           {% endfor %}*/
/*           {% endif %}*/
/*         </ul>*/
/* */
/*       </div>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/* */
/*     <div class="pmd-js-ProgrammeDetails-broadcastContent pmd-ProgrammeDetailsBroadcast">*/
/* */
/*       <ul class="pmd-ProgrammeDetailsBroadcast-list">*/
/*         {% for broadcast in broadcasts %}*/
/*         {% spaceless %}*/
/*         <li class="pmd-ProgrammeDetailsBroadcast-listItem">*/
/*           {% trans with {'%date%': date_for_humans(broadcast.start)|capitalize, '%hour%': broadcast.start|localizeddate('none', 'short'), '%channel%': broadcast.channel.name} %}*/
/*           <strong>%date%</strong> at %hour% on %channel%*/
/*           {% endtrans %}*/
/*         </li>*/
/*         {% endspaceless %}*/
/*         {% else %}*/
/*         <li class="pmd-ProgrammeDetailsBroadcast-listItem">*/
/*           {% trans with {'%program%': program.fulltitle} %}*/
/*           No rebroadcast for <strong>%program%</strong> in the next 7 days.*/
/*           {% endtrans %}*/
/*         </li>*/
/*         {% endfor %}*/
/*       </ul>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* */
/*   {% if is_website_fr %}*/
/*   <div id="taboola-fiche-programme-mobile"></div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
