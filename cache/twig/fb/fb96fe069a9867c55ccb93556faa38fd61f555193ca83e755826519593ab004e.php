<?php

/* controllers/widgets/thumbnails.twig */
class __TwigTemplate_7bf187cbced31dfb12dcd47981b48963d81f4ee6053ab54b6091554ce57ccf29 extends Twig_Template
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
        // line 2
        $context["slider_classes"] = array(0 => "pmd-HomepageThumbnailsSlider");
        // line 3
        $context["data_attributes"] = array("size" => "small", "type" => "play", "trailer_button" => "false", "progress" => "false", "channel_logo" => "true", "preview_animation" => "true");
        // line 12
        echo "
";
        // line 14
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "broadcasts-live")) {
            // line 15
            echo "
  ";
            // line 16
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsBroadcastsLiveSlider"));
            // line 17
            echo "
  ";
            // line 18
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("progress" => "true"));
            // line 22
            echo "
";
        }
        // line 24
        echo "
";
        // line 25
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "broadcasts-tonight")) {
            // line 26
            echo "
  ";
            // line 27
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsBroadcastsTonightSlider"));
            // line 28
            echo "
  ";
            // line 29
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("trailer_button" => "true"));
            // line 33
            echo "
";
        }
        // line 35
        echo "
";
        // line 36
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "replays-news")) {
            // line 37
            echo "
  ";
            // line 38
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsReplaysNewsSlider"));
            // line 39
            echo "
  ";
            // line 40
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("type" => "replay", "duration" => "true"));
            // line 45
            echo "
";
        }
        // line 47
        echo "
";
        // line 48
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "replays-last")) {
            // line 49
            echo "
  ";
            // line 50
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsReplaysLastSlider"));
            // line 51
            echo "
  ";
            // line 52
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("type" => "replay", "duration" => "true"));
            // line 57
            echo "
";
        }
        // line 59
        echo "
";
        // line 60
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "channels-arabic")) {
            // line 61
            echo "
  ";
            // line 62
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsChannelsArabicSlider"));
            // line 63
            echo "
  ";
            // line 64
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("duration" => "false"));
            // line 68
            echo "
";
        }
        // line 70
        echo "
";
        // line 71
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "channels-news")) {
            // line 72
            echo "
  ";
            // line 73
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsChannelsNewsSlider"));
            // line 74
            echo "
  ";
            // line 75
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("duration" => "false"));
            // line 79
            echo "
";
        }
        // line 81
        echo "
";
        // line 82
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "channels-thematic")) {
            // line 83
            echo "
  ";
            // line 84
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsChannelsThematicSlider"));
            // line 85
            echo "
  ";
            // line 86
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("duration" => "false"));
            // line 90
            echo "
";
        }
        // line 92
        echo "
";
        // line 93
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "channels-local")) {
            // line 94
            echo "
  ";
            // line 95
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsChannelsLocalSlider"));
            // line 96
            echo "
  ";
            // line 97
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("duration" => "false"));
            // line 101
            echo "
";
        }
        // line 103
        echo "
";
        // line 104
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "channels-community")) {
            // line 105
            echo "
  ";
            // line 106
            $context["slider_classes"] = twig_array_merge((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), array(0 => "pmd-js-HomepageThumbnailsChannelsCommunitySlider"));
            // line 107
            echo "
  ";
            // line 108
            $context["data_attributes"] = twig_array_merge((isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")), array("duration" => "false"));
            // line 112
            echo "
";
        }
        // line 114
        echo "
";
        // line 115
        $context["slider_classes"] = twig_join_filter((isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), " ");
        // line 116
        echo "
";
        // line 118
        if ((isset($context["thumbnails"]) ? $context["thumbnails"] : $this->getContext($context, "thumbnails"))) {
            // line 119
            echo "<div class=\"pmd-HomepageThumbnails\" data-mode=\"";
            echo twig_escape_filter($this->env, (isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "html", null, true);
            echo "\">

  <h2 class=\"pmd-HomepageThumbnailsTitle\">
    ";
            // line 122
            if ($this->getAttribute((isset($context["title"]) ? $context["title"] : null), "url", array(), "any", true, true)) {
                // line 123
                echo "      <a class=\"pmd-HomepageThumbnailsTitle-link\" href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "url", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "label", array()), "html", null, true);
                echo "</a>
    ";
            } else {
                // line 125
                echo "      <span class=\"pmd-HomepageThumbnailsTitle-link\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "label", array()), "html", null, true);
                echo "</span>
    ";
            }
            // line 127
            echo "  </h2>

  <div class=\"pmd-HomepageThumbnailsSlider ";
            // line 129
            echo twig_escape_filter($this->env, (isset($context["slider_classes"]) ? $context["slider_classes"] : $this->getContext($context, "slider_classes")), "html", null, true);
            echo "\" data-mode=\"";
            echo twig_escape_filter($this->env, (isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), "html", null, true);
            echo "\" data-ads-enabled=\"";
            echo (((isset($context["ads_enabled"]) ? $context["ads_enabled"] : $this->getContext($context, "ads_enabled"))) ? ("true") : ("false"));
            echo "\" >

    <div class=\"pmd-HomepageThumbnailsSlider-viewport\">
      <div class=\"pmd-HomepageThumbnailsSlider-itself pmd-js-HomepageThumbnailsSlider-itself\">
        ";
            // line 133
            ob_start();
            // line 134
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["thumbnails"]) ? $context["thumbnails"] : $this->getContext($context, "thumbnails")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["thumbnail"]) {
                // line 135
                echo "        <div class=\"pmd-HomepageThumbnailsSlider-item pmd-js-HomepageThumbnailsSlider-item\">
        ";
                // line 136
                $this->loadTemplate((("controllers/widgets/thumbnails-" . (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type"))) . ".twig"), "controllers/widgets/thumbnails.twig", 136)->display(array_merge($context, array("loop_index" => $this->getAttribute(                // line 137
$context["loop"], "index", array()), "data_attributes" =>                 // line 138
(isset($context["data_attributes"]) ? $context["data_attributes"] : $this->getContext($context, "data_attributes")))));
                // line 141
                echo "        </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['thumbnail'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 143
            echo "        ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 144
            echo "      </div>
    </div>

  </div>

</div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/thumbnails.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  287 => 144,  284 => 143,  269 => 141,  267 => 138,  266 => 137,  265 => 136,  262 => 135,  244 => 134,  242 => 133,  231 => 129,  227 => 127,  221 => 125,  213 => 123,  211 => 122,  204 => 119,  202 => 118,  199 => 116,  197 => 115,  194 => 114,  190 => 112,  188 => 108,  185 => 107,  183 => 106,  180 => 105,  178 => 104,  175 => 103,  171 => 101,  169 => 97,  166 => 96,  164 => 95,  161 => 94,  159 => 93,  156 => 92,  152 => 90,  150 => 86,  147 => 85,  145 => 84,  142 => 83,  140 => 82,  137 => 81,  133 => 79,  131 => 75,  128 => 74,  126 => 73,  123 => 72,  121 => 71,  118 => 70,  114 => 68,  112 => 64,  109 => 63,  107 => 62,  104 => 61,  102 => 60,  99 => 59,  95 => 57,  93 => 52,  90 => 51,  88 => 50,  85 => 49,  83 => 48,  80 => 47,  76 => 45,  74 => 40,  71 => 39,  69 => 38,  66 => 37,  64 => 36,  61 => 35,  57 => 33,  55 => 29,  52 => 28,  50 => 27,  47 => 26,  45 => 25,  42 => 24,  38 => 22,  36 => 18,  33 => 17,  31 => 16,  28 => 15,  26 => 14,  23 => 12,  21 => 3,  19 => 2,);
    }
}
/* {# base #}*/
/* {% set slider_classes = ['pmd-HomepageThumbnailsSlider'] %}*/
/* {% set data_attributes = {*/
/*     'size': 'small',*/
/*     'type': 'play',*/
/*     'trailer_button': 'false',*/
/*     'progress': 'false',*/
/*     'channel_logo': 'true',*/
/*     'preview_animation': 'true'*/
/*   }*/
/* %}*/
/* */
/* {# contexts #}*/
/* {% if context == 'broadcasts-live' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsBroadcastsLiveSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'progress': 'true'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'broadcasts-tonight' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsBroadcastsTonightSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'trailer_button': 'true'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'replays-news' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsReplaysNewsSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'type': 'replay',*/
/*       'duration': 'true'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'replays-last' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsReplaysLastSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'type': 'replay',*/
/*       'duration': 'true'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'channels-arabic' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsChannelsArabicSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'duration': 'false'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'channels-news' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsChannelsNewsSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'duration': 'false'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'channels-thematic' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsChannelsThematicSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'duration': 'false'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'channels-local' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsChannelsLocalSlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'duration': 'false'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% if context == 'channels-community' %}*/
/* */
/*   {% set slider_classes = slider_classes|merge(['pmd-js-HomepageThumbnailsChannelsCommunitySlider']) %}*/
/* */
/*   {% set data_attributes = data_attributes|merge({*/
/*       'duration': 'false'*/
/*     })*/
/*   %}*/
/* */
/* {% endif %}*/
/* */
/* {% set slider_classes = slider_classes|join(' ') %}*/
/* */
/* {# template #}*/
/* {% if thumbnails %}*/
/* <div class="pmd-HomepageThumbnails" data-mode="{{ context }}">*/
/* */
/*   <h2 class="pmd-HomepageThumbnailsTitle">*/
/*     {% if title.url is defined %}*/
/*       <a class="pmd-HomepageThumbnailsTitle-link" href="{{ title.url }}">{{ title.label }}</a>*/
/*     {% else %}*/
/*       <span class="pmd-HomepageThumbnailsTitle-link">{{ title.label }}</span>*/
/*     {% endif %}*/
/*   </h2>*/
/* */
/*   <div class="pmd-HomepageThumbnailsSlider {{ slider_classes }}" data-mode="{{ context }}" data-ads-enabled="{{ ads_enabled ? 'true' : 'false' }}" >*/
/* */
/*     <div class="pmd-HomepageThumbnailsSlider-viewport">*/
/*       <div class="pmd-HomepageThumbnailsSlider-itself pmd-js-HomepageThumbnailsSlider-itself">*/
/*         {% spaceless %}*/
/*         {% for thumbnail in thumbnails %}*/
/*         <div class="pmd-HomepageThumbnailsSlider-item pmd-js-HomepageThumbnailsSlider-item">*/
/*         {% include 'controllers/widgets/thumbnails-' ~ type ~ '.twig' with {*/
/*             'loop_index': loop.index,*/
/*             'data_attributes': data_attributes*/
/*           }*/
/*         %}*/
/*         </div>*/
/*         {% endfor %}*/
/*         {% endspaceless %}*/
/*       </div>*/
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* {% endif %}*/
/* */
