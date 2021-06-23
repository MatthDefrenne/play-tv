<?php

/* controllers/aide/config.twig */
class __TwigTemplate_020c23d35c638283d2fb34d14a48fed476f00157baea8c4719aa497a1598d47f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/aide/config.twig", 1);
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
        echo "  <div id=\"content\" class=\"pmd-js-HelpConfiguration\">
    <div class=\"container\">
      <div class=\"row\">

        <div class=\"span3 sep\">
          ";
        // line 9
        $this->loadTemplate("controllers/aide/_menu.twig", "controllers/aide/config.twig", 9)->display($context);
        // line 10
        echo "        </div>

        <div class=\"span13\">

          <div class=\"page-title\">
            <h1>Aide. <span class=\"red\">Configuration</span></h1>
            <p class=\"sub-title\">Avez-vous la configuration requise pour regarder la télévision sur ";
        // line 16
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " ?</p>
          </div>

          <div class=\"row text bigger\">
            <div class=\"span6\">
              <h2 style=\"margin-top:0;\">Votre configuration</h2>
              <table class=\"data-table\" style=\"width:100%;\">
                <tbody>
                  <tr>
                    <td style=\"width:60%\"><strong>Adobe Flash Player</strong></td>
                    <td><span class=\"pmd-js-HelpConfiguration-flash code\">?</span></td>
                  </tr>
                  <tr>
                    <td><strong>Système d'exploitation</strong></td>
                    <td><span class=\"pmd-js-HelpConfiguration-os code\">";
        // line 30
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["client_parsed_ua"]) ? $context["client_parsed_ua"] : null), "os", array(), "any", false, true), "toString", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["client_parsed_ua"]) ? $context["client_parsed_ua"] : null), "os", array(), "any", false, true), "toString", array()), "?")) : ("?")), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Navigateur web</strong></td>
                    <td><span class=\"pmd-js-HelpConfiguration-browser code\">";
        // line 34
        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute((isset($context["client_parsed_ua"]) ? $context["client_parsed_ua"] : null), "ua", array(), "any", false, true), "toString", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute((isset($context["client_parsed_ua"]) ? $context["client_parsed_ua"] : null), "ua", array(), "any", false, true), "toString", array()), "?")) : ("?")), "html", null, true);
        echo "</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class=\"offset1 span6\">
              <h2 style=\"margin-top:0;\">Accès internet</h2>
              <table class=\"data-table\" style=\"width:100%;\">
                <tbody>
                  <tr>
                    <td style=\"width:60%\"><strong>Adresse IP</strong></td>
                    <td><span class=\"code\">";
        // line 46
        echo twig_escape_filter($this->env, ((array_key_exists("client_ip", $context)) ? (_twig_default_filter((isset($context["client_ip"]) ? $context["client_ip"] : $this->getContext($context, "client_ip")), "x.x.x.x")) : ("x.x.x.x")), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Pays/région</strong></td>
                    <td><span class=\"code\">";
        // line 50
        echo twig_escape_filter($this->env, ((array_key_exists("client_country", $context)) ? (_twig_default_filter((isset($context["client_country"]) ? $context["client_country"] : $this->getContext($context, "client_country")), "?")) : ("?")), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Fournisseur d'accès à Internet</strong></td>
                    <td><span class=\"code\">";
        // line 54
        echo twig_escape_filter($this->env, ((array_key_exists("client_provider", $context)) ? (_twig_default_filter((isset($context["client_provider"]) ? $context["client_provider"] : $this->getContext($context, "client_provider")), "?")) : ("?")), "html", null, true);
        echo "</span></td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/aide/config.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 54,  94 => 50,  87 => 46,  72 => 34,  65 => 30,  48 => 16,  40 => 10,  38 => 9,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-js-HelpConfiguration">*/
/*     <div class="container">*/
/*       <div class="row">*/
/* */
/*         <div class="span3 sep">*/
/*           {% include "controllers/aide/_menu.twig" %}*/
/*         </div>*/
/* */
/*         <div class="span13">*/
/* */
/*           <div class="page-title">*/
/*             <h1>Aide. <span class="red">Configuration</span></h1>*/
/*             <p class="sub-title">Avez-vous la configuration requise pour regarder la télévision sur {{ request.host }} ?</p>*/
/*           </div>*/
/* */
/*           <div class="row text bigger">*/
/*             <div class="span6">*/
/*               <h2 style="margin-top:0;">Votre configuration</h2>*/
/*               <table class="data-table" style="width:100%;">*/
/*                 <tbody>*/
/*                   <tr>*/
/*                     <td style="width:60%"><strong>Adobe Flash Player</strong></td>*/
/*                     <td><span class="pmd-js-HelpConfiguration-flash code">?</span></td>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <td><strong>Système d'exploitation</strong></td>*/
/*                     <td><span class="pmd-js-HelpConfiguration-os code">{{ client_parsed_ua.os.toString|default('?') }}</span></td>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <td><strong>Navigateur web</strong></td>*/
/*                     <td><span class="pmd-js-HelpConfiguration-browser code">{{ client_parsed_ua.ua.toString|default('?') }}</span></td>*/
/*                   </tr>*/
/*                 </tbody>*/
/*               </table>*/
/*             </div>*/
/* */
/*             <div class="offset1 span6">*/
/*               <h2 style="margin-top:0;">Accès internet</h2>*/
/*               <table class="data-table" style="width:100%;">*/
/*                 <tbody>*/
/*                   <tr>*/
/*                     <td style="width:60%"><strong>Adresse IP</strong></td>*/
/*                     <td><span class="code">{{ client_ip|default('x.x.x.x') }}</span></td>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <td><strong>Pays/région</strong></td>*/
/*                     <td><span class="code">{{ client_country|default('?') }}</span></td>*/
/*                   </tr>*/
/*                   <tr>*/
/*                     <td><strong>Fournisseur d'accès à Internet</strong></td>*/
/*                     <td><span class="code">{{ client_provider|default('?') }}</span></td>*/
/*                   </tr>*/
/*                 </tbody>*/
/*               </table>*/
/*             </div>*/
/* */
/*           </div>*/
/* */
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* {% endblock content %}*/
/* */
