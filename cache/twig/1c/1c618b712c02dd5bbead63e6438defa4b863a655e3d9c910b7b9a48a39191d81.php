<?php

/* controllers/faq/supprimer-compte-utilisateur.twig */
class __TwigTemplate_7aab3b9b080b83b2695d0612bd0fbd0b19ea2f3fc4e06c53dfa84d5a59b10921 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/supprimer-compte-utilisateur.twig", 1);
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
        echo "  <h2 class=\"margin\">3.6. Je souhaite supprimer mon compte</h2>

  <p>Pour supprimer votre compte, il vous suffit de vous rendre dans la rubrique \"Mon Compte\"; puis cliquez sur \"Mes informations\"; enfin en bas à droite cliquez sur \"Supprimer mon compte\".</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/supprimer-compte-utilisateur.twig";
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
/*   <h2 class="margin">3.6. Je souhaite supprimer mon compte</h2>*/
/* */
/*   <p>Pour supprimer votre compte, il vous suffit de vous rendre dans la rubrique "Mon Compte"; puis cliquez sur "Mes informations"; enfin en bas à droite cliquez sur "Supprimer mon compte".</p>*/
/* {% endblock faq_content %}*/
/* */
