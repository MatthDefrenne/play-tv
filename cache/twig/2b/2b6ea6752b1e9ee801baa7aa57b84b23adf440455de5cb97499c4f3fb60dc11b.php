<?php

/* partials/item-broadcast_mobile.twig */
class __TwigTemplate_ef4a3712bcb31d01758e7bb7934a8f7a4a73ac62c7b68a0159befa49754ecd1f extends Twig_Template
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
        if ( !array_key_exists("is_live", $context)) {
            // line 2
            echo "  ";
            $context["is_live"] = false;
        }
        // line 4
        echo "<li class=\"pmd-TvProgrammeListItem\">
  <div class=\"pmd-TvProgrammeListItem-wrapper\">

    <a href=\"";
        // line 7
        if ((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live"))) {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()))), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()))), "html", null, true);
        }
        echo "\" class=\"pmd-TvProgrammeListItem-channel";
        if (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "streamable", array()) && ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "streaming_source", array()) == "internal"))) {
            echo " pmd-TvProgrammeListItem-channel--streamable";
        }
        echo "\">
      <img
        src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "medium", array()), "html", null, true);
        echo "\"
        alt=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        echo "\"
        width=\"57\"
        height=\"57\"
      />
    </a>

    ";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
        foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
            // line 17
            echo "    ";
            if ($this->getAttribute($context["broadcast"], "program", array(), "any", true, true)) {
                // line 18
                echo "      <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\" class=\"pmd-TvProgrammeListItem-content\">

        <h4 class=\"pmd-TvProgrammeListItem-heading pmd-Text--truncate\">
          ";
                // line 21
                if ( !twig_test_empty($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()))) {
                    // line 22
                    echo "            ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "
          ";
                } else {
                    // line 24
                    echo "            ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("No information", array(), "messages");
                    // line 25
                    echo "          ";
                }
                // line 26
                echo "        </h4>

        <div class=\"pmd-TvProgrammeListItem-info\">

          ";
                // line 30
                if (($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "stars", array()) > 0)) {
                    // line 31
                    echo "          <div class=\"pmd-TvProgrammeListItem-star\">
            <img
              src=\"";
                    // line 33
                    echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
                    echo "/images/stars-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "stars", array()), "html", null, true);
                    echo "-mobile.svg\"
              width=\"36\"
              height=\"11\"
            />
          </div>
          ";
                }
                // line 39
                echo "
          <div class=\"pmd-TvProgrammeListItem-genre pmd-Text--truncate\">
            ";
                // line 41
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array())) {
                    // line 42
                    echo "            <span class=\"pmd-ProgrammeGenre pmd-ProgrammeGenre--";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                    echo " pmd-ProgrammeGenre--small\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                    echo "</span>
            ";
                } else {
                    // line 44
                    echo "            <span> </span>
            ";
                }
                // line 46
                echo "          </div>
        </div>

        <div class=\"pmd-TvProgrammeListItem-time";
                // line 49
                if (((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")) == false)) {
                    echo " pmd-TvProgrammeListItem-time--withoutProgress";
                }
                echo "\">
          <div class=\"pmd-TvProgrammeListItem-start\">
            ";
                // line 51
                echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "start", array()), "H:i"), "--:--"), "html", null, true);
                echo "
          </div>
          ";
                // line 53
                if ((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live"))) {
                    // line 54
                    echo "          <div class=\"pmd-Progress\">
            <div class=\"pmd-Progress-bar\" style=\"width: ";
                    // line 55
                    echo twig_escape_filter($this->env, $this->getAttribute($context["broadcast"], "progress", array()), "html", null, true);
                    echo "%;\"></div>
          </div>
          ";
                } else {
                    // line 58
                    echo "          -
          ";
                }
                // line 60
                echo "          <div class=\"pmd-TvProgrammeListItem-end\">
            ";
                // line 61
                echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "end", array()), "H:i"), "--:--"), "html", null, true);
                echo "
          </div>
        </div>

      </a>

      ";
                // line 67
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                    // line 68
                    echo "      <a class=\"pmd-TvProgrammeListItem-preview\" rel=\"nofollow\" target=\"_blank\" href=\"/trailer/";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                    echo "/?autoplay=true\">
      ";
                } else {
                    // line 70
                    echo "      <div class=\"pmd-TvProgrammeListItem-preview\">
      ";
                }
                // line 72
                echo "        <img
          src=\"";
                // line 73
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array(), "any", false, true), "images", array(), "any", false, true), "small", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array(), "any", false, true), "images", array(), "any", false, true), "small", array()), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))), "html", null, true);
                echo "\"
          alt=\"\"
          width=\"69\"
          height=\"52\"
          class=\"pmd-TvProgrammeListItem-preview-picture\"
        />

        ";
                // line 80
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                    // line 81
                    echo "        <span class=\"pmd-TrailerIcon pmd-TrailerIcon--small pmd-TvProgrammeListItem-preview-trailer pmd-Icons-trailer\"></span>
        ";
                }
                // line 83
                echo "
      ";
                // line 84
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                    // line 85
                    echo "      </a>
      ";
                } else {
                    // line 87
                    echo "      </div>
      ";
                }
                // line 89
                echo "
    ";
            }
            // line 91
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "
  </div>
</li>
";
    }

    public function getTemplateName()
    {
        return "partials/item-broadcast_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 92,  217 => 91,  213 => 89,  209 => 87,  205 => 85,  203 => 84,  200 => 83,  196 => 81,  194 => 80,  184 => 73,  181 => 72,  177 => 70,  171 => 68,  169 => 67,  160 => 61,  157 => 60,  153 => 58,  147 => 55,  144 => 54,  142 => 53,  137 => 51,  130 => 49,  125 => 46,  121 => 44,  113 => 42,  111 => 41,  107 => 39,  96 => 33,  92 => 31,  90 => 30,  84 => 26,  81 => 25,  78 => 24,  72 => 22,  70 => 21,  63 => 18,  60 => 17,  56 => 16,  47 => 10,  43 => 9,  30 => 7,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if is_live is not defined %}*/
/*   {% set is_live = false %}*/
/* {% endif %}*/
/* <li class="pmd-TvProgrammeListItem">*/
/*   <div class="pmd-TvProgrammeListItem-wrapper">*/
/* */
/*     <a href="{% if is_live %}{{ path('television_channel_single', {'channel_id': channel.id, 'channel_alias': channel.alias}) }}{% else %}{{ path('chaine_tv', {'channel_id': channel.id, 'channel_alias': channel.alias}) }}{% endif %}" class="pmd-TvProgrammeListItem-channel{% if channel.streamable and channel.streaming_source == 'internal' %} pmd-TvProgrammeListItem-channel--streamable{% endif %}">*/
/*       <img*/
/*         src="{{ channel.images.medium }}"*/
/*         alt="{{ channel.name }}"*/
/*         width="57"*/
/*         height="57"*/
/*       />*/
/*     </a>*/
/* */
/*     {% for broadcast in broadcasts %}*/
/*     {% if broadcast.program is defined %}*/
/*       <a href="{{ broadcast.program.program_url }}" class="pmd-TvProgrammeListItem-content">*/
/* */
/*         <h4 class="pmd-TvProgrammeListItem-heading pmd-Text--truncate">*/
/*           {% if broadcast.program.fulltitle is not empty %}*/
/*             {{ broadcast.program.fulltitle }}*/
/*           {% else %}*/
/*             {% trans %}No information{% endtrans %}*/
/*           {% endif %}*/
/*         </h4>*/
/* */
/*         <div class="pmd-TvProgrammeListItem-info">*/
/* */
/*           {% if broadcast.program.stars > 0 %}*/
/*           <div class="pmd-TvProgrammeListItem-star">*/
/*             <img*/
/*               src="{{ apps_base_url }}/images/stars-{{ broadcast.program.stars }}-mobile.svg"*/
/*               width="36"*/
/*               height="11"*/
/*             />*/
/*           </div>*/
/*           {% endif %}*/
/* */
/*           <div class="pmd-TvProgrammeListItem-genre pmd-Text--truncate">*/
/*             {% if broadcast.program.gender %}*/
/*             <span class="pmd-ProgrammeGenre pmd-ProgrammeGenre--{{ broadcast.program.gender_id }} pmd-ProgrammeGenre--small">{{ broadcast.program.gender }}</span>*/
/*             {% else %}*/
/*             <span> </span>*/
/*             {% endif %}*/
/*           </div>*/
/*         </div>*/
/* */
/*         <div class="pmd-TvProgrammeListItem-time{% if is_live == false %} pmd-TvProgrammeListItem-time--withoutProgress{% endif %}">*/
/*           <div class="pmd-TvProgrammeListItem-start">*/
/*             {{ broadcast.start|date("H:i")|default("--:--") }}*/
/*           </div>*/
/*           {% if is_live %}*/
/*           <div class="pmd-Progress">*/
/*             <div class="pmd-Progress-bar" style="width: {{ broadcast.progress }}%;"></div>*/
/*           </div>*/
/*           {% else %}*/
/*           -*/
/*           {% endif %}*/
/*           <div class="pmd-TvProgrammeListItem-end">*/
/*             {{ broadcast.end|date("H:i")|default("--:--") }}*/
/*           </div>*/
/*         </div>*/
/* */
/*       </a>*/
/* */
/*       {% if broadcast.program.trailer %}*/
/*       <a class="pmd-TvProgrammeListItem-preview" rel="nofollow" target="_blank" href="/trailer/{{ broadcast.program.id }}/?autoplay=true">*/
/*       {% else %}*/
/*       <div class="pmd-TvProgrammeListItem-preview">*/
/*       {% endif %}*/
/*         <img*/
/*           src="{{ broadcast.program.images.small|default(apps_base_url ~ "/images/tv-default-mobile.svg") }}"*/
/*           alt=""*/
/*           width="69"*/
/*           height="52"*/
/*           class="pmd-TvProgrammeListItem-preview-picture"*/
/*         />*/
/* */
/*         {% if broadcast.program.trailer %}*/
/*         <span class="pmd-TrailerIcon pmd-TrailerIcon--small pmd-TvProgrammeListItem-preview-trailer pmd-Icons-trailer"></span>*/
/*         {% endif %}*/
/* */
/*       {% if broadcast.program.trailer %}*/
/*       </a>*/
/*       {% else %}*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*     {% endif %}*/
/*     {% endfor %}*/
/* */
/*   </div>*/
/* </li>*/
/* */
