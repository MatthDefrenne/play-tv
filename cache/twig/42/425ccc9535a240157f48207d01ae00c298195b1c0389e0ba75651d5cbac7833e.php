<?php

/* controllers/account/_form-credit-card.twig */
class __TwigTemplate_e9386baac5333a157a1c7d0fed864158c08598e436b491d611b26bd7362901ab extends Twig_Template
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
        echo "<div class=\"ptv-js-AccountProfile ptv-AccountProfile\">

  <h3 class=\"ptv-AccountProfile-heading pmd-FormLayout-heading\">
    <span class=\"ptv-AccountProfile-headingMain\">Mes coordonnées bancaires</span>
  </h3>

  <div class=\"content ptv-AccountProfileContent ptv-js-Payment\">

    <p class=\"ptv-AccountPaymentMethod-mainline\">Vous avez enregistré une carte bancaire de type <strong>";
        // line 9
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute((isset($context["paymill_info"]) ? $context["paymill_info"] : $this->getContext($context, "paymill_info")), "cardType", array())), "html", null, true);
        echo "</strong>
      ayant pour numéro <strong>XXXX-XXXX-XXXX-";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymill_info"]) ? $context["paymill_info"] : $this->getContext($context, "paymill_info")), "last4", array()), "html", null, true);
        echo "</strong>
      et expirant le <strong>";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymill_info"]) ? $context["paymill_info"] : $this->getContext($context, "paymill_info")), "expireMonth", array()), "html", null, true);
        echo "/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paymill_info"]) ? $context["paymill_info"] : $this->getContext($context, "paymill_info")), "expireYear", array()), "html", null, true);
        echo "</strong>.</p>

    <p class=\"ptv-AccountPaymentMethod-mainline\">Si ces informations sont érronées ou obsolètes, vous pouvez changer vos coordonnées bancaires à l'aide du formulaire ci-après.</p>

    <section class=\"ptv-AccountPart\">

      <div class=\"ptv-AccountPayment\">

        <form method=\"post\" action=\"/mon-compte/coordonnees-bancaires/\" class=\"ptv-js-Payment-form\" >

          <img src=\"";
        // line 21
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/premium/cards.png\" alt=\"\" class=\"ptv-AccountPayment-cards\">

          <p class=\"ptv-AccountPayment-line pmd-InputWrapper\">
            <label class=\"ptv-Label ptv-AccountPayment-label pmd-Label\" for=\"ptv-AccountPayment-cardNumber\">Numéro de carte</label>
            <input type=\"text\" class=\"ptv-Input pmd-Input\" size=\"30\" maxlength=\"32\" data-name=\"card-number\" id=\"ptv-AccountPayment-cardNumber\" autocomplete=\"off\">
          </p>

          <p class=\"ptv-AccountPayment-line pmd-InputWrapper\">
            <label class=\"ptv-Label ptv-AccountPayment-label pmd-Label\">Date d'expiration (MM/YY)</label>
            <input type=\"text\" class=\"ptv-Input pmd-Input\" size=\"2\" maxlength=\"2\" data-name=\"card-expiry-month\" id=\"ptv-AccountPayment-cardExpiryMonth\" autocomplete=\"off\">
            <input type=\"text\" class=\"ptv-Input pmd-Input\" maxlength=\"2\" size=\"2\" data-name=\"card-expiry-year\" id=\"ptv-AccountPayment-cardExpiryYear\" autocomplete=\"off\">
          </p>

          <p class=\"ptv-AccountPayment-line pmd-InputWrapper\">
            <label class=\"ptv-Label ptv-AccountPayment-label pmd-Label\" for=\"ptv-AccountPayment-cardCVC\">Numéro de vérification</label>
            <input type=\"text\" class=\"ptv-Input pmd-Input\" size=\"3\" maxlength=\"3\" data-name=\"card-cvc\" autocomplete=\"off\" id=\"ptv-AccountPayment-cardCVC\">
          </p>

          <div class=\"ptv-js-Payment-alert ptv-Alert ptv-AccountProfileAlert\"></div>

          <p class=\"ptv-AccountProfileAction pmd-Text--right\">
            <button class=\"ptv-js-Payment-updateAction ptv-Button ptv-Button--large ladda-button pmd-Button pmd-Button--block\" data-style=\"zoom-out\" type=\"submit\">
              <span class=\"ladda-label\">Mettre à jour mes coordonnées bancaires</span>
          </button>
          </p>

        </form>

      </div>

    </section>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/account/_form-credit-card.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 21,  37 => 11,  33 => 10,  29 => 9,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountProfile ptv-AccountProfile">*/
/* */
/*   <h3 class="ptv-AccountProfile-heading pmd-FormLayout-heading">*/
/*     <span class="ptv-AccountProfile-headingMain">Mes coordonnées bancaires</span>*/
/*   </h3>*/
/* */
/*   <div class="content ptv-AccountProfileContent ptv-js-Payment">*/
/* */
/*     <p class="ptv-AccountPaymentMethod-mainline">Vous avez enregistré une carte bancaire de type <strong>{{ paymill_info.cardType|capitalize }}</strong>*/
/*       ayant pour numéro <strong>XXXX-XXXX-XXXX-{{ paymill_info.last4 }}</strong>*/
/*       et expirant le <strong>{{ paymill_info.expireMonth }}/{{ paymill_info.expireYear }}</strong>.</p>*/
/* */
/*     <p class="ptv-AccountPaymentMethod-mainline">Si ces informations sont érronées ou obsolètes, vous pouvez changer vos coordonnées bancaires à l'aide du formulaire ci-après.</p>*/
/* */
/*     <section class="ptv-AccountPart">*/
/* */
/*       <div class="ptv-AccountPayment">*/
/* */
/*         <form method="post" action="/mon-compte/coordonnees-bancaires/" class="ptv-js-Payment-form" >*/
/* */
/*           <img src="{{ apps_base_url }}/images/premium/cards.png" alt="" class="ptv-AccountPayment-cards">*/
/* */
/*           <p class="ptv-AccountPayment-line pmd-InputWrapper">*/
/*             <label class="ptv-Label ptv-AccountPayment-label pmd-Label" for="ptv-AccountPayment-cardNumber">Numéro de carte</label>*/
/*             <input type="text" class="ptv-Input pmd-Input" size="30" maxlength="32" data-name="card-number" id="ptv-AccountPayment-cardNumber" autocomplete="off">*/
/*           </p>*/
/* */
/*           <p class="ptv-AccountPayment-line pmd-InputWrapper">*/
/*             <label class="ptv-Label ptv-AccountPayment-label pmd-Label">Date d'expiration (MM/YY)</label>*/
/*             <input type="text" class="ptv-Input pmd-Input" size="2" maxlength="2" data-name="card-expiry-month" id="ptv-AccountPayment-cardExpiryMonth" autocomplete="off">*/
/*             <input type="text" class="ptv-Input pmd-Input" maxlength="2" size="2" data-name="card-expiry-year" id="ptv-AccountPayment-cardExpiryYear" autocomplete="off">*/
/*           </p>*/
/* */
/*           <p class="ptv-AccountPayment-line pmd-InputWrapper">*/
/*             <label class="ptv-Label ptv-AccountPayment-label pmd-Label" for="ptv-AccountPayment-cardCVC">Numéro de vérification</label>*/
/*             <input type="text" class="ptv-Input pmd-Input" size="3" maxlength="3" data-name="card-cvc" autocomplete="off" id="ptv-AccountPayment-cardCVC">*/
/*           </p>*/
/* */
/*           <div class="ptv-js-Payment-alert ptv-Alert ptv-AccountProfileAlert"></div>*/
/* */
/*           <p class="ptv-AccountProfileAction pmd-Text--right">*/
/*             <button class="ptv-js-Payment-updateAction ptv-Button ptv-Button--large ladda-button pmd-Button pmd-Button--block" data-style="zoom-out" type="submit">*/
/*               <span class="ladda-label">Mettre à jour mes coordonnées bancaires</span>*/
/*           </button>*/
/*           </p>*/
/* */
/*         </form>*/
/* */
/*       </div>*/
/* */
/*     </section>*/
/*   </div>*/
/* */
/* </div>*/
/* */
