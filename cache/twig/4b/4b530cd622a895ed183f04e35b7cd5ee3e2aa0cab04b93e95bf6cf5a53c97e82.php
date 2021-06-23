<?php

/* controllers/chaine-tv/programmes-tv.twig */
class __TwigTemplate_bf4a664be1bfd5bc06d46833064a2f97aedc19b184f532e427ebeec86239f65f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/chaine-tv/programmes-tv.twig", 1);
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
        echo "
  ";
        // line 5
        $this->loadTemplate("controllers/chaine-tv/programmes-tv.twig", "controllers/chaine-tv/programmes-tv.twig", 5, "1595126186")->display(array_merge($context, array("tab_active" => "broadcasts")));
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/programmes-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 39,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/chaine-tv/programmes-tv.twig */
class __TwigTemplate_bf4a664be1bfd5bc06d46833064a2f97aedc19b184f532e427ebeec86239f65f_1595126186 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/chaine-tv/skeleton.twig", "controllers/chaine-tv/programmes-tv.twig", 5);
        $this->blocks = array(
            'embed_content' => array($this, 'block_embed_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/chaine-tv/skeleton.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_embed_content($context, array $blocks = array())
    {
        // line 8
        echo "
      <div class=\"block-title margin\">

        <form id=\"programs-date-select\" class=\"right\">
          <select onchange=\"window.location.assign(\$(this).val());return false;\" class=\"pmd-Select\">
          ";
        // line 13
        $context["date_format"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? ("d-m-Y") : ("Y-m-d"));
        // line 14
        echo "          ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
        foreach ($context['_seq'] as $context["_key"] => $context["date"]) {
            // line 15
            echo "            ";
            $context["route_params"] = array("channel_id" => $this->getAttribute(            // line 16
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), "channel_alias" => $this->getAttribute(            // line 17
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()), "date" => twig_date_format_filter($this->env,             // line 18
$context["date"], (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))));
            // line 20
            echo "            <option value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv_programmes_date", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\"";
            if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == $context["date"])) {
                echo " selected=\"selected\"";
            }
            echo ">
              ";
            // line 21
            if (((isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")) == $context["date"])) {
                echo $this->env->getExtension('translator')->getTranslator()->trans("Today", array(), "messages");
            } else {
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $context["date"], "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            }
            // line 22
            echo "            </option>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['date'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "          </select>
        </form>

        <h2>";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV guide for <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
        echo "</h2>

      </div>

      <div class=\"text\">
        <h3>";
        // line 32
        if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")))) {
            echo $this->env->getExtension('translator')->getTranslator()->trans("Today", array(), "messages");
        } else {
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
        }
        echo "</h3>
      </div>

      ";
        // line 35
        echo (isset($context["block_broadcasts"]) ? $context["block_broadcasts"] : $this->getContext($context, "block_broadcasts"));
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/programmes-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 35,  140 => 32,  132 => 27,  127 => 24,  120 => 22,  114 => 21,  105 => 20,  103 => 18,  102 => 17,  101 => 16,  99 => 15,  94 => 14,  92 => 13,  85 => 8,  82 => 7,  65 => 5,  36 => 39,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/chaine-tv/skeleton.twig" with {"tab_active": "broadcasts"} %}*/
/* */
/*     {% block embed_content %}*/
/* */
/*       <div class="block-title margin">*/
/* */
/*         <form id="programs-date-select" class="right">*/
/*           <select onchange="window.location.assign($(this).val());return false;" class="pmd-Select">*/
/*           {% set date_format = is_website_fr ? 'd-m-Y' : 'Y-m-d' %}*/
/*           {% for date in dates %}*/
/*             {% set route_params = {*/
/*               'channel_id': infos.id,*/
/*               'channel_alias': infos.alias,*/
/*               'date': date|date(date_format)*/
/*             } %}*/
/*             <option value="{{ path('chaine_tv_programmes_date', route_params) }}"{% if selected_date == date %} selected="selected"{% endif%}>*/
/*               {% if now_date == date %}{% trans %}Today{% endtrans %}{% else %}{{ date|localizeddate('full', 'none', locale)|capitalize }}{% endif %}*/
/*             </option>*/
/*           {% endfor %}*/
/*           </select>*/
/*         </form>*/
/* */
/*         <h2>{% trans with {'%channel%': infos.name} %}TV guide for <strong>%channel%</strong>{% endtrans %}</h2>*/
/* */
/*       </div>*/
/* */
/*       <div class="text">*/
/*         <h3>{% if selected_date == now_date %}{% trans %}Today{% endtrans %}{% else %}{{ selected_date|localizeddate('full', 'none', locale)|capitalize }}{% endif %}</h3>*/
/*       </div>*/
/* */
/*       {{ block_broadcasts|raw }}*/
/*     {% endblock %}*/
/* */
/*   {% endembed %}*/
/* */
/* {% endblock %}*/
/* */
