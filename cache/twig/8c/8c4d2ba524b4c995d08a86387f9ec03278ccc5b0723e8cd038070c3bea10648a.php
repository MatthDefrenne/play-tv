<?php

/* controllers/faq/saccades-video.twig */
class __TwigTemplate_c3ddc5ec68de8abbd39c0efd695ec2259c316328c23a9d7b41e87cad64cbde40 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/saccades-video.twig", 1);
        $this->blocks = array(
            'faq_content' => array($this, 'block_faq_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/faq/_header.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_faq_content($context, array $blocks = array())
    {
        // line 4
        echo "  <h2 class=\"margin\">2.1. Le flux vidéo (image + son) est saccadé, je rencontre des \"freezes\", \"lags\" etc.</h2>
  <p>Vous subissez des saccades, des \"freezes\", des \"lags\" etc. de l'image et/ou du son lorsque vous regardez la télévision sur le site ?</p>
  <p>Il s'agit très probablement d'un <strong>problème de connexion Internet</strong> qui peut s'expliquer de la manière suivante :</p>

  <ul>
    <li class=\"margin\">
      <p>Votre <strong>débit de connexion</strong> Internet (ou \"<strong>bande passante</strong>\") est trop faible.</p>
      <p>
        Pour bénéficier d'une expérience optimale lorsque vous regardez la télévision sur playtv.fr, vous devez être connecté(e) en \"haut débit\" et votre \"débit descendant\" (download) doit-être <strong>supérieur à 1,5 Mb/s</strong>.
      </p>
      <p>
        <em>
          Ex : vous pouvez tester votre débit de connexion sur le site Internet de l'association <a href=\"http://www.60millions-mag.com/testeur.php?targeturl=http%3A%2F%2Fqualiserv.directique.com%2Fqtq_inc_testHergo2.2.php\" target=\"_blank\" rel=\"nofollow\">60 millions de consommateurs</a>.
        </em>
      </p>
    </li>

    <li>
      <p>
        <strong>Vous êtes connecté(e) en wifi</strong> : vous êtes peut-être trop éloigné(e) de votre routeur sans-fil ou de votre box internet, et vous subissez parfois des micro-coupures de signal. Si les problèmes persistent et que le problème ne vient pas de votre débit de connexion (voir ci-dessus), essayez de brancher votre ordinateur directement avec un câble ethernet.
      </p>
    </li>
  </ul>

  <p>
    Vous n'avez pas de problèmes de connexion et le problème persiste ? <a href=\"/aide/support/\"><strong>Contactez le support</strong></a> ou <a href=\"/faq/rapport-erreur/\">envoyez un rapport d'erreur</a>.
  </p>

  <h3>
    <strong>
      <a name=\"flux-alternatif\" style=\"color:#000;\">Flux vidéo alternatif (basse définition)</a>
    </strong>
  </h3>

  <div class=\"image\">
    <img src=\"";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-sd-stream.png\" alt=\"Flux bas débit\">
  </div>

  <p>
    Sur certaines chaînes, nous proposons un <strong>flux vidéo alternatif en basse définition</strong>. Nous recommandons aux utilisateurs qui rencontrent régulièrement des saccades de choisir ce flux lorsque l'option est disponible (bouton \"HQ\" bleu, voir ci-dessus).
  </p>
  <p>Lorsque vous cliquez sur le bouton, après quelques instants, le bouton \"HQ\" devient gris.</p>
  <p>Pour sélectionner à nouveau le flux en haute définition, re-cliquez sur le bouton.</p>

  <p>
    <strong class=\"red\">Attention</strong>, si le bouton est transparent/grisé, c'est qu'il n'existe pas de flux vidéo alternatif pour cette chaîne.
  </p>

  <div class=\"image no-margin\">
    <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
        echo "/images/faq/faq-sd-stream-off.png\" alt=\"Pas de flux alternatif\">
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/saccades-video.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 53,  68 => 39,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <h2 class="margin">2.1. Le flux vidéo (image + son) est saccadé, je rencontre des "freezes", "lags" etc.</h2>*/
/*   <p>Vous subissez des saccades, des "freezes", des "lags" etc. de l'image et/ou du son lorsque vous regardez la télévision sur le site ?</p>*/
/*   <p>Il s'agit très probablement d'un <strong>problème de connexion Internet</strong> qui peut s'expliquer de la manière suivante :</p>*/
/* */
/*   <ul>*/
/*     <li class="margin">*/
/*       <p>Votre <strong>débit de connexion</strong> Internet (ou "<strong>bande passante</strong>") est trop faible.</p>*/
/*       <p>*/
/*         Pour bénéficier d'une expérience optimale lorsque vous regardez la télévision sur playtv.fr, vous devez être connecté(e) en "haut débit" et votre "débit descendant" (download) doit-être <strong>supérieur à 1,5 Mb/s</strong>.*/
/*       </p>*/
/*       <p>*/
/*         <em>*/
/*           Ex : vous pouvez tester votre débit de connexion sur le site Internet de l'association <a href="http://www.60millions-mag.com/testeur.php?targeturl=http%3A%2F%2Fqualiserv.directique.com%2Fqtq_inc_testHergo2.2.php" target="_blank" rel="nofollow">60 millions de consommateurs</a>.*/
/*         </em>*/
/*       </p>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <p>*/
/*         <strong>Vous êtes connecté(e) en wifi</strong> : vous êtes peut-être trop éloigné(e) de votre routeur sans-fil ou de votre box internet, et vous subissez parfois des micro-coupures de signal. Si les problèmes persistent et que le problème ne vient pas de votre débit de connexion (voir ci-dessus), essayez de brancher votre ordinateur directement avec un câble ethernet.*/
/*       </p>*/
/*     </li>*/
/*   </ul>*/
/* */
/*   <p>*/
/*     Vous n'avez pas de problèmes de connexion et le problème persiste ? <a href="/aide/support/"><strong>Contactez le support</strong></a> ou <a href="/faq/rapport-erreur/">envoyez un rapport d'erreur</a>.*/
/*   </p>*/
/* */
/*   <h3>*/
/*     <strong>*/
/*       <a name="flux-alternatif" style="color:#000;">Flux vidéo alternatif (basse définition)</a>*/
/*     </strong>*/
/*   </h3>*/
/* */
/*   <div class="image">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-sd-stream.png" alt="Flux bas débit">*/
/*   </div>*/
/* */
/*   <p>*/
/*     Sur certaines chaînes, nous proposons un <strong>flux vidéo alternatif en basse définition</strong>. Nous recommandons aux utilisateurs qui rencontrent régulièrement des saccades de choisir ce flux lorsque l'option est disponible (bouton "HQ" bleu, voir ci-dessus).*/
/*   </p>*/
/*   <p>Lorsque vous cliquez sur le bouton, après quelques instants, le bouton "HQ" devient gris.</p>*/
/*   <p>Pour sélectionner à nouveau le flux en haute définition, re-cliquez sur le bouton.</p>*/
/* */
/*   <p>*/
/*     <strong class="red">Attention</strong>, si le bouton est transparent/grisé, c'est qu'il n'existe pas de flux vidéo alternatif pour cette chaîne.*/
/*   </p>*/
/* */
/*   <div class="image no-margin">*/
/*     <img src="{{ apps_base_url }}/images/faq/faq-sd-stream-off.png" alt="Pas de flux alternatif">*/
/*   </div>*/
/* {% endblock faq_content %}*/
/* */
