<?php

/* controllers/recherche/_full.twig */
class __TwigTemplate_00fcfe26fef53ff92bd474cf147a7e9d675a806b628d7f24814901f249872b6c extends Twig_Template
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
        $context["search_params"] = array();
        // line 2
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "q", array(), "any", true, true)) {
            // line 3
            echo "  ";
            $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("q" => $this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array()), "q", array())));
        }
        // line 5
        echo "
<div class=\"row margin fluid\">
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : $this->getContext($context, "results")));
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
        foreach ($context['_seq'] as $context["type"] => $context["datas"]) {
            // line 8
            echo "    <div class=\"span-half margin\">
      <div id=\"search-";
            // line 9
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "\" class=\"grey-box\">

        <div class=\"block-title margin\">
          <small class=\"right\">
            ";
            // line 13
            if ((twig_length_filter($this->env, $context["datas"]) > 0)) {
                // line 14
                echo "              ";
                echo $this->env->getExtension('translator')->getTranslator()->transChoice("{1} 1 result.|]1,Inf] %count% results.", twig_length_filter($this->env, $context["datas"]), array("%count%" => twig_length_filter($this->env, $context["datas"])), "messages");
                // line 15
                echo "            ";
            } else {
                // line 16
                echo "              <span class=\"clear-grey\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("No results.", array(), "messages");
                echo "</span>
            ";
            }
            // line 18
            echo "          </small>

          ";
            // line 20
            if (($context["type"] == "channels")) {
                // line 21
                echo "            ";
                $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("type" => "chaines"));
                // line 22
                echo "          ";
            } elseif (($context["type"] == "programs")) {
                // line 23
                echo "            ";
                $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("type" => "programmes"));
                // line 24
                echo "          ";
            } elseif (($context["type"] == "videos")) {
                // line 25
                echo "            ";
                $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("type" => "videos"));
                // line 26
                echo "          ";
            } elseif (($context["type"] == "casts")) {
                // line 27
                echo "            ";
                $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("type" => "personnes"));
                // line 28
                echo "          ";
            } else {
                // line 29
                echo "            ";
                $context["search_params"] = twig_array_merge((isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params")), array("type" => "?"));
                // line 30
                echo "          ";
            }
            // line 31
            echo "
          <h3>
            <a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("recherche", (isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params"))), "html", null, true);
            echo "\">
              <strong>
              ";
            // line 35
            if (($context["type"] == "channels")) {
                // line 36
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("TV channels", array(), "messages");
                // line 37
                echo "              ";
            } elseif (($context["type"] == "programs")) {
                // line 38
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("TV programs", array(), "messages");
                // line 39
                echo "              ";
            } elseif (($context["type"] == "videos")) {
                // line 40
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Videos", array(), "messages");
                // line 41
                echo "              ";
            } elseif (($context["type"] == "casts")) {
                // line 42
                echo "                ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("People", array(), "messages");
                // line 43
                echo "              ";
            } else {
                // line 44
                echo "                ?
              ";
            }
            // line 46
            echo "              </strong> »
            </a>
          </h3>
        </div>

        ";
            // line 51
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["datas"]);
            $context['_iterated'] = false;
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
            foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                // line 52
                echo "
          ";
                // line 53
                if (($context["result"] == twig_first($this->env, $context["datas"]))) {
                    // line 54
                    echo "            <div class=\"";
                    if (($context["type"] == "videos")) {
                        echo "videos";
                    } else {
                        echo "text";
                    }
                    echo " clearfix\">
          ";
                }
                // line 56
                echo "
          ";
                // line 57
                if (($this->getAttribute($context["loop"], "index0", array()) < 4)) {
                    // line 58
                    echo "
            ";
                    // line 59
                    if (($this->getAttribute($context["result"], "type", array()) == "videos")) {
                        // line 60
                        echo "              ";
                        $this->loadTemplate("partials/item-replay-tv.twig", "controllers/recherche/_full.twig", 60)->display(array_merge($context, array("video" => $context["result"])));
                        // line 61
                        echo "            ";
                    } elseif (($this->getAttribute($context["result"], "type", array()) == "channels")) {
                        // line 62
                        echo "              <a href=\"";
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["result"], "id", array()), "channel_alias" => $this->getAttribute($context["result"], "alias", array()))), "html", null, true);
                        echo "\" title=\"";
                        echo $this->env->getExtension('translator')->getTranslator()->trans("About %channel%", array("%channel%" => $this->getAttribute($context["result"], "channel", array())), "messages");
                        echo "\" class=\"channel-button\">
                <div class=\"cache\"></div>
                <img src=\"";
                        // line 64
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "channel", array()), "html", null, true);
                        echo "\" width=\"60\" height=\"60\">
              </a>
            ";
                    } elseif (($this->getAttribute(                    // line 66
$context["result"], "type", array()) == "groups")) {
                        // line 67
                        echo "              <div class=\"program clearfix margin\">
                <p class=\"bigger\">
                  <a href=\"";
                        // line 69
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                        echo "\">
                    <strong>";
                        // line 70
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                        echo "</strong>
                  </a>
                </p>
                ";
                        // line 73
                        if (($this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()) &&  !(null === $this->getAttribute($context["result"], "programs", array())))) {
                            // line 74
                            echo "                  <a href=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                            echo "\" title=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                            echo "\" class=\"program-img program-img-small\">
                    <span class=\"cache\"></span>
                    <img src=\"";
                            // line 76
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()), "html", null, true);
                            echo "\" width=\"80\" height=\"60\" alt=\"";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                            echo "\">
                  </a>
                ";
                        }
                        // line 79
                        echo "                ";
                        if ( !(null === $this->getAttribute($context["result"], "programs", array()))) {
                            // line 80
                            echo "                  <p>
                ";
                        }
                        // line 82
                        echo "                ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["result"], "programs", array()));
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
                        foreach ($context['_seq'] as $context["_key"] => $context["program"]) {
                            // line 83
                            echo "                  ";
                            if (($this->getAttribute($context["loop"], "index0", array()) < 3)) {
                                // line 84
                                echo "                    <span class=\"clear-grey\">&bull;</span> <a href=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "program_url", array()), "html", null, true);
                                echo "\">";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "fulltitle", array()), "html", null, true);
                                echo "</a><br>
                  ";
                            }
                            // line 86
                            echo "                ";
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
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['program'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 87
                        echo "                ";
                        if ( !(null === $this->getAttribute($context["result"], "programs", array()))) {
                            // line 88
                            echo "                  </p>
                ";
                        }
                        // line 90
                        echo "              </div>
            ";
                    } elseif (($this->getAttribute(                    // line 91
$context["result"], "type", array()) == "programs")) {
                        // line 92
                        echo "              <p class=\"margin\">
                <a href=\"";
                        // line 93
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "program_url", array()), "html", null, true);
                        echo "\">
                  ";
                        // line 94
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                        echo "
                </a>
              </p>
            ";
                    } else {
                        // line 98
                        echo "              <p class=\"margin\">
                <a href=\"";
                        // line 99
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                        echo "\">
                  ";
                        // line 100
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "label", array()), "html", null, true);
                        echo "
                </a>
              </p>
            ";
                    }
                    // line 104
                    echo "
          ";
                } elseif (($this->getAttribute(                // line 105
$context["loop"], "index0", array()) == 4)) {
                    // line 106
                    echo "            <p class=\"text xxbigger center clear-grey\">
              <a href=\"";
                    // line 107
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("recherche", (isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params"))), "html", null, true);
                    echo "\" title=\"";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("More results", array(), "messages");
                    echo "\">...</a>
            </p>
          ";
                }
                // line 110
                echo "
          ";
                // line 111
                if (($context["result"] == twig_last($this->env, $context["datas"]))) {
                    echo "</div>";
                }
                // line 112
                echo "
        ";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 114
                echo "          <p class=\"text xxbigger center clear-grey\">";
                echo $this->env->getExtension('translator')->getTranslator()->trans("No results.", array(), "messages");
                echo "</p>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            echo "
      </div>
    </div>
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
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['datas'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 120
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/recherche/_full.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 120,  388 => 116,  379 => 114,  365 => 112,  361 => 111,  358 => 110,  350 => 107,  347 => 106,  345 => 105,  342 => 104,  335 => 100,  331 => 99,  328 => 98,  321 => 94,  317 => 93,  314 => 92,  312 => 91,  309 => 90,  305 => 88,  302 => 87,  288 => 86,  280 => 84,  277 => 83,  259 => 82,  255 => 80,  252 => 79,  244 => 76,  236 => 74,  234 => 73,  228 => 70,  224 => 69,  220 => 67,  218 => 66,  211 => 64,  203 => 62,  200 => 61,  197 => 60,  195 => 59,  192 => 58,  190 => 57,  187 => 56,  177 => 54,  175 => 53,  172 => 52,  154 => 51,  147 => 46,  143 => 44,  140 => 43,  137 => 42,  134 => 41,  131 => 40,  128 => 39,  125 => 38,  122 => 37,  119 => 36,  117 => 35,  112 => 33,  108 => 31,  105 => 30,  102 => 29,  99 => 28,  96 => 27,  93 => 26,  90 => 25,  87 => 24,  84 => 23,  81 => 22,  78 => 21,  76 => 20,  72 => 18,  66 => 16,  63 => 15,  60 => 14,  58 => 13,  51 => 9,  48 => 8,  31 => 7,  27 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set search_params = {} %}*/
/* {% if request.get.q is defined %}*/
/*   {% set search_params = search_params|merge({'q': request.get.q}) %}*/
/* {% endif %}*/
/* */
/* <div class="row margin fluid">*/
/*   {% for type, datas in results %}*/
/*     <div class="span-half margin">*/
/*       <div id="search-{{ type }}" class="grey-box">*/
/* */
/*         <div class="block-title margin">*/
/*           <small class="right">*/
/*             {% if datas|length > 0 %}*/
/*               {% transchoice datas|length %}{1} 1 result.|]1,Inf] %count% results.{% endtranschoice %}*/
/*             {% else %}*/
/*               <span class="clear-grey">{% trans %}No results.{% endtrans %}</span>*/
/*             {% endif %}*/
/*           </small>*/
/* */
/*           {% if type == 'channels' %}*/
/*             {% set search_params = search_params|merge({'type': 'chaines'}) %}*/
/*           {% elseif type == 'programs' %}*/
/*             {% set search_params = search_params|merge({'type': 'programmes'}) %}*/
/*           {% elseif type == 'videos' %}*/
/*             {% set search_params = search_params|merge({'type': 'videos'}) %}*/
/*           {% elseif type == 'casts' %}*/
/*             {% set search_params = search_params|merge({'type': 'personnes'}) %}*/
/*           {% else %}*/
/*             {% set search_params = search_params|merge({'type': '?'}) %}*/
/*           {% endif %}*/
/* */
/*           <h3>*/
/*             <a href="{{ path('recherche', search_params) }}">*/
/*               <strong>*/
/*               {% if type == 'channels' %}*/
/*                 {% trans %}TV channels{% endtrans %}*/
/*               {% elseif type == 'programs' %}*/
/*                 {% trans %}TV programs{% endtrans %}*/
/*               {% elseif type == 'videos' %}*/
/*                 {% trans %}Videos{% endtrans %}*/
/*               {% elseif type == 'casts' %}*/
/*                 {% trans %}People{% endtrans %}*/
/*               {% else %}*/
/*                 ?*/
/*               {% endif %}*/
/*               </strong> »*/
/*             </a>*/
/*           </h3>*/
/*         </div>*/
/* */
/*         {% for result in datas %}*/
/* */
/*           {% if result == datas|first %}*/
/*             <div class="{% if type == 'videos' %}videos{% else %}text{% endif %} clearfix">*/
/*           {% endif %}*/
/* */
/*           {% if loop.index0 < 4 %}*/
/* */
/*             {% if result.type == 'videos' %}*/
/*               {% include "partials/item-replay-tv.twig" with {"video": result} %}*/
/*             {% elseif result.type == 'channels' %}*/
/*               <a href="{{ path('chaine_tv', {'channel_id': result.id, 'channel_alias': result.alias}) }}" title="{% trans with {'%channel%': result.channel} %}About %channel%{% endtrans %}" class="channel-button">*/
/*                 <div class="cache"></div>*/
/*                 <img src="{{ result.images.medium }}" alt="{{ result.channel }}" width="60" height="60">*/
/*               </a>*/
/*             {% elseif result.type == 'groups' %}*/
/*               <div class="program clearfix margin">*/
/*                 <p class="bigger">*/
/*                   <a href="{{ result.url }}">*/
/*                     <strong>{{ result.title }}</strong>*/
/*                   </a>*/
/*                 </p>*/
/*                 {% if result.images.medium and result.programs is not null %}*/
/*                   <a href="{{ result.url }}" title="{{ result.title }}" class="program-img program-img-small">*/
/*                     <span class="cache"></span>*/
/*                     <img src="{{ result.images.medium }}" width="80" height="60" alt="{{ result.title }}">*/
/*                   </a>*/
/*                 {% endif %}*/
/*                 {% if result.programs is not null %}*/
/*                   <p>*/
/*                 {% endif %}*/
/*                 {% for program in result.programs %}*/
/*                   {% if loop.index0 < 3 %}*/
/*                     <span class="clear-grey">&bull;</span> <a href="{{ program.program_url }}">{{ program.fulltitle }}</a><br>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*                 {% if result.programs is not null %}*/
/*                   </p>*/
/*                 {% endif %}*/
/*               </div>*/
/*             {% elseif result.type == 'programs' %}*/
/*               <p class="margin">*/
/*                 <a href="{{ result.program_url }}">*/
/*                   {{ result.title }}*/
/*                 </a>*/
/*               </p>*/
/*             {% else %}*/
/*               <p class="margin">*/
/*                 <a href="{{ result.url }}">*/
/*                   {{ result.label }}*/
/*                 </a>*/
/*               </p>*/
/*             {% endif %}*/
/* */
/*           {% elseif loop.index0 == 4 %}*/
/*             <p class="text xxbigger center clear-grey">*/
/*               <a href="{{ path('recherche', search_params) }}" title="{% trans %}More results{% endtrans %}">...</a>*/
/*             </p>*/
/*           {% endif %}*/
/* */
/*           {% if result == datas|last %}</div>{% endif %}*/
/* */
/*         {% else %}*/
/*           <p class="text xxbigger center clear-grey">{% trans %}No results.{% endtrans %}</p>*/
/*         {% endfor %}*/
/* */
/*       </div>*/
/*     </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
