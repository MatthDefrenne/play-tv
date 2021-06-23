<?php

/* controllers/television/_index.twig */
class __TwigTemplate_75f0d209b35c76ff368ce44f84c25593dcb27c21597230fa339b056989f295a5 extends Twig_Template
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
        echo "<div id=\"tvplayer\">
  <div id=\"big-text\">
    ";
        // line 3
        echo $this->env->getExtension('translator')->getTranslator()->trans("<p><strong>Pick a</strong></p><p><strong>TV channel</strong></p><p><strong>in the mosaic</strong></p><p><strong>on the right ...</strong></p>", array(), "messages");
        // line 6
        echo "  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/_index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 6,  23 => 3,  19 => 1,);
    }
}
/* <div id="tvplayer">*/
/*   <div id="big-text">*/
/*     {% trans %}*/
/*     <p><strong>Pick a</strong></p><p><strong>TV channel</strong></p><p><strong>in the mosaic</strong></p><p><strong>on the right ...</strong></p>*/
/*     {% endtrans %}*/
/*   </div>*/
/* </div>*/
/* */
