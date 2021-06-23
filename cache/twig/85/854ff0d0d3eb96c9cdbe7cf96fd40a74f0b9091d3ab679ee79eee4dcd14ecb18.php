<?php

/* partials/item-replay-tv-page.twig */
class __TwigTemplate_5bbc6197425829881d998b1910c511bb4e48e0f6304ac35dca9ab7cc6bb8eea5 extends Twig_Template
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
        $context["preview_link"] = (((($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "use_group", array()) == true) &&  !(null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "group", array())))) ? ($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "group", array()), "url", array())) : ($this->env->getExtension('routing')->getPath("replay_replay", array("video_id" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "id", array()), "title" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "alias", array())))));
        // line 2
        $context["preview_image_src"] = (($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "xlarge", array())) ? ($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "xlarge", array())) : (null));
        // line 3
        echo "
";
        // line 4
        $context["text_firstline"] = $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array());
        // line 5
        $context["text_firstline_link"] = (($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : null), "group", array(), "any", false, true), "url", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "group", array()), "url", array())) : ($this->env->getExtension('routing')->getPath("replay_replay", array("video_id" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "id", array()), "title" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "alias", array())))));
        // line 6
        echo "
";
        // line 7
        $context["text_firstline_subtitle"] = ((((twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "ptv:full", "none"))) . " à ") . call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "none", "short"))) . " sur ") . $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "channel", array()));
        // line 8
        $context["text_firstline_subtitle_link"] = $this->env->getExtension('routing')->getPath("replay_channel_videos", array("channel_id" => $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "alias", array())));
        // line 9
        echo "
";
        // line 10
        $context["data_attributes_disabled"] = "false";
        // line 11
        echo "
";
        // line 12
        $context["text_firstline_class"] = ((( !$this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "is_embed", array()) &&  !$this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "group", array()))) ? ("popup") : (""));
        // line 13
        $context["text_firstline_value"] = (((((((("<a href=" . (isset($context["text_firstline_link"]) ? $context["text_firstline_link"] : $this->getContext($context, "text_firstline_link"))) . " class=\"") . (isset($context["text_firstline_class"]) ? $context["text_firstline_class"] : $this->getContext($context, "text_firstline_class"))) . "\" data-identifier=\"") . $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_id", array())) . "\">") . (isset($context["text_firstline"]) ? $context["text_firstline"] : $this->getContext($context, "text_firstline"))) . "</a>");
        // line 14
        $context["text_secondline_value"] = (((("<a href=" . (isset($context["text_firstline_subtitle_link"]) ? $context["text_firstline_subtitle_link"] : $this->getContext($context, "text_firstline_subtitle_link"))) . " rel=\"nofollow\">") . (isset($context["text_firstline_subtitle"]) ? $context["text_firstline_subtitle"] : $this->getContext($context, "text_firstline_subtitle"))) . "</a>");
        // line 15
        $context["data_attributes_type"] = "replay";
        // line 16
        $context["data_attributes_preview_animation"] = "true";
        // line 17
        echo "

";
        // line 19
        if ($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "active", array())) {
        } else {
            // line 21
            echo "  ";
            $context["data_attributes_disabled"] = "true";
            // line 22
            echo "  ";
            $context["preview_link"] = "";
            // line 23
            echo "  ";
            $context["text_firstline_value"] = (("<span>" . (isset($context["text_firstline"]) ? $context["text_firstline"] : $this->getContext($context, "text_firstline"))) . "</span>");
            // line 24
            echo "  ";
            $context["text_secondline_value"] = (("<span>" . (isset($context["text_firstline_subtitle"]) ? $context["text_firstline_subtitle"] : $this->getContext($context, "text_firstline_subtitle"))) . "</span>");
            // line 25
            echo "  ";
            $context["data_attributes_type"] = "";
            // line 26
            echo "  ";
            $context["data_attributes_preview_animation"] = "";
        }
        // line 28
        echo "

";
        // line 30
        $context["params"] = array("data_attributes" => array("poor_preview" => ((        // line 32
(isset($context["preview_image_src"]) ? $context["preview_image_src"] : $this->getContext($context, "preview_image_src"))) ? ("false") : ("true")), "channel_logo" => "true", "progress" => "false", "size" => "small", "type" =>         // line 36
(isset($context["data_attributes_type"]) ? $context["data_attributes_type"] : $this->getContext($context, "data_attributes_type")), "trailer_button" => "false", "duration" => (($this->getAttribute(        // line 38
(isset($context["video"]) ? $context["video"] : null), "duration", array(), "any", true, true)) ? ("true") : ("false")), "preview_animation" =>         // line 39
(isset($context["data_attributes_preview_animation"]) ? $context["data_attributes_preview_animation"] : $this->getContext($context, "data_attributes_preview_animation")), "disabled" =>         // line 40
(isset($context["data_attributes_disabled"]) ? $context["data_attributes_disabled"] : $this->getContext($context, "data_attributes_disabled"))), "preview" => array("link" =>         // line 43
(isset($context["preview_link"]) ? $context["preview_link"] : $this->getContext($context, "preview_link")), "classes" => ((( !$this->getAttribute(        // line 44
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "is_embed", array()) &&  !(($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "use_group", array()) == true) && $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "group", array())))) ? ("popup") : ("")), "identifier" => $this->getAttribute(        // line 45
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_id", array()), "image" => array("src" =>         // line 47
(isset($context["preview_image_src"]) ? $context["preview_image_src"] : $this->getContext($context, "preview_image_src")), "title" => $this->env->getExtension('translator')->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute(        // line 48
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array()))), "alt" => $this->env->getExtension('translator')->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute(        // line 49
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array())))), "nofollow" => false, "duration" => (($this->getAttribute(        // line 52
(isset($context["video"]) ? $context["video"] : null), "duration", array(), "any", true, true)) ? ($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "duration", array())) : (0))), "text" => array("firstline" =>         // line 55
(isset($context["text_firstline_value"]) ? $context["text_firstline_value"] : $this->getContext($context, "text_firstline_value")), "secondline" =>         // line 56
(isset($context["text_secondline_value"]) ? $context["text_secondline_value"] : $this->getContext($context, "text_secondline_value"))), "channel" => array("image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 60
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "images", array()), "medium", array()), "alt" => $this->getAttribute($this->getAttribute(        // line 61
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "name", array()))));
        // line 65
        echo "
<div class=\"pmd-ReplayContent-item\">
";
        // line 67
        $this->loadTemplate("partials/thumbnail.twig", "partials/item-replay-tv-page.twig", 67)->display(array_merge($context, (isset($context["params"]) ? $context["params"] : $this->getContext($context, "params"))));
        // line 68
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "partials/item-replay-tv-page.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 68,  107 => 67,  103 => 65,  101 => 61,  100 => 60,  99 => 56,  98 => 55,  97 => 52,  96 => 49,  95 => 48,  94 => 47,  93 => 45,  92 => 44,  91 => 43,  90 => 40,  89 => 39,  88 => 38,  87 => 36,  86 => 32,  85 => 30,  81 => 28,  77 => 26,  74 => 25,  71 => 24,  68 => 23,  65 => 22,  62 => 21,  59 => 19,  55 => 17,  53 => 16,  51 => 15,  49 => 14,  47 => 13,  45 => 12,  42 => 11,  40 => 10,  37 => 9,  35 => 8,  33 => 7,  30 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set preview_link = video.use_group == true and video.group is not null ? video.group.url : path('replay_replay', {'video_id': video.id, 'title': video.alias}) %}*/
/* {% set preview_image_src = video.images.xlarge ? video.images.xlarge : null %}*/
/* */
/* {% set text_firstline = video.title %}*/
/* {% set text_firstline_link = video.group.url is defined ? video.group.url : path('replay_replay', {'video_id': video.id, 'title': video.alias}) %}*/
/* */
/* {% set text_firstline_subtitle = video.broadcast_date|localizeddate('ptv:full', 'none')|capitalize  ~ ' à '  ~ video.broadcast_date|localizeddate('none', 'short') ~ ' sur '  ~ video.channel.channel %}*/
/* {% set text_firstline_subtitle_link = path('replay_channel_videos', {'channel_id': video.channel.id, 'channel_alias': video.channel.alias}) %}*/
/* */
/* {% set data_attributes_disabled = 'false' %}*/
/* */
/* {% set text_firstline_class = not video.is_embed and not video.group ? 'popup' : '' %}*/
/* {% set text_firstline_value = '<a href=' ~ text_firstline_link ~ ' class="' ~ text_firstline_class ~ '" data-identifier="' ~ video.replay_id ~ '">' ~ text_firstline ~ '</a>' %}*/
/* {% set text_secondline_value = '<a href=' ~ text_firstline_subtitle_link ~ ' rel="nofollow">' ~ text_firstline_subtitle ~ '</a>' %}*/
/* {% set data_attributes_type = 'replay' %}*/
/* {% set data_attributes_preview_animation = 'true' %}*/
/* */
/* */
/* {% if video.active %}*/
/* {% else %}*/
/*   {% set data_attributes_disabled = 'true' %}*/
/*   {% set preview_link = '' %}*/
/*   {% set text_firstline_value = '<span>' ~ text_firstline ~ '</span>' %}*/
/*   {% set text_secondline_value = '<span>' ~ text_firstline_subtitle ~ '</span>' %}*/
/*   {% set data_attributes_type = '' %}*/
/*   {% set data_attributes_preview_animation = '' %}*/
/* {% endif %}*/
/* */
/* */
/* {% set params = {*/
/*   'data_attributes': {*/
/*     'poor_preview': preview_image_src ? 'false' : 'true',*/
/*     'channel_logo': 'true',*/
/*     'progress': 'false',*/
/*     'size': 'small',*/
/*     'type': data_attributes_type,*/
/*     'trailer_button': 'false',*/
/*     'duration': video.duration is defined ? 'true' : 'false',*/
/*     'preview_animation': data_attributes_preview_animation,*/
/*     'disabled': data_attributes_disabled*/
/*   },*/
/*   'preview': {*/
/*     'link': preview_link,*/
/*     'classes': not video.is_embed and not (video.use_group == true and video.group) ? 'popup' : '',*/
/*     'identifier': video.replay_id,*/
/*     'image': {*/
/*       'src': preview_image_src,*/
/*       'title': 'Watch %replay% on demand online'|trans({'%replay%': video.title}),*/
/*       'alt': 'Watch %replay% on demand online'|trans({'%replay%': video.title}),*/
/*     },*/
/*     'nofollow': false,*/
/*     'duration': video.duration is defined ? video.duration : 0*/
/*   },*/
/*   'text': {*/
/*     'firstline': text_firstline_value,*/
/*     'secondline': text_secondline_value*/
/*   },*/
/*   'channel': {*/
/*     'image': {*/
/*       'src': video.channel.images.medium,*/
/*       'alt': video.channel.name*/
/*     }*/
/*   }*/
/* } %}*/
/* */
/* <div class="pmd-ReplayContent-item">*/
/* {% include 'partials/thumbnail.twig' with params %}*/
/* </div>*/
/* */
