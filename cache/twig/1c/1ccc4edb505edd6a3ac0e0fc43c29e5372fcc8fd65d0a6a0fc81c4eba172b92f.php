<?php

/* controllers/bouncer/register_mobile.twig */
class __TwigTemplate_058af15779820fdafa7f3ef4c1dfd0f47089e3d4793886537bed8a5672413fe3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/bouncer/register_mobile.twig", 1);
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

  <form action=\"/inscription/\" method=\"post\" class=\"pmd-js-Register-form pmd-RegisterForm\">
    <h3 class=\"pmd-FormLayout-heading\">M'inscrire</h3>

    <div class=\"pmd-InputWrapper pmd-Cf pmd-RegisterFormInput\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"text\" placeholder=\"Nom d'utilisateur\" name=\"username\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"password\" placeholder=\"Mot de passe\" name=\"password\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"text\" placeholder=\"Email\" name=\"email\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"text\" placeholder=\"Confirmer email\" name=\"emailConfirm\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label\">Date de Naissance</label>
      <input type=\"text\" maxlength=\"2\" size=\"2\" placeholder=\"Jour\" class=\"pmd-Input pmd-Input--number pmd-Text--center\" name=\"day\" autocomplete=\"off\">
      <select class=\"pmd-Select\" name=\"month\" autocomplete=\"off\">
        <option value=\"\">Mois</option>
        <option value=\"01\">Janvier</option>
        <option value=\"02\">Février</option>
        <option value=\"03\">Mars</option>
        <option value=\"04\">Avril</option>
        <option value=\"05\">Mai</option>
        <option value=\"06\">Juin</option>
        <option value=\"07\">Juillet</option>
        <option value=\"08\">Août</option>
        <option value=\"09\">Septembre</option>
        <option value=\"10\">Octobre</option>
        <option value=\"11\">Novembre</option>
        <option value=\"12\">Décembre</option>
      </select>
      <input type=\"text\" maxlength=\"4\" size=\"4\" class=\"pmd-Input pmd-Input--number pmd-Text--center\" name=\"year\" placeholder=\"Année\" autocomplete=\"off\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <span class=\"pmd-Label pmd-RegisterForm-label\">Genre</span>
      <input type=\"radio\" class=\"pmd-InputRadio\" name=\"gender\" value=\"male\" id=\"pmd-RegisterForm-maleGenre\" autocomplete=\"off\">
      <label class=\"pmd-Label\" for=\"pmd-RegisterForm-maleGenre\">Homme</label>
      <input type=\"radio\" class=\"pmd-InputRadio\" name=\"gender\" value=\"female\" id=\"pmd-RegisterForm-femaleGenre\" autocomplete=\"off\">
      <label class=\"pmd-Label\" for=\"pmd-RegisterForm-femaleGenre\">Femme</label>
    </div>

    <div class=\"pmd-InputWrapper\">
      <input name=\"cgv\" value=\"true\" type=\"checkbox\" class=\"pmd-InputCheckbox\" autocomplete=\"off\">
      <label class=\"pmd-RegisterForm-termsLabel\">J'accepte <a href=\"/pages/cgu/\" target=\"_blank\">les Conditions d'utilisation et la Politique de confidentialité de Play TV</a></label>
    </div>

    <div class=\"pmd-InputWrapper\">
      <input name=\"mailing_partners\" value=\"true\" type=\"checkbox\" class=\"pmd-InputCheckbox\" autocomplete=\"off\">
      <label class=\"pmd-RegisterForm-termsLabel\">J'accepte de recevoir des offres partenaires</label>
    </div>

    <div class=\"pmd-js-Register-alert pmd-Alert pmd-Alert--hidden\"></div>

    <button type=\"submit\" class=\"pmd-js-Register-buttonSubmit pmd-Button pmd-Button--block pmd-RegisterForm-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">M'inscrire</span>
    </button>
  </form>

  <div class=\"pmd-Or\"><span>OU</span></div>

  <button class=\"pmd-js-FacebookAction pmd-Button pmd-Button--block pmd-Button--facebook pmd-Icons-facebook pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
    <span class=\"ladda-label\">M'inscrire via Facebook</span>
  </button>

  <p class=\"pmd-Text--center pmd-Text--airy\">Vous avez déjà un compte ? <a href=\"/connexion/\">Connectez-vous !</a></p>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/register_mobile.twig";
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
/*   <form action="/inscription/" method="post" class="pmd-js-Register-form pmd-RegisterForm">*/
/*     <h3 class="pmd-FormLayout-heading">M'inscrire</h3>*/
/* */
/*     <div class="pmd-InputWrapper pmd-Cf pmd-RegisterFormInput">*/
/*       <input class="pmd-Input pmd-Input--block" type="text" placeholder="Nom d'utilisateur" name="username" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="password" placeholder="Mot de passe" name="password" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="text" placeholder="Email" name="email" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="text" placeholder="Confirmer email" name="emailConfirm" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label">Date de Naissance</label>*/
/*       <input type="text" maxlength="2" size="2" placeholder="Jour" class="pmd-Input pmd-Input--number pmd-Text--center" name="day" autocomplete="off">*/
/*       <select class="pmd-Select" name="month" autocomplete="off">*/
/*         <option value="">Mois</option>*/
/*         <option value="01">Janvier</option>*/
/*         <option value="02">Février</option>*/
/*         <option value="03">Mars</option>*/
/*         <option value="04">Avril</option>*/
/*         <option value="05">Mai</option>*/
/*         <option value="06">Juin</option>*/
/*         <option value="07">Juillet</option>*/
/*         <option value="08">Août</option>*/
/*         <option value="09">Septembre</option>*/
/*         <option value="10">Octobre</option>*/
/*         <option value="11">Novembre</option>*/
/*         <option value="12">Décembre</option>*/
/*       </select>*/
/*       <input type="text" maxlength="4" size="4" class="pmd-Input pmd-Input--number pmd-Text--center" name="year" placeholder="Année" autocomplete="off">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <span class="pmd-Label pmd-RegisterForm-label">Genre</span>*/
/*       <input type="radio" class="pmd-InputRadio" name="gender" value="male" id="pmd-RegisterForm-maleGenre" autocomplete="off">*/
/*       <label class="pmd-Label" for="pmd-RegisterForm-maleGenre">Homme</label>*/
/*       <input type="radio" class="pmd-InputRadio" name="gender" value="female" id="pmd-RegisterForm-femaleGenre" autocomplete="off">*/
/*       <label class="pmd-Label" for="pmd-RegisterForm-femaleGenre">Femme</label>*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input name="cgv" value="true" type="checkbox" class="pmd-InputCheckbox" autocomplete="off">*/
/*       <label class="pmd-RegisterForm-termsLabel">J'accepte <a href="/pages/cgu/" target="_blank">les Conditions d'utilisation et la Politique de confidentialité de Play TV</a></label>*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input name="mailing_partners" value="true" type="checkbox" class="pmd-InputCheckbox" autocomplete="off">*/
/*       <label class="pmd-RegisterForm-termsLabel">J'accepte de recevoir des offres partenaires</label>*/
/*     </div>*/
/* */
/*     <div class="pmd-js-Register-alert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button type="submit" class="pmd-js-Register-buttonSubmit pmd-Button pmd-Button--block pmd-RegisterForm-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">M'inscrire</span>*/
/*     </button>*/
/*   </form>*/
/* */
/*   <div class="pmd-Or"><span>OU</span></div>*/
/* */
/*   <button class="pmd-js-FacebookAction pmd-Button pmd-Button--block pmd-Button--facebook pmd-Icons-facebook pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*     <span class="ladda-label">M'inscrire via Facebook</span>*/
/*   </button>*/
/* */
/*   <p class="pmd-Text--center pmd-Text--airy">Vous avez déjà un compte ? <a href="/connexion/">Connectez-vous !</a></p>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
