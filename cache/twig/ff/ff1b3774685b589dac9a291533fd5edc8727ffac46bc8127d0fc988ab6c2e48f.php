<?php

/* partials/ads-banner.twig */
class __TwigTemplate_67af6b7f1bebf47122314b46d4345e80398580caf0681490b6d4d0ac1d636370 extends Twig_Template
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
            if ((((isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")) == 8) || ((isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")) == 27))) {
                // line 6
                echo "  ";
                $context["advar"] = "criteo";
            } else {
                // line 8
                echo "  ";
                $context["advar"] = "videology";
            }
            // line 10
            echo "<div class=\"sqrpub";
            if (((isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")) == 36)) {
                echo " mega-sqrpub";
            }
            echo "\">
  <div class=\"";
            // line 11
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\">
    <iframe
      ";
            // line 13
            if (((isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")) == 36)) {
                echo "width=\"300\" height=\"600\"";
            } else {
                echo "width=\"300\" height=\"250\"";
            }
            // line 14
            echo "      scrolling=\"no\"
      frameborder=\"0\"
      class=\"pmd-js-Lazyload\"
      src=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/afr.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "&amp;";
            echo twig_escape_filter($this->env, (isset($context["advar"]) ? $context["advar"] : $this->getContext($context, "advar")), "html", null, true);
            echo "=true&amp;country=";
            echo twig_escape_filter($this->env, (isset($context["country"]) ? $context["country"] : $this->getContext($context, "country")), "html", null, true);
            echo "\"
      name=\"";
            // line 18
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\"
      id=\"";
            // line 19
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\"
      allowtransparency=\"true\">
        <a href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad", array()), "html", null, true);
            echo "/delivery/ck.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\" target=\"_blank\">
          <img
            src=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad", array()), "html", null, true);
            echo "/delivery/avw.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "&amp;";
            echo twig_escape_filter($this->env, (isset($context["advar"]) ? $context["advar"] : $this->getContext($context, "advar")), "html", null, true);
            echo "=true&amp;country=";
            echo twig_escape_filter($this->env, (isset($context["country"]) ? $context["country"] : $this->getContext($context, "country")), "html", null, true);
            echo "\"
            border=\"0\"
            alt=\"\" />
        </a>
    </iframe>
  </div>
  <script>
      var ads_unique_id = '";
            // line 30
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "';
      var tmp_banner_url = '";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/afr.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "&amp;";
            echo twig_escape_filter($this->env, (isset($context["advar"]) ? $context["advar"] : $this->getContext($context, "advar")), "html", null, true);
            echo "=true&amp;country=";
            echo twig_escape_filter($this->env, (isset($context["country"]) ? $context["country"] : $this->getContext($context, "country")), "html", null, true);
            echo "';
  </script>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/ads-banner.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 31,  108 => 30,  88 => 23,  79 => 21,  74 => 19,  70 => 18,  56 => 17,  51 => 14,  45 => 13,  40 => 11,  33 => 10,  29 => 8,  25 => 6,  23 => 5,  21 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% if*/
/*   (display_ads == true) and*/
/*   (is_connected == false or (is_connected and current_account.isPremium() == false))*/
/* %}*/
/* {% if zone_id == 8 or zone_id == 27 %}*/
/*   {% set advar="criteo" %}*/
/* {% else %}*/
/*   {% set advar="videology" %}*/
/* {% endif %}*/
/* <div class="sqrpub{% if zone_id == 36 %} mega-sqrpub{% endif %}">*/
/*   <div class="{{ unique }}">*/
/*     <iframe*/
/*       {% if zone_id == 36 %}width="300" height="600"{% else %}width="300" height="250"{% endif %}*/
/*       scrolling="no"*/
/*       frameborder="0"*/
/*       class="pmd-js-Lazyload"*/
/*       src="{{ hosts.ad_full_secure }}/delivery/afr.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}&amp;{{ advar }}=true&amp;country={{ country }}"*/
/*       name="{{ unique }}"*/
/*       id="{{ unique }}"*/
/*       allowtransparency="true">*/
/*         <a href="{{ hosts.ad }}/delivery/ck.php?cb={{ now }}&amp;n={{ unique }}" target="_blank">*/
/*           <img*/
/*             src="{{ hosts.ad }}/delivery/avw.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}&amp;{{ advar }}=true&amp;country={{ country }}"*/
/*             border="0"*/
/*             alt="" />*/
/*         </a>*/
/*     </iframe>*/
/*   </div>*/
/*   <script>*/
/*       var ads_unique_id = '{{ unique }}';*/
/*       var tmp_banner_url = '{{ hosts.ad_full_secure }}/delivery/afr.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}&amp;{{ advar }}=true&amp;country={{ country }}';*/
/*   </script>*/
/* </div>*/
/* {% endif %}*/
/* */
