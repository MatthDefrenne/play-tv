<?php

/* controllers/faq/resilier-abonnement.twig */
class __TwigTemplate_629da58e54f5dacec0e066854f33c121cffb515ada4822d21bcd3d3e4a8e99f4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/resilier-abonnement.twig", 1);
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
        echo "  <h2 class=\"margin\">3.7. Je souhaite résilier mon abonnement</h2>

  <p>Si vous avez souscrit à un abonnement payant sur le site Play TV, vous avez la possibilité de le résilier en cliquant sur l'icone en haut à droite pour accéder à votre compte.</p>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/resilier-abonnement.twig";
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
/*   <h2 class="margin">3.7. Je souhaite résilier mon abonnement</h2>*/
/* */
/*   <p>Si vous avez souscrit à un abonnement payant sur le site Play TV, vous avez la possibilité de le résilier en cliquant sur l'icone en haut à droite pour accéder à votre compte.</p>*/
/* {% endblock faq_content %}*/
/* */
/* */
