<?php

/* partials/structured-data-google-knowledge-graph.twig */
class __TwigTemplate_754d8e876e58f7f6871355b5b4f5a36187054336f223565c6f19648d0e50657b extends Twig_Template
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
  \"@type\": \"Organization\",
  \"name\" : \"Play TV\",
  \"url\": \"https://playtv.fr\",
  \"logo\": \"https://static.playmedia-cdn.net/play-tv.svg\",
  \"sameAs\" : [
    \"https://www.facebook.com/www.playtv.fr\",
    \"https://twitter.com/PLAYTV_FR\",
    \"https://plus.google.com/+playtv\"
  ]
}
</script>
";
        }
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/structured-data-google-knowledge-graph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* {% if is_website_fr and controller_name == 'index' and action_name == 'index' %}*/
/* <script type="application/ld+json">*/
/* {*/
/*   "@context": "http://schema.org",*/
/*   "@type": "Organization",*/
/*   "name" : "Play TV",*/
/*   "url": "https://playtv.fr",*/
/*   "logo": "https://static.playmedia-cdn.net/play-tv.svg",*/
/*   "sameAs" : [*/
/*     "https://www.facebook.com/www.playtv.fr",*/
/*     "https://twitter.com/PLAYTV_FR",*/
/*     "https://plus.google.com/+playtv"*/
/*   ]*/
/* }*/
/* </script>*/
/* {% endif %}*/
/* {% endspaceless %}*/
/* */
