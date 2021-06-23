<?php

/* controllers/widgets/social-tv-posts.twig */
class __TwigTemplate_fc44c47269a640b5ee027a6a56f180f88c403f4a27ae328d4a9f2cdfbfdf330d extends Twig_Template
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
        if ((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts"))) {
            // line 2
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
            foreach ($context['_seq'] as $context["_key"] => $context["tweet"]) {
                // line 3
                echo "    <li id=\"tweet-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                echo "\" class=\"tweet";
                if (($this->getAttribute($context["tweet"], "retweets", array()) > 2)) {
                    echo " tweet-status-featured";
                }
                echo "\">
      <div class=\"tweet-author-img\">
        <img data-src=\"";
                // line 5
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "image_url", array()), "html", null, true);
                echo "\" width=\"36\" height=\"36\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\" src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\" onload=\"lzld(this)\">
        <div class=\"cache\"></div>
      </div>
      <div class=\"tweet-head\">
          <p class=\"tweet-author\">
            <a href=\"https://twitter.com/";
                // line 10
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\" rel=\"nofollow\" target=\"_blank\" title=\"Voir le profil de ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "</a>
          </p>
          <p class=\"tweet-since\">
            <a href=\"https://twitter.com/";
                // line 13
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "author", array()), "html", null, true);
                echo "/status/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                echo "/\" rel=\"nofollow\" target=\"_blank\">
              ";
                // line 14
                $context["duration"] = twig_round(($this->getAttribute($context["tweet"], "since", array()) / 60));
                // line 15
                echo "              il y a <span class=\"tweet-since-time\" data-timestamp=\"";
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

      </div>
      <p class=\"tweet-content\">
        <a href=\"https://twitter.com/intent/retweet?tweet_id=";
                // line 21
                echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "tweet_id", array()), "html", null, true);
                echo "\" rel=\"nofollow\" target=\"_blank\" class=\"";
                if (($this->getAttribute($context["tweet"], "retweets", array()) > 0)) {
                    echo "tweet-retweet";
                } else {
                    echo "tweet-no-retweets";
                }
                echo "\" title=\"Re-tweet !\">
          <span>";
                // line 22
                if (($this->getAttribute($context["tweet"], "retweets", array()) > 0)) {
                    echo twig_escape_filter($this->env, $this->getAttribute($context["tweet"], "retweets", array()), "html", null, true);
                } else {
                    echo "0";
                }
                echo "</span>
        </a>
        <div>
          ";
                // line 25
                echo $this->getAttribute($context["tweet"], "text", array());
                echo "
        </div>
      </p>
    </li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tweet'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 31
            echo "  <li class=\"text ptv-js-SocialTv-noPost\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("no_tweets_available", array(), "messages");
            echo "</li>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/social-tv-posts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 31,  104 => 25,  94 => 22,  84 => 21,  64 => 15,  62 => 14,  56 => 13,  46 => 10,  36 => 5,  26 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if posts %}*/
/*   {% for tweet in posts %}*/
/*     <li id="tweet-{{ tweet.tweet_id }}" class="tweet{% if tweet.retweets > 2 %} tweet-status-featured{% endif %}">*/
/*       <div class="tweet-author-img">*/
/*         <img data-src="{{ tweet.image_url }}" width="36" height="36" alt="{{ tweet.author }}" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" onload="lzld(this)">*/
/*         <div class="cache"></div>*/
/*       </div>*/
/*       <div class="tweet-head">*/
/*           <p class="tweet-author">*/
/*             <a href="https://twitter.com/{{ tweet.author }}" rel="nofollow" target="_blank" title="Voir le profil de {{ tweet.author }}">{{ tweet.author }}</a>*/
/*           </p>*/
/*           <p class="tweet-since">*/
/*             <a href="https://twitter.com/{{ tweet.author }}/status/{{ tweet.tweet_id }}/" rel="nofollow" target="_blank">*/
/*               {% set duration = (tweet.since / 60)|round %}*/
/*               il y a <span class="tweet-since-time" data-timestamp="{{ tweet.date }}" data-duration="true">{% if duration > 1 %}  {{ duration|diff_for_humans }} {% else %} {{ tweet.since }} sec{% endif %}</span>*/
/*             </a>*/
/*           </p>*/
/* */
/*       </div>*/
/*       <p class="tweet-content">*/
/*         <a href="https://twitter.com/intent/retweet?tweet_id={{ tweet.tweet_id }}" rel="nofollow" target="_blank" class="{% if tweet.retweets > 0 %}tweet-retweet{% else %}tweet-no-retweets{% endif %}" title="Re-tweet !">*/
/*           <span>{% if tweet.retweets > 0 %}{{ tweet.retweets }}{% else %}0{% endif %}</span>*/
/*         </a>*/
/*         <div>*/
/*           {{ tweet.text|raw }}*/
/*         </div>*/
/*       </p>*/
/*     </li>*/
/*   {% endfor %}*/
/* {% else %}*/
/*   <li class="text ptv-js-SocialTv-noPost">{% trans %}no_tweets_available{% endtrans %}</li>*/
/* {% endif %}*/
/* */
