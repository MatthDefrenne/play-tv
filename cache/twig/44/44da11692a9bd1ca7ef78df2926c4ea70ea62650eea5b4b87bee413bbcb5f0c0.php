<?php

/* controllers/pages/jobs.twig */
class __TwigTemplate_f0403f0d43d10ec55c19a1b43e1a89e85d28b942d4b3122c14c3f1311b777c7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/jobs.twig", 1);
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
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/jobs.twig", 9)->display($context);
        // line 10
        echo "        </div>

        <article class=\"span13\">
          <div class=\"page-title\">
            <h1>Page. <span class=\"red\">Jobs</span></h1>
            <p class=\"sub-title\">Découvrez les offres d'emploi et stages chez Play Media (playtv.fr)</p>
          </div>

          <p>Aucun poste n'est actuellement à pourvoir.</p>

          ";
        // line 90
        echo "
        </article>

      </div>
    </div>
  </div>

<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/jobs.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 90,  40 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
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
/* */
/*         <article class="span13">*/
/*           <div class="page-title">*/
/*             <h1>Page. <span class="red">Jobs</span></h1>*/
/*             <p class="sub-title">Découvrez les offres d'emploi et stages chez Play Media (playtv.fr)</p>*/
/*           </div>*/
/* */
/*           <p>Aucun poste n'est actuellement à pourvoir.</p>*/
/* */
/*           {#*/
/* */
/*           <div class="text bigger">*/
/*             <h2>Stage &ndash; <strong>Régie Publicitaire</strong></h2>*/
/*             <p class="xbigger"><strong>Réseau Agences Médias</strong></p>*/
/*             <p>Enrichissez votre expérience en participant à l'évolution de l'offre commerciale Play TV auprès des agences médias.</p>*/
/*             <p><strong>Les compétences requises:</strong></p>*/
/*             <ul>*/
/*               <li>Au moins une expérience en relation commerciale</li>*/
/*               <li>Maîtrise des outils de bureautique de base</li>*/
/*               <li>Bon sens du relationnel</li>*/
/*               <li>Maîtrise irreprochable de la langue française</li>*/
/*               <li>Esprit d'équipe</li>*/
/*             </ul>*/
/*             <p>*/
/*               <strong>Type:</strong> Stage<br>*/
/*               <strong>Durée:</strong> 4 mois<br>*/
/*               <strong>Lieu de travail:</strong> Paris (République)<br>*/
/*               <strong>Rémunération:</strong> Minimum légal, plus selon implication personnelle*/
/*             </p>*/
/*             <p><strong>Pour postuler</strong>, veuillez nous envoyer votre CV à cette adresse: <a href="mailto:contact@playmedia.fr?subject={{ "Candidature spontanée"|url_encode }}">contact@playmedia.fr</a></p>*/
/* */
/*             <h2>Stage - <strong>Développement & Etudes</strong> (possibilité d’embauche en fin de stage)</h2>*/
/*             <p class="xbigger"><strong>Enrichissez votre expérience en participant à l’évolution des services de Play TV</strong></p>*/
/*             <p>Assistant en charge des études pour le développement de Play TV à l’international.</p>*/
/*             <p><strong>Formation</strong></p>*/
/*             <p>Bac + 4/5, cursus universitaire, école de commerce, école de communication</p>*/
/*             <p><strong>Les compétences requises:</strong></p>*/
/*             <ul>*/
/*               <li>Au moins une expérience aux  départements études/développement dans le secteur des médias ou en agence de communication.</li>*/
/*               <li>Maîtrise des outils de bureautique (Powerpoint, Excel)</li>*/
/*               <li>Bon sens du relationnel</li>*/
/*               <li>Maîtrise irreprochable de la langue française</li>*/
/*               <li>Bonne maîtrise de la langue Anglaise</li>*/
/*               <li>Esprit d'équipe</li>*/
/*             </ul>*/
/*             <p>*/
/*               <strong>Type:</strong> Stage<br>*/
/*               <strong>Durée:</strong> 4 mois<br>*/
/*               <strong>Lieu de travail:</strong> Paris (République)<br>*/
/*               <strong>Rémunération:</strong> Minimum légal, plus selon implication personnelle*/
/*             </p>*/
/*             <p>*/
/*               <strong>Pour postuler</strong>, veuillez nous envoyer votre CV à cette adresse: <a href="mailto:contact@playmedia.fr?subject={{ "Candidature spontanée Développement & Etudes"|url_encode }}">contact@playmedia.fr</a>*/
/*             </p>*/
/* */
/*             <h2><strong>Freelance</strong> – Community Management</h2>*/
/*             <p class="xbigger"><strong>Réseau sociaux / Relations utilisateurs</strong></p>*/
/*             <p>Animez et informez la communauté Play TV</p>*/
/*             <p><strong>Formation</strong></p>*/
/*             <p>Bac + 4/5, cursus universitaire, école de commerce, école de communication (CELSA, Sciences PO)</p>*/
/*             <p><strong>Les qualités et compétences requises:</strong></p>*/
/*             <ul>*/
/*               <li>Usage quotidien et <strong>actif</strong> des réseaux sociaux <u>Twitter</u> / Facebook / Linkedin / Viadeo</li>*/
/*               <li>Maîtrise des outils de bureautique (Powerpoint, Excel)</li>*/
/*               <li>Bon sens du relationnel</li>*/
/*               <li>Maîtrise <strong>irreprochable</strong> de la langue française</li>*/
/*             </ul>*/
/*             <p>*/
/*               <strong>Type:</strong> Contrat Freelance<br>*/
/*               <strong>Durée:</strong> 12 mois<br>*/
/*               <strong>Lieu de travail:</strong> Paris (République)<br>*/
/*               <strong>Rémunération:</strong> Tarif horaire*/
/*             </p>*/
/*             <p>*/
/*               <strong>Pour postuler</strong>, veuillez nous envoyer votre CV à cette adresse: <a href="mailto:contact@playmedia.fr?subject={{ "Candidature spontanée Freelance Community Manager"|url_encode }}">contact@playmedia.fr</a>*/
/*             </p>*/
/*           </div>*/
/* */
/*           #}*/
/* */
/*         </article>*/
/* */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* */
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
