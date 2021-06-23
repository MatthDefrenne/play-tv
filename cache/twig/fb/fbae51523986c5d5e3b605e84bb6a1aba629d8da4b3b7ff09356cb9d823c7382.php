<?php

/* partials/share.twig */
class __TwigTemplate_71c027bc77316a519f64933790daad7bd69fbd2960df6dbd8165bba5ea263872 extends Twig_Template
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
        echo "<div id=\"sharing\" class=\"right\">
  ";
        // line 2
        ob_start();
        // line 3
        echo "  <a title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Share on %network%", array("%network%" => "Facebook"), "messages");
        echo "\" class=\"share-facebook\" rel=\"nofollow\"><span></span></a>
  <a title=\"";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Share on %network%", array("%network%" => "Twitter"), "messages");
        echo "\" class=\"share-twitter\" rel=\"nofollow\"><span></span></a>
  <a title=\"";
        // line 5
        echo $this->env->getExtension('translator')->getTranslator()->trans("Share on %network%", array("%network%" => "Google+"), "messages");
        echo "\" class=\"share-googleplus\" rel=\"nofollow\"><span></span></a>
  <a title=\"";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Share via e-mail", array(), "messages");
        echo "\" class=\"share-mail\" rel=\"nofollow\"><span></span></a>
  ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 8
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "partials/share.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 8,  37 => 6,  33 => 5,  29 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div id="sharing" class="right">*/
/*   {% spaceless %}*/
/*   <a title="{% trans with {'%network%': 'Facebook'} %}Share on %network%{% endtrans %}" class="share-facebook" rel="nofollow"><span></span></a>*/
/*   <a title="{% trans with {'%network%': 'Twitter'} %}Share on %network%{% endtrans %}" class="share-twitter" rel="nofollow"><span></span></a>*/
/*   <a title="{% trans with {'%network%': 'Google+'} %}Share on %network%{% endtrans %}" class="share-googleplus" rel="nofollow"><span></span></a>*/
/*   <a title="{% trans %}Share via e-mail{% endtrans %}" class="share-mail" rel="nofollow"><span></span></a>*/
/*   {% endspaceless %}*/
/* </div>*/
/* */
