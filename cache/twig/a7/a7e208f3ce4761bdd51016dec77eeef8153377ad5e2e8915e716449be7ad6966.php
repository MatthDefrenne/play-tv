<?php

/* controllers/url/index.twig */
class __TwigTemplate_37308336e243bda3a8ef1dc8928c84af8a2ad5e88b4f9854d1ea265e57a2b5fe extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/inflow.twig", "controllers/url/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/inflow.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["mode"] = (((isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"))) ? ("adb") : (""));
        // line 5
        if (((isset($context["resource"]) ? $context["resource"] : $this->getContext($context, "resource")) == "channel")) {
            // line 6
            $context["text_text"] = $this->env->getExtension('translator')->trans("Watch <strong>%channel%</strong> live on the channel website", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())));
            // line 7
            $context["link_text"] = $this->env->getExtension('translator')->trans("Direct access to live »");
        }
        // line 10
        if (((isset($context["resource"]) ? $context["resource"] : $this->getContext($context, "resource")) == "replay_tv")) {
            // line 11
            $context["text_text"] = $this->env->getExtension('translator')->trans("Watch <strong>%replay%</strong> on demand", array("%replay%" => $this->getAttribute((isset($context["replay_tv"]) ? $context["replay_tv"] : $this->getContext($context, "replay_tv")), "title", array())));
            // line 12
            $context["link_text"] = $this->env->getExtension('translator')->trans("Direct access to video »");
        }
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_content($context, array $blocks = array())
    {
        // line 16
        echo "<div class=\"pmd-js-InflowBox pmd-InflowBox\" data-mode=\"";
        echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : $this->getContext($context, "mode")), "html", null, true);
        echo "\">

  <div class=\"pmd-InflowBowAdsArea\">

    ";
        // line 20
        if ((isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"))) {
            // line 21
            echo "
    ";
            // line 22
            echo (isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"));
            echo "

    ";
        } else {
            // line 25
            echo "
    ";
            // line 27
            echo "    <div class=\"pmd-js-InflowBox-videoAds pmd-InflowBoxVideoAds\">
      <div id=\"pmd-Uniads\"></div>
    </div>

    ";
            // line 32
            echo "    <div class=\"pmd-js-InflowBox-insAds pmd-InflowBoxInsAds\">
      ";
            // line 33
            $context["zone_id"] = 52;
            // line 34
            echo "      ";
            $context["unique"] = "a6842cf1";
            // line 35
            echo "      <iframe
        src=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/afr.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "\"
        id=\"";
            // line 37
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\"
        width=\"100%\"
        height=\"250px\"
        style=\"margin: 0; border: 0;\"
      >
        <a href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/ck.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "\" target=\"_blank\">
          <img src=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "ad_full_secure", array()), "html", null, true);
            echo "/delivery/avw.php?cb=";
            echo twig_escape_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "html", null, true);
            echo "&amp;n=";
            echo twig_escape_filter($this->env, (isset($context["unique"]) ? $context["unique"] : $this->getContext($context, "unique")), "html", null, true);
            echo "&amp;zoneid=";
            echo twig_escape_filter($this->env, (isset($context["zone_id"]) ? $context["zone_id"] : $this->getContext($context, "zone_id")), "html", null, true);
            echo "\" border=\"0\" alt=\"\">
        </a>
      </iframe>
    </div>

  </div>

  ";
        }
        // line 51
        echo "
  ";
        // line 52
        if ( !(isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"))) {
            // line 53
            echo "  <div class=\"pmd-InflowBoxContent\">

    <div class=\"pmd-InflowBoxContentChannel\">
      ";
            // line 57
            echo "      ";
            if ( !(null === (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
                // line 58
                echo "      <div id=\"content\">
        <div class=\"channel-button\">
          <img src=\"";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "medium", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
                echo "\" width=\"60px\" height=\"60px\">
          <div class=\"cache\"></div>
        </div>
      </div>
      ";
            }
            // line 65
            echo "    </div>

    <div class=\"pmd-InflowBoxContentInfo\">

      <p class=\"pmd-InflowBoxContentInfo-text\">
        <img
          src=\"";
            // line 71
            echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
            echo "/images/animate/icon-loading.gif\"
          alt=\"Chargement...\"
          class=\"pmd-js-InflowBox-loader pmd-InflowBoxContentInfo-textLoader\" />
        ";
            // line 74
            echo (isset($context["text_text"]) ? $context["text_text"] : $this->getContext($context, "text_text"));
            echo "
      </p>

      <p class=\"pmd-InflowBoxContentInfo-link\">
        <a href=\"";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["inflow"]) ? $context["inflow"] : $this->getContext($context, "inflow")), "noRefererUrl", array()), "html", null, true);
            echo "\" rel=\"nofollow\">
          ";
            // line 79
            echo (isset($context["link_text"]) ? $context["link_text"] : $this->getContext($context, "link_text"));
            echo "
        </a>
      </p>

      <p class=\"pmd-InflowBoxContentInfo-url\">";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["inflow"]) ? $context["inflow"] : $this->getContext($context, "inflow")), "rawUrl", array()), "html", null, true);
            echo "</p>

    </div>

    ";
            // line 87
            if ( !$this->getAttribute((isset($context["inflow"]) ? $context["inflow"] : $this->getContext($context, "inflow")), "site", array())) {
                // line 88
                echo "    <div class=\"pmd-InflowBoxContentBrandLogo\">
      <img src=\"";
                // line 89
                echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
                echo "/badge-play-tv.png\" alt=\"Play TV\" class=\"pmd-InflowBoxContentBrandLogo-img\">
    </div>
    ";
            }
            // line 92
            echo "
  </div>
  ";
        }
        // line 95
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/url/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 95,  207 => 92,  201 => 89,  198 => 88,  196 => 87,  189 => 83,  182 => 79,  178 => 78,  171 => 74,  165 => 71,  157 => 65,  147 => 60,  143 => 58,  140 => 57,  135 => 53,  133 => 52,  130 => 51,  113 => 43,  105 => 42,  97 => 37,  87 => 36,  84 => 35,  81 => 34,  79 => 33,  76 => 32,  70 => 27,  67 => 25,  61 => 22,  58 => 21,  56 => 20,  48 => 16,  45 => 15,  41 => 1,  38 => 12,  36 => 11,  34 => 10,  31 => 7,  29 => 6,  27 => 5,  25 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/inflow.twig" %}*/
/* */
/* {% set mode = adb ? 'adb' : '' %}*/
/* */
/* {% if resource == 'channel' %}*/
/* {% set text_text = 'Watch <strong>%channel%</strong> live on the channel website'|trans({'%channel%': channel.name}) %}*/
/* {% set link_text = 'Direct access to live »'|trans %}*/
/* {% endif %}*/
/* */
/* {% if resource == 'replay_tv' %}*/
/* {% set text_text = 'Watch <strong>%replay%</strong> on demand'|trans({'%replay%': replay_tv.title}) %}*/
/* {% set link_text = 'Direct access to video »'|trans %}*/
/* {% endif %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-js-InflowBox pmd-InflowBox" data-mode="{{ mode }}">*/
/* */
/*   <div class="pmd-InflowBowAdsArea">*/
/* */
/*     {% if adb %}*/
/* */
/*     {{ adb|raw }}*/
/* */
/*     {% else %}*/
/* */
/*     {# video ads #}*/
/*     <div class="pmd-js-InflowBox-videoAds pmd-InflowBoxVideoAds">*/
/*       <div id="pmd-Uniads"></div>*/
/*     </div>*/
/* */
/*     {# banner ads #}*/
/*     <div class="pmd-js-InflowBox-insAds pmd-InflowBoxInsAds">*/
/*       {% set zone_id = 52 %}*/
/*       {% set unique = "a6842cf1" %}*/
/*       <iframe*/
/*         src="{{ hosts.ad_full_secure }}/delivery/afr.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}"*/
/*         id="{{ unique }}"*/
/*         width="100%"*/
/*         height="250px"*/
/*         style="margin: 0; border: 0;"*/
/*       >*/
/*         <a href="{{ hosts.ad_full_secure }}/delivery/ck.php?cb={{ now }}&amp;n={{ unique }}" target="_blank">*/
/*           <img src="{{ hosts.ad_full_secure }}/delivery/avw.php?cb={{ now }}&amp;n={{ unique }}&amp;zoneid={{ zone_id }}" border="0" alt="">*/
/*         </a>*/
/*       </iframe>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/*   {% endif %}*/
/* */
/*   {% if not adb %}*/
/*   <div class="pmd-InflowBoxContent">*/
/* */
/*     <div class="pmd-InflowBoxContentChannel">*/
/*       {# @legacy #}*/
/*       {% if channel is not null %}*/
/*       <div id="content">*/
/*         <div class="channel-button">*/
/*           <img src="{{ channel.images.medium }}" alt="{{ channel.name }}" width="60px" height="60px">*/
/*           <div class="cache"></div>*/
/*         </div>*/
/*       </div>*/
/*       {% endif %}*/
/*     </div>*/
/* */
/*     <div class="pmd-InflowBoxContentInfo">*/
/* */
/*       <p class="pmd-InflowBoxContentInfo-text">*/
/*         <img*/
/*           src="{{ apps_base_url }}/images/animate/icon-loading.gif"*/
/*           alt="Chargement..."*/
/*           class="pmd-js-InflowBox-loader pmd-InflowBoxContentInfo-textLoader" />*/
/*         {{ text_text|raw }}*/
/*       </p>*/
/* */
/*       <p class="pmd-InflowBoxContentInfo-link">*/
/*         <a href="{{ inflow.noRefererUrl }}" rel="nofollow">*/
/*           {{ link_text|raw }}*/
/*         </a>*/
/*       </p>*/
/* */
/*       <p class="pmd-InflowBoxContentInfo-url">{{ inflow.rawUrl }}</p>*/
/* */
/*     </div>*/
/* */
/*     {% if not inflow.site %}*/
/*     <div class="pmd-InflowBoxContentBrandLogo">*/
/*       <img src="{{ static_base_url }}/badge-play-tv.png" alt="Play TV" class="pmd-InflowBoxContentBrandLogo-img">*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*   </div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* {% endblock content %}*/
/* */
