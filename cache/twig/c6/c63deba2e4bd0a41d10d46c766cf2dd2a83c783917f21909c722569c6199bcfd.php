<?php

/* controllers/widgets/block-live-program-by-channel.twig */
class __TwigTemplate_bc7ef8791a559c8c88b46a9558435380a43a9286b38fc36f8e47c3b903071cf3 extends Twig_Template
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
        echo "
";
        // line 9
        echo "
";
        // line 10
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "social_tv")) {
            // line 11
            echo "
  ";
            // line 12
            if ((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program"))) {
                // line 13
                echo "
    ";
                // line 14
                if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                    // line 15
                    echo "      ";
                    $context["route_params"] = array("channel_alias" => $this->getAttribute(                    // line 16
(isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()));
                    // line 18
                    echo "    ";
                } else {
                    // line 19
                    echo "      ";
                    $context["route_params"] = array("channel_id" => $this->getAttribute(                    // line 20
(isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "channel_alias" => $this->getAttribute(                    // line 21
(isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()));
                    // line 23
                    echo "    ";
                }
                // line 24
                echo "
    <div class=\"margin\">
      <div id=\"current-programme\" class=\"grey-box\">
        <div class=\"block-title xmargin\">
          <a ";
                // line 28
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "streamable", array())) {
                    echo "href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
                    echo "\"";
                }
                echo " title=\"À propos de \" class=\"channel-button channel-button-mini right\">
            <span>";
                // line 29
                echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                echo "</span>
            <img src=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "mini", array()), "html", null, true);
                echo "\" alt=\"\" width=\"36\" height=\"36\">
            <div class=\"cache\"></div>
          </a>
          <h2>
            ";
                // line 34
                echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Social TV ></strong> %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                // line 37
                echo "          </h2>
        </div>
        ";
                // line 39
                if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "images", array()), "medium", array())) {
                    // line 40
                    echo "        <div class=\"preview\">
          <img src=\"";
                    // line 41
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "images", array()), "medium", array()), "html", null, true);
                    echo "\">
        </div>
        ";
                }
                // line 44
                echo "        <p class=\"indication\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Current program", array(), "messages");
                echo "</p>
        <h4>";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "title", array()), "html", null, true);
                echo "</h4>
        <div class=\"time\">
          <div class=\"start-time js-ptv-ProgrammePreview-programStart\" data-value=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "start", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "start", array()), "H:i"), "html", null, true);
                echo "</div>
          <div class=\"progress-bar\" title=\"\">
            <div class=\"cache\"></div>
            <div class=\"blue js-ptv-ProgrammePreview-bar\" style=\"width: ";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "progress", array()), "html", null, true);
                echo "%\"></div>
          </div>
          <div class=\"end-time js-ptv-ProgrammePreview-programEnd\" data-value=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "end", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "end", array()), "H:i"), "html", null, true);
                echo "</div>
        </div>

        <p>";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "summary_long", array()), "html", null, true);
                echo "</p>
        ";
                // line 56
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "streamable", array())) {
                    // line 57
                    echo "          <p class=\"access-to-live\">
            <a href=\"";
                    // line 58
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
                    echo "\" class=\"pmd-Button pmd-Button--xs pmd-Button--success\">Accéder au live</a>
          </p>
        ";
                }
                // line 61
                echo "      </div>
    </div>

  ";
            }
            // line 65
            echo "
";
            // line 69
            echo "
";
        } else {
            // line 71
            echo "  <div id=\"direct-program\">
    <div id=\"programs-now\" class=\"row pmd-LiveProgram\">
      ";
            // line 73
            if ($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : null), "program", array(), "any", true, true)) {
                // line 74
                echo "
        <div class=\"left-menu pmd-LiveProgram-left\">
          ";
                // line 76
                $this->loadTemplate("controllers/programme-tv/_details.twig", "controllers/widgets/block-live-program-by-channel.twig", 76)->display(array_merge($context, array("program" => $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()))));
                // line 77
                echo "        </div>
        <div class=\"pmd-LiveProgram-center\">
          ";
                // line 79
                if ((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel"))) {
                    // line 80
                    echo "            <div class=\"text xmargin\">
              <p class=\"clear-grey\">
                ";
                    // line 82
                    echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Watch %channel%</strong> live online", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                    // line 85
                    echo "              </p>
            </div>
          ";
                }
                // line 88
                echo "          ";
                $this->loadTemplate("controllers/programme-tv/_title.twig", "controllers/widgets/block-live-program-by-channel.twig", 88)->display(array_merge($context, array("program" => $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()))));
                // line 89
                echo "          ";
                $this->loadTemplate("controllers/programme-tv/_resume.twig", "controllers/widgets/block-live-program-by-channel.twig", 89)->display(array_merge($context, array("program" => $this->getAttribute(                // line 90
(isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "casts" => $this->getAttribute(                // line 91
(isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "casts", array()), "taboola" => false)));
                // line 94
                echo "        </div>

      ";
            } else {
                // line 97
                echo "
        <div id=\"background-error\" class=\"span-page\">
          ";
                // line 99
                if ((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel"))) {
                    // line 100
                    echo "            <div class=\"text margin\">
              <p class=\"clear-grey\">
                ";
                    // line 102
                    if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                        // line 103
                        echo "                ";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Listen %channel%</strong> live online", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                        // line 106
                        echo "                ";
                    } else {
                        // line 107
                        echo "                ";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Watch %channel%</strong> live online", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                        // line 110
                        echo "                ";
                    }
                    // line 111
                    echo "              </p>
            </div>
          ";
                }
                // line 114
                echo "          <div class=\"text\">
            <p>
              ";
                // line 116
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                    // line 117
                    echo "              ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("<strong class=\"red\">No information</strong> about online radio.", array(), "messages");
                    // line 120
                    echo "              ";
                } else {
                    // line 121
                    echo "              ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("<strong class=\"red\">No information</strong> about the current TV program.", array(), "messages");
                    // line 124
                    echo "              ";
                }
                // line 125
                echo "            </p>
          </div>
        </div>

      ";
            }
            // line 130
            echo "    </div>
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/block-live-program-by-channel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 130,  242 => 125,  239 => 124,  236 => 121,  233 => 120,  230 => 117,  228 => 116,  224 => 114,  219 => 111,  216 => 110,  213 => 107,  210 => 106,  207 => 103,  205 => 102,  201 => 100,  199 => 99,  195 => 97,  190 => 94,  188 => 91,  187 => 90,  185 => 89,  182 => 88,  177 => 85,  175 => 82,  171 => 80,  169 => 79,  165 => 77,  163 => 76,  159 => 74,  157 => 73,  153 => 71,  149 => 69,  146 => 65,  140 => 61,  134 => 58,  131 => 57,  129 => 56,  125 => 55,  117 => 52,  112 => 50,  104 => 47,  99 => 45,  94 => 44,  88 => 41,  85 => 40,  83 => 39,  79 => 37,  77 => 34,  70 => 30,  66 => 29,  58 => 28,  52 => 24,  49 => 23,  47 => 21,  46 => 20,  44 => 19,  41 => 18,  39 => 16,  37 => 15,  35 => 14,  32 => 13,  30 => 12,  27 => 11,  25 => 10,  22 => 9,  19 => 5,);
    }
}
/* {#*/
/*     @container: #programs-now*/
/*     @data: $channel, $live_program, $context*/
/* #}*/
/* */
/* {#*/
/*     @context: page live tweets*/
/* #}*/
/* */
/* {% if context == 'social_tv' %}*/
/* */
/*   {% if live_program %}*/
/* */
/*     {% if is_website_fr %}*/
/*       {% set route_params = {*/
/*         'channel_alias': channel.alias*/
/*       } %}*/
/*     {% else %}*/
/*       {% set route_params = {*/
/*         'channel_id': channel.id,*/
/*         'channel_alias': channel.alias*/
/*       } %}*/
/*     {% endif %}*/
/* */
/*     <div class="margin">*/
/*       <div id="current-programme" class="grey-box">*/
/*         <div class="block-title xmargin">*/
/*           <a {% if channel.streamable %}href="{{ path('television_channel_single', route_params) }}"{% endif %} title="À propos de " class="channel-button channel-button-mini right">*/
/*             <span>{% trans with {'%channel%': channel.name} %}Watch %channel% live{% endtrans %}</span>*/
/*             <img src="{{ channel.images.mini }}" alt="" width="36" height="36">*/
/*             <div class="cache"></div>*/
/*           </a>*/
/*           <h2>*/
/*             {% trans with {'%channel%': channel.name} %}*/
/*             <strong>Social TV ></strong> %channel%*/
/*             {% endtrans %}*/
/*           </h2>*/
/*         </div>*/
/*         {% if live_program.program.images.medium %}*/
/*         <div class="preview">*/
/*           <img src="{{ live_program.program.images.medium }}">*/
/*         </div>*/
/*         {% endif %}*/
/*         <p class="indication">{% trans %}Current program{% endtrans %}</p>*/
/*         <h4>{{ live_program.program.title }}</h4>*/
/*         <div class="time">*/
/*           <div class="start-time js-ptv-ProgrammePreview-programStart" data-value="{{ live_program.start }}">{{ live_program.start|date('H:i') }}</div>*/
/*           <div class="progress-bar" title="">*/
/*             <div class="cache"></div>*/
/*             <div class="blue js-ptv-ProgrammePreview-bar" style="width: {{ live_program.progress }}%"></div>*/
/*           </div>*/
/*           <div class="end-time js-ptv-ProgrammePreview-programEnd" data-value="{{ live_program.end }}">{{ live_program.end|date('H:i') }}</div>*/
/*         </div>*/
/* */
/*         <p>{{ live_program.program.summary_long }}</p>*/
/*         {% if channel.streamable %}*/
/*           <p class="access-to-live">*/
/*             <a href="{{ path('television_channel_single', route_params) }}" class="pmd-Button pmd-Button--xs pmd-Button--success">Accéder au live</a>*/
/*           </p>*/
/*         {% endif %}*/
/*       </div>*/
/*     </div>*/
/* */
/*   {% endif %}*/
/* */
/* {#*/
/*     @context: page television*/
/* #}*/
/* */
/* {% else %}*/
/*   <div id="direct-program">*/
/*     <div id="programs-now" class="row pmd-LiveProgram">*/
/*       {% if live_program.program is defined %}*/
/* */
/*         <div class="left-menu pmd-LiveProgram-left">*/
/*           {% include "controllers/programme-tv/_details.twig" with {program: live_program.program} %}*/
/*         </div>*/
/*         <div class="pmd-LiveProgram-center">*/
/*           {% if channel %}*/
/*             <div class="text xmargin">*/
/*               <p class="clear-grey">*/
/*                 {% trans with {'%channel%': channel.name} %}*/
/*                 <strong>Watch %channel%</strong> live online*/
/*                 {% endtrans %}*/
/*               </p>*/
/*             </div>*/
/*           {% endif %}*/
/*           {% include "controllers/programme-tv/_title.twig" with {program: live_program.program} %}*/
/*           {% include "controllers/programme-tv/_resume.twig" with {*/
/*             program: live_program.program,*/
/*             casts: live_program.casts,*/
/*             taboola: false*/
/*           } %}*/
/*         </div>*/
/* */
/*       {% else %}*/
/* */
/*         <div id="background-error" class="span-page">*/
/*           {% if channel %}*/
/*             <div class="text margin">*/
/*               <p class="clear-grey">*/
/*                 {% if channel.is_radio %}*/
/*                 {% trans with {'%channel%': channel.name} %}*/
/*                 <strong>Listen %channel%</strong> live online*/
/*                 {% endtrans %}*/
/*                 {% else %}*/
/*                 {% trans with {'%channel%': channel.name} %}*/
/*                 <strong>Watch %channel%</strong> live online*/
/*                 {% endtrans %}*/
/*                 {% endif%}*/
/*               </p>*/
/*             </div>*/
/*           {% endif %}*/
/*           <div class="text">*/
/*             <p>*/
/*               {% if channel.is_radio %}*/
/*               {% trans %}*/
/*               <strong class="red">No information</strong> about online radio.*/
/*               {% endtrans %}*/
/*               {% else %}*/
/*               {% trans %}*/
/*               <strong class="red">No information</strong> about the current TV program.*/
/*               {% endtrans %}*/
/*               {% endif%}*/
/*             </p>*/
/*           </div>*/
/*         </div>*/
/* */
/*       {% endif %}*/
/*     </div>*/
/*   </div>*/
/* {% endif %}*/
/* */
