<?php

/* partials/item-mosaic-channel.twig */
class __TwigTemplate_c95f7c19022a83fec24919eea84a27eda194236fc23334811f0501b1eef58182 extends Twig_Template
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
        $context["klasses"] = array(0 => "pmd-MosaicChannels-listItem");
        // line 2
        $context["klasses"] = twig_array_merge((isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), ((array_key_exists("classes", $context)) ? (_twig_default_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array())) : (array())));
        // line 3
        $context["klasses"] = twig_join_filter((isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), " ");
        // line 4
        echo "

";
        // line 6
        if ( !array_key_exists("image_size", $context)) {
            // line 7
            echo "  ";
            $context["image_size"] = "mini";
        }
        // line 9
        echo "
";
        // line 10
        if ( !array_key_exists("link_route_name", $context)) {
            // line 11
            echo "  ";
            $context["link_route_name"] = "television_channel_single";
        }
        // line 13
        echo "
";
        // line 14
        if (((isset($context["image_size"]) ? $context["image_size"] : $this->getContext($context, "image_size")) == "mini")) {
            // line 15
            echo "  ";
            $context["image_width"] = 36;
            // line 16
            echo "  ";
            $context["image_height"] = 36;
        } elseif ((        // line 17
(isset($context["image_size"]) ? $context["image_size"] : $this->getContext($context, "image_size")) == "small")) {
            // line 18
            echo "  ";
            $context["image_width"] = 40;
            // line 19
            echo "  ";
            $context["image_height"] = 40;
        }
        // line 21
        echo "<li class=\"";
        echo twig_escape_filter($this->env, (isset($context["klasses"]) ? $context["klasses"] : $this->getContext($context, "klasses")), "html", null, true);
        echo "\">
  <a
    href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["link_route_name"]) ? $context["link_route_name"] : $this->getContext($context, "link_route_name")), array("channel_id" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()))), "html", null, true);
        echo "\"
    class=\"pmd-MosaicChannels-link ptv-js-MosaicChannels-link
      ";
        // line 25
        if (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "disabled", array(), "any", true, true) && $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "disabled", array()))) {
            echo " pmd-MosaicChannels-link--disabled";
        }
        // line 26
        echo "      ";
        if (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "is_adult", array(), "any", true, true) && $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_adult", array()))) {
            echo " pmd-MosaicChannels-link--highlight--adult";
        }
        // line 27
        echo "      ";
        if (((($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "highlight", array(), "any", true, true) && $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "highlight", array())) && $this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "is_adult", array(), "any", true, true)) && ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_adult", array()) == false))) {
            echo " pmd-MosaicChannels-link--highlight";
        }
        // line 28
        echo "    \"
    title=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        echo " en direct\"
    data-channel=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        echo "\"
    data-id=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "id", array()), "html", null, true);
        echo "\"
    data-alias=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
        echo "\"
    data-programs=\"";
        // line 33
        if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "has_programs", array())) {
            echo "1";
        } else {
            echo "0";
        }
        echo "\"
    data-socialtv=\"";
        // line 34
        if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "has_social_tv", array())) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"
    data-skip-ads=\"";
        // line 35
        if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "skip_ads", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "skip_ads", array()), "html", null, true);
        }
        echo "\"
  >
      ";
        // line 38
        echo "      <img src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), (isset($context["image_size"]) ? $context["image_size"] : $this->getContext($context, "image_size")), array(), "array"), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        echo "\" width=\"";
        echo twig_escape_filter($this->env, (isset($context["image_width"]) ? $context["image_width"] : $this->getContext($context, "image_width")), "html", null, true);
        echo "\" height=\"";
        echo twig_escape_filter($this->env, (isset($context["image_height"]) ? $context["image_height"] : $this->getContext($context, "image_height")), "html", null, true);
        echo "\" class=\"pmd-MosaicChannels-image\">
  </a>
</li>
";
    }

    public function getTemplateName()
    {
        return "partials/item-mosaic-channel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 38,  124 => 35,  116 => 34,  108 => 33,  104 => 32,  100 => 31,  96 => 30,  92 => 29,  89 => 28,  84 => 27,  79 => 26,  75 => 25,  70 => 23,  64 => 21,  60 => 19,  57 => 18,  55 => 17,  52 => 16,  49 => 15,  47 => 14,  44 => 13,  40 => 11,  38 => 10,  35 => 9,  31 => 7,  29 => 6,  25 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set klasses = ['pmd-MosaicChannels-listItem'] %}*/
/* {% set klasses = klasses|merge(classes|default([])) %}*/
/* {% set klasses = klasses|join(' ') %}*/
/* */
/* */
/* {% if image_size is not defined %}*/
/*   {% set image_size = "mini" %}*/
/* {% endif %}*/
/* */
/* {% if link_route_name is not defined %}*/
/*   {% set link_route_name = "television_channel_single" %}*/
/* {% endif %}*/
/* */
/* {% if image_size == 'mini' %}*/
/*   {% set image_width = 36 %}*/
/*   {% set image_height = 36 %}*/
/* {% elseif image_size == 'small' %}*/
/*   {% set image_width = 40 %}*/
/*   {% set image_height = 40 %}*/
/* {% endif %}*/
/* <li class="{{ klasses }}">*/
/*   <a*/
/*     href="{{ path(link_route_name, {'channel_id': channel.id, 'channel_alias': channel.alias}) }}"*/
/*     class="pmd-MosaicChannels-link ptv-js-MosaicChannels-link*/
/*       {% if channel.disabled is defined and channel.disabled %} pmd-MosaicChannels-link--disabled{% endif %}*/
/*       {% if channel.is_adult is defined and channel.is_adult %} pmd-MosaicChannels-link--highlight--adult{% endif %}*/
/*       {% if channel.highlight is defined and channel.highlight and channel.is_adult is defined and channel.is_adult == false %} pmd-MosaicChannels-link--highlight{% endif %}*/
/*     "*/
/*     title="{{ channel.name }} en direct"*/
/*     data-channel="{{ channel.name }}"*/
/*     data-id="{{ channel.id }}"*/
/*     data-alias="{{ channel.alias }}"*/
/*     data-programs="{% if channel.has_programs %}1{% else %}0{% endif %}"*/
/*     data-socialtv="{% if channel.has_social_tv %}true{% else %}false{% endif %}"*/
/*     data-skip-ads="{% if channel.skip_ads is defined %}{{ channel.skip_ads }}{% endif %}"*/
/*   >*/
/*       {#<span class="pmd-MosaicChannels-text">{{ channel.name }}</span>#}*/
/*       <img src="{{ channel.images[image_size] }}" alt="{{ channel.name }}" width="{{ image_width }}" height="{{ image_height }}" class="pmd-MosaicChannels-image">*/
/*   </a>*/
/* </li>*/
/* */
