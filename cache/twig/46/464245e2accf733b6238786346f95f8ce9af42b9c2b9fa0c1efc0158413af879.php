<?php

/* controllers/groupes/_serie.twig */
class __TwigTemplate_fc526bd5369d91b6220ca6c02a346a66a0b18fc72f61a6404b05ae89c3f549f6 extends Twig_Template
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
        echo "<div class=\"text margin\">
  <p class=\"clear-grey\">
    ";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("All episodes of the TV series <strong>%group%</strong>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
        // line 6
        echo "  </p>
</div>

";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()));
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
            // line 10
            echo "
  ";
            // line 11
            if (( !array_key_exists("last_season", $context) || ((isset($context["last_season"]) ? $context["last_season"] : $this->getContext($context, "last_season")) != $this->getAttribute($context["program"], "season", array())))) {
                // line 12
                echo "    ";
                if (array_key_exists("last_season", $context)) {
                    echo "</p></div>";
                }
                // line 13
                echo "    <h3 class=\"block-title\">
      ";
                // line 14
                echo $this->env->getExtension('translator')->getTranslator()->trans("Episodes of <strong>season %season%</strong>", array("%season%" => $this->getAttribute($context["program"], "season", array())), "messages");
                // line 17
                echo "    </h3>
    <div class=\"text margin\"><p class=\"paginate\">
    ";
                // line 19
                $context["count"] = 0;
                // line 20
                echo "    ";
                $context["last_season"] = $this->getAttribute($context["program"], "season", array());
                // line 21
                echo "  ";
            }
            // line 22
            echo "  ";
            $context["count"] = ((isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")) + 1);
            // line 23
            echo "
  <a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "program_url", array()), "html", null, true);
            echo "\" class=\"nb\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "fulltitle", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "episode", array()), "html", null, true);
            echo "</a>

  ";
            // line 26
            if ($this->getAttribute($context["loop"], "last", array())) {
                echo "</p></div>";
            }
            // line 27
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['program'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "controllers/groupes/_serie.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 27,  89 => 26,  80 => 24,  77 => 23,  74 => 22,  71 => 21,  68 => 20,  66 => 19,  62 => 17,  60 => 14,  57 => 13,  52 => 12,  50 => 11,  47 => 10,  30 => 9,  25 => 6,  23 => 3,  19 => 1,);
    }
}
/* <div class="text margin">*/
/*   <p class="clear-grey">*/
/*     {% trans with {'%group%': group.title} %}*/
/*     All episodes of the TV series <strong>%group%</strong>*/
/*     {% endtrans %}*/
/*   </p>*/
/* </div>*/
/* */
/* {% for program in group.programs %}*/
/* */
/*   {% if last_season is not defined or last_season != program.season %}*/
/*     {% if last_season is defined %}</p></div>{% endif %}*/
/*     <h3 class="block-title">*/
/*       {% trans with {'%season%': program.season} %}*/
/*       Episodes of <strong>season %season%</strong>*/
/*       {% endtrans %}*/
/*     </h3>*/
/*     <div class="text margin"><p class="paginate">*/
/*     {% set count=0 %}*/
/*     {% set last_season = program.season %}*/
/*   {% endif %}*/
/*   {% set count = count+1 %}*/
/* */
/*   <a href="{{ program.program_url }}" class="nb" title="{{ program.fulltitle }}">{{ program.episode }}</a>*/
/* */
/*   {% if loop.last %}</p></div>{% endif %}*/
/* */
/* {% endfor %}*/
/* */
