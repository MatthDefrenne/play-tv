<?php

/* controllers/programme-tv/_title.twig */
class __TwigTemplate_ab933d3c99a24dd3cdb0fb5947acc41a2821180183b5521d22fdb3fc931d1625 extends Twig_Template
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
        echo "<div class=\"page-title ptv-ProgrammeTitle\">
  ";
        // line 2
        if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "programme_tv")) {
            // line 3
            echo "    ";
            if ((( !(null === (isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live"))) && ($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "is_live", array()) == true)) && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "streamable", array()) == true))) {
                // line 4
                echo "    <small class=\"right grey-box ptv-ProgrammeTitle-live\">
      <a href=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "alias", array()))), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('translator')->getTranslator()->trans("%program% live", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
                echo "\" class=\"play-icon\">
        <strong>";
                // line 6
                echo $this->env->getExtension('translator')->getTranslator()->trans("ON AIR", array(), "messages");
                echo "</strong>
      </a>
    </small>
    ";
            } elseif ((            // line 9
(isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")) || (isset($context["group_videos"]) ? $context["group_videos"] : $this->getContext($context, "group_videos")))) {
                // line 10
                echo "      ";
                if ($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv")) {
                    // line 11
                    echo "      <small class=\"right grey-box\">
        <a href=\"#replay\" title=\"";
                    // line 12
                    echo $this->env->getExtension('translator')->getTranslator()->trans("%program% on demand", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
                    echo "\" onclick=\"\$('#tab-replay').trigger('click'); return false;\" class=\"play-icon\">
          <strong>";
                    // line 13
                    echo $this->env->getExtension('translator')->getTranslator()->trans("TV REPLAY", array(), "messages");
                    echo "</strong>
        </a>
      </small>
      ";
                }
                // line 17
                echo "    ";
            }
            // line 18
            echo "  ";
        }
        // line 19
        echo "
  ";
        // line 20
        if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "programme_tv")) {
            // line 21
            echo "    ";
            $context["heading"] = "h1";
            // line 22
            echo "  ";
        } else {
            // line 23
            echo "    ";
            $context["heading"] = "h2";
            // line 24
            echo "  ";
        }
        // line 25
        echo "  <";
        echo twig_escape_filter($this->env, (isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading")), "html", null, true);
        echo " class=\"ptv-ProgrammeTitle-heading\">
    ";
        // line 26
        if ($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : null), "start", array(), "any", true, true)) {
            echo "<span class=\"clear-grey\">";
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "start", array()), "none", "short")), "html", null, true);
            echo "</span> ";
        }
        // line 27
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "program_url", array()), "html", null, true);
        echo "\" title=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "\">
      <span class=\"red\">";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "title", array()), "html", null, true);
        echo "</span>";
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "bcast_abbr", array())) {
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "bcast_abbr", array()), "html", null, true);
        }
        // line 29
        echo "    </a>
  </";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["heading"]) ? $context["heading"] : $this->getContext($context, "heading")), "html", null, true);
        echo ">

  ";
        // line 32
        if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "stars", array()) > 0)) {
            // line 33
            echo "  <div class=\"ptv-ProgrammeTitle-rating\">
    <i class=\"ptv-Rating-";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "stars", array()), "html", null, true);
            echo "\"></i>
  </div>
  ";
        }
        // line 37
        echo "
  ";
        // line 38
        if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array())) {
            // line 39
            echo "  <p class=\"sub-title\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array()), "html", null, true);
            echo "</p>
  ";
        }
        // line 41
        echo "  ";
        if (($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "originaltitle", array()) && ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "originaltitle", array()) != $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "title", array())))) {
            // line 42
            echo "  <p class=\"sub-title\">
    <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "program_url", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "originaltitle", array()), "html", null, true);
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "bcast_abbr", array())) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "bcast_abbr", array()), "html", null, true);
            }
            echo "</a>";
            if (((null === $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender_id", array())) || ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "gender_id", array()) != 28))) {
                echo " (titre original)";
            }
            // line 44
            echo "  </p>
  ";
        }
        // line 46
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programme-tv/_title.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 46,  159 => 44,  145 => 43,  142 => 42,  139 => 41,  133 => 39,  131 => 38,  128 => 37,  122 => 34,  119 => 33,  117 => 32,  112 => 30,  109 => 29,  102 => 28,  95 => 27,  89 => 26,  84 => 25,  81 => 24,  78 => 23,  75 => 22,  72 => 21,  70 => 20,  67 => 19,  64 => 18,  61 => 17,  54 => 13,  50 => 12,  47 => 11,  44 => 10,  42 => 9,  36 => 6,  30 => 5,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div class="page-title ptv-ProgrammeTitle">*/
/*   {% if controller_name == "programme_tv" %}*/
/*     {% if is_live is not null and is_live.broadcast.is_live == true and is_live.broadcast.channel.streamable == true %}*/
/*     <small class="right grey-box ptv-ProgrammeTitle-live">*/
/*       <a href="{{ path('television_channel_single', {'channel_id': is_live.broadcast.channel.id, 'channel_alias': is_live.broadcast.channel.alias}) }}" title="{% trans with {'%program%': program.fulltitle} %}%program% live{% endtrans %}" class="play-icon">*/
/*         <strong>{% trans %}ON AIR{% endtrans %}</strong>*/
/*       </a>*/
/*     </small>*/
/*     {% elseif videos or group_videos %}*/
/*       {% if has_feature('catchup_tv') %}*/
/*       <small class="right grey-box">*/
/*         <a href="#replay" title="{% trans with {'%program%': program.fulltitle} %}%program% on demand{% endtrans %}" onclick="$('#tab-replay').trigger('click'); return false;" class="play-icon">*/
/*           <strong>{% trans %}TV REPLAY{% endtrans %}</strong>*/
/*         </a>*/
/*       </small>*/
/*       {% endif %}*/
/*     {% endif %}*/
/*   {% endif %}*/
/* */
/*   {% if controller_name == "programme_tv" %}*/
/*     {% set heading = "h1" %}*/
/*   {% else %}*/
/*     {% set heading = "h2" %}*/
/*   {% endif %}*/
/*   <{{ heading }} class="ptv-ProgrammeTitle-heading">*/
/*     {% if live_program.start is defined %}<span class="clear-grey">{{ live_program.start|localizeddate('none', 'short') }}</span> {% endif %}*/
/*     <a href="{{ program.program_url }}" title="{{ program.fulltitle }}">*/
/*       <span class="red">{{ program.title }}</span>{% if program.bcast_abbr %} {{ program.bcast_abbr }}{% endif %}*/
/*     </a>*/
/*   </{{ heading }}>*/
/* */
/*   {% if program.stars > 0 %}*/
/*   <div class="ptv-ProgrammeTitle-rating">*/
/*     <i class="ptv-Rating-{{ program.stars }}"></i>*/
/*   </div>*/
/*   {% endif %}*/
/* */
/*   {% if program.subtitle %}*/
/*   <p class="sub-title">{{ program.subtitle }}</p>*/
/*   {% endif %}*/
/*   {% if program.originaltitle and (program.originaltitle != program.title) %}*/
/*   <p class="sub-title">*/
/*     <a href="{{ program.program_url }}" title="{{ program.fulltitle }}">{{ program.originaltitle }}{% if program.bcast_abbr %} {{ program.bcast_abbr }}{% endif %}</a>{% if program.gender_id is null or program.gender_id != 28 %} (titre original){% endif %}*/
/*   </p>*/
/*   {% endif %}*/
/* </div>*/
/* */
