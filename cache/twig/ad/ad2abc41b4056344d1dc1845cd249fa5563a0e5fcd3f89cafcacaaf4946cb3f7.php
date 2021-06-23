<?php

/* controllers/errors/gone.twig */
class __TwigTemplate_e6a56d50bb34aefaf2a142c86885861f8f6d10fc1e6fb8131dba243488cfc6ab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/errors/gone.twig", 1);
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
      <div class=\"row\">
        <div class=\"span16 ptv-Error404\">
          <div class=\"page-title ptv-Error404Header\">
            <h1 class=\"ptv-Error404Header-heading\">";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("%status_code% ERROR", array("%status_code%" => 410), "messages");
        echo "</h1>
            <p class=\"ptv-Error404Header-subheading\">";
        // line 10
        echo $this->env->getExtension('translator')->getTranslator()->trans("The page you are looking for doesn't exist.", array(), "messages");
        echo "</p>
            <p>";
        // line 11
        echo $this->env->getExtension('translator')->getTranslator()->trans("Page <strong>%page%</strong> doesn't exist.", array("%page%" => twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()))), "messages");
        echo "</p>
          </div>
          <div class=\"ptv-Error404Content\">
            <p>
              ";
        // line 15
        echo $this->env->getExtension('translator')->getTranslator()->trans("Looking for something in particular ? Try the <a href=\"%href%\" title=\"%title%\"><strong>search form</strong>.</a>", array("%title%" => $this->env->getExtension('translator')->trans("Search"), "%href%" => $this->env->getExtension('routing')->getPath("recherche")), "messages");
        // line 18
        echo "            </p>
            ";
        // line 19
        if ($this->env->getExtension('playtv_feature')->hasFeature("faq")) {
            // line 20
            echo "            <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("OR", array(), "messages");
            echo "</p>
            <p>
              ";
            // line 22
            echo $this->env->getExtension('translator')->getTranslator()->trans("Refer to the <a href=\"%href%\" title=\"%title%\">FAQs</a>.", array("%title%" => $this->env->getExtension('translator')->trans("Frequently asked questions"), "%href%" => "/faq/"), "messages");
            // line 25
            echo "            </p>
            ";
        }
        // line 27
        echo "          </div>
        </div>

      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/errors/gone.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 27,  68 => 25,  66 => 22,  60 => 20,  58 => 19,  55 => 18,  53 => 15,  46 => 11,  42 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/*       <div class="row">*/
/*         <div class="span16 ptv-Error404">*/
/*           <div class="page-title ptv-Error404Header">*/
/*             <h1 class="ptv-Error404Header-heading">{% trans with {'%status_code%':410} %}%status_code% ERROR{% endtrans %}</h1>*/
/*             <p class="ptv-Error404Header-subheading">{% trans %}The page you are looking for doesn't exist.{% endtrans %}</p>*/
/*             <p>{% trans with {'%page%': request.uri|escape} %}Page <strong>%page%</strong> doesn't exist.{% endtrans %}</p>*/
/*           </div>*/
/*           <div class="ptv-Error404Content">*/
/*             <p>*/
/*               {% trans with {'%title%': 'Search'|trans, '%href%': path('recherche')} %}*/
/*               Looking for something in particular ? Try the <a href="%href%" title="%title%"><strong>search form</strong>.</a>*/
/*               {% endtrans %}*/
/*             </p>*/
/*             {% if has_feature('faq') %}*/
/*             <p>{% trans %}OR{% endtrans %}</p>*/
/*             <p>*/
/*               {% trans with {'%title%': 'Frequently asked questions'|trans, '%href%': '/faq/'} %}*/
/*               Refer to the <a href="%href%" title="%title%">FAQs</a>.*/
/*               {% endtrans %}*/
/*             </p>*/
/*             {% endif %}*/
/*           </div>*/
/*         </div>*/
/* */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endblock %}*/
/* */
