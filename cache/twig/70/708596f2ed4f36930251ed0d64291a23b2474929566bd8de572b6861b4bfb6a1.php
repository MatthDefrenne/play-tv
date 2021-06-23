<?php

/* controllers/live-tweets/index.twig */
class __TwigTemplate_14a87e9dcff2671b1ade7fdfa2c99739c6510fe6840384b82b20e90db851e827 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/live-tweets/index.twig", 1);
        $this->blocks = array(
            'fluidheader' => array($this, 'block_fluidheader'),
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
    public function block_fluidheader($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        echo (isset($context["mosaic"]) ? $context["mosaic"] : $this->getContext($context, "mosaic"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "<div id=\"content\">
  <div class=\"container\">

    <div class=\"section-title margin\">
      <h1>
        <a href=\"/live-tweets/\" class=\"ptv-js-LivetweetFilter-link\"> <strong><span class=\"ptv-js-LivetweetFilter-mainTitle\">Derniers tweets";
        // line 13
        if (array_key_exists("channel", $context)) {
            echo " de ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        }
        echo "</span></strong></a>
        <span>»</span>
        <span class=\"clear-grey\">
          <span class=\"ptv-js-LivetweetFilter-secondTitle\">Voir les tweets en direct</span>
        </span>
      </h1>
    </div>
    <div class=\"livetweet-container\">
      <div class=\"row\">
        <div class=\"span-page\">
          <div class=\"section-title\" style=\"display: none;\">
            <h1>
              <a href=\"/live-tweets/";
        // line 25
        if (array_key_exists("channel", $context)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
            echo "/";
        }
        echo "\">
                <strong>Participez à la Social TV<span class=\"js-ptv-LivetweetFilter-socialChannel\">";
        // line 26
        if (array_key_exists("channel", $context)) {
            echo " sur ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        }
        echo "</span></strong>
              </a>
            </h1>
          </div>
          <div class=\"js-ptv-Tweet\">
            <div class=\"type-of-tweets\">
              <a href=\"#last\" class=\"last-tweets is-active js-ptv-Tweet-filter\" data-event-tracker=\"SOCIALTV-TIMELINE-last\">Derniers tweets</a>
              <a href=\"#trending\" class=\"hot-tweets js-ptv-Tweet-filter\" data-event-tracker=\"SOCIALTV-TIMELINE-hot\">Hot tweets</a>
            </div>
            <a href=\"#\" class=\"ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink\"><span class=\"ptv-js-Tweet-numberTweet\">0</span> nouveaux tweets</a>
            <ul id=\"tweets\" data-auto-update=\"true\"";
        // line 36
        if (array_key_exists("channel", $context)) {
            echo " data-channel-alias=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
            echo "\"";
        }
        echo " class=\"js-ptv-Tweet-list\">
              ";
        // line 37
        echo (isset($context["social_tv_posts"]) ? $context["social_tv_posts"] : $this->getContext($context, "social_tv_posts"));
        echo "
            </ul>
          </div>
        </div>
        <div class=\"span-sidebar\">
          ";
        // line 42
        $this->loadTemplate("controllers/live-tweets/_sidebar.twig", "controllers/live-tweets/index.twig", 42)->display($context);
        // line 43
        echo "        </div>
      </div>
    </div>

  </div>
</div>
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/live-tweets/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 43,  106 => 42,  98 => 37,  90 => 36,  74 => 26,  67 => 25,  49 => 13,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block fluidheader %}*/
/*   {{ mosaic|raw }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="section-title margin">*/
/*       <h1>*/
/*         <a href="/live-tweets/" class="ptv-js-LivetweetFilter-link"> <strong><span class="ptv-js-LivetweetFilter-mainTitle">Derniers tweets{% if channel is defined %} de {{ channel.name }}{% endif %}</span></strong></a>*/
/*         <span>»</span>*/
/*         <span class="clear-grey">*/
/*           <span class="ptv-js-LivetweetFilter-secondTitle">Voir les tweets en direct</span>*/
/*         </span>*/
/*       </h1>*/
/*     </div>*/
/*     <div class="livetweet-container">*/
/*       <div class="row">*/
/*         <div class="span-page">*/
/*           <div class="section-title" style="display: none;">*/
/*             <h1>*/
/*               <a href="/live-tweets/{% if channel is defined %}{{ channel.alias }}/{% endif %}">*/
/*                 <strong>Participez à la Social TV<span class="js-ptv-LivetweetFilter-socialChannel">{% if channel is defined %} sur {{ channel.name }}{% endif %}</span></strong>*/
/*               </a>*/
/*             </h1>*/
/*           </div>*/
/*           <div class="js-ptv-Tweet">*/
/*             <div class="type-of-tweets">*/
/*               <a href="#last" class="last-tweets is-active js-ptv-Tweet-filter" data-event-tracker="SOCIALTV-TIMELINE-last">Derniers tweets</a>*/
/*               <a href="#trending" class="hot-tweets js-ptv-Tweet-filter" data-event-tracker="SOCIALTV-TIMELINE-hot">Hot tweets</a>*/
/*             </div>*/
/*             <a href="#" class="ptv-Tweet-moreLink ptv-Tweet-moreLink--hidden ptv-js-Tweet-moreLink"><span class="ptv-js-Tweet-numberTweet">0</span> nouveaux tweets</a>*/
/*             <ul id="tweets" data-auto-update="true"{% if channel is defined %} data-channel-alias="{{ channel.alias }}"{% endif %} class="js-ptv-Tweet-list">*/
/*               {{ social_tv_posts|raw }}*/
/*             </ul>*/
/*           </div>*/
/*         </div>*/
/*         <div class="span-sidebar">*/
/*           {% include "controllers/live-tweets/_sidebar.twig" %}*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/* */
/*   </div>*/
/* </div>*/
/* <!-- /#content -->*/
/* {% endblock content %}*/
/* */
