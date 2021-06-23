<?php

/* controllers/recherche/index.twig */
class __TwigTemplate_0dbe9cd272c255d98972cd59561c5c6da62d47f9e64672833177483f3f042493 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/recherche/index.twig", 1);
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
        echo "  <div id=\"content\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"span-page\">

          <div class=\"grey-box margin\">
            <div class=\"section-title\">
              <p class=\"right clear-grey\">
                ";
        // line 13
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "q", array(), "any", true, true)) {
            // line 14
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Search results for « <em>%query%</em> »", array("%query%" => _twig_default_filter(twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array()), "q", array())), "")), "messages");
            // line 15
            echo "                ";
        } else {
            // line 16
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Enter your search keywords", array(), "messages");
            // line 17
            echo "                ";
        }
        // line 18
        echo "              </p>
              <h1>
                <a href=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("recherche");
        echo "\">
                  <strong>";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("Search", array(), "messages");
        echo "</strong>
                </a>
              </h1>
            </div>
            <form method=\"get\">
              <input id=\"search-input-advanced\" type=\"text\" name=\"q\" value=\"";
        // line 26
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "get", array(), "any", false, true), "q", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "get", array()), "q", array()));
        }
        echo "\" class=\"pmd-Input\">
              <select name=\"type\" class=\"pmd-Select\">
                <option value=\"tous\"";
        // line 28
        if ((null === (isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")))) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("All", array(), "messages");
        echo "</option>
                <option value=\"chaines\"";
        // line 29
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "channels")) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV channels", array(), "messages");
        echo "</option>
                <option value=\"programmes\"";
        // line 30
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "programs")) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV programs", array(), "messages");
        echo "</option>
                <option value=\"personnes\"";
        // line 31
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "casts")) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("People", array(), "messages");
        echo "</option>
                <option value=\"videos\"";
        // line 32
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "videos")) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Videos", array(), "messages");
        echo "</option>
              </select>
              <button type=\"submit\" style=\"vertical-align: top\" class=\"pmd-Button pmd-Button--dark pmd-Button--form\">";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("Search", array(), "messages");
        echo "</button>
            </form>
          </div>

          ";
        // line 38
        if ((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type"))) {
            echo " ";
            // line 39
            echo "            ";
            $this->loadTemplate("controllers/recherche/_type.twig", "controllers/recherche/index.twig", 39)->display($context);
            // line 40
            echo "          ";
        } elseif ( !(null === (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")))) {
            echo " ";
            // line 41
            echo "            ";
            $this->loadTemplate("controllers/recherche/_full.twig", "controllers/recherche/index.twig", 41)->display($context);
            // line 42
            echo "          ";
        } else {
            // line 43
            echo "            <p class=\"text xxbigger center clear-grey\">&uarr;<br>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Enter your search keywords above.", array(), "messages");
            echo "</p>
          ";
        }
        // line 45
        echo "
        </div>

        <div class=\"span-sidebar\">
          ";
        // line 49
        $this->loadTemplate("partials/ads-banner.twig", "controllers/recherche/index.twig", 49)->display(array_merge($context, array("unique" => "af2eb201", "zone_id" => 9)));
        // line 50
        echo "        </div>

      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/recherche/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 50,  155 => 49,  149 => 45,  143 => 43,  140 => 42,  137 => 41,  133 => 40,  130 => 39,  127 => 38,  120 => 34,  111 => 32,  103 => 31,  95 => 30,  87 => 29,  79 => 28,  72 => 26,  64 => 21,  60 => 20,  56 => 18,  53 => 17,  50 => 16,  47 => 15,  44 => 14,  42 => 13,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/*       <div class="row">*/
/* */
/*         <div class="span-page">*/
/* */
/*           <div class="grey-box margin">*/
/*             <div class="section-title">*/
/*               <p class="right clear-grey">*/
/*                 {% if request.get.q is defined %}*/
/*                   {% trans with {'%query%': request.get.q|escape|default('')} %}Search results for « <em>%query%</em> »{% endtrans %}*/
/*                 {% else %}*/
/*                   {% trans %}Enter your search keywords{% endtrans %}*/
/*                 {% endif %}*/
/*               </p>*/
/*               <h1>*/
/*                 <a href="{{ path('recherche') }}">*/
/*                   <strong>{% trans %}Search{% endtrans %}</strong>*/
/*                 </a>*/
/*               </h1>*/
/*             </div>*/
/*             <form method="get">*/
/*               <input id="search-input-advanced" type="text" name="q" value="{% if request.get.q is defined %}{{ request.get.q|escape }}{% endif %}" class="pmd-Input">*/
/*               <select name="type" class="pmd-Select">*/
/*                 <option value="tous"{% if type is null %} selected="selected"{% endif %}>{% trans %}All{% endtrans %}</option>*/
/*                 <option value="chaines"{% if type == 'channels' %} selected="selected"{% endif %}>{% trans %}TV channels{% endtrans %}</option>*/
/*                 <option value="programmes"{% if type == 'programs' %} selected="selected"{% endif %}>{% trans %}TV programs{% endtrans %}</option>*/
/*                 <option value="personnes"{% if type == 'casts' %} selected="selected"{% endif %}>{% trans %}People{% endtrans %}</option>*/
/*                 <option value="videos"{% if type == 'videos' %} selected="selected"{% endif %}>{% trans %}Videos{% endtrans %}</option>*/
/*               </select>*/
/*               <button type="submit" style="vertical-align: top" class="pmd-Button pmd-Button--dark pmd-Button--form">{% trans %}Search{% endtrans %}</button>*/
/*             </form>*/
/*           </div>*/
/* */
/*           {% if type %} {# PER TYPE #}*/
/*             {% include "controllers/recherche/_type.twig" %}*/
/*           {% elseif query is not null %} {# All TYPE #}*/
/*             {% include "controllers/recherche/_full.twig" %}*/
/*           {% else %}*/
/*             <p class="text xxbigger center clear-grey">&uarr;<br>{% trans %}Enter your search keywords above.{% endtrans %}</p>*/
/*           {% endif %}*/
/* */
/*         </div>*/
/* */
/*         <div class="span-sidebar">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "af2eb201", "zone_id": 9} %}*/
/*         </div>*/
/* */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endblock content %}*/
/* */
