<?php

/* controllers/player/embed.twig */
class __TwigTemplate_94ac24687ea3cf0682b25f964fd68b5d6f3c90e41073ebb23da8aa0377956a89 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/player.twig", "controllers/player/embed.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/player.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        $context["display_ads_ga"] = (((((isset($context["device"]) ? $context["device"] : $this->getContext($context, "device")) != "mobile") && twig_in_filter(        // line 6
(isset($context["state"]) ? $context["state"] : $this->getContext($context, "state")), array(0 => "external-live", 1 => "not-streamable"))) && (        // line 7
(isset($context["display_ads"]) ? $context["display_ads"] : $this->getContext($context, "display_ads")) == true)) && ((        // line 8
(isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) == false) || ((isset($context["is_connected"]) ? $context["is_connected"] : $this->getContext($context, "is_connected")) && ($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array(), "method") == false))));
        // line 10
        echo "
  ";
        // line 11
        if (twig_in_filter((isset($context["state"]) ? $context["state"] : $this->getContext($context, "state")), array(0 => "streamable", 1 => "external-iframe", 2 => "not-found"))) {
            // line 12
            echo "    ";
            $this->loadTemplate((("controllers/player/_" . (isset($context["state"]) ? $context["state"] : $this->getContext($context, "state"))) . ".twig"), "controllers/player/embed.twig", 12)->display($context);
            // line 13
            echo "  ";
        } else {
            // line 14
            echo "  <div class=\"pmd-HandleChannel\">

    ";
            // line 16
            if (((isset($context["display_ads_ga"]) ? $context["display_ads_ga"] : $this->getContext($context, "display_ads_ga")) == true)) {
                // line 17
                echo "    <div class=\"pmd-HandleChannel-ads-ga\">
      ";
                // line 18
                $this->loadTemplate("partials/ads-ga-player.twig", "controllers/player/embed.twig", 18)->display($context);
                // line 19
                echo "    </div>
    ";
            } else {
                // line 21
                echo "    <img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "medium", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
                echo "\" width=\"80px\" height=\"80px\" class=\"pmd-HandleChannel-image\">

    <div class=\"pmd-HandleChannel-title\">
      <span>
        ";
                // line 25
                if (((isset($context["state"]) ? $context["state"] : $this->getContext($context, "state")) == "not-subscribed")) {
                    // line 26
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("watch_var_channel", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "player");
                    // line 27
                    echo "        ";
                } elseif (((isset($context["state"]) ? $context["state"] : $this->getContext($context, "state")) == "external-live")) {
                    // line 28
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("discover_var_channel", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "player");
                    // line 29
                    echo "        ";
                } else {
                    // line 30
                    echo "          ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
                    echo "
        ";
                }
                // line 32
                echo "        ";
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_adult", array())) {
                    // line 33
                    echo "        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--minus18 pmd-Svg--white pmd-HandleChannel-adult\">
          <use xlink:href=\"#pmd-Svg--minus18\"></use>
        </svg>
        ";
                }
                // line 37
                echo "      </span>
    </div>
    ";
            }
            // line 40
            echo "
      ";
            // line 41
            $this->loadTemplate((("controllers/player/_" . (isset($context["state"]) ? $context["state"] : $this->getContext($context, "state"))) . ".twig"), "controllers/player/embed.twig", 41)->display($context);
            // line 42
            echo "  </div>
  ";
        }
        // line 44
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/player/embed.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 44,  114 => 42,  112 => 41,  109 => 40,  104 => 37,  98 => 33,  95 => 32,  89 => 30,  86 => 29,  83 => 28,  80 => 27,  77 => 26,  75 => 25,  65 => 21,  61 => 19,  59 => 18,  56 => 17,  54 => 16,  50 => 14,  47 => 13,  44 => 12,  42 => 11,  39 => 10,  37 => 8,  36 => 7,  35 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/player.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% set display_ads_ga = (device != 'mobile') and*/
/*     (state in ['external-live', 'not-streamable']) and*/
/*     (display_ads == true) and*/
/*     (is_connected == false or (is_connected and current_account.isPremium() == false))*/
/*   %}*/
/* */
/*   {% if state in ['streamable', 'external-iframe', 'not-found'] %}*/
/*     {% include "controllers/player/_"~state~".twig" %}*/
/*   {% else %}*/
/*   <div class="pmd-HandleChannel">*/
/* */
/*     {% if display_ads_ga == true %}*/
/*     <div class="pmd-HandleChannel-ads-ga">*/
/*       {% include "partials/ads-ga-player.twig" %}*/
/*     </div>*/
/*     {% else %}*/
/*     <img src="{{ channel.images.medium }}" alt="{{ channel.name }}" width="80px" height="80px" class="pmd-HandleChannel-image">*/
/* */
/*     <div class="pmd-HandleChannel-title">*/
/*       <span>*/
/*         {% if state == 'not-subscribed' %}*/
/*           {% trans with {'%channel%': channel.name} from "player" %}watch_var_channel{% endtrans %}*/
/*         {% elseif state == 'external-live' %}*/
/*           {% trans with {'%channel%': channel.name} from "player" %}discover_var_channel{% endtrans %}*/
/*         {% else %}*/
/*           {{ channel.name }}*/
/*         {% endif %}*/
/*         {% if channel.is_adult %}*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--minus18 pmd-Svg--white pmd-HandleChannel-adult">*/
/*           <use xlink:href="#pmd-Svg--minus18"></use>*/
/*         </svg>*/
/*         {% endif %}*/
/*       </span>*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*       {% include "controllers/player/_"~state~".twig" %}*/
/*   </div>*/
/*   {% endif %}*/
/* */
/* {% endblock %}*/
/* */
