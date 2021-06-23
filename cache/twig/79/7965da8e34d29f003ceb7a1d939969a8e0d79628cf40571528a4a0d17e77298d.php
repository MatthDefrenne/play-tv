<?php

/* controllers/widgets/broadcasts-presets.twig */
class __TwigTemplate_ee1cd3b87ae427f3be10e6155f5076d858dfd45f669c947f27e171e22affa638 extends Twig_Template
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
        echo "<div id=\"programs-prime\">
  ";
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["channels_broadcasts_presets"]) ? $context["channels_broadcasts_presets"] : $this->getContext($context, "channels_broadcasts_presets")));
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 3
            echo "  <div class=\"channel clearfix\">

    <a class=\"channel-img\" href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($context["channel"], "id", array()), "channel_alias" => $this->getAttribute($context["channel"], "alias", array()))), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel%", array("%channel%" => $this->getAttribute($context["channel"], "name", array())), "messages");
            echo "\">
      <span";
            // line 6
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute($context["channel"], "name", array())), "messages");
            echo "</span>
      <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel"], "images", array()), "small", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
            echo "\" width=\"60\" height=\"60\">
    </a>

    ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["channel"], "broadcasts", array()));
            $context['_iterated'] = false;
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
                // line 11
                echo "    ";
                if ($this->getAttribute($context["broadcast"], "program", array(), "any", true, true)) {
                    // line 12
                    echo "    <div class=\"program clearfix";
                    if ((twig_length_filter($this->env, $this->getAttribute($context["channel"], "broadcasts", array())) == 1)) {
                        echo " fullwidth";
                    }
                    if ($this->getAttribute($context["loop"], "last", array())) {
                        echo " last";
                    }
                    echo "\">

      ";
                    // line 14
                    if ( !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()))) {
                        // line 15
                        echo "      <a href=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                        echo "\" title=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                        echo "\" class=\"program-img program-img-small ";
                        if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                            echo "pmd-js-TrailerButton";
                        }
                        echo "\" data-program-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                        echo "\">
        <img src=\"";
                        // line 16
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "small", array()), "html", null, true);
                        echo "\" width=\"80\" height=\"60\" alt=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                        echo "\">
        <span class=\"cache\"></span>
        ";
                        // line 18
                        if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                            // line 19
                            echo "        <span class=\"pmd-TrailerIcon\"></span>
        ";
                        }
                        // line 21
                        echo "      </a>
      ";
                    }
                    // line 23
                    echo "
      <small class=\"infos clearfix\">
        ";
                    // line 25
                    ob_start();
                    // line 26
                    echo "        <span class=\"program-gender small\">
          <span class=\"program-gender-icon program-gender-icon";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                    echo "\"></span>
          <span>";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
                    echo "</span>
        </span>
        <span class=\"clear-grey\" title=\"";
                    // line 30
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Duration: %duration%", array("%duration%" => $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "duration", array()))), "messages");
                    echo "\">
          ";
                    // line 31
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short")), "html", null, true);
                    echo "
        </span>
        ";
                    // line 33
                    if (($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "stars", array()) > 0)) {
                        // line 34
                        echo "        <span class=\"ptv-PrimeProgramme-rating\">
          <i class=\"ptv-Rating-";
                        // line 35
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "stars", array()), "html", null, true);
                        echo "\"></i>
        </span>
        ";
                    }
                    // line 38
                    echo "        ";
                    echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                    // line 39
                    echo "      </small>

      <p class=\"title pmd-Text--truncate\">
        <strong>
          <a href=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "\">
            ";
                    // line 44
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                    echo "
          </a>
        </strong>
      </p>

      ";
                    // line 49
                    if ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "trailer", array())) {
                        // line 50
                        echo "      <a href=\"#\" class=\"pmd-js-TrailerButton pmd-Button pmd-TrailerButton\" data-program-id=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "id", array()), "html", null, true);
                        echo "\" data-program-alias=\"";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "alias", array()), "html", null, true);
                        echo "\">
        ";
                        // line 51
                        ob_start();
                        // line 52
                        echo "        <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer \">
          <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--trailer\"></use>
        </svg>
        <span>";
                        // line 55
                        echo $this->env->getExtension('translator')->getTranslator()->trans("Trailer", array(), "messages");
                        echo "</span>
        ";
                        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                        // line 57
                        echo "      </a>
      ";
                    } elseif ( !(null === $this->getAttribute($this->getAttribute(                    // line 58
$context["broadcast"], "program", array()), "subtitle", array()))) {
                        // line 59
                        echo "      <p class=\"subtitle pmd-Text--truncate clear-grey\">
        <span title=\"";
                        // line 60
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                        echo "<span>
      </p>
      ";
                    } elseif (( !(null === $this->getAttribute($this->getAttribute(                    // line 62
$context["broadcast"], "program", array()), "originaltitle", array())) && ($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "originaltitle", array()) != $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array())))) {
                        // line 63
                        echo "      <p class=\"subtitle pmd-Text--truncate clear-grey\">
        <span title=\"";
                        // line 64
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "originaltitle", array()), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "originaltitle", array()), "html", null, true);
                        echo "<span>
      </p>
      ";
                    }
                    // line 67
                    echo "
    </div>
    ";
                }
                // line 70
                echo "    ";
                $context['_iterated'] = true;
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            if (!$context['_iterated']) {
                // line 71
                echo "    <div class=\"program fullwidth\">
      <span class=\"icon-unknown\" title=\"Programme non communiqué\">?</span>
    </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 78
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/broadcasts-presets.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 78,  249 => 75,  240 => 71,  227 => 70,  222 => 67,  214 => 64,  211 => 63,  209 => 62,  202 => 60,  199 => 59,  197 => 58,  194 => 57,  189 => 55,  184 => 52,  182 => 51,  175 => 50,  173 => 49,  165 => 44,  159 => 43,  153 => 39,  150 => 38,  144 => 35,  141 => 34,  139 => 33,  134 => 31,  130 => 30,  125 => 28,  121 => 27,  118 => 26,  116 => 25,  112 => 23,  108 => 21,  104 => 19,  102 => 18,  95 => 16,  82 => 15,  80 => 14,  69 => 12,  66 => 11,  48 => 10,  40 => 7,  36 => 6,  30 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
/* <div id="programs-prime">*/
/*   {% for channel in channels_broadcasts_presets %}*/
/*   <div class="channel clearfix">*/
/* */
/*     <a class="channel-img" href="{{ path('chaine_tv', {'channel_id': channel.id, 'channel_alias': channel.alias}) }}" title="{% trans with {'%channel%': channel.name} %}Watch %channel%{% endtrans %}">*/
/*       <span{% trans with {'%channel%': channel.name} %}Watch %channel% live{% endtrans %}</span>*/
/*       <img src="{{ channel.images.small }}" alt="{{ channel.name }}" width="60" height="60">*/
/*     </a>*/
/* */
/*     {% for broadcast in channel.broadcasts %}*/
/*     {% if broadcast.program is defined %}*/
/*     <div class="program clearfix{% if channel.broadcasts|length == 1 %} fullwidth{% endif %}{% if loop.last %} last{% endif %}">*/
/* */
/*       {% if broadcast.program.images.small is not null %}*/
/*       <a href="{{ broadcast.program.program_url }}" title="{{ broadcast.program.fulltitle }}" class="program-img program-img-small {% if broadcast.program.trailer %}pmd-js-TrailerButton{% endif %}" data-program-id="{{ broadcast.program.id }}">*/
/*         <img src="{{ broadcast.program.images.small }}" width="80" height="60" alt="{{ broadcast.program.fulltitle }}">*/
/*         <span class="cache"></span>*/
/*         {% if broadcast.program.trailer %}*/
/*         <span class="pmd-TrailerIcon"></span>*/
/*         {% endif %}*/
/*       </a>*/
/*       {% endif %}*/
/* */
/*       <small class="infos clearfix">*/
/*         {% spaceless %}*/
/*         <span class="program-gender small">*/
/*           <span class="program-gender-icon program-gender-icon{{ broadcast.program.gender_id }}"></span>*/
/*           <span>{{ broadcast.program.gender }}</span>*/
/*         </span>*/
/*         <span class="clear-grey" title="{% trans with {'%duration%': broadcast.program.duration|diff_for_humans} %}Duration: %duration%{% endtrans %}">*/
/*           {{ broadcast.start|localizeddate('none', 'short') }}*/
/*         </span>*/
/*         {% if broadcast.program.stars > 0 %}*/
/*         <span class="ptv-PrimeProgramme-rating">*/
/*           <i class="ptv-Rating-{{ broadcast.program.stars }}"></i>*/
/*         </span>*/
/*         {% endif %}*/
/*         {% endspaceless %}*/
/*       </small>*/
/* */
/*       <p class="title pmd-Text--truncate">*/
/*         <strong>*/
/*           <a href="{{ broadcast.program.program_url }}" title="{{ broadcast.program.fulltitle }}">*/
/*             {{ broadcast.program.fulltitle }}*/
/*           </a>*/
/*         </strong>*/
/*       </p>*/
/* */
/*       {% if broadcast.program.trailer %}*/
/*       <a href="#" class="pmd-js-TrailerButton pmd-Button pmd-TrailerButton" data-program-id="{{ broadcast.program.id }}" data-program-alias="{{ broadcast.program.alias }}">*/
/*         {% spaceless %}*/
/*         <svg role="img" class="pmd-Svg pmd-Svg--trailer ">*/
/*           <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--trailer"></use>*/
/*         </svg>*/
/*         <span>{% trans %}Trailer{% endtrans %}</span>*/
/*         {% endspaceless %}*/
/*       </a>*/
/*       {% elseif broadcast.program.subtitle is not null %}*/
/*       <p class="subtitle pmd-Text--truncate clear-grey">*/
/*         <span title="{{ broadcast.program.subtitle }}">{{ broadcast.program.subtitle }}<span>*/
/*       </p>*/
/*       {% elseif broadcast.program.originaltitle is not null and (broadcast.program.originaltitle != broadcast.program.fulltitle) %}*/
/*       <p class="subtitle pmd-Text--truncate clear-grey">*/
/*         <span title="{{ broadcast.program.originaltitle }}">{{ broadcast.program.originaltitle }}<span>*/
/*       </p>*/
/*       {% endif %}*/
/* */
/*     </div>*/
/*     {% endif %}*/
/*     {% else %}*/
/*     <div class="program fullwidth">*/
/*       <span class="icon-unknown" title="Programme non communiqué">?</span>*/
/*     </div>*/
/*     {% endfor %}*/
/* */
/*   </div>*/
/*   {% endfor %}*/
/* */
/* </div>*/
/* */
