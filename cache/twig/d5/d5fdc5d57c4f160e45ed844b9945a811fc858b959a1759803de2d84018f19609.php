<?php

/* controllers/bouncer/forgot-password.twig */
class __TwigTemplate_490015f3ccf91046215745d1b5073fa1f1e7f5ef6ed376686737d36b586106d8 extends Twig_Template
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
  <div class=\"ptv-AccountPopin-branding\">Mot de passe oublié</div>

  <div class=\"ptv-AccountPopinContent\">

    <section class=\"ptv-js-AccountPopin-forgotPasswordSection ptv-AccountPopin-section\">
      <form method=\"post\" action=\"/mot-de-passe-oublie/\" class=\"ptv-js-AccountPopin-forgotPasswordForm\">
        <h3 class=\"ptv-AccountPopinContent-heading\">Réinitialisation de votre mot de passe</h3>
        <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour le réinitialiser. Pas d'inquiétude donc.</p>
        <p><input type=\"email\" name=\"email\"  placeholder=\"Adresse email\" class=\"ptv-Input ptv-Input--block\"></p>
        ";
        // line 11
        $this->loadTemplate("partials/popin_error.twig", "controllers/bouncer/forgot-password.twig", 11)->display($context);
        // line 12
        echo "        <p><button type=\"submit\" class=\"ptv-Button ptv-Button--block\">C'est parti !</button></p>
        ";
        // line 13
        if (((isset($context["src"]) ? $context["src"] : $this->getContext($context, "src")) != "order")) {
            // line 14
            echo "          <p class=\"pmd-Text--center\"><a href=\"#\" rel=\"nofollow\" class=\"pmd-js-loginHandler\">« Retour</a></p>
          <p>Si vous avez besoin d'aide, n'hésitez pas à contacter le <a href=\"/aide/support/\">support Play TV</a>.</p>
        ";
        }
        // line 17
        echo "      </form>
  </section>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/forgot-password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 17,  38 => 14,  36 => 13,  33 => 12,  31 => 11,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountPopin">*/
/*   <div class="ptv-AccountPopin-branding">Mot de passe oublié</div>*/
/* */
/*   <div class="ptv-AccountPopinContent">*/
/* */
/*     <section class="ptv-js-AccountPopin-forgotPasswordSection ptv-AccountPopin-section">*/
/*       <form method="post" action="/mot-de-passe-oublie/" class="ptv-js-AccountPopin-forgotPasswordForm">*/
/*         <h3 class="ptv-AccountPopinContent-heading">Réinitialisation de votre mot de passe</h3>*/
/*         <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour le réinitialiser. Pas d'inquiétude donc.</p>*/
/*         <p><input type="email" name="email"  placeholder="Adresse email" class="ptv-Input ptv-Input--block"></p>*/
/*         {% include "partials/popin_error.twig" %}*/
/*         <p><button type="submit" class="ptv-Button ptv-Button--block">C'est parti !</button></p>*/
/*         {% if src != 'order' %}*/
/*           <p class="pmd-Text--center"><a href="#" rel="nofollow" class="pmd-js-loginHandler">« Retour</a></p>*/
/*           <p>Si vous avez besoin d'aide, n'hésitez pas à contacter le <a href="/aide/support/">support Play TV</a>.</p>*/
/*         {% endif %}*/
/*       </form>*/
/*   </section>*/
/* */
/*   </div>*/
/* </div>*/
/* */
