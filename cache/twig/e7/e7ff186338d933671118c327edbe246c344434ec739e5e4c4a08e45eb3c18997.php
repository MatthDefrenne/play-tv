<?php

/* controllers/faq/smartphones.twig */
class __TwigTemplate_089393c41633add7a5230dbc5f3ad21bd7e2d579d8980bcb3b30fd6c9e388c4f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/smartphones.twig", 1);
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
        echo "  <h2 class=\"margin\">3.2. Je souhaite regarder la télévision sur un smartphone</h2>

  <p>
    Il n'existe pas encore d'application mobile Play TV iPhone, cependant vous pouvez télécharger <a href=\"https://play.google.com/store/apps/details?id=fr.playmedia.playtv\" target=\"_blank\" rel=\"nofollow\">l'application Android</a>.
  </p>
  <p>
    <strong>Cependant</strong> vous pouvez accéder à une version mobile simplifiée en allant sur ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " à partir de votre navigateur web mobile.
  </p>

  <h3>Play TV sur mon smartphone ça donne ça:</h3>

  <div class=\"image no-margin\">
    <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-smartphones.png\" alt=\"Smartphones\">
  </div>

  <h3>Et sur ma tablette tactile ?</h3>

  <p>Veuillez consulter la section &laquo; <a href=\"/faq/tablettes/\"><em>3.3. Je souhaite regarder la télévision sur une tablette tactile</em></a> » de l'aide.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/smartphones.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 16,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">3.2. Je souhaite regarder la télévision sur un smartphone</h2>*/
/* */
/*   <p>*/
/*     Il n'existe pas encore d'application mobile Play TV iPhone, cependant vous pouvez télécharger <a href="https://play.google.com/store/apps/details?id=fr.playmedia.playtv" target="_blank" rel="nofollow">l'application Android</a>.*/
/*   </p>*/
/*   <p>*/
/*     <strong>Cependant</strong> vous pouvez accéder à une version mobile simplifiée en allant sur {{ request.host }} à partir de votre navigateur web mobile.*/
/*   </p>*/
/* */
/*   <h3>Play TV sur mon smartphone ça donne ça:</h3>*/
/* */
/*   <div class="image no-margin">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-smartphones.png" alt="Smartphones">*/
/*   </div>*/
/* */
/*   <h3>Et sur ma tablette tactile ?</h3>*/
/* */
/*   <p>Veuillez consulter la section &laquo; <a href="/faq/tablettes/"><em>3.3. Je souhaite regarder la télévision sur une tablette tactile</em></a> » de l'aide.</p>*/
/* {% endblock faq_content %}*/
/* */
