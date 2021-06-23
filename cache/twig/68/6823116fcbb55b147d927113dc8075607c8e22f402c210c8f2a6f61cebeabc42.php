<?php

/* controllers/replay-tv/videos_mobile.twig */
class __TwigTemplate_b8d0d5aad2acf76979624aef8abcca850d4ff27b2577fc20a5e5e39f7751d8f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/replay-tv/videos_mobile.twig", 1);
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
        echo "<div class=\"pmd-ReplayTv\">

  <div class=\"pmd-ReplayTvHeading pmd-Heading\">
    <h2 class=\"pmd-Heading-words\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up TV", array(), "messages");
        echo "</h2>
  </div>

  <div class=\"pmd-ReplayTvContent\">

    <div class=\"pmd-js-ReplayTvCarrousel-parent pmd-ReplayTvContentMosaic\" data-current-channel-alias=\"";
        // line 12
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "alias", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "alias", array()), "")) : ("")), "html", null, true);
        echo "\">
      ";
        // line 13
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "
    </div>

    ";
        // line 16
        $this->loadTemplate("partials/subnav-replay-tv.twig", "controllers/replay-tv/videos_mobile.twig", 16)->display(array_merge($context, array("subnav_active" => "index", "days" =>         // line 19
(isset($context["days"]) ? $context["days"] : $this->getContext($context, "days")), "date" =>         // line 20
(isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "title" => $this->env->getExtension('translator')->trans("The latest videos on demand available"))));
        // line 24
        echo "
    <div class=\"pmd-js-ReplayTvResult pmd-ReplayTvContentResult\" data-veil=\"\">
      ";
        // line 26
        $this->loadTemplate("controllers/replay-tv/_replays-videos.twig", "controllers/replay-tv/videos_mobile.twig", 26)->display($context);
        // line 27
        echo "    </div>

  </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/videos_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 27,  62 => 26,  58 => 24,  56 => 20,  55 => 19,  54 => 16,  48 => 13,  44 => 12,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-ReplayTv">*/
/* */
/*   <div class="pmd-ReplayTvHeading pmd-Heading">*/
/*     <h2 class="pmd-Heading-words">{% trans %}Catch Up TV{% endtrans %}</h2>*/
/*   </div>*/
/* */
/*   <div class="pmd-ReplayTvContent">*/
/* */
/*     <div class="pmd-js-ReplayTvCarrousel-parent pmd-ReplayTvContentMosaic" data-current-channel-alias="{{ channel.alias|default('') }}">*/
/*       {{ block_mosaic|raw }}*/
/*     </div>*/
/* */
/*     {% include "partials/subnav-replay-tv.twig"*/
/*       with {*/
/*         "subnav_active": "index",*/
/*         "days": days,*/
/*         "date": date,*/
/*         "title": "The latest videos on demand available"|trans*/
/*       }*/
/*     %}*/
/* */
/*     <div class="pmd-js-ReplayTvResult pmd-ReplayTvContentResult" data-veil="">*/
/*       {% include "controllers/replay-tv/_replays-videos.twig" %}*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
/* {% endblock %}*/
/* */
/* */
