<?php

/* controllers/groupes/_programme.twig */
class __TwigTemplate_08316ac95ed2cd9f1e76a94cd0ce060f419028ff51c0683694cdcad2211d080c extends Twig_Template
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("All broadcasts for TV show <strong>%group%</strong>", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
        // line 4
        echo "  </p>
</div>
<div class=\"row text fluid clearfix\">
  ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["program"]) {
            // line 8
            echo "    <div class=\"span-half margin\">
      <p class=\"grey-box\">
        <a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "program_url", array()), "html", null, true);
            echo "\" class=\"nb\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "fulltitle", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["program"], "fulltitle", array()), "html", null, true);
            if ($this->getAttribute($context["program"], "start", array(), "any", true, true)) {
                echo " du ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["program"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            }
            echo "</a>
      </p>
    </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['program'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/groupes/_programme.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 14,  38 => 10,  34 => 8,  30 => 7,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="text margin">*/
/*   <p class="clear-grey">*/
/*     {% trans with {'%group%': group.title} %}All broadcasts for TV show <strong>%group%</strong>{% endtrans %}*/
/*   </p>*/
/* </div>*/
/* <div class="row text fluid clearfix">*/
/*   {% for program in group.programs %}*/
/*     <div class="span-half margin">*/
/*       <p class="grey-box">*/
/*         <a href="{{ program.program_url }}" class="nb" title="{{ program.fulltitle }}">{{ program.fulltitle }}{% if program.start is defined %} du {{ program.start|localizeddate('full', 'none', locale)|capitalize }}{% endif %}</a>*/
/*       </p>*/
/*     </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
