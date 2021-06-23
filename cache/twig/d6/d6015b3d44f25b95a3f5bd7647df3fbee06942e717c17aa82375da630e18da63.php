<?php

/* controllers/newsletter/unsubscribe.twig */
class __TwigTemplate_bff4977a6dddfb9c1d3e433dba8afc89ed9c3646afee13b5364fdb5e65c596a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/newsletter/unsubscribe.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div id=\"content\">
    <div class=\"container\">

      <div class=\"pmd-NewsletterUnsubscribeContent\">
        <h1 class=\"pmd-NewsletterUnsubscribeContent-title pmd-Text--center\">Désabonnement</h1>
        <span class=\"pmd-NewsletterUnsubscribeContent-description\">Si vous ne voulez plus recevoir nos emails, cliquez sur le bouton ci-dessous</span>
        ";
        // line 10
        if (array_key_exists("success", $context)) {
            // line 11
            echo "          <p class=\"pmd-NewsletterUnsubscribeContent-success\">";
            echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : $this->getContext($context, "success")), "html", null, true);
            echo "</p>
        ";
        } elseif (        // line 12
array_key_exists("errors", $context)) {
            // line 13
            echo "          <p class=\"pmd-NewsletterUnsubscribeContent-error\">";
            echo twig_escape_filter($this->env, (isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")), "html", null, true);
            echo "</p>
        ";
        } else {
            // line 15
            echo "          <form method=\"post\" action=\"/newsletter/desabonnement/\">
            <input type=\"hidden\" name=\"cipher\" value=\"";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["cipher"]) ? $context["cipher"] : $this->getContext($context, "cipher")), "html", null, true);
            echo "\">
            <p class=\"pmd-Text--center\">
              <button class=\"ptv-Button ptv-Button--danger ptv-Button--large\">Se désabonner</button>
            </p>
          </form>
        ";
        }
        // line 22
        echo "      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/newsletter/unsubscribe.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 22,  57 => 16,  54 => 15,  48 => 13,  46 => 12,  41 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/* */
/*       <div class="pmd-NewsletterUnsubscribeContent">*/
/*         <h1 class="pmd-NewsletterUnsubscribeContent-title pmd-Text--center">Désabonnement</h1>*/
/*         <span class="pmd-NewsletterUnsubscribeContent-description">Si vous ne voulez plus recevoir nos emails, cliquez sur le bouton ci-dessous</span>*/
/*         {% if success is defined %}*/
/*           <p class="pmd-NewsletterUnsubscribeContent-success">{{ success }}</p>*/
/*         {% elseif errors is defined %}*/
/*           <p class="pmd-NewsletterUnsubscribeContent-error">{{ errors }}</p>*/
/*         {% else %}*/
/*           <form method="post" action="/newsletter/desabonnement/">*/
/*             <input type="hidden" name="cipher" value="{{ cipher }}">*/
/*             <p class="pmd-Text--center">*/
/*               <button class="ptv-Button ptv-Button--danger ptv-Button--large">Se désabonner</button>*/
/*             </p>*/
/*           </form>*/
/*         {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endblock content %}*/
/* */
