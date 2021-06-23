<?php

/* controllers/account/profile_mobile.twig */
class __TwigTemplate_aaaf366e90e778da7f94db2c9ec20d9f4b607d8bc0c7dc01dfa5602540fac856 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/account/profile_mobile.twig", 1);
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
        // line 3
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) {
            // line 4
            $context["pieces"] = twig_split_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method"), "-");
            // line 5
            $context["birthdateYear"] = $this->getAttribute((isset($context["pieces"]) ? $context["pieces"] : $this->getContext($context, "pieces")), 0, array());
            // line 6
            $context["birthdateMonth"] = $this->getAttribute((isset($context["pieces"]) ? $context["pieces"] : $this->getContext($context, "pieces")), 1, array());
            // line 7
            $context["birthdateDay"] = $this->getAttribute((isset($context["pieces"]) ? $context["pieces"] : $this->getContext($context, "pieces")), 2, array());
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"pmd-FormLayout\">

";
        // line 15
        echo "
  <form action=\"/mon-compte/profil/\" method=\"post\" class=\"pmd-js-Profile-mainForm pmd-ProfileForm pmd-Form\">
    <h3 class=\"pmd-FormLayout-heading\">Mon compte Play TV :</h3>

    <div class=\"pmd-InputWrapper pmd-Cf pmd-ProfileFormInput\">
      <label class=\"pmd-Label pmd-ProfileForm-label\">Pseudo</label> <input class=\"pmd-Input pmd-ProfileForm-input\" type=\"text\" placeholder=\"phillipe75\" name=\"username\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getUsername", array(), "method"), "html", null, true);
        echo "\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-ProfileForm-label\">Email</label> <input class=\"pmd-Input pmd-ProfileForm-input\" type=\"text\" placeholder=\"exemple@mail.com\" name=\"email\" value=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getEmail", array(), "method"), "html", null, true);
        echo "\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <span class=\"pmd-Label pmd-ProfileForm-label\">Genre</span>
      <input type=\"radio\" class=\"pmd-InputRadio\" name=\"gender\" value=\"male\" id=\"pmd-ProfileForm-maleGenre\"";
        // line 29
        if (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getGender", array(), "method") == "male")) {
            echo " checked";
        }
        echo ">
      <label class=\"pmd-Label\" for=\"pmd-ProfileForm-maleGenre\">Homme</label>
      <input type=\"radio\" class=\"pmd-InputRadio\" name=\"gender\" value=\"female\" id=\"pmd-ProfileForm-femaleGenre\"";
        // line 31
        if (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getGender", array(), "method") == "female")) {
            echo " checked";
        }
        echo ">
      <label class=\"pmd-Label\" for=\"pmd-ProfileForm-femaleGenre\">Femme</label>
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-ProfileForm-label\">Nom</label> <input class=\"pmd-Input pmd-ProfileForm-input\" type=\"text\" placeholder=\"Dupont\" name=\"lastName\" value=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getLastName", array(), "method"), "html", null, true);
        echo "\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-ProfileForm-label\">Prénom</label> <input class=\"pmd-Input pmd-ProfileForm-input\" type=\"text\" placeholder=\"Philippe\" name=\"firstName\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getFirstName", array(), "method"), "html", null, true);
        echo "\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label\">Date de Naissance</label>
      <input type=\"text\" maxlength=\"2\" size=\"2\" placeholder=\"1\" class=\"pmd-Input pmd-Input--number pmd-Text--center\" name=\"day\" ";
        // line 45
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["birthdateDay"]) ? $context["birthdateDay"] : $this->getContext($context, "birthdateDay")), "html", null, true);
            echo "\"";
        }
        echo ">
      <select class=\"pmd-Select\" name=\"month\">
        <option value=\"01\" ";
        // line 47
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 1))) {
            echo "selected";
        }
        echo ">Janvier</option>
        <option value=\"02\" ";
        // line 48
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 2))) {
            echo "selected";
        }
        echo ">Février</option>
        <option value=\"03\" ";
        // line 49
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 3))) {
            echo "selected";
        }
        echo ">Mars</option>
        <option value=\"04\" ";
        // line 50
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 4))) {
            echo "selected";
        }
        echo ">Avril</option>
        <option value=\"05\" ";
        // line 51
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 5))) {
            echo "selected";
        }
        echo ">Mai</option>
        <option value=\"06\" ";
        // line 52
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 6))) {
            echo "selected";
        }
        echo ">Juin</option>
        <option value=\"07\" ";
        // line 53
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 7))) {
            echo "selected";
        }
        echo ">Juillet</option>
        <option value=\"08\" ";
        // line 54
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 8))) {
            echo "selected";
        }
        echo ">Août</option>
        <option value=\"09\" ";
        // line 55
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 9))) {
            echo "selected";
        }
        echo ">Septembre</option>
        <option value=\"10\" ";
        // line 56
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 10))) {
            echo "selected";
        }
        echo ">Octobre</option>
        <option value=\"11\" ";
        // line 57
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 11))) {
            echo "selected";
        }
        echo ">Novembre</option>
        <option value=\"12\" ";
        // line 58
        if ((( !(null === $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method") != "2013-11-21")) && ((isset($context["birthdateMonth"]) ? $context["birthdateMonth"] : $this->getContext($context, "birthdateMonth")) == 12))) {
            echo "selected";
        }
        echo ">Décembre</option>
      </select>
      <input type=\"text\" maxlength=\"4\" size=\"4\" class=\"pmd-Input pmd-Input--number pmd-Text--center\" name=\"year\" placeholder=\"1985\" ";
        // line 60
        if ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getBirthdate", array(), "method")) {
            echo "value=\"";
            echo twig_escape_filter($this->env, (isset($context["birthdateYear"]) ? $context["birthdateYear"] : $this->getContext($context, "birthdateYear")), "html", null, true);
            echo "\"";
        }
        echo ">
    </div>

    <div class=\"pmd-js-Profile-mainAlert pmd-Alert pmd-Alert--hidden\"></div>

    <button class=\"pmd-js-Profile-mainButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Modifier mon compte</span>
    </button>

  </form>

  <form action=\"/mon-compte/changement-mot-de-passe/\" method=\"post\" class=\"pmd-js-Profile-passwordForm pmd-UpdatePasswordForm pmd-Form\">
    <h3 class=\"pmd-FormLayout-heading\">Modification du mot de passe :</h3>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-UpdatePasswordForm-label\">Ancien mot de passe</label> <input class=\"pmd-Input pmd-UpdatePasswordForm-input\" type=\"password\" name=\"oldPassword\" autocomplete=\"off\" placeholder=\"••••••••••\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-UpdatePasswordForm-label\">Nouveau mot de passe</label> <input class=\"pmd-Input pmd-UpdatePasswordForm-input\" type=\"password\" name=\"password\" autocomplete=\"off\" placeholder=\"••••••••••\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <label class=\"pmd-Label pmd-UpdatePasswordForm-label\">Confirmer mot de passe</label> <input class=\"pmd-Input pmd-UpdatePasswordForm-input\" type=\"password\" name=\"confirmPassword\" autocomplete=\"off\" placeholder=\"••••••••••\">
    </div>

    <div class=\"pmd-js-Profile-passwordAlert pmd-Alert pmd-Alert--hidden\"></div>

    <button class=\"pmd-js-Profile-passwordButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Modifier mon mot de passe</span>
    </button>

  </form>

  <p class=\"pmd-Text--center pmd-Text--airy\">
    <a href=\"/mot-de-passe-oublie/\">Mot de passe oublié ?</a>
  </p>
  <p class=\"pmd-Text--center pmd-Text--airy\">
    <a href=\"/mon-compte/suppression/\" class=\"pmd-js-Profile-delete\">Supprimer mon compte</a>
  </p>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/profile_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 60,  176 => 58,  170 => 57,  164 => 56,  158 => 55,  152 => 54,  146 => 53,  140 => 52,  134 => 51,  128 => 50,  122 => 49,  116 => 48,  110 => 47,  101 => 45,  93 => 40,  86 => 36,  76 => 31,  69 => 29,  61 => 24,  54 => 20,  47 => 15,  43 => 11,  40 => 10,  36 => 1,  33 => 7,  31 => 6,  29 => 5,  27 => 4,  25 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% if current_account.getBirthdate() %}*/
/*   {% set pieces = current_account.getBirthdate()|split('-') %}*/
/*   {% set birthdateYear = pieces.0 %}*/
/*   {% set birthdateMonth = pieces.1 %}*/
/*   {% set birthdateDay = pieces.2 %}*/
/* {% endif %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-FormLayout">*/
/* */
/* {#   {% include "controllers/account/_form-profile.twig" %}*/
/*   {% include "controllers/account/_form-password.twig" %} #}*/
/* */
/*   <form action="/mon-compte/profil/" method="post" class="pmd-js-Profile-mainForm pmd-ProfileForm pmd-Form">*/
/*     <h3 class="pmd-FormLayout-heading">Mon compte Play TV :</h3>*/
/* */
/*     <div class="pmd-InputWrapper pmd-Cf pmd-ProfileFormInput">*/
/*       <label class="pmd-Label pmd-ProfileForm-label">Pseudo</label> <input class="pmd-Input pmd-ProfileForm-input" type="text" placeholder="phillipe75" name="username" value="{{ current_account.getUsername() }}">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-ProfileForm-label">Email</label> <input class="pmd-Input pmd-ProfileForm-input" type="text" placeholder="exemple@mail.com" name="email" value="{{ current_account.getEmail() }}">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <span class="pmd-Label pmd-ProfileForm-label">Genre</span>*/
/*       <input type="radio" class="pmd-InputRadio" name="gender" value="male" id="pmd-ProfileForm-maleGenre"{% if current_account.getGender() == 'male' %} checked{% endif %}>*/
/*       <label class="pmd-Label" for="pmd-ProfileForm-maleGenre">Homme</label>*/
/*       <input type="radio" class="pmd-InputRadio" name="gender" value="female" id="pmd-ProfileForm-femaleGenre"{% if current_account.getGender() == 'female' %} checked{% endif %}>*/
/*       <label class="pmd-Label" for="pmd-ProfileForm-femaleGenre">Femme</label>*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-ProfileForm-label">Nom</label> <input class="pmd-Input pmd-ProfileForm-input" type="text" placeholder="Dupont" name="lastName" value="{{ current_account.getLastName() }}">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-ProfileForm-label">Prénom</label> <input class="pmd-Input pmd-ProfileForm-input" type="text" placeholder="Philippe" name="firstName" value="{{ current_account.getFirstName() }}">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label">Date de Naissance</label>*/
/*       <input type="text" maxlength="2" size="2" placeholder="1" class="pmd-Input pmd-Input--number pmd-Text--center" name="day" {% if current_account.getBirthdate() %}value="{{ birthdateDay }}"{% endif %}>*/
/*       <select class="pmd-Select" name="month">*/
/*         <option value="01" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 1 %}selected{% endif %}>Janvier</option>*/
/*         <option value="02" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 2 %}selected{% endif %}>Février</option>*/
/*         <option value="03" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 3 %}selected{% endif %}>Mars</option>*/
/*         <option value="04" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 4 %}selected{% endif %}>Avril</option>*/
/*         <option value="05" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 5 %}selected{% endif %}>Mai</option>*/
/*         <option value="06" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 6 %}selected{% endif %}>Juin</option>*/
/*         <option value="07" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 7 %}selected{% endif %}>Juillet</option>*/
/*         <option value="08" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 8 %}selected{% endif %}>Août</option>*/
/*         <option value="09" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 9 %}selected{% endif %}>Septembre</option>*/
/*         <option value="10" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 10 %}selected{% endif %}>Octobre</option>*/
/*         <option value="11" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 11 %}selected{% endif %}>Novembre</option>*/
/*         <option value="12" {% if current_account.getBirthdate() is not null and current_account.getBirthdate() != "2013-11-21" and birthdateMonth == 12 %}selected{% endif %}>Décembre</option>*/
/*       </select>*/
/*       <input type="text" maxlength="4" size="4" class="pmd-Input pmd-Input--number pmd-Text--center" name="year" placeholder="1985" {% if current_account.getBirthdate() %}value="{{ birthdateYear }}"{% endif %}>*/
/*     </div>*/
/* */
/*     <div class="pmd-js-Profile-mainAlert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button class="pmd-js-Profile-mainButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Modifier mon compte</span>*/
/*     </button>*/
/* */
/*   </form>*/
/* */
/*   <form action="/mon-compte/changement-mot-de-passe/" method="post" class="pmd-js-Profile-passwordForm pmd-UpdatePasswordForm pmd-Form">*/
/*     <h3 class="pmd-FormLayout-heading">Modification du mot de passe :</h3>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-UpdatePasswordForm-label">Ancien mot de passe</label> <input class="pmd-Input pmd-UpdatePasswordForm-input" type="password" name="oldPassword" autocomplete="off" placeholder="••••••••••">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-UpdatePasswordForm-label">Nouveau mot de passe</label> <input class="pmd-Input pmd-UpdatePasswordForm-input" type="password" name="password" autocomplete="off" placeholder="••••••••••">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <label class="pmd-Label pmd-UpdatePasswordForm-label">Confirmer mot de passe</label> <input class="pmd-Input pmd-UpdatePasswordForm-input" type="password" name="confirmPassword" autocomplete="off" placeholder="••••••••••">*/
/*     </div>*/
/* */
/*     <div class="pmd-js-Profile-passwordAlert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button class="pmd-js-Profile-passwordButtonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Modifier mon mot de passe</span>*/
/*     </button>*/
/* */
/*   </form>*/
/* */
/*   <p class="pmd-Text--center pmd-Text--airy">*/
/*     <a href="/mot-de-passe-oublie/">Mot de passe oublié ?</a>*/
/*   </p>*/
/*   <p class="pmd-Text--center pmd-Text--airy">*/
/*     <a href="/mon-compte/suppression/" class="pmd-js-Profile-delete">Supprimer mon compte</a>*/
/*   </p>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
