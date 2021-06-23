<?php

/* controllers/replay-tv/replay.twig */
class __TwigTemplate_d9c480d580d6be2e5a215dbd1b5eba4f0aca4d701ca5403ab35419bd47ebea6e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/replay-tv/replay.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  <div id=\"replay-viewer\">
    <div class=\"container\">
        <div id=\"viewer\">
          ";
        // line 7
        echo (isset($context["embed_player"]) ? $context["embed_player"] : $this->getContext($context, "embed_player"));
        echo "
        </div>
        ";
        // line 9
        $this->loadTemplate("partials/ads-banner.twig", "controllers/replay-tv/replay.twig", 9)->display(array_merge($context, array("unique" => "af2eb201", "zone_id" => 27)));
        // line 10
        echo "    </div>
  </div>

  ";
        // line 13
        $this->loadTemplate("controllers/replay-tv/_embed-submenu.twig", "controllers/replay-tv/replay.twig", 13)->display(array_merge($context, array("channel" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "channel", array()))));
        // line 14
        echo "
  <div id=\"content\">
    <div class=\"container\">
      <div class=\"row\">
        <div class=\"span16\">

          <div class=\"ptv-js-ReplayVideo-information\">
            <div id=\"replay-information\">
              <div class=\"text xmargin\">
                <p class=\"pmd-ReplayEmbedSubtitle\">
                  ";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>On demand video</strong> <span class=\"clear-grey\">from</span> <strong>%channel%</strong>", array("%channel%" => $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "channel", array()), "name", array())), "messages");
        // line 27
        echo "                </p>
              </div>

              <div class=\"pmd-ReplayEmbedTitleContent\">
                <strong class=\"pmd-ReplayEmbedTitle\">";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "title", array()), "html", null, true);
        echo "</strong>
                <a class=\"pmd-ReplayEmbedLink\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "video_url", array()), "html", null, true);
        echo "\" target=\"_blank\">
                  ";
        // line 33
        echo $this->env->getExtension('translator')->getTranslator()->trans("Direct access to video »", array(), "messages");
        // line 34
        echo "                </a>
              </div>
              ";
        // line 36
        if ((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) {
            // line 37
            echo "
                <div class=\"pmd-ReplayEmbedSeparator\"></div>

                <div class=\"pmd-ReplayEmbedVideos\">
                  <p class=\"pmd-ReplayEmbedSubtitle\">
                    ";
            // line 42
            if ( !(null === $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "group", array()))) {
                // line 43
                echo "                      ";
                $context["title"] = $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "group", array()), "title", array());
                // line 44
                echo "                    ";
            } elseif ( !(null === $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "program", array()))) {
                // line 45
                echo "                      ";
                $context["title"] = $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "program", array()), "title", array());
                // line 46
                echo "                    ";
            } else {
                // line 47
                echo "                      ";
                $context["title"] = $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "title", array());
                // line 48
                echo "                    ";
            }
            // line 49
            echo "                    ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("On demand videos of <strong>%program%</strong>", array("%program%" => (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title"))), "messages");
            // line 52
            echo "                  </p>
                </div>

                <div id=\"replay-slider\">
                  <a href=\"#\" id=\"prev\"";
            // line 56
            if (((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) > 0)) {
                echo " class=\"active\"";
            }
            echo " title=\"";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Previous", array(), "messages");
            echo "\">
                    ";
            // line 57
            echo $this->env->getExtension('translator')->getTranslator()->trans("Previous", array(), "messages");
            // line 58
            echo "                  </a>
                  <a href=\"#\" id=\"next\"";
            // line 59
            if (((((isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")) + 1) < twig_length_filter($this->env, (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")))) && (twig_length_filter($this->env, (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) > 4))) {
                echo " class=\"active\"";
            }
            echo " title=\"";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Next", array(), "messages");
            echo "\">
                    ";
            // line 60
            echo $this->env->getExtension('translator')->getTranslator()->trans("Next", array(), "messages");
            // line 61
            echo "                  </a>
                  <ul class=\"slider videos\" data-start=\"";
            // line 62
            echo twig_escape_filter($this->env, (isset($context["current"]) ? $context["current"] : $this->getContext($context, "current")), "html", null, true);
            echo "\">
                    ";
            // line 63
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
            foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                // line 64
                echo "                      <li>
                        <div class=\"video";
                // line 65
                if (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "replay_id", array()) == $this->getAttribute($context["video"], "replay_id", array()))) {
                    echo " current";
                }
                echo "\">
                          <div class=\"video-img\" style=\"background-image:url('";
                // line 66
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["video"], "channel", array()), "images", array()), "small", array()), "html", null, true);
                echo "');\">
                              ";
                // line 67
                if ( !(null === $this->getAttribute($this->getAttribute($context["video"], "images", array()), "medium", array()))) {
                    // line 68
                    echo "                                <img width=\"160\" height=\"120\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "title", array()), "html", null, true);
                    echo "\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["video"], "images", array()), "medium", array()), "html", null, true);
                    echo "\">
                              ";
                }
                // line 70
                echo "                              <div class=\"cache\"></div>
                              ";
                // line 71
                if ($this->getAttribute($context["video"], "duration", array())) {
                    // line 72
                    echo "                                <div class=\"length\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "duration", array()), "html", null, true);
                    echo "</div>
                              ";
                }
                // line 74
                echo "                              ";
                if (($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "replay_id", array()) != $this->getAttribute($context["video"], "replay_id", array()))) {
                    // line 75
                    echo "                                <a class=\"play\" title=\"";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %replay% on demand online", array("%replay%" => $this->getAttribute($context["video"], "title", array())), "messages");
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("replay_replay", array("video_id" => $this->getAttribute($context["video"], "id", array()), "title" => $this->getAttribute($context["video"], "alias", array()))), "html", null, true);
                    echo "\"></a>
                              ";
                }
                // line 77
                echo "                          </div>
                          <div class=\"video-title\">
                            ";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["video"], "title", array()), "html", null, true);
                echo "
                          </div>
                        </div>
                      </li>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "                  </ul>
                </div>

              ";
        }
        // line 88
        echo "            </div>
          </div>

          ";
        // line 91
        if ($this->env->getExtension('playtv_feature')->hasFeature("social_tv")) {
            // line 92
            echo "          <div class=\"ptv-js-LiveTweets\">
            <div id=\"twitter-tweets\" style=\"display: none;\">
              <a href=\"#\" class=\"ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink\"><span class=\"ptv-js-Tweet-numberTweet\">0</span> nouveaux tweets</a>
              <ul id=\"tweets\" data-auto-update=\"true\" data-channel-alias=\"";
            // line 95
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "channel", array()), "alias", array()), "html", null, true);
            echo "\" class=\"ptv-js-Tweet-list\" data-disabled=\"false\">
                ";
            // line 96
            echo (isset($context["block_social_tv_posts"]) ? $context["block_social_tv_posts"] : $this->getContext($context, "block_social_tv_posts"));
            echo "
              </ul>
            </div>
          </div>
          ";
        }
        // line 101
        echo "
          <div class=\"ptv-js-FacebookComments\">
            <div id=\"facebook-comments\" style=\"display: none;\">
              <div class=\"fb-comments\" data-href=\"";
        // line 104
        echo twig_escape_filter($this->env, (isset($context["current_url"]) ? $context["current_url"] : $this->getContext($context, "current_url")), "html", null, true);
        echo "\" data-width=\"100%\" data-numposts=\"10\" data-order-by=\"reverse_time\" data-colorscheme=\"light\"></div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/replay.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  251 => 104,  246 => 101,  238 => 96,  234 => 95,  229 => 92,  227 => 91,  222 => 88,  216 => 84,  205 => 79,  201 => 77,  193 => 75,  190 => 74,  184 => 72,  182 => 71,  179 => 70,  171 => 68,  169 => 67,  165 => 66,  159 => 65,  156 => 64,  152 => 63,  148 => 62,  145 => 61,  143 => 60,  135 => 59,  132 => 58,  130 => 57,  122 => 56,  116 => 52,  113 => 49,  110 => 48,  107 => 47,  104 => 46,  101 => 45,  98 => 44,  95 => 43,  93 => 42,  86 => 37,  84 => 36,  80 => 34,  78 => 33,  74 => 32,  70 => 31,  64 => 27,  62 => 24,  50 => 14,  48 => 13,  43 => 10,  41 => 9,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="replay-viewer">*/
/*     <div class="container">*/
/*         <div id="viewer">*/
/*           {{ embed_player|raw }}*/
/*         </div>*/
/*         {% include "partials/ads-banner.twig" with {'unique': "af2eb201", "zone_id": 27} %}*/
/*     </div>*/
/*   </div>*/
/* */
/*   {% include "controllers/replay-tv/_embed-submenu.twig" with {'channel': infos.channel} %}*/
/* */
/*   <div id="content">*/
/*     <div class="container">*/
/*       <div class="row">*/
/*         <div class="span16">*/
/* */
/*           <div class="ptv-js-ReplayVideo-information">*/
/*             <div id="replay-information">*/
/*               <div class="text xmargin">*/
/*                 <p class="pmd-ReplayEmbedSubtitle">*/
/*                   {% trans with {'%channel%': infos.channel.name} %}*/
/*                   <strong>On demand video</strong> <span class="clear-grey">from</span> <strong>%channel%</strong>*/
/*                   {% endtrans %}*/
/*                 </p>*/
/*               </div>*/
/* */
/*               <div class="pmd-ReplayEmbedTitleContent">*/
/*                 <strong class="pmd-ReplayEmbedTitle">{{ infos.title }}</strong>*/
/*                 <a class="pmd-ReplayEmbedLink" href="{{ infos.video_url }}" target="_blank">*/
/*                   {% trans %}Direct access to video »{% endtrans %}*/
/*                 </a>*/
/*               </div>*/
/*               {% if videos %}*/
/* */
/*                 <div class="pmd-ReplayEmbedSeparator"></div>*/
/* */
/*                 <div class="pmd-ReplayEmbedVideos">*/
/*                   <p class="pmd-ReplayEmbedSubtitle">*/
/*                     {% if infos.group is not null %}*/
/*                       {% set title = infos.group.title %}*/
/*                     {% elseif infos.program is not null %}*/
/*                       {% set title = infos.program.title %}*/
/*                     {% else %}*/
/*                       {% set title = infos.title %}*/
/*                     {% endif %}*/
/*                     {% trans with {'%program%': title} %}*/
/*                     On demand videos of <strong>%program%</strong>*/
/*                     {% endtrans %}*/
/*                   </p>*/
/*                 </div>*/
/* */
/*                 <div id="replay-slider">*/
/*                   <a href="#" id="prev"{% if current > 0 %} class="active"{% endif %} title="{% trans %}Previous{% endtrans %}">*/
/*                     {% trans %}Previous{% endtrans %}*/
/*                   </a>*/
/*                   <a href="#" id="next"{% if (current+1) < videos|length and videos|length > 4 %} class="active"{% endif %} title="{% trans %}Next{% endtrans %}">*/
/*                     {% trans %}Next{% endtrans %}*/
/*                   </a>*/
/*                   <ul class="slider videos" data-start="{{ current }}">*/
/*                     {% for video in videos %}*/
/*                       <li>*/
/*                         <div class="video{% if infos.replay_id == video.replay_id %} current{% endif %}">*/
/*                           <div class="video-img" style="background-image:url('{{ video.channel.images.small }}');">*/
/*                               {% if video.images.medium is not null %}*/
/*                                 <img width="160" height="120" alt="{{ video.title }}" src="{{ video.images.medium }}">*/
/*                               {% endif %}*/
/*                               <div class="cache"></div>*/
/*                               {% if video.duration %}*/
/*                                 <div class="length">{{ video.duration }}</div>*/
/*                               {% endif %}*/
/*                               {% if infos.replay_id != video.replay_id %}*/
/*                                 <a class="play" title="{% trans with {'%replay%': video.title} %}Watch %replay% on demand online{% endtrans %}" href="{{ path('replay_replay', {'video_id': video.id, 'title': video.alias}) }}"></a>*/
/*                               {% endif %}*/
/*                           </div>*/
/*                           <div class="video-title">*/
/*                             {{ video.title }}*/
/*                           </div>*/
/*                         </div>*/
/*                       </li>*/
/*                     {% endfor %}*/
/*                   </ul>*/
/*                 </div>*/
/* */
/*               {% endif %}*/
/*             </div>*/
/*           </div>*/
/* */
/*           {% if has_feature('social_tv') %}*/
/*           <div class="ptv-js-LiveTweets">*/
/*             <div id="twitter-tweets" style="display: none;">*/
/*               <a href="#" class="ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink"><span class="ptv-js-Tweet-numberTweet">0</span> nouveaux tweets</a>*/
/*               <ul id="tweets" data-auto-update="true" data-channel-alias="{{ infos.channel.alias }}" class="ptv-js-Tweet-list" data-disabled="false">*/
/*                 {{ block_social_tv_posts|raw }}*/
/*               </ul>*/
/*             </div>*/
/*           </div>*/
/*           {% endif %}*/
/* */
/*           <div class="ptv-js-FacebookComments">*/
/*             <div id="facebook-comments" style="display: none;">*/
/*               <div class="fb-comments" data-href="{{ current_url }}" data-width="100%" data-numposts="10" data-order-by="reverse_time" data-colorscheme="light"></div>*/
/*             </div>*/
/*           </div>*/
/* */
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
