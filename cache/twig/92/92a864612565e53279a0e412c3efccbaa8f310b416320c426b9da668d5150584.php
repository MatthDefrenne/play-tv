<?php

/* partials/subnav-replay-tv.twig */
class __TwigTemplate_d5f5654b1f55fc0048722fa87958f2d2e940ae597b7c8cbb5748bffd7554e189 extends Twig_Template
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
        if ( !array_key_exists("subnav_active", $context)) {
            $context["subnav_active"] = "";
        }
        // line 2
        echo "
";
        // line 3
        $context["route_name"] = "replay_videos";
        // line 4
        if (($this->getAttribute((isset($context["page_params"]) ? $context["page_params"] : null), "channel_id", array(), "any", true, true) || $this->getAttribute((isset($context["page_params"]) ? $context["page_params"] : null), "channel_alias", array(), "any", true, true))) {
            // line 5
            echo "  ";
            $context["route_name"] = "replay_channel_videos";
        }
        // line 7
        echo "
<div class=\"replay-sub-menu pmd-js-ReplayTvMenuFilter\" id=\"replay-sub-menu\">
    <div id=\"replay-title-bar\">

      ";
        // line 11
        if (((isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) != "mobile")) {
            // line 12
            echo "      <div class=\"pmd-ReplayTvMenuTitle\">
        <h1 class=\"pmd-ReplayTvMenuTitle-text pmd-Text--truncate\">
          <span class=\"pmd-js-ReplayTvFilter-mainTitle\">
          ";
            // line 15
            if ( !(null === (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")))) {
                // line 16
                echo "            ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Yesterday TV Catch Up", array(), "messages");
                // line 17
                echo "          ";
            } else {
                // line 18
                echo "            ";
                echo twig_escape_filter($this->env, (isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading")), "html", null, true);
                echo "
          ";
            }
            // line 20
            echo "          </span>
        </h1>
      </div>
      ";
        }
        // line 24
        echo "
      <div class=\"right pmd-ReplayTvMenuFilter\">
        ";
        // line 26
        ob_start();
        // line 27
        echo "
          <div class=\"pmd-js-ReplayTvMenuFilterDate bar-dropdown separator pmd-ReplayDateFilter\">
            <div class=\"pmd-js-ReplayTvMenuFilterDate-default default-value\">
              ";
        // line 30
        ob_start();
        // line 31
        echo "                ";
        if ((null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))) {
            // line 32
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("By day", array(), "messages");
            // line 33
            echo "                ";
        } else {
            // line 34
            echo "                  ";
            if ( !(null === $this->env->getExtension('Playtv')->dateForHumans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "Y-m-d")))) {
                echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans(twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "Y-m-d")), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            }
            // line 35
            echo "                ";
        }
        // line 36
        echo "                ";
        if (((isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) == "mobile")) {
            // line 37
            echo "                <svg role=\"img\" class=\"pmd-Svg pmd-Svg--arrowdown\">
                  <use xlink:href=\"#pmd-Svg--arrowdown\"></use>
                </svg>
                ";
        } else {
            // line 41
            echo "                <span class=\"icon\"><i></i></span>
                ";
        }
        // line 43
        echo "              ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 44
        echo "            </div>

            ";
        // line 46
        $context["date_filter_params"] = (isset($context["url_params"]) ? $context["url_params"] : $this->getContext($context, "url_params"));
        // line 47
        echo "            ";
        if ( !(null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")))) {
            // line 48
            echo "              ";
            $context["date_filter_params"] = twig_array_merge((isset($context["date_filter_params"]) ? $context["date_filter_params"] : $this->getContext($context, "date_filter_params")), array("gender" => (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias"))));
            // line 49
            echo "            ";
        }
        // line 50
        echo "
            <div class=\"pmd-js-ReplayTvMenuFilterDate-list list-values pmd-ReplayDateFilterValues\" style=\"width: 217px;\">
              <ul class=\"js-ptv-ReplayDateDropdown\">
                <li class=\"pmd-js-ReplayTvDateFilter\">
                  <a
                    href=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["date_filter_params"]) ? $context["date_filter_params"] : $this->getContext($context, "date_filter_params")), array("page" => 1))), "html", null, true);
        echo "\"
                    class=\"js-ptv-ReplayTvDateFilter-item ";
        // line 56
        if ((null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))) {
            echo " selected";
        }
        echo "\"
                    ";
        // line 57
        if ( !(null === (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
            echo "data-channel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
            echo "\"";
        }
        // line 58
        echo "                    ";
        if ( !(null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")))) {
            echo "data-gender=\"";
            echo twig_escape_filter($this->env, (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")), "html", null, true);
            echo "\"";
        }
        // line 59
        echo "                  >
                    ";
        // line 60
        echo $this->env->getExtension('translator')->getTranslator()->trans("By day", array(), "messages");
        // line 61
        echo "                  </a>
                </li>
                ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["days"]) ? $context["days"] : $this->getContext($context, "days")));
        foreach ($context['_seq'] as $context["_key"] => $context["day"]) {
            // line 64
            echo "                  <li class=\"pmd-js-ReplayTvDateFilter\">
                    <a
                      href=\"";
            // line 66
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["date_filter_params"]) ? $context["date_filter_params"] : $this->getContext($context, "date_filter_params")), array("date" => twig_date_format_filter($this->env, $context["day"], "Y-m-d"), "page" => 1))), "html", null, true);
            echo "\"
                      class=\"js-ptv-ReplayTvDateFilter-item ";
            // line 67
            if (( !(null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date"))) && ((isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")) == twig_date_format_filter($this->env, $context["day"], "Y-m-d")))) {
                echo " selected";
            }
            echo "\"
                      ";
            // line 68
            if ( !(null === (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
                echo "data-channel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
                echo "\"";
            }
            // line 69
            echo "                      ";
            if ( !(null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")))) {
                echo "data-gender=\"";
                echo twig_escape_filter($this->env, (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")), "html", null, true);
                echo "\"";
            }
            // line 70
            echo "                      data-date=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $context["day"], "Y-m-d"), "html", null, true);
            echo "\"
                    >
                      ";
            // line 72
            if ( !(null === $this->env->getExtension('Playtv')->dateForHumans(twig_date_format_filter($this->env, $context["day"], "Y-m-d")))) {
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans(twig_date_format_filter($this->env, $context["day"], "Y-m-d"))), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $context["day"], "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            }
            // line 73
            echo "                    </a>
                  </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['day'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "              </ul>
            </div>
          </div>

          <div class=\"pmd-js-ReplayTvMenuFilterGenre bar-dropdown separator pmd-ReplayGendersFilter\">
            <div class=\"pmd-js-ReplayTvMenuFilterGenre-default default-value\">
              ";
        // line 82
        ob_start();
        // line 83
        echo "                ";
        if ((null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")))) {
            // line 84
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("By genre", array(), "messages");
            // line 85
            echo "                ";
        } else {
            // line 86
            echo "                  ";
            echo twig_escape_filter($this->env, (isset($context["gender_name"]) ? $context["gender_name"] : $this->getContext($context, "gender_name")), "html", null, true);
            echo "
                ";
        }
        // line 88
        echo "                ";
        if (((isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) == "mobile")) {
            // line 89
            echo "                <svg role=\"img\" class=\"pmd-Svg pmd-Svg--arrowdown\">
                  <use xlink:href=\"#pmd-Svg--arrowdown\"></use>
                </svg>
                ";
        } else {
            // line 93
            echo "                <span class=\"icon\"><i></i></span>
                ";
        }
        // line 95
        echo "              ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 96
        echo "            </div>

            ";
        // line 98
        $context["genre_filter_params"] = (isset($context["url_params"]) ? $context["url_params"] : $this->getContext($context, "url_params"));
        // line 99
        echo "            ";
        if ( !(null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))) {
            // line 100
            echo "              ";
            $context["genre_filter_params"] = twig_array_merge((isset($context["genre_filter_params"]) ? $context["genre_filter_params"] : $this->getContext($context, "genre_filter_params")), array("date" => twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "Y-m-d")));
            // line 101
            echo "            ";
        }
        // line 102
        echo "
            <div class=\"pmd-js-ReplayTvMenuFilterGenre-list list-values pmd-ReplayGendersFilterValues\" style=\"width: 151px;\">
              <ul>
                <li class=\"pmd-js-ReplayTvGenderFilter\">
                  <a
                    href=\"";
        // line 107
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["genre_filter_params"]) ? $context["genre_filter_params"] : $this->getContext($context, "genre_filter_params")), array("page" => 1))), "html", null, true);
        echo "\"
                    ";
        // line 108
        if ((null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")))) {
            echo "class=\"selected\"";
        }
        // line 109
        echo "                    ";
        if ( !(null === (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
            echo "data-channel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
            echo "\"";
        }
        // line 110
        echo "                    ";
        if ( !(null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))) {
            echo "data-date=\"";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "Y-m-d"), "html", null, true);
            echo "\"";
        }
        // line 111
        echo "                  >
                    ";
        // line 112
        echo $this->env->getExtension('translator')->getTranslator()->trans("By genre", array(), "messages");
        // line 113
        echo "                  </a>
                </li>
                ";
        // line 115
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["genders"]) ? $context["genders"] : $this->getContext($context, "genders")));
        foreach ($context['_seq'] as $context["_key"] => $context["gender"]) {
            // line 116
            echo "                  <li class=\"pmd-js-ReplayTvGenderFilter\">
                    <a
                      href=\"";
            // line 118
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["genre_filter_params"]) ? $context["genre_filter_params"] : $this->getContext($context, "genre_filter_params")), array("gender" => $this->getAttribute($context["gender"], "alias", array()), "page" => 1))), "html", null, true);
            echo "\"
                      ";
            // line 119
            if (( !(null === (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias"))) && ((isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")) == $this->getAttribute($context["gender"], "alias", array())))) {
                echo "class=\"selected\"";
            }
            // line 120
            echo "                      ";
            if ( !(null === (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
                echo "data-channel=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
                echo "\"";
            }
            // line 121
            echo "                      ";
            if ( !(null === (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))) {
                echo "data-date=\"";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "Y-m-d"), "html", null, true);
                echo "\"";
            }
            // line 122
            echo "                      data-gender=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["gender"], "alias", array()), "html", null, true);
            echo "\"
                    >
                      ";
            // line 124
            echo twig_escape_filter($this->env, $this->getAttribute($context["gender"], "name", array()), "html", null, true);
            echo "
                    </a>
                  </li>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gender'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 128
        echo "              </ul>
            </div>
          </div>

        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 133
        echo "      </div>
      <div class=\"pmd-ReplayTvMenuShare\">
        ";
        // line 135
        $this->loadTemplate("partials/share.twig", "partials/subnav-replay-tv.twig", 135)->display($context);
        // line 136
        echo "      </div>
    </div>

</div> <!-- /.sub-menu -->
";
    }

    public function getTemplateName()
    {
        return "partials/subnav-replay-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  373 => 136,  371 => 135,  367 => 133,  360 => 128,  350 => 124,  344 => 122,  337 => 121,  330 => 120,  326 => 119,  322 => 118,  318 => 116,  314 => 115,  310 => 113,  308 => 112,  305 => 111,  298 => 110,  291 => 109,  287 => 108,  283 => 107,  276 => 102,  273 => 101,  270 => 100,  267 => 99,  265 => 98,  261 => 96,  258 => 95,  254 => 93,  248 => 89,  245 => 88,  239 => 86,  236 => 85,  233 => 84,  230 => 83,  228 => 82,  220 => 76,  212 => 73,  206 => 72,  200 => 70,  193 => 69,  187 => 68,  181 => 67,  177 => 66,  173 => 64,  169 => 63,  165 => 61,  163 => 60,  160 => 59,  153 => 58,  147 => 57,  141 => 56,  137 => 55,  130 => 50,  127 => 49,  124 => 48,  121 => 47,  119 => 46,  115 => 44,  112 => 43,  108 => 41,  102 => 37,  99 => 36,  96 => 35,  89 => 34,  86 => 33,  83 => 32,  80 => 31,  78 => 30,  73 => 27,  71 => 26,  67 => 24,  61 => 20,  55 => 18,  52 => 17,  49 => 16,  47 => 15,  42 => 12,  40 => 11,  34 => 7,  30 => 5,  28 => 4,  26 => 3,  23 => 2,  19 => 1,);
    }
}
/* {% if subnav_active is not defined %}{% set subnav_active = "" %}{% endif %}*/
/* */
/* {% set route_name = 'replay_videos' %}*/
/* {% if page_params.channel_id is defined or page_params.channel_alias is defined %}*/
/*   {% set route_name = 'replay_channel_videos' %}*/
/* {% endif %}*/
/* */
/* <div class="replay-sub-menu pmd-js-ReplayTvMenuFilter" id="replay-sub-menu">*/
/*     <div id="replay-title-bar">*/
/* */
/*       {% if device != 'mobile' %}*/
/*       <div class="pmd-ReplayTvMenuTitle">*/
/*         <h1 class="pmd-ReplayTvMenuTitle-text pmd-Text--truncate">*/
/*           <span class="pmd-js-ReplayTvFilter-mainTitle">*/
/*           {% if title is not null %}*/
/*             {% trans %}Yesterday TV Catch Up{% endtrans %}*/
/*           {% else %}*/
/*             {{ heading }}*/
/*           {% endif %}*/
/*           </span>*/
/*         </h1>*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*       <div class="right pmd-ReplayTvMenuFilter">*/
/*         {% spaceless %}*/
/* */
/*           <div class="pmd-js-ReplayTvMenuFilterDate bar-dropdown separator pmd-ReplayDateFilter">*/
/*             <div class="pmd-js-ReplayTvMenuFilterDate-default default-value">*/
/*               {% spaceless %}*/
/*                 {% if date is null %}*/
/*                   {% trans %}By day{% endtrans %}*/
/*                 {% else %}*/
/*                   {% if date_for_humans(date|date('Y-m-d')) is not null %}{{ date_for_humans(date|date('Y-m-d')) }}{% else %}{{ date|localizeddate('full', 'none', locale)|capitalize }}{% endif %}*/
/*                 {% endif %}*/
/*                 {% if device == 'mobile' %}*/
/*                 <svg role="img" class="pmd-Svg pmd-Svg--arrowdown">*/
/*                   <use xlink:href="#pmd-Svg--arrowdown"></use>*/
/*                 </svg>*/
/*                 {% else %}*/
/*                 <span class="icon"><i></i></span>*/
/*                 {% endif %}*/
/*               {% endspaceless %}*/
/*             </div>*/
/* */
/*             {% set date_filter_params = url_params %}*/
/*             {% if gender_alias is not null %}*/
/*               {% set date_filter_params = date_filter_params|merge({'gender': gender_alias}) %}*/
/*             {% endif %}*/
/* */
/*             <div class="pmd-js-ReplayTvMenuFilterDate-list list-values pmd-ReplayDateFilterValues" style="width: 217px;">*/
/*               <ul class="js-ptv-ReplayDateDropdown">*/
/*                 <li class="pmd-js-ReplayTvDateFilter">*/
/*                   <a*/
/*                     href="{{ path(route_name, date_filter_params|merge({'page': 1})) }}"*/
/*                     class="js-ptv-ReplayTvDateFilter-item {% if date is null %} selected{% endif %}"*/
/*                     {% if channel is not null %}data-channel="{{ channel.alias }}"{% endif %}*/
/*                     {% if gender_alias is not null %}data-gender="{{ gender_alias }}"{% endif %}*/
/*                   >*/
/*                     {% trans %}By day{% endtrans %}*/
/*                   </a>*/
/*                 </li>*/
/*                 {% for day in days %}*/
/*                   <li class="pmd-js-ReplayTvDateFilter">*/
/*                     <a*/
/*                       href="{{ path(route_name, date_filter_params|merge({'date': day|date('Y-m-d'), 'page': 1})) }}"*/
/*                       class="js-ptv-ReplayTvDateFilter-item {% if date is not null and date == day|date('Y-m-d') %} selected{% endif %}"*/
/*                       {% if channel is not null %}data-channel="{{ channel.alias }}"{% endif %}*/
/*                       {% if gender_alias is not null %}data-gender="{{ gender_alias }}"{% endif %}*/
/*                       data-date="{{ day|date('Y-m-d') }}"*/
/*                     >*/
/*                       {% if date_for_humans(day|date('Y-m-d')) is not null %}{{ date_for_humans(day|date('Y-m-d'))|capitalize }}{% else %}{{ day|localizeddate('full', 'none', locale)|capitalize }}{% endif %}*/
/*                     </a>*/
/*                   </li>*/
/*                 {% endfor %}*/
/*               </ul>*/
/*             </div>*/
/*           </div>*/
/* */
/*           <div class="pmd-js-ReplayTvMenuFilterGenre bar-dropdown separator pmd-ReplayGendersFilter">*/
/*             <div class="pmd-js-ReplayTvMenuFilterGenre-default default-value">*/
/*               {% spaceless %}*/
/*                 {% if gender_alias is null %}*/
/*                   {% trans %}By genre{% endtrans %}*/
/*                 {% else %}*/
/*                   {{ gender_name }}*/
/*                 {% endif %}*/
/*                 {% if device == 'mobile' %}*/
/*                 <svg role="img" class="pmd-Svg pmd-Svg--arrowdown">*/
/*                   <use xlink:href="#pmd-Svg--arrowdown"></use>*/
/*                 </svg>*/
/*                 {% else %}*/
/*                 <span class="icon"><i></i></span>*/
/*                 {% endif %}*/
/*               {% endspaceless %}*/
/*             </div>*/
/* */
/*             {% set genre_filter_params = url_params %}*/
/*             {% if date is not null %}*/
/*               {% set genre_filter_params = genre_filter_params|merge({'date': date|date('Y-m-d')}) %}*/
/*             {% endif %}*/
/* */
/*             <div class="pmd-js-ReplayTvMenuFilterGenre-list list-values pmd-ReplayGendersFilterValues" style="width: 151px;">*/
/*               <ul>*/
/*                 <li class="pmd-js-ReplayTvGenderFilter">*/
/*                   <a*/
/*                     href="{{ path(route_name, genre_filter_params|merge({'page': 1})) }}"*/
/*                     {% if gender_alias is null %}class="selected"{% endif %}*/
/*                     {% if channel is not null %}data-channel="{{ channel.alias }}"{% endif %}*/
/*                     {% if date is not null %}data-date="{{ date|date('Y-m-d') }}"{% endif %}*/
/*                   >*/
/*                     {% trans %}By genre{% endtrans %}*/
/*                   </a>*/
/*                 </li>*/
/*                 {% for gender in genders %}*/
/*                   <li class="pmd-js-ReplayTvGenderFilter">*/
/*                     <a*/
/*                       href="{{ path(route_name, genre_filter_params|merge({'gender': gender.alias, 'page': 1})) }}"*/
/*                       {% if gender_alias is not null and gender_alias == gender.alias %}class="selected"{% endif %}*/
/*                       {% if channel is not null %}data-channel="{{ channel.alias }}"{% endif %}*/
/*                       {% if date is not null %}data-date="{{ date|date('Y-m-d') }}"{% endif %}*/
/*                       data-gender="{{ gender.alias }}"*/
/*                     >*/
/*                       {{ gender.name }}*/
/*                     </a>*/
/*                   </li>*/
/*                 {% endfor %}*/
/*               </ul>*/
/*             </div>*/
/*           </div>*/
/* */
/*         {% endspaceless %}*/
/*       </div>*/
/*       <div class="pmd-ReplayTvMenuShare">*/
/*         {% include "partials/share.twig" %}*/
/*       </div>*/
/*     </div>*/
/* */
/* </div> <!-- /.sub-menu -->*/
/* */
