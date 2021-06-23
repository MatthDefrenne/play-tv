<?php

/* controllers/replay-tv/_embed-submenu.twig */
class __TwigTemplate_5d5315bda9ab51d95a5875d57a2264ee4609630206542225a78475b1bf5433a8 extends Twig_Template
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
        echo "<div class=\"sub-menu\">
  <div class=\"container pmd-js-ReplayTvMenu\">
    <ul>
      ";
        // line 4
        ob_start();
        // line 5
        echo "        <li class=\"pmd-js-ReplayTvMenu-tab\">
          <a href=\"#replay-information\">
            <span class=\"sub-menu_text\">";
        // line 7
        echo $this->env->getExtension('translator')->getTranslator()->trans("All the videos", array(), "messages");
        echo "</span>
          </a>
        </li>
        <li>
          <a href=\"/replay-tv/videos/";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
        echo "/\">
            <span class=\"sub-menu_text\">";
        // line 12
        echo $this->env->getExtension('translator')->getTranslator()->trans("All the videos from %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
        echo "</span>
          </a>
        </li>
        ";
        // line 15
        if ($this->env->getExtension('playtv_feature')->hasFeature("social_tv")) {
            // line 16
            echo "        <li class=\"pmd-js-ReplayTvMenu-tab\">
          <a href=\"#twitter-tweets\" title=\"";
            // line 17
            if (array_key_exists("channel", $context)) {
                echo "Live tweets sur ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
            } else {
                echo "Live tweets";
            }
            echo "\">
            <span class=\"sub-menu_text\">
            ";
            // line 19
            ob_start();
            // line 20
            echo "              <svg role=\"img\" class=\"pmd-Svg pmd-Svg--twitter pmd-TelevisionMenuTab-twitterIcon\">
                <use xlink:href=\"#pmd-Svg--twitter\"></use>
              </svg>
              ";
            // line 23
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live tweets", array(), "messages");
            // line 24
            echo "            ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 25
            echo "            </span>
          </a>
        </li>
        ";
        }
        // line 29
        echo "        <li class=\"pmd-js-ReplayTvMenu-tab\">
          <a href=\"#facebook-comments\" title=\"";
        // line 30
        if (array_key_exists("channel", $context)) {
            echo "Commentez en direct sur ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
        } else {
            echo "Commentez en direct";
        }
        echo "\">
            <span class=\"sub-menu_text\">
            ";
        // line 32
        ob_start();
        // line 33
        echo "              <svg role=\"img\" class=\"pmd-Svg pmd-Svg--facebook pmd-TelevisionMenuTab-facebookIcon\">
                <use xlink:href=\"#pmd-Svg--facebook\"></use>
              </svg>
              ";
        // line 36
        echo $this->env->getExtension('translator')->getTranslator()->trans("Live comments", array(), "messages");
        // line 37
        echo "            ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 38
        echo "            </span>
          </a>
        </li>
      ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 42
        echo "    </ul>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/_embed-submenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 42,  105 => 38,  102 => 37,  100 => 36,  95 => 33,  93 => 32,  83 => 30,  80 => 29,  74 => 25,  71 => 24,  69 => 23,  64 => 20,  62 => 19,  52 => 17,  49 => 16,  47 => 15,  41 => 12,  37 => 11,  30 => 7,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="sub-menu">*/
/*   <div class="container pmd-js-ReplayTvMenu">*/
/*     <ul>*/
/*       {% spaceless %}*/
/*         <li class="pmd-js-ReplayTvMenu-tab">*/
/*           <a href="#replay-information">*/
/*             <span class="sub-menu_text">{% trans %}All the videos{% endtrans %}</span>*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/replay-tv/videos/{{ channel.alias }}/">*/
/*             <span class="sub-menu_text">{% trans with {'%channel%': channel.name} %}All the videos from %channel%{% endtrans %}</span>*/
/*           </a>*/
/*         </li>*/
/*         {% if has_feature('social_tv') %}*/
/*         <li class="pmd-js-ReplayTvMenu-tab">*/
/*           <a href="#twitter-tweets" title="{% if channel is defined %}Live tweets sur {{ channel.name }}{% else %}Live tweets{% endif %}">*/
/*             <span class="sub-menu_text">*/
/*             {% spaceless %}*/
/*               <svg role="img" class="pmd-Svg pmd-Svg--twitter pmd-TelevisionMenuTab-twitterIcon">*/
/*                 <use xlink:href="#pmd-Svg--twitter"></use>*/
/*               </svg>*/
/*               {% trans %}Live tweets{% endtrans %}*/
/*             {% endspaceless %}*/
/*             </span>*/
/*           </a>*/
/*         </li>*/
/*         {% endif %}*/
/*         <li class="pmd-js-ReplayTvMenu-tab">*/
/*           <a href="#facebook-comments" title="{% if channel is defined %}Commentez en direct sur {{ channel.name }}{% else %}Commentez en direct{% endif %}">*/
/*             <span class="sub-menu_text">*/
/*             {% spaceless %}*/
/*               <svg role="img" class="pmd-Svg pmd-Svg--facebook pmd-TelevisionMenuTab-facebookIcon">*/
/*                 <use xlink:href="#pmd-Svg--facebook"></use>*/
/*               </svg>*/
/*               {% trans %}Live comments{% endtrans %}*/
/*             {% endspaceless %}*/
/*             </span>*/
/*           </a>*/
/*         </li>*/
/*       {% endspaceless %}*/
/*     </ul>*/
/*   </div>*/
/* </div>*/
/* */
