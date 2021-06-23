<?php

/* partials/ads-banner_mobile.twig */
class __TwigTemplate_f207d0756732eed204989ba7837f270cf25498edcc9a0f91fe64f7680727658e extends Twig_Template
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
        if ((((        // line 2
(isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && ((        // line 3
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false)))) && !twig_in_filter(        // line 4
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "account", 1 => "bouncer", 2 => "adblock", 3 => "oauth", 4 => "order", 5 => "pages", 6 => "sales", 7 => "trailer", 8 => "url", 9 => "errors")))) {
            // line 6
            $context["zone_id"] = 32;
            // line 7
            $context["unique"] = "a6842cf1";
            // line 8
            echo "<div id=\"pmd-AdsPlayMedia\" style=\"position: fixed; bottom: 0; width: 100%; height: 50px;\">
  <iframe
    src=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/afr.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "\"
    id=\"";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\"
    width=\"100%\"
    height=\"50px\"
    style=\"margin: 0; border: 0;\"
  >
    <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/ck.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\" target=\"_blank\">
      <img src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/avw.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "\" border=\"0\" alt=\"\">
    </a>
  </iframe>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/ads-banner_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 17,  50 => 16,  42 => 11,  32 => 10,  28 => 8,  26 => 7,  24 => 6,  22 => 4,  21 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% if*/
/*   (display_ads == true) and*/
/*   (is_connected == false or (is_connected and current_account.isPremium() == false)) and*/
/*   (controller_name not in ['account', 'bouncer', 'adblock', 'oauth', 'order', 'pages', 'sales', 'trailer', 'url', 'errors'])*/
/* %}*/
/* {% set zone_id = 32 %}*/
/* {% set unique = "a6842cf1" %}*/
/* <div id="pmd-AdsPlayMedia" style="position: fixed; bottom: 0; width: 100%; height: 50px;">*/
/*   <iframe*/
/*     src="{{ hosts.ad_full_secure }}/delivery/afr.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}"*/
/*     id="{{ unique }}"*/
/*     width="100%"*/
/*     height="50px"*/
/*     style="margin: 0; border: 0;"*/
/*   >*/
/*     <a href="{{ hosts.ad_full_secure }}/delivery/ck.php?cb={{ now }}&amp;n={{ unique }}" target="_blank">*/
/*       <img src="{{ hosts.ad_full_secure }}/delivery/avw.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}" border="0" alt="">*/
/*     </a>*/
/*   </iframe>*/
/* </div>*/
/* {% endif %}*/
/* */
