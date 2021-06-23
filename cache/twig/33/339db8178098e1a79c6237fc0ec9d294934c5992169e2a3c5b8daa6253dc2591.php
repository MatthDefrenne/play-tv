<?php

/* partials/footer_mobile.twig */
class __TwigTemplate_8acbb9e877455565b28efedc9d8786f6da17cd48702ed913938884c5e65e2dd7 extends Twig_Template
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
        echo "<div class=\"pmd-MenuFooting\">

  <ul class=\"pmd-MenuSecondChoice\">
    ";
        // line 4
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 5
            echo "    <li><a href=\"/aide/support/\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item\">Contacter le support</a></li>
    <li><a href=\"/pages/mentions-legales/\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item\">Mentions Légales</a></li>
    <li><a href=\"/pages/cgu/\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item\">Conditions Générales d'Utilisation</a></li>
    <li><a href=\"/pages/donnees-personnelles/\" class=\"pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item\">Données personnelles</a></li>
    ";
        }
        // line 10
        echo "    <li><a href=\"#\" data-href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()), "html", null, true);
        echo "\" class=\"pmd-js-Menu-out pmd-js-Action--touchify pmd-MenuSecondChoice-item\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Go to standard website", array(), "messages");
        echo "</a></li>
  </ul>

  <div class=\"pmd-MenuFooting-copyrights\">© Copyrights 2008-";
        // line 13
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "Y"), "html", null, true);
        echo " Play Media SAS. ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("All rights reserved.", array(), "messages");
        echo "</div>

</div>
";
    }

    public function getTemplateName()
    {
        return "partials/footer_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 13,  33 => 10,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="pmd-MenuFooting">*/
/* */
/*   <ul class="pmd-MenuSecondChoice">*/
/*     {% if is_website_fr %}*/
/*     <li><a href="/aide/support/" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item">Contacter le support</a></li>*/
/*     <li><a href="/pages/mentions-legales/" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item">Mentions Légales</a></li>*/
/*     <li><a href="/pages/cgu/" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item">Conditions Générales d'Utilisation</a></li>*/
/*     <li><a href="/pages/donnees-personnelles/" class="pmd-js-Menu-choice pmd-js-Action--touchify pmd-MenuSecondChoice-item">Données personnelles</a></li>*/
/*     {% endif %}*/
/*     <li><a href="#" data-href="{{ hosts.current }}{{ request.uri }}" class="pmd-js-Menu-out pmd-js-Action--touchify pmd-MenuSecondChoice-item">{% trans %}Go to standard website{% endtrans %}</a></li>*/
/*   </ul>*/
/* */
/*   <div class="pmd-MenuFooting-copyrights">© Copyrights 2008-{{ now|date("Y") }} Play Media SAS. {% trans %}All rights reserved.{% endtrans %}</div>*/
/* */
/* </div>*/
/* */
