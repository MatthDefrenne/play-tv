<?php

/* controllers/bouncer/reinitialize-password.twig */
class __TwigTemplate_995f67d48c254e77fb8ef0177778ebfff3cd5cc4bb73f8c732d097bad6231b35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/bouncer/reinitialize-password.twig", 1);
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
        echo "  <div id=\"content\">
    <div class=\"container\">

      <div class=\"user-index\">

        <div class=\"main ptv-AccountProfile\">
          <h3 class=\"ptv-AccountProfile-heading\"><span class=\"ptv-AccountProfile-headingMain\">Modifier mon mot de passe</span></h3>
          <div class=\"content ptv-AccountProfileContent\">

            <form method=\"post\" action=\"/reinitialisation-mot-de-passe/\">
              <div class=\"ptv-AccountProfileLine\">
                <p class=\"ptv-AccountProfileLine-inputField\">
                  <label for=\"ptv-ChangePasswordForm-password\" class=\"ptv-AccountProfileLine-label\">Nouveau mot de passe :</label>
                  <input type=\"password\" class=\"ptv-Input";
        // line 17
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "password", array(), "any", true, true)) {
            echo " ptv-Input--error";
        }
        echo "\" name=\"password\" placeholder=\"Mot de passe\" autocomplete=\"off\">
                </p>
              </div>

              <div class=\"ptv-AccountProfileLine\">
                <p class=\"ptv-AccountProfileLine-inputField\">
                  <label for=\"ptv-ChangePasswordForm-confirmPassword\" class=\"ptv-AccountProfileLine-label\">Confirmer le mot de passe :</label>
                  <input type=\"password\" class=\"ptv-Input";
        // line 24
        if ($this->getAttribute((isset($context["errors"]) ? $context["errors"] : null), "confirmPassword", array(), "any", true, true)) {
            echo " ptv-Input--error";
        }
        echo "\" name=\"confirmPassword\" placeholder=\"Mot de passe\" autocomplete=\"off\">
                </p>
              </div>

              ";
        // line 28
        if (array_key_exists("errors", $context)) {
            // line 29
            echo "                <div class=\"ptv-Alert ptv-Alert--active ptv-Alert--error ptv-AccountProfileAlert\">
                  ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errors"]) ? $context["errors"] : $this->getContext($context, "errors")));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 31
                echo "                    <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 33
            echo "                </div>
              ";
        }
        // line 35
        echo "
              ";
        // line 36
        if (array_key_exists("success", $context)) {
            // line 37
            echo "                <div class=\"ptv-Alert ptv-Alert--active ptv-Alert--success ptv-AccountProfileAlert\">
                  <li>";
            // line 38
            echo twig_escape_filter($this->env, (isset($context["success"]) ? $context["success"] : $this->getContext($context, "success")), "html", null, true);
            echo "</li>
                </div>
              ";
        }
        // line 41
        echo "
              <p class=\"ptv-AccountProfileAction pmd-Text--right\">
                <button class=\"ptv-Button ptv-Button--large\">Enregistrer le mot de passe</button>
              </p>
            </form>
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
        return "controllers/bouncer/reinitialize-password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  103 => 41,  97 => 38,  94 => 37,  92 => 36,  89 => 35,  85 => 33,  76 => 31,  72 => 30,  69 => 29,  67 => 28,  58 => 24,  46 => 17,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content">*/
/*     <div class="container">*/
/* */
/*       <div class="user-index">*/
/* */
/*         <div class="main ptv-AccountProfile">*/
/*           <h3 class="ptv-AccountProfile-heading"><span class="ptv-AccountProfile-headingMain">Modifier mon mot de passe</span></h3>*/
/*           <div class="content ptv-AccountProfileContent">*/
/* */
/*             <form method="post" action="/reinitialisation-mot-de-passe/">*/
/*               <div class="ptv-AccountProfileLine">*/
/*                 <p class="ptv-AccountProfileLine-inputField">*/
/*                   <label for="ptv-ChangePasswordForm-password" class="ptv-AccountProfileLine-label">Nouveau mot de passe :</label>*/
/*                   <input type="password" class="ptv-Input{% if errors.password is defined %} ptv-Input--error{% endif %}" name="password" placeholder="Mot de passe" autocomplete="off">*/
/*                 </p>*/
/*               </div>*/
/* */
/*               <div class="ptv-AccountProfileLine">*/
/*                 <p class="ptv-AccountProfileLine-inputField">*/
/*                   <label for="ptv-ChangePasswordForm-confirmPassword" class="ptv-AccountProfileLine-label">Confirmer le mot de passe :</label>*/
/*                   <input type="password" class="ptv-Input{% if errors.confirmPassword is defined %} ptv-Input--error{% endif %}" name="confirmPassword" placeholder="Mot de passe" autocomplete="off">*/
/*                 </p>*/
/*               </div>*/
/* */
/*               {% if errors is defined %}*/
/*                 <div class="ptv-Alert ptv-Alert--active ptv-Alert--error ptv-AccountProfileAlert">*/
/*                   {% for error in errors %}*/
/*                     <li>{{ error }}</li>*/
/*                   {% endfor %}*/
/*                 </div>*/
/*               {% endif %}*/
/* */
/*               {% if success is defined %}*/
/*                 <div class="ptv-Alert ptv-Alert--active ptv-Alert--success ptv-AccountProfileAlert">*/
/*                   <li>{{ success }}</li>*/
/*                 </div>*/
/*               {% endif %}*/
/* */
/*               <p class="ptv-AccountProfileAction pmd-Text--right">*/
/*                 <button class="ptv-Button ptv-Button--large">Enregistrer le mot de passe</button>*/
/*               </p>*/
/*             </form>*/
/*           </div>*/
/*         </div>*/
/* */
/* */
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
