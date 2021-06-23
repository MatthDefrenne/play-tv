<?php

/* controllers/recherche/index_mobile.twig */
class __TwigTemplate_eb490462fe06af716d19fe62221cf7cfa294779ca178d8709827ce9d6ac77728 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/recherche/index_mobile.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layouts/mobile.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "<nav class=\"pmd-js-SearchModule pmd-SearchModule\">
<form action=\"#\" method=\"get\" class=\"pmd-js-SearchModule-form\">
  <input type=\"text\" name=\"q\" class=\"pmd-js-SearchModule-input pmd-SearchModule-input pmd-Input\" placeholder=\"";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Search...", array(), "messages");
        echo "\" autocomplete=\"off\" value=\"";
        echo twig_escape_filter($this->env, (isset($context["query"]) ? $context["query"] : $this->getContext($context, "query")), "html", null, true);
        echo "\">
</form>
</nav>

";
        // line 10
        if ((isset($context["results"]) ? $context["results"] : $this->getContext($context, "results"))) {
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : $this->getContext($context, "results")));
            foreach ($context['_seq'] as $context["type"] => $context["type_results"]) {
                // line 12
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["type_results"]);
                foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
                    // line 13
                    echo "<div class=\"pmd-SearchResultList\">

  ";
                    // line 15
                    if (($this->getAttribute($context["result"], "type", array()) == "channels")) {
                        // line 16
                        echo "  <div class=\"pmd-SearchResultList-item pmd-SearchResultListItem\">

    <a class=\"pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--channel\" href=\"";
                        // line 18
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($context["result"], "id", array()), "channel_alias" => $this->getAttribute($context["result"], "alias", array()))), "html", null, true);
                        echo "\">
      <img src=\"";
                        // line 19
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["result"], "images", array()), "small", array()), "html", null, true);
                        echo "\" width=\"60\">
    </a>

    <a class=\"pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--middle\" href=\"";
                        // line 22
                        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($context["result"], "id", array()), "channel_alias" => $this->getAttribute($context["result"], "alias", array()))), "html", null, true);
                        echo "\">

      <div class=\"pmd-SearchResultContent pmd-Cf\">
         <h4 class=\"pmd-SearchResultContent-heading\">";
                        // line 25
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "name", array()), "html", null, true);
                        echo "</h4>
      </div>

    </a>

  </div>
  ";
                    }
                    // line 32
                    echo "
  ";
                    // line 33
                    if (($this->getAttribute($context["result"], "type", array()) == "programs")) {
                        // line 34
                        echo "  <div class=\"pmd-SearchResultList-item pmd-SearchResultListItem\">

    <a class=\"pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--channel\" href=\"";
                        // line 36
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "program_url", array()), "html", null, true);
                        echo "\">
      <img src=\"";
                        // line 37
                        echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($context["result"], "images", array(), "any", false, true), "small", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($context["result"], "images", array(), "any", false, true), "small", array()), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/tv-default-mobile.svg"))), "html", null, true);
                        echo "\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                        echo "\" width=\"60\">
    </a>

    <a class=\"pmd-SearchResultList-itemColumn\" href=\"";
                        // line 40
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "program_url", array()), "html", null, true);
                        echo "\">

      <div class=\"pmd-SearchResultContent pmd-Cf\">
         <h4 class=\"pmd-SearchResultContent-heading\">";
                        // line 43
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "title", array()), "html", null, true);
                        echo "</h4>
          <div class=\"pmd-ProgrammeGenre pmd-ProgrammeGenre--";
                        // line 44
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "gender_id", array()), "html", null, true);
                        echo " pmd-SearchResultContent-genre pmd-ProgrammeGenre--small\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "gender", array()), "html", null, true);
                        echo "</div>
      </div>

      <div class=\"pmd-SearchResultSecondary pmd-Cf\">
        <p class=\"pmd-SearchResultSecondary-description\">";
                        // line 48
                        echo twig_escape_filter($this->env, $this->getAttribute($context["result"], "summary", array()), "html", null, true);
                        echo "</p>
      </div>

    </a>

  </div>
  ";
                    }
                    // line 55
                    echo "
</div>
";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['type_results'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } else {
            // line 60
            echo "<p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Enter your search keywords above.", array(), "messages");
            echo "</p>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/recherche/index_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 60,  140 => 55,  130 => 48,  121 => 44,  117 => 43,  111 => 40,  103 => 37,  99 => 36,  95 => 34,  93 => 33,  90 => 32,  80 => 25,  74 => 22,  68 => 19,  64 => 18,  60 => 16,  58 => 15,  54 => 13,  50 => 12,  46 => 11,  44 => 10,  35 => 6,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <nav class="pmd-js-SearchModule pmd-SearchModule">*/
/* <form action="#" method="get" class="pmd-js-SearchModule-form">*/
/*   <input type="text" name="q" class="pmd-js-SearchModule-input pmd-SearchModule-input pmd-Input" placeholder="{% trans %}Search...{% endtrans %}" autocomplete="off" value="{{ query }}">*/
/* </form>*/
/* </nav>*/
/* */
/* {% if results %}*/
/* {% for type, type_results in results %}*/
/* {% for result in type_results %}*/
/* <div class="pmd-SearchResultList">*/
/* */
/*   {% if result.type == 'channels' %}*/
/*   <div class="pmd-SearchResultList-item pmd-SearchResultListItem">*/
/* */
/*     <a class="pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--channel" href="{{ path('television_channel_single', {'channel_id': result.id, 'channel_alias': result.alias}) }}">*/
/*       <img src="{{ result.images.small }}" width="60">*/
/*     </a>*/
/* */
/*     <a class="pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--middle" href="{{ path('television_channel_single', {'channel_id': result.id, 'channel_alias': result.alias}) }}">*/
/* */
/*       <div class="pmd-SearchResultContent pmd-Cf">*/
/*          <h4 class="pmd-SearchResultContent-heading">{{ result.name }}</h4>*/
/*       </div>*/
/* */
/*     </a>*/
/* */
/*   </div>*/
/*   {% endif %}*/
/* */
/*   {% if result.type == 'programs' %}*/
/*   <div class="pmd-SearchResultList-item pmd-SearchResultListItem">*/
/* */
/*     <a class="pmd-SearchResultList-itemColumn pmd-SearchResultList-itemColumn--channel" href="{{ result.program_url }}">*/
/*       <img src="{{ result.images.small|default(apps_base_url ~ "/images/tv-default-mobile.svg") }}" alt="{{ result.title }}" width="60">*/
/*     </a>*/
/* */
/*     <a class="pmd-SearchResultList-itemColumn" href="{{ result.program_url }}">*/
/* */
/*       <div class="pmd-SearchResultContent pmd-Cf">*/
/*          <h4 class="pmd-SearchResultContent-heading">{{ result.title }}</h4>*/
/*           <div class="pmd-ProgrammeGenre pmd-ProgrammeGenre--{{ result.gender_id }} pmd-SearchResultContent-genre pmd-ProgrammeGenre--small">{{ result.gender }}</div>*/
/*       </div>*/
/* */
/*       <div class="pmd-SearchResultSecondary pmd-Cf">*/
/*         <p class="pmd-SearchResultSecondary-description">{{ result.summary }}</p>*/
/*       </div>*/
/* */
/*     </a>*/
/* */
/*   </div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* {% endfor %}*/
/* {% endfor %}*/
/* {% else %}*/
/* <p>{% trans %}Enter your search keywords above.{% endtrans %}</p>*/
/* {% endif %}*/
/* {% endblock %}*/
/* */
