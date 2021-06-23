<?php

/* partials/thumbnail.twig */
class __TwigTemplate_9116e49414362fdb1fd62aa7bf97c4d135f6a860896ff1db4735513e19239eb0 extends Twig_Template
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
        // line 22
        echo "
";
        // line 23
        $context["klasses"] = array(0 => "pmd-Thumbnail");
        // line 24
        echo "
";
        // line 25
        $context["klasses"] = twig_array_merge((isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), ((array_key_exists("classes", $context)) ? (_twig_default_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array())) : (array())));
        // line 26
        echo "
";
        // line 27
        $context["klasses"] = twig_join_filter((isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), " ");
        // line 28
        echo "
<div
  class=\"";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), "html", null, true);
        echo "\"
  data-size=\"";
        // line 31
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "size", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "size", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-preview-animation=\"";
        // line 32
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "preview_animation", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "preview_animation", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-channel-logo=\"";
        // line 33
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "channel_logo", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "channel_logo", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-progress=\"";
        // line 34
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "progress", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "progress", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-type=\"";
        // line 35
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "type", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "type", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-poor-preview=\"";
        // line 36
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "poor_preview", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "poor_preview", array()), "")) : ("")), "html", null, true);
        echo "\"
  data-disabled=\"";
        // line 37
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "disabled", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "disabled", array()), "")) : ("")), "html", null, true);
        echo "\"
  ";
        // line 38
        if ($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "duration", array(), "any", true, true)) {
            // line 39
            echo "  data-duration=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "duration", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "duration", array()), "")) : ("")), "html", null, true);
            echo "\"
  ";
        }
        // line 41
        echo "  data-trailer-button=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "trailer_button", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "trailer_button", array()), "")) : ("")), "html", null, true);
        echo "\">

  <div class=\"pmd-ThumbnailPreview\">
    ";
        // line 44
        if ($this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "link", array())) {
            // line 45
            echo "    <a
      href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "link", array()), "html", null, true);
            echo "\"
      class=\"";
            // line 47
            if ($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "classes", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "classes", array()), "html", null, true);
            }
            echo "\"
      data-identifier=\"";
            // line 48
            if ($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "identifier", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "identifier", array()), "html", null, true);
            }
            echo "\"
      ";
            // line 49
            if (($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "nofollow", array(), "any", true, true) && $this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "nofollow", array()))) {
                // line 50
                echo "      rel=\"nofollow\"
      ";
            }
            // line 52
            echo "    >
    ";
        }
        // line 54
        echo "      <div class=\"pmd-ThumbnailPreview-imageContainer\" title=\"";
        echo twig_escape_filter($this->env, strip_tags((($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "title", array()), "")) : (""))), "html", null, true);
        echo "\">
        ";
        // line 55
        if (((array_key_exists("type", $context) && ((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "slider")) && ((isset($context["loop_index"]) ? $context["loop_index"] : $this->getContext($context, "loop_index")) > 7))) {
            // line 56
            echo "        <img
          src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
          data-flickity-lazyload=\"";
            // line 58
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "src", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "src", array()), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/logo.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/logo.svg"))), "html", null, true);
            echo "\"
          class=\"pmd-ThumbnailPreview-image\"
          alt=\"";
            // line 60
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "alt", array()), "")) : ("")), "html", null, true);
            echo "\">
        ";
        } else {
            // line 62
            echo "        <img class=\"pmd-ThumbnailPreview-image\" src=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "src", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "src", array()), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/logo.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/logo.svg"))), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "alt", array()), "")) : ("")), "html", null, true);
            echo "\">
        ";
        }
        // line 64
        echo "      </div>
      ";
        // line 66
        echo "      <div class=\"pmd-ThumbnailPreview-action\" title=\"";
        echo twig_escape_filter($this->env, strip_tags((($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "image", array(), "any", false, true), "title", array()), "")) : (""))), "html", null, true);
        echo "\">
        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--replay\">
          <use xlink:href=\"#pmd-Svg--replay\"></use>
        </svg>

        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer-inverse\">
          <use xlink:href=\"#pmd-Svg--trailer-inverse\"></use>
        </svg>

        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--play-standard\">
          <use xlink:href=\"#pmd-Svg--play-standard\"></use>
        </svg>
      </div>
      ";
        // line 79
        if (array_key_exists("channel", $context)) {
            // line 80
            echo "
      ";
            // line 81
            if (((array_key_exists("type", $context) && ((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "slider")) && ((isset($context["loop_index"]) ? $context["loop_index"] : $this->getContext($context, "loop_index")) > 7))) {
                // line 82
                echo "      <img
        class=\"pmd-Thumbnail-channelLogo\"
        src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
        data-flickity-lazyload=\"";
                // line 85
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "image", array()), "src", array()), "html", null, true);
                echo "\"
        alt=\"";
                // line 86
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array()), "")) : ("")), "html", null, true);
                echo "\"
        title=\"";
                // line 87
                echo twig_escape_filter($this->env, strip_tags((($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array()), "")) : (""))), "html", null, true);
                echo "\">
      ";
            } else {
                // line 89
                echo "      <img
        class=\"pmd-Thumbnail-channelLogo\"
        src=\"";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "image", array()), "src", array()), "html", null, true);
                echo "\"
        alt=\"";
                // line 92
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array()), "")) : ("")), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, strip_tags((($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "image", array(), "any", false, true), "alt", array()), "")) : (""))), "html", null, true);
                echo "\">
      ";
            }
            // line 94
            echo "
      ";
        }
        // line 96
        echo "      <div class=\"pmd-Thumbnail-duration\">";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "duration", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["preview"]) ? $context["preview"] : null), "duration", array()), "")) : ("")), "html", null, true);
        echo "</div>
    ";
        // line 97
        if ($this->getAttribute((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "link", array())) {
            echo "</a>";
        }
        // line 98
        echo "
    ";
        // line 99
        if (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "trailer_button", array(), "any", true, true) && ($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), "trailer_button", array()) != "false"))) {
            // line 100
            echo "    <a class=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["trailer"]) ? $context["trailer"] : null), "classes", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["trailer"]) ? $context["trailer"] : null), "classes", array()), "")) : ("")), "html", null, true);
            echo " pmd-ThumbnailTrailerButton\" href=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["trailer"]) ? $context["trailer"] : null), "href", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["trailer"]) ? $context["trailer"] : null), "href", array()), "#")) : ("#")), "html", null, true);
            echo "\" rel=\"nofollow\">
      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer pmd-ThumbnailTrailerButton-svg\">
        <use xlink:href=\"#pmd-Svg--trailer\"></use>
      </svg><span class=\"pmd-ThumbnailTrailerButton-text\">";
            // line 103
            echo $this->env->getExtension('translator')->getTranslator()->trans("Trailer", array(), "messages");
            echo "</span>
    </a>
    ";
        }
        // line 106
        echo "  </div>

  <div class=\"pmd-ThumbnailProgress\" title=\"";
        // line 108
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["progress"]) ? $context["progress"] : null), "percentage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["progress"]) ? $context["progress"] : null), "percentage", array()), "0")) : ("0")), "html", null, true);
        echo "%\">
    <span class=\"pmd-ThumbnailProgress-bar\" style=\"width: ";
        // line 109
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["progress"]) ? $context["progress"] : null), "percentage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["progress"]) ? $context["progress"] : null), "percentage", array()), "0")) : ("0")), "html", null, true);
        echo "%;\"></span>
  </div>

  ";
        // line 112
        if (array_key_exists("text", $context)) {
            // line 113
            echo "  <div class=\"pmd-ThumbnailDetails\">
      ";
            // line 114
            if ($this->getAttribute((isset($context["text"]) ? $context["text"] : null), "firstline", array(), "any", true, true)) {
                // line 115
                echo "      <div class=\"pmd-ThumbnailDetails-title pmd-Text--truncate\" title=\"";
                echo twig_escape_filter($this->env, strip_tags($this->getAttribute((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")), "firstline", array())), "html", null, true);
                echo "\">
        ";
                // line 116
                echo $this->getAttribute((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")), "firstline", array());
                echo "
      </div>
      ";
            }
            // line 119
            echo "      ";
            if ($this->getAttribute((isset($context["text"]) ? $context["text"] : null), "secondline", array(), "any", true, true)) {
                // line 120
                echo "      <div class=\"pmd-ThumbnailDetails-subtitle pmd-Text--truncate\" title=\"";
                echo twig_escape_filter($this->env, strip_tags($this->getAttribute((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")), "secondline", array())), "html", null, true);
                echo "\">
        ";
                // line 121
                echo $this->getAttribute((isset($context["text"]) ? $context["text"] : $this->getContext($context, "text")), "secondline", array());
                echo "
      </div>
      ";
            }
            // line 124
            echo "  </div>
  ";
        }
        // line 126
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "partials/thumbnail.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  288 => 126,  284 => 124,  278 => 121,  273 => 120,  270 => 119,  264 => 116,  259 => 115,  257 => 114,  254 => 113,  252 => 112,  246 => 109,  242 => 108,  238 => 106,  232 => 103,  223 => 100,  221 => 99,  218 => 98,  214 => 97,  209 => 96,  205 => 94,  198 => 92,  194 => 91,  190 => 89,  185 => 87,  181 => 86,  177 => 85,  172 => 82,  170 => 81,  167 => 80,  165 => 79,  148 => 66,  145 => 64,  137 => 62,  132 => 60,  127 => 58,  123 => 56,  121 => 55,  116 => 54,  112 => 52,  108 => 50,  106 => 49,  100 => 48,  94 => 47,  90 => 46,  87 => 45,  85 => 44,  78 => 41,  72 => 39,  70 => 38,  66 => 37,  62 => 36,  58 => 35,  54 => 34,  50 => 33,  46 => 32,  42 => 31,  38 => 30,  34 => 28,  32 => 27,  29 => 26,  27 => 25,  24 => 24,  22 => 23,  19 => 22,);
    }
}
/* {#*/
/* */
/* {% include 'partials/thumbnail.twig' with {*/
/*     'type': '',*/
/*     'data_attributes': {*/
/*       'size': '',*/
/*       'preview_animation': '',*/
/*     },*/
/*     'preview': {*/
/*       'image': {*/
/*         'src': '',*/
/*         'title': ''*/
/*       },*/
/*       'link': '',*/
/*       'classes': '',*/
/*       'identifier':*/
/*     }*/
/*   }*/
/* %}*/
/* */
/* #}*/
/* */
/* {% set klasses = ['pmd-Thumbnail'] %}*/
/* */
/* {% set klasses = klasses|merge(classes|default([])) %}*/
/* */
/* {% set klasses = klasses|join(' ') %}*/
/* */
/* <div*/
/*   class="{{ klasses }}"*/
/*   data-size="{{ data_attributes.size|default('') }}"*/
/*   data-preview-animation="{{ data_attributes.preview_animation|default('') }}"*/
/*   data-channel-logo="{{ data_attributes.channel_logo|default('') }}"*/
/*   data-progress="{{ data_attributes.progress|default('') }}"*/
/*   data-type="{{ data_attributes.type|default('') }}"*/
/*   data-poor-preview="{{ data_attributes.poor_preview|default('') }}"*/
/*   data-disabled="{{ data_attributes.disabled|default('') }}"*/
/*   {% if preview.duration is defined %}*/
/*   data-duration="{{ data_attributes.duration|default('') }}"*/
/*   {% endif %}*/
/*   data-trailer-button="{{ data_attributes.trailer_button|default('') }}">*/
/* */
/*   <div class="pmd-ThumbnailPreview">*/
/*     {% if preview.link %}*/
/*     <a*/
/*       href="{{ preview.link }}"*/
/*       class="{% if preview.classes is defined %}{{ preview.classes }}{% endif %}"*/
/*       data-identifier="{% if preview.identifier is defined %}{{ preview.identifier }}{% endif %}"*/
/*       {% if preview.nofollow is defined and preview.nofollow %}*/
/*       rel="nofollow"*/
/*       {% endif %}*/
/*     >*/
/*     {% endif %}*/
/*       <div class="pmd-ThumbnailPreview-imageContainer" title="{{ preview.image.title|default('')|striptags }}">*/
/*         {% if type is defined and type == "slider" and loop_index > 7 %}*/
/*         <img*/
/*           src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*           data-flickity-lazyload="{{ preview.image.src|default(apps_base_url ~ '/images/logo.svg') }}"*/
/*           class="pmd-ThumbnailPreview-image"*/
/*           alt="{{ preview.image.alt|default('') }}">*/
/*         {% else %}*/
/*         <img class="pmd-ThumbnailPreview-image" src="{{ preview.image.src|default(apps_base_url ~ '/images/logo.svg') }}" alt="{{ preview.image.alt|default('') }}">*/
/*         {% endif %}*/
/*       </div>*/
/*       {# title attribute is needed here as this block is on top of the previous block #}*/
/*       <div class="pmd-ThumbnailPreview-action" title="{{ preview.image.title|default('')|striptags }}">*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--replay">*/
/*           <use xlink:href="#pmd-Svg--replay"></use>*/
/*         </svg>*/
/* */
/*         <svg role="img" class="pmd-Svg pmd-Svg--trailer-inverse">*/
/*           <use xlink:href="#pmd-Svg--trailer-inverse"></use>*/
/*         </svg>*/
/* */
/*         <svg role="img" class="pmd-Svg pmd-Svg--play-standard">*/
/*           <use xlink:href="#pmd-Svg--play-standard"></use>*/
/*         </svg>*/
/*       </div>*/
/*       {% if channel is defined %}*/
/* */
/*       {% if type is defined and type == "slider" and loop_index > 7 %}*/
/*       <img*/
/*         class="pmd-Thumbnail-channelLogo"*/
/*         src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*         data-flickity-lazyload="{{ channel.image.src }}"*/
/*         alt="{{ channel.image.alt|default('') }}"*/
/*         title="{{ channel.image.alt|default('')|striptags }}">*/
/*       {% else %}*/
/*       <img*/
/*         class="pmd-Thumbnail-channelLogo"*/
/*         src="{{ channel.image.src }}"*/
/*         alt="{{ channel.image.alt|default('') }}" title="{{ channel.image.alt|default('')|striptags }}">*/
/*       {% endif %}*/
/* */
/*       {% endif %}*/
/*       <div class="pmd-Thumbnail-duration">{{ preview.duration|default('') }}</div>*/
/*     {% if preview.link %}</a>{% endif %}*/
/* */
/*     {% if data_attributes.trailer_button is defined and data_attributes.trailer_button != "false"  %}*/
/*     <a class="{{ trailer.classes|default('') }} pmd-ThumbnailTrailerButton" href="{{ trailer.href | default('#') }}" rel="nofollow">*/
/*       <svg role="img" class="pmd-Svg pmd-Svg--trailer pmd-ThumbnailTrailerButton-svg">*/
/*         <use xlink:href="#pmd-Svg--trailer"></use>*/
/*       </svg><span class="pmd-ThumbnailTrailerButton-text">{% trans %}Trailer{% endtrans %}</span>*/
/*     </a>*/
/*     {% endif %}*/
/*   </div>*/
/* */
/*   <div class="pmd-ThumbnailProgress" title="{{ progress.percentage | default('0') }}%">*/
/*     <span class="pmd-ThumbnailProgress-bar" style="width: {{ progress.percentage | default('0') }}%;"></span>*/
/*   </div>*/
/* */
/*   {% if text is defined %}*/
/*   <div class="pmd-ThumbnailDetails">*/
/*       {% if text.firstline is defined %}*/
/*       <div class="pmd-ThumbnailDetails-title pmd-Text--truncate" title="{{ text.firstline|striptags }}">*/
/*         {{ text.firstline|raw }}*/
/*       </div>*/
/*       {% endif %}*/
/*       {% if text.secondline is defined %}*/
/*       <div class="pmd-ThumbnailDetails-subtitle pmd-Text--truncate" title="{{ text.secondline|striptags }}">*/
/*         {{ text.secondline|raw }}*/
/*       </div>*/
/*       {% endif %}*/
/*   </div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* */
