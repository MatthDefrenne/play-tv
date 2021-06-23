<?php

/* controllers/television/mosaique.twig */
class __TwigTemplate_03e94c524242ff1641737a25641b31a93a14c644d36a6f4452bf3fc1d403702b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/television/mosaique.twig", 1);
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

        <nav class=\"span3 sep\">
          <p class=\"grey-box margin\">
            <a href=\"/television/mosaique/\" class=\"";
        // line 10
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "direct")) {
            echo "clear-grey";
        }
        echo "\" title=\"Votre bouquet\">
              <strong>Votre bouquet</strong>
            </a>
          </p>
          <p class=\"grey-box xmargin\">
            <a href=\"/television/mosaique/categories/\" class=\"";
        // line 15
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "categories")) {
            echo "clear-grey";
        }
        echo "\" title=\"Par catégorie\">
              <strong>Par catégorie</strong>
            </a>
          </p>
          <p class=\"grey-box margin\">
            <a href=\"/television/mosaique/themes/\" class=\"";
        // line 20
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "themes")) {
            echo "clear-grey";
        }
        echo "\" title=\"Par thème\">
              <strong>Par thème</strong>
            </a>
          </p>
          <p class=\"grey-box xmargin\">
            <a href=\"/television/mosaique/replay-tv/\" class=\"";
        // line 25
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "replay-tv")) {
            echo "clear-grey";
        }
        echo "\" title=\"Avec replay tv\">
              <strong>Avec replay tv</strong>
            </a>
          </p>
        </nav>

        <div class=\"span13\">

          <div class=\"page-title\">
            ";
        // line 34
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "direct")) {
            // line 35
            echo "              <p class=\"right grey-box\">Bouquet : <strong>";
            echo twig_escape_filter($this->env, (isset($context["client_country"]) ? $context["client_country"] : $this->getContext($context, "client_country")), "html", null, true);
            echo "</strong></p>
            ";
        } else {
            // line 37
            echo "              <p class=\"right clear-grey\">Toutes les chaines</p>
            ";
        }
        // line 39
        echo "
            ";
        // line 40
        if (((isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "direct")) {
            // line 41
            echo "              <h1>Votre bouquet de chaînes</h1>
              <p class=\"sub-title\">Liste des chaînes disponibles en direct dans votre bouquet</p>
            ";
        } elseif ((        // line 43
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "categories")) {
            // line 44
            echo "              <h1>Liste des chaînes tv par catégorie</h1>
              <p class=\"sub-title\">Toutes les chaînes tv classées par catégorie (hors bouquet, ou non)</p>
            ";
        } elseif ((        // line 46
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "themes")) {
            // line 47
            echo "              <h1>Liste des chaînes tv par thème</h1>
              <p class=\"sub-title\">Toutes les chaînes tv classées par thème (hors bouquet, ou non)</p>
            ";
        } elseif ((        // line 49
(isset($context["type"]) ? $context["type"] : $this->getContext($context, "type")) == "replay-tv")) {
            // line 50
            echo "              <h1>Liste des chaînes tv en replay</h1>
              <p class=\"sub-title\">Toutes les chaînes tv disponibles en replay télé</p>
            ";
        }
        // line 53
        echo "          </div>

          ";
        // line 55
        echo (isset($context["block_mosaic"]) ? $context["block_mosaic"] : $this->getContext($context, "block_mosaic"));
        echo "

        </div>

      </div>
    </div>
  </div>

  <style type=\"text/css\">
  .channel-button{
    margin:0 4px 4px;
  }
  </style>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/mosaique.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 55,  123 => 53,  118 => 50,  116 => 49,  112 => 47,  110 => 46,  106 => 44,  104 => 43,  100 => 41,  98 => 40,  95 => 39,  91 => 37,  85 => 35,  83 => 34,  69 => 25,  59 => 20,  49 => 15,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/*       <div class="row">*/
/* */
/*         <nav class="span3 sep">*/
/*           <p class="grey-box margin">*/
/*             <a href="/television/mosaique/" class="{% if type == 'direct' %}clear-grey{% endif %}" title="Votre bouquet">*/
/*               <strong>Votre bouquet</strong>*/
/*             </a>*/
/*           </p>*/
/*           <p class="grey-box xmargin">*/
/*             <a href="/television/mosaique/categories/" class="{% if type == 'categories' %}clear-grey{% endif %}" title="Par catégorie">*/
/*               <strong>Par catégorie</strong>*/
/*             </a>*/
/*           </p>*/
/*           <p class="grey-box margin">*/
/*             <a href="/television/mosaique/themes/" class="{% if type == 'themes' %}clear-grey{% endif %}" title="Par thème">*/
/*               <strong>Par thème</strong>*/
/*             </a>*/
/*           </p>*/
/*           <p class="grey-box xmargin">*/
/*             <a href="/television/mosaique/replay-tv/" class="{% if type == 'replay-tv' %}clear-grey{% endif %}" title="Avec replay tv">*/
/*               <strong>Avec replay tv</strong>*/
/*             </a>*/
/*           </p>*/
/*         </nav>*/
/* */
/*         <div class="span13">*/
/* */
/*           <div class="page-title">*/
/*             {% if type == 'direct' %}*/
/*               <p class="right grey-box">Bouquet : <strong>{{ client_country }}</strong></p>*/
/*             {% else %}*/
/*               <p class="right clear-grey">Toutes les chaines</p>*/
/*             {% endif %}*/
/* */
/*             {% if type == 'direct' %}*/
/*               <h1>Votre bouquet de chaînes</h1>*/
/*               <p class="sub-title">Liste des chaînes disponibles en direct dans votre bouquet</p>*/
/*             {% elseif type == 'categories' %}*/
/*               <h1>Liste des chaînes tv par catégorie</h1>*/
/*               <p class="sub-title">Toutes les chaînes tv classées par catégorie (hors bouquet, ou non)</p>*/
/*             {% elseif type == 'themes' %}*/
/*               <h1>Liste des chaînes tv par thème</h1>*/
/*               <p class="sub-title">Toutes les chaînes tv classées par thème (hors bouquet, ou non)</p>*/
/*             {% elseif type == 'replay-tv' %}*/
/*               <h1>Liste des chaînes tv en replay</h1>*/
/*               <p class="sub-title">Toutes les chaînes tv disponibles en replay télé</p>*/
/*             {% endif %}*/
/*           </div>*/
/* */
/*           {{ block_mosaic|raw }}*/
/* */
/*         </div>*/
/* */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/*   <style type="text/css">*/
/*   .channel-button{*/
/*     margin:0 4px 4px;*/
/*   }*/
/*   </style>*/
/* {% endblock %}*/
/* */
