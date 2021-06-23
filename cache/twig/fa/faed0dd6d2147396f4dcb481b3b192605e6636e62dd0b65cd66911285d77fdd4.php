<?php

/* controllers/replay-tv/_replays-videos.twig */
class __TwigTemplate_f7efd44ebd14ce8d89e2052cfda9605fbb068bf10d0f6156cefca7b6f2e3df6f extends Twig_Template
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
        if (((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) > 0)) {
            // line 2
            echo "  <nav class=\"paginate margin paginate-top\">
    ";
            // line 3
            $this->loadTemplate("partials/paginate-replay-tv.twig", "controllers/replay-tv/_replays-videos.twig", 3)->display($context);
            // line 4
            echo "    <div class=\"right text clear-grey\">
      ";
            // line 5
            echo $this->env->getExtension('translator')->getTranslator()->trans("Page %page% / %pages%", array("%page%" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")), "%pages%" => (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages"))), "messages");
            // line 8
            echo "      <span class=\"bullet\">&bull;</span>
      ";
            // line 9
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{1} <strong>%count% video</strong> on demand|]1,Inf] <strong>%count% videos</strong> on demand", (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")), array("%count%" => (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))), "messages");
            // line 12
            echo "    </div>
  </nav>
";
        }
        // line 15
        echo "
";
        // line 16
        if ( !(null === (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")))) {
            // line 17
            echo "<div class=\"pmd-ReplayContent-wrapper\">

  ";
            // line 19
            if ((((isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true) && (((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))))) {
                // line 20
                echo "  <div class=\"pmd-ReplayContent-ads\">
    ";
                // line 21
                $this->loadTemplate("partials/ads-banner.twig", "controllers/replay-tv/_replays-videos.twig", 21)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
                // line 22
                echo "  </div>
  ";
            }
            // line 24
            echo "
  ";
            // line 25
            ob_start();
            // line 26
            echo "  ";
            if (( !(null === (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) && (twig_length_filter($this->env, (isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) > 0))) {
                // line 27
                echo "  ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
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
                    // line 28
                    echo "    ";
                    $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/_replays-videos.twig", 28)->display(array_merge($context, array("filter" => "filter", "video" => $context["video"])));
                    // line 29
                    echo "  ";
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
                // line 30
                echo "  ";
            }
            // line 31
            echo "  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 32
            echo "
</div>
";
        } else {
            // line 35
            echo "  <div class=\"pmd-ReplayContentNoResult\">

    <nav class=\"margin\">
        ";
            // line 38
            echo $this->env->getExtension('translator')->getTranslator()->trans("no_result.content", array(), "catchup");
            // line 39
            echo "    </nav>
    ";
            // line 40
            if (( !(null === (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) && (twig_length_filter($this->env, (isset($context["last_videos"]) ? $context["last_videos"] : $this->getContext($context, "last_videos"))) > 0))) {
                // line 41
                echo "    <nav class=\"paginate paginate-top margin clear-grey\">
      ";
                // line 42
                echo $this->env->getExtension('translator')->getTranslator()->trans("no_result.other_channels", array(), "catchup");
                // line 43
                echo "    </nav>


    <div class=\"pmd-ReplayContent-wrapper\">

      ";
                // line 48
                ob_start();
                // line 49
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
                    // line 50
                    echo "      ";
                    $this->loadTemplate("partials/item-replay-tv-page.twig", "controllers/replay-tv/_replays-videos.twig", 50)->display(array_merge($context, array("filter" => "index", "video" => $context["video"])));
                    // line 51
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
                // line 52
                echo "      ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 53
                echo "
    </div>

  </div>
  ";
            }
        }
        // line 59
        echo "
";
        // line 60
        if (((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) > 0)) {
            // line 61
            echo "  <nav class=\"paginate margin paginate-bottom\" style=\"clear: both;\">
    ";
            // line 62
            $this->loadTemplate("partials/paginate-replay-tv.twig", "controllers/replay-tv/_replays-videos.twig", 62)->display($context);
            // line 63
            echo "    <div class=\"right text clear-grey\">
      ";
            // line 64
            echo $this->env->getExtension('translator')->getTranslator()->trans("Page %page% / %pages%", array("%page%" => (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")), "%pages%" => (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages"))), "messages");
            // line 67
            echo "      <span class=\"bullet\">&bull;</span>
      ";
            // line 68
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{1} <strong>%count% video</strong> on demand|]1,Inf] <strong>%count% videos</strong> on demand", (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count")), array("%count%" => (isset($context["count"]) ? $context["count"] : $this->getContext($context, "count"))), "messages");
            // line 71
            echo "    </div>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/_replays-videos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 71,  205 => 68,  202 => 67,  200 => 64,  197 => 63,  195 => 62,  192 => 61,  190 => 60,  187 => 59,  179 => 53,  176 => 52,  162 => 51,  159 => 50,  141 => 49,  139 => 48,  132 => 43,  130 => 42,  127 => 41,  125 => 40,  122 => 39,  120 => 38,  115 => 35,  110 => 32,  107 => 31,  104 => 30,  90 => 29,  87 => 28,  69 => 27,  66 => 26,  64 => 25,  61 => 24,  57 => 22,  55 => 21,  52 => 20,  50 => 19,  46 => 17,  44 => 16,  41 => 15,  36 => 12,  34 => 9,  31 => 8,  29 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if pages > 0 %}*/
/*   <nav class="paginate margin paginate-top">*/
/*     {% include "partials/paginate-replay-tv.twig" %}*/
/*     <div class="right text clear-grey">*/
/*       {% trans with {'%page%': page, '%pages%': pages} %}*/
/*       Page %page% / %pages%*/
/*       {% endtrans %}*/
/*       <span class="bullet">&bull;</span>*/
/*       {% transchoice count %}*/
/*       {1} <strong>%count% video</strong> on demand|]1,Inf] <strong>%count% videos</strong> on demand*/
/*       {% endtranschoice %}*/
/*     </div>*/
/*   </nav>*/
/* {% endif %}*/
/* */
/* {% if videos is not null %}*/
/* <div class="pmd-ReplayContent-wrapper">*/
/* */
/*   {% if (display_ads == true) and (is_connected == false or (is_connected and current_account.isPremium() == false)) %}*/
/*   <div class="pmd-ReplayContent-ads">*/
/*     {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*   </div>*/
/*   {% endif %}*/
/* */
/*   {% spaceless %}*/
/*   {% if videos is not null and videos|length > 0 %}*/
/*   {% for video in videos %}*/
/*     {% include "partials/item-replay-tv-page.twig" with {"filter":"filter", "video": video} %}*/
/*   {% endfor %}*/
/*   {% endif %}*/
/*   {% endspaceless %}*/
/* */
/* </div>*/
/* {% else %}*/
/*   <div class="pmd-ReplayContentNoResult">*/
/* */
/*     <nav class="margin">*/
/*         {% trans from "catchup" %}no_result.content{% endtrans %}*/
/*     </nav>*/
/*     {% if last_videos is not null and last_videos|length > 0 %}*/
/*     <nav class="paginate paginate-top margin clear-grey">*/
/*       {% trans from "catchup" %}no_result.other_channels{% endtrans %}*/
/*     </nav>*/
/* */
/* */
/*     <div class="pmd-ReplayContent-wrapper">*/
/* */
/*       {% spaceless %}*/
/*       {% for video in last_videos %}*/
/*       {% include "partials/item-replay-tv-page.twig" with {"filter": "index", "video": video} %}*/
/*       {% endfor %}*/
/*       {% endspaceless %}*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/*   {% endif %}*/
/* {% endif %}*/
/* */
/* {% if pages > 0 %}*/
/*   <nav class="paginate margin paginate-bottom" style="clear: both;">*/
/*     {% include "partials/paginate-replay-tv.twig" %}*/
/*     <div class="right text clear-grey">*/
/*       {% trans with {'%page%': page, '%pages%': pages} %}*/
/*       Page %page% / %pages%*/
/*       {% endtrans %}*/
/*       <span class="bullet">&bull;</span>*/
/*       {% transchoice count %}*/
/*       {1} <strong>%count% video</strong> on demand|]1,Inf] <strong>%count% videos</strong> on demand*/
/*       {% endtranschoice %}*/
/*     </div>*/
/*   </nav>*/
/* {% endif %}*/
/* */
