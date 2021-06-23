<?php

/* controllers/player/_not-found.twig */
class __TwigTemplate_56fa2ff16e610ad1429a0655fe5440f2fef58afd587acb49c22a8f11f2bbea7c extends Twig_Template
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
        echo "<div class=\"pmd-HandleChannel\">
  <div class=\"pmd-HandleChannel-subtitle\">
    <span>
      ";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("channel_unavailable", array(), "player");
        // line 5
        echo "    </span>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/player/_not-found.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="pmd-HandleChannel">*/
/*   <div class="pmd-HandleChannel-subtitle">*/
/*     <span>*/
/*       {% trans from "player" %}channel_unavailable{% endtrans %}*/
/*     </span>*/
/*   </div>*/
/* </div>*/
/* */
