<?php

/* partials/ppl.twig */
class __TwigTemplate_e5ebca2b645552c263075230d17d697c50892cd87b4841ff2ae2f5c082a8aef0 extends Twig_Template
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
        echo "<script>
if ( typeof ppl !== 'object' ) {
  ppl={};
  ppl.vars={};
}

ppl.baseApiUrl = '";
        // line 7
        if ((isset($context["debug"]) ? $context["debug"] : $this->getContext($context, "debug"))) {
            echo "/index_debug.php";
        }
        echo "';

ppl.vars.controller=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "\";
ppl.vars.action=\"";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")), "html", null, true);
        echo "\";
ppl.vars.datetime=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["datetime"]) ? $context["datetime"] : $this->getContext($context, "datetime")), "html", null, true);
        echo "\";
ppl.vars.time=";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
        echo ";
ppl.vars.timezone=";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["timezone"]) ? $context["timezone"] : $this->getContext($context, "timezone")), "html", null, true);
        echo ";

ppl.vars.hosts={};
ppl.vars.hosts.static=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "\";
ppl.vars.hosts.adserver=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad", array()), "html", null, true);
        echo "\";
ppl.vars.hosts.web=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current", array()), "html", null, true);
        echo "\";
ppl.vars.hosts.currentFull=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
        echo "\";
ppl.vars.hosts.currentFullSecure=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
        echo "\";
ppl.vars.hosts.desktopFullSecure=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full_secure", array()), "html", null, true);
        echo "\";
ppl.vars.cookieConsentCountry=\"";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["cookie_consent_cc"]) ? $context["cookie_consent_cc"] : $this->getContext($context, "cookie_consent_cc")), "html", null, true);
        echo "\";

ppl.vars.show_skin_ad = ";
        // line 24
        if (((isset($context["show_skin_ad"]) ? $context["show_skin_ad"] : $this->getContext($context, "show_skin_ad")) == true)) {
            echo "true";
        } else {
            echo "false";
        }
        echo ";
ppl.vars.displayInflowPopin = ";
        // line 25
        if (((isset($context["display_inflow_popin"]) ? $context["display_inflow_popin"] : $this->getContext($context, "display_inflow_popin")) == true)) {
            echo "true";
        } else {
            echo "false";
        }
        echo ";
ppl.vars.iefInflow = ";
        // line 26
        if (((isset($context["display_inflow_popin"]) ? $context["display_inflow_popin"] : $this->getContext($context, "display_inflow_popin")) == true)) {
            echo "true";
        } else {
            echo "false";
        }
        echo ";
ppl.vars.iefAccount = true;

";
        // line 29
        if (array_key_exists("report_level", $context)) {
            echo "ppl.vars.lvl=";
            echo twig_escape_filter($this->env, (isset($context["report_level"]) ? $context["report_level"] : $this->getContext($context, "report_level")), "html", null, true);
            echo ";";
        }
        // line 30
        echo "
";
        // line 31
        if ((((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == true) &&  !twig_test_empty($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "debts", array())))) {
            // line 32
            echo "ppl.debt=";
            echo twig_escape_filter($this->env, twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "debts", array()), 0, array())), "html", null, true);
            echo ";
";
        }
        // line 34
        echo "
if ( typeof ppl.init === 'function' ) {
  ppl.init();
}
</script>
";
    }

    public function getTemplateName()
    {
        return "partials/ppl.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 34,  122 => 32,  120 => 31,  117 => 30,  111 => 29,  101 => 26,  93 => 25,  85 => 24,  80 => 22,  76 => 21,  72 => 20,  68 => 19,  64 => 18,  60 => 17,  56 => 16,  50 => 13,  46 => 12,  42 => 11,  38 => 10,  34 => 9,  27 => 7,  19 => 1,);
    }
}
/* <script>*/
/* if ( typeof ppl !== 'object' ) {*/
/*   ppl={};*/
/*   ppl.vars={};*/
/* }*/
/* */
/* ppl.baseApiUrl = '{% if debug %}/index_debug.php{% endif %}';*/
/* */
/* ppl.vars.controller="{{ controller_name }}";*/
/* ppl.vars.action="{{ action_name }}";*/
/* ppl.vars.datetime="{{ datetime }}";*/
/* ppl.vars.time={{ now }};*/
/* ppl.vars.timezone={{ timezone }};*/
/* */
/* ppl.vars.hosts={};*/
/* ppl.vars.hosts.static="{{ static_base_url }}";*/
/* ppl.vars.hosts.adserver="{{ hosts.ad }}";*/
/* ppl.vars.hosts.web="{{ hosts.current }}";*/
/* ppl.vars.hosts.currentFull="{{ hosts.current_full }}";*/
/* ppl.vars.hosts.currentFullSecure="{{ hosts.current_full_secure }}";*/
/* ppl.vars.hosts.desktopFullSecure="{{ hosts.current_full_secure }}";*/
/* ppl.vars.cookieConsentCountry="{{ cookie_consent_cc }}";*/
/* */
/* ppl.vars.show_skin_ad = {% if show_skin_ad == true %}true{% else %}false{% endif %};*/
/* ppl.vars.displayInflowPopin = {% if display_inflow_popin == true %}true{% else %}false{% endif %};*/
/* ppl.vars.iefInflow = {% if display_inflow_popin == true %}true{% else %}false{% endif %};*/
/* ppl.vars.iefAccount = true;*/
/* */
/* {% if report_level is defined %}ppl.vars.lvl={{ report_level }};{% endif %}*/
/* */
/* {% if is_connected == true and current_account.debts is not empty %}*/
/* ppl.debt={{ current_account.debts.0|json_encode() }};*/
/* {% endif %}*/
/* */
/* if ( typeof ppl.init === 'function' ) {*/
/*   ppl.init();*/
/* }*/
/* </script>*/
/* */
