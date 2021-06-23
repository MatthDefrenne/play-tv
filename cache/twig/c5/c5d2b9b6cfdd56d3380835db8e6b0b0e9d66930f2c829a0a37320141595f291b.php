<?php

/* controllers/widgets/block-next-programs-by-channel.twig */
class __TwigTemplate_014672b158ad4f2978a923cf8274c1bacaed9fdfa5c33bb5c246d57df8e1d870 extends Twig_Template
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
        // line 5
        echo "<div id=\"following-programs\" style=\"display: none;\">
  <div class=\"row\">
    <div class=\"span-page\">
      <div id=\"programs-next\">
";
        // line 9
        if ( !twig_test_empty((isset($context["next_programs"]) ? $context["next_programs"] : $this->getContext($context, "next_programs")))) {
            // line 10
            echo "
  ";
            // line 11
            if (array_key_exists("channel", $context)) {
                // line 12
                echo "    <div class=\"text xmargin\">
      <p class=\"clear-grey\">
        ";
                // line 14
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                    // line 15
                    echo "        ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Next to listen live on <strong>%channel%</strong>.", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                    // line 18
                    echo "        ";
                } else {
                    // line 19
                    echo "        ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Next <strong>TV programs</strong> to watch live on <strong>%channel%</strong>.", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                    // line 22
                    echo "        ";
                }
                // line 23
                echo "      </p>
    </div>
  ";
            }
            // line 26
            echo "
  ";
            // line 27
            $this->loadTemplate("controllers/widgets/broadcasts.twig", "controllers/widgets/block-next-programs-by-channel.twig", 27)->display(array_merge($context, array("broadcasts" => (isset($context["next_programs"]) ? $context["next_programs"] : $this->getContext($context, "next_programs")))));
            // line 28
            echo "
";
        } else {
            // line 30
            echo "
  <div id=\"background-error\">
    ";
            // line 32
            if (array_key_exists("channel", $context)) {
                // line 33
                echo "      <div class=\"text margin\">
        <p class=\"clear-grey\">
          ";
                // line 35
                if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                    // line 36
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Next to listen live on <strong>%channel%</strong>.", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                    // line 39
                    echo "          ";
                } else {
                    // line 40
                    echo "          ";
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Next <strong>TV programs</strong> to watch live on <strong>%channel%</strong>.", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
                    // line 43
                    echo "          ";
                }
                // line 44
                echo "        </p>
      </div>
    ";
            }
            // line 47
            echo "    <div class=\"text\">
      <p>
        ";
            // line 49
            if ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "is_radio", array())) {
                // line 50
                echo "        ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("<strong class=\"red\">No information</strong> about online radio.", array(), "messages");
                // line 53
                echo "        ";
            } else {
                // line 54
                echo "        ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("<strong class=\"red\">No information</strong> about this channel's TV programs.", array(), "messages");
                // line 57
                echo "        ";
            }
            // line 58
            echo "      </p>
    </div>
  </div>

";
        }
        // line 63
        echo "      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/block-next-programs-by-channel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 63,  111 => 58,  108 => 57,  105 => 54,  102 => 53,  99 => 50,  97 => 49,  93 => 47,  88 => 44,  85 => 43,  82 => 40,  79 => 39,  76 => 36,  74 => 35,  70 => 33,  68 => 32,  64 => 30,  60 => 28,  58 => 27,  55 => 26,  50 => 23,  47 => 22,  44 => 19,  41 => 18,  38 => 15,  36 => 14,  32 => 12,  30 => 11,  27 => 10,  25 => 9,  19 => 5,);
    }
}
/* {#*/
/*     @container: #programs-next*/
/*     @data: $channel, $next_programs*/
/* #}*/
/* <div id="following-programs" style="display: none;">*/
/*   <div class="row">*/
/*     <div class="span-page">*/
/*       <div id="programs-next">*/
/* {% if next_programs is not empty %}*/
/* */
/*   {% if channel is defined %}*/
/*     <div class="text xmargin">*/
/*       <p class="clear-grey">*/
/*         {% if channel.is_radio %}*/
/*         {% trans with {'%channel%': channel.name} %}*/
/*         Next to listen live on <strong>%channel%</strong>.*/
/*         {% endtrans %}*/
/*         {% else %}*/
/*         {% trans with {'%channel%': channel.name} %}*/
/*         Next <strong>TV programs</strong> to watch live on <strong>%channel%</strong>.*/
/*         {% endtrans %}*/
/*         {% endif %}*/
/*       </p>*/
/*     </div>*/
/*   {% endif %}*/
/* */
/*   {% include "controllers/widgets/broadcasts.twig" with {broadcasts: next_programs} %}*/
/* */
/* {% else %}*/
/* */
/*   <div id="background-error">*/
/*     {% if channel is defined %}*/
/*       <div class="text margin">*/
/*         <p class="clear-grey">*/
/*           {% if channel.is_radio %}*/
/*           {% trans with {'%channel%': channel.name} %}*/
/*           Next to listen live on <strong>%channel%</strong>.*/
/*           {% endtrans %}*/
/*           {% else %}*/
/*           {% trans with {'%channel%': channel.name} %}*/
/*           Next <strong>TV programs</strong> to watch live on <strong>%channel%</strong>.*/
/*           {% endtrans %}*/
/*           {% endif %}*/
/*         </p>*/
/*       </div>*/
/*     {% endif %}*/
/*     <div class="text">*/
/*       <p>*/
/*         {% if channel.is_radio %}*/
/*         {% trans %}*/
/*         <strong class="red">No information</strong> about online radio.*/
/*         {% endtrans %}*/
/*         {% else %}*/
/*         {% trans %}*/
/*         <strong class="red">No information</strong> about this channel's TV programs.*/
/*         {% endtrans %}*/
/*         {% endif%}*/
/*       </p>*/
/*     </div>*/
/*   </div>*/
/* */
/* {% endif %}*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* */
