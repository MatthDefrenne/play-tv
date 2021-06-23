<?php

/* partials/ads-skin_mobile.twig */
class __TwigTemplate_0c4d77f4c416d06e31ff8f89abd38b2b6a268ce01269d2dc1b3590ee4c35c6df extends Twig_Template
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
            echo "  ";
            $this->loadTemplate("partials/ads-impactify.twig", "partials/ads-skin_mobile.twig", 9)->display($context);
            // line 10
            echo "  <script async defer src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "app-ads-mobile.js", array(), "array"), "html", null, true);
            echo "\"></script>
  ";
            // line 11
            if ((isset($context["crowdfunding_iscapped"]) ? $context["crowdfunding_iscapped"] : $this->getContext($context, "crowdfunding_iscapped"))) {
                // line 12
                echo "  ";
                // line 13
                echo "  <script src=\"https://cpm1.affiz.net/tracking/ads_display.php?nodiv=1&amp;n=315f315f31383931_8d215e24cd&amp;rdads=";
                echo twig_escape_filter($this->env, twig_slice($this->env, twig_random($this->env), 0, 9), "html", null, true);
                echo "\"></script>
  ";
            }
        }
        // line 16
        echo "
</div>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/ads-skin_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 16,  42 => 13,  40 => 12,  38 => 11,  33 => 10,  30 => 9,  28 => 7,  27 => 6,  26 => 5,  25 => 4,  21 => 2,  19 => 1,);
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
/*   {% include "partials/ads-impactify.twig" %}*/
/*   <script async defer src="{{ assets.scripts['app-ads-mobile.js'] }}"></script>*/
/*   {% if crowdfunding_iscapped %}*/
/*   {# forced to sync download :-( #}*/
/*   <script src="https://cpm1.affiz.net/tracking/ads_display.php?nodiv=1&amp;n=315f315f31383931_8d215e24cd&amp;rdads={{ random()|slice(0, 9) }}"></script>*/
/*   {% endif %}*/
/* {% endif %}*/
/* */
/* </div>*/
/* {% endspaceless %}*/
/* */
