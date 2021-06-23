<?php

/* controllers/groupes/groupe.twig */
class __TwigTemplate_06a825d70d43c6257037f8b5d6beedb4ad8d2148e2a213a8b571bc9fcf4124cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/groupes/groupe.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/groupes/groupe.twig", 5)->display($context);
        // line 6
        echo "
  <div id=\"content\">
    <div class=\"container\">

      <div class=\"row\">

        <div class=\"span-page\">
          <div id=\"program-group-head\" class=\"row\">
            ";
        // line 14
        if ((null != $this->getAttribute($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "images", array()), "medium", array()))) {
            // line 15
            echo "              <div class=\"span-menubar\">
                <div class=\"program-img\">
                  <div class=\"cache\"></div>
                  <img src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "images", array()), "medium", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array()), "html", null, true);
            echo "\" width=\"160\" height=\"120\">
                </div>
              </div>

              <div class=\"span-content\">
            ";
        } else {
            // line 24
            echo "              <div class=\"span-page\">
            ";
        }
        // line 26
        echo "
                <div class=\"page-title\">
                  <div class=\"right\">
                    ";
        // line 29
        if (($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "seasons", array(), "any", true, true) && ($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "seasons", array()) > 0))) {
            // line 30
            echo "                      <p class=\"clear-grey\">
                        ";
            // line 31
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{1} 1 season|]1,Inf] %count% seasons", $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "seasons", array()), array("%count%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "seasons", array())), "messages");
            // line 34
            echo "                      </p>
                    ";
        }
        // line 36
        echo "                    <p class=\"clear-grey\">
                      ";
        // line 37
        if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
            // line 38
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{0} No episodes|{1} 1 episode|]1,Inf] %count% episodes", twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array())), array("%count%" => twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()))), "messages");
            // line 41
            echo "                      ";
        } else {
            // line 42
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{0} No show|{1} 1 show|]1,Inf] %count% shows", twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array())), array("%count%" => twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()))), "messages");
            // line 45
            echo "                      ";
        }
        // line 46
        echo "                    </p>
                  </div>
                  <h1 class=\"red\">";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array()), "html", null, true);
        echo "</h1>
                  <p class=\"sub-title\">";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "type_title", array()), "html", null, true);
        echo "</p>
                </div>

                <ul id=\"tabs\" class=\"tabs\">
                  <li class=\"tab-selected\">
                    <a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "url", array()), "html", null, true);
        echo "#resume\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Summary of %group%", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
        echo "\" data-hash=\"resume\">
                      ";
        // line 55
        if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
            // line 56
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Summary of the TV series", array(), "messages");
            // line 57
            echo "                      ";
        } else {
            // line 58
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Summary of the TV show", array(), "messages");
            // line 59
            echo "                      ";
        }
        // line 60
        echo "                    </a>
                  </li>
                  <li>
                    <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "url", array()), "html", null, true);
        echo "#episodes\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Episodes of %group%", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
        echo "\" data-hash=\"episodes\">
                      ";
        // line 64
        if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
            // line 65
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Episodes of the TV series", array(), "messages");
            // line 66
            echo "                      ";
        } else {
            // line 67
            echo "                        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Episodes of the TV show", array(), "messages");
            // line 68
            echo "                      ";
        }
        // line 69
        echo "                    </a>
                  </li>
                </ul>
              </div>
          </div>

          <div class=\"row\">
            <div class=\"span-page\">

              <div id=\"tab1\">
                <div class=\"text margin\">
                  <p class=\"clear-grey\">
                    ";
        // line 81
        if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
            // line 82
            echo "                      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("More infos about <strong>%group%</strong> TV series", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
            // line 83
            echo "                    ";
        } else {
            // line 84
            echo "                      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("More infos about <strong>%group%</strong> TV show", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
            // line 85
            echo "                    ";
        }
        // line 86
        echo "                  </p>
                </div>
                <div class=\"program-summary text padding bigger\">
                  ";
        // line 89
        if ( !(null === $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "summary", array()))) {
            // line 90
            echo "                    ";
            echo $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "summary", array());
            echo "
                  ";
        } else {
            // line 92
            echo "                    <p>
                      ";
            // line 93
            echo $this->env->getExtension('translator')->getTranslator()->trans("No summary for <strong>%group%</strong>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
            // line 94
            echo "                      <span class=\"clear-grey\">—</span>
                    </p>
                  ";
        }
        // line 97
        echo "                </div>
              </div> <!-- /#tab1 -->

              <div id=\"tab2\">
                ";
        // line 101
        if ( !(null === $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()))) {
            // line 102
            echo "                  ";
            if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
                // line 103
                echo "                    ";
                $this->loadTemplate("controllers/groupes/_serie.twig", "controllers/groupes/groupe.twig", 103)->display($context);
                // line 104
                echo "                  ";
            } else {
                // line 105
                echo "                    ";
                $this->loadTemplate("controllers/groupes/_programme.twig", "controllers/groupes/groupe.twig", 105)->display($context);
                // line 106
                echo "                  ";
            }
            // line 107
            echo "                ";
        } else {
            // line 108
            echo "                  <div class=\"text margin\">
                    <p class=\"clear-grey\">
                      ";
            // line 110
            if (((isset($context["type_alias"]) ? $context["type_alias"] : $this->getContext($context, "type_alias")) == "serie-tv")) {
                // line 111
                echo "                        ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("No schedules for the TV series <strong>%group%</strong>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
                // line 112
                echo "                      ";
            } else {
                // line 113
                echo "                        ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("No schedules for the TV show <strong>%group%</strong>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
                // line 114
                echo "                      ";
            }
            // line 115
            echo "                    </p>
                  </div>
                ";
        }
        // line 118
        echo "              </div> <!-- /#tab2 -->

              ";
        // line 120
        if (($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv") &&  !(null === (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))))) {
            // line 121
            echo "                <div id=\"tab3\">
                  <div class=\"text margin\">
                    <p class=\"clear-grey\">
                      ";
            // line 124
            echo $this->env->getExtension('translator')->getTranslator()->trans("View <strong>%group%</strong> in catch up.</p>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
            // line 127
            echo "                  </div>
                  <div class=\"videos clearfix\">
                    ";
            // line 129
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                // line 130
                echo "                      ";
                $this->loadTemplate("partials/item-replay-tv.twig", "controllers/groupes/groupe.twig", 130)->display(array_merge($context, array("video" => $context["video"])));
                // line 131
                echo "                    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "                  </div>
                </div> <!-- /#tab3 -->
              ";
        }
        // line 135
        echo "
            </div>
          </div>

        </div>

        <div class=\"span-sidebar\">
          ";
        // line 142
        $this->loadTemplate("partials/ads-banner.twig", "controllers/groupes/groupe.twig", 142)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 143
        echo "        </div>

      </div>

    </div>
  </div> <!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/groupes/groupe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 143,  327 => 142,  318 => 135,  313 => 132,  299 => 131,  296 => 130,  279 => 129,  275 => 127,  273 => 124,  268 => 121,  266 => 120,  262 => 118,  257 => 115,  254 => 114,  251 => 113,  248 => 112,  245 => 111,  243 => 110,  239 => 108,  236 => 107,  233 => 106,  230 => 105,  227 => 104,  224 => 103,  221 => 102,  219 => 101,  213 => 97,  208 => 94,  206 => 93,  203 => 92,  197 => 90,  195 => 89,  190 => 86,  187 => 85,  184 => 84,  181 => 83,  178 => 82,  176 => 81,  162 => 69,  159 => 68,  156 => 67,  153 => 66,  150 => 65,  148 => 64,  142 => 63,  137 => 60,  134 => 59,  131 => 58,  128 => 57,  125 => 56,  123 => 55,  117 => 54,  109 => 49,  105 => 48,  101 => 46,  98 => 45,  95 => 42,  92 => 41,  89 => 38,  87 => 37,  84 => 36,  80 => 34,  78 => 31,  75 => 30,  73 => 29,  68 => 26,  64 => 24,  53 => 18,  48 => 15,  46 => 14,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% include "partials/subnav-guide-tv.twig" %}*/
/* */
/*   <div id="content">*/
/*     <div class="container">*/
/* */
/*       <div class="row">*/
/* */
/*         <div class="span-page">*/
/*           <div id="program-group-head" class="row">*/
/*             {% if null != group.images.medium %}*/
/*               <div class="span-menubar">*/
/*                 <div class="program-img">*/
/*                   <div class="cache"></div>*/
/*                   <img src="{{ group.images.medium }}" alt="{{ group.title }}" width="160" height="120">*/
/*                 </div>*/
/*               </div>*/
/* */
/*               <div class="span-content">*/
/*             {% else %}*/
/*               <div class="span-page">*/
/*             {% endif %}*/
/* */
/*                 <div class="page-title">*/
/*                   <div class="right">*/
/*                     {% if group.seasons is defined and group.seasons > 0 %}*/
/*                       <p class="clear-grey">*/
/*                         {% transchoice group.seasons %}*/
/*                           {1} 1 season|]1,Inf] %count% seasons*/
/*                         {% endtranschoice %}*/
/*                       </p>*/
/*                     {% endif %}*/
/*                     <p class="clear-grey">*/
/*                       {% if type_alias == 'serie-tv' %}*/
/*                         {% transchoice group.programs|length %}*/
/*                           {0} No episodes|{1} 1 episode|]1,Inf] %count% episodes*/
/*                         {% endtranschoice %}*/
/*                       {% else %}*/
/*                         {% transchoice group.programs|length %}*/
/*                           {0} No show|{1} 1 show|]1,Inf] %count% shows*/
/*                         {% endtranschoice %}*/
/*                       {% endif %}*/
/*                     </p>*/
/*                   </div>*/
/*                   <h1 class="red">{{ group.title }}</h1>*/
/*                   <p class="sub-title">{{ group.type_title }}</p>*/
/*                 </div>*/
/* */
/*                 <ul id="tabs" class="tabs">*/
/*                   <li class="tab-selected">*/
/*                     <a href="{{ group.url }}#resume" title="{% trans with {'%group%': group.title} %}Summary of %group%{% endtrans %}" data-hash="resume">*/
/*                       {% if type_alias == 'serie-tv' %}*/
/*                         {% trans %}Summary of the TV series{% endtrans %}*/
/*                       {% else %}*/
/*                         {% trans %}Summary of the TV show{% endtrans %}*/
/*                       {% endif %}*/
/*                     </a>*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ group.url }}#episodes" title="{% trans with {'%group%': group.title} %}Episodes of %group%{% endtrans %}" data-hash="episodes">*/
/*                       {% if type_alias == 'serie-tv' %}*/
/*                         {% trans %}Episodes of the TV series{% endtrans %}*/
/*                       {% else %}*/
/*                         {% trans %}Episodes of the TV show{% endtrans %}*/
/*                       {% endif %}*/
/*                     </a>*/
/*                   </li>*/
/*                 </ul>*/
/*               </div>*/
/*           </div>*/
/* */
/*           <div class="row">*/
/*             <div class="span-page">*/
/* */
/*               <div id="tab1">*/
/*                 <div class="text margin">*/
/*                   <p class="clear-grey">*/
/*                     {% if type_alias == 'serie-tv' %}*/
/*                       {% trans with {'%group%': group.title} %}More infos about <strong>%group%</strong> TV series{% endtrans %}*/
/*                     {% else %}*/
/*                       {% trans with {'%group%': group.title} %}More infos about <strong>%group%</strong> TV show{% endtrans %}*/
/*                     {% endif %}*/
/*                   </p>*/
/*                 </div>*/
/*                 <div class="program-summary text padding bigger">*/
/*                   {% if group.summary is not null %}*/
/*                     {{ group.summary|raw }}*/
/*                   {% else %}*/
/*                     <p>*/
/*                       {% trans with {'%group%': group.title} %}No summary for <strong>%group%</strong>{% endtrans %}*/
/*                       <span class="clear-grey">—</span>*/
/*                     </p>*/
/*                   {% endif %}*/
/*                 </div>*/
/*               </div> <!-- /#tab1 -->*/
/* */
/*               <div id="tab2">*/
/*                 {% if group.programs is not null %}*/
/*                   {% if type_alias == 'serie-tv' %}*/
/*                     {% include "controllers/groupes/_serie.twig" %}*/
/*                   {% else %}*/
/*                     {% include "controllers/groupes/_programme.twig" %}*/
/*                   {% endif %}*/
/*                 {% else %}*/
/*                   <div class="text margin">*/
/*                     <p class="clear-grey">*/
/*                       {% if type_alias == 'serie-tv' %}*/
/*                         {% trans with {'%group%': group.title} %}No schedules for the TV series <strong>%group%</strong>{% endtrans %}*/
/*                       {% else %}*/
/*                         {% trans with {'%group%': group.title} %}No schedules for the TV show <strong>%group%</strong>{% endtrans %}*/
/*                       {% endif %}*/
/*                     </p>*/
/*                   </div>*/
/*                 {% endif %}*/
/*               </div> <!-- /#tab2 -->*/
/* */
/*               {% if has_feature('catchup_tv') and videos is not null %}*/
/*                 <div id="tab3">*/
/*                   <div class="text margin">*/
/*                     <p class="clear-grey">*/
/*                       {% trans with {'%group%': group.title} %}*/
/*                       View <strong>%group%</strong> in catch up.</p>*/
/*                       {% endtrans %}*/
/*                   </div>*/
/*                   <div class="videos clearfix">*/
/*                     {% for video in videos %}*/
/*                       {% include "partials/item-replay-tv.twig" with {"video": video} %}*/
/*                     {% endfor %}*/
/*                   </div>*/
/*                 </div> <!-- /#tab3 -->*/
/*               {% endif %}*/
/* */
/*             </div>*/
/*           </div>*/
/* */
/*         </div>*/
/* */
/*         <div class="span-sidebar">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/*   </div> <!-- /#content -->*/
/* {% endblock content %}*/
/* */
