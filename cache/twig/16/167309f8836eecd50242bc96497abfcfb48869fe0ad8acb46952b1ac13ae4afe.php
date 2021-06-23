<?php

/* controllers/newsletter/unsubscribe_mobile.twig */
class __TwigTemplate_8627b757e47197fddaf7bc42c050c8a19cd92ede070ddcebcc4254014c4e327e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/newsletter/unsubscribe_mobile.twig", 1);
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

  <form action=\"/newsletter/desabonnement/\" method=\"post\" class=\"pmd-js-UnsubscribeMailing-form\">
    <h3 class=\"pmd-FormLayout-heading\">Désabonnement</h3>

    <p>Si vous ne voulez plus recevoir nos emails, cliquez sur le bouton ci-dessous</p>

    <div class=\"pmd-js-UnsubscribeMailing-alert pmd-Alert pmd-Alert--hidden\"></div>
    <input type=\"hidden\" name=\"cipher\" value=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["cipher"]) ? $context["cipher"] : $this->getContext($context, "cipher")), "html", null, true);
        echo "\">
    <button type=\"submit\" class=\"pmd-js-UnsubscribeMailing-buttonSubmit pmd-Button pmd-Button--block ladda-button\" data-style=\"zoom-out\">
      <span class=\"ladda-label\">Se désabonner</span>
    </button>
  </form>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/newsletter/unsubscribe_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 12,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-FormLayout">*/
/* */
/*   <form action="/newsletter/desabonnement/" method="post" class="pmd-js-UnsubscribeMailing-form">*/
/*     <h3 class="pmd-FormLayout-heading">Désabonnement</h3>*/
/* */
/*     <p>Si vous ne voulez plus recevoir nos emails, cliquez sur le bouton ci-dessous</p>*/
/* */
/*     <div class="pmd-js-UnsubscribeMailing-alert pmd-Alert pmd-Alert--hidden"></div>*/
/*     <input type="hidden" name="cipher" value="{{ cipher }}">*/
/*     <button type="submit" class="pmd-js-UnsubscribeMailing-buttonSubmit pmd-Button pmd-Button--block ladda-button" data-style="zoom-out">*/
/*       <span class="ladda-label">Se désabonner</span>*/
/*     </button>*/
/*   </form>*/
/* */
/* </div>*/
/* {% endblock %}*/
/* */
