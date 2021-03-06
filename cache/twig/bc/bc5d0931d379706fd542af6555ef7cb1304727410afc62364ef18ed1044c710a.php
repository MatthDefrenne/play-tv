<?php

/* controllers/faq/index.twig */
class __TwigTemplate_f4faaac3c6e26725962b856b2163245b953e46220f0d35f03ca56d1b4eb54b1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("controllers/faq/_header.twig", "controllers/faq/index.twig", 1);
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
        echo "  <ol id=\"faq\" class=\"text bigger\">
    <li>
      <h2>1. Je ne peux pas regarder la télévision.</h2>
      <ol>
        <li>
          <a href=\"/faq/flash-player/\" title=\"Adobe Flash Player\">
            Un message m'indique de télécharger le plugin Adobe Flash Player.
          </a>
        </li>
        <li>
          <a href=\"/faq/chaine-indisponible/\" title=\"Chaîne indisponible\">
            Un message indique &laquo; Cette chaîne est indisponible pour le moment ».
          </a>
        </li>
        <li>
          <a href=\"/faq/hors-bouquet/\" title=\"Chaîne hors bouquet\">
            Un message indique &laquo; La chaîne X n'est pas disponible en live sur playtv.fr ».
          </a>
        </li>
        <li>
          <a href=\"/faq/adblock/\" title=\"Vous utilisez Adblock\">
            Mon navigateur est redirigé sur la page &laquo; Vous utilisez le logiciel Adblock Plus ».
          </a>
        </li>
      </ol>
    </li>

    <li>
      <h2>2. Je rencontre des problèmes avec la télévision</h2>
      <ol>
        <li>
          <a href=\"/faq/saccades-video/\" title=\"Saccades sur le flux vidéo\">
            Le flux vidéo (image + son) est saccadé, je rencontre des \"freezes\", \"lags\" etc.
          </a>
        </li>
        <li>
          <a href=\"/faq/probleme-son/\" title=\"Problèmes de son\">
            Le son est de mauvaise qualité (ex: grésillements, volume faible etc.).
          </a>
        </li>
        <li>
          <a href=\"/faq/qualite-video/\" title=\"Mauvaise qualité vidéo\">
            L'image vidéo est de basse ou mauvaise qualité.
          </a>
        </li>
        <li>
          <a href=\"/faq/rapport-erreur/\" title=\"Envoyer un rapport d'erreur\">
            Envoyer un rapport d'erreur.
          </a>
        </li>
      </ol>
    </li>

    <li>
      <h2>3. Fonctionnalités du site</h2>
      <ol>
        <li>
          <a href=\"/faq/revoir-enregistrer/\" title=\"Enregistrer ou revoir un programme\">
            Je cherche à revoir ou à enregistrer un programme TV en particulier.
          </a>
        </li>
        <li>
          <a href=\"/faq/smartphones/\" title=\"Regarder Play TV sur mon smartphone\">
            Je souhaite regarder la télévision sur un smartphone.
          </a>
        </li>
        <li>
          <a href=\"/faq/tablettes/\" title=\"Regarder Play TV sur ma tablette tactile\">
            Je souhaite regarder la télévision sur une tablette tactile.
          </a>
        </li>
        <li>
          <a href=\"/faq/vo-sous-titres/\" title=\"Programmes en VO ou en version sous-titrée\">
            Je souhaite regarder un programme en VO et/ou en version sous-titrée (VOSTFR).
          </a>
        </li>
        <li>
          <a href=\"/faq/compte-utilisateur/\" title=\"S'identifier à Play TV\">
            Je ne parviens pas à m'identifier.
          </a>
        </li>
        <li>
          <a href=\"/faq/supprimer-compte-utilisateur/\" title=\"Je souhaite supprimer mon compte\">
            Je souhaite supprimer mon compte.
          </a>
        </li>
        <li>
          <a href=\"/faq/resilier-abonnement/\" title=\"Je souhaite résilier mon abonnement\">
            Je souhaite résilier mon abonnement.
          </a>
        </li>
      </ol>
    </li>

    <li>
      <h2>4. Remarques sur les programmes TV</h2>
      <ol>
        <li>
          <a href=\"/faq/france-3-region/\" title=\"Journal régional de France 3\">
            Le journal régional diffusé sur France 3 n’est pas celui de ma région.
          </a>
        </li>
        <li>
          <a href=\"/faq/erreur-programme/\" title=\"Erreur sur la fiche d'un programme\">
            Je veux signaler une erreur sur la fiche d'un programme.
          </a>
        </li>
        <li>
          <a href=\"/faq/remarques-programmation/\" title=\"Remarques sur la programmation\">
            J'ai une autre question ou remarque sur un programme ou une chaîne de télévision.
          </a>
        </li>
      </ol>
    </li>

    <li>
      <h2>Je ne trouve pas de solution à mon problème.</h2>
      <p>
        Vous ne trouvez pas de solution à votre problème ? Nous vous invitons à <a href=\"/aide/support/\" title=\"Contacter le support\"><strong>contacter le support</strong></a>.
      </p>
    </li>

  </ol>
";
    }

    public function getTemplateName()
    {
        return "controllers/faq/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "controllers/faq/_header.twig" %}*/
/* */
/* {% block faq_content %}*/
/*   <ol id="faq" class="text bigger">*/
/*     <li>*/
/*       <h2>1. Je ne peux pas regarder la télévision.</h2>*/
/*       <ol>*/
/*         <li>*/
/*           <a href="/faq/flash-player/" title="Adobe Flash Player">*/
/*             Un message m'indique de télécharger le plugin Adobe Flash Player.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/chaine-indisponible/" title="Chaîne indisponible">*/
/*             Un message indique &laquo; Cette chaîne est indisponible pour le moment ».*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/hors-bouquet/" title="Chaîne hors bouquet">*/
/*             Un message indique &laquo; La chaîne X n'est pas disponible en live sur playtv.fr ».*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/adblock/" title="Vous utilisez Adblock">*/
/*             Mon navigateur est redirigé sur la page &laquo; Vous utilisez le logiciel Adblock Plus ».*/
/*           </a>*/
/*         </li>*/
/*       </ol>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <h2>2. Je rencontre des problèmes avec la télévision</h2>*/
/*       <ol>*/
/*         <li>*/
/*           <a href="/faq/saccades-video/" title="Saccades sur le flux vidéo">*/
/*             Le flux vidéo (image + son) est saccadé, je rencontre des "freezes", "lags" etc.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/probleme-son/" title="Problèmes de son">*/
/*             Le son est de mauvaise qualité (ex: grésillements, volume faible etc.).*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/qualite-video/" title="Mauvaise qualité vidéo">*/
/*             L'image vidéo est de basse ou mauvaise qualité.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/rapport-erreur/" title="Envoyer un rapport d'erreur">*/
/*             Envoyer un rapport d'erreur.*/
/*           </a>*/
/*         </li>*/
/*       </ol>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <h2>3. Fonctionnalités du site</h2>*/
/*       <ol>*/
/*         <li>*/
/*           <a href="/faq/revoir-enregistrer/" title="Enregistrer ou revoir un programme">*/
/*             Je cherche à revoir ou à enregistrer un programme TV en particulier.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/smartphones/" title="Regarder Play TV sur mon smartphone">*/
/*             Je souhaite regarder la télévision sur un smartphone.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/tablettes/" title="Regarder Play TV sur ma tablette tactile">*/
/*             Je souhaite regarder la télévision sur une tablette tactile.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/vo-sous-titres/" title="Programmes en VO ou en version sous-titrée">*/
/*             Je souhaite regarder un programme en VO et/ou en version sous-titrée (VOSTFR).*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/compte-utilisateur/" title="S'identifier à Play TV">*/
/*             Je ne parviens pas à m'identifier.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/supprimer-compte-utilisateur/" title="Je souhaite supprimer mon compte">*/
/*             Je souhaite supprimer mon compte.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/resilier-abonnement/" title="Je souhaite résilier mon abonnement">*/
/*             Je souhaite résilier mon abonnement.*/
/*           </a>*/
/*         </li>*/
/*       </ol>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <h2>4. Remarques sur les programmes TV</h2>*/
/*       <ol>*/
/*         <li>*/
/*           <a href="/faq/france-3-region/" title="Journal régional de France 3">*/
/*             Le journal régional diffusé sur France 3 n’est pas celui de ma région.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/erreur-programme/" title="Erreur sur la fiche d'un programme">*/
/*             Je veux signaler une erreur sur la fiche d'un programme.*/
/*           </a>*/
/*         </li>*/
/*         <li>*/
/*           <a href="/faq/remarques-programmation/" title="Remarques sur la programmation">*/
/*             J'ai une autre question ou remarque sur un programme ou une chaîne de télévision.*/
/*           </a>*/
/*         </li>*/
/*       </ol>*/
/*     </li>*/
/* */
/*     <li>*/
/*       <h2>Je ne trouve pas de solution à mon problème.</h2>*/
/*       <p>*/
/*         Vous ne trouvez pas de solution à votre problème ? Nous vous invitons à <a href="/aide/support/" title="Contacter le support"><strong>contacter le support</strong></a>.*/
/*       </p>*/
/*     </li>*/
/* */
/*   </ol>*/
/* {% endblock faq_content %}*/
/* */
