<?php

/* partials/rich-snippets-google-sitelinks-search-box.twig */
class __TwigTemplate_1b6afa3ab0ec104ddf315f92a444ff8e2a540b1bd58d872ded62232fbaa29375 extends Twig_Template
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
        ob_start();
        // line 2
        if ((((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr")) && ((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "index")) && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "index"))) {
            // line 3
            echo "<script type=\"application/ld+json\">
{
  \"@context\": \"http://schema.org\",
  \"@type\": \"WebSite\",
  \"url\": \"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
            echo "/\",
  \"potentialAction\": {
    \"@type\": \"SearchAction\",
    \"target\": \"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
            echo "/recherche/?q={literal}{search_query}{/literal}\",
    \"query-input\": \"required name=search_query\"
  }
}
</script>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/rich-snippets-google-sitelinks-search-box.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 10,  29 => 7,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* {% if is_website_fr and controller_name == 'index' and action_name == 'index' %}*/
/* <script type="application/ld+json">*/
/* {*/
/*   "@context": "http://schema.org",*/
/*   "@type": "WebSite",*/
/*   "url": "{{ hosts.current_full }}/",*/
/*   "potentialAction": {*/
/*     "@type": "SearchAction",*/
/*     "target": "{{ hosts.current_full }}/recherche/?q={literal}{search_query}{/literal}",*/
/*     "query-input": "required name=search_query"*/
/*   }*/
/* }*/
/* </script>*/
/* {% endif %}*/
/* {% endspaceless %}*/
/* */
