<?php

/* controllers/pages/questionnaire.twig */
class __TwigTemplate_1c7000af7bc0c84560bda342d3a4ebf0587c18a8178f3ece105a1128e29c0b18 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/questionnaire.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div id=\"content\" class=\"pmd-StaticPage\">
    <div class=\"container pmd-StaticPage-wrapper\">

      <div class=\"row\">
        <article class=\"span13\">
          <div class=\"page-title\">
            <h1>Page. <span class=\"red\">Questionnaire Play TV</span></h1>
            <p class=\"sub-title\">Nous vous proposons aujourd'hui ce questionnaire afin de mieux comprendre vos attentes concernant le service web ";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo "</p>

            <img style=\"float: right; position: relative;margin-top:-50px; margin-right:-120px;\" src=\"https://static.playmedia-cdn.net/img/img_public/FAQ.png\">

            <iframe data-src=\"https://www.surveymonkey.com/s/859FB3Z\" src=\"about:blank\" onload=\"lzld(this)\" width=\"988px\" height=\"3900px\" scrolling=\"no\"></iframe>

          </div>
        </article>
      </div>

    </div>
  </div>

<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/questionnaire.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 11,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-StaticPage">*/
/*     <div class="container pmd-StaticPage-wrapper">*/
/* */
/*       <div class="row">*/
/*         <article class="span13">*/
/*           <div class="page-title">*/
/*             <h1>Page. <span class="red">Questionnaire Play TV</span></h1>*/
/*             <p class="sub-title">Nous vous proposons aujourd'hui ce questionnaire afin de mieux comprendre vos attentes concernant le service web {{ request.host }}</p>*/
/* */
/*             <img style="float: right; position: relative;margin-top:-50px; margin-right:-120px;" src="https://static.playmedia-cdn.net/img/img_public/FAQ.png">*/
/* */
/*             <iframe data-src="https://www.surveymonkey.com/s/859FB3Z" src="about:blank" onload="lzld(this)" width="988px" height="3900px" scrolling="no"></iframe>*/
/* */
/*           </div>*/
/*         </article>*/
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/* */
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
