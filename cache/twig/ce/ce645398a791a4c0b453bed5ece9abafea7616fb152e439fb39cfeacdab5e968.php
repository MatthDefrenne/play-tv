<?php

/* controllers/widgets/social-tv-posts_mobile.twig */
class __TwigTemplate_0351089421a172cb773c77b4828d97c0804d8118b1d5d4b24d88921dc5744a29 extends Twig_Template
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
        echo "<ul class=\"pmd-SocialTv-list\">
";
        // line 2
        if ((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts"))) {
            // line 3
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["tweet"]) {
                // line 4
                echo "  ";
                if (($this->getAttribute($context["loop"], "index", array()) == 5)) {
                    // line 5
                    echo "    ";
                    if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
                        // line 6
                        echo "    <div id=\"taboola-mobile-live-tweets\"></div>
    ";
                    }
                    // line 8
                    echo "  ";
                }
                // line 9
                echo "  <li id=\"tweet-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                echo "\" class=\"pmd-SocialTvItem\">

    <div class=\"pmd-SocialTvItem-picture\">
      <img src=\"";
                // line 12
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "image_url", array()), "html", null, true);
                echo "\" width=\"36\" height=\"36\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\" />
    </div>

    <div class=\"pmd-SocialTvItem-main\">
      <div class=\"pmd-SocialTvItem-heading\">
        <p class=\"pmd-SocialTvItem-since\">
          <a href=\"https://twitter.com/";
                // line 18
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "/status/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                echo "/\" rel=\"nofollow\" target=\"_blank\">
            ";
                // line 19
                $context["duration"] = twig_round(($this->getAttribute($context["tweet"], "since", array()) / 60));
                // line 20
                echo "            il y a <span class=\"tweet-since-time\" data-timestamp=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "date", array()), "html", null, true);
                echo "\" data-duration=\"true\">";
                if (((isset($context["duration"]) ? $context["duration"] : $this->getContext($context, "duration")) > 1)) {
                    echo "  ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->diffForHumans((isset($context["duration"]) ? $context["duration"] : $this->getContext($context, "duration"))), "html", null, true);
                    echo " ";
                } else {
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "since", array()), "html", null, true);
                    echo " sec";
                }
                echo "</span>
          </a>
        </p>
        <p class=\"pmd-SocialTvItem-author pmd-Text--truncate\">
          <a href=\"https://twitter.com/";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\" rel=\"nofollow\" target=\"_blank\" title=\"Voir le profil de ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "</a>
        </p>
      </div>
      <div class=\"pmd-SocialTvItem-content\">
        <p class=\"pmd-SocialTvItem-message\">
          ";
                // line 29
                if (($this->getAttribute($context["tweet"], "retweets", array()) > 0)) {
                    // line 30
                    echo "          <a href=\"https://twitter.com/intent/retweet?tweet_id=";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                    echo "\" rel=\"nofollow\" target=\"_blank\" class=\"pmd-SocialTvItem-retweet pmd-Icons-retweet\" title=\"Re-tweet !\">
            <span>";
                    // line 31
                    echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "retweets", array()), "html", null, true);
                    echo "</span>
          </a>
          ";
                }
                // line 34
                echo "          <span class=\"pmd-SocialTvItem-text\">";
                echo $this->getAttribute($context["tweet"], "text", array());
                echo "</span>
        </p>
      </div>
    </div>

  </li>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tweet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 42
            echo "  <li class=\"text ptv-js-SocialTv-noPost\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("no_tweets_available", array(), "messages");
            echo "</li>
";
        }
        // line 44
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/social-tv-posts_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 44,  147 => 42,  124 => 34,  118 => 31,  113 => 30,  111 => 29,  99 => 24,  81 => 20,  79 => 19,  73 => 18,  62 => 12,  55 => 9,  52 => 8,  48 => 6,  45 => 5,  42 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul class="pmd-SocialTv-list">*/
/* {% if posts %}*/
/*   {% for tweet in posts %}*/
/*   {% if loop.index == 5 %}*/
/*     {% if is_website_fr %}*/
/*     <div id="taboola-mobile-live-tweets"></div>*/
/*     {% endif %}*/
/*   {% endif %}*/
/*   <li id="tweet-{{ tweet.tweet_id }}" class="pmd-SocialTvItem">*/
/* */
/*     <div class="pmd-SocialTvItem-picture">*/
/*       <img src="{{ tweet.image_url }}" width="36" height="36" alt="{{ tweet.author }}" />*/
/*     </div>*/
/* */
/*     <div class="pmd-SocialTvItem-main">*/
/*       <div class="pmd-SocialTvItem-heading">*/
/*         <p class="pmd-SocialTvItem-since">*/
/*           <a href="https://twitter.com/{{ tweet.author }}/status/{{ tweet.tweet_id }}/" rel="nofollow" target="_blank">*/
/*             {% set duration = (tweet.since / 60)|round %}*/
/*             il y a <span class="tweet-since-time" data-timestamp="{{ tweet.date }}" data-duration="true">{% if duration > 1 %}  {{ duration|diff_for_humans }} {% else %} {{ tweet.since }} sec{% endif %}</span>*/
/*           </a>*/
/*         </p>*/
/*         <p class="pmd-SocialTvItem-author pmd-Text--truncate">*/
/*           <a href="https://twitter.com/{{ tweet.author }}" rel="nofollow" target="_blank" title="Voir le profil de {{ tweet.author }}">{{ tweet.author }}</a>*/
/*         </p>*/
/*       </div>*/
/*       <div class="pmd-SocialTvItem-content">*/
/*         <p class="pmd-SocialTvItem-message">*/
/*           {% if tweet.retweets > 0 %}*/
/*           <a href="https://twitter.com/intent/retweet?tweet_id={{ tweet.tweet_id }}" rel="nofollow" target="_blank" class="pmd-SocialTvItem-retweet pmd-Icons-retweet" title="Re-tweet !">*/
/*             <span>{{ tweet.retweets }}</span>*/
/*           </a>*/
/*           {% endif %}*/
/*           <span class="pmd-SocialTvItem-text">{{ tweet.text|raw }}</span>*/
/*         </p>*/
/*       </div>*/
/*     </div>*/
/* */
/*   </li>*/
/*   {% endfor %}*/
/* {% else %}*/
/*   <li class="text ptv-js-SocialTv-noPost">{% trans %}no_tweets_available{% endtrans %}</li>*/
/* {% endif %}*/
/* </ul>*/
/* */
