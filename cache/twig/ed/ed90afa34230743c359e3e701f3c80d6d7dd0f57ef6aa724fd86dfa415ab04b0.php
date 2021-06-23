<?php

/* controllers/recherche/_type.twig */
class __TwigTemplate_97ed34214da114f3957f2838b9a11b9c275dfa25ba117a6e2e0921fee2272cff extends Twig_Template
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
<div class=\"block-title margin\">
  <p class=\"right\">
    <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("recherche", (isset($context["search_params"]) ? $context["search_params"] : $this->getContext($context, "search_params"))), "html", null, true);
        echo "\">
      &larr; <strong>";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("All categories", array(), "messages");
        echo "</strong>
    </a>
  </p>
  <h3>
    ";
        // line 13
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "channels")) {
            // line 14
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search for <strong>TV channels</strong>", array(), "messages");
            // line 15
            echo "    ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "programs")) {
            // line 16
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search for <strong>TV programs</strong>", array(), "messages");
            // line 17
            echo "    ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "videos")) {
            // line 18
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search for <strong>videos</strong>", array(), "messages");
            // line 19
            echo "    ";
        } elseif (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "casts")) {
            // line 20
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search for <strong>people</strong>", array(), "messages");
            // line 21
            echo "    ";
        } else {
            // line 22
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search for <strong>?</strong>", array(), "messages");
            // line 23
            echo "    ";
        }
        // line 24
        echo "  </h3>
</div>

";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : $this->getContext($context, "results")));
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
            // line 28
            echo "
  ";
            // line 29
            if (($context["result"] == twig_first($this->env, (isset($context["results"]) ? $context["results"] : $this->getContext($context, "results"))))) {
                // line 30
                echo "    <div id=\"search-";
                echo twig_escape_filter($this->env, (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")), "html", null, true);
                echo "\" class=\"";
                if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "videos")) {
                    echo "videos";
                } else {
                    echo "text";
                }
                echo " clearfix\">
  ";
            }
            // line 32
            echo "
  ";
            // line 33
            if (($this->getAttribute($context["result"], "type", array()) == "videos")) {
                // line 34
                echo "    ";
                $this->loadTemplate("partials/item-replay-tv.twig", "controllers/recherche/_type.twig", 34)->display(array_merge($context, array("video" => $context["result"])));
                // line 35
                echo "  ";
            } elseif (($this->getAttribute($context["result"], "type", array()) == "channels")) {
                // line 36
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["result"], "id", array()), "channel_alias" => $this->getAttribute($context["result"], "alias", array()))), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('translator')->getTranslator()->trans("About %channel%", array("%channel%" => $this->getAttribute($context["result"], "name", array())), "messages");
                echo "\" class=\"channel-button\">
      <img src=\"";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "name", array()), "html", null, true);
                echo "\" width=\"60\" height=\"60\">
      <div class=\"cache\"></div>
    </a>
  ";
            } elseif (($this->getAttribute(            // line 40
$context["result"], "type", array()) == "groups")) {
                // line 41
                echo "    <div class=\"program clearfix margin\">
      <p class=\"bigger\">
        <a href=\"";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                echo "\">
          <strong>";
                // line 44
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                echo "</strong>
        </a>
      </p>
      ";
                // line 47
                if (($this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()) &&  !(null === $this->getAttribute($context["result"], "programs", array())))) {
                    // line 48
                    echo "        <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                    echo "\" class=\"program-img program-img-small\">
          <span class=\"cache\"></span>
          <img src=\"";
                    // line 50
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["result"], "images", array()), "medium", array()), "html", null, true);
                    echo "\" width=\"80\" height=\"60\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                    echo "\">
        </a>
      ";
                }
                // line 53
                echo "      ";
                if ( !(null === $this->getAttribute($context["result"], "programs", array()))) {
                    // line 54
                    echo "        <p>
      ";
                }
                // line 56
                echo "      ";
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
                    // line 57
                    echo "        ";
                    if (($this->getAttribute($context["loop"], "index0", array()) < 3)) {
                        // line 58
                        echo "          <span class=\"clear-grey\">&bull;</span> <a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "program_url", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "fulltitle", array()), "html", null, true);
                        echo "</a><br>
        ";
                    }
                    // line 60
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['program'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 61
                echo "      ";
                if ( !(null === $this->getAttribute($context["result"], "programs", array()))) {
                    // line 62
                    echo "        </p>
      ";
                }
                // line 64
                echo "    </div>
  ";
            } elseif (($this->getAttribute(            // line 65
$context["result"], "type", array()) == "programs")) {
                // line 66
                echo "    <p class=\"margin\">
      <a href=\"";
                // line 67
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "program_url", array()), "html", null, true);
                echo "\">
        ";
                // line 68
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                echo "
      </a>
    </p>
  ";
            } else {
                // line 72
                echo "    <p class=\"margin\">
      <a href=\"";
                // line 73
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "url", array()), "html", null, true);
                echo "\">
        ";
                // line 74
                echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "label", array()), "html", null, true);
                echo "
      </a>
    </p>
  ";
            }
            // line 78
            echo "
  ";
            // line 79
            if (($context["result"] == twig_last($this->env, (isset($context["results"]) ? $context["results"] : $this->getContext($context, "results"))))) {
                echo "</div>";
            }
            // line 80
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
            // line 82
            echo "  <p class=\"text xxbigger center clear-grey\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No results.", array(), "messages");
            echo "</p>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "controllers/recherche/_type.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 82,  272 => 80,  268 => 79,  265 => 78,  258 => 74,  254 => 73,  251 => 72,  244 => 68,  240 => 67,  237 => 66,  235 => 65,  232 => 64,  228 => 62,  225 => 61,  211 => 60,  203 => 58,  200 => 57,  182 => 56,  178 => 54,  175 => 53,  167 => 50,  159 => 48,  157 => 47,  151 => 44,  147 => 43,  143 => 41,  141 => 40,  133 => 37,  126 => 36,  123 => 35,  120 => 34,  118 => 33,  115 => 32,  103 => 30,  101 => 29,  98 => 28,  80 => 27,  75 => 24,  72 => 23,  69 => 22,  66 => 21,  63 => 20,  60 => 19,  57 => 18,  54 => 17,  51 => 16,  48 => 15,  45 => 14,  43 => 13,  36 => 9,  32 => 8,  27 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set search_params = {} %}*/
/* {% if request.get.q is defined %}*/
/*   {% set search_params = search_params|merge({'q': request.get.q}) %}*/
/* {% endif %}*/
/* */
/* <div class="block-title margin">*/
/*   <p class="right">*/
/*     <a href="{{ path('recherche', search_params) }}">*/
/*       &larr; <strong>{% trans %}All categories{% endtrans %}</strong>*/
/*     </a>*/
/*   </p>*/
/*   <h3>*/
/*     {% if type == 'channels' %}*/
/*       {% trans %}Search for <strong>TV channels</strong>{% endtrans %}*/
/*     {% elseif type == 'programs' %}*/
/*       {% trans %}Search for <strong>TV programs</strong>{% endtrans %}*/
/*     {% elseif type == 'videos' %}*/
/*       {% trans %}Search for <strong>videos</strong>{% endtrans %}*/
/*     {% elseif type == 'casts' %}*/
/*       {% trans %}Search for <strong>people</strong>{% endtrans %}*/
/*     {% else %}*/
/*       {% trans %}Search for <strong>?</strong>{% endtrans %}*/
/*     {% endif %}*/
/*   </h3>*/
/* </div>*/
/* */
/* {% for result in results %}*/
/* */
/*   {% if result == results|first %}*/
/*     <div id="search-{{ type }}" class="{% if type == 'videos' %}videos{% else %}text{% endif %} clearfix">*/
/*   {% endif %}*/
/* */
/*   {% if result.type == 'videos' %}*/
/*     {% include "partials/item-replay-tv.twig" with {"video": result} %}*/
/*   {% elseif result.type == 'channels' %}*/
/*     <a href="{{ path('chaine_tv', {'channel_id': result.id, 'channel_alias': result.alias}) }}" title="{% trans with {'%channel%': result.name} %}About %channel%{% endtrans %}" class="channel-button">*/
/*       <img src="{{ result.images.medium }}" alt="{{ result.name }}" width="60" height="60">*/
/*       <div class="cache"></div>*/
/*     </a>*/
/*   {% elseif result.type == 'groups' %}*/
/*     <div class="program clearfix margin">*/
/*       <p class="bigger">*/
/*         <a href="{{ result.url }}">*/
/*           <strong>{{ result.title }}</strong>*/
/*         </a>*/
/*       </p>*/
/*       {% if result.images.medium and result.programs is not null %}*/
/*         <a href="{{ result.url }}" title="{{ result.title }}" class="program-img program-img-small">*/
/*           <span class="cache"></span>*/
/*           <img src="{{ result.images.medium }}" width="80" height="60" alt="{{ result.title }}">*/
/*         </a>*/
/*       {% endif %}*/
/*       {% if result.programs is not null %}*/
/*         <p>*/
/*       {% endif %}*/
/*       {% for program in result.programs %}*/
/*         {% if loop.index0 < 3 %}*/
/*           <span class="clear-grey">&bull;</span> <a href="{{ program.program_url }}">{{ program.fulltitle }}</a><br>*/
/*         {% endif %}*/
/*       {% endfor %}*/
/*       {% if result.programs is not null %}*/
/*         </p>*/
/*       {% endif %}*/
/*     </div>*/
/*   {% elseif result.type == 'programs' %}*/
/*     <p class="margin">*/
/*       <a href="{{ result.program_url }}">*/
/*         {{ result.title }}*/
/*       </a>*/
/*     </p>*/
/*   {% else %}*/
/*     <p class="margin">*/
/*       <a href="{{ result.url }}">*/
/*         {{ result.label }}*/
/*       </a>*/
/*     </p>*/
/*   {% endif %}*/
/* */
/*   {% if result == results|last %}</div>{% endif %}*/
/* */
/* {% else %}*/
/*   <p class="text xxbigger center clear-grey">{% trans %}No results.{% endtrans %}</p>*/
/* {% endfor %}*/
/* */
