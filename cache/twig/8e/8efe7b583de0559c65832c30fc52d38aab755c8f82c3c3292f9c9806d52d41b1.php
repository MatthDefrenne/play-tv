<?php

/* partials/patchwork.twig */
class __TwigTemplate_f01bd43584063621b350dab9c8da3600916fd44bf4d617408d4f90085e29fc30 extends Twig_Template
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
        echo "<div class=\"pmd-js-Patchwork pmd-Patchwork\" data-tooltips=\"";
        echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "tooltip", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["data_attributes"]) ? $context["data_attributes"] : null), "tooltip", array()), "")) : ("")), "html", null, true);
        echo "\">

  <button class=\"pmd-js-Patchwork-toggle pmd-Patchwork-toggle pmd-SvgEvent r-ResetButton\">
    <svg role=\"img\" class=\"pmd-Svg pmd-Svg--mosaic\">
      <use xlink:href=\"#pmd-Svg--mosaic\"></use>
    </svg>
    <span class=\"pmd-SvgEvent-handler\"></span>
  </button>

  <div class=\"pmd-js-PatchworkSlider pmd-PatchworkSlider\">

    ";
        // line 12
        ob_start();
        // line 13
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
            // line 14
            echo "    <div class=\"pmd-js-PatchworkSlider-cell pmd-PatchworkSlider-cell\">
      <a class=\"pmd-js-PatchworkSlider-link pmd-PatchworkSlider-link\"
        href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["link_route_name"]) ? $context["link_route_name"] : $this->getContext($context, "link_route_name")), array("channel_alias" => $this->getAttribute($context["channel_item"], "alias", array()), "channel_id" => $this->getAttribute($context["channel_item"], "id", array()))), "html", null, true);
            echo "\"
        title=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
            echo "\"
        ";
            // line 18
            if ($this->getAttribute($context["channel_item"], "nofollow", array(), "any", true, true)) {
                echo "rel=\"nofollow\"";
            }
            // line 19
            echo "        data-channel-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "id", array()), "html", null, true);
            echo "\"
        data-channel-name=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
            echo "\"
        data-channel-alias=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "alias", array()), "html", null, true);
            echo "\"
        data-title=\"";
            // line 22
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "title", array()), array("%channel%" => $this->getAttribute($context["channel_item"], "name", array())), (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "domain", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "domain", array()), "")) : (""))), "html", null, true);
            echo "\"
        data-tooltip-url=\"";
            // line 23
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_tooltip", array("channel_alias" => $this->getAttribute($context["channel_item"], "alias", array()))), "html", null, true);
            echo "\"
      >
        <span class=\"pmd-Text--visually-hidden\">";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "title", array()), array("%channel%" => $this->getAttribute($context["channel_item"], "name", array())), (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "domain", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["channel"]) ? $context["channel"] : null), "domain", array()), "")) : (""))), "html", null, true);
            echo "</span>
        ";
            // line 26
            if (($this->getAttribute($context["loop"], "index", array()) <= 30)) {
                // line 27
                echo "         <img class=\"pmd-PatchworkSlider-image\"
          src=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel_item"], "images", array()), "small", array()), "html", null, true);
                echo "\"
          alt=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                echo "\">
        ";
            } else {
                // line 31
                echo "        <img class=\"pmd-PatchworkSlider-image\"
          src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
          data-flickity-lazyload=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel_item"], "images", array()), "small", array()), "html", null, true);
                echo "\"
          alt=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($context["channel_item"], "name", array()), "html", null, true);
                echo "\">
        ";
            }
            // line 36
            echo "      </a>
    </div>
    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 40
        echo "
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "partials/patchwork.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 40,  139 => 39,  123 => 36,  118 => 34,  114 => 33,  110 => 31,  105 => 29,  101 => 28,  98 => 27,  96 => 26,  92 => 25,  87 => 23,  83 => 22,  79 => 21,  75 => 20,  70 => 19,  66 => 18,  62 => 17,  58 => 16,  54 => 14,  36 => 13,  34 => 12,  19 => 1,);
    }
}
/* <div class="pmd-js-Patchwork pmd-Patchwork" data-tooltips="{{ data_attributes.tooltip|default('') }}">*/
/* */
/*   <button class="pmd-js-Patchwork-toggle pmd-Patchwork-toggle pmd-SvgEvent r-ResetButton">*/
/*     <svg role="img" class="pmd-Svg pmd-Svg--mosaic">*/
/*       <use xlink:href="#pmd-Svg--mosaic"></use>*/
/*     </svg>*/
/*     <span class="pmd-SvgEvent-handler"></span>*/
/*   </button>*/
/* */
/*   <div class="pmd-js-PatchworkSlider pmd-PatchworkSlider">*/
/* */
/*     {% spaceless %}*/
/*     {% for channel_item in channels %}*/
/*     <div class="pmd-js-PatchworkSlider-cell pmd-PatchworkSlider-cell">*/
/*       <a class="pmd-js-PatchworkSlider-link pmd-PatchworkSlider-link"*/
/*         href="{{ path(link_route_name, {'channel_alias': channel_item.alias, 'channel_id': channel_item.id}) }}"*/
/*         title="{{ channel_item.name }}"*/
/*         {% if channel_item.nofollow is defined %}rel="nofollow"{% endif %}*/
/*         data-channel-id="{{ channel_item.id }}"*/
/*         data-channel-name="{{ channel_item.name }}"*/
/*         data-channel-alias="{{ channel_item.alias }}"*/
/*         data-title="{{ channel.title|trans({'%channel%': channel_item.name}, channel.domain|default('')) }}"*/
/*         data-tooltip-url="{{ path('television_tooltip', {'channel_alias': channel_item.alias}) }}"*/
/*       >*/
/*         <span class="pmd-Text--visually-hidden">{{ channel.title|trans({'%channel%': channel_item.name}, channel.domain|default('')) }}</span>*/
/*         {% if loop.index <= 30 %}*/
/*          <img class="pmd-PatchworkSlider-image"*/
/*           src="{{ channel_item.images.small }}"*/
/*           alt="{{ channel_item.name }}">*/
/*         {% else %}*/
/*         <img class="pmd-PatchworkSlider-image"*/
/*           src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*           data-flickity-lazyload="{{ channel_item.images.small }}"*/
/*           alt="{{ channel_item.name }}">*/
/*         {% endif %}*/
/*       </a>*/
/*     </div>*/
/*     {% endfor %}*/
/*     {% endspaceless %}*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
