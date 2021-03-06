<?php

/* controllers/pages/presse.twig */
class __TwigTemplate_0d0cfebd963143500518935588fa536cc71c8c6f03ddab381dd04e60218f3075 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/presse.twig", 1);
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
        $this->loadTemplate("controllers/pages/_menu.twig", "controllers/pages/presse.twig", 9)->display($context);
        // line 10
        echo "        </div>
        <div class=\"span13\">
            <div class=\"page-title\">
                <h1>Page. <span class=\"red\">La presse parle de nous !</span></h1>
                <p class=\"sub-title\">Retrouver les mentions de Play TV dans la presse papier et Internet.</p>
            </div>
            <div class=\"text\">
                <h2>Communiqués de presse</h2>
                <ul>
                  <li>
                    <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/cp-ptv-fashiontv.pdf\" title=\"Fashion TV signe un accord de distribution avec Play TV\" target=\"_blank\">Le 24 Septembre 2014</a> : Fashion TV signe un accord de distribution avec Play TV <a href=\"//blog.playtv.fr/2014/09/fashion-tv-signe-un-accord-de-distribution-avec-play-tv/\" target=\"_blank\">Lire l'article</a>.
                    </li>
                  <li>
                    <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/cp-ptv-equipe21.pdf\" title=\"Play TV et l'Equipe 21 signent un accord de distribution\" target=\"_blank\">Le 17 Septembre 2014</a> : Play TV et l’Équipe 21 signent un accord de distribution <a href=\"//blog.playtv.fr/2014/09/play-tv-et-lequipe-21-signent-un-accord-de-distribution/\" target=\"_blank\">Lire l'article</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/communique_de_presse_16072014.pdf\" title=\"Play TV élargit son offre et signe avec 17 nouvelles chaînes diffusées gratuitement et en direct !\" target=\"_blank\" >Le 16 Juillet 2014</a> : Play TV élargit son offre et signe avec 17 nouvelles chaînes diffusées gratuitement et en direct ! <a href=\"//blog.playtv.fr/2014/07/play-tv-elargit-son-offre-et-signe-avec-17-nouvelles-chaines/\" target=\"_blank\">Lire l'article</a>.
                  </li>
                  ";
        // line 33
        echo "                  <li>
                    <a href=\"";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/CPV2.pdf\" title=\"Communiqué presse du 22 mars 2012\" target=\"_blank\">Le 22 Mars 2012</a> : Play TV annonce sa nouvelle version <a href=\"//blog.playtv.fr/2012/03/play-tv-2-en-avant-premiere/\" target=\"_blank\">Lire l'article</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/cp18mois.pdf\" title=\"Communiqué presse du 4 juillet 2011\" target=\"_blank\">Le 4 Juillet 2011</a> : 18 mois après sa création, Play TV fait le bilan. <a href=\"//blog.playtv.fr/2011/07/18-mois-apres-sa-creation-play-tv-fait-le-bilan/\" target=\"_blank\">Lire l'article</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/CP_16062011_AffaireDSK.pdf\" title=\"Communiqué presse du 16 juin 2011\" target=\"_blank\">Le 16 Juin 2011</a> : Affaire #DSK, la TV traditionnelle bousculée par Twitter. <a href=\"//blog.playtv.fr/2011/06/affaire-dsk-la-tv-traditionnelle-bousculee-par-twitter/\" target=\"_blank\">Lire l'article</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 43
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/communique_de_presse_10022011.pdf\" title=\"Communiqué presse du 10 février 2011\" target=\"_blank\">Le 10 Février 2011</a> : Le bouquet Play TV est disponible sur <strong>adslTV</strong>. <a href=\"//blog.playtv.fr/2011/02/le-bouquet-play-tv-est-disponible-sur-le-logiciel-adsl-tv/\">Lire l'article</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/CP%20Etude%20TV%20en%20ligne_NPA_PlayTV_27%20janv%202011.pdf\" title=\"Communiqué presse du 27 janvier 2011\" target=\"_blank\">Le 27 Janvier 2011</a> : Étude sur la TV linéaire, l'autre façon de regarder la télévision. <a href=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/Etude%20TV%20en%20ligne_NPA_PlayTV_27%20janv%202011.pdf\" title=\"Étude sur la TV linéaire\" target=\"_blank\">Télécharger l'étude complète</a>.
                  </li>
                  <li>
                    <a href=\"";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/communique_de_presse_270110.pdf\" title=\"Communiqué presse du 27 janvier 2010\" target=\"_blank\">Le 27 Janvier 2010</a> : Play TV, la première plateforme de <strong>télévision gratuite et légale sur internet</strong>.
                  </li>
                </ul>

                <h2>Ils parlent de Play TV</h2>

                <table style=\"width:100%;\">
                  <tbody>
                    <tr>
                      <td><a href=\"";
        // line 58
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/challenges_app_playtv.jpg\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/challenges_logo.jpg\" alt=\"Logo Challenges\"></a></td>
                      <td><a href=\"http://www.frenchweb.fr/startup-semaine-play-tv-la-television-en-direct-sur-le-web-61280\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 59
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/frenchweb.jpg\" alt=\"Logo FrenchWeb\"></a></td>
                      <td><a href=\"";
        // line 60
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/lemonde_022011.jpg\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/logo_lemonde.jpg\" alt=\"Logo Le Monde\"></a></td>
                      <td><a href=\"";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/lexpress_article.jpg\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/lexpress.jpg\" alt=\"Logo L'Express\"></a></td>
                      <td><a href=\"http://www.ouest-france.fr/http/wwwplaytvfr-629726\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/ouestFrance.jpg\" alt=\"Logo Ouest France\"></a></td>
                      <td><img src=\"";
        // line 63
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/franceinfo.jpg\" alt=\"Logo France Info\"></td>
                    </tr>
                    <tr>
                      <td><a href=\"http://www.clubic.com/actualite-322210-play-tv-television-gratuite-en-ligne.html\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 66
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/clubic.jpg\" alt=\"Logo Clubic\"></a></td>
                      <td><a href=\"http://www.presse-citron.net/playtv-pour-regarder-la-tele-sans-tele-et-sans-logiciel/\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/pressecitron.jpg\" alt=\"Logo Presse Citron\"></a></td>
                      <td><a href=\"http://www.universfreebox.com/article/10222/Avec-play-TV-accedez-a-50-chaines-et-a-Freebox-TV-depuis-votre-ordinateur\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 68
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/universfreebox.jpg\" alt=\"Logo Univers Freebox\"></a></td>
                      <td><a href=\"http://blogs.lecho.be/tzine/2010/02/la-tv-gratuite.html\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/lecho.jpg\" alt=\"Logo L'Echo\"></a></td>
                      <td><a href=\"";
        // line 70
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/Artcile_MicroHebdo_DoublePage.jpg\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/MicroHebdoLOGO.jpg\" alt=\"Logo MicroHebdo\"></a></td>
                      <td><a href=\"http://startup-academy.net/participation-de-la-socit-playmedia-playtv-fr/\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 71
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/startup-academy.jpg\" alt=\"Logo Startup Academy\"></a></td>
                    </tr>
                    <tr>
                      <td><a href=\"http://www.01net.com/astuces/1-je-ne-veux-rien-depenser-523685.html\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 74
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/01net.jpg\" alt=\"Logo 01 Net\"></a></td>
                      <td><a href=\"http://www.radins.com/bons-plans/autre/gratuit-regarde-gratuitement-la-television-sur-ton-pc\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 75
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/radins.png\" alt=\"Logo Radins.com\"></a></td>
                      <td><a href=\"http://www.begeek.fr/play-tv-le-vrai-service-de-television-sur-internet-86031\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 76
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/vendeesign.jpg\" alt=\"Logo Vendeesign\"></a></td>
                      <td><a href=\"http://www.express.be/business/fr/technology/regarder-la-tlvision-sur-le-net-avec-playtv/119981.htm\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 77
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/express-be.jpg\" alt=\"Logo Express.be\"></a></td>
                      <td><a href=\"http://www.satellifax.com/2010/01/28/play-media-lancement-de-play-tv-plate-forme-de-diffusion-gratuite-de-chaines-sur-le-net\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 78
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/satellifax.jpg\" alt=\"Satellifax\"></a></td>
                      <td><a href=\"http://www.freenews.fr/freenews-edition-nationale-299/actu-du-net-178/play-tv-regardez-la-television-gratuitement-sur-le-net-7696\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 79
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/freenews.jpg\" alt=\"Logo Freenews\"></a></td>
                    </tr>
                    <tr>
                      <td><a href=\"";
        // line 82
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/MicroHebdo.jpg\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/MicroHebdoLOGO.jpg\" alt=\"Logo MicroHebdo\"></a></td>
                      <td><a href=\"http://www.macg.co/2010/01/de-la-t%C3%A9l%C3%A9-par-ip-gratuite-6657\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 83
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/macgeneration.jpg\" alt=\"Logo MacGeneration\"></a></td>
                      <td><a href=\"http://www.masculin.com/news/2110-play-tv-tele-gratuite-sur-ordinateur.html\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 84
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/masculin.jpg\" alt=\"Logo Masculin.com\"></a></td>
                      <td><img src=\"";
        // line 85
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/top500sites.jpg\" alt=\"Logo Top 500 sites\"></td>
                      <td><img src=\"";
        // line 86
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/internetpratique.jpg\" alt=\"Logo Internet Pratique\"></td>
                      <td><a href=\"http://www.numerama.com/magazine/14940-playtvfr-propose-la-tv-gratuite-et-legale-en-streaming.html\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 87
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/numerama.jpg\" alt=\"Logo Numerama\"></a></td>
                    </tr>
                    <tr>
                      <td>
                        <a href=\"http://www.generation-nt.com/play-tv-television-gratuit-internet-actualite-951101.html\" rel=\"nofollow\" target=\"_blank\">
                          <img src=\"";
        // line 92
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/gnt.jpg\" alt=\"Logo Generation NT\">
                        </a>
                      </td>
                      <td>
                        <a href=\"http://www.ozap.com/actu/play-tv-poste-television-gratuit-ligne/322320\" rel=\"nofollow\" target=\"_blank\"><img src=\"";
        // line 96
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/img/img_public/ozap.jpg\" alt=\"Logo Ozap.com\"></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
        return "controllers/pages/presse.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  239 => 96,  232 => 92,  224 => 87,  220 => 86,  216 => 85,  212 => 84,  208 => 83,  202 => 82,  196 => 79,  192 => 78,  188 => 77,  184 => 76,  180 => 75,  176 => 74,  170 => 71,  164 => 70,  160 => 69,  156 => 68,  152 => 67,  148 => 66,  142 => 63,  138 => 62,  132 => 61,  126 => 60,  122 => 59,  116 => 58,  104 => 49,  96 => 46,  90 => 43,  84 => 40,  78 => 37,  72 => 34,  69 => 33,  64 => 26,  58 => 23,  52 => 20,  40 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
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
/*         <div class="span13">*/
/*             <div class="page-title">*/
/*                 <h1>Page. <span class="red">La presse parle de nous !</span></h1>*/
/*                 <p class="sub-title">Retrouver les mentions de Play TV dans la presse papier et Internet.</p>*/
/*             </div>*/
/*             <div class="text">*/
/*                 <h2>Communiqués de presse</h2>*/
/*                 <ul>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/cp-ptv-fashiontv.pdf" title="Fashion TV signe un accord de distribution avec Play TV" target="_blank">Le 24 Septembre 2014</a> : Fashion TV signe un accord de distribution avec Play TV <a href="//blog.playtv.fr/2014/09/fashion-tv-signe-un-accord-de-distribution-avec-play-tv/" target="_blank">Lire l'article</a>.*/
/*                     </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/cp-ptv-equipe21.pdf" title="Play TV et l'Equipe 21 signent un accord de distribution" target="_blank">Le 17 Septembre 2014</a> : Play TV et l’Équipe 21 signent un accord de distribution <a href="//blog.playtv.fr/2014/09/play-tv-et-lequipe-21-signent-un-accord-de-distribution/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/communique_de_presse_16072014.pdf" title="Play TV élargit son offre et signe avec 17 nouvelles chaînes diffusées gratuitement et en direct !" target="_blank" >Le 16 Juillet 2014</a> : Play TV élargit son offre et signe avec 17 nouvelles chaînes diffusées gratuitement et en direct ! <a href="//blog.playtv.fr/2014/07/play-tv-elargit-son-offre-et-signe-avec-17-nouvelles-chaines/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   {#*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/CP_Wibox_PlayTV_230712.pdf" title="Wibox choisit Play TV pour son service de TV sur PC" target="_blank" >Le 23 Juillet 2012</a> : Wibox choisit Play TV pour son service de TV sur PC <a href="//blog.playtv.fr/2012/07/wibox-choisit-play-tv-pour-son-service-de-tv-sur-pc/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   #}*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/CPV2.pdf" title="Communiqué presse du 22 mars 2012" target="_blank">Le 22 Mars 2012</a> : Play TV annonce sa nouvelle version <a href="//blog.playtv.fr/2012/03/play-tv-2-en-avant-premiere/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/cp18mois.pdf" title="Communiqué presse du 4 juillet 2011" target="_blank">Le 4 Juillet 2011</a> : 18 mois après sa création, Play TV fait le bilan. <a href="//blog.playtv.fr/2011/07/18-mois-apres-sa-creation-play-tv-fait-le-bilan/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/CP_16062011_AffaireDSK.pdf" title="Communiqué presse du 16 juin 2011" target="_blank">Le 16 Juin 2011</a> : Affaire #DSK, la TV traditionnelle bousculée par Twitter. <a href="//blog.playtv.fr/2011/06/affaire-dsk-la-tv-traditionnelle-bousculee-par-twitter/" target="_blank">Lire l'article</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/communique_de_presse_10022011.pdf" title="Communiqué presse du 10 février 2011" target="_blank">Le 10 Février 2011</a> : Le bouquet Play TV est disponible sur <strong>adslTV</strong>. <a href="//blog.playtv.fr/2011/02/le-bouquet-play-tv-est-disponible-sur-le-logiciel-adsl-tv/">Lire l'article</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/CP%20Etude%20TV%20en%20ligne_NPA_PlayTV_27%20janv%202011.pdf" title="Communiqué presse du 27 janvier 2011" target="_blank">Le 27 Janvier 2011</a> : Étude sur la TV linéaire, l'autre façon de regarder la télévision. <a href="{{ static_base_url }}/files/Etude%20TV%20en%20ligne_NPA_PlayTV_27%20janv%202011.pdf" title="Étude sur la TV linéaire" target="_blank">Télécharger l'étude complète</a>.*/
/*                   </li>*/
/*                   <li>*/
/*                     <a href="{{ static_base_url }}/files/communique_de_presse_270110.pdf" title="Communiqué presse du 27 janvier 2010" target="_blank">Le 27 Janvier 2010</a> : Play TV, la première plateforme de <strong>télévision gratuite et légale sur internet</strong>.*/
/*                   </li>*/
/*                 </ul>*/
/* */
/*                 <h2>Ils parlent de Play TV</h2>*/
/* */
/*                 <table style="width:100%;">*/
/*                   <tbody>*/
/*                     <tr>*/
/*                       <td><a href="{{ static_base_url }}/img/img_public/challenges_app_playtv.jpg" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/challenges_logo.jpg" alt="Logo Challenges"></a></td>*/
/*                       <td><a href="http://www.frenchweb.fr/startup-semaine-play-tv-la-television-en-direct-sur-le-web-61280" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/frenchweb.jpg" alt="Logo FrenchWeb"></a></td>*/
/*                       <td><a href="{{ static_base_url }}/img/img_public/lemonde_022011.jpg" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/logo_lemonde.jpg" alt="Logo Le Monde"></a></td>*/
/*                       <td><a href="{{ static_base_url }}/img/img_public/lexpress_article.jpg" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/lexpress.jpg" alt="Logo L'Express"></a></td>*/
/*                       <td><a href="http://www.ouest-france.fr/http/wwwplaytvfr-629726" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/ouestFrance.jpg" alt="Logo Ouest France"></a></td>*/
/*                       <td><img src="{{ static_base_url }}/img/img_public/franceinfo.jpg" alt="Logo France Info"></td>*/
/*                     </tr>*/
/*                     <tr>*/
/*                       <td><a href="http://www.clubic.com/actualite-322210-play-tv-television-gratuite-en-ligne.html" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/clubic.jpg" alt="Logo Clubic"></a></td>*/
/*                       <td><a href="http://www.presse-citron.net/playtv-pour-regarder-la-tele-sans-tele-et-sans-logiciel/" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/pressecitron.jpg" alt="Logo Presse Citron"></a></td>*/
/*                       <td><a href="http://www.universfreebox.com/article/10222/Avec-play-TV-accedez-a-50-chaines-et-a-Freebox-TV-depuis-votre-ordinateur" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/universfreebox.jpg" alt="Logo Univers Freebox"></a></td>*/
/*                       <td><a href="http://blogs.lecho.be/tzine/2010/02/la-tv-gratuite.html" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/lecho.jpg" alt="Logo L'Echo"></a></td>*/
/*                       <td><a href="{{ static_base_url }}/img/img_public/Artcile_MicroHebdo_DoublePage.jpg" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/MicroHebdoLOGO.jpg" alt="Logo MicroHebdo"></a></td>*/
/*                       <td><a href="http://startup-academy.net/participation-de-la-socit-playmedia-playtv-fr/" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/startup-academy.jpg" alt="Logo Startup Academy"></a></td>*/
/*                     </tr>*/
/*                     <tr>*/
/*                       <td><a href="http://www.01net.com/astuces/1-je-ne-veux-rien-depenser-523685.html" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/01net.jpg" alt="Logo 01 Net"></a></td>*/
/*                       <td><a href="http://www.radins.com/bons-plans/autre/gratuit-regarde-gratuitement-la-television-sur-ton-pc" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/radins.png" alt="Logo Radins.com"></a></td>*/
/*                       <td><a href="http://www.begeek.fr/play-tv-le-vrai-service-de-television-sur-internet-86031" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/vendeesign.jpg" alt="Logo Vendeesign"></a></td>*/
/*                       <td><a href="http://www.express.be/business/fr/technology/regarder-la-tlvision-sur-le-net-avec-playtv/119981.htm" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/express-be.jpg" alt="Logo Express.be"></a></td>*/
/*                       <td><a href="http://www.satellifax.com/2010/01/28/play-media-lancement-de-play-tv-plate-forme-de-diffusion-gratuite-de-chaines-sur-le-net" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/satellifax.jpg" alt="Satellifax"></a></td>*/
/*                       <td><a href="http://www.freenews.fr/freenews-edition-nationale-299/actu-du-net-178/play-tv-regardez-la-television-gratuitement-sur-le-net-7696" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/freenews.jpg" alt="Logo Freenews"></a></td>*/
/*                     </tr>*/
/*                     <tr>*/
/*                       <td><a href="{{ static_base_url }}/img/img_public/MicroHebdo.jpg" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/MicroHebdoLOGO.jpg" alt="Logo MicroHebdo"></a></td>*/
/*                       <td><a href="http://www.macg.co/2010/01/de-la-t%C3%A9l%C3%A9-par-ip-gratuite-6657" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/macgeneration.jpg" alt="Logo MacGeneration"></a></td>*/
/*                       <td><a href="http://www.masculin.com/news/2110-play-tv-tele-gratuite-sur-ordinateur.html" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/masculin.jpg" alt="Logo Masculin.com"></a></td>*/
/*                       <td><img src="{{ static_base_url }}/img/img_public/top500sites.jpg" alt="Logo Top 500 sites"></td>*/
/*                       <td><img src="{{ static_base_url }}/img/img_public/internetpratique.jpg" alt="Logo Internet Pratique"></td>*/
/*                       <td><a href="http://www.numerama.com/magazine/14940-playtvfr-propose-la-tv-gratuite-et-legale-en-streaming.html" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/numerama.jpg" alt="Logo Numerama"></a></td>*/
/*                     </tr>*/
/*                     <tr>*/
/*                       <td>*/
/*                         <a href="http://www.generation-nt.com/play-tv-television-gratuit-internet-actualite-951101.html" rel="nofollow" target="_blank">*/
/*                           <img src="{{ static_base_url }}/img/img_public/gnt.jpg" alt="Logo Generation NT">*/
/*                         </a>*/
/*                       </td>*/
/*                       <td>*/
/*                         <a href="http://www.ozap.com/actu/play-tv-poste-television-gratuit-ligne/322320" rel="nofollow" target="_blank"><img src="{{ static_base_url }}/img/img_public/ozap.jpg" alt="Logo Ozap.com"></a>*/
/*                       </td>*/
/*                     </tr>*/
/*                   </tbody>*/
/*                 </table>*/
/*             </div>*/
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
