<?php

/* controllers/programmes-tv/_featured.twig */
class __TwigTemplate_7ee90e43265fc1b3859df23831d49153c000e1a538782cafbc3a68bf3acb0feb extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["date"] => $context["date_broadcasts"]) {
            // line 2
            echo "
";
            // line 3
            if ((isset($context["has_column"]) ? $context["has_column"] : $this->getContext($context, "has_column"))) {
                // line 4
                echo "<div class=\"span-half\">
";
            }
            // line 6
            echo "
  <div class=\"grey-box margin\">

    <div class=\"text\">
      ";
            // line 10
            if ((isset($context["has_column"]) ? $context["has_column"] : $this->getContext($context, "has_column"))) {
                // line 11
                echo "      <h2>";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($context["date"])), "html", null, true);
                echo "</h2>
      ";
            } else {
                // line 13
                echo "      <h3>";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($context["date"])), "html", null, true);
                echo "</h3>
      ";
            }
            // line 15
            echo "    </div>

    ";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["date_broadcasts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
                // line 18
                echo "    <div class=\"program clearfix\">

      ";
                // line 20
                if ( !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()))) {
                    // line 21
                    echo "      <a class=\"program-img program-img-small ";
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                        echo "pmd-js-TrailerButton";
                    }
                    echo "\" data-program-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "\" href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                    echo "\">
        <img src=\"";
                    // line 22
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "title", array()), "html", null, true);
                    echo "\" width=\"80\" height=\"60\">
        <span class=\"cache\"></span>
        ";
                    // line 24
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                        // line 25
                        echo "        <span class=\"pmd-TrailerIcon\"></span>
        ";
                    }
                    // line 27
                    echo "      </a>
      ";
                }
                // line 29
                echo "
      <small class=\"infos\">
        ";
                // line 31
                ob_start();
                // line 32
                echo "        <span class=\"program-gender small\">
          <span class=\"program-gender-icon program-gender-icon";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                echo "\"></span>
          <span>";
                // line 34
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                echo "</span>
        </span>
        <span class=\"clear-grey\">
          <span title=\"Durée : ";
                // line 37
                echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array())), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["broadcast"], "start", array()), "H:i"), "html", null, true);
                echo "</span> sur
          <strong>
            <a href=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "alias", array()))), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "html", null, true);
                echo "</a>
          </strong>
        </span>
        ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 43
                echo "      </small>

      <p class=\"title pmd-Text--truncate\">
          <a href=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "title", array()), "html", null, true);
                echo "\">
            <strong>";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "title", array()), "html", null, true);
                echo "</strong>
          </a>
      </p>

      ";
                // line 51
                if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                    // line 52
                    echo "      ";
                    ob_start();
                    // line 53
                    echo "          <a href=\"#\" class=\"pmd-js-TrailerButton pmd-Button pmd-TrailerButton\" data-program-id=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                    echo "\" data-program-alias=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "alias", array()), "html", null, true);
                    echo "\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer\">
              <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--trailer\"></use>
            </svg>
            ";
                    // line 57
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Trailer", array(), "messages");
                    // line 58
                    echo "          </a>
      ";
                    echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                    // line 60
                    echo "      ";
                } elseif ( !(null === $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()))) {
                    // line 61
                    echo "      <p class=\"subtitle clear-grey pmd-Text--truncate\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                    echo "</p>
      ";
                }
                // line 63
                echo "
    </div>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 66
            echo "
  </div>

";
            // line 69
            if ((isset($context["has_column"]) ? $context["has_column"] : $this->getContext($context, "has_column"))) {
                // line 70
                echo "</div>
";
            }
            // line 72
            echo "
";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 74
            echo "<div class=\"text xbigger center clear-grey margin\">
  <p>Pas de programmes tv à venir.</p>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['date'], $context['date_broadcasts'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/_featured.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 74,  201 => 72,  197 => 70,  195 => 69,  190 => 66,  182 => 63,  174 => 61,  171 => 60,  167 => 58,  165 => 57,  155 => 53,  152 => 52,  150 => 51,  143 => 47,  137 => 46,  132 => 43,  123 => 39,  116 => 37,  110 => 34,  106 => 33,  103 => 32,  101 => 31,  97 => 29,  93 => 27,  89 => 25,  87 => 24,  80 => 22,  67 => 21,  65 => 20,  61 => 18,  57 => 17,  53 => 15,  47 => 13,  41 => 11,  39 => 10,  33 => 6,  29 => 4,  27 => 3,  24 => 2,  19 => 1,);
    }
}
/* {% for date, date_broadcasts in broadcasts %}*/
/* */
/* {% if has_column %}*/
/* <div class="span-half">*/
/* {% endif %}*/
/* */
/*   <div class="grey-box margin">*/
/* */
/*     <div class="text">*/
/*       {% if has_column %}*/
/*       <h2>{{ date_for_humans(date)|capitalize }}</h2>*/
/*       {% else %}*/
/*       <h3>{{ date_for_humans(date)|capitalize }}</h3>*/
/*       {% endif %}*/
/*     </div>*/
/* */
/*     {% for broadcast in date_broadcasts %}*/
/*     <div class="program clearfix">*/
/* */
/*       {% if broadcast.program.images.small is not null %}*/
/*       <a class="program-img program-img-small {% if broadcast.program.trailer %}pmd-js-TrailerButton{% endif %}" data-program-id="{{ broadcast.program.id }}" title="{{ broadcast.program.fulltitle }}" href="{{ broadcast.program.program_url }}">*/
/*         <img src="{{ broadcast.program.images.small }}" alt="{{ broadcast.program.title }}" width="80" height="60">*/
/*         <span class="cache"></span>*/
/*         {% if broadcast.program.trailer %}*/
/*         <span class="pmd-TrailerIcon"></span>*/
/*         {% endif %}*/
/*       </a>*/
/*       {% endif %}*/
/* */
/*       <small class="infos">*/
/*         {% spaceless %}*/
/*         <span class="program-gender small">*/
/*           <span class="program-gender-icon program-gender-icon{{ broadcast.program.gender_id }}"></span>*/
/*           <span>{{ broadcast.program.gender }}</span>*/
/*         </span>*/
/*         <span class="clear-grey">*/
/*           <span title="Durée : {{ broadcast.program.duration|diff_for_humans }}">{{ broadcast.start|date("H:i") }}</span> sur*/
/*           <strong>*/
/*             <a href="{{ path('chaine_tv', {'channel_id': broadcast.channel.id, 'channel_alias': broadcast.channel.alias}) }}">{{ broadcast.channel.name }}</a>*/
/*           </strong>*/
/*         </span>*/
/*         {% endspaceless %}*/
/*       </small>*/
/* */
/*       <p class="title pmd-Text--truncate">*/
/*           <a href="{{ broadcast.program.program_url }}" title="{{ broadcast.program.title }}">*/
/*             <strong>{{ broadcast.program.title }}</strong>*/
/*           </a>*/
/*       </p>*/
/* */
/*       {% if broadcast.program.trailer %}*/
/*       {% spaceless %}*/
/*           <a href="#" class="pmd-js-TrailerButton pmd-Button pmd-TrailerButton" data-program-id="{{ broadcast.program.id }}" data-program-alias="{{ broadcast.program.alias }}">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--trailer">*/
/*               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--trailer"></use>*/
/*             </svg>*/
/*             {% trans %}Trailer{% endtrans %}*/
/*           </a>*/
/*       {% endspaceless %}*/
/*       {% elseif broadcast.program.subtitle is not null %}*/
/*       <p class="subtitle clear-grey pmd-Text--truncate" title="{{ broadcast.program.subtitle }}">{{ broadcast.program.subtitle }}</p>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/*   {% endfor %}*/
/* */
/*   </div>*/
/* */
/* {% if has_column %}*/
/* </div>*/
/* {% endif %}*/
/* */
/* {% else %}*/
/* <div class="text xbigger center clear-grey margin">*/
/*   <p>Pas de programmes tv à venir.</p>*/
/* </div>*/
/* {% endfor %}*/
/* */
