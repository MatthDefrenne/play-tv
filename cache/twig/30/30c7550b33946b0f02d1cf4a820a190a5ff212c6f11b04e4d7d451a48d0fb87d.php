<?php

/* controllers/errors/gone_mobile.twig */
class __TwigTemplate_536eead593f8e5c27ea020d4d902f18c48adc71f1beaee0b9ae92c2d040f5ab1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/errors/gone_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"pmd-NotFound\">
  <p class=\"pmd-NotFound-description\">
    ";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("The page you are looking for doesn't exist.", array(), "messages");
        // line 7
        echo "  </p>
  <p>
    <a href=\"/\" class=\"pmd-Button\">";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Back to home", array(), "messages");
        echo "</a>
  </p>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/errors/gone_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 9,  37 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-NotFound">*/
/*   <p class="pmd-NotFound-description">*/
/*     {% trans %}The page you are looking for doesn't exist.{% endtrans %}*/
/*   </p>*/
/*   <p>*/
/*     <a href="/" class="pmd-Button">{% trans %}Back to home{% endtrans %}</a>*/
/*   </p>*/
/* </div>*/
/* {% endblock %}*/
/* */
