<?php

/* controllers/pages/csa-inscription.twig */
class __TwigTemplate_03d0be9cc6a83a643cfa64c61c421aa90e38fe61b62fa8818fd62c6205de6258 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/csa-inscription.twig", 1);
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
        echo "  <div id=\"content\" class=\"pmd-StaticPage\">
    <div class=\"container pmd-StaticPage-wrapper\">

      <div class=\"row\">
        <div class=\"span3 sep\">
          ";
        // line 9
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/csa-inscription.twig", 9)->display($context);
        // line 10
        echo "        </div>
        <article class=\"span13\">
          <div class=\"page-title\">
              <h1>Page. <span class=\"red\">CSA Inscription</span></h1>
          </div>

          <div class=\"text justify\">
              <p>Play TV est un service de télévision sur internet qui offre à ses utilisateurs la consultation d'un bouquet de chaînes en direct sans contrepartie financière ni inscription depuis quatre ans.</p>
              <p>La réglementation française inscrit l'activité de Play TV comme celle d'un distributeur de service de télévision, sous l'autorité du <strong>Conseil Supérieur de l'Audiovisuel</strong>.</p>
              <p>Une décision du CSA rendue à l’Été 2013, confirmait la légitimité de l'offre et du modèle économique de Play TV tout en émettant une réserve sur le mode d'accès à certaines chaînes.</p>
              <p>Afin de mettre en conformité le service avec l'ensemble du marché et de respecter la décision du Conseil Supérieur de l'Audiovisuel, <strong>Play TV a dû modifier une partie de son service</strong>, notamment en demandant à ses utilisateurs de s'identifier avant l'accès aux chaînes.</p>
              <p>C'est dans ce cadre <strong>que dès la fin de l'année 2013</strong>, Play TV doit qualifier ses utilisateurs en abonnés <strong>gratuits</strong>, et donc procéder à une inscription avant d'autoriser l'accès à la totalité de son bouquet.</p>
              <p>Cependant cette mesure n'a aucun impact sur le caractère de gratuité de l'offre, et cette modification n'engendre <strong>aucun engagement pour l'utilisateur</strong>.</p>
          </div>
        </article>
      </div>
    </div>
  </div>
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/csa-inscription.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-StaticPage">*/
/*     <div class="container pmd-StaticPage-wrapper">*/
/* */
/*       <div class="row">*/
/*         <div class="span3 sep">*/
/*           {% include "controllers/pages/_menu.twig" %}*/
/*         </div>*/
/*         <article class="span13">*/
/*           <div class="page-title">*/
/*               <h1>Page. <span class="red">CSA Inscription</span></h1>*/
/*           </div>*/
/* */
/*           <div class="text justify">*/
/*               <p>Play TV est un service de télévision sur internet qui offre à ses utilisateurs la consultation d'un bouquet de chaînes en direct sans contrepartie financière ni inscription depuis quatre ans.</p>*/
/*               <p>La réglementation française inscrit l'activité de Play TV comme celle d'un distributeur de service de télévision, sous l'autorité du <strong>Conseil Supérieur de l'Audiovisuel</strong>.</p>*/
/*               <p>Une décision du CSA rendue à l’Été 2013, confirmait la légitimité de l'offre et du modèle économique de Play TV tout en émettant une réserve sur le mode d'accès à certaines chaînes.</p>*/
/*               <p>Afin de mettre en conformité le service avec l'ensemble du marché et de respecter la décision du Conseil Supérieur de l'Audiovisuel, <strong>Play TV a dû modifier une partie de son service</strong>, notamment en demandant à ses utilisateurs de s'identifier avant l'accès aux chaînes.</p>*/
/*               <p>C'est dans ce cadre <strong>que dès la fin de l'année 2013</strong>, Play TV doit qualifier ses utilisateurs en abonnés <strong>gratuits</strong>, et donc procéder à une inscription avant d'autoriser l'accès à la totalité de son bouquet.</p>*/
/*               <p>Cependant cette mesure n'a aucun impact sur le caractère de gratuité de l'offre, et cette modification n'engendre <strong>aucun engagement pour l'utilisateur</strong>.</p>*/
/*           </div>*/
/*         </article>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
