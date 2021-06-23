<?php

/* partials/ads-ga.twig */
class __TwigTemplate_9cc4530dc7bba8e54bd5618c6a3b053a8ddc6dfc8fbaaecd2dfbd25e74c3bc3a extends Twig_Template
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
        if (((        // line 2
(isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && ((        // line 3
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 5
            echo "<script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js\"></script>
<!-- Banner -->
<ins class=\"adsbygoogle\"
  style=\"display:block\"
  data-ad-client=\"ca-pub-3925211223082770\"
  data-ad-slot=\"3405466113\"
  data-ad-format=\"auto\"
  data-full-width-responsive=\"true\"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/ads-ga.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 5,  21 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% if*/
/*   (display_ads == true) and*/
/*   (is_connected == false or (is_connected and current_account.isPremium() == false))*/
/* %}*/
/* <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>*/
/* <!-- Banner -->*/
/* <ins class="adsbygoogle"*/
/*   style="display:block"*/
/*   data-ad-client="ca-pub-3925211223082770"*/
/*   data-ad-slot="3405466113"*/
/*   data-ad-format="auto"*/
/*   data-full-width-responsive="true"></ins>*/
/* <script>*/
/* (adsbygoogle = window.adsbygoogle || []).push({});*/
/* </script>*/
/* {% endif %}*/
/* */
