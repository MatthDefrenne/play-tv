<?php

/* partials/item-replay-tv.twig */
class __TwigTemplate_a10216024a1f5dbc1f29e7bf639af7c96473c49e2cfb033ebbc527bf363112ae extends Twig_Template
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
        echo "<div class=\"video";
        if (($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "active", array()) == 0)) {
            echo " video-disabled";
        }
        echo "\">

  <div class=\"video-img\"";
        // line 3
        if ((null === $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "medium", array()))) {
            echo " style=\"background-image:url('";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "images", array()), "small", array()), "html", null, true);
            echo "');\"";
        }
        echo ">
    ";
        // line 4
        if ( !(null === $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "medium", array()))) {
            // line 5
            echo "    <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "medium", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array()), "html", null, true);
            echo "\" width=\"100\" height=\"75\">
    ";
        }
        // line 7
        echo "    ";
        if ( !(null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "duration", array()))) {
            // line 8
            echo "    <div class=\"length\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "duration", array()), "html", null, true);
            echo "</div>
    ";
        }
        // line 10
        echo "    <div class=\"cache\"></div>
    ";
        // line 11
        if (((($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "active", array()) == 1) &&  !(null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()))) && !twig_in_filter($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "id", array()), twig_get_array_keys_filter((isset($context["france_television"]) ? $context["france_television"] : $this->getContext($context, "france_television")))))) {
            // line 12
            echo "    <a
      href=\"";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_page_url", array()), "html", null, true);
            echo "\"
      class=\"play";
            // line 14
            if (($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "is_embed", array()) == 0)) {
                echo " popup";
            }
            echo "\"
      title=\"";
            // line 15
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array())), "messages");
            echo "\"
      data-identifier=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_id", array()), "html", null, true);
            echo "\"
    >
      <span class=\"pmd-ReplayIcon\"></span>
    </a>
    ";
        }
        // line 21
        echo "  </div>

  <div class=\"text\">

    <div class=\"title\">
      <p>
        ";
        // line 27
        if ((($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "active", array()) == 1) && ((null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array())) || !twig_in_filter($this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "id", array()), twig_get_array_keys_filter((isset($context["france_television"]) ? $context["france_television"] : $this->getContext($context, "france_television"))))))) {
            // line 28
            echo "        <a
          href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_page_url", array()), "html", null, true);
            echo "\"
          class=\"";
            // line 30
            if (($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "is_embed", array()) == 0)) {
                echo " popup";
            }
            echo "\"
          title=\"";
            // line 31
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array())), "messages");
            echo "\"
          data-identifier=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "replay_id", array()), "html", null, true);
            echo "\"
        >
        ";
        }
        // line 35
        echo "          ";
        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>%title%</strong> in catch up", array("%title%" => $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array())), "messages");
        // line 36
        echo "        ";
        if (($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "active", array()) == 1)) {
            // line 37
            echo "        </a>
        ";
        }
        // line 39
        echo "      </p>
    </div>

    ";
        // line 42
        if (($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv") &&  !(null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array())))) {
            // line 43
            echo "    <div class=\"clearfix infos clear-grey\">
      <p>
        ";
            // line 45
            echo $this->env->getExtension('translator')->getTranslator()->trans("On <a href=\"%href%\" title=\"%title%\">%channel%</a> on demand", array("%href%" => $this->env->getExtension('routing')->getPath("replay_channel_videos", array("channel_id" => $this->getAttribute($this->getAttribute(            // line 46
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "alias", array()))), "%title%" => $this->env->getExtension('translator')->trans("View %channel% videos in catch up", array("%channel%" => $this->getAttribute($this->getAttribute(            // line 47
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "name", array()))), "%channel%" => $this->getAttribute($this->getAttribute(            // line 48
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "channel", array()), "name", array())), "messages");
            // line 52
            echo "      </p>
      ";
            // line 53
            if ( !(null === $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()))) {
                // line 54
                echo "      <p title=\"Vidéos en replay du ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
                echo "\">
        ";
                // line 55
                echo $this->env->getExtension('translator')->getTranslator()->trans("<a href=\"%href%\">%date%</a> at %hour%", array("%href%" => $this->env->getExtension('routing')->getPath("replay_videos", array("date" => twig_date_format_filter($this->env, $this->getAttribute(                // line 56
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "Y-m-d"))), "%date%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute(                // line 57
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute(                // line 58
(isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "broadcast_date", array()), "none", "short", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "messages");
                // line 62
                echo "      </p>
      ";
            }
            // line 64
            echo "    </div>
    ";
        }
        // line 66
        echo "
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "partials/item-replay-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 66,  162 => 64,  158 => 62,  156 => 58,  155 => 57,  154 => 56,  153 => 55,  148 => 54,  146 => 53,  143 => 52,  141 => 48,  140 => 47,  139 => 46,  138 => 45,  134 => 43,  132 => 42,  127 => 39,  123 => 37,  120 => 36,  117 => 35,  111 => 32,  107 => 31,  101 => 30,  97 => 29,  94 => 28,  92 => 27,  84 => 21,  76 => 16,  72 => 15,  66 => 14,  62 => 13,  59 => 12,  57 => 11,  54 => 10,  48 => 8,  45 => 7,  37 => 5,  35 => 4,  27 => 3,  19 => 1,);
    }
}
/* <div class="video{% if video.active == 0 %} video-disabled{% endif %}">*/
/* */
/*   <div class="video-img"{% if video.images.medium is null %} style="background-image:url('{{ video.channel.images.small }}');"{% endif %}>*/
/*     {% if video.images.medium is not null %}*/
/*     <img src="{{ video.images.medium }}" alt="{{ video.title }}" width="100" height="75">*/
/*     {% endif %}*/
/*     {% if video.duration is not null %}*/
/*     <div class="length">{{ video.duration }}</div>*/
/*     {% endif %}*/
/*     <div class="cache"></div>*/
/*     {% if video.active == 1 and video.channel is not null and video.channel.id not in france_television|keys %}*/
/*     <a*/
/*       href="{{ video.replay_page_url }}"*/
/*       class="play{% if video.is_embed == 0 %} popup{% endif %}"*/
/*       title="{% trans with {'%replay%': video.title} %}Watch %replay% on demand online{% endtrans %}"*/
/*       data-identifier="{{ video.replay_id }}"*/
/*     >*/
/*       <span class="pmd-ReplayIcon"></span>*/
/*     </a>*/
/*     {% endif %}*/
/*   </div>*/
/* */
/*   <div class="text">*/
/* */
/*     <div class="title">*/
/*       <p>*/
/*         {% if video.active == 1 and (video.channel is null or video.channel.id not in france_television|keys) %}*/
/*         <a*/
/*           href="{{ video.replay_page_url }}"*/
/*           class="{% if video.is_embed == 0 %} popup{% endif %}"*/
/*           title="{% trans with {'%replay%': video.title} %}Watch %replay% on demand online{% endtrans %}"*/
/*           data-identifier="{{ video.replay_id }}"*/
/*         >*/
/*         {% endif %}*/
/*           {% trans with {'%title%': video.title} %}<strong>%title%</strong> in catch up{% endtrans %}*/
/*         {% if video.active == 1 %}*/
/*         </a>*/
/*         {% endif %}*/
/*       </p>*/
/*     </div>*/
/* */
/*     {% if has_feature('catchup_tv') and video.channel is not null %}*/
/*     <div class="clearfix infos clear-grey">*/
/*       <p>*/
/*         {% trans with {*/
/*           '%href%': path('replay_channel_videos', {'channel_id': video.channel.id, 'channel_alias': video.channel.alias}),*/
/*           '%title%': 'View %channel% videos in catch up'|trans({'%channel%': video.channel.name}),*/
/*           '%channel%': video.channel.name*/
/*         } %}*/
/*         On <a href="%href%" title="%title%">%channel%</a> on demand*/
/*         {% endtrans %}*/
/*       </p>*/
/*       {% if video.broadcast_date is not null %}*/
/*       <p title="Vidéos en replay du {{ video.broadcast_date|localizeddate('full', 'none', locale)|capitalize }}">*/
/*         {% trans with {*/
/*           '%href%': path('replay_videos', {'date': video.broadcast_date|date('Y-m-d')}),*/
/*           '%date%': video.broadcast_date|localizeddate('full', 'none', locale),*/
/*           '%hour%': video.broadcast_date|localizeddate('none', 'short', locale)*/
/*         } %}*/
/*         <a href="%href%">%date%</a> at %hour%*/
/*         {% endtrans %}*/
/*       </p>*/
/*       {% endif %}*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
