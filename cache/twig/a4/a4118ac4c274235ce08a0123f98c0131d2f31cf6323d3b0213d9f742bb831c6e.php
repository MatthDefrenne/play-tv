<?php

/* partials/header-country.twig */
class __TwigTemplate_b8cbd0be551a91517469456112895b7bc3ae89ee1f96b1f2ee938b49d4e05196 extends Twig_Template
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
        if ((isset($context["is_website_uk"]) ? $context["is_website_uk"] : $this->getContext($context, "is_website_uk"))) {
            // line 2
            echo "<div class=\"pmd-HeaderSide-split\"></div>

<div class=\"pmd-HeaderCountry\">
  <div class=\"pmd-HeaderCountry-flag\">
    <span class=\"flag flag-gb\"></span>
  </div>
  <div class=\"pmd-HeaderCountry-name\">UK</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/header-country.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  21 => 2,  19 => 1,);
    }
}
/* {% if is_website_uk %}*/
/* <div class="pmd-HeaderSide-split"></div>*/
/* */
/* <div class="pmd-HeaderCountry">*/
/*   <div class="pmd-HeaderCountry-flag">*/
/*     <span class="flag flag-gb"></span>*/
/*   </div>*/
/*   <div class="pmd-HeaderCountry-name">UK</div>*/
/* </div>*/
/* {% endif %}*/
/* */
