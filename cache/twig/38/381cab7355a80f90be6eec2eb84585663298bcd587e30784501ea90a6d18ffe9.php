<?php

/* controllers/faq/erreur-programme.twig */
class __TwigTemplate_03c18afb477d8361a20c90fbf1c81ce4207e39e28743db30a02528047757184b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/erreur-programme.twig", 1);
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
        echo "  <h2 class=\"margin\">4.2. Je veux signaler une erreur sur la fiche d'un programme</h2>
  <p>Les informations concernant la programmation des chaînes de télévision sont fournies par les chaînes elles mêmes.</p>
  <p>Pour toute réclamation merci de vous adresser directement au service téléspectateurs de la chaîne concernée.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/erreur-programme.twig";
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
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">4.2. Je veux signaler une erreur sur la fiche d'un programme</h2>*/
/*   <p>Les informations concernant la programmation des chaînes de télévision sont fournies par les chaînes elles mêmes.</p>*/
/*   <p>Pour toute réclamation merci de vous adresser directement au service téléspectateurs de la chaîne concernée.</p>*/
/* {% endblock faq_content %}*/
/* */
