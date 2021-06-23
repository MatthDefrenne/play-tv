<?php

/* controllers/pages/_menu.twig */
class __TwigTemplate_1720293834f5d787f1e19a2efb54f105a666194f3a1257deb4f38b09b4d2ea69 extends Twig_Template
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
        echo "<nav>
  ";
        // line 2
        ob_start();
        // line 3
        echo "    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 4
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/a-propos/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "a_propos")) {
            echo "clear-grey";
        }
        echo "\" title=\"À propos\">
        <strong>À propos</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/mentions-legales/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "mentions_legales")) {
            echo "clear-grey";
        }
        echo "\" title=\"Mentions légales\">
        <strong>Mentions légales</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/cgu/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "cgu")) {
            echo "clear-grey";
        }
        echo "\" title=\"Conditions générales d'utilisation\">
        <strong>Conditions générales d'utilisation</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 22
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/cgv/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "cgv")) {
            echo "clear-grey";
        }
        echo "}\" title=\"Conditions générales de vente\">
        <strong>Conditions générales de vente</strong>
      </a>
    </p>

    <p class=\"grey-box margin\">
      <a href=\"/";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/donnees-personnelles/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "donnees_personnelles")) {
            echo "clear-grey";
        }
        echo "\" title=\"Données personnelles\">
        <strong>Données personnelles</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 34
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/publicite/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "publicite")) {
            echo "clear-grey";
        }
        echo "\" title=\"Publicité\">
        <strong>Publicité</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 40
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/presse/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "presse")) {
            echo "clear-grey";
        }
        echo "\" title=\"Presse\">
        <strong>Presse</strong>
      </a>
    </p>

    <p class=\"grey-box xmargin\">
      <a href=\"/";
        // line 46
        echo twig_escape_filter($this->env, (isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), "html", null, true);
        echo "/jobs/\" class=\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "jobs")) {
            echo "clear-grey";
        }
        echo "\" title=\"Jobs\">
        <strong>Jobs</strong>
      </a>
    </p>
  ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 51
        echo "</nav>
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 51,  118 => 46,  105 => 40,  92 => 34,  79 => 28,  66 => 22,  53 => 16,  40 => 10,  27 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }
}
/* <nav>*/
/*   {% spaceless %}*/
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/a-propos/" class="{% if action_name == 'a_propos' %}clear-grey{% endif %}" title="À propos">*/
/*         <strong>À propos</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/mentions-legales/" class="{% if action_name == 'mentions_legales' %}clear-grey{% endif %}" title="Mentions légales">*/
/*         <strong>Mentions légales</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/cgu/" class="{% if action_name == 'cgu'%}clear-grey{% endif %}" title="Conditions générales d'utilisation">*/
/*         <strong>Conditions générales d'utilisation</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/cgv/" class="{% if action_name == 'cgv' %}clear-grey{% endif %}}" title="Conditions générales de vente">*/
/*         <strong>Conditions générales de vente</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box margin">*/
/*       <a href="/{{ controller_name }}/donnees-personnelles/" class="{% if action_name == 'donnees_personnelles' %}clear-grey{% endif %}" title="Données personnelles">*/
/*         <strong>Données personnelles</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/publicite/" class="{% if action_name == 'publicite' %}clear-grey{% endif %}" title="Publicité">*/
/*         <strong>Publicité</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/presse/" class="{% if action_name == 'presse' %}clear-grey{% endif %}" title="Presse">*/
/*         <strong>Presse</strong>*/
/*       </a>*/
/*     </p>*/
/* */
/*     <p class="grey-box xmargin">*/
/*       <a href="/{{ controller_name }}/jobs/" class="{% if action_name == 'jobs' %}clear-grey{% endif %}" title="Jobs">*/
/*         <strong>Jobs</strong>*/
/*       </a>*/
/*     </p>*/
/*   {% endspaceless %}*/
/* </nav>*/
/* */
