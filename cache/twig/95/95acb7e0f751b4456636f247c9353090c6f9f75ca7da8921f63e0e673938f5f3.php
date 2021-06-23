<?php

/* controllers/widgets/broadcasts.twig */
class __TwigTemplate_d71bedd8f8c4ff1fdffc18cd4b4c40d7a2042ea163f9db830932671fde651959 extends Twig_Template
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
        if ((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts"))) {
            // line 2
            echo "<div id=\"programs-next-list\">
  ";
            // line 3
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
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
                // line 4
                echo "
  ";
                // line 5
                if ((($this->getAttribute($context["broadcast"], "prime", array()) == 1) || ($this->getAttribute($context["broadcast"], "prime", array()) == 2))) {
                    // line 6
                    echo "    ";
                    $context["apply_rich_snippets"] = true;
                    // line 7
                    echo "  ";
                } else {
                    // line 8
                    echo "    ";
                    $context["apply_rich_snippets"] = false;
                    // line 9
                    echo "  ";
                }
                // line 10
                echo "
  <div ";
                // line 11
                if ((isset($context["apply_rich_snippets"]) ? $context["apply_rich_snippets"] : $this->getContext($context, "apply_rich_snippets"))) {
                    echo "itemscope itemtype=\"http://schema.org/BroadcastEvent\"";
                }
                echo " class=\"program";
                if ($this->getAttribute($context["broadcast"], "is_live", array())) {
                    echo " first";
                }
                if (($this->getAttribute($context["loop"], "index", array()) % 2 == 0)) {
                    echo " alt";
                }
                if (($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array()) < 10)) {
                    echo " short";
                }
                echo " clearfix\">

  ";
                // line 13
                if ((isset($context["apply_rich_snippets"]) ? $context["apply_rich_snippets"] : $this->getContext($context, "apply_rich_snippets"))) {
                    // line 14
                    echo "    <meta itemprop=\"name\" content=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array())) {
                        echo " : ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                    }
                    echo "\">
    <meta itemprop=\"description\" content=\"";
                    // line 15
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "summary_short", array()), "html", null, true);
                    echo "\">
    <meta itemprop=\"url\" content=\"";
                    // line 16
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                    echo "\">
    <meta itemprop=\"startDate\" content=\"";
                    // line 17
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "start", array()), "c"), "html", null, true);
                    echo "\">
    <meta itemprop=\"endDate\" content=\"";
                    // line 18
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "end", array()), "c"), "html", null, true);
                    echo "\">
    ";
                    // line 19
                    if ( !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()))) {
                        // line 20
                        echo "    <meta itemprop=\"image\" content=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()), "html", null, true);
                        echo "\">
    ";
                    }
                    // line 22
                    echo "  ";
                }
                // line 23
                echo "
    <div class=\"program-start\" title=\"";
                // line 24
                echo $this->env->getExtension('translator')->getTranslator()->trans("Duration: %duration%", array("%duration%" => $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array()))), "messages");
                echo "\">
      ";
                // line 25
                ob_start();
                // line 26
                echo "      <span";
                if ($this->getAttribute($context["broadcast"], "is_live", array())) {
                    echo " style=\"font-weight: bold;\"";
                }
                echo ">
        ";
                // line 27
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short")), "html", null, true);
                echo "
      </span>
      ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 30
                echo "    </div>

    <div class=\"program-datas clearfix\">
      <p class=\"program-gender small\">
        ";
                // line 34
                ob_start();
                // line 35
                echo "        <span class=\"program-gender-icon program-gender-icon";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                echo "\"></span>
        <span>";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                echo "</span>
        ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 38
                echo "      </p>

      ";
                // line 40
                if (( !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array())) && ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array()) >= 10))) {
                    // line 41
                    echo "      <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "\" class=\"program-img program-img-small ";
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                        echo "pmd-js-TrailerButton";
                    }
                    echo "\" data-program-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                    echo "\">
        <img src=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "\" width=\"80\" height=\"60\">
        <span class=\"cache\"></span>
        ";
                    // line 44
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                        // line 45
                        echo "        <span class=\"pmd-TrailerIcon\"></span>
        ";
                    }
                    // line 47
                    echo "      </a>
      ";
                }
                // line 49
                echo "
      <div class=\"program-infos";
                // line 50
                if (( !(null === $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array())) && ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array()) >= 10))) {
                    echo " has-subtitle";
                }
                echo "\">
        <p class=\"program-title\">
          <a href=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                echo "\">
            <strong>";
                // line 53
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), 55), "html", null, true);
                echo "</strong>
          </a>
          ";
                // line 55
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array())) {
                    // line 56
                    echo "          <span class=\"clear-grey\">&mdash;</span> ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                    echo "
          ";
                }
                // line 58
                echo "        </p>
      </div>

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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 65
            echo "</div>
";
        } else {
            // line 67
            echo "<div class=\"text xbigger center clear-grey margin\">
  <p>";
            // line 68
            echo $this->env->getExtension('translator')->getTranslator()->trans("No listings for this timeframe.", array(), "messages");
            echo "</p>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/broadcasts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  249 => 68,  246 => 67,  242 => 65,  222 => 58,  216 => 56,  214 => 55,  209 => 53,  203 => 52,  196 => 50,  193 => 49,  189 => 47,  185 => 45,  183 => 44,  176 => 42,  163 => 41,  161 => 40,  157 => 38,  152 => 36,  147 => 35,  145 => 34,  139 => 30,  133 => 27,  126 => 26,  124 => 25,  120 => 24,  117 => 23,  114 => 22,  108 => 20,  106 => 19,  102 => 18,  98 => 17,  93 => 16,  89 => 15,  80 => 14,  78 => 13,  61 => 11,  58 => 10,  55 => 9,  52 => 8,  49 => 7,  46 => 6,  44 => 5,  41 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if broadcasts %}*/
/* <div id="programs-next-list">*/
/*   {% for broadcast in broadcasts %}*/
/* */
/*   {% if broadcast.prime == 1 or broadcast.prime == 2 %}*/
/*     {% set apply_rich_snippets = true %}*/
/*   {% else %}*/
/*     {% set apply_rich_snippets = false %}*/
/*   {% endif %}*/
/* */
/*   <div {% if apply_rich_snippets %}itemscope itemtype="http://schema.org/BroadcastEvent"{% endif %} class="program{% if broadcast.is_live %} first{% endif %}{% if loop.index is even %} alt{% endif %}{% if broadcast.program.duration < 10 %} short{% endif %} clearfix">*/
/* */
/*   {% if apply_rich_snippets %}*/
/*     <meta itemprop="name" content="{{ broadcast.program.fulltitle }}{% if broadcast.program.subtitle %} : {{ broadcast.program.subtitle }}{% endif %}">*/
/*     <meta itemprop="description" content="{{ broadcast.program.summary_short }}">*/
/*     <meta itemprop="url" content="{{ hosts.current_full }}{{ broadcast.program.program_url }}">*/
/*     <meta itemprop="startDate" content="{{ broadcast.start|date("c") }}">*/
/*     <meta itemprop="endDate" content="{{ broadcast.end|date("c") }}">*/
/*     {% if broadcast.program.images.small is not null %}*/
/*     <meta itemprop="image" content="{{ broadcast.program.images.small }}">*/
/*     {% endif %}*/
/*   {% endif %}*/
/* */
/*     <div class="program-start" title="{% trans with {'%duration%': broadcast.program.duration|diff_for_humans} %}Duration: %duration%{% endtrans %}">*/
/*       {% spaceless %}*/
/*       <span{% if broadcast.is_live %} style="font-weight: bold;"{% endif %}>*/
/*         {{ broadcast.start|localizeddate('none', 'short') }}*/
/*       </span>*/
/*       {% endspaceless %}*/
/*     </div>*/
/* */
/*     <div class="program-datas clearfix">*/
/*       <p class="program-gender small">*/
/*         {% spaceless %}*/
/*         <span class="program-gender-icon program-gender-icon{{ broadcast.program.gender_id }}"></span>*/
/*         <span>{{ broadcast.program.gender }}</span>*/
/*         {% endspaceless %}*/
/*       </p>*/
/* */
/*       {% if broadcast.program.images.small is not null and broadcast.program.duration >= 10 %}*/
/*       <a href="{{ broadcast.program.program_url }}" title="{{ broadcast.program.fulltitle }}" class="program-img program-img-small {% if broadcast.program.trailer %}pmd-js-TrailerButton{% endif %}" data-program-id="{{ broadcast.program.id }}">*/
/*         <img src="{{ broadcast.program.images.small }}" alt="{{ broadcast.program.fulltitle }}" width="80" height="60">*/
/*         <span class="cache"></span>*/
/*         {% if broadcast.program.trailer %}*/
/*         <span class="pmd-TrailerIcon"></span>*/
/*         {% endif %}*/
/*       </a>*/
/*       {% endif %}*/
/* */
/*       <div class="program-infos{% if broadcast.program.subtitle is not null and broadcast.program.duration >= 10 %} has-subtitle{% endif %}">*/
/*         <p class="program-title">*/
/*           <a href="{{ broadcast.program.program_url }}" title="{{ broadcast.program.fulltitle }}">*/
/*             <strong>{{ broadcast.program.fulltitle|truncate(55) }}</strong>*/
/*           </a>*/
/*           {% if broadcast.program.subtitle %}*/
/*           <span class="clear-grey">&mdash;</span> {{ broadcast.program.subtitle }}*/
/*           {% endif %}*/
/*         </p>*/
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* {% endfor %}*/
/* </div>*/
/* {% else %}*/
/* <div class="text xbigger center clear-grey margin">*/
/*   <p>{% trans %}No listings for this timeframe.{% endtrans %}</p>*/
/* </div>*/
/* {% endif %}*/
/* */
