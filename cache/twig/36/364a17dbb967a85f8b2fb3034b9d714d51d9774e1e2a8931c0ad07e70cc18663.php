<?php

/* controllers/widgets/thumbnails-replay.twig */
class __TwigTemplate_d76b4c914731bfd69e9f316eb9be22760e223ce1dc55888495bf7de397a57c95 extends Twig_Template
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
        $context["thumbnail_image"] = null;
        // line 2
        if ((( !twig_test_empty($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "images", array())) && $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : null), "images", array(), "any", false, true), "xlarge", array(), "any", true, true)) &&  !(null === $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "images", array()), "xlarge", array())))) {
            // line 3
            echo "  ";
            $context["thumbnail_image"] = $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "images", array()), "xlarge", array());
        }
        // line 5
        echo "

";
        // line 7
        $context["preview"] = array("image" => array("src" =>         // line 9
(isset($context["thumbnail_image"]) ? $context["thumbnail_image"] : $this->getContext($context, "thumbnail_image")), "title" => $this->env->getExtension('translator')->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute(        // line 10
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "title", array())))), "duration" => $this->getAttribute(        // line 12
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "duration", array()), "identifier" => $this->getAttribute(        // line 13
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "id", array()), "nofollow" => true);
        // line 17
        echo "
";
        // line 19
        if (twig_in_filter($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "id", array()), twig_get_array_keys_filter((isset($context["france_television"]) ? $context["france_television"] : $this->getContext($context, "france_television"))))) {
            // line 20
            echo "
  ";
            // line 21
            $context["preview"] = twig_array_merge((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), array("link" => (($this->getAttribute(            // line 22
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) : ((($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array()), "url", array())) : (null)))), "classes" => ""));
            // line 26
            echo "  ";
            $context["text_link"] = (($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) : ((($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array()), "url", array())) : (null))));
            // line 27
            echo "
";
        } else {
            // line 29
            echo "
  ";
            // line 30
            $context["preview"] = twig_array_merge((isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), array("link" => $this->env->getExtension('routing')->getPath("replay_replay", array("video_id" => $this->getAttribute(            // line 31
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "id", array()), "title" => $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "alias", array()))), "classes" => (( !$this->getAttribute(            // line 32
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "is_embed", array())) ? ("popup") : (""))));
            // line 35
            echo "  ";
            $context["text_link"] = (($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) : ((($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array())) ? ($this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "group", array()), "url", array())) : ($this->env->getExtension('routing')->getPath("replay_replay", array("video_id" => $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "id", array()), "title" => $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "alias", array())))))));
            // line 36
            echo "
";
        }
        // line 38
        echo "
";
        // line 39
        $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("poor_preview" => (( !(null ===         // line 40
(isset($context["thumbnail_image"]) ? $context["thumbnail_image"] : $this->getContext($context, "thumbnail_image")))) ? ("false") : ("true")), "duration" => (((null === $this->getAttribute(        // line 41
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "duration", array()))) ? ("false") : ("true"))));
        // line 44
        echo "
";
        // line 46
        if ( !(isset($context["text_link"]) ? $context["text_link"] : $this->getContext($context, "text_link"))) {
            // line 47
            echo "  ";
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("type" => "", "preview_animation" => ""));
        }
        // line 53
        echo "
";
        // line 54
        $context["text_subtile"] = ((((twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "broadcast_date", array()), "ptv:full", "none"))) . " à ") . call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "broadcast_date", array()), "none", "short"))) . " sur ") . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "channel", array()));
        // line 55
        echo "
";
        // line 56
        $this->loadTemplate("partials/thumbnail.twig", "controllers/widgets/thumbnails-replay.twig", 56)->display(array_merge($context, array("type" => "slider", "data_attributes" =>         // line 58
(isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), "text" => array("firstline" => ((        // line 60
(isset($context["text_link"]) ? $context["text_link"] : $this->getContext($context, "text_link"))) ? ((((("<a href=" . (isset($context["text_link"]) ? $context["text_link"] : $this->getContext($context, "text_link"))) . ">") . $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "title", array())) . "</a>")) : ($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "title", array()))), "secondline" => ((        // line 61
(isset($context["text_link"]) ? $context["text_link"] : $this->getContext($context, "text_link"))) ? ((((("<a href=" . (isset($context["text_link"]) ? $context["text_link"] : $this->getContext($context, "text_link"))) . " rel=\"nofollow\">") . (isset($context["text_subtile"]) ? $context["text_subtile"] : $this->getContext($context, "text_subtile"))) . "</a>")) : ((isset($context["text_subtile"]) ? $context["text_subtile"] : $this->getContext($context, "text_subtile"))))), "preview" =>         // line 64
(isset($context["preview"]) ? $context["preview"] : $this->getContext($context, "preview")), "channel" => array("image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 68
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "images", array()), "medium", array()), "alt" => $this->getAttribute($this->getAttribute(        // line 69
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "channel", array()))))));
        // line 74
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/thumbnails-replay.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 74,  99 => 69,  98 => 68,  97 => 64,  96 => 61,  95 => 60,  94 => 58,  93 => 56,  90 => 55,  88 => 54,  85 => 53,  81 => 47,  79 => 46,  76 => 44,  74 => 41,  73 => 40,  72 => 39,  69 => 38,  65 => 36,  62 => 35,  60 => 32,  59 => 31,  58 => 30,  55 => 29,  51 => 27,  48 => 26,  46 => 22,  45 => 21,  42 => 20,  40 => 19,  37 => 17,  35 => 13,  34 => 12,  33 => 10,  32 => 9,  31 => 7,  27 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set thumbnail_image = null %}*/
/* {% if thumbnail.images is not empty and thumbnail.images.xlarge is defined and thumbnail.images.xlarge is not null %}*/
/*   {% set thumbnail_image = thumbnail.images.xlarge %}*/
/* {% endif %}*/
/* */
/* */
/* {% set preview = {*/
/*     'image': {*/
/*       'src': thumbnail_image,*/
/*       'title': "Watch %replay% on demand online"|trans({'%replay%': thumbnail.title})*/
/*     },*/
/*     'duration': thumbnail.duration,*/
/*     'identifier': thumbnail.id,*/
/*     'nofollow': true*/
/*   }*/
/* %}*/
/* */
/* {# handle France Television exception case #}*/
/* {% if thumbnail.channel.id in france_television|keys %}*/
/* */
/*   {% set preview = preview|merge({*/
/*     'link': thumbnail.program ? thumbnail.program.program_url : thumbnail.group ? thumbnail.group.url : null,*/
/*     'classes': '',*/
/*     })*/
/*   %}*/
/*   {% set text_link = thumbnail.program ? thumbnail.program.program_url : thumbnail.group ? thumbnail.group.url : null %}*/
/* */
/* {% else %}*/
/* */
/*   {% set preview = preview|merge({*/
/*     'link': path('replay_replay', {'video_id': thumbnail.id, 'title': thumbnail.alias}),*/
/*     'classes': not thumbnail.is_embed ? 'popup' : '',*/
/*     })*/
/*   %}*/
/*   {% set text_link = thumbnail.program ? thumbnail.program.program_url : thumbnail.group ? thumbnail.group.url : path('replay_replay', {'video_id': thumbnail.id, 'title': thumbnail.alias}) %}*/
/* */
/* {% endif %}*/
/* */
/* {% set data_attributes = data_attributes|merge({*/
/*     'poor_preview': thumbnail_image is not null ? 'false' : 'true',*/
/*     'duration': thumbnail.duration is null ? 'false' : 'true'*/
/*   })*/
/* %}*/
/* */
/* {# remove hover effect on preview image #}*/
/* {% if not text_link %}*/
/*   {% set data_attributes = data_attributes|merge({*/
/*       'type': '',*/
/*       'preview_animation': ''*/
/*     })*/
/*   %}*/
/* {% endif %}*/
/* */
/* {% set text_subtile = thumbnail.broadcast_date|localizeddate('ptv:full', 'none')|capitalize  ~ ' à '  ~ thumbnail.broadcast_date|localizeddate('none', 'short') ~ ' sur '  ~ thumbnail.channel.channel %}*/
/* */
/* {% include 'partials/thumbnail.twig' with {*/
/*     'type': 'slider',*/
/*     'data_attributes': data_attributes,*/
/*     'text': {*/
/*       'firstline': text_link ? '<a href=' ~ text_link ~ '>' ~ thumbnail.title ~ '</a>': thumbnail.title,*/
/*       'secondline': text_link ? '<a href=' ~ text_link ~ ' rel="nofollow">' ~ text_subtile ~ '</a>' : text_subtile,*/
/*     },*/
/* */
/*     'preview': preview,*/
/* */
/*     'channel': {*/
/*       'image': {*/
/*         'src': thumbnail.channel.images.medium,*/
/*         'alt': thumbnail.channel.channel*/
/*       }*/
/*     }*/
/*   }*/
/* %}*/
/* */
/* */
