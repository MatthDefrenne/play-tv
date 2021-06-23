<?php

/* partials/footer.twig */
class __TwigTemplate_b85460460601204bf332d78b7432b5ea9c9e91432c81c84e10e62a0b48dbe5c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<footer class=\"pmd-Footer\">
  <div class=\"container\">

    ";
        // line 5
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 6
            echo "
      ";
            // line 7
            if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light")) {
                // line 8
                echo "      <nav id=\"footer-menus\" class=\"row\">

        <div class=\"span4\">
          <p class=\"title\">Télévision et Replay TV</p>
          <ul>
            <li><a href=\"/\">Bienvenue sur Play TV</a></li>
            <li><a href=\"/television/\">Regarder la télévision en direct</a></li>
            <li><a href=\"/television/mosaique/\">Toutes les chaînes de télé</a></li>
            <li><a href=\"/toplive/\">Top Live! Audiences en direct</a></li>
            <li><a href=\"/replay-tv/\">Replay TV, revoir les programmes</a></li>
          </ul>
        </div>

        <div class=\"span4\">
          <p class=\"title\">Guide programmes TV</p>
          <ul>
            <li><a href=\"/programmes-tv/\">Guide des programmes tv</a></li>
            <li><a href=\"/programmes-tv/en-direct/\">Programmes télé en direct</a></li>
            <li><a href=\"/programmes-tv/ce-soir/\">Programmes tv de la soirée</a></li>
            <li><a href=\"/programmes-tv/a-ne-pas-manquer/\">Programmes à ne pas manquer</a></li>
            <li><a href=\"/recherche/\">Rechercher un programme tv</a></li>
          </ul>
        </div>

        <div class=\"span4\">
          <p class=\"title\">Annexes de Play TV</p>
          <ul>
            <li><a href=\"/faq/\">Questions fréquentes (FAQ)</a></li>
            <li><a href=\"/aide/support/\">Support technique (contact)</a></li>
            <li><a href=\"/pages/presse/\">La presse parle de Play TV</a></li>
            <li><a href=\"";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "blog", array()), "html", null, true);
                echo "/\">Le blog de l'équipe (news)</a></li>
            <li><a href=\"/pages/a-propos/\">Qui sommes-nous ?</a></li>
          </ul>
        </div>

        <div class=\"span4\">
          <p class=\"title\">Plus de Play TV</p>
          <ul>
            <li><a href=\"/pages/jobs/\">Jobs (offres d'emploi)</a></li>
            <li><a href=\"/pages/publicite/\">Publicité / Annonceurs</a></li>
            <li><a href=\"/pages/mentions-legales/\">Mentions légales</a></li>
            <li><a href=\"/pages/cgu/\">Conditions générales d'utilisation</a></li>
            <li><a href=\"/pages/cgv/\">Conditions générales de vente</a></li>
            <li><a href=\"/pages/donnees-personnelles/\">Données personnelles</a></li>
          </ul>
        </div>

      </nav>

      ";
            }
            // line 58
            echo "
      <p id=\"footer-copyright\" class=\"span16\">
        <a href=\"//playmedia.fr\">
          <img
            id=\"logo-playmedia\"
            src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
            data-src=\"";
            // line 64
            echo twig_escape_filter($this->env, (isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")), "html", null, true);
            echo "/images/icons/logo-playmedia.png\"
            width=\"151\"
            height=\"26\"
            onload=\"lzld(this)\"
            title=\"Play Media\"
            alt=\"Play Media\">
        </a>
        <span>© Copyright 2008 - ";
            // line 71
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "Y"), "html", null, true);
            echo " <a href=\"//playmedia.fr\">Play Media SAS</a>. Tous droits réservés.</span>
      </p>

    ";
        } else {
            // line 75
            echo "
      ";
            // line 76
            if (((isset($context["skin"]) ? $context["skin"] : $this->getContext($context, "skin")) != "light")) {
                // line 77
                echo "      <div class=\"ptv-Footer-row\">

        <script>
          function configureCookies() {
            if (window.__cmp && onSetConsent) {
              window.__cmp('setConsentUiCallback', onSetConsent);
              window.__cmp(\"displayConsentUi\");
            }
          }
        </script>

        <div class=\"ptv-FooterI18n-links\">
          <a href=\"/live-tv/\">";
                // line 89
                echo $this->env->getExtension('translator')->getTranslator()->trans("Live TV", array(), "messages");
                echo "</a> -
          <a href=\"/tv-guide/\">";
                // line 90
                echo $this->env->getExtension('translator')->getTranslator()->trans("TV guide", array(), "messages");
                echo "</a> -
          <a href=\"/tv-guide/now/\">";
                // line 91
                echo $this->env->getExtension('translator')->getTranslator()->trans("On air", array(), "messages");
                echo "</a> -
          <a href=\"javascript:configureCookies();\">";
                // line 92
                echo $this->env->getExtension('translator')->getTranslator()->trans("Cookies", array(), "messages");
                echo "</a> -
          <a href=\"/search/\">";
                // line 93
                echo $this->env->getExtension('translator')->getTranslator()->trans("Search", array(), "messages");
                echo "</a>
        </div>

      </div>
      ";
            }
            // line 98
            echo "
    ";
        }
        // line 100
        echo "
  </div>
</footer>
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  160 => 100,  156 => 98,  148 => 93,  144 => 92,  140 => 91,  136 => 90,  132 => 89,  118 => 77,  116 => 76,  113 => 75,  106 => 71,  96 => 64,  88 => 58,  65 => 38,  33 => 8,  31 => 7,  28 => 6,  26 => 5,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <footer class="pmd-Footer">*/
/*   <div class="container">*/
/* */
/*     {% if is_website_fr %}*/
/* */
/*       {% if skin != 'light' %}*/
/*       <nav id="footer-menus" class="row">*/
/* */
/*         <div class="span4">*/
/*           <p class="title">Télévision et Replay TV</p>*/
/*           <ul>*/
/*             <li><a href="/">Bienvenue sur Play TV</a></li>*/
/*             <li><a href="/television/">Regarder la télévision en direct</a></li>*/
/*             <li><a href="/television/mosaique/">Toutes les chaînes de télé</a></li>*/
/*             <li><a href="/toplive/">Top Live! Audiences en direct</a></li>*/
/*             <li><a href="/replay-tv/">Replay TV, revoir les programmes</a></li>*/
/*           </ul>*/
/*         </div>*/
/* */
/*         <div class="span4">*/
/*           <p class="title">Guide programmes TV</p>*/
/*           <ul>*/
/*             <li><a href="/programmes-tv/">Guide des programmes tv</a></li>*/
/*             <li><a href="/programmes-tv/en-direct/">Programmes télé en direct</a></li>*/
/*             <li><a href="/programmes-tv/ce-soir/">Programmes tv de la soirée</a></li>*/
/*             <li><a href="/programmes-tv/a-ne-pas-manquer/">Programmes à ne pas manquer</a></li>*/
/*             <li><a href="/recherche/">Rechercher un programme tv</a></li>*/
/*           </ul>*/
/*         </div>*/
/* */
/*         <div class="span4">*/
/*           <p class="title">Annexes de Play TV</p>*/
/*           <ul>*/
/*             <li><a href="/faq/">Questions fréquentes (FAQ)</a></li>*/
/*             <li><a href="/aide/support/">Support technique (contact)</a></li>*/
/*             <li><a href="/pages/presse/">La presse parle de Play TV</a></li>*/
/*             <li><a href="{{ hosts.blog }}/">Le blog de l'équipe (news)</a></li>*/
/*             <li><a href="/pages/a-propos/">Qui sommes-nous ?</a></li>*/
/*           </ul>*/
/*         </div>*/
/* */
/*         <div class="span4">*/
/*           <p class="title">Plus de Play TV</p>*/
/*           <ul>*/
/*             <li><a href="/pages/jobs/">Jobs (offres d'emploi)</a></li>*/
/*             <li><a href="/pages/publicite/">Publicité / Annonceurs</a></li>*/
/*             <li><a href="/pages/mentions-legales/">Mentions légales</a></li>*/
/*             <li><a href="/pages/cgu/">Conditions générales d'utilisation</a></li>*/
/*             <li><a href="/pages/cgv/">Conditions générales de vente</a></li>*/
/*             <li><a href="/pages/donnees-personnelles/">Données personnelles</a></li>*/
/*           </ul>*/
/*         </div>*/
/* */
/*       </nav>*/
/* */
/*       {% endif %}*/
/* */
/*       <p id="footer-copyright" class="span16">*/
/*         <a href="//playmedia.fr">*/
/*           <img*/
/*             id="logo-playmedia"*/
/*             src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*             data-src="{{ apps_base_url }}/images/icons/logo-playmedia.png"*/
/*             width="151"*/
/*             height="26"*/
/*             onload="lzld(this)"*/
/*             title="Play Media"*/
/*             alt="Play Media">*/
/*         </a>*/
/*         <span>© Copyright 2008 - {{ now|date("Y") }} <a href="//playmedia.fr">Play Media SAS</a>. Tous droits réservés.</span>*/
/*       </p>*/
/* */
/*     {% else %}*/
/* */
/*       {% if skin != 'light' %}*/
/*       <div class="ptv-Footer-row">*/
/* */
/*         <script>*/
/*           function configureCookies() {*/
/*             if (window.__cmp && onSetConsent) {*/
/*               window.__cmp('setConsentUiCallback', onSetConsent);*/
/*               window.__cmp("displayConsentUi");*/
/*             }*/
/*           }*/
/*         </script>*/
/* */
/*         <div class="ptv-FooterI18n-links">*/
/*           <a href="/live-tv/">{% trans %}Live TV{% endtrans %}</a> -*/
/*           <a href="/tv-guide/">{% trans %}TV guide{% endtrans %}</a> -*/
/*           <a href="/tv-guide/now/">{% trans %}On air{% endtrans %}</a> -*/
/*           <a href="javascript:configureCookies();">{% trans %}Cookies{% endtrans %}</a> -*/
/*           <a href="/search/">{% trans %}Search{% endtrans %}</a>*/
/*         </div>*/
/* */
/*       </div>*/
/*       {% endif %}*/
/* */
/*     {% endif %}*/
/* */
/*   </div>*/
/* </footer>*/
/* {% endspaceless %}*/
/* */
