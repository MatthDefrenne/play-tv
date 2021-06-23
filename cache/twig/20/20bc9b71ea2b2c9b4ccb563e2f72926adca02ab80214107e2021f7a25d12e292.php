<?php

/* controllers/bouncer/forgot-password_mobile.twig */
class __TwigTemplate_3e65677f8e4ecaa19679941f0f6afdd91247f58e395706d05e48578b499b7c62 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/bouncer/forgot-password_mobile.twig", 1);
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

  <form action=\"/mot-de-passe-oublie/\" method=\"post\" class=\"pmd-js-ForgotPassword-form\">
    <h3 class=\"pmd-FormLayout-heading\">Mot de passe oublié</h3>

    <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour le réinitialiser. Pas d'inquiétude donc.</p>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"email\" name=\"email\" placeholder=\"Adresse email\" value=\"\">
    </div>

    <div class=\"pmd-js-ForgotPassword-alert pmd-Alert pmd-Alert--hidden\"></div>

    <button type=\"submit\" class=\"pmd-js-ForgotPassword-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Réinitialiser mon mot de passe</span>
    </button>
  </form>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/forgot-password_mobile.twig";
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
/*   <form action="/mot-de-passe-oublie/" method="post" class="pmd-js-ForgotPassword-form">*/
/*     <h3 class="pmd-FormLayout-heading">Mot de passe oublié</h3>*/
/* */
/*     <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour le réinitialiser. Pas d'inquiétude donc.</p>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="email" name="email" placeholder="Adresse email" value="">*/
/*     </div>*/
/* */
/*     <div class="pmd-js-ForgotPassword-alert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button type="submit" class="pmd-js-ForgotPassword-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Réinitialiser mon mot de passe</span>*/
/*     </button>*/
/*   </form>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
