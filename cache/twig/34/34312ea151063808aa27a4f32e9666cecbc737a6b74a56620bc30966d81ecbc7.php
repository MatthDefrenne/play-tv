<?php

/* controllers/television/_submenu.twig */
class __TwigTemplate_cb42ab02ffe17edba4c206ef2a2a3ef8315bc5cd6c80995d0e60bab613c5acbc extends Twig_Template
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
        echo "<div class=\"sub-menu pmd-TelevisionMenu pmd-js-TelevisionMenu\" id=\"television-menu\" data-enable=\"";
        if (array_key_exists("channel", $context)) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\">
  <div class=\"container pmd-js-TelevisionMenu-container\">
    <ul>
      ";
        // line 4
        ob_start();
        // line 5
        echo "        <li id=\"live-tab\">
          <a href=\"#direct-program\" title=\"";
        // line 6
        if (array_key_exists("channel", $context)) {
            echo $this->env->getExtension('translator')->getTranslator()->trans("On air on %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
        } else {
            echo $this->env->getExtension('translator')->getTranslator()->trans("On air", array(), "messages");
        }
        echo "\">
            <span class=\"sub-menu_text\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("On now", array(), "messages");
        echo "</span>
          </a>
        </li>
        <li id=\"following-tab\">
          <a href=\"#following-programs\" title=\"";
        // line 11
        if (array_key_exists("channel", $context)) {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Next program on %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
        } else {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Next program", array(), "messages");
        }
        echo "\">
            <span class=\"sub-menu_text\">";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("Next", array(), "messages");
        echo "</span>
          </a>
        </li>
        ";
        // line 15
        if ($this->env->getExtension('playtv_feature')->hasFeature("social_tv")) {
            // line 16
            echo "        <li id=\"livetweet-tab\">
          <a href=\"#twitter-tweets\" title=\"";
            // line 17
            if (array_key_exists("channel", $context)) {
                echo $this->env->getExtension('translator')->getTranslator()->trans("Live tweets for %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
            } else {
                echo $this->env->getExtension('translator')->getTranslator()->trans("Live tweets", array(), "messages");
            }
            echo "\">
            <span class=\"sub-menu_text\">
            ";
            // line 19
            ob_start();
            // line 20
            echo "              <svg role=\"img\" class=\"pmd-Svg pmd-Svg--twitter pmd-TelevisionMenuTab-twitterIcon\">
                <use xlink:href=\"#pmd-Svg--twitter\"></use>
              </svg>";
            // line 22
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live tweets", array(), "messages");
            // line 23
            echo "            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 24
            echo "            </span>
          </a>
        </li>
        ";
        }
        // line 28
        echo "        <li id=\"facebook-tab\">
          <a href=\"#facebook-comments\" title=\"";
        // line 29
        if (array_key_exists("channel", $context)) {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live comments on %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
        } else {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live comments", array(), "messages");
        }
        echo "\">
            <span class=\"sub-menu_text\">
            ";
        // line 31
        ob_start();
        // line 32
        echo "              <svg role=\"img\" class=\"pmd-Svg pmd-Svg--facebook pmd-TelevisionMenuTab-facebookIcon\">
                <use xlink:href=\"#pmd-Svg--facebook\"></use>
              </svg>";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("Live comments", array(), "messages");
        // line 35
        echo "            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 36
        echo "            </span>
          </a>
        </li>
      ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 40
        echo "    </ul>
    ";
        // line 41
        $this->loadTemplate("partials/share.twig", "controllers/television/_submenu.twig", 41)->display($context);
        // line 42
        echo "
    <div id=\"update-loading\" class=\"pmd-js-TelevisionMenu-loader right\">
      <img src=\"";
        // line 44
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/animate/icon-loading.gif\" alt=\"Chargement...\" width=\"16\" height=\"16\">
    </div>

    <h1 id=\"tv-channel-title\" class=\"pmd-js-TelevisionMenu-channelTitle right\">
      ";
        // line 48
        if (array_key_exists("channel", $context)) {
            // line 49
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
            echo "
      ";
        }
        // line 51
        echo "    </h1>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/_submenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  148 => 51,  142 => 49,  140 => 48,  133 => 44,  129 => 42,  127 => 41,  124 => 40,  118 => 36,  115 => 35,  113 => 34,  109 => 32,  107 => 31,  98 => 29,  95 => 28,  89 => 24,  86 => 23,  84 => 22,  80 => 20,  78 => 19,  69 => 17,  66 => 16,  64 => 15,  58 => 12,  50 => 11,  43 => 7,  35 => 6,  32 => 5,  30 => 4,  19 => 1,);
    }
}
/* <div class="sub-menu pmd-TelevisionMenu pmd-js-TelevisionMenu" id="television-menu" data-enable="{% if channel is defined %}true{% else %}false{% endif %}">*/
/*   <div class="container pmd-js-TelevisionMenu-container">*/
/*     <ul>*/
/*       {% spaceless %}*/
/*         <li id="live-tab">*/
/*           <a href="#direct-program" title="{% if channel is defined %}{% trans with {'%channel%': channel.name} %}On air on %channel%{% endtrans %}{% else %}{% trans %}On air{% endtrans %}{% endif %}">*/
/*             <span class="sub-menu_text">{% trans %}On now{% endtrans %}</span>*/
/*           </a>*/
/*         </li>*/
/*         <li id="following-tab">*/
/*           <a href="#following-programs" title="{% if channel is defined %}{% trans with {'%channel%': channel.name} %}Next program on %channel%{% endtrans %}{% else %}{% trans %}Next program{% endtrans %}{% endif %}">*/
/*             <span class="sub-menu_text">{% trans %}Next{% endtrans %}</span>*/
/*           </a>*/
/*         </li>*/
/*         {% if has_feature('social_tv') %}*/
/*         <li id="livetweet-tab">*/
/*           <a href="#twitter-tweets" title="{% if channel is defined %}{% trans with {'%channel%': channel.name} %}Live tweets for %channel%{% endtrans %}{% else %}{% trans %}Live tweets{% endtrans %}{% endif %}">*/
/*             <span class="sub-menu_text">*/
/*             {% spaceless %}*/
/*               <svg role="img" class="pmd-Svg pmd-Svg--twitter pmd-TelevisionMenuTab-twitterIcon">*/
/*                 <use xlink:href="#pmd-Svg--twitter"></use>*/
/*               </svg>{% trans %}Live tweets{% endtrans %}*/
/*             {% endspaceless %}*/
/*             </span>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*         <li id="facebook-tab">*/
/*           <a href="#facebook-comments" title="{% if channel is defined %}{% trans with {'%channel%': channel.name} %}Live comments on %channel%{% endtrans %}{% else %}{% trans %}Live comments{% endtrans %}{% endif %}">*/
/*             <span class="sub-menu_text">*/
/*             {% spaceless %}*/
/*               <svg role="img" class="pmd-Svg pmd-Svg--facebook pmd-TelevisionMenuTab-facebookIcon">*/
/*                 <use xlink:href="#pmd-Svg--facebook"></use>*/
/*               </svg>{% trans %}Live comments{% endtrans %}*/
/*             {% endspaceless %}*/
/*             </span>*/
/*           </a>*/
/*         </li>*/
/*       {% endspaceless %}*/
/*     </ul>*/
/*     {% include "partials/share.twig" %}*/
/* */
/*     <div id="update-loading" class="pmd-js-TelevisionMenu-loader right">*/
/*       <img src="{{ apps_base_url }}/images/animate/icon-loading.gif" alt="Chargement..." width="16" height="16">*/
/*     </div>*/
/* */
/*     <h1 id="tv-channel-title" class="pmd-js-TelevisionMenu-channelTitle right">*/
/*       {% if channel is defined %}*/
/*         {{ channel.name }}*/
/*       {% endif %}*/
/*     </h1>*/
/*   </div>*/
/* </div>*/
/* */
