<?php

/* controllers/programmes-tv/ce-soir.twig */
class __TwigTemplate_708d0ab0d7c217cb6b9b90e99707652fade29479cc38c00923a6ca27e77523fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/programmes-tv/ce-soir.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/full.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/programmes-tv/ce-soir.twig", 4)->display(array_merge($context, array("subnav_active" => "prime-time")));
        // line 5
        echo "
<div id=\"content\">
  <div class=\"container\">

      <div class=\"row\">

        <div class=\"span16\">
          <div class=\"section-title\">
            <p class=\"right clear-grey\">";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV programs guide", array(), "messages");
        echo "</p>
            <h1>
              <strong>
                <a href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()), "html", null, true);
        echo "\">
                ";
        // line 17
        if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")))) {
            // line 18
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Tonight on TV", array(), "messages");
            // line 19
            echo "                ";
        } else {
            // line 20
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("TV evening of %date%", array("%date%" => twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))))), "messages");
            // line 23
            echo "                ";
        }
        // line 24
        echo "                </a>
              </strong>
              ";
        // line 26
        if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
            echo " (bouquet <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "network", array()), "html", null, true);
            echo "</strong>)";
        }
        // line 27
        echo "            </h1>
          </div>
          <div id=\"programs-title-bar\">
            <div class=\"right\">
              ";
        // line 31
        $this->loadTemplate("controllers/programmes-tv/_filters.twig", "controllers/programmes-tv/ce-soir.twig", 31)->display($context);
        // line 32
        echo "            </div>
          </div>
        </div>

        <div class=\"span16\">
          ";
        // line 37
        echo (isset($context["broadcasts_presets"]) ? $context["broadcasts_presets"] : $this->getContext($context, "broadcasts_presets"));
        echo "
        </div>

      </div>

  </div>
</div> <!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/ce-soir.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 37,  85 => 32,  83 => 31,  77 => 27,  71 => 26,  67 => 24,  64 => 23,  61 => 20,  58 => 19,  55 => 18,  53 => 17,  49 => 16,  43 => 13,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" with {"subnav_active": "prime-time"} %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*       <div class="row">*/
/* */
/*         <div class="span16">*/
/*           <div class="section-title">*/
/*             <p class="right clear-grey">{% trans %}TV programs guide{% endtrans %}</p>*/
/*             <h1>*/
/*               <strong>*/
/*                 <a href="{{ request.uri }}">*/
/*                 {% if selected_date == now_date %}*/
/*                   {% trans %}Tonight on TV{% endtrans %}*/
/*                 {% else %}*/
/*                   {% trans with {'%date%': selected_date|localizeddate('full', 'none', locale)|capitalize} %}*/
/*                   TV evening of %date%*/
/*                   {% endtrans %}*/
/*                 {% endif %}*/
/*                 </a>*/
/*               </strong>*/
/*               {% if selected_network is not null %} (bouquet <strong>{{ selected_network.network }}</strong>){% endif %}*/
/*             </h1>*/
/*           </div>*/
/*           <div id="programs-title-bar">*/
/*             <div class="right">*/
/*               {% include "controllers/programmes-tv/_filters.twig" %}*/
/*             </div>*/
/*           </div>*/
/*         </div>*/
/* */
/*         <div class="span16">*/
/*           {{ broadcasts_presets|raw }}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*   </div>*/
/* </div> <!-- /#content -->*/
/* {% endblock %}*/
/* */
