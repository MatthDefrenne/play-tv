<?php

/* controllers/television/_content.twig */
class __TwigTemplate_7ffd00e379626e16a511d3352223d5d4aaf62325fb3321535c43aefaceb868e2 extends Twig_Template
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
        $context["ads"] = "false";
        // line 2
        if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 3
            $context["ads"] = "true";
        }
        // line 5
        echo "
<div id=\"content\" class=\"pmd-TelevisionContent pmd-js-TelevisionContent\" data-ads=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["ads"]) ? $context["ads"] : $this->getContext($context, "ads")), "html", null, true);
        echo "\" data-mode=\"";
        echo twig_escape_filter($this->env, (isset($context["mode"]) ? $context["mode"] : $this->getContext($context, "mode")), "html", null, true);
        echo "\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"pmd-js-TelevisionContent-page span-page\">

        ";
        // line 11
        if (array_key_exists("channel", $context)) {
            // line 12
            echo "
          <div class=\"pmd-js-TelevisionContent-live pmd-TelevisionContent-block\">
            ";
            // line 14
            echo (isset($context["block_live_program_by_channel"]) ? $context["block_live_program_by_channel"] : $this->getContext($context, "block_live_program_by_channel"));
            echo "
          </div>
          <div class=\"pmd-js-TelevisionContent-next pmd-TelevisionContent-block\">
            ";
            // line 17
            echo (isset($context["block_next_programs_by_channel"]) ? $context["block_next_programs_by_channel"] : $this->getContext($context, "block_next_programs_by_channel"));
            echo "
            ";
            // line 18
            $this->loadTemplate("controllers/television/_tracking-netstat-fr24.twig", "controllers/television/_content.twig", 18)->display($context);
            // line 19
            echo "          </div>
          ";
            // line 20
            if ($this->env->getExtension('playtv_feature')->hasFeature("social_tv")) {
                // line 21
                echo "          <div class=\"pmd-js-TelevisionContent-liveTweets pmd-TelevisionContent-block\">
            <div id=\"twitter-tweets\" style=\"display: none;\">
              <a href=\"#\" class=\"ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink\"><span class=\"ptv-js-Tweet-numberTweet\">0</span> nouveaux tweets</a>
              <ul id=\"tweets\" data-auto-update=\"true\" data-channel-alias=\"";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
                echo "\" class=\"ptv-js-Tweet-list\" data-disabled=\"false\">
              ";
                // line 25
                echo (isset($context["block_social_tv_posts"]) ? $context["block_social_tv_posts"] : $this->getContext($context, "block_social_tv_posts"));
                echo "
              </ul>
            </div>
          </div>
          ";
            }
            // line 30
            echo "          <div class=\"pmd-js-TelevisionContent-facebookComments pmd-TelevisionContent-block\">
            <div id=\"facebook-comments\" style=\"display: none;\">
              <div class=\"fb-comments\" data-href=\"";
            // line 32
            echo twig_escape_filter($this->env, (isset($context["current_url"]) ? $context["current_url"] : $this->getContext($context, "current_url")), "html", null, true);
            echo "\" data-width=\"100%\" data-numposts=\"10\" data-order-by=\"reverse_time\" data-colorscheme=\"light\"></div>
            </div>
          </div>

        ";
        } else {
            // line 37
            echo "
          <div class=\"pmd-js-TelevisionContent-live\"></div>
          <div class=\"pmd-js-TelevisionContent-next\"></div>
          ";
            // line 40
            if ($this->env->getExtension('playtv_feature')->hasFeature("social_tv")) {
                // line 41
                echo "          <div class=\"ptv-js-LiveTweets\">
            <div id=\"twitter-tweets\" style=\"display: none;\">
              <a href=\"#\" class=\"ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink\">
                <span class=\"ptv-js-Tweet-numberTweet\">0</span> nouveaux tweets
              </a>
              <ul id=\"tweets\" data-auto-update=\"true\" class=\"ptv-js-Tweet-list\" data-disabled=\"true\">
              </ul>
            </div>
          </div>
          ";
            }
            // line 51
            echo "          <div class=\"ptv-js-FacebookComments\">
            <div id=\"facebook-comments\" style=\"display: none;\"></div>
          </div>

        ";
        }
        // line 56
        echo "
      </div>

      <div class=\"pmd-js-TelevisionContent-thumbnails pmd-TelevisionContent-thumbnails\">
        ";
        // line 60
        echo (isset($context["television_content"]) ? $context["television_content"] : $this->getContext($context, "television_content"));
        echo "
      </div>

      <div class=\"pmd-js-TelevisionContent-sidebar span-sidebar\">
        ";
        // line 65
        echo "        ";
        $this->loadTemplate("partials/ads-banner.twig", "controllers/television/_content.twig", 65)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 66
        echo "      </div>

      ";
        // line 68
        if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 69
            echo "      <div id=\"ead_native\">
        <script type=\"text/javascript\" id=\"ean-native-embed-tag\" src=\"//cdn.elasticad.net/native/serve/js/nativeEmbed.gz.js\" async=\"true\"></script>
      </div>
      ";
        }
        // line 73
        echo "
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/_content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 73,  139 => 69,  137 => 68,  133 => 66,  130 => 65,  123 => 60,  117 => 56,  110 => 51,  98 => 41,  96 => 40,  91 => 37,  83 => 32,  79 => 30,  71 => 25,  67 => 24,  62 => 21,  60 => 20,  57 => 19,  55 => 18,  51 => 17,  45 => 14,  41 => 12,  39 => 11,  29 => 6,  26 => 5,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set ads = 'false' %}*/
/* {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/* {% set ads = 'true' %}*/
/* {% endif %}*/
/* */
/* <div id="content" class="pmd-TelevisionContent pmd-js-TelevisionContent" data-ads="{{ ads }}" data-mode="{{ mode }}">*/
/*   <div class="container">*/
/*     <div class="row">*/
/*       <div class="pmd-js-TelevisionContent-page span-page">*/
/* */
/*         {% if channel is defined %}*/
/* */
/*           <div class="pmd-js-TelevisionContent-live pmd-TelevisionContent-block">*/
/*             {{ block_live_program_by_channel|raw }}*/
/*           </div>*/
/*           <div class="pmd-js-TelevisionContent-next pmd-TelevisionContent-block">*/
/*             {{ block_next_programs_by_channel|raw }}*/
/*             {% include "controllers/television/_tracking-netstat-fr24.twig" %}*/
/*           </div>*/
/*           {% if has_feature('social_tv') %}*/
/*           <div class="pmd-js-TelevisionContent-liveTweets pmd-TelevisionContent-block">*/
/*             <div id="twitter-tweets" style="display: none;">*/
/*               <a href="#" class="ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink"><span class="ptv-js-Tweet-numberTweet">0</span> nouveaux tweets</a>*/
/*               <ul id="tweets" data-auto-update="true" data-channel-alias="{{ channel.alias }}" class="ptv-js-Tweet-list" data-disabled="false">*/
/*               {{ block_social_tv_posts|raw }}*/
/*               </ul>*/
/*             </div>*/
/*           </div>*/
/*           {% endif %}*/
/*           <div class="pmd-js-TelevisionContent-facebookComments pmd-TelevisionContent-block">*/
/*             <div id="facebook-comments" style="display: none;">*/
/*               <div class="fb-comments" data-href="{{ current_url }}" data-width="100%" data-numposts="10" data-order-by="reverse_time" data-colorscheme="light"></div>*/
/*             </div>*/
/*           </div>*/
/* */
/*         {% else %}*/
/* */
/*           <div class="pmd-js-TelevisionContent-live"></div>*/
/*           <div class="pmd-js-TelevisionContent-next"></div>*/
/*           {% if has_feature('social_tv') %}*/
/*           <div class="ptv-js-LiveTweets">*/
/*             <div id="twitter-tweets" style="display: none;">*/
/*               <a href="#" class="ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink">*/
/*                 <span class="ptv-js-Tweet-numberTweet">0</span> nouveaux tweets*/
/*               </a>*/
/*               <ul id="tweets" data-auto-update="true" class="ptv-js-Tweet-list" data-disabled="true">*/
/*               </ul>*/
/*             </div>*/
/*           </div>*/
/*           {% endif %}*/
/*           <div class="ptv-js-FacebookComments">*/
/*             <div id="facebook-comments" style="display: none;"></div>*/
/*           </div>*/
/* */
/*         {% endif %}*/
/* */
/*       </div>*/
/* */
/*       <div class="pmd-js-TelevisionContent-thumbnails pmd-TelevisionContent-thumbnails">*/
/*         {{ television_content|raw }}*/
/*       </div>*/
/* */
/*       <div class="pmd-js-TelevisionContent-sidebar span-sidebar">*/
/*         {# {% include "partials/ads-banner.twig" with {'unique': "af0da7c8", "zone_id": 8} %} #}*/
/*         {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*       </div>*/
/* */
/*       {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/*       <div id="ead_native">*/
/*         <script type="text/javascript" id="ean-native-embed-tag" src="//cdn.elasticad.net/native/serve/js/nativeEmbed.gz.js" async="true"></script>*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/*   </div>*/
/* </div>*/
/* */
