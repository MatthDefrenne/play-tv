<?php

/* controllers/widgets/adblock.twig */
class __TwigTemplate_f29ec4b345110631ab9b0f8edf3bd9eb5eba74f4b00aecd1eeeebc12ae3e6d66 extends Twig_Template
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
        echo "<div class=\"pmd-ContainerForAdblocker\">
  <div class=\"pmd-Adblocker\">
    <p class=\"pmd-Adblocker-sentence\">
      ";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("adblocker.main_sentence", array("%refreshUrl%" => (isset($context["refresh_url"]) ? $context["refresh_url"] : $this->getContext($context, "refresh_url")), "%faqUrl%" => $this->env->getExtension('routing')->getPath("faq_adblock")), "messages");
        // line 5
        echo "    </p>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/adblock.twig";
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
/* <div class="pmd-ContainerForAdblocker">*/
/*   <div class="pmd-Adblocker">*/
/*     <p class="pmd-Adblocker-sentence">*/
/*       {% trans with { "%refreshUrl%": refresh_url, "%faqUrl%": path('faq_adblock') } %}adblocker.main_sentence{% endtrans %}*/
/*     </p>*/
/*   </div>*/
/* </div>*/
/* */
