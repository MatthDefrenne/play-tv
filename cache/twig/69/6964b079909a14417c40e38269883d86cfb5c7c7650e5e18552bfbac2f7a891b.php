<?php

/* controllers/television/channel_mobile.twig */
class __TwigTemplate_03767a7988057f69389c2263aa9afcabc1a41677e883dd04a8f964f6d60f8208 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/television/channel_mobile.twig", 1);
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
  <div class=\"pmd-LiveTvVideo pmd-js-LiveTv-videoContainer\">
    <iframe
      src=\"\"
      data-src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
        echo "/player/embed/";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
        echo "/?webapp=1\"
      data-native=\"";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["native"]) ? $context["native"] : $this->getContext($context, "native")), "html", null, true);
        echo "\"
      class=\"pmd-js-LiveTv-iframe\"
      width=\"100%\"
      height=\"100%\"
      frameborder=\"0\"
      scrolling=\"no\"
      allowfullscreen=\"true\"
      webkitallowfullscreen=\"true\"
      mozallowfullscreen=\"true\"
    ></iframe>
  </div>
  <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "inline-television-channel-mobile.js", array(), "array"), "html", null, true);
        echo "\"></script>
</div>

<div class=\"pmd-LiveTvHeading\">
  <a class=\"pmd-LiveTvHeading-channelLogo\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv_programmes", array("channel_id" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()))), "html", null, true);
        echo "\">
    <img src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "small", array()), "html", null, true);
        echo "\" height=\"28\" width=\"28\">
  </a>
  ";
        // line 27
        if ($this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : null), "program", array(), "any", true, true)) {
            // line 28
            echo "  <a class=\"pmd-LiveTvHeading-programmeTitle pmd-Text--truncate\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live")), "program", array()), "program_url", array()), "html", null, true);
            echo "\">
    ";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live")), "program", array()), "fulltitle", array()), "html", null, true);
            echo "
  </a>
  ";
        } else {
            // line 32
            echo "    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No information", array(), "messages");
            // line 35
            echo "  ";
        }
        // line 36
        echo "</div>

<div class=\"pmd-LiveTvContent\">

  <div class=\"pmd-Heading pmd-Heading--2x pmd-Heading--light\">
    ";
        // line 41
        ob_start();
        // line 42
        echo "    <a href=\"#summary\" class=\"pmd-js-LiveTv-summary pmd-Heading-words pmd-Heading-words--active\">
      <span>Résumé</span>
    </a>
    <a href=\"#twitter-tweets\" class=\"pmd-js-LiveTv-social pmd-Heading-words\">
      <span>Live Tweets</span>
    </a>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 49
        echo "  </div>

  <div class=\"pmd-js-LiveTvContent pmd-LiveTvContent\">
    <div id=\"summary\">
      ";
        // line 53
        echo (isset($context["block_live_program_by_channel"]) ? $context["block_live_program_by_channel"] : $this->getContext($context, "block_live_program_by_channel"));
        echo "
      ";
        // line 54
        echo (isset($context["block_next_programs_by_channel"]) ? $context["block_next_programs_by_channel"] : $this->getContext($context, "block_next_programs_by_channel"));
        echo "
    </div>
    <div id=\"twitter-tweets\">
      ";
        // line 57
        echo (isset($context["block_social_tv_posts"]) ? $context["block_social_tv_posts"] : $this->getContext($context, "block_social_tv_posts"));
        echo "
    </div>
  </div>

  ";
        // line 61
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 62
            echo "  <div id=\"taboola-television-live-mobile\"></div>
  ";
        }
        // line 64
        echo "  ";
        if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 65
            echo "  <div id=\"ead_native\">
    <script type=\"text/javascript\" id=\"ean-native-embed-tag\" src=\"//cdn.elasticad.net/native/serve/js/nativeEmbed.gz.js\" async=\"true\"></script>
  </div>
  ";
        }
        // line 69
        echo "</div>
";
        // line 70
        $this->loadTemplate("controllers/television/_tracking-netstat-fr24.twig", "controllers/television/channel_mobile.twig", 70)->display($context);
        // line 71
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/television/channel_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 71,  151 => 70,  148 => 69,  142 => 65,  139 => 64,  135 => 62,  133 => 61,  126 => 57,  120 => 54,  116 => 53,  110 => 49,  101 => 42,  99 => 41,  92 => 36,  89 => 35,  86 => 32,  80 => 29,  75 => 28,  73 => 27,  68 => 25,  64 => 24,  57 => 20,  43 => 9,  37 => 8,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-LiveTvScreen">*/
/*   <div class="pmd-LiveTvVideo pmd-js-LiveTv-videoContainer">*/
/*     <iframe*/
/*       src=""*/
/*       data-src="{{ hosts.current_full }}/player/embed/{{ channel.alias }}/?webapp=1"*/
/*       data-native="{{ native }}"*/
/*       class="pmd-js-LiveTv-iframe"*/
/*       width="100%"*/
/*       height="100%"*/
/*       frameborder="0"*/
/*       scrolling="no"*/
/*       allowfullscreen="true"*/
/*       webkitallowfullscreen="true"*/
/*       mozallowfullscreen="true"*/
/*     ></iframe>*/
/*   </div>*/
/*   <script src="{{ assets.scripts['inline-television-channel-mobile.js'] }}"></script>*/
/* </div>*/
/* */
/* <div class="pmd-LiveTvHeading">*/
/*   <a class="pmd-LiveTvHeading-channelLogo" href="{{ path('chaine_tv_programmes', {'channel_id': channel.id, 'channel_alias': channel.alias}) }}">*/
/*     <img src="{{ channel.images.small }}" height="28" width="28">*/
/*   </a>*/
/*   {% if channel_broadcast_live.program is defined %}*/
/*   <a class="pmd-LiveTvHeading-programmeTitle pmd-Text--truncate" href="{{ channel_broadcast_live.program.program_url }}">*/
/*     {{ channel_broadcast_live.program.fulltitle }}*/
/*   </a>*/
/*   {% else %}*/
/*     {% trans %}*/
/*     No information*/
/*     {% endtrans %}*/
/*   {% endif %}*/
/* </div>*/
/* */
/* <div class="pmd-LiveTvContent">*/
/* */
/*   <div class="pmd-Heading pmd-Heading--2x pmd-Heading--light">*/
/*     {% spaceless %}*/
/*     <a href="#summary" class="pmd-js-LiveTv-summary pmd-Heading-words pmd-Heading-words--active">*/
/*       <span>Résumé</span>*/
/*     </a>*/
/*     <a href="#twitter-tweets" class="pmd-js-LiveTv-social pmd-Heading-words">*/
/*       <span>Live Tweets</span>*/
/*     </a>*/
/*     {% endspaceless %}*/
/*   </div>*/
/* */
/*   <div class="pmd-js-LiveTvContent pmd-LiveTvContent">*/
/*     <div id="summary">*/
/*       {{ block_live_program_by_channel|raw }}*/
/*       {{ block_next_programs_by_channel|raw }}*/
/*     </div>*/
/*     <div id="twitter-tweets">*/
/*       {{ block_social_tv_posts|raw }}*/
/*     </div>*/
/*   </div>*/
/* */
/*   {% if is_website_fr %}*/
/*   <div id="taboola-television-live-mobile"></div>*/
/*   {% endif %}*/
/*   {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/*   <div id="ead_native">*/
/*     <script type="text/javascript" id="ean-native-embed-tag" src="//cdn.elasticad.net/native/serve/js/nativeEmbed.gz.js" async="true"></script>*/
/*   </div>*/
/*   {% endif %}*/
/* </div>*/
/* {% include "controllers/television/_tracking-netstat-fr24.twig" %}*/
/* */
/* {% endblock %}*/
/* */
