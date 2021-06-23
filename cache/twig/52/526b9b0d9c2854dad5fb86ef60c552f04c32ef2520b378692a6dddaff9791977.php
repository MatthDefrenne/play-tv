<?php

/* controllers/bouncer/login_mobile.twig */
class __TwigTemplate_39a193fec6a254bb9e5174935fd28d3e68725bdec24c0995c8e19c8a4d2f6a0b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/bouncer/login_mobile.twig", 1);
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

  <form action=\"/connexion/\" method=\"post\" class=\"pmd-js-Login-form pmd-LoginForm\">
    <h3 class=\"pmd-FormLayout-heading\">Me connecter</h3>

    <div class=\"pmd-InputWrapper pmd-Cf pmd-LoginFormInput\">
      <input class=\"pmd-Input pmd-Input--block pmd-LoginForm-input\" type=\"text\" placeholder=\"Email ou nom d'utilisateur\" name=\"email\">
    </div>

    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"password\" placeholder=\"Mot de passe\" name=\"password\">
    </div>

    <div class=\"pmd-js-Login-alert pmd-Alert pmd-Alert--hidden\"></div>

    <button type=\"submit\" class=\"pmd-js-Login-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Me connecter</span>
    </button>
  </form>

  <div class=\"pmd-Or\"><span>OU</span></div>

  <button class=\"pmd-js-FacebookAction pmd-Button pmd-Button--block pmd-Button--facebook pmd-Icons-facebook pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
    <span class=\"ladda-label\">Me connecter via Facebook</span>
  </button>

  <p class=\"pmd-Text--center pmd-Text--airy\">Vous n'avez pas de compte ? <a href=\"/inscription/\">Inscrivez-vous !</a></p>

  <p class=\"pmd-Text--center pmd-Text--airy\"><a href=\"/mot-de-passe-oublie/\">Mot de passe oublié ?</a></p>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/login_mobile.twig";
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
/*   <form action="/connexion/" method="post" class="pmd-js-Login-form pmd-LoginForm">*/
/*     <h3 class="pmd-FormLayout-heading">Me connecter</h3>*/
/* */
/*     <div class="pmd-InputWrapper pmd-Cf pmd-LoginFormInput">*/
/*       <input class="pmd-Input pmd-Input--block pmd-LoginForm-input" type="text" placeholder="Email ou nom d'utilisateur" name="email">*/
/*     </div>*/
/* */
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="password" placeholder="Mot de passe" name="password">*/
/*     </div>*/
/* */
/*     <div class="pmd-js-Login-alert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button type="submit" class="pmd-js-Login-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Me connecter</span>*/
/*     </button>*/
/*   </form>*/
/* */
/*   <div class="pmd-Or"><span>OU</span></div>*/
/* */
/*   <button class="pmd-js-FacebookAction pmd-Button pmd-Button--block pmd-Button--facebook pmd-Icons-facebook pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*     <span class="ladda-label">Me connecter via Facebook</span>*/
/*   </button>*/
/* */
/*   <p class="pmd-Text--center pmd-Text--airy">Vous n'avez pas de compte ? <a href="/inscription/">Inscrivez-vous !</a></p>*/
/* */
/*   <p class="pmd-Text--center pmd-Text--airy"><a href="/mot-de-passe-oublie/">Mot de passe oublié ?</a></p>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
