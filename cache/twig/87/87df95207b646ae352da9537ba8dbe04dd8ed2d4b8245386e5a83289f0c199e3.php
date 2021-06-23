<?php

/* controllers/live-tweets/_most-shared-urls.twig */
class __TwigTemplate_5d8e2bbe997f4e09b5ffbc67c3cca1906a6a00c153da62d4f7a93e1151d8acc3 extends Twig_Template
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
        echo "<div id=\"most-shared-urls\" class=\"grey-box\">

  <div class=\"block-title xmargin\">
    <p class=\"right clear-grey\">Dernière heure</p>
    <h2><strong>Liens les plus partagés</strong></h2>
  </div>

  ";
        // line 8
        if ((isset($context["most_shared_urls"]) ? $context["most_shared_urls"] : $this->getContext($context, "most_shared_urls"))) {
            // line 9
            echo "  <ol class=\"text\">
    ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["most_shared_urls"]) ? $context["most_shared_urls"] : $this->getContext($context, "most_shared_urls")));
            foreach ($context['_seq'] as $context["key"] => $context["url"]) {
                // line 11
                echo "    <li class=\"clear-grey\">";
                echo twig_escape_filter($this->env, ($context["key"] + 1), "html", null, true);
                echo ". <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["url"], "url", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["url"], "url", array()), "html", null, true);
                echo "\" target=\"_blank\" rel=\"nofollow\">";
                echo twig_escape_filter($this->env, twig_truncate_filter($this->env, $this->getAttribute($context["url"], "url", array()), 100), "html", null, true);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['url'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "  </ol>
  ";
        } else {
            // line 15
            echo "    <div class=\"text xbigger center clear-grey\"><p>...</p></div>
  ";
        }
        // line 17
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/live-tweets/_most-shared-urls.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 17,  56 => 15,  52 => 13,  37 => 11,  33 => 10,  30 => 9,  28 => 8,  19 => 1,);
    }
}
/* <div id="most-shared-urls" class="grey-box">*/
/* */
/*   <div class="block-title xmargin">*/
/*     <p class="right clear-grey">Dernière heure</p>*/
/*     <h2><strong>Liens les plus partagés</strong></h2>*/
/*   </div>*/
/* */
/*   {% if most_shared_urls %}*/
/*   <ol class="text">*/
/*     {% for key, url in most_shared_urls %}*/
/*     <li class="clear-grey">{{ key+1 }}. <a href="{{ url.url }}" title="{{ url.url }}" target="_blank" rel="nofollow">{{ url.url|truncate(100) }}</a></li>*/
/*     {% endfor %}*/
/*   </ol>*/
/*   {% else %}*/
/*     <div class="text xbigger center clear-grey"><p>...</p></div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
