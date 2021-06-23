<?php

/* controllers/replay-tv/replay_mobile.twig */
class __TwigTemplate_a9be92b6b25c41902d2649eaeadb2cdbd7324a0a2643b5a55af8cc1f5f8eb486 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/replay-tv/replay_mobile.twig", 1);
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
        echo "<div class=\"pmd-LiveTvScreen\">
  <div class=\"pmd-LiveTvVideo pmd-LiveTvVideo--replay pmd-js-LiveTv-videoContainer\">
  ";
        // line 6
        echo (isset($context["embed_player"]) ? $context["embed_player"] : $this->getContext($context, "embed_player"));
        echo "
  </div>
  <script src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "inline-television-channel-mobile.js", array(), "array"), "html", null, true);
        echo "\"></script>
</div>

<div class=\"pmd-LiveTvHeading\">
  <a class=\"pmd-LiveTvHeading-channelLogo\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "channel", array()), "channel_broadcast_url", array()), "html", null, true);
        echo "\">
    <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "channel", array()), "images", array()), "small", array()), "html", null, true);
        echo "\" height=\"28\" width=\"28\">
  </a>
  <a class=\"pmd-LiveTvHeading-programmeTitle pmd-Text--truncate\">
    ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "title", array()), "html", null, true);
        echo "
  </a>
</div>

<div class=\"pmd-LiveTvContent\">

  <div class=\"pmd-Heading pmd-Heading--2x pmd-Heading--light\">
    ";
        // line 23
        ob_start();
        // line 24
        echo "    <a href=\"#summary\" class=\"pmd-js-LiveTv-summary pmd-Heading-words pmd-Heading-words--active\">
      <span>";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("Summary", array(), "messages");
        echo "</span>
    </a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 28
        echo "  </div>

  <div class=\"pmd-js-LiveTvContent pmd-LiveTvContent\">

    <div id=\"summary\">
      <div class=\"pmd-LiveTvSummary\">
        <h1 class=\"pmd-LiveTvSummary-heading\">";
        // line 34
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "title", array()), "html", null, true);
        echo "</h1>
        ";
        // line 35
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "program", array())) {
            // line 36
            echo "        <p class=\"pmd-LiveTvSummary-sentence\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "program", array()), "summary", array()), "html", null, true);
            echo "</p>
        ";
        }
        // line 38
        echo "        <a class=\"pmd-ReplayEmbedLink\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "video_url", array()), "html", null, true);
        echo "\" target=\"_blank\">
          ";
        // line 39
        echo $this->env->getExtension('translator')->getTranslator()->trans("Direct access to video »", array(), "messages");
        // line 40
        echo "        </a>
      </div>
    </div>

  </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/replay_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 40,  103 => 39,  98 => 38,  92 => 36,  90 => 35,  86 => 34,  78 => 28,  72 => 25,  69 => 24,  67 => 23,  57 => 16,  51 => 13,  47 => 12,  40 => 8,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-LiveTvScreen">*/
/*   <div class="pmd-LiveTvVideo pmd-LiveTvVideo--replay pmd-js-LiveTv-videoContainer">*/
/*   {{ embed_player|raw }}*/
/*   </div>*/
/*   <script src="{{ assets.scripts['inline-television-channel-mobile.js'] }}"></script>*/
/* </div>*/
/* */
/* <div class="pmd-LiveTvHeading">*/
/*   <a class="pmd-LiveTvHeading-channelLogo" href="{{ infos.channel.channel_broadcast_url }}">*/
/*     <img src="{{ infos.channel.images.small }}" height="28" width="28">*/
/*   </a>*/
/*   <a class="pmd-LiveTvHeading-programmeTitle pmd-Text--truncate">*/
/*     {{ infos.title }}*/
/*   </a>*/
/* </div>*/
/* */
/* <div class="pmd-LiveTvContent">*/
/* */
/*   <div class="pmd-Heading pmd-Heading--2x pmd-Heading--light">*/
/*     {% spaceless %}*/
/*     <a href="#summary" class="pmd-js-LiveTv-summary pmd-Heading-words pmd-Heading-words--active">*/
/*       <span>{% trans %}Summary{% endtrans %}</span>*/
/*     </a>*/
/*     {% endspaceless %}*/
/*   </div>*/
/* */
/*   <div class="pmd-js-LiveTvContent pmd-LiveTvContent">*/
/* */
/*     <div id="summary">*/
/*       <div class="pmd-LiveTvSummary">*/
/*         <h1 class="pmd-LiveTvSummary-heading">{{ infos.title }}</h1>*/
/*         {% if infos.program %}*/
/*         <p class="pmd-LiveTvSummary-sentence">{{ infos.program.summary }}</p>*/
/*         {% endif %}*/
/*         <a class="pmd-ReplayEmbedLink" href="{{ infos.video_url }}" target="_blank">*/
/*           {% trans %}Direct access to video »{% endtrans %}*/
/*         </a>*/
/*       </div>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
/* {% endblock %}*/
/* */
