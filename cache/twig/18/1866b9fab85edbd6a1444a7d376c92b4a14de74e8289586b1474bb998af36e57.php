<?php

/* controllers/ui/block-account-facebook-connect.twig */
class __TwigTemplate_c926ba1b026644be4689b301a2f19cd6b8e102e81fa494edfc6a4c176a72b161 extends Twig_Template
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
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "hasFacebook", array(), "method")) {
            // line 2
            echo "<p class=\"ptv-AccountThirdParties-facebook\">
  <a href=\"https://www.facebook.com/settings?tab=applications\" target=\"_blank\" class=\"ptv-ButtonFacebook ptv-Button--block\">Compte connecté</a>
</p>
";
        } else {
            // line 6
            echo "<p class=\"ptv-AccountThirdParties-facebook\">
  <a href=\"#\" class=\"ptv-js-DialogFacebook ptv-ButtonFacebook ptv-Button--block\">Connecter mon compte</a>
</p>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/ui/block-account-facebook-connect.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 6,  21 => 2,  19 => 1,);
    }
}
/* {% if current_account.hasFacebook() %}*/
/* <p class="ptv-AccountThirdParties-facebook">*/
/*   <a href="https://www.facebook.com/settings?tab=applications" target="_blank" class="ptv-ButtonFacebook ptv-Button--block">Compte connecté</a>*/
/* </p>*/
/* {% else %}*/
/* <p class="ptv-AccountThirdParties-facebook">*/
/*   <a href="#" class="ptv-js-DialogFacebook ptv-ButtonFacebook ptv-Button--block">Connecter mon compte</a>*/
/* </p>*/
/* {% endif %}*/
/* */
