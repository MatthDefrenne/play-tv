<?php

/* controllers/bouncer/register.twig */
class __TwigTemplate_36a9ce3df128a1cc184da8bd6532ee03a4ebcddee6732dc21dcd90832df056b3 extends Twig_Template
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
        echo "<div class=\"ptv-js-AccountPopin\">

  <div class=\"ptv-AccountPopinHeading\">
    <p>Inscrivez-vous, c'est gratuit</p>
  </div>

  <div class=\"ptv-AccountPopinContent\">

    <section class=\"ptv-AccountPopin-section--classicRegister ptv-AccountPopin-section ptv-AccountPopin-classicRegisterSection\">

      <h3 class=\"ptv-AccountPopinContent-heading\">Par email</h3>

      <form method=\"post\" action=\"/inscription/\" class=\"ptv-js-AccountPopin-registerForm\">
        <p><input type=\"text\"";
        // line 14
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "username", array(), "any", true, true)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "username", array()), array("." => "")), "html", null, true);
            echo "\"";
        }
        echo " placeholder=\"Nom d'utilisateur\" class=\"ptv-Input ptv-Input--block\" name=\"username\" autocomplete=\"off\"></p>
        <p><input type=\"password\" placeholder=\"Mot de passe\" class=\"ptv-Input ptv-Input--block\" name=\"password\" autocomplete=\"off\"></p>
        <p><input type=\"email\"";
        // line 16
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email", array(), "any", true, true)) {
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "email", array()), "html", null, true);
            echo "\"";
        }
        echo " placeholder=\"Email\" class=\"ptv-Input ptv-Input--block\" name=\"email\" autocomplete=\"off\"></p>
        <p><input type=\"email\" placeholder=\"Confirmer email\" class=\"ptv-Input ptv-Input--block\" name=\"emailConfirm\" autocomplete=\"off\"></p>
        <p>
          <label class=\"ptv-Label--block ptv-AccountPopinContent-label\">Date de naissance :</label>
          <input type=\"number\" class=\"ptv-Input\" name=\"day\" placeholder=\"Jour\" min=\"1\" max=\"31\" ";
        // line 20
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "day", array(), "any", true, true)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "day", array()), "html", null, true);
            echo "\"";
        }
        echo " style=\"width: 42px;\" autocomplete=\"off\">
          <span class=\"ptv-Select\">
            <select name=\"month\" autocomplete=\"off\">
              <option value=\"\">Mois</option>
              <option value=\"01\" ";
        // line 24
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "01"))) {
            echo "selected";
        }
        echo ">Janvier</option>
              <option value=\"02\" ";
        // line 25
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "02"))) {
            echo "selected";
        }
        echo ">Février</option>
              <option value=\"03\" ";
        // line 26
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "03"))) {
            echo "selected";
        }
        echo ">Mars</option>
              <option value=\"04\" ";
        // line 27
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "04"))) {
            echo "selected";
        }
        echo ">Avril</option>
              <option value=\"05\" ";
        // line 28
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "05"))) {
            echo "selected";
        }
        echo ">Mai</option>
              <option value=\"06\" ";
        // line 29
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "06"))) {
            echo "selected";
        }
        echo ">Juin</option>
              <option value=\"07\" ";
        // line 30
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "07"))) {
            echo "selected";
        }
        echo ">Juillet</option>
              <option value=\"08\" ";
        // line 31
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "08"))) {
            echo "selected";
        }
        echo ">Août</option>
              <option value=\"09\" ";
        // line 32
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "09"))) {
            echo "selected";
        }
        echo ">Septembre</option>
              <option value=\"10\" ";
        // line 33
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "10"))) {
            echo "selected";
        }
        echo ">Octobre</option>
              <option value=\"11\" ";
        // line 34
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "11"))) {
            echo "selected";
        }
        echo ">Novembre</option>
              <option value=\"12\" ";
        // line 35
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "month", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "month", array()) == "12"))) {
            echo "selected";
        }
        echo ">Décembre</option>
            </select>
          </span>
          <input type=\"number\" class=\"ptv-Input\" name=\"year\" placeholder=\"Année\" min=\"1900\" maxlength=\"4\" ";
        // line 38
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "year", array(), "any", true, true)) {
            echo "value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "year", array()), "html", null, true);
            echo "\"";
        }
        echo " style=\"width: 62px;\" autocomplete=\"off\">
        </p>
        <p>
          <input type=\"hidden\" name=\"gender\" value=\"\" autocomplete=\"off\">
          <span class=\"ptv-AccountPopinContent-genre\">
            <input name=\"gender\" type=\"radio\" value=\"male\"";
        // line 43
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "gender", array()) == "male"))) {
            echo " checked";
        }
        echo " id=\"ptv-RegisterForm-maleGender\" autocomplete=\"off\"> <label for=\"ptv-RegisterForm-maleGender\">Homme</label>
          </span>
          <span class=\"ptv-AccountPopinContent-genre\">
            <input name=\"gender\" type=\"radio\" value=\"female\"";
        // line 46
        if (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "gender", array(), "any", true, true) && ($this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "gender", array()) == "female"))) {
            echo " checked ";
        }
        echo "  id=\"ptv-RegisterForm-femaleGender\" autocomplete=\"off\"> <label for=\"ptv-RegisterForm-femaleGender\">Femme</label>
          </span>
        </p>
        <p class=\"ptv-AccountPopinContent-notice\">
          <input type=\"hidden\" name=\"cgv\" value=\"false\" autocomplete=\"off\">
          <input type=\"checkbox\" name=\"cgv\" value=\"true\" autocomplete=\"off\"> J'accepte <a style=\"text-decoration: underline\" href=\"/pages/cgu/\" target=\"_blank\" title=\"Lire les Conditions d'utilisation et la Politique de confidentialité de Play TV\">les Conditions d'utilisation et la Politique de confidentialité de Play TV</a>.
        </p>
        <p class=\"ptv-AccountPopinContent-notice\">
          <input type=\"hidden\" name=\"mailing_partners\" value=\"false\" autocomplete=\"off\">
          <input type=\"checkbox\" name=\"mailing_partners\" value=\"true\" autocomplete=\"off\"> J'accepte de recevoir des offres partenaires.
        </p>
        ";
        // line 57
        $this->loadTemplate("partials/popin_error.twig", "controllers/bouncer/register.twig", 57)->display($context);
        // line 58
        echo "        <p class=\"ptv-AccountPopinRegister-action\">
          <button type=\"submit\" class=\"ptv-Button ptv-Button--block\">M'inscrire !</button>
        </p>
        ";
        // line 61
        if ($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "provider", array(), "any", true, true)) {
            // line 62
            echo "          <input type=\"hidden\" name=\"provider\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "provider", array()), "html", null, true);
            echo "\">
          <input type=\"hidden\" name=\"uid\" value=\"";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "uid", array()), "html", null, true);
            echo "\">
          <input type=\"hidden\" name=\"token\" value=\"";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "token", array()), "html", null, true);
            echo "\">
          <input type=\"hidden\" name=\"tokenSecret\" value=\"";
            // line 65
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "token_secret", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["user"]) ? $context["user"] : null), "token_secret", array()), "")) : ("")), "html", null, true);
            echo "\">
        ";
        }
        // line 67
        echo "      </form>

    </section>

    <div class=\"ptv-AccountPopinRegister-or\" title=\"Choisissez entre l'inscription classique et l'inscription via un réseau social tiers.\">OU</div>

    <section class=\"ptv-js-AccountPopin-thirdPartiesSection ptv-AccountPopin-section ptv-AccountPopin-thirdPartiesSection ptv-AccountPopinThirdPartiesSection\">

      <h3 class=\"ptv-AccountPopinContent-heading ptv-AccountPopinThirdPartiesSection-heading\">Par réseaux sociaux</h3>
      <p class=\"pmd-Text--center\">
        <a href=\"#\" class=\"ptv-js-DialogFacebook ptv-ButtonFacebook ptv-Button--mini\">M'inscrire via Facebook</a>
      </p>
      <div class=\"ptv-AccountPopinThirdPartiesDescription pmd-Text--center\">
        <p>
          L'inscription via Facebook est une <strong>option</strong>.
        </p>
        <p>
          Si vous ne souhaitez pas utiliser ce réseau social, veuillez renseigner le formulaire ci-contre.
        </p>
      </div>
      <p class=\"pmd-Text--center ptv-AccountPopinThirdPartiesSection-login\">
        Vous avez déjà un compte ?<br><a href=\"#\" rel=\"nofollow\" class=\"pmd-js-loginHandler\">Connectez-vous !</a>
      </p>

    </section>

  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/register.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  202 => 67,  197 => 65,  193 => 64,  189 => 63,  184 => 62,  182 => 61,  177 => 58,  175 => 57,  159 => 46,  151 => 43,  139 => 38,  131 => 35,  125 => 34,  119 => 33,  113 => 32,  107 => 31,  101 => 30,  95 => 29,  89 => 28,  83 => 27,  77 => 26,  71 => 25,  65 => 24,  54 => 20,  43 => 16,  34 => 14,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountPopin">*/
/* */
/*   <div class="ptv-AccountPopinHeading">*/
/*     <p>Inscrivez-vous, c'est gratuit</p>*/
/*   </div>*/
/* */
/*   <div class="ptv-AccountPopinContent">*/
/* */
/*     <section class="ptv-AccountPopin-section--classicRegister ptv-AccountPopin-section ptv-AccountPopin-classicRegisterSection">*/
/* */
/*       <h3 class="ptv-AccountPopinContent-heading">Par email</h3>*/
/* */
/*       <form method="post" action="/inscription/" class="ptv-js-AccountPopin-registerForm">*/
/*         <p><input type="text"{% if user.username is defined %} value="{{ user.username|replace({ '.':'' }) }}"{% endif %} placeholder="Nom d'utilisateur" class="ptv-Input ptv-Input--block" name="username" autocomplete="off"></p>*/
/*         <p><input type="password" placeholder="Mot de passe" class="ptv-Input ptv-Input--block" name="password" autocomplete="off"></p>*/
/*         <p><input type="email"{% if user.email is defined %} value="{{ user.email }}"{% endif %} placeholder="Email" class="ptv-Input ptv-Input--block" name="email" autocomplete="off"></p>*/
/*         <p><input type="email" placeholder="Confirmer email" class="ptv-Input ptv-Input--block" name="emailConfirm" autocomplete="off"></p>*/
/*         <p>*/
/*           <label class="ptv-Label--block ptv-AccountPopinContent-label">Date de naissance :</label>*/
/*           <input type="number" class="ptv-Input" name="day" placeholder="Jour" min="1" max="31" {% if user.day is defined %}value="{{ user.day }}"{% endif %} style="width: 42px;" autocomplete="off">*/
/*           <span class="ptv-Select">*/
/*             <select name="month" autocomplete="off">*/
/*               <option value="">Mois</option>*/
/*               <option value="01" {% if user.month is defined and user.month == "01" %}selected{% endif %}>Janvier</option>*/
/*               <option value="02" {% if user.month is defined and user.month == "02" %}selected{% endif %}>Février</option>*/
/*               <option value="03" {% if user.month is defined and user.month == "03" %}selected{% endif %}>Mars</option>*/
/*               <option value="04" {% if user.month is defined and user.month == "04" %}selected{% endif %}>Avril</option>*/
/*               <option value="05" {% if user.month is defined and user.month == "05" %}selected{% endif %}>Mai</option>*/
/*               <option value="06" {% if user.month is defined and user.month == "06" %}selected{% endif %}>Juin</option>*/
/*               <option value="07" {% if user.month is defined and user.month == "07" %}selected{% endif %}>Juillet</option>*/
/*               <option value="08" {% if user.month is defined and user.month == "08" %}selected{% endif %}>Août</option>*/
/*               <option value="09" {% if user.month is defined and user.month == "09" %}selected{% endif %}>Septembre</option>*/
/*               <option value="10" {% if user.month is defined and user.month == "10" %}selected{% endif %}>Octobre</option>*/
/*               <option value="11" {% if user.month is defined and user.month == "11" %}selected{% endif %}>Novembre</option>*/
/*               <option value="12" {% if user.month is defined and user.month == "12" %}selected{% endif %}>Décembre</option>*/
/*             </select>*/
/*           </span>*/
/*           <input type="number" class="ptv-Input" name="year" placeholder="Année" min="1900" maxlength="4" {% if user.year is defined %}value="{{ user.year }}"{% endif %} style="width: 62px;" autocomplete="off">*/
/*         </p>*/
/*         <p>*/
/*           <input type="hidden" name="gender" value="" autocomplete="off">*/
/*           <span class="ptv-AccountPopinContent-genre">*/
/*             <input name="gender" type="radio" value="male"{% if user.gender is defined  and user.gender == 'male' %} checked{% endif %} id="ptv-RegisterForm-maleGender" autocomplete="off"> <label for="ptv-RegisterForm-maleGender">Homme</label>*/
/*           </span>*/
/*           <span class="ptv-AccountPopinContent-genre">*/
/*             <input name="gender" type="radio" value="female"{% if user.gender is defined  and user.gender == 'female' %} checked {% endif %}  id="ptv-RegisterForm-femaleGender" autocomplete="off"> <label for="ptv-RegisterForm-femaleGender">Femme</label>*/
/*           </span>*/
/*         </p>*/
/*         <p class="ptv-AccountPopinContent-notice">*/
/*           <input type="hidden" name="cgv" value="false" autocomplete="off">*/
/*           <input type="checkbox" name="cgv" value="true" autocomplete="off"> J'accepte <a style="text-decoration: underline" href="/pages/cgu/" target="_blank" title="Lire les Conditions d'utilisation et la Politique de confidentialité de Play TV">les Conditions d'utilisation et la Politique de confidentialité de Play TV</a>.*/
/*         </p>*/
/*         <p class="ptv-AccountPopinContent-notice">*/
/*           <input type="hidden" name="mailing_partners" value="false" autocomplete="off">*/
/*           <input type="checkbox" name="mailing_partners" value="true" autocomplete="off"> J'accepte de recevoir des offres partenaires.*/
/*         </p>*/
/*         {% include "partials/popin_error.twig" %}*/
/*         <p class="ptv-AccountPopinRegister-action">*/
/*           <button type="submit" class="ptv-Button ptv-Button--block">M'inscrire !</button>*/
/*         </p>*/
/*         {% if user.provider is defined  %}*/
/*           <input type="hidden" name="provider" value="{{ user.provider }}">*/
/*           <input type="hidden" name="uid" value="{{ user.uid }}">*/
/*           <input type="hidden" name="token" value="{{ user.token }}">*/
/*           <input type="hidden" name="tokenSecret" value="{{ user.token_secret|default('') }}">*/
/*         {% endif %}*/
/*       </form>*/
/* */
/*     </section>*/
/* */
/*     <div class="ptv-AccountPopinRegister-or" title="Choisissez entre l'inscription classique et l'inscription via un réseau social tiers.">OU</div>*/
/* */
/*     <section class="ptv-js-AccountPopin-thirdPartiesSection ptv-AccountPopin-section ptv-AccountPopin-thirdPartiesSection ptv-AccountPopinThirdPartiesSection">*/
/* */
/*       <h3 class="ptv-AccountPopinContent-heading ptv-AccountPopinThirdPartiesSection-heading">Par réseaux sociaux</h3>*/
/*       <p class="pmd-Text--center">*/
/*         <a href="#" class="ptv-js-DialogFacebook ptv-ButtonFacebook ptv-Button--mini">M'inscrire via Facebook</a>*/
/*       </p>*/
/*       <div class="ptv-AccountPopinThirdPartiesDescription pmd-Text--center">*/
/*         <p>*/
/*           L'inscription via Facebook est une <strong>option</strong>.*/
/*         </p>*/
/*         <p>*/
/*           Si vous ne souhaitez pas utiliser ce réseau social, veuillez renseigner le formulaire ci-contre.*/
/*         </p>*/
/*       </div>*/
/*       <p class="pmd-Text--center ptv-AccountPopinThirdPartiesSection-login">*/
/*         Vous avez déjà un compte ?<br><a href="#" rel="nofollow" class="pmd-js-loginHandler">Connectez-vous !</a>*/
/*       </p>*/
/* */
/*     </section>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
