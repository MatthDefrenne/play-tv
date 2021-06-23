<?php

/* controllers/faq/tablettes.twig */
class __TwigTemplate_5f3bcffdaff6f5add98994f66a66ef583c4d95777af8caa23f1baaf4a626859f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/tablettes.twig", 1);
        $this->blocks = array(
            'faq_content' => array($this, 'block_faq_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/faq/_header.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_faq_content($context, array $blocks = array())
    {
        // line 4
        echo "  <h2 class=\"margin\">3.3. Je souhaite regarder la télévision sur une tablette tactile</h2>

  <p>Il n'existe pas encore d'application tablette mobile Play TV pour Android ou iPad par exemple.</p>
  <p><strong>Cependant</strong> vous pouvez regarder la télévision en direct sur ";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " à partir de votre navigateur web mobile.</p>

  <p><strong class=\"red\">Attention</strong>, l'interface graphique de la version mobile de ";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " n'est pas encore complètement adaptée à une utilisation sur tablette.</p>

  <h3>Play TV sur ma tablette ça donne ça:</h3>

  <div class=\"image no-margin\">
    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-tablettes.png\" alt=\"Tablettes tactiles\">
  </div>

  <h3>Et sur mon smartphone ?</h3>

  <p>Veuillez consulter la section &laquo; <a href=\"/faq/smartphones/\"><em>3.2. Je souhaite regarder la télévision sur un smartphone</em></a> » de l'aide.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/tablettes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 14,  41 => 9,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">3.3. Je souhaite regarder la télévision sur une tablette tactile</h2>*/
/* */
/*   <p>Il n'existe pas encore d'application tablette mobile Play TV pour Android ou iPad par exemple.</p>*/
/*   <p><strong>Cependant</strong> vous pouvez regarder la télévision en direct sur {{ request.host }} à partir de votre navigateur web mobile.</p>*/
/* */
/*   <p><strong class="red">Attention</strong>, l'interface graphique de la version mobile de {{ request.host }} n'est pas encore complètement adaptée à une utilisation sur tablette.</p>*/
/* */
/*   <h3>Play TV sur ma tablette ça donne ça:</h3>*/
/* */
/*   <div class="image no-margin">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-tablettes.png" alt="Tablettes tactiles">*/
/*   </div>*/
/* */
/*   <h3>Et sur mon smartphone ?</h3>*/
/* */
/*   <p>Veuillez consulter la section &laquo; <a href="/faq/smartphones/"><em>3.2. Je souhaite regarder la télévision sur un smartphone</em></a> » de l'aide.</p>*/
/* {% endblock faq_content %}*/
/* */
