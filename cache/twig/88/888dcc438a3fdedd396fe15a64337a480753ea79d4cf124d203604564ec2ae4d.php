<?php

/* partials/tracking-google-analytics.twig */
class __TwigTemplate_69e95622f8e88fc468df42a3b75d9af7f061e657884841169dd627efadf9e844 extends Twig_Template
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
        if (($this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : $this->getContext($context, "analytics")), "tracking_on_load", array()) == true)) {
            // line 2
            echo "<script>
  var _gaq = [['_setAccount', '";
            // line 3
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["analytics"]) ? $context["analytics"] : $this->getContext($context, "analytics")), "ga", array()), "html", null, true);
            echo "'], ['_trackPageview']];
  _gaq.push(['_setCustomVar', 2, 'User Type', ";
            // line 4
            if ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected"))) {
                echo "'Member'";
            } else {
                echo "'Visitor'";
            }
            echo ", 2]);
  _gaq.push(['_setCustomVar', 3, 'AccountID', ";
            // line 5
            if ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected"))) {
                echo "'";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getId", array(), "method"), "html", null, true);
                echo "'";
            } else {
                echo "'0'";
            }
            echo ", 2]);
  ";
            // line 6
            if ( !(isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                // line 7
                echo "  _gaq.push(['_setCustomVar', 4, 'Layout', '";
                echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")), "html", null, true);
                echo "']);
  ";
            }
            // line 9
            echo "  ";
            if (($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "tracking_event", array(), "array", true, true) && ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array()), "tracking_event", array(), "array") == "register"))) {
                // line 10
                echo "  _gaq.push(['_trackEvent', 'ACCOUNT', 'EMAIL', 'register']);
  ";
            }
            // line 12
            echo "  (function(d) {
    var g = d.createElement('script'),
        s = d.scripts[0];
    g.src = '//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
  }(document));
</script>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/tracking-google-analytics.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 12,  57 => 10,  54 => 9,  48 => 7,  46 => 6,  36 => 5,  28 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if analytics.tracking_on_load == true %}*/
/* <script>*/
/*   var _gaq = [['_setAccount', '{{ analytics.ga }}'], ['_trackPageview']];*/
/*   _gaq.push(['_setCustomVar', 2, 'User Type', {% if is_connected %}'Member'{% else %}'Visitor'{% endif %}, 2]);*/
/*   _gaq.push(['_setCustomVar', 3, 'AccountID', {% if is_connected %}'{{ current_account.getId() }}'{% else %}'0'{% endif %}, 2]);*/
/*   {% if not is_website_fr %}*/
/*   _gaq.push(['_setCustomVar', 4, 'Layout', '{{ layout }}']);*/
/*   {% endif %}*/
/*   {% if request.get['tracking_event'] is defined and request.get['tracking_event'] == 'register' %}*/
/*   _gaq.push(['_trackEvent', 'ACCOUNT', 'EMAIL', 'register']);*/
/*   {% endif %}*/
/*   (function(d) {*/
/*     var g = d.createElement('script'),*/
/*         s = d.scripts[0];*/
/*     g.src = '//www.google-analytics.com/ga.js';*/
/*     s.parentNode.insertBefore(g, s);*/
/*   }(document));*/
/* </script>*/
/* {% endif %}*/
/* */
