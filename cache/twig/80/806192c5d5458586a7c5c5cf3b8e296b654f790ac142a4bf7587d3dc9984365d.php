<?php

/* partials/notifier-website.twig */
class __TwigTemplate_8cae21a589d2f29042526bfa008c4ea1655bc3ec6f3e84cb24ba25cd4c0614b5 extends Twig_Template
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
        if ((isset($context["notifier_website"]) ? $context["notifier_website"] : $this->getContext($context, "notifier_website"))) {
            // line 2
            echo "<div class=\"pmd-js-NotifierWebsite pmd-Notifier pmd-Notifier--active pmd-Notifier--warning pmd-Notifier--underline\">
  <div class=\"pmd-Text--center\">
    <span class=\"pmd-Notifier-icon\"><span class=\"flag flag-";
            // line 4
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute((isset($context["notifier_website"]) ? $context["notifier_website"] : $this->getContext($context, "notifier_website")), "country", array())), "html", null, true);
            echo "\"></span></span>
    <strong>";
            // line 5
            echo $this->env->getExtension('translator')->getTranslator()->trans("disable_site_banner", array("%url%" => $this->getAttribute((isset($context["notifier_website"]) ? $context["notifier_website"] : $this->getContext($context, "notifier_website")), "url", array())), "messages", $this->getAttribute((isset($context["notifier_website"]) ? $context["notifier_website"] : $this->getContext($context, "notifier_website")), "locale", array()));
            echo "</strong>
    <button class=\"pmd-js-NotifierWebsite-close pmd-Notifier-close\">×</button>
  </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/notifier-website.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if notifier_website %}*/
/* <div class="pmd-js-NotifierWebsite pmd-Notifier pmd-Notifier--active pmd-Notifier--warning pmd-Notifier--underline">*/
/*   <div class="pmd-Text--center">*/
/*     <span class="pmd-Notifier-icon"><span class="flag flag-{{ notifier_website.country|lower }}"></span></span>*/
/*     <strong>{% trans with {'%url%': notifier_website.url} into notifier_website.locale %}disable_site_banner{% endtrans %}</strong>*/
/*     <button class="pmd-js-NotifierWebsite-close pmd-Notifier-close">×</button>*/
/*   </div>*/
/* </div>*/
/* {% endif %}*/
/* */
