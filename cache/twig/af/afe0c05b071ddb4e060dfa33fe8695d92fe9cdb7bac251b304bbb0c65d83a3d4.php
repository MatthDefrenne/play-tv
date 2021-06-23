<?php

/* controllers/programme-tv/_resume.twig */
class __TwigTemplate_59095ea0eb7175faea30c2f33503d8296592477afa68577357e42d3c56843b91 extends Twig_Template
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
        if ( !array_key_exists("output", $context)) {
            // line 2
            echo "  ";
            $context["output"] = "incomplete";
        }
        // line 4
        echo "
<div class=\"margin\">

  <div class=\"program-summary text padding bigger\">
  ";
        // line 8
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "summary", array())) {
            // line 9
            echo "    ";
            echo $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "summary", array());
            echo "
  ";
        } else {
            // line 11
            echo "    <p>
      ";
            // line 12
            echo $this->env->getExtension('translator')->getTranslator()->trans("No summary for <strong>%program%</strong>", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            echo " <span class=\"clear-grey\">—</span>
    </p>
  ";
        }
        // line 15
        echo "  </div>

  ";
        // line 17
        if (((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")) == "complete")) {
            // line 18
            echo "  ";
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "trailer", array())) {
                // line 19
                echo "  <p class=\"text clear-grey\">
    ";
                // line 20
                echo $this->env->getExtension('translator')->getTranslator()->trans("Watch the <strong>trailer</strong>", array(), "messages");
                // line 21
                echo "  </p>
  <iframe class=\"ptv-js-TrailerIframe ptv-TrailerIframe\" onload=\"lzld(this)\" src=\"about:blank\" data-src=\"/trailer/";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "id", array()), "html", null, true);
                echo "/?autoplay=1&skin=minimal\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\"></iframe>
  ";
            }
            // line 24
            echo "  ";
        }
        // line 25
        echo "
  ";
        // line 26
        if (((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")) == "complete")) {
            // line 27
            echo "    ";
            if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                // line 28
                echo "    <div id=\"taboola-fiche-programme-desktop\" class=\"pmd-js-AdsTaboola pmd-AdsTaboola\"></div>
    ";
            }
            // line 30
            echo "  ";
        } else {
            // line 31
            echo "    ";
            if (((((            // line 32
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))) &&             // line 33
(isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) && ((isset($context["taboola"]) ? $context["taboola"] : $this->getContext($context, "taboola")) != false))) {
                // line 35
                echo "    <iframe
      class=\"pmd-AdsTaboola\"
      onload=\"lzld(this)\"
      src=\"about:blank\"
      data-src=\"/ad/taboola/\"
      frameborder=\"0\"
      scrolling=\"no\"
      width=\"100%\"
    >
    </iframe>
    ";
            }
            // line 46
            echo "  ";
        }
        // line 47
        echo "
  ";
        // line 48
        if ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 83, array(), "array", true, true)) {
            // line 49
            echo "    ";
            $context["section_title"] = $this->env->getExtension('translator')->trans("Presented by");
            // line 50
            echo "    ";
            $context["primary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 83, array(), "array"), "casts", array());
            // line 51
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 29, array(), "array", true, true)) {
            // line 52
            echo "    ";
            $context["section_title"] = $this->env->getExtension('translator')->trans("Created by");
            // line 53
            echo "    ";
            $context["primary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 29, array(), "array"), "casts", array());
            // line 54
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 88, array(), "array", true, true)) {
            // line 55
            echo "    ";
            $context["section_title"] = $this->env->getExtension('translator')->trans("Directed by");
            // line 56
            echo "    ";
            $context["primary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 88, array(), "array"), "casts", array());
            // line 57
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 90, array(), "array", true, true)) {
            // line 58
            echo "    ";
            $context["section_title"] = $this->env->getExtension('translator')->trans("Screenplay by");
            // line 59
            echo "    ";
            $context["primary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 90, array(), "array"), "casts", array());
            // line 60
            echo "  ";
        } else {
            // line 61
            echo "    ";
            $context["section_title"] = "";
            // line 62
            echo "    ";
            $context["primary_casts"] = null;
            // line 63
            echo "  ";
        }
        // line 64
        echo "
  ";
        // line 65
        if ((isset($context["primary_casts"]) ? $context["primary_casts"] : $this->getContext($context, "primary_casts"))) {
            // line 66
            echo "  <div class=\"mini-casting text\">
    <p>
      <strong>";
            // line 68
            echo twig_escape_filter($this->env, (isset($context["section_title"]) ? $context["section_title"] : $this->getContext($context, "section_title")), "html", null, true);
            echo "</strong>
      ";
            // line 69
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["primary_casts"]) ? $context["primary_casts"] : $this->getContext($context, "primary_casts")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                // line 70
                echo "      ";
                if (($this->getAttribute($context["loop"], "index", array()) < 4)) {
                    // line 71
                    echo "        <strong>
          <a href=\"";
                    // line 72
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "</a>
        </strong>
        ";
                    // line 74
                    if ((($this->getAttribute($context["loop"], "index", array()) == 3) && ($this->getAttribute($context["loop"], "last", array()) == false))) {
                        // line 75
                        echo "        <span class=\"clear-grey\">...</span>
        ";
                    } elseif ((($this->getAttribute(                    // line 76
$context["loop"], "index", array()) < 4) && ($this->getAttribute($context["loop"], "last", array()) == false))) {
                        // line 77
                        echo "        <span class=\"bullet\">&bull;</span>
        ";
                    }
                    // line 79
                    echo "      ";
                }
                // line 80
                echo "      ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 81
            echo "    </p>
  </div>
  ";
        }
        // line 84
        echo "
  ";
        // line 85
        if ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 2, array(), "array", true, true)) {
            // line 86
            echo "    ";
            $context["secondary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 2, array(), "array"), "casts", array());
            // line 87
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 65, array(), "array", true, true)) {
            // line 88
            echo "    ";
            $context["secondary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 65, array(), "array"), "casts", array());
            // line 89
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 17, array(), "array", true, true)) {
            // line 90
            echo "    ";
            $context["secondary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 17, array(), "array"), "casts", array());
            // line 91
            echo "  ";
        } elseif ($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", false, true), 66, array(), "array", true, true)) {
            // line 92
            echo "    ";
            $context["secondary_casts"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()), 66, array(), "array"), "casts", array());
            // line 93
            echo "  ";
        } else {
            // line 94
            echo "    ";
            $context["secondary_casts"] = null;
            // line 95
            echo "  ";
        }
        // line 96
        echo "
  ";
        // line 97
        if ((isset($context["secondary_casts"]) ? $context["secondary_casts"] : $this->getContext($context, "secondary_casts"))) {
            // line 98
            echo "  <div class=\"mini-casting text\">
    <p>
      <strong>";
            // line 100
            echo $this->env->getExtension('translator')->getTranslator()->trans("With", array(), "messages");
            echo "</strong>
      ";
            // line 101
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["secondary_casts"]) ? $context["secondary_casts"] : $this->getContext($context, "secondary_casts")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                // line 102
                echo "      ";
                if (($this->getAttribute($context["loop"], "index", array()) < 4)) {
                    // line 103
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "</a>
        ";
                    // line 104
                    if ((($this->getAttribute($context["loop"], "index", array()) == 3) && ($this->getAttribute($context["loop"], "last", array()) == false))) {
                        // line 105
                        echo "        <span class=\"clear-grey\">...</span>
        ";
                    } elseif ((($this->getAttribute(                    // line 106
$context["loop"], "index", array()) < 4) && ($this->getAttribute($context["loop"], "last", array()) == false))) {
                        // line 107
                        echo "        <span class=\"bullet\">&bull;</span>
        ";
                    }
                    // line 109
                    echo "      ";
                }
                // line 110
                echo "      ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "    </p>
  </div>
  ";
        }
        // line 114
        echo "
</div>

";
        // line 117
        if (((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")) == "complete")) {
            // line 118
            if (((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")) && (twig_length_filter($this->env, (isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts"))) > 0))) {
                // line 119
                echo "<h2 class=\"block-title\">
  ";
                // line 120
                echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Next broadcasts</strong> on TV", array(), "messages");
                // line 121
                echo "</h2>
";
                // line 122
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, (isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")), 0, 2));
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
                foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
                    // line 123
                    if ($this->getAttribute($context["loop"], "first", array())) {
                        // line 124
                        echo "<div class=\"program-broadcasts clearfix\">
";
                    }
                    // line 126
                    echo "
  <div class=\"program-broadcast text\">
    <a class=\"channel-img channel-img-mini\" href=\"";
                    // line 128
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "alias", array()))), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "\">
      <span>";
                    // line 129
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array())), "messages");
                    echo "</span>
      <img src=\"";
                    // line 130
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "images", array()), "mini", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "\" width=\"36\" height=\"36\" />
    </a>
    <p>
      <small title=\"";
                    // line 133
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($this->getAttribute($context["broadcast"], "start", array()))), "html", null, true);
                    echo "</small>
      <br>
      ";
                    // line 135
                    echo $this->env->getExtension('translator')->getTranslator()->trans("On <strong>%channel%</strong> at <strong>%hour%</strong>", array("%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short"))), "messages");
                    // line 138
                    echo "    </p>
  </div>

";
                    // line 141
                    if ($this->getAttribute($context["loop"], "last", array())) {
                        // line 142
                        echo "</div>
";
                    }
                    // line 144
                    echo "
";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 146
                echo "
";
            }
        }
    }

    public function getTemplateName()
    {
        return "controllers/programme-tv/_resume.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  444 => 146,  429 => 144,  425 => 142,  423 => 141,  418 => 138,  416 => 135,  409 => 133,  401 => 130,  397 => 129,  391 => 128,  387 => 126,  383 => 124,  381 => 123,  364 => 122,  361 => 121,  359 => 120,  356 => 119,  354 => 118,  352 => 117,  347 => 114,  342 => 111,  328 => 110,  325 => 109,  321 => 107,  319 => 106,  316 => 105,  314 => 104,  305 => 103,  302 => 102,  285 => 101,  281 => 100,  277 => 98,  275 => 97,  272 => 96,  269 => 95,  266 => 94,  263 => 93,  260 => 92,  257 => 91,  254 => 90,  251 => 89,  248 => 88,  245 => 87,  242 => 86,  240 => 85,  237 => 84,  232 => 81,  218 => 80,  215 => 79,  211 => 77,  209 => 76,  206 => 75,  204 => 74,  195 => 72,  192 => 71,  189 => 70,  172 => 69,  168 => 68,  164 => 66,  162 => 65,  159 => 64,  156 => 63,  153 => 62,  150 => 61,  147 => 60,  144 => 59,  141 => 58,  138 => 57,  135 => 56,  132 => 55,  129 => 54,  126 => 53,  123 => 52,  120 => 51,  117 => 50,  114 => 49,  112 => 48,  109 => 47,  106 => 46,  93 => 35,  91 => 33,  90 => 32,  88 => 31,  85 => 30,  81 => 28,  78 => 27,  76 => 26,  73 => 25,  70 => 24,  65 => 22,  62 => 21,  60 => 20,  57 => 19,  54 => 18,  52 => 17,  48 => 15,  42 => 12,  39 => 11,  33 => 9,  31 => 8,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if output is not defined %}*/
/*   {% set output = "incomplete" %}*/
/* {% endif %}*/
/* */
/* <div class="margin">*/
/* */
/*   <div class="program-summary text padding bigger">*/
/*   {% if program.summary %}*/
/*     {{ program.summary|raw }}*/
/*   {% else %}*/
/*     <p>*/
/*       {% trans with {'%program%': program.fulltitle} %}No summary for <strong>%program%</strong>{% endtrans %} <span class="clear-grey">—</span>*/
/*     </p>*/
/*   {% endif %}*/
/*   </div>*/
/* */
/*   {% if output == "complete" %}*/
/*   {% if program.trailer%}*/
/*   <p class="text clear-grey">*/
/*     {% trans %}Watch the <strong>trailer</strong>{% endtrans %}*/
/*   </p>*/
/*   <iframe class="ptv-js-TrailerIframe ptv-TrailerIframe" onload="lzld(this)" src="about:blank" data-src="/trailer/{{ program.id }}/?autoplay=1&skin=minimal" frameborder="0" scrolling="no" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>*/
/*   {% endif %}*/
/*   {% endif %}*/
/* */
/*   {% if output == "complete" %}*/
/*     {% if is_website_fr %}*/
/*     <div id="taboola-fiche-programme-desktop" class="pmd-js-AdsTaboola pmd-AdsTaboola"></div>*/
/*     {% endif %}*/
/*   {% else %}*/
/*     {% if*/
/*       (is_connected == false or (is_connected and current_account.isPremium() == false)) and*/
/*       is_website_fr and taboola != false*/
/*     %}*/
/*     <iframe*/
/*       class="pmd-AdsTaboola"*/
/*       onload="lzld(this)"*/
/*       src="about:blank"*/
/*       data-src="/ad/taboola/"*/
/*       frameborder="0"*/
/*       scrolling="no"*/
/*       width="100%"*/
/*     >*/
/*     </iframe>*/
/*     {% endif %}*/
/*   {% endif %}*/
/* */
/*   {% if casts.casting[83] is defined %}*/
/*     {% set section_title = "Presented by"|trans %}*/
/*     {% set primary_casts = casts.casting[83].casts %}*/
/*   {% elseif casts.casting[29] is defined %}*/
/*     {% set section_title = "Created by"|trans %}*/
/*     {% set primary_casts = casts.casting[29].casts %}*/
/*   {% elseif casts.casting[88] is defined %}*/
/*     {% set section_title = "Directed by"|trans %}*/
/*     {% set primary_casts = casts.casting[88].casts %}*/
/*   {% elseif casts.casting[90] is defined %}*/
/*     {% set section_title = "Screenplay by"|trans %}*/
/*     {% set primary_casts = casts.casting[90].casts %}*/
/*   {% else %}*/
/*     {% set section_title = "" %}*/
/*     {% set primary_casts = null %}*/
/*   {% endif %}*/
/* */
/*   {% if primary_casts %}*/
/*   <div class="mini-casting text">*/
/*     <p>*/
/*       <strong>{{ section_title }}</strong>*/
/*       {% for cast in primary_casts %}*/
/*       {% if loop.index < 4 %}*/
/*         <strong>*/
/*           <a href="{{ cast.url }}" title="{{ cast.fullname }}">{{ cast.fullname }}</a>*/
/*         </strong>*/
/*         {% if loop.index == 3 and loop.last == false %}*/
/*         <span class="clear-grey">...</span>*/
/*         {% elseif loop.index < 4 and loop.last == false %}*/
/*         <span class="bullet">&bull;</span>*/
/*         {% endif %}*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*     </p>*/
/*   </div>*/
/*   {% endif %}*/
/* */
/*   {% if casts.casting[2] is defined %}*/
/*     {% set secondary_casts = casts.casting[2].casts %}*/
/*   {% elseif casts.casting[65] is defined %}*/
/*     {% set secondary_casts = casts.casting[65].casts %}*/
/*   {% elseif casts.casting[17] is defined %}*/
/*     {% set secondary_casts = casts.casting[17].casts %}*/
/*   {% elseif casts.casting[66] is defined %}*/
/*     {% set secondary_casts = casts.casting[66].casts %}*/
/*   {% else %}*/
/*     {% set secondary_casts = null %}*/
/*   {% endif %}*/
/* */
/*   {% if secondary_casts %}*/
/*   <div class="mini-casting text">*/
/*     <p>*/
/*       <strong>{% trans %}With{% endtrans %}</strong>*/
/*       {% for cast in secondary_casts %}*/
/*       {% if loop.index < 4 %}*/
/*         <a href="{{ cast.url }}" title="{{ cast.fullname }}">{{ cast.fullname }}</a>*/
/*         {% if loop.index == 3 and loop.last == false %}*/
/*         <span class="clear-grey">...</span>*/
/*         {% elseif loop.index < 4 and loop.last == false %}*/
/*         <span class="bullet">&bull;</span>*/
/*         {% endif %}*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*     </p>*/
/*   </div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* {% if output == "complete" %}*/
/* {% if broadcasts and broadcasts|length > 0 %}*/
/* <h2 class="block-title">*/
/*   {% trans %}<strong>Next broadcasts</strong> on TV{% endtrans %}*/
/* </h2>*/
/* {% for broadcast in broadcasts|slice(0, 2) %}*/
/* {% if loop.first %}*/
/* <div class="program-broadcasts clearfix">*/
/* {% endif %}*/
/* */
/*   <div class="program-broadcast text">*/
/*     <a class="channel-img channel-img-mini" href="{{ path('chaine_tv', {'channel_id': broadcast.channel.id, 'channel_alias': broadcast.channel.alias}) }}" title="{{ broadcast.channel.name }}">*/
/*       <span>{% trans with {'%channel%': broadcast.channel.name} %}Watch %channel% live{% endtrans %}</span>*/
/*       <img src="{{ broadcast.channel.images.mini }}" alt="{{ broadcast.channel.name }}" width="36" height="36" />*/
/*     </a>*/
/*     <p>*/
/*       <small title="{{ broadcast.start|localizeddate('full', 'none', locale)|capitalize }}">{{ date_for_humans(broadcast.start)|capitalize }}</small>*/
/*       <br>*/
/*       {% trans with {'%channel%': broadcast.channel.name, '%hour%': broadcast.start|localizeddate('none', 'short')} %}*/
/*       On <strong>%channel%</strong> at <strong>%hour%</strong>*/
/*       {% endtrans %}*/
/*     </p>*/
/*   </div>*/
/* */
/* {% if loop.last %}*/
/* </div>*/
/* {% endif %}*/
/* */
/* {% endfor %}*/
/* */
/* {% endif %}*/
/* {% endif %}*/
/* */
