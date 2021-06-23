<?php

/* controllers/aide/support_mobile.twig */
class __TwigTemplate_7c0f339f0e546a0281a87d7331d4fe0fac57f3e7669994f241ddc00e77a4f78d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/aide/support_mobile.twig", 1);
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

  <form action=\"/aide/support/\" method=\"post\" class=\"pmd-js-Support-form pmd-SupportForm\">

    <h3 class=\"pmd-FormLayout-heading\">Contactez le support</h3>

    <label class=\"pmd-Label pmd-Label--alone\">Votre adresse email</label>
    <div class=\"pmd-InputWrapper\">
      <input class=\"pmd-Input pmd-Input--block\" type=\"text\" placeholder=\"exemple@mail.fr\" name=\"email\">
    </div>

    <label class=\"pmd-Label pmd-Label--alone\">Votre message</label>
    <div class=\"pmd-InputWrapper\">
      <textarea class=\"pmd-Textarea pmd-Textarea--block\" name=\"message\" placeholder=\"Message...\" rows=\"6\"></textarea>
    </div>

    <input class=\"pmd-js-HelpSupport-flash\" type=\"hidden\" name=\"flashVersion\" value=\"\">

    <div class=\"pmd-js-Support-alert pmd-Alert pmd-Alert--hidden\"></div>

    <button type=\"submit\" class=\"pmd-js-Support-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Envoyer</span>
    </button>

  </form>

  <p>
    Vous ne pouvez pas envoyer de message avec le formulaire ci-dessus ?
  </p>
  <p>
    Contactez Olivia directement par e-mail :<br>
    <a href=\"mailto:olivia@playmedia.fr\">olivia@playmedia.fr</a>
  </p>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/aide/support_mobile.twig";
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
/*   <form action="/aide/support/" method="post" class="pmd-js-Support-form pmd-SupportForm">*/
/* */
/*     <h3 class="pmd-FormLayout-heading">Contactez le support</h3>*/
/* */
/*     <label class="pmd-Label pmd-Label--alone">Votre adresse email</label>*/
/*     <div class="pmd-InputWrapper">*/
/*       <input class="pmd-Input pmd-Input--block" type="text" placeholder="exemple@mail.fr" name="email">*/
/*     </div>*/
/* */
/*     <label class="pmd-Label pmd-Label--alone">Votre message</label>*/
/*     <div class="pmd-InputWrapper">*/
/*       <textarea class="pmd-Textarea pmd-Textarea--block" name="message" placeholder="Message..." rows="6"></textarea>*/
/*     </div>*/
/* */
/*     <input class="pmd-js-HelpSupport-flash" type="hidden" name="flashVersion" value="">*/
/* */
/*     <div class="pmd-js-Support-alert pmd-Alert pmd-Alert--hidden"></div>*/
/* */
/*     <button type="submit" class="pmd-js-Support-buttonSubmit pmd-Button pmd-Button--block pmd-Form-buttonSubmit ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Envoyer</span>*/
/*     </button>*/
/* */
/*   </form>*/
/* */
/*   <p>*/
/*     Vous ne pouvez pas envoyer de message avec le formulaire ci-dessus ?*/
/*   </p>*/
/*   <p>*/
/*     Contactez Olivia directement par e-mail :<br>*/
/*     <a href="mailto:olivia@playmedia.fr">olivia@playmedia.fr</a>*/
/*   </p>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
