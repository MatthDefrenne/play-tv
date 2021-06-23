<?php

/* controllers/chaine-tv/programmes-tv_mobile.twig */
class __TwigTemplate_58be6c2a17e4d1b104b6ced3a619528d22083a0eef6b019332e4b1c2262d00b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/chaine-tv/programmes-tv_mobile.twig", 1);
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
        echo "<div class=\"pmd-Heading\">
  <a class=\"pmd-Heading-words\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), "channel_alias" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()))), "html", null, true);
        echo "\">
    <span>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array()), "html", null, true);
        echo "</span>
  </a>
</div>

<div class=\"pmd-Heading pmd-Heading pmd-Heading--black pmd-ChannelProgrammesDate\">
  ";
        // line 11
        $context["date_format"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? ("d-m-Y") : ("Y-m-d"));
        // line 12
        echo "  ";
        $context["previous_date_url"] = $this->env->getExtension('routing')->getPath("chaine_tv_programmes_date", array("channel_id" => $this->getAttribute(        // line 13
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), "channel_alias" => $this->getAttribute(        // line 14
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()), "date" => twig_date_format_filter($this->env, twig_date_modify_filter($this->env,         // line 15
(isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "-1 day"), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))));
        // line 17
        echo "  ";
        $context["next_date_url"] = $this->env->getExtension('routing')->getPath("chaine_tv_programmes_date", array("channel_id" => $this->getAttribute(        // line 18
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "id", array()), "channel_alias" => $this->getAttribute(        // line 19
(isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "alias", array()), "date" => twig_date_format_filter($this->env, twig_date_modify_filter($this->env,         // line 20
(isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "+1 day"), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))));
        // line 22
        echo "
  <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["previous_date_url"]) ? $context["previous_date_url"] : $this->getContext($context, "previous_date_url")), "html", null, true);
        echo "\" class=\"pmd-ChannelProgrammesDate-previous\">
    <span class=\"pmd-Icons-arrow\"></span>
  </a>
  <a href=\"#\" class=\"pmd-Heading-words pmd-Heading-words--active pmd-ChannelProgrammes-current\">
    <span>";
        // line 27
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
        echo "</span>
  </a>
  <a href=\"";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["next_date_url"]) ? $context["next_date_url"] : $this->getContext($context, "next_date_url")), "html", null, true);
        echo "\" class=\"pmd-ChannelProgrammesDate-next\">
    <span class=\"pmd-Icons-arrow\"></span>
  </a>
</div>

<div class=\"pmd-js-ChannelProgrammesContent\">
  ";
        // line 35
        echo (isset($context["block_broadcasts"]) ? $context["block_broadcasts"] : $this->getContext($context, "block_broadcasts"));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/programmes-tv_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 35,  75 => 29,  70 => 27,  63 => 23,  60 => 22,  58 => 20,  57 => 19,  56 => 18,  54 => 17,  52 => 15,  51 => 14,  50 => 13,  48 => 12,  46 => 11,  38 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-Heading">*/
/*   <a class="pmd-Heading-words" href="{{ path('chaine_tv', {'channel_id': infos.id, 'channel_alias': infos.alias}) }}">*/
/*     <span>{{ infos.name }}</span>*/
/*   </a>*/
/* </div>*/
/* */
/* <div class="pmd-Heading pmd-Heading pmd-Heading--black pmd-ChannelProgrammesDate">*/
/*   {% set date_format = is_website_fr ? 'd-m-Y' : 'Y-m-d' %}*/
/*   {% set previous_date_url = path('chaine_tv_programmes_date', {*/
/*     'channel_id': infos.id,*/
/*     'channel_alias': infos.alias,*/
/*     'date': selected_date|date_modify("-1 day")|date(date_format)*/
/*   }) %}*/
/*   {% set next_date_url = path('chaine_tv_programmes_date', {*/
/*     'channel_id': infos.id,*/
/*     'channel_alias': infos.alias,*/
/*     'date': selected_date|date_modify("+1 day")|date(date_format)*/
/*   }) %}*/
/* */
/*   <a href="{{ previous_date_url }}" class="pmd-ChannelProgrammesDate-previous">*/
/*     <span class="pmd-Icons-arrow"></span>*/
/*   </a>*/
/*   <a href="#" class="pmd-Heading-words pmd-Heading-words--active pmd-ChannelProgrammes-current">*/
/*     <span>{{ selected_date|localizeddate('full', 'none', locale)|capitalize }}</span>*/
/*   </a>*/
/*   <a href="{{ next_date_url }}" class="pmd-ChannelProgrammesDate-next">*/
/*     <span class="pmd-Icons-arrow"></span>*/
/*   </a>*/
/* </div>*/
/* */
/* <div class="pmd-js-ChannelProgrammesContent">*/
/*   {{ block_broadcasts|raw }}*/
/* </div>*/
/* {% endblock %}*/
/* */
