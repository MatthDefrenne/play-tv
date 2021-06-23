<?php

/* controllers/replay-tv/index.twig */
class __TwigTemplate_ddb381658eb06e200382677459770e21ff8eb480008ad8c99a418d4f9291916a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/replay-tv/index.twig", 1);
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
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = array())
    {
        // line 8
        echo "
<div id=\"content\" class=\"pmd-ReplayContent\">

  ";
        // line 11
        $this->loadTemplate("partials/subnav-replay-tv.twig", "controllers/replay-tv/index.twig", 11)->display(array_merge($context, array("subnav_active" => "index", "days" => (isset($context["days"]) ? $context["days"] : $this->getContext($context, "days")), "date" => (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")), "title" => $this->env->getExtension('translator')->trans("The latest videos on demand available"))));
        // line 12
        echo "
  <div class=\"container\">
    <div class=\"pmd-js-ReplayBroadcastList\">

      <div class=\"pmd-ReplayContent-wrapper\">
        ";
        // line 17
        if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
            // line 18
            echo "        <div class=\"pmd-ReplayContent-ads\">
          ";
            // line 19
            $this->loadTemplate("partials/ads-banner.twig", "controllers/replay-tv/index.twig", 19)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
            // line 20
            echo "        </div>
        ";
        }
        // line 22
        echo "
        ";
        // line 23
        ob_start();
        // line 24
        echo "        ";
        if (( !(null === (isset($context["last_videos_featured"]) ? $context["last_videos_featured"] : $this->getContext($context, "last_videos_featured"))) && (twig_length_filter($this->env, (isset($context["last_videos_featured"]) ? $context["last_videos_featured"] : $this->getContext($context, "last_videos_featured"))) > 0))) {
            // line 25
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["last_videos_featured"]) ? $context["last_videos_featured"] : $this->getContext($context, "last_videos_featured")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                // line 26
                echo "        ";
                $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/index.twig", 26)->display(array_merge($context, array("filter" => "index", "video" => $context["video"])));
                // line 27
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "        ";
        }
        // line 29
        echo "        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 30
        echo "      </div>

    </div>
  </div>
</div>

";
        // line 36
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 38
            $this->loadTemplate("partials/ads-ga.twig", "controllers/replay-tv/index.twig", 38)->display($context);
        }
        // line 40
        echo "
<div class=\"pmd-ReplayVideoHighlight\" id=\"pmd-ReplayVideoHighlight\">

  <div id=\"content\" class=\"pmd-ReplayContent\">

    <div class=\"container\">

      <h4 class=\"pmd-ReplayVideoHighlight-heading\">
        <span class=\"pmd-ReplayVideoHighlight-headingMain\">";
        // line 48
        echo $this->env->getExtension('translator')->getTranslator()->trans("The last videos on demand available online", array(), "messages");
        echo "</span>
      </h4>

      <div class=\"pmd-ReplayContent-wrapper\">

        ";
        // line 53
        ob_start();
        // line 54
        echo "        ";
        if (( !(null === (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) && (twig_length_filter($this->env, (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) > 0))) {
            // line 55
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                // line 56
                echo "        ";
                $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/index.twig", 56)->display(array_merge($context, array("filter" => "index", "video" => $context["video"])));
                // line 57
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "        ";
        } else {
            // line 59
            echo "        <div class=\"text xbigger center clear-grey margin\">
          <p>";
            // line 60
            echo $this->env->getExtension('translator')->getTranslator()->trans("No video on demand added recently.", array(), "messages");
            echo "</p>
        </div>
        ";
        }
        // line 63
        echo "        <div class=\"pmd-ReplayButton\">
          <a href=\"";
        // line 64
        echo $this->env->getExtension('routing')->getPath("replay_videos");
        echo "\">
            <span class=\"pmd-Button pmd-Button--dark\">
            ";
        // line 66
        echo $this->env->getExtension('translator')->getTranslator()->trans("All the latest videos", array(), "messages");
        // line 67
        echo "            </span>
          </a>
        </div>
        ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 71
        echo "
      </div>

    </div>

  </div>

</div>


";
        // line 81
        $this->loadTemplate("controllers/replay-tv/_javascript.twig", "controllers/replay-tv/index.twig", 81)->display(array_merge($context, array("gender_alias" => (isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")), "date" => (isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")))));
        // line 82
        echo "
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 82,  227 => 81,  215 => 71,  209 => 67,  207 => 66,  202 => 64,  199 => 63,  193 => 60,  190 => 59,  187 => 58,  173 => 57,  170 => 56,  152 => 55,  149 => 54,  147 => 53,  139 => 48,  129 => 40,  126 => 38,  124 => 36,  116 => 30,  113 => 29,  110 => 28,  96 => 27,  93 => 26,  75 => 25,  72 => 24,  70 => 23,  67 => 22,  63 => 20,  61 => 19,  58 => 18,  56 => 17,  49 => 12,  47 => 11,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block fluidheader %}*/
/*   {{ block_mosaic|raw }}*/
/* {% endblock %}*/
/* */
/* {% block content %}*/
/* */
/* <div id="content" class="pmd-ReplayContent">*/
/* */
/*   {% include "partials/subnav-replay-tv.twig" with {"subnav_active": "index", "days": days, "date": date, "title": "The latest videos on demand available"|trans} %}*/
/* */
/*   <div class="container">*/
/*     <div class="pmd-js-ReplayBroadcastList">*/
/* */
/*       <div class="pmd-ReplayContent-wrapper">*/
/*         {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/*         <div class="pmd-ReplayContent-ads">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*         </div>*/
/*         {% endif %}*/
/* */
/*         {% spaceless %}*/
/*         {% if last_videos_featured is not null and last_videos_featured|length > 0 %}*/
/*         {% for video in last_videos_featured %}*/
/*         {% include "partials/item-replay-tv-page.twig" with {"filter":"index", "video": video} %}*/
/*         {% endfor %}*/
/*         {% endif %}*/
/*         {% endspaceless %}*/
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/* </div>*/
/* */
/* {% if is_website_fr %}*/
/* {# {% include "partials/ads-beopinion.twig" %} #}*/
/* {% include "partials/ads-ga.twig" %}*/
/* {% endif %}*/
/* */
/* <div class="pmd-ReplayVideoHighlight" id="pmd-ReplayVideoHighlight">*/
/* */
/*   <div id="content" class="pmd-ReplayContent">*/
/* */
/*     <div class="container">*/
/* */
/*       <h4 class="pmd-ReplayVideoHighlight-heading">*/
/*         <span class="pmd-ReplayVideoHighlight-headingMain">{% trans %}The last videos on demand available online{% endtrans %}</span>*/
/*       </h4>*/
/* */
/*       <div class="pmd-ReplayContent-wrapper">*/
/* */
/*         {% spaceless %}*/
/*         {% if last_videos is not null and last_videos|length > 0 %}*/
/*         {% for video in last_videos %}*/
/*         {% include "partials/item-replay-tv-page.twig" with {"filter": "index", "video": video} %}*/
/*         {% endfor %}*/
/*         {% else %}*/
/*         <div class="text xbigger center clear-grey margin">*/
/*           <p>{% trans %}No video on demand added recently.{% endtrans %}</p>*/
/*         </div>*/
/*         {% endif %}*/
/*         <div class="pmd-ReplayButton">*/
/*           <a href="{{ path('replay_videos') }}">*/
/*             <span class="pmd-Button pmd-Button--dark">*/
/*             {% trans %}All the latest videos{% endtrans %}*/
/*             </span>*/
/*           </a>*/
/*         </div>*/
/*         {% endspaceless %}*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
/* */
/* {% include "controllers/replay-tv/_javascript.twig" with {"gender_alias": gender_alias, "date": date} %}*/
/* */
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
