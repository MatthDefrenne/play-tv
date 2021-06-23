<?php

/* controllers/pages/publicite.twig */
class __TwigTemplate_bd5d1e8fa345c7a3ce0145b09a0fa8728ccafb6b9c2ee55c7d8bafa36473ad12 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/publicite.twig", 1);
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

        <div class=\"span3 sep\">
          ";
        // line 10
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/publicite.twig", 10)->display($context);
        // line 11
        echo "        </div>
        <article class=\"span13\">
          <div class=\"page-title\">
            <h1>Page. <span class=\"red\">Publicité</span></h1>
            <p class=\"sub-title\">Vos campagnes publicitaires sur Play TV</p>
          </div>

          <div class=\"text bigger\">
            <h2>Annoncer sur Play TV</h2>
            <p class=\"margin\">
              Vous êtes responsable de la communication d'une marque et vous souhaitez vous renseigner pour connaître les conditions générales et les tarifs des <strong>espaces publicitaires</strong> du site <strong>Play TV</strong> ? Contactez-nous !
            </p>
            <p class=\"margin grey-box\">
              <strong><a href=\"mailto:pub@playmedia.fr\">pub@playmedia.fr</a></strong>
            </p>

            <h3 class=\"margin\"><strong>Découvrez notre offre</strong></h3>

            <div style=\"width:100%;height:620px;background:#efefef;\">
              <iframe data-src=\"https://docs.google.com/viewer?url=";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/plaquette-publicite-playtv.pdf&amp;embedded=true\" src=\"about:blank\" onload=\"lzld(this)\" width=\"100%\" height=\"620\" style=\"border:none;\" scrolling=\"no\" marginheight=\"40\">
              </iframe>
            </div>
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
        return "controllers/pages/publicite.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 30,  41 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-StaticPage">*/
/*     <div class="container pmd-StaticPage-wrapper">*/
/* */
/*       <div class="row">*/
/* */
/*         <div class="span3 sep">*/
/*           {% include "controllers/pages/_menu.twig" %}*/
/*         </div>*/
/*         <article class="span13">*/
/*           <div class="page-title">*/
/*             <h1>Page. <span class="red">Publicité</span></h1>*/
/*             <p class="sub-title">Vos campagnes publicitaires sur Play TV</p>*/
/*           </div>*/
/* */
/*           <div class="text bigger">*/
/*             <h2>Annoncer sur Play TV</h2>*/
/*             <p class="margin">*/
/*               Vous êtes responsable de la communication d'une marque et vous souhaitez vous renseigner pour connaître les conditions générales et les tarifs des <strong>espaces publicitaires</strong> du site <strong>Play TV</strong> ? Contactez-nous !*/
/*             </p>*/
/*             <p class="margin grey-box">*/
/*               <strong><a href="mailto:pub@playmedia.fr">pub@playmedia.fr</a></strong>*/
/*             </p>*/
/* */
/*             <h3 class="margin"><strong>Découvrez notre offre</strong></h3>*/
/* */
/*             <div style="width:100%;height:620px;background:#efefef;">*/
/*               <iframe data-src="https://docs.google.com/viewer?url={{ static_base_url }}/files/plaquette-publicite-playtv.pdf&amp;embedded=true" src="about:blank" onload="lzld(this)" width="100%" height="620" style="border:none;" scrolling="no" marginheight="40">*/
/*               </iframe>*/
/*             </div>*/
/*           </div>*/
/*         </article>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/* */
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
