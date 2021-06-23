<?php

/* controllers/aide/support.twig */
class __TwigTemplate_2de8a183af653a36674628084589a4ea48e620a3337ea023d39746ae7e1e8069 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/aide/support.twig", 1);
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

    // line 2
    public function block_content($context, array $blocks = array())
    {
        // line 3
        echo "<div id=\"content\" class=\"pmd-js-HelpSupport\">
  <div class=\"container\">
    <div class=\"row\">
      <div class=\"span3 sep\">
        ";
        // line 7
        $this->loadTemplate("controllers/aide/_menu.twig", "controllers/aide/support.twig", 7)->display($context);
        // line 8
        echo "      </div>
      <div class=\"span13\">
        <div class=\"row\">
          <div class=\"span8\">
            <div class=\"page-title\">
              <h1>";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("Help", array(), "messages");
        echo ". <span class=\"red\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Support", array(), "messages");
        echo "</span></h1>
              ";
        // line 14
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 15
            echo "              <p class=\"sub-title\">Vous n'avez pas trouvé de réponse dans la FAQ ? Contactez le support.</p>
              ";
        }
        // line 17
        echo "            </div>
            <div class=\"\">
              <form id=\"support-form\" action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("help_support");
        echo "\" method=\"\" class=\"pmd-js-HelpSupport-form\">
                ";
        // line 20
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "post", array(), "any", false, true), "report", array(), "any", true, true)) {
            // line 21
            echo "                <p class=\"grey-box margin\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Error report</strong>: <span class=\"clear-grey\">an error report will be attached to your message.</span>", array(), "messages");
            echo "</p>
                <input type=\"hidden\" name=\"report\" value=\"";
            // line 22
            echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "post", array()), "report", array())), "html", null, true);
            echo "\" />
                ";
        }
        // line 24
        echo "                <p>
                  <label for=\"support-email\" class=\"pmd-Label\"><strong>";
        // line 25
        echo $this->env->getExtension('translator')->getTranslator()->trans("Email address", array(), "messages");
        echo "</strong></label>
                </p>
                <p>
                  <input type=\"text\" id=\"support-email\" name=\"email\" value=\"";
        // line 28
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "post", array(), "any", false, true), "email", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "post", array()), "email", array())), "html", null, true);
        }
        echo "\" class=\"pmd-Input pmd-Input--block\" placeholder=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("ex: john.doe@email.com", array(), "messages");
        echo "\" />
                </p>
                <p>
                  <label for=\"support-message\" class=\"pmd-Label\"><strong>";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("Message", array(), "messages");
        echo "</strong></label>
                </p>
                <p class=\"margin\">
                  <textarea id=\"support-message\" name=\"message\" placeholder=\"";
        // line 34
        echo $this->env->getExtension('translator')->getTranslator()->trans("Insert your message here.", array(), "messages");
        echo "\" class=\"pmd-Textarea pmd-Textarea--verticalResize pmd-Textarea--block\" style=\"height:200px\">";
        if ($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "post", array(), "any", false, true), "message", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, trim($this->getAttribute($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "post", array()), "message", array())), "html", null, true);
        }
        echo "</textarea>
                </p>
                <input class=\"pmd-js-HelpSupport-flash\" type=\"hidden\" name=\"flashVersion\" value=\"\" />
                ";
        // line 37
        if ($this->getAttribute((isset($context["request"]) ? $context["request"] : null), "referer", array(), "any", true, true)) {
            echo "<input type=\"hidden\" name=\"referer\" value=\"";
            echo twig_escape_filter($this->env, trim($this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "referer", array())), "html", null, true);
            echo "\" />";
        }
        // line 38
        echo "                <div class=\"pmd-js-HelpSupport-alert pmd-Alert pmd-Alert--hidden\"></div>
                <p class=\"pmd-Text--center\">
                  <button type=\"submit\" class=\"pmd-js-HelpSupport-submitButton pmd-Button pmd-Button--primary pmd-Button--lg ladda-button\" data-style=\"zoom-out\"><span class=\"ladda-label\">";
        // line 40
        echo $this->env->getExtension('translator')->getTranslator()->trans("Contact support", array(), "messages");
        echo "</span></button>
                </p>
              </form>
            </div>
          </div>
          <div class=\"span4 offset1 text\">
            ";
        // line 46
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 47
            echo "            <h2 class=\"xmargin\" style=\"margin-top:5px;\">Avez-vous consulté la rubrique d'aide ?</h2>
            <p class=\"justify\"><a href=\"/faq/\"><strong>Les rubriques d'aide</strong></a> regroupent les questions les plus fréquentes de nos utilisateurs, pensez à les consulter.</p>
            ";
        }
        // line 50
        echo "            <h2 class=\"xmargin\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Any troubles with the form?", array(), "messages");
        echo "</h2>
            <p class=\"justify\">";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("You can't send messages from our form?<br>Contact Olivia directly via email:<br><strong><a href=\"mailto:%email%\">%email%</a></strong>", array("%email%" => "olivia@playmedia.fr"), "messages");
        echo "</p>
            ";
        // line 52
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 53
            echo "            <h2 class=\"xmargin\">Rapport d'erreur</h2>
            <p class=\"justify\">Un problème technique pour regarder la télévision ? Joignez un rapport d'erreur à votre message. <a href=\"/faq/rapport-erreur/\"><strong>Comment faire ?</strong></a></p>
            ";
        }
        // line 56
        echo "          </div>
        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/aide/support.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 56,  150 => 53,  148 => 52,  144 => 51,  139 => 50,  134 => 47,  132 => 46,  123 => 40,  119 => 38,  113 => 37,  103 => 34,  97 => 31,  87 => 28,  81 => 25,  78 => 24,  73 => 22,  68 => 21,  66 => 20,  62 => 19,  58 => 17,  54 => 15,  52 => 14,  46 => 13,  39 => 8,  37 => 7,  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* {% block content %}*/
/* <div id="content" class="pmd-js-HelpSupport">*/
/*   <div class="container">*/
/*     <div class="row">*/
/*       <div class="span3 sep">*/
/*         {% include "controllers/aide/_menu.twig" %}*/
/*       </div>*/
/*       <div class="span13">*/
/*         <div class="row">*/
/*           <div class="span8">*/
/*             <div class="page-title">*/
/*               <h1>{% trans %}Help{% endtrans %}. <span class="red">{% trans %}Support{% endtrans %}</span></h1>*/
/*               {% if is_website_fr %}*/
/*               <p class="sub-title">Vous n'avez pas trouvé de réponse dans la FAQ ? Contactez le support.</p>*/
/*               {% endif %}*/
/*             </div>*/
/*             <div class="">*/
/*               <form id="support-form" action="{{ path('help_support') }}" method="" class="pmd-js-HelpSupport-form">*/
/*                 {% if request.post.report is defined %}*/
/*                 <p class="grey-box margin">{% trans %}<strong>Error report</strong>: <span class="clear-grey">an error report will be attached to your message.</span>{% endtrans %}</p>*/
/*                 <input type="hidden" name="report" value="{{ request.post.report|trim }}" />*/
/*                 {% endif %}*/
/*                 <p>*/
/*                   <label for="support-email" class="pmd-Label"><strong>{% trans %}Email address{% endtrans %}</strong></label>*/
/*                 </p>*/
/*                 <p>*/
/*                   <input type="text" id="support-email" name="email" value="{% if request.post.email is defined %}{{ request.post.email|trim }}{% endif %}" class="pmd-Input pmd-Input--block" placeholder="{% trans %}ex: john.doe@email.com{% endtrans %}" />*/
/*                 </p>*/
/*                 <p>*/
/*                   <label for="support-message" class="pmd-Label"><strong>{% trans %}Message{% endtrans %}</strong></label>*/
/*                 </p>*/
/*                 <p class="margin">*/
/*                   <textarea id="support-message" name="message" placeholder="{% trans %}Insert your message here.{% endtrans %}" class="pmd-Textarea pmd-Textarea--verticalResize pmd-Textarea--block" style="height:200px">{% if request.post.message is defined %}{{ request.post.message|trim }}{% endif %}</textarea>*/
/*                 </p>*/
/*                 <input class="pmd-js-HelpSupport-flash" type="hidden" name="flashVersion" value="" />*/
/*                 {% if request.referer is defined %}<input type="hidden" name="referer" value="{{ request.referer|trim }}" />{% endif %}*/
/*                 <div class="pmd-js-HelpSupport-alert pmd-Alert pmd-Alert--hidden"></div>*/
/*                 <p class="pmd-Text--center">*/
/*                   <button type="submit" class="pmd-js-HelpSupport-submitButton pmd-Button pmd-Button--primary pmd-Button--lg ladda-button" data-style="zoom-out"><span class="ladda-label">{% trans %}Contact support{% endtrans %}</span></button>*/
/*                 </p>*/
/*               </form>*/
/*             </div>*/
/*           </div>*/
/*           <div class="span4 offset1 text">*/
/*             {% if is_website_fr %}*/
/*             <h2 class="xmargin" style="margin-top:5px;">Avez-vous consulté la rubrique d'aide ?</h2>*/
/*             <p class="justify"><a href="/faq/"><strong>Les rubriques d'aide</strong></a> regroupent les questions les plus fréquentes de nos utilisateurs, pensez à les consulter.</p>*/
/*             {% endif %}*/
/*             <h2 class="xmargin">{% trans %}Any troubles with the form?{% endtrans %}</h2>*/
/*             <p class="justify">{% trans with {'%email%': 'olivia@playmedia.fr'} %}You can't send messages from our form?<br>Contact Olivia directly via email:<br><strong><a href="mailto:%email%">%email%</a></strong>{% endtrans %}</p>*/
/*             {% if is_website_fr %}*/
/*             <h2 class="xmargin">Rapport d'erreur</h2>*/
/*             <p class="justify">Un problème technique pour regarder la télévision ? Joignez un rapport d'erreur à votre message. <a href="/faq/rapport-erreur/"><strong>Comment faire ?</strong></a></p>*/
/*             {% endif %}*/
/*           </div>*/
/*         </div>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* </div>*/
/* {% endblock content %}*/
/* */
