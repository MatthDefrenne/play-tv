<?php

/* partials/dns-prefetch.twig */
class __TwigTemplate_8796a278c875f3c3326da923c6f759b706fec9ce5a31162ccd99dd8ed55c502e extends Twig_Template
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
        echo "<link rel=\"dns-prefetch\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "\">
<link rel=\"dns-prefetch\" href=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "\">
<link rel=\"dns-prefetch\" href=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad", array()), "html", null, true);
        echo "\">

<link rel=\"dns-prefetch\" href=\"https://fonts.googleapis.com\">

<link rel=\"dns-prefetch\" href=\"//auth.estat.com\">
<link rel=\"dns-prefetch\" href=\"//prof.estat.com\">
<link rel=\"dns-prefetch\" href=\"//google-analytics.com\">

<link rel=\"dns-prefetch\" href=\"//facebook.com\">
<link rel=\"dns-prefetch\" href=\"//connect.facebook.net\">
<link rel=\"dns-prefetch\" href=\"//staticxx.facebook.com\">
<link rel=\"dns-prefetch\" href=\"//graph.facebook.com\">
";
        // line 19
        echo "
<link href=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "\" rel=\"preconnect\" crossorigin>
<link href=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "\" rel=\"preconnect\" crossorigin>
<link href=\"https://fonts.gstatic.com\" rel=\"preconnect\" crossorigin>
";
    }

    public function getTemplateName()
    {
        return "partials/dns-prefetch.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 21,  46 => 20,  43 => 19,  28 => 3,  24 => 2,  19 => 1,);
    }
}
/* <link rel="dns-prefetch" href="{{ apps_base_url }}">*/
/* <link rel="dns-prefetch" href="{{ static_base_url }}">*/
/* <link rel="dns-prefetch" href="{{ hosts.ad }}">*/
/* */
/* <link rel="dns-prefetch" href="https://fonts.googleapis.com">*/
/* */
/* <link rel="dns-prefetch" href="//auth.estat.com">*/
/* <link rel="dns-prefetch" href="//prof.estat.com">*/
/* <link rel="dns-prefetch" href="//google-analytics.com">*/
/* */
/* <link rel="dns-prefetch" href="//facebook.com">*/
/* <link rel="dns-prefetch" href="//connect.facebook.net">*/
/* <link rel="dns-prefetch" href="//staticxx.facebook.com">*/
/* <link rel="dns-prefetch" href="//graph.facebook.com">*/
/* {#<link rel="dns-prefetch" href="//twitter.com">*/
/* <link rel="dns-prefetch" href="//platform.twitter.com">*/
/* <link rel="dns-prefetch" href="//pbs.twimg.com">*/
/* <link rel="dns-prefetch" href="//apis.google.com">#}*/
/* */
/* <link href="{{ apps_base_url }}" rel="preconnect" crossorigin>*/
/* <link href="{{ static_base_url }}" rel="preconnect" crossorigin>*/
/* <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>*/
/* */
