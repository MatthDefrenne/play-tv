<?php

/* controllers/account/_form-password.twig */
class __TwigTemplate_ec6cf59d7332467ec8a45da0431458cc4f122ed6e3ef91ea617217cc53a57c82 extends Twig_Template
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
        echo "<div class=\"ptv-js-AccountProfilePassword main ptv-AccountProfile\">

  <h3 class=\"ptv-AccountProfile-heading\">
    <span class=\"ptv-AccountProfile-headingMain\">Modifier mon mot de passe</span>
  </h3>

  <div class=\"content ptv-AccountProfileContent\">

    <form method=\"post\" action=\"/mon-compte/changement-mot-de-passe/\" class=\"ptv-js-AccountProfilePassword-form\">

      <div class=\"ptv-AccountProfileLine\">
        <p class=\"ptv-AccountProfileLine-inputField\">
          <label class=\"ptv-AccountProfileLine-label\" for=\"ptv-ChangePasswordForm-oldPassword\">Ancien mot de passe</label>
          <input type=\"password\" class=\"pmd-Input ptv-AccountProfileLine-input";
        // line 14
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "oldPassword", array(), "any", true, true)) {
            echo " pmd-Input--error";
        }
        echo "\" name=\"oldPassword\" id=\"ptv-ChangePasswordForm-oldPassword\" placeholder=\"Mot de passe\">
        </p>

        <p class=\"ptv-AccountProfileLine-inputField\">
          <a href=\"#\" class=\"ptv-js-AccountProfilePassword-forgotPasswordLink ptv-AccountProfilePassword-forgotPasswordLink\">Mot de passe oublié ?</a> <span id=\"forgot-password-updater\"></span>
        </p>
      </div>

      <div class=\"ptv-AccountProfileLine\">
        <p class=\"ptv-AccountProfileLine-inputField\">
          <label class=\"ptv-AccountProfileLine-label\" for=\"ptv-ChangePasswordForm-password\">Nouveau mot de passe</label>
          <input type=\"password\" class=\"pmd-Input ptv-AccountProfileLine-input";
        // line 25
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array(), "any", true, true)) {
            echo " pmd-Input--error";
        }
        echo "\" name=\"password\" id=\"ptv-ChangePasswordForm-password\" placeholder=\"Mot de passe\">
        </p>
      </div>

      <div class=\"ptv-AccountProfileLine\">
        <p class=\"ptv-AccountProfileLine-inputField\">
          <label class=\"ptv-AccountProfileLine-label\" for=\"ptv-ChangePasswordForm-confirmPassword\">Confirmer le mot de passe</label>
          <input type=\"password\" class=\"pmd-Input ptv-AccountProfileLine-input";
        // line 32
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "confirmPassword", array(), "any", true, true)) {
            echo " pmd-Input--error";
        }
        echo "\" name=\"confirmPassword\" id=\"ptv-ChangePasswordForm-confirmPassword\" placeholder=\"Mot de passe\">
        </p>
      </div>

      <div class=\"ptv-js-AccountProfilePassword-alert ptv-Alert ptv-AccountProfileAlert\"></div>

      <p class=\"ptv-AccountProfileAction pmd-Text--right\">
        <button class=\"ptv-Button ptv-Button--large\">Enregistrer le mot de passe</button>
      </p>
    </form>

  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/_form-password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 32,  50 => 25,  34 => 14,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountProfilePassword main ptv-AccountProfile">*/
/* */
/*   <h3 class="ptv-AccountProfile-heading">*/
/*     <span class="ptv-AccountProfile-headingMain">Modifier mon mot de passe</span>*/
/*   </h3>*/
/* */
/*   <div class="content ptv-AccountProfileContent">*/
/* */
/*     <form method="post" action="/mon-compte/changement-mot-de-passe/" class="ptv-js-AccountProfilePassword-form">*/
/* */
/*       <div class="ptv-AccountProfileLine">*/
/*         <p class="ptv-AccountProfileLine-inputField">*/
/*           <label class="ptv-AccountProfileLine-label" for="ptv-ChangePasswordForm-oldPassword">Ancien mot de passe</label>*/
/*           <input type="password" class="pmd-Input ptv-AccountProfileLine-input{% if errors.oldPassword is defined %} pmd-Input--error{% endif %}" name="oldPassword" id="ptv-ChangePasswordForm-oldPassword" placeholder="Mot de passe">*/
/*         </p>*/
/* */
/*         <p class="ptv-AccountProfileLine-inputField">*/
/*           <a href="#" class="ptv-js-AccountProfilePassword-forgotPasswordLink ptv-AccountProfilePassword-forgotPasswordLink">Mot de passe oublié ?</a> <span id="forgot-password-updater"></span>*/
/*         </p>*/
/*       </div>*/
/* */
/*       <div class="ptv-AccountProfileLine">*/
/*         <p class="ptv-AccountProfileLine-inputField">*/
/*           <label class="ptv-AccountProfileLine-label" for="ptv-ChangePasswordForm-password">Nouveau mot de passe</label>*/
/*           <input type="password" class="pmd-Input ptv-AccountProfileLine-input{% if errors.password is defined %} pmd-Input--error{% endif %}" name="password" id="ptv-ChangePasswordForm-password" placeholder="Mot de passe">*/
/*         </p>*/
/*       </div>*/
/* */
/*       <div class="ptv-AccountProfileLine">*/
/*         <p class="ptv-AccountProfileLine-inputField">*/
/*           <label class="ptv-AccountProfileLine-label" for="ptv-ChangePasswordForm-confirmPassword">Confirmer le mot de passe</label>*/
/*           <input type="password" class="pmd-Input ptv-AccountProfileLine-input{% if errors.confirmPassword is defined %} pmd-Input--error{% endif %}" name="confirmPassword" id="ptv-ChangePasswordForm-confirmPassword" placeholder="Mot de passe">*/
/*         </p>*/
/*       </div>*/
/* */
/*       <div class="ptv-js-AccountProfilePassword-alert ptv-Alert ptv-AccountProfileAlert"></div>*/
/* */
/*       <p class="ptv-AccountProfileAction pmd-Text--right">*/
/*         <button class="ptv-Button ptv-Button--large">Enregistrer le mot de passe</button>*/
/*       </p>*/
/*     </form>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
