<?php

/* partials/rating.twig */
class __TwigTemplate_4289ea294c21456675049a70338c8ce2438f58df20dd375f6c1bff95c419ef53 extends Twig_Template
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
        $context["klasses"] = array(0 => "pmd-Rating");
        // line 2
        $context["klasses"] = twig_join_filter(twig_array_merge((isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), ((array_key_exists("classes", $context)) ? (_twig_default_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array())) : (array()))), " ");
        // line 3
        $context["rate"] = ((array_key_exists("rate", $context)) ? (_twig_default_filter((isset($context["rate"]) ? $context["rate"] : $this->getContext($context, "rate")), "0")) : ("0"));
        // line 4
        echo "
<div class=\"";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), "html", null, true);
        echo "\" data-rate=\"";
        echo twig_escape_filter($this->env, (isset($context["rate"]) ? $context["rate"] : $this->getContext($context, "rate")), "html", null, true);
        echo "\">

  ";
        // line 7
        ob_start();
        // line 8
        echo "  <svg role=\"img\" class=\"pmd-Rating-one pmd-Svg pmd-Svg--star\">
    <use xlink:href=\"#pmd-Svg--star\"></use>
  </svg>

  <svg role=\"img\" class=\"pmd-Rating-two pmd-Svg pmd-Svg--star\">
    <use xlink:href=\"#pmd-Svg--star\"></use>
  </svg>

  <svg role=\"img\" class=\"pmd-Rating-three pmd-Svg pmd-Svg--star\">
    <use xlink:href=\"#pmd-Svg--star\"></use>
  </svg>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 20
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "partials/rating.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 20,  37 => 8,  35 => 7,  28 => 5,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set klasses = ['pmd-Rating'] %}*/
/* {% set klasses = klasses|merge(classes|default([]))|join(' ') %}*/
/* {% set rate    = rate|default('0') %}*/
/* */
/* <div class="{{ klasses }}" data-rate="{{ rate }}">*/
/* */
/*   {% spaceless %}*/
/*   <svg role="img" class="pmd-Rating-one pmd-Svg pmd-Svg--star">*/
/*     <use xlink:href="#pmd-Svg--star"></use>*/
/*   </svg>*/
/* */
/*   <svg role="img" class="pmd-Rating-two pmd-Svg pmd-Svg--star">*/
/*     <use xlink:href="#pmd-Svg--star"></use>*/
/*   </svg>*/
/* */
/*   <svg role="img" class="pmd-Rating-three pmd-Svg pmd-Svg--star">*/
/*     <use xlink:href="#pmd-Svg--star"></use>*/
/*   </svg>*/
/* {% endspaceless %}*/
/* */
/* </div>*/
/* */
