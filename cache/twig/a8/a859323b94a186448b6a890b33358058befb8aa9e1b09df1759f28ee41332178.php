<?php

/* controllers/television/_television.twig */
class __TwigTemplate_2c78f7a89b582b031c5faccb6d4c8c979e76946ca9665c7694eb1fab17be7c12 extends Twig_Template
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
        echo "<div id=\"television\" class=\"pmd-js-TelevisionContainer pmd-TelevisionContainer\" data-responsive=\"";
        echo ((( !array_key_exists("player_responsive", $context) || (isset($context["player_responsive"]) ? $context["player_responsive"] : $this->getContext($context, "player_responsive")))) ? ("true") : ("false"));
        echo "\">

  <div class=\"container\">

    <div class=\"pmd-TelevisionWrapper\">

      <div class=\"pmd-TelevisionPlayer\">
        <div class=\"notice-adb-container\">
          ";
        // line 9
        if (array_key_exists("adb", $context)) {
            // line 10
            echo "            ";
            echo (isset($context["adb"]) ? $context["adb"] : $this->getContext($context, "adb"));
            echo "
          ";
        } else {
            // line 12
            echo "          <div class=\"notice-adb\">
            <div class=\"big-text\">
              <p>
                <strong>Il semblerait que vous utilisiez un logiciel anti-pub.
                <a href=\"";
            // line 16
            echo $this->env->getExtension('routing')->getPath("faq_adblock");
            echo "\">En savoir plus...</a></strong>
              </p>
            </div>
          </div>

          <button type=\"button\" class=\"pmd-js-TelevisionAdsNotification pmd-TelevisionAdsNotification r-ResetButton\">Supprimer la publicité</button>
          <div class=\"player-background\">
            <div id=\"player\">
            ";
            // line 24
            if (array_key_exists("player_embed", $context)) {
                // line 25
                echo "              ";
                echo $this->getAttribute($this->getAttribute((isset($context["player_embed"]) ? $context["player_embed"] : $this->getContext($context, "player_embed")), "html", array()), "player", array());
                echo "
              <script>
                (function(win, doc, App) {
                  App.Data = App.Data || {}
                  ";
                // line 29
                if ((("streamable" == $this->getAttribute((isset($context["player_embed"]) ? $context["player_embed"] : $this->getContext($context, "player_embed")), "state", array())) || ("external-iframe" == $this->getAttribute((isset($context["player_embed"]) ? $context["player_embed"] : $this->getContext($context, "player_embed")), "state", array())))) {
                    // line 30
                    echo "                  App.Data = ";
                    echo twig_jsonencode_filter($this->getAttribute($this->getAttribute((isset($context["player_embed"]) ? $context["player_embed"] : $this->getContext($context, "player_embed")), "javascript", array()), "Data", array()));
                    echo "
                  App.Data.playerState = ";
                    // line 31
                    echo twig_jsonencode_filter($this->getAttribute((isset($context["player_embed"]) ? $context["player_embed"] : $this->getContext($context, "player_embed")), "state", array()));
                    echo "
                  ";
                }
                // line 33
                echo "                  App.Data.viewLayout = '";
                echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")), "html", null, true);
                echo "'

                })(window, window.document, window.ptv || (window.ptv = {}));
              </script>
            ";
            } else {
                // line 38
                echo "              ";
                $this->loadTemplate("controllers/television/_index.twig", "controllers/television/_television.twig", 38)->display($context);
                // line 39
                echo "              <script>
                (function(win, doc, App) {
                  App.Data = App.Data || {}

                  App.Data.viewLayout = '";
                // line 43
                echo twig_escape_filter($this->env, (isset($context["layout"]) ? $context["layout"] : $this->getContext($context, "layout")), "html", null, true);
                echo "'

                })(window, window.document, window.ptv || (window.ptv = {}));
              </script>
            ";
            }
            // line 48
            echo "            </div>
          </div>
          ";
        }
        // line 51
        echo "        </div>
      </div>

      <div class=\"pmd-TelevisionRemote\">
         ";
        // line 55
        $this->loadTemplate("controllers/television/_remote.twig", "controllers/television/_television.twig", 55)->display($context);
        // line 56
        echo "      </div>


    </div>

  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/television/_television.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 56,  115 => 55,  109 => 51,  104 => 48,  96 => 43,  90 => 39,  87 => 38,  78 => 33,  73 => 31,  68 => 30,  66 => 29,  58 => 25,  56 => 24,  45 => 16,  39 => 12,  33 => 10,  31 => 9,  19 => 1,);
    }
}
/* <div id="television" class="pmd-js-TelevisionContainer pmd-TelevisionContainer" data-responsive="{{ player_responsive is not defined or player_responsive ? 'true' : 'false' }}">*/
/* */
/*   <div class="container">*/
/* */
/*     <div class="pmd-TelevisionWrapper">*/
/* */
/*       <div class="pmd-TelevisionPlayer">*/
/*         <div class="notice-adb-container">*/
/*           {% if adb is defined %}*/
/*             {{ adb|raw }}*/
/*           {% else %}*/
/*           <div class="notice-adb">*/
/*             <div class="big-text">*/
/*               <p>*/
/*                 <strong>Il semblerait que vous utilisiez un logiciel anti-pub.*/
/*                 <a href="{{ path('faq_adblock') }}">En savoir plus...</a></strong>*/
/*               </p>*/
/*             </div>*/
/*           </div>*/
/* */
/*           <button type="button" class="pmd-js-TelevisionAdsNotification pmd-TelevisionAdsNotification r-ResetButton">Supprimer la publicité</button>*/
/*           <div class="player-background">*/
/*             <div id="player">*/
/*             {% if player_embed is defined %}*/
/*               {{ player_embed.html.player|raw }}*/
/*               <script>*/
/*                 (function(win, doc, App) {*/
/*                   App.Data = App.Data || {}*/
/*                   {% if 'streamable' == player_embed.state or 'external-iframe' == player_embed.state %}*/
/*                   App.Data = {{ player_embed.javascript.Data|json_encode()|raw }}*/
/*                   App.Data.playerState = {{ player_embed.state|json_encode()|raw }}*/
/*                   {% endif %}*/
/*                   App.Data.viewLayout = '{{ layout }}'*/
/* */
/*                 })(window, window.document, window.ptv || (window.ptv = {}));*/
/*               </script>*/
/*             {% else %}*/
/*               {% include "controllers/television/_index.twig" %}*/
/*               <script>*/
/*                 (function(win, doc, App) {*/
/*                   App.Data = App.Data || {}*/
/* */
/*                   App.Data.viewLayout = '{{ layout }}'*/
/* */
/*                 })(window, window.document, window.ptv || (window.ptv = {}));*/
/*               </script>*/
/*             {% endif %}*/
/*             </div>*/
/*           </div>*/
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/* */
/*       <div class="pmd-TelevisionRemote">*/
/*          {% include "controllers/television/_remote.twig" %}*/
/*       </div>*/
/* */
/* */
/*     </div>*/
/* */
/*   </div>*/
/* */
/* </div>*/
/* */
