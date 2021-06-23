<?php

/* controllers/replay-tv/videos.twig */
class __TwigTemplate_d1434120971940406e338a92bef228dded3a9ce7164864a548c902952d57c496 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/replay-tv/videos.twig", 1);
        $this->blocks = array(
            'fluidheader' => array($this, 'block_fluidheader'),
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
    public function block_fluidheader($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<div id=\"content\" class=\"pmd-ReplayContent\">

  ";
        // line 11
        $this->loadTemplate("partials/subnav-replay-tv.twig", "controllers/replay-tv/videos.twig", 11)->display(array_merge($context, array("subnav_active" => "index", "days" => (isset($context["days"]) ? $context["days"] : $this->getContext($context, "days")), "date" => (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "title" => null)));
        // line 12
        echo "
  <div class=\"container\">
    <div class=\"pmd-js-ReplayBroadcastList\">

      ";
        // line 16
        $this->loadTemplate("controllers/replay-tv/_replays-videos.twig", "controllers/replay-tv/videos.twig", 16)->display($context);
        // line 17
        echo "
    </div>
  </div>

</div>

";
        // line 23
        $this->loadTemplate("controllers/replay-tv/_javascript.twig", "controllers/replay-tv/videos.twig", 23)->display(array_merge($context, array("channel" => (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "gender_alias" => (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")), "date" => (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))));
        // line 24
        echo "<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/videos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  65 => 23,  57 => 17,  55 => 16,  49 => 12,  47 => 11,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block fluidheader %}*/
/*   {{ block_mosaic|raw }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* <div id="content" class="pmd-ReplayContent">*/
/* */
/*   {% include "partials/subnav-replay-tv.twig" with {"subnav_active": "index", "days": days, "date": date, "title": null} %}*/
/* */
/*   <div class="container">*/
/*     <div class="pmd-js-ReplayBroadcastList">*/
/* */
/*       {% include "controllers/replay-tv/_replays-videos.twig" %}*/
/* */
/*     </div>*/
/*   </div>*/
/* */
/* </div>*/
/* */
/* {% include "controllers/replay-tv/_javascript.twig" with {"channel": channel, "gender_alias": gender_alias, "date": date} %}*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
