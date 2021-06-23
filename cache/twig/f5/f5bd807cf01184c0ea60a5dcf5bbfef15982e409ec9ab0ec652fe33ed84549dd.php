<?php

/* partials/sdk-paymill.twig */
class __TwigTemplate_7b3adb0a3241dbb37e17fc7218b93b1f78e7b4290efee15eddbc04cc2cd0fc86 extends Twig_Template
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
        if ($this->env->getExtension('playtv_feature')->hasFeature("sales")) {
            // line 2
            if (twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "order", 1 => "account"))) {
                // line 3
                echo "<script>
  var PAYMILL_PUBLIC_KEY = '";
                // line 4
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["external_apis"]) ? $context["external_apis"] : $this->getContext($context, "external_apis")), "paymill", array()), "public_key", array()), "html", null, true);
                echo "';
</script>
<script async defer src=\"https://bridge.paymill.com/\"></script>
";
            }
        }
    }

    public function getTemplateName()
    {
        return "partials/sdk-paymill.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if has_feature('sales') %}*/
/* {% if controller_name in ['order', 'account'] %}*/
/* <script>*/
/*   var PAYMILL_PUBLIC_KEY = '{{ external_apis.paymill.public_key }}';*/
/* </script>*/
/* <script async defer src="https://bridge.paymill.com/"></script>*/
/* {% endif %}*/
/* {% endif %}*/
/* */
