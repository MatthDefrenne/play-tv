<?php

/* controllers/widgets/broadcasts_mobile.twig */
class __TwigTemplate_4b4d17eaa8020a4597a541bbe1716039b80b0cd3b15f69f363c04b9ee418e9aa extends Twig_Template
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
        echo "<ul class=\"pmd-ChannelProgrammes-list\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
            // line 3
            echo "  <li class=\"pmd-ChannelProgrammesItem";
            if ($this->getAttribute($context["broadcast"], "is_live", array())) {
                echo " pmd-ChannelProgrammesItem--current";
            }
            echo "\">
    <a href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
            echo "\" class=\"pmd-ChannelProgrammesItem-link\">
      <span class=\"pmd-ChannelProgrammesItem-time\">";
            // line 5
            echo twig_escape_filter($this->env, _twig_default_filter(twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "start", array()), "H:i"), "--:--"), "html", null, true);
            echo "</span>
      <span class=\"pmd-ChannelProgrammesItem-title pmd-Text--truncate\">";
            // line 6
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
            echo "<span>
      ";
            // line 7
            if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array())) {
                // line 8
                echo "        <span class=\"pmd-ChannelProgrammesItem-genre pmd-ProgrammeGenre pmd-ProgrammeGenre--";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                echo " pmd-ProgrammeGenre--small\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                echo "<span>
      ";
            } else {
                // line 10
                echo "        <span class=\"pmd-ChannelProgrammesItem-genre\"> </span>
      ";
            }
            // line 12
            echo "      <span class=\"pmd-ChannelProgrammesItem-arrow pmd-Icons-arrow\"></span>
    </a>
  </li>
  ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 16
            echo "  <li class=\"pmd-ChannelProgrammesItem pmd-ChannelProgrammesItem--empty\">
  ";
            // line 17
            echo $this->env->getExtension('translator')->getTranslator()->trans("No informations.", array(), "messages");
            // line 20
            echo "  </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/broadcasts_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 22,  73 => 20,  71 => 17,  68 => 16,  60 => 12,  56 => 10,  48 => 8,  46 => 7,  42 => 6,  38 => 5,  34 => 4,  27 => 3,  22 => 2,  19 => 1,);
    }
}
/* <ul class="pmd-ChannelProgrammes-list">*/
/*   {% for broadcast in broadcasts %}*/
/*   <li class="pmd-ChannelProgrammesItem{% if broadcast.is_live %} pmd-ChannelProgrammesItem--current{% endif %}">*/
/*     <a href="{{ broadcast.program.program_url }}" class="pmd-ChannelProgrammesItem-link">*/
/*       <span class="pmd-ChannelProgrammesItem-time">{{ broadcast.start|date("H:i")|default("--:--") }}</span>*/
/*       <span class="pmd-ChannelProgrammesItem-title pmd-Text--truncate">{{ broadcast.program.fulltitle }}<span>*/
/*       {% if broadcast.program.gender %}*/
/*         <span class="pmd-ChannelProgrammesItem-genre pmd-ProgrammeGenre pmd-ProgrammeGenre--{{ broadcast.program.gender_id }} pmd-ProgrammeGenre--small">{{ broadcast.program.gender }}<span>*/
/*       {% else %}*/
/*         <span class="pmd-ChannelProgrammesItem-genre"> </span>*/
/*       {% endif %}*/
/*       <span class="pmd-ChannelProgrammesItem-arrow pmd-Icons-arrow"></span>*/
/*     </a>*/
/*   </li>*/
/*   {% else %}*/
/*   <li class="pmd-ChannelProgrammesItem pmd-ChannelProgrammesItem--empty">*/
/*   {% trans %}*/
/*   No informations.*/
/*   {% endtrans %}*/
/*   </li>*/
/*   {% endfor %}*/
/* </ul>*/
/* */
