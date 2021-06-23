<?php

/* controllers/pages/a-propos.twig */
class __TwigTemplate_dc07917e3a0cd5dbc8b8b4f6e4f5ded70eb0431300ff87362062d55992d99d8f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/a-propos.twig", 1);
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
        // line 10
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/a-propos.twig", 10)->display($context);
        // line 11
        echo "        </div>

        <div class=\"span13\">
          <div class=\"page-title\">
            <h1>Page. <span class=\"red\">À propos de Play TV</span></h1>
            <p class=\"sub-title\">Qui sommes-nous ? Notre histoire.</p>
          </div>

          <div class=\"text bigger\">
            <p class=\"justify\">
              Le site playtv.fr est un site internet français qui diffuse en direct des chaînes de télévision. Créé en 2009 par la société <a target=\"_blank\" href=\"https://playmedia.fr\" title=\"Play Media\">Play Media</a>, il propose un <strong>accès légal</strong> et illimité, à travers des offres <strong>gratuites et payantes</strong>, à <strong>plus de 100 chaînes de télévision en direct</strong>.
            </p>

            <p class=\"justify\">
              Selon Alexa, au 24 avril 2012, Play TV est le 463e site le plus visité en France. Il totalise 1,7 millions de visiteurs uniques mensuels et 5,5 millions de visites chaque mois.
            </p>

            <h2>Historique</h2>

            <ul>
              <li class=\"margin\">
                En 2008, Charles Cappart et John Galloula décident de créer une plateforme internet de télévision en direct.<br> <strong>L'incubateur Advancia- CCIP</strong> les accompagnera au début de ce projet.
              </li>
              <li class=\"margin\">
                En 2009, les fondateurs sont <strong>lauréats du Réseau Entreprendre 93</strong>.<br>Ils fondent alors la société Play Media sous le régime de Jeune Entreprise Innovante.
              </li>
              <li class=\"margin\">
                En Juin 2009, la société est enregistrée auprès du <strong>Conseil Supérieur de l'Audiovisuel</strong> (CSA) et rejoint la liste officielle des principaux <strong>opérateurs de télévision par ADSL</strong>.
              </li>
              <li class=\"margin\">
                En Janvier 2010, le site <strong>Play TV</strong> est mis en ligne publiquement sur le web.<br>La même année, la société est enregistrée comme <strong>opérateur auprès de l’ARCEP</strong>.
              </li>
              <li class=\"margin\">
                En Juin 2010, la société Play Media est <strong>soutenue par Oséo Innovation</strong> pour le développement de ses technologies de diffusion.
              </li>
              <li class=\"margin\">
                Depuis le 10 février 2011, le bouquet de chaînes Play TV est disponible sur le <strong>logiciel adsl TV</strong> au côté des bouquets des fournisseurs d'accès internet.
              </li>
              <li class=\"margin\">
                Le 4 juillet 2011, Play TV présente le bilan de ses 18 mois d'activité. Le site comptabilise pour le premier semestre 2011 plus de 17 millions de visites et 50 millions de pages vues et atteint son<strong> record d'audience</strong> de 200 000 visites en une journée.
              </li>
              <li class=\"margin\">
                En Septembre 2011, le site est 22e du classement Cyberestat de <strong>Médiamétrie</strong> en réalisant de 3,5 millions de visites.<br> Le classement <strong>Nielsen//Netratings</strong> déclare un trafic de 491 000 Visiteurs Uniques.
              </li>
              <li class=\"margin\">
                En Novembre 2011, l'outil <strong>Médiamétrie eStat</strong> mesure 7 millions de chaînes lancées sur le site pour un temps total de visionnage de 3,5 millions d'heures. Le site comptabilise ce mois-ci 3,7 millions de visites toujours selon Médiamétrie.
              </li>
              <li class=\"margin\">
                En Janvier 2012, Play TV devient le prestataire de <strong>Dartybox</strong> pour le service de TV sur PC de ses abonnés.
              </li>
              <li class=\"margin\">
                En Mars 2012, Play TV annonce sa <strong>nouvelle version</strong> intégrant notamment un guide de la télévision de rattrapage.
              </li>
            </ul>
          </div>

        </div>

      </div>

    </div>
  </div>

<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/a-propos.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 11,  39 => 10,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-StaticPage">*/
/*     <div class="container pmd-StaticPage-wrapper">*/
/* */
/*       <div class="row">*/
/* */
/*         <div class="span3 sep">*/
/*           {% include "controllers/pages/_menu.twig" %}*/
/*         </div>*/
/* */
/*         <div class="span13">*/
/*           <div class="page-title">*/
/*             <h1>Page. <span class="red">À propos de Play TV</span></h1>*/
/*             <p class="sub-title">Qui sommes-nous ? Notre histoire.</p>*/
/*           </div>*/
/* */
/*           <div class="text bigger">*/
/*             <p class="justify">*/
/*               Le site playtv.fr est un site internet français qui diffuse en direct des chaînes de télévision. Créé en 2009 par la société <a target="_blank" href="https://playmedia.fr" title="Play Media">Play Media</a>, il propose un <strong>accès légal</strong> et illimité, à travers des offres <strong>gratuites et payantes</strong>, à <strong>plus de 100 chaînes de télévision en direct</strong>.*/
/*             </p>*/
/* */
/*             <p class="justify">*/
/*               Selon Alexa, au 24 avril 2012, Play TV est le 463e site le plus visité en France. Il totalise 1,7 millions de visiteurs uniques mensuels et 5,5 millions de visites chaque mois.*/
/*             </p>*/
/* */
/*             <h2>Historique</h2>*/
/* */
/*             <ul>*/
/*               <li class="margin">*/
/*                 En 2008, Charles Cappart et John Galloula décident de créer une plateforme internet de télévision en direct.<br> <strong>L'incubateur Advancia- CCIP</strong> les accompagnera au début de ce projet.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En 2009, les fondateurs sont <strong>lauréats du Réseau Entreprendre 93</strong>.<br>Ils fondent alors la société Play Media sous le régime de Jeune Entreprise Innovante.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Juin 2009, la société est enregistrée auprès du <strong>Conseil Supérieur de l'Audiovisuel</strong> (CSA) et rejoint la liste officielle des principaux <strong>opérateurs de télévision par ADSL</strong>.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Janvier 2010, le site <strong>Play TV</strong> est mis en ligne publiquement sur le web.<br>La même année, la société est enregistrée comme <strong>opérateur auprès de l’ARCEP</strong>.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Juin 2010, la société Play Media est <strong>soutenue par Oséo Innovation</strong> pour le développement de ses technologies de diffusion.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 Depuis le 10 février 2011, le bouquet de chaînes Play TV est disponible sur le <strong>logiciel adsl TV</strong> au côté des bouquets des fournisseurs d'accès internet.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 Le 4 juillet 2011, Play TV présente le bilan de ses 18 mois d'activité. Le site comptabilise pour le premier semestre 2011 plus de 17 millions de visites et 50 millions de pages vues et atteint son<strong> record d'audience</strong> de 200 000 visites en une journée.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Septembre 2011, le site est 22e du classement Cyberestat de <strong>Médiamétrie</strong> en réalisant de 3,5 millions de visites.<br> Le classement <strong>Nielsen//Netratings</strong> déclare un trafic de 491 000 Visiteurs Uniques.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Novembre 2011, l'outil <strong>Médiamétrie eStat</strong> mesure 7 millions de chaînes lancées sur le site pour un temps total de visionnage de 3,5 millions d'heures. Le site comptabilise ce mois-ci 3,7 millions de visites toujours selon Médiamétrie.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Janvier 2012, Play TV devient le prestataire de <strong>Dartybox</strong> pour le service de TV sur PC de ses abonnés.*/
/*               </li>*/
/*               <li class="margin">*/
/*                 En Mars 2012, Play TV annonce sa <strong>nouvelle version</strong> intégrant notamment un guide de la télévision de rattrapage.*/
/*               </li>*/
/*             </ul>*/
/*           </div>*/
/* */
/*         </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/* */
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
