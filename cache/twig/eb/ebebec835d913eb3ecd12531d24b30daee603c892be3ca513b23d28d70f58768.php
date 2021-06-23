<?php

/* controllers/toplive/_toplive.twig */
class __TwigTemplate_b59bb378fb7517b6e342dde8fe2bcf0582a5f5e52d24a1881ef041c2d30c4bd1 extends Twig_Template
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
        echo "
";
        // line 9
        echo "
";
        // line 10
        $context["macro"] = $this;
        // line 11
        echo "
<div class=\"toplive\">
  ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["toplive"]) ? $context["toplive"] : $this->getContext($context, "toplive")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["audience"]) {
            // line 14
            echo "  <div class=\"channel clearfix\">

    <a href=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "alias", array()))), "html", null, true);
            echo "\" title=\"À propos de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
            echo "\" class=\"channel-button channel-button-mini\">
      <span>Regarder ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
            echo " en direct</span>
      <img src=\"";
            // line 18
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "images", array()), "mini", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
            echo "\" width=\"36\" height=\"36\">
      <div class=\"cache\"></div>
    </a>

    <div class=\"infos clearfix\">

      <p";
            // line 24
            if (((isset($context["by_trend"]) ? $context["by_trend"] : $this->getContext($context, "by_trend")) == false)) {
                echo " class=\"left\"";
            }
            echo ">
        <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "alias", array()))), "html", null, true);
            echo "\" title=\"À propos de ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
            echo "\">
          <strong>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
            echo "</strong> »
        </a>
        <span class=\"clear-grey\">";
            // line 28
            if (((isset($context["by_trend"]) ? $context["by_trend"] : $this->getContext($context, "by_trend")) == false)) {
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["audience"], "share", array()), 1, ","), "html", null, true);
                echo "%";
            }
            echo "</span>
      </p>
      ";
            // line 30
            if (((isset($context["by_trend"]) ? $context["by_trend"] : $this->getContext($context, "by_trend")) == false)) {
                // line 31
                echo "      <div class=\"right\">";
                echo $context["macro"]->getprogress($context["audience"]);
                echo "</div>
      ";
            }
            // line 33
            echo "
    </div>

    <div class=\"audience clearfix\">

      <div class=\"left\">
      ";
            // line 39
            if (((isset($context["by_trend"]) ? $context["by_trend"] : $this->getContext($context, "by_trend")) == false)) {
                // line 40
                echo "        ";
                if (( !(null === $this->getAttribute($context["audience"], "broadcast", array())) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["audience"], "broadcast", array()), "program", array()), "fulltitle", array())))) {
                    // line 41
                    echo "        <span class=\"clear-grey\">";
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "broadcast", array()), "start", array()), "H:i"), "html", null, true);
                    echo "</span>
        <strong title=\"";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["audience"], "broadcast", array()), "program", array()), "fulltitle", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["audience"], "broadcast", array()), "program", array()), "fulltitle", array()), "html", null, true);
                    echo "</strong>
        ";
                } else {
                    // line 44
                    echo "        <span class=\"clear-grey\">Programme inconnu</span>
        ";
                }
                // line 46
                echo "      ";
            } else {
                // line 47
                echo "        ";
                echo $context["macro"]->getprogress($context["audience"]);
                echo "
      ";
            }
            // line 49
            echo "      </div>

      <p class=\"right smaller\">
      ";
            // line 52
            if (((isset($context["by_trend"]) ? $context["by_trend"] : $this->getContext($context, "by_trend")) == false)) {
                // line 53
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "alias", array()))), "html", null, true);
                echo "\" title=\"Regarder ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["audience"], "channel", array()), "name", array()), "html", null, true);
                echo " en direct\">Regarder en live »</a>
      ";
            } else {
                // line 55
                echo "        <span ";
                if (($this->getAttribute($context["audience"], "trend", array()) < 0)) {
                    echo "class=\"red\"";
                } else {
                    echo "style=\"color:green\"";
                }
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["audience"], "trend", array()), "html", null, true);
                echo "%</span>
      ";
            }
            // line 57
            echo "      </p>

    </div>

  </div>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 63
            echo "  <div class=\"text xbigger center clear-grey margin\">
    <p>Données d'audience indisponibles.</p>
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['audience'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 67
        echo "</div>
";
    }

    // line 2
    public function getprogress($__audience_row__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "audience_row" => $__audience_row__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 3
            echo "    <div class=\"progress-bar\" title=\"";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "share", array()), 1, ","), "html", null, true);
            echo "% de part d'audience\">
      <div class=\"cache\"></div>
      <div class=\"filled\" style=\"width:";
            // line 5
            if (($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "share", array()) < 0)) {
                echo "0";
            } else {
                echo twig_escape_filter($this->env, twig_round($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "share", array())), "html", null, true);
            }
            echo "%;\"></div>
    </div>
    <div class=\"trend-icon ";
            // line 7
            if ((twig_round($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "trend", array())) > 0)) {
                echo "up";
            } elseif ((twig_round($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "trend", array())) < 0)) {
                echo "down";
            } else {
                echo "steady";
            }
            echo "\" title=\"";
            if ((twig_round($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "trend", array())) > 0)) {
                echo "Audience en progression";
            } elseif ((twig_round($this->getAttribute((isset($context["audience_row"]) ? $context["audience_row"] : $this->getContext($context, "audience_row")), "trend", array())) < 0)) {
                echo "Audience en baisse";
            } else {
                echo "Audience stable";
            }
            echo "\"></div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "controllers/toplive/_toplive.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 7,  201 => 5,  195 => 3,  183 => 2,  178 => 67,  169 => 63,  159 => 57,  147 => 55,  139 => 53,  137 => 52,  132 => 49,  126 => 47,  123 => 46,  119 => 44,  112 => 42,  107 => 41,  104 => 40,  102 => 39,  94 => 33,  88 => 31,  86 => 30,  78 => 28,  73 => 26,  67 => 25,  61 => 24,  50 => 18,  46 => 17,  40 => 16,  36 => 14,  31 => 13,  27 => 11,  25 => 10,  22 => 9,  19 => 1,);
    }
}
/* */
/* {% macro progress(audience_row) %}*/
/*     <div class="progress-bar" title="{{ audience_row.share|number_format(1, ",") }}% de part d'audience">*/
/*       <div class="cache"></div>*/
/*       <div class="filled" style="width:{% if audience_row.share < 0 %}0{% else %}{{ audience_row.share|round }}{% endif %}%;"></div>*/
/*     </div>*/
/*     <div class="trend-icon {% if audience_row.trend|round > 0 %}up{% elseif audience_row.trend|round < 0 %}down{% else %}steady{% endif %}" title="{% if audience_row.trend|round > 0 %}Audience en progression{% elseif audience_row.trend|round < 0 %}Audience en baisse{% else %}Audience stable{% endif %}"></div>*/
/* {% endmacro %}*/
/* */
/* {% import _self as macro %}*/
/* */
/* <div class="toplive">*/
/*   {% for audience in toplive %}*/
/*   <div class="channel clearfix">*/
/* */
/*     <a href="{{ path('chaine_tv', {'channel_id': audience.channel.id, 'channel_alias': audience.channel.alias}) }}" title="À propos de {{ audience.channel.name }}" class="channel-button channel-button-mini">*/
/*       <span>Regarder {{ audience.channel.name }} en direct</span>*/
/*       <img src="{{ audience.channel.images.mini }}" alt="{{ audience.channel.name }}" width="36" height="36">*/
/*       <div class="cache"></div>*/
/*     </a>*/
/* */
/*     <div class="infos clearfix">*/
/* */
/*       <p{% if by_trend == false %} class="left"{% endif %}>*/
/*         <a href="{{ path('chaine_tv', {'channel_id': audience.channel.id, 'channel_alias': audience.channel.alias}) }}" title="À propos de {{ audience.channel.name }}">*/
/*           <strong>{{ audience.channel.name }}</strong> »*/
/*         </a>*/
/*         <span class="clear-grey">{% if by_trend == false %}{{ audience.share|number_format(1, ',') }}%{% endif %}</span>*/
/*       </p>*/
/*       {% if by_trend == false %}*/
/*       <div class="right">{{ macro.progress(audience) }}</div>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/* */
/*     <div class="audience clearfix">*/
/* */
/*       <div class="left">*/
/*       {% if by_trend == false %}*/
/*         {% if audience.broadcast is not null and audience.broadcast.program.fulltitle is not null %}*/
/*         <span class="clear-grey">{{ audience.broadcast.start|date("H:i") }}</span>*/
/*         <strong title="{{ audience.broadcast.program.fulltitle }}">{{ audience.broadcast.program.fulltitle }}</strong>*/
/*         {% else %}*/
/*         <span class="clear-grey">Programme inconnu</span>*/
/*         {% endif %}*/
/*       {% else %}*/
/*         {{ macro.progress(audience) }}*/
/*       {% endif %}*/
/*       </div>*/
/* */
/*       <p class="right smaller">*/
/*       {% if by_trend == false %}*/
/*         <a href="{{ path('television_channel_single', {'channel_id': audience.channel.id, 'channel_alias': audience.channel.alias}) }}" title="Regarder {{ audience.channel.name }} en direct">Regarder en live »</a>*/
/*       {% else %}*/
/*         <span {% if audience.trend < 0 %}class="red"{% else %}style="color:green"{% endif %}">{{ audience.trend }}%</span>*/
/*       {% endif %}*/
/*       </p>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/*   {% else %}*/
/*   <div class="text xbigger center clear-grey margin">*/
/*     <p>Données d'audience indisponibles.</p>*/
/*   </div>*/
/*   {% endfor %}*/
/* </div>*/
/* */
