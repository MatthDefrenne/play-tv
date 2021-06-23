<?php

/* controllers/bouncer/login.twig */
class __TwigTemplate_14672f3e07c09b03ec626408fd81d32f466d11e8c55006b4e4790e3a27e4844c extends Twig_Template
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
  <div class=\"ptv-AccountPopin-branding\">Connexion</div>

  <div class=\"ptv-AccountPopinContent\">

    <section class=\"ptv-js-AccountPopin-loginSection ptv-AccountPopin-section\">
      <p>
        <a href=\"#\" rel=\"nofollow\" class=\"ptv-ButtonFacebook ptv-Button--block ptv-js-DialogFacebook\">Me connecter via Facebook</a>
      </p>

      <div class=\"ptv-AccountPopinContent-or pmd-Text--center\">
        <span>OU</span>
      </div>

      <form action=\"/connexion/\" method=\"post\" class=\"ptv-js-AccountPopin-loginForm\">
        <p><input type=\"text\" placeholder=\"Email ou nom d'utilisateur\" class=\"ptv-Input ptv-Input--block\" name=\"email\" value=\"\"></p>
        <p><input type=\"password\" placeholder=\"Mot de passe\" class=\"ptv-Input ptv-Input--block\" name=\"password\" value=\"\"></p>
        ";
        // line 18
        $this->loadTemplate("partials/popin_error.twig", "controllers/bouncer/login.twig", 18)->display($context);
        // line 19
        echo "        <p><button type=\"submit\" class=\"ptv-Button ptv-Button--block\">Me connecter</button></p>
        <p class=\"pmd-Text--center ptv-AccountPopinContent-forgotPassword\">
          <a href=\"#\" rel=\"nofollow\" class=\"pmd-js-forgotPasswordHandler\" title=\"Vous avez oublié votre mot de passe ? Cliquez-ici pour lancer la procédure de réinitialisation.\">Mot de passe oublié&nbsp;?</a>
        </p>
        <p class=\"pmd-Text--center\">Vous n'avez pas de compte&nbsp;? <a href=\"#\" rel=\"nofollow\" class=\"pmd-js-registerHandler\">Inscrivez-vous&nbsp;!</a></p>
      </form>
    </section>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 19,  38 => 18,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountPopin">*/
/*   <div class="ptv-AccountPopin-branding">Connexion</div>*/
/* */
/*   <div class="ptv-AccountPopinContent">*/
/* */
/*     <section class="ptv-js-AccountPopin-loginSection ptv-AccountPopin-section">*/
/*       <p>*/
/*         <a href="#" rel="nofollow" class="ptv-ButtonFacebook ptv-Button--block ptv-js-DialogFacebook">Me connecter via Facebook</a>*/
/*       </p>*/
/* */
/*       <div class="ptv-AccountPopinContent-or pmd-Text--center">*/
/*         <span>OU</span>*/
/*       </div>*/
/* */
/*       <form action="/connexion/" method="post" class="ptv-js-AccountPopin-loginForm">*/
/*         <p><input type="text" placeholder="Email ou nom d'utilisateur" class="ptv-Input ptv-Input--block" name="email" value=""></p>*/
/*         <p><input type="password" placeholder="Mot de passe" class="ptv-Input ptv-Input--block" name="password" value=""></p>*/
/*         {% include "partials/popin_error.twig" %}*/
/*         <p><button type="submit" class="ptv-Button ptv-Button--block">Me connecter</button></p>*/
/*         <p class="pmd-Text--center ptv-AccountPopinContent-forgotPassword">*/
/*           <a href="#" rel="nofollow" class="pmd-js-forgotPasswordHandler" title="Vous avez oublié votre mot de passe ? Cliquez-ici pour lancer la procédure de réinitialisation.">Mot de passe oublié&nbsp;?</a>*/
/*         </p>*/
/*         <p class="pmd-Text--center">Vous n'avez pas de compte&nbsp;? <a href="#" rel="nofollow" class="pmd-js-registerHandler">Inscrivez-vous&nbsp;!</a></p>*/
/*       </form>*/
/*     </section>*/
/* */
/*   </div>*/
/* </div>*/
/* */
