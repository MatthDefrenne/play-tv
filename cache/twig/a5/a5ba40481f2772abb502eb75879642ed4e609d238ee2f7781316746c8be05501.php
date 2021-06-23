<?php

/* partials/paginate-mosaic.twig */
class __TwigTemplate_a45f3740acad723e4b705ca301e7670338b932abf90e4a4d1818a7eedc1be03f extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages"))));
        foreach ($context['_seq'] as $context["_key"] => $context["page"]) {
            // line 2
            echo "  <a href=\"#\" title=\"Page ";
            echo twig_escape_filter($this->env, $context["page"], "html", null, true);
            echo "\" class=\"pmd-MosaicSlider-link";
            if (($context["page"] == 1)) {
                echo " selected";
            }
            echo "\">
    <span class=\"pmd-MosaicSlider-element\">";
            // line 3
            echo twig_escape_filter($this->env, $context["page"], "html", null, true);
            echo "</span>
  </a>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "partials/paginate-mosaic.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 3,  23 => 2,  19 => 1,);
    }
}
/* {% for page in 1..pages %}*/
/*   <a href="#" title="Page {{ page }}" class="pmd-MosaicSlider-link{% if page == 1 %} selected{% endif %}">*/
/*     <span class="pmd-MosaicSlider-element">{{ page }}</span>*/
/*   </a>*/
/* {% endfor %}*/
/* */
