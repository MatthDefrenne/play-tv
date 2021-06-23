<?php

/* partials/ads-skin.twig */
class __TwigTemplate_ae664d638de55b5c411cacb6654d5cb0634235e78a54c77ae8853b3506fac24b extends Twig_Template
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
        echo "<div class=\"pmd-js-root\">

";
        // line 4
        if (((((        // line 5
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && (false == $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method")))) && !twig_in_filter(        // line 6
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "account", 1 => "bouncer", 2 => "adblock", 3 => "aide", 4 => "oauth", 5 => "order", 6 => "sales", 7 => "television", 8 => "trailer", 9 => "url", 10 => "player", 11 => "errors", 12 => "newsletter"))) && ((        // line 7
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) != "pages") && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) != "browser_choice")))) {
            // line 9
            echo "
  ";
            // line 10
            if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                // line 11
                echo "    ";
                $this->loadTemplate("partials/ads-impactify.twig", "partials/ads-skin.twig", 11)->display($context);
                // line 12
                echo "    ";
                if ((isset($context["crowdfunding_iscapped"]) ? $context["crowdfunding_iscapped"] : $this->getContext($context, "crowdfunding_iscapped"))) {
                    // line 13
                    echo "    <div id=\"stickyadstv-slot\"></div>
    ";
                }
                // line 15
                echo "    ";
                // line 16
                echo "    <script src=\"https://ads.ayads.co/ajs.php?zid=83\"></script>
    <script async defer src=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-ads.js", array(), "array"), "html", null, true);
                echo "\"></script>
  ";
            }
            // line 19
            echo "
  ";
            // line 20
            if ((isset($context["is_website_uk"]) ? $context["is_website_uk"] : $this->getContext($context, "is_website_uk"))) {
                // line 21
                echo "  ";
                if (twig_in_filter((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), array(0 => "programmes_prime_tonight", 1 => "programmes_en_direct"))) {
                    // line 22
                    echo "    <div id=\"teads-slot\"></div>
    <script async defer src=\"";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-ads.js", array(), "array"), "html", null, true);
                    echo "\"></script>
  ";
                }
                // line 25
                echo "  ";
            }
            // line 26
            echo "
";
        }
        // line 28
        echo "
</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/ads-skin.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 28,  74 => 26,  71 => 25,  66 => 23,  63 => 22,  60 => 21,  58 => 20,  55 => 19,  50 => 17,  47 => 16,  45 => 15,  41 => 13,  38 => 12,  35 => 11,  33 => 10,  30 => 9,  28 => 7,  27 => 6,  26 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <div class="pmd-js-root">*/
/* */
/* {% if*/
/*   (is_connected == false or (is_connected and false == current_account.isPremium())) and*/
/*   (controller_name not in ['account', 'bouncer', 'adblock', 'aide', 'oauth', 'order', 'sales', 'television', 'trailer', 'url', 'player', 'errors', 'newsletter']) and*/
/*   (controller_name != 'pages' and action_name != 'browser_choice')*/
/* %}*/
/* */
/*   {% if is_website_fr %}*/
/*     {% include "partials/ads-impactify.twig" %}*/
/*     {% if crowdfunding_iscapped %}*/
/*     <div id="stickyadstv-slot"></div>*/
/*     {% endif %}*/
/*     {# forced to sync download :-( #}*/
/*     <script src="https://ads.ayads.co/ajs.php?zid=83"></script>*/
/*     <script async defer src="{{ assets.scripts['app-ads.js'] }}"></script>*/
/*   {% endif %}*/
/* */
/*   {% if is_website_uk %}*/
/*   {% if route_name in ['programmes_prime_tonight', 'programmes_en_direct'] %}*/
/*     <div id="teads-slot"></div>*/
/*     <script async defer src="{{ assets.scripts['app-ads.js'] }}"></script>*/
/*   {% endif %}*/
/*   {% endif %}*/
/* */
/* {% endif %}*/
/* */
/* </div>*/
/* {% endspaceless %}*/
/* */
