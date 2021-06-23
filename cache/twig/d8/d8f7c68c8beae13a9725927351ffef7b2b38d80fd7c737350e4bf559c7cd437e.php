<?php

/* controllers/bouncer/reinitialize-password_mobile.twig */
class __TwigTemplate_496bc1b052524524e1edbde9d2a060cbc469a16bbe57f53a914758053b0ae445 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/bouncer/reinitialize-password_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"pmd-FormLayout\">

  <form action=\"/reinitialisation-mot-de-passe/\" method=\"post\" class=\"pmd-js-ReinitialisePassword-form\">
    <h3 class=\"pmd-FormLayout-heading\">Modifier mon mot de passe</h3>

    <p>Pour modifier votre mot de passe, veuillez l'indiquer ci-dessous.</p>

    <div class=\"pmd-js-ReinitialisePassword-alert pmd-Alert pmd-Alert--hidden\"></div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"password\" name=\"password\" placeholder=\"Mot de passe\" value=\"\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"password\" name=\"confirmPassword\" placeholder=\"Confirmation mot de passe\" value=\"\" autocomplete=\"off\">
    </div>

    <button class=\"pmd-js-ReinitialisePassword-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Enregistrer le mot de passe</span>
    </button>

  </form>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/reinitialize-password_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-FormLayout">*/
/* */
/*   <form action="/reinitialisation-mot-de-passe/" method="post" class="pmd-js-ReinitialisePassword-form">*/
/*     <h3 class="pmd-FormLayout-heading">Modifier mon mot de passe</h3>*/
/* */
/*     <p>Pour modifier votre mot de passe, veuillez l'indiquer ci-dessous.</p>*/
/* */
/*     <div class="pmd-js-ReinitialisePassword-alert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="password" name="password" placeholder="Mot de passe" value="" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="password" name="confirmPassword" placeholder="Confirmation mot de passe" value="" autocomplete="off">*/
/*     </div>*/
/* */
/*     <button class="pmd-js-ReinitialisePassword-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Enregistrer le mot de passe</span>*/
/*     </button>*/
/* */
/*   </form>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
