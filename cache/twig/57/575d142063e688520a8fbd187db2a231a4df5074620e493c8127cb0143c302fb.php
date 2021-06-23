<?php

/* controllers/widgets/thumbnails-channel.twig */
class __TwigTemplate_cc368beb9ea025998b23c5d37dec41fa40e083982b1cbccbd165e5b202f358c9 extends Twig_Template
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
        $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("poor_preview" => (($this->getAttribute($this->getAttribute(        // line 2
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "images", array()), "large", array())) ? ("false") : ("true"))));
        // line 5
        echo "
";
        // line 6
        $this->loadTemplate("partials/thumbnail.twig", "controllers/widgets/thumbnails-channel.twig", 6)->display(array_merge($context, array("type" => "slider", "data_attributes" =>         // line 8
(isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), "preview" => array("image" => array("src" => $this->getAttribute($this->getAttribute(        // line 11
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "images", array()), "large", array()), "title" => $this->env->getExtension('translator')->trans("Watch %channel% live", array("%channel%" => $this->getAttribute(        // line 12
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "name", array())))), "link" => $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute(        // line 14
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "alias", array()))), "classes" => "", "identifier" => $this->getAttribute(        // line 16
(isset($context["thumbnail"]) ? $context["thumbnail"] : $this->getContext($context, "thumbnail")), "id", array())))));
    }

    public function getTemplateName()
    {
        return "controllers/widgets/thumbnails-channel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 16,  29 => 14,  28 => 12,  27 => 11,  26 => 8,  25 => 6,  22 => 5,  20 => 2,  19 => 1,);
    }
}
/* {% set data_attributes = data_attributes|merge({*/
/*     'poor_preview': thumbnail.images.large ? 'false' : 'true'*/
/*   })*/
/* %}*/
/* */
/* {% include 'partials/thumbnail.twig' with {*/
/*     'type': 'slider',*/
/*     'data_attributes': data_attributes,*/
/*     'preview': {*/
/*       'image': {*/
/*         'src': thumbnail.images.large,*/
/*         'title': "Watch %channel% live"|trans({'%channel%': thumbnail.name})*/
/*       },*/
/*       'link': path('television_channel_single', {'channel_id': thumbnail.id, 'channel_alias': thumbnail.alias}),*/
/*       'classes': '',*/
/*       'identifier': thumbnail.id*/
/*     }*/
/*   }*/
/* %}*/
/* */
