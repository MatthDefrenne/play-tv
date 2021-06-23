<?php

/* controllers/faq/_header.twig */
class __TwigTemplate_3056cb77623a7a3a6b5ff088a8c06702882ec6351b1daded472417f44ca493ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/faq/_header.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'faq_content' => array($this, 'block_faq_content'),
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
        echo "  <div id=\"content\">
    <div class=\"container\">
      <div class=\"row\">
        <aside class=\"span3 sep\">
          ";
        // line 8
        $this->loadTemplate("controllers/aide/_menu.twig", "controllers/faq/_header.twig", 8)->display($context);
        // line 9
        echo "        </aside>

        <div class=\"span13\" id=\"background-help\">

          ";
        // line 13
        if ($this->env->getExtension('playtv_feature')->hasFeature("faq")) {
            // line 14
            echo "          <div class=\"page-title\">
            ";
            // line 15
            if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) != "index")) {
                // line 16
                echo "              <small class=\"right grey-box\"><a href=\"/faq/\">&laquo; <strong>Retour au sommaire</strong></a></small>
            ";
            }
            // line 18
            echo "            <h1>Aide. <span class=\"red\">Questions fréquentes</span></h1>
            <p class=\"sub-title\">Trouvez les réponses à toutes vos questions dans les menus de l'aide.</p>
          </div>
          ";
        }
        // line 22
        echo "
          ";
        // line 23
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) != "index")) {
            echo "<article class=\"text bigger justify\">";
        }
        // line 24
        echo "
          ";
        // line 25
        $this->displayBlock('faq_content', $context, $blocks);
        // line 26
        echo "
          ";
        // line 27
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) != "index")) {
            echo "</article>";
        }
        // line 28
        echo "
        </div>
      </div>
    </div>
  </div>
";
    }

    // line 25
    public function block_faq_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "controllers/faq/_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 25,  82 => 28,  78 => 27,  75 => 26,  73 => 25,  70 => 24,  66 => 23,  63 => 22,  57 => 18,  53 => 16,  51 => 15,  48 => 14,  46 => 13,  40 => 9,  38 => 8,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/*       <div class="row">*/
/*         <aside class="span3 sep">*/
/*           {% include "controllers/aide/_menu.twig" %}*/
/*         </aside>*/
/* */
/*         <div class="span13" id="background-help">*/
/* */
/*           {% if has_feature('faq') %}*/
/*           <div class="page-title">*/
/*             {% if action_name != 'index' %}*/
/*               <small class="right grey-box"><a href="/faq/">&laquo; <strong>Retour au sommaire</strong></a></small>*/
/*             {% endif %}*/
/*             <h1>Aide. <span class="red">Questions fréquentes</span></h1>*/
/*             <p class="sub-title">Trouvez les réponses à toutes vos questions dans les menus de l'aide.</p>*/
/*           </div>*/
/*           {% endif %}*/
/* */
/*           {% if action_name != 'index' %}<article class="text bigger justify">{% endif %}*/
/* */
/*           {% block faq_content %}{% endblock faq_content %}*/
/* */
/*           {% if action_name != 'index' %}</article>{% endif %}*/
/* */
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endblock content %}*/
/* */
