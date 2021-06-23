<?php

/* controllers/player/_external-live.twig */
class __TwigTemplate_c5822b28e939e79a4f3840c214c3787a3399672fbf85640d128550da517894bd extends Twig_Template
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
        if ( !array_key_exists("site", $context)) {
            // line 2
            echo "  ";
            $context["site"] = null;
        }
        // line 4
        echo "
";
        // line 5
        if (((isset($context["display_ads_ga"]) ? $context["display_ads_ga"] : $this->getContext($context, "display_ads_ga")) != true)) {
            // line 6
            echo "<div class=\"pmd-HandleChannel-subtitle\">
  ";
            // line 7
            if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                // line 8
                echo "  <span>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("external_live_radio.meanwhile", array(), "player");
                echo "</span>
  ";
            } else {
                // line 10
                echo "  <span>";
                echo $this->env->getExtension('translator')->getTranslator()->trans("external_live.meanwhile", array(), "player");
                echo "</span>
  ";
            }
            // line 12
            echo "</div>
";
        }
        // line 14
        echo "
<button
  type=\"button\"
  data-alias=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
        echo "\"
  ";
        // line 18
        if ((isset($context["site"]) ? $context["site"] : $this->getContext($context, "site"))) {
            echo "data-site=\"";
            echo twig_escape_filter($this->env, (isset($context["site"]) ? $context["site"] : $this->getContext($context, "site")), "html", null, true);
            echo "\"";
        }
        // line 19
        echo "  class=\"pmd-js-ExternalLive r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt ";
        if (((isset($context["display_ads_ga"]) ? $context["display_ads_ga"] : $this->getContext($context, "display_ads_ga")) != true)) {
            echo "pmd-HandleChannel-button";
        }
        echo "\"
>
  ";
        // line 21
        if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
            // line 22
            echo "  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("external_live_radio.go_channel_website", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "player");
            // line 23
            echo "  ";
        } else {
            // line 24
            echo "  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("external_live.go_channel_website", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "player");
            // line 25
            echo "  ";
        }
        // line 26
        echo "</button>

";
        // line 28
        if (((isset($context["flag"]) ? $context["flag"] : $this->getContext($context, "flag")) != "zapping")) {
            // line 29
            echo "<script src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["assets"]) ? $context["assets"] : $this->getContext($context, "assets")), "scripts", array()), "page-player-external-live.js", array(), "array"), "html", null, true);
            echo "\"></script>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/player/_external-live.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 29,  92 => 28,  88 => 26,  85 => 25,  82 => 24,  79 => 23,  76 => 22,  74 => 21,  66 => 19,  60 => 18,  56 => 17,  51 => 14,  47 => 12,  41 => 10,  35 => 8,  33 => 7,  30 => 6,  28 => 5,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if site is not defined %}*/
/*   {% set site = null %}*/
/* {% endif %}*/
/* */
/* {% if display_ads_ga != true %}*/
/* <div class="pmd-HandleChannel-subtitle">*/
/*   {% if channel.is_radio %}*/
/*   <span>{% trans from "player" %}external_live_radio.meanwhile{% endtrans %}</span>*/
/*   {% else %}*/
/*   <span>{% trans from "player" %}external_live.meanwhile{% endtrans %}</span>*/
/*   {% endif %}*/
/* </div>*/
/* {% endif %}*/
/* */
/* <button*/
/*   type="button"*/
/*   data-alias="{{ channel.alias }}"*/
/*   {% if site %}data-site="{{ site }}"{% endif %}*/
/*   class="pmd-js-ExternalLive r-ResetButton pmd-Button pmd-Button--premium pmd-Button--lg pmd-PromoteRetailChannel-button pmd-Button--boldAlt {% if display_ads_ga != true %}pmd-HandleChannel-button{% endif %}"*/
/* >*/
/*   {% if channel.is_radio %}*/
/*   {% trans with {'%channel%': channel.name} from "player" %}external_live_radio.go_channel_website{% endtrans %}*/
/*   {% else %}*/
/*   {% trans with {'%channel%': channel.name} from "player" %}external_live.go_channel_website{% endtrans %}*/
/*   {% endif %}*/
/* </button>*/
/* */
/* {% if flag != 'zapping' %}*/
/* <script src="{{ assets.scripts['page-player-external-live.js'] }}"></script>*/
/* {% endif %}*/
/* */
