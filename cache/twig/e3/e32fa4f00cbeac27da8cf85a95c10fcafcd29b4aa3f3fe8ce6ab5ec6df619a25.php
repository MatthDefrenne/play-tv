<?php

/* controllers/programme-tv/_details.twig */
class __TwigTemplate_bc6fac9677eab5be2cb0db14f703806d702d73093de2f54ea90b5b82e2897875 extends Twig_Template
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
";
        // line 5
        if ( !(null === $this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "images", array()), "medium", array()))) {
            // line 6
            echo "<div class=\"program-img margin\">
  <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "images", array()), "medium", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
            echo "\" width=\"160\" height=\"120\">
  <div class=\"cache\"></div>
</div>
";
        }
        // line 11
        echo "
<h3>";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Genre", array(), "messages");
        echo "</h3>
<div class=\"content\">
  <p class=\"program-gender\">
    ";
        // line 15
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender", array())) {
            // line 16
            echo "      <span class=\"program-gender-icon program-gender-icon";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender_id", array()), "html", null, true);
            echo "\"></span>
      <span>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender", array()), "html", null, true);
            echo "</span>
    ";
        } else {
            // line 19
            echo "      <span>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Unknown genre", array(), "messages");
            echo "</span>
    ";
        }
        // line 21
        echo "  </p>
</div>

";
        // line 24
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subgender", array())) {
            // line 25
            echo "<h3>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Sub-genre", array(), "messages");
            echo "</h3>
<div class=\"content\">
  <p>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subgender", array()), "html", null, true);
            echo "</p>
</div>
";
        }
        // line 30
        echo "
<h3>";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("More infos", array(), "messages");
        echo "</h3>
<div id=\"program-more-infos\" class=\"content\">
  ";
        // line 33
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "year", array())) {
            // line 34
            echo "    <p>
      <span class=\"label small\">";
            // line 35
            echo $this->env->getExtension('translator')->getTranslator()->trans("Year", array(), "messages");
            echo "</span> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "year", array()), "html", null, true);
            echo "
    </p>
  ";
        }
        // line 38
        echo "  ";
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "duration", array())) {
            // line 39
            echo "    <p>
      <span class=\"label small\">";
            // line 40
            echo $this->env->getExtension('translator')->getTranslator()->trans("Duration", array(), "messages");
            echo "</span> <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "duration", array())), "html", null, true);
            echo "</span>
    </p>
  ";
        }
        // line 43
        echo "
  ";
        // line 44
        if (((isset($context["output"]) ? $context["output"] : $this->getContext($context, "output")) == "complete")) {
            // line 45
            echo "    <p>
      <span class=\"label small\"><strong>";
            // line 46
            echo $this->env->getExtension('translator')->getTranslator()->trans("Subtitles", array(), "messages");
            echo "</strong></span> <span class=\"clear-grey\">&mdash;</span>
    </p>
    ";
            // line 48
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "episode", array())) {
                // line 49
                echo "    <p>
      <span class=\"label small\">";
                // line 50
                echo $this->env->getExtension('translator')->getTranslator()->trans("Episode", array(), "messages");
                echo "</span>
      <span>
        ";
                // line 52
                if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "episodes", array())) {
                    // line 53
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("%episode% of %episodes%", array("%episode%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "episode", array()), "%episodes%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "episodes", array())), "messages");
                    // line 54
                    echo "        ";
                } else {
                    // line 55
                    echo "          ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "episode", array()), "html", null, true);
                    echo "
        ";
                }
                // line 57
                echo "      </span>
    </p>
    ";
            }
            // line 60
            echo "    ";
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "season", array())) {
                // line 61
                echo "    <p>
      <span class=\"label small\">";
                // line 62
                echo $this->env->getExtension('translator')->getTranslator()->trans("Season", array(), "messages");
                echo "</span> <span>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "season", array()), "html", null, true);
                echo "</span>
    </p>
    ";
            }
            // line 65
            echo "    ";
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "part", array())) {
                // line 66
                echo "    <p>
      <span class=\"label small\">";
                // line 67
                echo $this->env->getExtension('translator')->getTranslator()->trans("Part", array(), "messages");
                echo "</span>
      <span>
        ";
                // line 69
                if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "parts", array())) {
                    // line 70
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("%part% of %parts%", array("%part%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "part", array()), "%parts%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "parts", array())), "messages");
                    // line 71
                    echo "        ";
                } else {
                    // line 72
                    echo "          ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "part", array()), "html", null, true);
                    echo "
        ";
                }
                // line 74
                echo "      </span>
    </p>
    ";
            }
            // line 77
            echo "  ";
        }
        // line 78
        echo "
</div>

";
        // line 81
        if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) && ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) != 1))) {
            // line 82
            echo "  ";
            if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 2)) {
                // line 83
                echo "    ";
                $context["csa_id"] = 10;
                // line 84
                echo "  ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 3)) {
                // line 85
                echo "    ";
                $context["csa_id"] = 12;
                // line 86
                echo "  ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 4)) {
                // line 87
                echo "    ";
                $context["csa_id"] = 16;
                // line 88
                echo "  ";
            } elseif (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa_id", array()) == 5)) {
                // line 89
                echo "    ";
                $context["csa_id"] = 18;
                // line 90
                echo "  ";
            }
            // line 91
            echo "<h3>Classification</h3>
<div class=\"content\">
  <p class=\"pmd-ProgramCsa\">
    ";
            // line 94
            ob_start();
            // line 95
            echo "    <svg role=\"img\" class=\"pmd-Svg pmd-Svg--minus";
            echo twig_escape_filter($this->env, (isset($context["csa_id"]) ? $context["csa_id"] : $this->getContext($context, "csa_id")), "html", null, true);
            echo " pmd-ProgramCsa-icon\">
      <use xlink:href=\"#pmd-Svg--minus";
            // line 96
            echo twig_escape_filter($this->env, (isset($context["csa_id"]) ? $context["csa_id"] : $this->getContext($context, "csa_id")), "html", null, true);
            echo "\"></use>
    </svg>
    <span>";
            // line 98
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "csa", array()), "html", null, true);
            echo "</span>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 100
            echo "  </p>
</div>
";
        }
        // line 103
        echo "
";
        // line 104
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "hashtag", array())) {
            // line 105
            echo "<div class=\"official-twitter-hashtag\">
  <h3 title=\"";
            // line 106
            echo $this->env->getExtension('translator')->getTranslator()->trans("Twitter Official hashtag", array(), "messages");
            echo "\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Official hashtag", array(), "messages");
            echo "</h3>
  <div class=\"content\">
    <a href=\"https://twitter.com/search?q=";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "hashtag", array()), "html", null, true);
            echo "&amp;src=hash&amp;mode=realtime\" target=\"_blank\" title=\"#";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "hashtag", array()), "html", null, true);
            echo "\" rel=\"nofollow\">
      ";
            // line 109
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "hashtag", array()), "html", null, true);
            echo "
    </a>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/programme-tv/_details.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  294 => 109,  288 => 108,  281 => 106,  278 => 105,  276 => 104,  273 => 103,  268 => 100,  263 => 98,  258 => 96,  253 => 95,  251 => 94,  246 => 91,  243 => 90,  240 => 89,  237 => 88,  234 => 87,  231 => 86,  228 => 85,  225 => 84,  222 => 83,  219 => 82,  217 => 81,  212 => 78,  209 => 77,  204 => 74,  198 => 72,  195 => 71,  192 => 70,  190 => 69,  185 => 67,  182 => 66,  179 => 65,  171 => 62,  168 => 61,  165 => 60,  160 => 57,  154 => 55,  151 => 54,  148 => 53,  146 => 52,  141 => 50,  138 => 49,  136 => 48,  131 => 46,  128 => 45,  126 => 44,  123 => 43,  115 => 40,  112 => 39,  109 => 38,  101 => 35,  98 => 34,  96 => 33,  91 => 31,  88 => 30,  82 => 27,  76 => 25,  74 => 24,  69 => 21,  63 => 19,  58 => 17,  53 => 16,  51 => 15,  45 => 12,  42 => 11,  33 => 7,  30 => 6,  28 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if output is not defined %}*/
/*   {% set output = "incomplete" %}*/
/* {% endif %}*/
/* */
/* {% if program.images.medium is not null %}*/
/* <div class="program-img margin">*/
/*   <img src="{{ program.images.medium }}" alt="{{ program.fulltitle }}" width="160" height="120">*/
/*   <div class="cache"></div>*/
/* </div>*/
/* {% endif %}*/
/* */
/* <h3>{% trans %}Genre{% endtrans %}</h3>*/
/* <div class="content">*/
/*   <p class="program-gender">*/
/*     {% if program.gender %}*/
/*       <span class="program-gender-icon program-gender-icon{{ program.gender_id }}"></span>*/
/*       <span>{{ program.gender }}</span>*/
/*     {% else %}*/
/*       <span>{% trans %}Unknown genre{% endtrans %}</span>*/
/*     {% endif %}*/
/*   </p>*/
/* </div>*/
/* */
/* {% if program.subgender %}*/
/* <h3>{% trans %}Sub-genre{% endtrans %}</h3>*/
/* <div class="content">*/
/*   <p>{{ program.subgender }}</p>*/
/* </div>*/
/* {% endif %}*/
/* */
/* <h3>{% trans %}More infos{% endtrans %}</h3>*/
/* <div id="program-more-infos" class="content">*/
/*   {% if program.year %}*/
/*     <p>*/
/*       <span class="label small">{% trans %}Year{% endtrans %}</span> {{ program.year }}*/
/*     </p>*/
/*   {% endif %}*/
/*   {% if program.duration %}*/
/*     <p>*/
/*       <span class="label small">{% trans %}Duration{% endtrans %}</span> <span>{{ program.duration|diff_for_humans }}</span>*/
/*     </p>*/
/*   {% endif %}*/
/* */
/*   {% if output == "complete" %}*/
/*     <p>*/
/*       <span class="label small"><strong>{% trans %}Subtitles{% endtrans %}</strong></span> <span class="clear-grey">&mdash;</span>*/
/*     </p>*/
/*     {% if program.episode %}*/
/*     <p>*/
/*       <span class="label small">{% trans %}Episode{% endtrans %}</span>*/
/*       <span>*/
/*         {% if program.episodes %}*/
/*           {% trans with {'%episode%': program.episode, '%episodes%': program.episodes} %}%episode% of %episodes%{% endtrans %}*/
/*         {% else %}*/
/*           {{ program.episode }}*/
/*         {% endif %}*/
/*       </span>*/
/*     </p>*/
/*     {% endif %}*/
/*     {% if program.season %}*/
/*     <p>*/
/*       <span class="label small">{% trans %}Season{% endtrans %}</span> <span>{{ program.season }}</span>*/
/*     </p>*/
/*     {% endif %}*/
/*     {% if program.part %}*/
/*     <p>*/
/*       <span class="label small">{% trans %}Part{% endtrans %}</span>*/
/*       <span>*/
/*         {% if program.parts %}*/
/*           {% trans with {'%part%': program.part, '%parts%': program.parts} %}%part% of %parts%{% endtrans %}*/
/*         {% else %}*/
/*           {{ program.part }}*/
/*         {% endif %}*/
/*       </span>*/
/*     </p>*/
/*     {% endif %}*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* {% if program.csa_id and program.csa_id != 1 %}*/
/*   {% if program.csa_id == 2 %}*/
/*     {% set csa_id = 10 %}*/
/*   {% elseif program.csa_id == 3 %}*/
/*     {% set csa_id = 12 %}*/
/*   {% elseif program.csa_id == 4 %}*/
/*     {% set csa_id = 16 %}*/
/*   {% elseif program.csa_id == 5 %}*/
/*     {% set csa_id = 18 %}*/
/*   {% endif %}*/
/* <h3>Classification</h3>*/
/* <div class="content">*/
/*   <p class="pmd-ProgramCsa">*/
/*     {% spaceless %}*/
/*     <svg role="img" class="pmd-Svg pmd-Svg--minus{{ csa_id }} pmd-ProgramCsa-icon">*/
/*       <use xlink:href="#pmd-Svg--minus{{ csa_id }}"></use>*/
/*     </svg>*/
/*     <span>{{ program.csa }}</span>*/
/*   {% endspaceless %}*/
/*   </p>*/
/* </div>*/
/* {% endif %}*/
/* */
/* {% if program.hashtag %}*/
/* <div class="official-twitter-hashtag">*/
/*   <h3 title="{% trans %}Twitter Official hashtag{% endtrans %}">{% trans %}Official hashtag{% endtrans %}</h3>*/
/*   <div class="content">*/
/*     <a href="https://twitter.com/search?q={{ program.hashtag }}&amp;src=hash&amp;mode=realtime" target="_blank" title="#{{ program.hashtag }}" rel="nofollow">*/
/*       {{ program.hashtag }}*/
/*     </a>*/
/*   </div>*/
/* </div>*/
/* {% endif %}*/
/* */
