<?php

/* controllers/programmes-tv/a-ne-pas-manquer.twig */
class __TwigTemplate_1c0eb63a4eeaafa3daeb3b798a7523664ba598eede6ce711cfb947fff8b7d097 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/programmes-tv/a-ne-pas-manquer.twig", 1);
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
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/programmes-tv/a-ne-pas-manquer.twig", 4)->display(array_merge($context, array("subnav_active" => "featured")));
        // line 5
        echo "
<div id=\"content\">
  <div class=\"container\">

    <div class=\"row\">

      <div class=\"span-page\">

        <div class=\"section-title\">
          <p class=\"right clear-grey\">Les meilleurs programmes TV à venir</p>
          <h1><a href=\"/programmes-tv/a-ne-pas-manquer/\"><strong>À ne pas manquer</strong> »</a></h1>
        </div>

        <div class=\"featured-programs row fluid\">
          ";
        // line 19
        $this->loadTemplate("controllers/programmes-tv/_featured.twig", "controllers/programmes-tv/a-ne-pas-manquer.twig", 19)->display(array_merge($context, array("broadcasts" => (isset($context["featured_broadcasts"]) ? $context["featured_broadcasts"] : $this->getContext($context, "featured_broadcasts")), "has_column" => true)));
        // line 20
        echo "        </div>

      </div>

      <div class=\"span-sidebar\">

        <div class=\"margin\">
          ";
        // line 27
        $this->loadTemplate("partials/ads-banner.twig", "controllers/programmes-tv/a-ne-pas-manquer.twig", 27)->display(array_merge($context, array("unique" => "af2eb201", "zone_id" => 9)));
        // line 28
        echo "        </div>

        <div class=\"block-title xmargin\">
          <h2><strong>Le meilleur des programmes</strong></h2>
        </div>

        <div class=\"text clear-grey justify margin\">
          <p>Certains <strong>films</strong>, <strong>séries</strong> ou <strong>émissions</strong> méritent encore plus le détour que d'autres. Voici notre sélection ...</p>
        </div>

        <div class=\"featured-programs\">
          ";
        // line 39
        $this->loadTemplate("controllers/programmes-tv/_featured.twig", "controllers/programmes-tv/a-ne-pas-manquer.twig", 39)->display(array_merge($context, array("broadcasts" => (isset($context["super_featured_broadcasts"]) ? $context["super_featured_broadcasts"] : $this->getContext($context, "super_featured_broadcasts")), "has_column" => false)));
        // line 40
        echo "        </div>

      </div>

    </div>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/a-ne-pas-manquer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 40,  75 => 39,  62 => 28,  60 => 27,  51 => 20,  49 => 19,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" with {"subnav_active": "featured"} %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row">*/
/* */
/*       <div class="span-page">*/
/* */
/*         <div class="section-title">*/
/*           <p class="right clear-grey">Les meilleurs programmes TV à venir</p>*/
/*           <h1><a href="/programmes-tv/a-ne-pas-manquer/"><strong>À ne pas manquer</strong> »</a></h1>*/
/*         </div>*/
/* */
/*         <div class="featured-programs row fluid">*/
/*           {% include "controllers/programmes-tv/_featured.twig" with {"broadcasts": featured_broadcasts, "has_column": true} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*       <div class="span-sidebar">*/
/* */
/*         <div class="margin">*/
/*           {% include "partials/ads-banner.twig" with {"unique": "af2eb201", "zone_id": 9} %}*/
/*         </div>*/
/* */
/*         <div class="block-title xmargin">*/
/*           <h2><strong>Le meilleur des programmes</strong></h2>*/
/*         </div>*/
/* */
/*         <div class="text clear-grey justify margin">*/
/*           <p>Certains <strong>films</strong>, <strong>séries</strong> ou <strong>émissions</strong> méritent encore plus le détour que d'autres. Voici notre sélection ...</p>*/
/*         </div>*/
/* */
/*         <div class="featured-programs">*/
/*           {% include "controllers/programmes-tv/_featured.twig" with {"broadcasts": super_featured_broadcasts, "has_column": false} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
