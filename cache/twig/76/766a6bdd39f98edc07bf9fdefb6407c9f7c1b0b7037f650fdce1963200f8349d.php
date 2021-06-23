<?php

/* controllers/widgets/mosaic_mobile.twig */
class __TwigTemplate_985dbc568fcc7621e9c22050d2eba85ca8291dc0037141b9d8173738aa022da1 extends Twig_Template
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
        if (((isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "homepage")) {
            // line 2
            echo "
";
        } elseif ((        // line 3
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "social_tv")) {
            // line 4
            echo "
";
        } elseif ((        // line 5
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")) == "replay_tv_page")) {
            // line 6
            echo "
";
            // line 7
            ob_start();
            // line 8
            echo "<div class=\"pmd-MosaicChannels pmd-ReplayTvContentMosaicChannels\">
  <ul class=\"pmd-js-ReplayTvCarrousel pmd-MosaicChannels-container pmd-ReplayTvContentMosaicChannels-container\">
  ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                // line 11
                echo "    ";
                $this->loadTemplate("partials/item-mosaic-channel.twig", "controllers/widgets/mosaic_mobile.twig", 11)->display(array_merge($context, array("link_route_name" => "replay_channel_videos", "channel" =>                 // line 14
$context["channel_item"], "image_size" => "small", "classes" => array(0 => "pmd-js-ReplayTvCarrousel-cell"))));
                // line 18
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "  </ul>
</div>
";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 22
            echo "
";
        } elseif (twig_in_filter(        // line 23
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), array(0 => "live", 1 => "replay_tv"))) {
            // line 24
            echo "
  ";
            // line 25
            ob_start();
            // line 26
            echo "  <div class=\"pmd-Remote\">
    <div class=\"pmd-MosaicChannels\">
      <ul class=\"pmd-MosaicChannels-container\">
      ";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                // line 30
                echo "        ";
                $this->loadTemplate("partials/item-mosaic-channel.twig", "controllers/widgets/mosaic_mobile.twig", 30)->display(array_merge($context, array("channel" => $context["channel_item"], "image_size" => "small")));
                // line 31
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "      </ul>
    </div>
  </div>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 36
            echo "
";
        } elseif (twig_in_filter(        // line 37
(isset($context["context"]) ? $context["context"] : $this->getContext($context, "context")), array(0 => "categories", 1 => "themes"))) {
            // line 38
            echo "
  ";
            // line 39
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
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
            foreach ($context['_seq'] as $context["key"] => $context["channel_items"]) {
                // line 40
                echo "    <h3 class=\"margin\">";
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "</h3>
    ";
                // line 41
                ob_start();
                // line 42
                echo "    <div class=\"pmd-Remote\">
      <div class=\"pmd-MosaicChannels\">
        <ul class=\"pmd-MosaicChannels-container\">
        ";
                // line 45
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["channel_items"]);
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
                foreach ($context['_seq'] as $context["_key"] => $context["channel_item"]) {
                    // line 46
                    echo "          ";
                    $this->loadTemplate("partials/item-mosaic-channel.twig", "controllers/widgets/mosaic_mobile.twig", 46)->display(array_merge($context, array("channel" => $context["channel_item"], "image_size" => "small")));
                    // line 47
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel_item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 48
                echo "        </ul>
      </div>
    </div>
    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 52
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
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['channel_items'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "
";
        } else {
            // line 55
            echo "
    ";
            // line 56
            ob_start();
            // line 57
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["channels"]) ? $context["channels"] : $this->getContext($context, "channels")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
                // line 58
                echo "      ";
                $this->loadTemplate("partials/item-mosaic-channel.twig", "controllers/widgets/mosaic_mobile.twig", 58)->display(array_merge($context, array("channel" => $context["channel"], "image_size" => "small")));
                // line 59
                echo "    ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 61
            echo "
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/mosaic_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  273 => 61,  270 => 60,  256 => 59,  253 => 58,  235 => 57,  233 => 56,  230 => 55,  226 => 53,  212 => 52,  206 => 48,  192 => 47,  189 => 46,  172 => 45,  167 => 42,  165 => 41,  160 => 40,  143 => 39,  140 => 38,  138 => 37,  135 => 36,  129 => 32,  115 => 31,  112 => 30,  95 => 29,  90 => 26,  88 => 25,  85 => 24,  83 => 23,  80 => 22,  75 => 19,  61 => 18,  59 => 14,  57 => 11,  40 => 10,  36 => 8,  34 => 7,  31 => 6,  29 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if context == 'homepage' %}*/
/* */
/* {% elseif context == 'social_tv' %}*/
/* */
/* {% elseif context == 'replay_tv_page' %}*/
/* */
/* {% spaceless %}*/
/* <div class="pmd-MosaicChannels pmd-ReplayTvContentMosaicChannels">*/
/*   <ul class="pmd-js-ReplayTvCarrousel pmd-MosaicChannels-container pmd-ReplayTvContentMosaicChannels-container">*/
/*   {% for channel_item in channels %}*/
/*     {% include "partials/item-mosaic-channel.twig"*/
/*       with {*/
/*         "link_route_name": "replay_channel_videos",*/
/*         "channel": channel_item,*/
/*         "image_size": "small",*/
/*         "classes": ['pmd-js-ReplayTvCarrousel-cell']*/
/*       } %}*/
/*   {% endfor %}*/
/*   </ul>*/
/* </div>*/
/* {% endspaceless %}*/
/* */
/* {% elseif context in ['live', 'replay_tv'] %}*/
/* */
/*   {% spaceless %}*/
/*   <div class="pmd-Remote">*/
/*     <div class="pmd-MosaicChannels">*/
/*       <ul class="pmd-MosaicChannels-container">*/
/*       {% for channel_item in channels %}*/
/*         {% include "partials/item-mosaic-channel.twig" with {"channel": channel_item, image_size: "small"} %}*/
/*       {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*   </div>*/
/*   {% endspaceless %}*/
/* */
/* {% elseif context in ['categories', 'themes'] %}*/
/* */
/*   {% for key, channel_items in channels %}*/
/*     <h3 class="margin">{{ key }}</h3>*/
/*     {% spaceless %}*/
/*     <div class="pmd-Remote">*/
/*       <div class="pmd-MosaicChannels">*/
/*         <ul class="pmd-MosaicChannels-container">*/
/*         {% for channel_item in channel_items %}*/
/*           {% include "partials/item-mosaic-channel.twig" with {"channel": channel_item, image_size: "small"} %}*/
/*         {% endfor %}*/
/*         </ul>*/
/*       </div>*/
/*     </div>*/
/*     {% endspaceless %}*/
/*   {% endfor %}*/
/* */
/* {% else %}*/
/* */
/*     {% spaceless %}*/
/*     {% for channel in channels %}*/
/*       {% include "partials/item-mosaic-channel.twig" with {"channel": channel, image_size: "small"} %}*/
/*     {% endfor %}*/
/*     {% endspaceless %}*/
/* */
/* {% endif %}*/
/* */
