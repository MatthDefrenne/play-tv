<?php

/* controllers/bouncer/request-confirmation-email.twig */
class __TwigTemplate_7bdc08e384f3d3b63d288c6e4fcc8865810a3b7fbe1b28c18b4f1820f6458972 extends Twig_Template
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
  <div class=\"ptv-AccountPopin-branding\">Vérification de compte</div>

  <div class=\"ptv-AccountPopinContent\">

    <section class=\"ptv-js-AccountPopin-requestConfirmationEmailSection ptv-AccountPopin-section\">
      <form method=\"post\" action=\"/email-de-confirmation/demande/\" class=\"ptv-js-AccountPopin-requestConfirmationEmailForm\">
        <h3 class=\"ptv-AccountPopinContent-heading\">Vérifiez votre compte !</h3>
        ";
        // line 9
        if (((isset($context["src"]) ? $context["src"] : $this->getContext($context, "src")) == "login")) {
            // line 10
            echo "          <p>Vous souhaitez vous identifier mais vous n'avez pas encore confirmé votre adresse email. Vous n'êtes plus très loin.</p>
        ";
        }
        // line 12
        echo "        <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour confirmer votre compte. Pas de souci, tout va bien.</p>
        <p><input type=\"text\" name=\"email\" placeholder=\"Adresse email\" value=\"";
        // line 13
        echo twig_escape_filter($this->env, (isset($context["email"]) ? $context["email"] : $this->getContext($context, "email")), "html", null, true);
        echo "\" class=\"ptv-Input ptv-Input--block\"></p>
        ";
        // line 14
        $this->loadTemplate("partials/popin_error.twig", "controllers/bouncer/request-confirmation-email.twig", 14)->display($context);
        // line 15
        echo "        <p><button type=\"submit\" class=\"ptv-Button ptv-Button--block\">C'est parti !</button></p>
        <p class=\"pmd-Text--center\"><a href=\"#\" rel=\"nofollow\" class=\"pmd-js-loginHandler\">« Retour</a></p>
        <p>Si vous avez besoin d'aide, n'hésitez pas à contacter le <a href=\"/aide/support/\">support Play TV</a>.</p>
      </form>
    </section>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/bouncer/request-confirmation-email.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 15,  42 => 14,  38 => 13,  35 => 12,  31 => 10,  29 => 9,  19 => 1,);
    }
}
/* <div class="ptv-js-AccountPopin">*/
/*   <div class="ptv-AccountPopin-branding">Vérification de compte</div>*/
/* */
/*   <div class="ptv-AccountPopinContent">*/
/* */
/*     <section class="ptv-js-AccountPopin-requestConfirmationEmailSection ptv-AccountPopin-section">*/
/*       <form method="post" action="/email-de-confirmation/demande/" class="ptv-js-AccountPopin-requestConfirmationEmailForm">*/
/*         <h3 class="ptv-AccountPopinContent-heading">Vérifiez votre compte !</h3>*/
/*         {% if src == 'login' %}*/
/*           <p>Vous souhaitez vous identifier mais vous n'avez pas encore confirmé votre adresse email. Vous n'êtes plus très loin.</p>*/
/*         {% endif %}*/
/*         <p>Entrez votre adresse email et nous vous enverrons un mail avec toutes les informations nécessaires pour confirmer votre compte. Pas de souci, tout va bien.</p>*/
/*         <p><input type="text" name="email" placeholder="Adresse email" value="{{ email }}" class="ptv-Input ptv-Input--block"></p>*/
/*         {% include "partials/popin_error.twig" %}*/
/*         <p><button type="submit" class="ptv-Button ptv-Button--block">C'est parti !</button></p>*/
/*         <p class="pmd-Text--center"><a href="#" rel="nofollow" class="pmd-js-loginHandler">« Retour</a></p>*/
/*         <p>Si vous avez besoin d'aide, n'hésitez pas à contacter le <a href="/aide/support/">support Play TV</a>.</p>*/
/*       </form>*/
/*     </section>*/
/* */
/*   </div>*/
/* </div>*/
/* */
