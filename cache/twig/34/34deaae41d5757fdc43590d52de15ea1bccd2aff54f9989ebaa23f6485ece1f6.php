<?php

/* controllers/faq/remarques-programmation.twig */
class __TwigTemplate_55ff49547ac85e13e4488f547d731c29892598e30d49e6841be8f21ffdea8520 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/remarques-programmation.twig", 1);
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
        echo "  <h2 class=\"margin\">4.3. J'ai une autre question ou remarque sur un programme ou une chaîne de télévision</h2>

  <p>Les informations concernant la programmation des chaînes de télévision sont fournies par les chaînes elles mêmes.</p>
  <p>Pour toute réclamation merci de vous adresser directement au service téléspectateurs de la chaîne concernée.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/remarques-programmation.twig";
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
/*   <h2 class="margin">4.3. J'ai une autre question ou remarque sur un programme ou une chaîne de télévision</h2>*/
/* */
/*   <p>Les informations concernant la programmation des chaînes de télévision sont fournies par les chaînes elles mêmes.</p>*/
/*   <p>Pour toute réclamation merci de vous adresser directement au service téléspectateurs de la chaîne concernée.</p>*/
/* {% endblock faq_content %}*/
/* */
