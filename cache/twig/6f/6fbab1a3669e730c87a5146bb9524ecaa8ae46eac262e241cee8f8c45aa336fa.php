<?php

/* controllers/widgets/thumbnails-broadcast.twig */
class __TwigTemplate_6f02e4d2354e395e4b9a1335c896b9f74dc11b9a13666bafa2a8f5b85636881e extends Twig_Template
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
        $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("poor_preview" => (($this->getAttribute($this->getAttribute($this->getAttribute(        // line 2
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "images", array()), "xlarge", array())) ? ("false") : ("true")), "trailer_button" => (($this->getAttribute($this->getAttribute(        // line 3
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "trailer", array())) ? ("true") : ("false"))));
        // line 6
        echo "
";
        // line 7
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "broadcasts-live")) {
            // line 8
            echo "  ";
            $context["text_title"] = (((("<a href=" . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) . ">") . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "fulltitle", array())) . "</a>");
            // line 9
            echo "  ";
            $context["preview_link"] = $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute(            // line 10
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute(            // line 11
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "alias", array())));
        }
        // line 15
        echo "
";
        // line 16
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "broadcasts-tonight")) {
            // line 17
            echo "  ";
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("type" => ""));
            // line 21
            echo "  ";
            $context["text_title"] = (((((("<span style=\"font-weight: normal; margin-right: 5px;\">" . call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "start", array()), "none", "short"))) . "</span> <a href=") . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) . ">") . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "fulltitle", array())) . "</a>");
            // line 22
            echo "  ";
            $context["preview_link"] = $this->env->getExtension('routing')->getPath("programme", array("program_id" => $this->getAttribute($this->getAttribute(            // line 23
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "id", array()), "program_alias" => $this->getAttribute($this->getAttribute(            // line 24
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "alias", array())));
        }
        // line 28
        echo "
";
        // line 29
        $this->loadTemplate("partials/thumbnail.twig", "controllers/widgets/thumbnails-broadcast.twig", 29)->display(array_merge($context, array("type" => "slider", "data_attributes" =>         // line 31
(isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), "text" => array("firstline" =>         // line 33
(isset($context["text_title"]) ? $context["text_title"] : $this->getContext($context, "text_title")), "secondline" => (((("<a href=" . $this->getAttribute($this->getAttribute(        // line 34
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "program_url", array())) . " rel=\"nofollow\">") . $this->getAttribute($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "subtitle", array())) . "</a>")), "preview" => array("link" =>         // line 38
(isset($context["preview_link"]) ? $context["preview_link"] : $this->getContext($context, "preview_link")), "image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 40
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "images", array()), "xlarge", array()), "title" => $this->getAttribute($this->getAttribute(        // line 41
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "fulltitle", array())), "nofollow" => true), "trailer" => array("classes" => "pmd-js-TrailerButton2", "href" => (("/trailer/" . $this->getAttribute($this->getAttribute(        // line 48
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "program", array()), "id", array())) . "/?autoplay=1&skin=minimal")), "progress" => array("percentage" => (($this->getAttribute(        // line 52
(isset($context["thumbnail"]) ? $context["thumbnail"] : null), "progress", array(), "any", true, true)) ? ($this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "progress", array())) : (0))), "channel" => array("image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(        // line 57
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "images", array()), "medium", array()), "alt" => $this->getAttribute($this->getAttribute(        // line 58
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "channel", array()), "name", array()))))));
    }

    public function getTemplateName()
    {
        return "controllers/widgets/thumbnails-broadcast.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 58,  66 => 57,  65 => 52,  64 => 48,  63 => 41,  62 => 40,  61 => 38,  60 => 34,  59 => 33,  58 => 31,  57 => 29,  54 => 28,  51 => 24,  50 => 23,  48 => 22,  45 => 21,  42 => 17,  40 => 16,  37 => 15,  34 => 11,  33 => 10,  31 => 9,  28 => 8,  26 => 7,  23 => 6,  21 => 3,  20 => 2,  19 => 1,);
    }
}
/* {% set data_attributes = data_attributes|merge({*/
/*     'poor_preview': thumbnail.program.images.xlarge ? 'false' : 'true',*/
/*     'trailer_button': thumbnail.program.trailer ? 'true' : 'false',*/
/*   })*/
/* %}*/
/* */
/* {% if context == 'broadcasts-live' %}*/
/*   {% set text_title = '<a href=' ~ thumbnail.program.program_url ~ '>' ~ thumbnail.program.fulltitle ~ '</a>' %}*/
/*   {% set preview_link = path('television_channel_single', {*/
/*       'channel_id': thumbnail.channel.id,*/
/*       'channel_alias': thumbnail.channel.alias*/
/*     })*/
/*   %}*/
/* {% endif %}*/
/* */
/* {% if context == 'broadcasts-tonight' %}*/
/*   {% set data_attributes = data_attributes|merge({*/
/*       'type': '',*/
/*     })*/
/*   %}*/
/*   {% set text_title = '<span style="font-weight: normal; margin-right: 5px;">' ~ thumbnail.start|localizeddate('none', 'short') ~ '</span> <a href=' ~ thumbnail.program.program_url ~ '>' ~ thumbnail.program.fulltitle ~ '</a>' %}*/
/*   {% set preview_link = path('programme', {*/
/*       'program_id': thumbnail.program.id,*/
/*       'program_alias': thumbnail.program.alias*/
/*     })*/
/*   %}*/
/* {% endif %}*/
/* */
/* {% include 'partials/thumbnail.twig' with {*/
/*     'type': 'slider',*/
/*     'data_attributes': data_attributes,*/
/*     'text': {*/
/*       'firstline': text_title,*/
/*       'secondline': '<a href=' ~ thumbnail.program.program_url ~ ' rel="nofollow">' ~ thumbnail.program.subtitle ~ '</a>'*/
/*     },*/
/* */
/*     'preview': {*/
/*       'link': preview_link,*/
/*       'image': {*/
/*         'src': thumbnail.program.images.xlarge,*/
/*         'title': thumbnail.program.fulltitle*/
/*       },*/
/*       'nofollow': true*/
/*     },*/
/* */
/*     'trailer': {*/
/*       'classes': 'pmd-js-TrailerButton2',*/
/*       'href': '/trailer/' ~ thumbnail.program.id ~ '/?autoplay=1&skin=minimal'*/
/*     },*/
/* */
/*     'progress': {*/
/*       'percentage': thumbnail.progress is defined ? thumbnail.progress : 0*/
/*     },*/
/* */
/*     'channel': {*/
/*       'image': {*/
/*         'src': thumbnail.channel.images.medium,*/
/*         'alt': thumbnail.channel.name*/
/*       }*/
/*     }*/
/*   }*/
/* %}*/
/* */
