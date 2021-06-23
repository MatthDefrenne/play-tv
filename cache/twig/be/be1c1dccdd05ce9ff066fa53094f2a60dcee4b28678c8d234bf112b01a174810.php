<?php

/* partials/header_mobile.twig */
class __TwigTemplate_874132c3e894f6c3ec20e571d87d79ad25a7057314a0391441f42139c6c68a5c extends Twig_Template
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
        ob_start();
        // line 2
        echo "<nav class=\"pmd-Header-nav pmd-HeaderNav\">

  <button class=\"pmd-js-Header-menuAction pmd-js-Action--touchify pmd-Button pmd-Button--link pmd-HeaderNav-link pmd-HeaderNav-aside pmd-Icons-menu\"></button>

  <a href=\"/\" class=\"pmd-Button pmd-Button--link pmd-HeaderNav-link pmd-HeaderNav-logo\" rel=\"home\">
    <img src=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/logo-mobile.svg\" alt=\"Play TV\" width=\"104\" height=\"60\">
  </a>

  <a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("television_index");
        echo "\" class=\"pmd-Button pmd-Button--link pmd-HeaderNav-icon pmd-HeaderNav-remote pmd-HeaderNav-link\">
    <svg role=\"img\" class=\"pmd-Svg pmd-Svg--tv pmd-Svg--white\">
      <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--tv\"></use>
    </svg>
  </a>

  <a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("recherche");
        echo "\" rel=\"nofollow\" class=\"pmd-Button pmd-Button--link pmd-HeaderNav-icon pmd-HeaderNav-search pmd-HeaderNav-link\">
    <svg role=\"img\" class=\"pmd-Svg pmd-Svg--search pmd-Svg--white\">
      <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--search\"></use>
    </svg>
  </a>

</nav>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/header_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 16,  34 => 10,  28 => 7,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <nav class="pmd-Header-nav pmd-HeaderNav">*/
/* */
/*   <button class="pmd-js-Header-menuAction pmd-js-Action--touchify pmd-Button pmd-Button--link pmd-HeaderNav-link pmd-HeaderNav-aside pmd-Icons-menu"></button>*/
/* */
/*   <a href="/" class="pmd-Button pmd-Button--link pmd-HeaderNav-link pmd-HeaderNav-logo" rel="home">*/
/*     <img src="{{ apps_base_url }}/images/logo-mobile.svg" alt="Play TV" width="104" height="60">*/
/*   </a>*/
/* */
/*   <a href="{{ path('television_index') }}" class="pmd-Button pmd-Button--link pmd-HeaderNav-icon pmd-HeaderNav-remote pmd-HeaderNav-link">*/
/*     <svg role="img" class="pmd-Svg pmd-Svg--tv pmd-Svg--white">*/
/*       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--tv"></use>*/
/*     </svg>*/
/*   </a>*/
/* */
/*   <a href="{{ path('recherche') }}" rel="nofollow" class="pmd-Button pmd-Button--link pmd-HeaderNav-icon pmd-HeaderNav-search pmd-HeaderNav-link">*/
/*     <svg role="img" class="pmd-Svg pmd-Svg--search pmd-Svg--white">*/
/*       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--search"></use>*/
/*     </svg>*/
/*   </a>*/
/* */
/* </nav>*/
/* {% endspaceless %}*/
/* */
