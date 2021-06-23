<?php

/* controllers/replay-tv/index_mobile.twig */
class __TwigTemplate_5fd917217cfecca609a6ad5bda40256345418ce45426f775e9cec4d5fa37761f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/replay-tv/index_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<div class=\"pmd-ReplayTv\">

  <div class=\"pmd-ReplayTvHeading pmd-Heading\">
    <h2 class=\"pmd-Heading-words\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("Catch Up TV", array(), "messages");
        echo "</h2>
  </div>

  <div class=\"pmd-ReplayTvContent\">

    <div class=\"pmd-ReplayTvContentMosaic\">
      ";
        // line 13
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "
    </div>

    ";
        // line 17
        echo "
    ";
        // line 18
        ob_start();
        // line 19
        echo "    <div class=\"pmd-Heading pmd-Heading--2x pmd-Heading--light\">
      <a href=\"#\" class=\"pmd-js-ReplayTv-yesterdayTab pmd-Heading-words\">
        <span>";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("yesterday_tab", array(), "catchup");
        echo "</span>
      </a>
      <a href=\"#\" class=\"pmd-js-ReplayTv-lastTab pmd-Heading-words\">
        <span>";
        // line 24
        echo $this->env->getExtension('translator')->getTranslator()->trans("last_tab", array(), "catchup");
        echo "</span>
      </a>
    </div>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 28
        echo "
    <div class=\"pmd-js-ReplayTv-yesterdayContent pmd-ReplayTvContent-yesterdayContent\">
      ";
        // line 30
        ob_start();
        // line 31
        echo "      ";
        if (( !(null === (isset($context["last_videos_featured"]) ? $context["last_videos_featured"] : $this->getContext($context, "last_videos_featured"))) && (twig_length_filter($this->env, (isset($context["last_videos_featured"]) ? $context["last_videos_featured"] : $this->getContext($context, "last_videos_featured"))) > 0))) {
            // line 32
            echo "      ";
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
                // line 33
                echo "      ";
                $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/index_mobile.twig", 33)->display(array_merge($context, array("filter" => "index", "video" => $context["video"])));
                // line 34
                echo "      ";
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
            // line 35
            echo "      ";
        }
        // line 36
        echo "      ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 37
        echo "    </div>

    <div class=\"pmd-js-ReplayTv-lastContent pmd-ReplayTvContent-lastContent\">
      ";
        // line 40
        ob_start();
        // line 41
        echo "      ";
        if (( !(null === (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) && (twig_length_filter($this->env, (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) > 0))) {
            // line 42
            echo "      ";
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
                // line 43
                echo "      ";
                $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/index_mobile.twig", 43)->display(array_merge($context, array("filter" => "index", "video" => $context["video"])));
                // line 44
                echo "      ";
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
            // line 45
            echo "      ";
        } else {
            // line 46
            echo "      <div>
        <p>";
            // line 47
            echo $this->env->getExtension('translator')->getTranslator()->trans("No video on demand added recently.", array(), "messages");
            echo "</p>
      </div>
      ";
        }
        // line 50
        echo "      ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 51
        echo "    </div>

    <div class=\"pmd-ReplayTvContentMainButton\">
      <a href=\"";
        // line 54
        echo $this->env->getExtension('routing')->getPath("replay_videos");
        echo "\">
        <span class=\"pmd-Button pmd-Button--dark\">
        ";
        // line 56
        echo $this->env->getExtension('translator')->getTranslator()->trans("All the latest videos", array(), "messages");
        // line 57
        echo "        </span>
      </a>
    </div>

  </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/index_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  195 => 57,  193 => 56,  188 => 54,  183 => 51,  180 => 50,  174 => 47,  171 => 46,  168 => 45,  154 => 44,  151 => 43,  133 => 42,  130 => 41,  128 => 40,  123 => 37,  120 => 36,  117 => 35,  103 => 34,  100 => 33,  82 => 32,  79 => 31,  77 => 30,  73 => 28,  66 => 24,  60 => 21,  56 => 19,  54 => 18,  51 => 17,  45 => 13,  36 => 7,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-ReplayTv">*/
/* */
/*   <div class="pmd-ReplayTvHeading pmd-Heading">*/
/*     <h2 class="pmd-Heading-words">{% trans %}Catch Up TV{% endtrans %}</h2>*/
/*   </div>*/
/* */
/*   <div class="pmd-ReplayTvContent">*/
/* */
/*     <div class="pmd-ReplayTvContentMosaic">*/
/*       {{ block_mosaic|raw }}*/
/*     </div>*/
/* */
/*     {# {% include "partials/subnav-replay-tv.twig" with {"subnav_active": "index", "days": days, "date": date, "title": "The latest videos on demand available"|trans} %} #}*/
/* */
/*     {% spaceless %}*/
/*     <div class="pmd-Heading pmd-Heading--2x pmd-Heading--light">*/
/*       <a href="#" class="pmd-js-ReplayTv-yesterdayTab pmd-Heading-words">*/
/*         <span>{% trans from "catchup" %}yesterday_tab{% endtrans %}</span>*/
/*       </a>*/
/*       <a href="#" class="pmd-js-ReplayTv-lastTab pmd-Heading-words">*/
/*         <span>{% trans from "catchup" %}last_tab{% endtrans %}</span>*/
/*       </a>*/
/*     </div>*/
/*     {% endspaceless %}*/
/* */
/*     <div class="pmd-js-ReplayTv-yesterdayContent pmd-ReplayTvContent-yesterdayContent">*/
/*       {% spaceless %}*/
/*       {% if last_videos_featured is not null and last_videos_featured|length > 0 %}*/
/*       {% for video in last_videos_featured %}*/
/*       {% include "partials/item-replay-tv-page.twig" with {"filter":"index", "video": video} %}*/
/*       {% endfor %}*/
/*       {% endif %}*/
/*       {% endspaceless %}*/
/*     </div>*/
/* */
/*     <div class="pmd-js-ReplayTv-lastContent pmd-ReplayTvContent-lastContent">*/
/*       {% spaceless %}*/
/*       {% if last_videos is not null and last_videos|length > 0 %}*/
/*       {% for video in last_videos %}*/
/*       {% include "partials/item-replay-tv-page.twig" with {"filter": "index", "video": video} %}*/
/*       {% endfor %}*/
/*       {% else %}*/
/*       <div>*/
/*         <p>{% trans %}No video on demand added recently.{% endtrans %}</p>*/
/*       </div>*/
/*       {% endif %}*/
/*       {% endspaceless %}*/
/*     </div>*/
/* */
/*     <div class="pmd-ReplayTvContentMainButton">*/
/*       <a href="{{ path('replay_videos') }}">*/
/*         <span class="pmd-Button pmd-Button--dark">*/
/*         {% trans %}All the latest videos{% endtrans %}*/
/*         </span>*/
/*       </a>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
/* {% endblock %}*/
/* */
