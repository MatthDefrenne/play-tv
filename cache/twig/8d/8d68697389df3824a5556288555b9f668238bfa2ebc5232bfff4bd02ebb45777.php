<?php

/* controllers/programmes-tv/a-ne-pas-manquer_mobile.twig */
class __TwigTemplate_184e35c3d6be1b9916bd31c4946cefa763dd426749cfcff4eafc3d8d3198795d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/mobile.twig", "controllers/programmes-tv/a-ne-pas-manquer_mobile.twig", 1);
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
        echo "<div class=\"pmd-OurSelection\">

  <div class=\"pmd-Heading\">
    <h2 class=\"pmd-OurSelection-heading pmd-Heading-words\">Notre sélection</h2>
  </div>

  <div class=\"pmd-js-OurSelectionContent pmd-OurSelectionContent\">

    <ul class=\"pmd-OurSelectionContent-list\">
    ";
        // line 13
        $context["counter"] = 1;
        // line 14
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["super_featured_broadcasts"]) ? $context["super_featured_broadcasts"] : $this->getContext($context, "super_featured_broadcasts")));
        foreach ($context['_seq'] as $context["date"] => $context["date_broadcasts"]) {
            // line 15
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["date_broadcasts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
                // line 16
                echo "      <li class=\"pmd-OurSelectionContent-listItem\">
        <a href=\"";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\" class=\"pmd-OurSelectionItem\">

          <div style=\"background-image: url(";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "sf_image", array()), "html", null, true);
                echo "); background-repeat: no-repeat;\" class=\"pmd-OurSelectionItem-preview pmd-OurSelectionItemPreview\">
            ";
                // line 20
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                    // line 21
                    echo "            <div class=\"pmd-TrailerIcon pmd-TrailerIcon--large pmd-Icons-trailer pmd-OurSelectionItemPreview-icon\"></div>
            ";
                }
                // line 23
                echo "          </div>

          <div class=\"pmd-OurSelectionItem-info pmd-OurSelectionItemInfo\">

            <div class=\"pmd-OurSelectionItemInfo-channel\">
              <img
                src=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "images", array()), "medium", array()), "html", null, true);
                echo "\"
                alt=\"\"
                width=\"34\"
                height=\"34\"
              />
            </div>

            <h3 class=\"pmd-OurSelectionItemInfo-heading pmd-Text--truncate\">";
                // line 36
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                echo "</h3>

            <div class=\"pmd-Cf\">
              <span class=\"pmd-ProgrammeGenre pmd-ProgrammeGenre--";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                echo " pmd-OurSelectionItemInfo-genre\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                echo "</span>
              <span class=\"pmd-OurSelectionItemInfo-time pmd-Text--truncate\">
                <strong>";
                // line 41
                if ( !(null === $this->env->getExtension('Playtv')->dateForHumans($context["date"]))) {
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($context["date"])), "html", null, true);
                } else {
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $context["date"], "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
                }
                echo "</strong> à <strong>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "start", array()), "H:i"), "html", null, true);
                echo "</strong>
              </span>
            </div>

          </div>

        </a>
      </li>
      ";
                // line 49
                $context["counter"] = ((isset($context["counter"]) ? $context["counter"] : $this->getContext($context, "counter")) + 1);
                // line 50
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['date'], $context['date_broadcasts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 52
        echo "    </ul>

  </div>

  ";
        // line 56
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 57
            echo "  <div id=\"taboola-mobile-notre-selection\"></div>
  ";
        }
        // line 59
        echo "
</div>

";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/a-ne-pas-manquer_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 59,  142 => 57,  140 => 56,  134 => 52,  128 => 51,  122 => 50,  120 => 49,  103 => 41,  96 => 39,  90 => 36,  80 => 29,  72 => 23,  68 => 21,  66 => 20,  62 => 19,  57 => 17,  54 => 16,  49 => 15,  44 => 14,  42 => 13,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/mobile.twig" %}*/
/* */
/* {% block content %}*/
/* <div class="pmd-OurSelection">*/
/* */
/*   <div class="pmd-Heading">*/
/*     <h2 class="pmd-OurSelection-heading pmd-Heading-words">Notre sélection</h2>*/
/*   </div>*/
/* */
/*   <div class="pmd-js-OurSelectionContent pmd-OurSelectionContent">*/
/* */
/*     <ul class="pmd-OurSelectionContent-list">*/
/*     {% set counter = 1 %}*/
/*     {% for date, date_broadcasts in super_featured_broadcasts %}*/
/*       {% for broadcast in date_broadcasts %}*/
/*       <li class="pmd-OurSelectionContent-listItem">*/
/*         <a href="{{ broadcast.program.program_url }}" class="pmd-OurSelectionItem">*/
/* */
/*           <div style="background-image: url({{ broadcast.program.images.sf_image }}); background-repeat: no-repeat;" class="pmd-OurSelectionItem-preview pmd-OurSelectionItemPreview">*/
/*             {% if broadcast.program.trailer %}*/
/*             <div class="pmd-TrailerIcon pmd-TrailerIcon--large pmd-Icons-trailer pmd-OurSelectionItemPreview-icon"></div>*/
/*             {% endif %}*/
/*           </div>*/
/* */
/*           <div class="pmd-OurSelectionItem-info pmd-OurSelectionItemInfo">*/
/* */
/*             <div class="pmd-OurSelectionItemInfo-channel">*/
/*               <img*/
/*                 src="{{ broadcast.channel.images.medium }}"*/
/*                 alt=""*/
/*                 width="34"*/
/*                 height="34"*/
/*               />*/
/*             </div>*/
/* */
/*             <h3 class="pmd-OurSelectionItemInfo-heading pmd-Text--truncate">{{ broadcast.program.fulltitle }}</h3>*/
/* */
/*             <div class="pmd-Cf">*/
/*               <span class="pmd-ProgrammeGenre pmd-ProgrammeGenre--{{ broadcast.program.gender_id }} pmd-OurSelectionItemInfo-genre">{{ broadcast.program.gender }}</span>*/
/*               <span class="pmd-OurSelectionItemInfo-time pmd-Text--truncate">*/
/*                 <strong>{% if date_for_humans(date) is not null %}{{ date_for_humans(date)|capitalize }}{% else %}{{ date|localizeddate('full', 'none', locale)|capitalize }}{% endif %}</strong> à <strong>{{ broadcast.start|date("H:i") }}</strong>*/
/*               </span>*/
/*             </div>*/
/* */
/*           </div>*/
/* */
/*         </a>*/
/*       </li>*/
/*       {% set counter = counter + 1 %}*/
/*       {% endfor %}*/
/*     {% endfor %}*/
/*     </ul>*/
/* */
/*   </div>*/
/* */
/*   {% if is_website_fr %}*/
/*   <div id="taboola-mobile-notre-selection"></div>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* {% endblock %}*/
/* */
