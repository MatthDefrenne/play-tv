<?php

/* controllers/people/index.twig */
class __TwigTemplate_cd36d4b949667f02d75467f8cc56acfbfba9c2b2184f1157e256a74528e47fab extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/people/index.twig", 1);
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
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/people/index.twig", 5)->display($context);
        // line 6
        echo "
  <div id=\"content\">
    <div class=\"container\">

      <div class=\"row\">
        <div class=\"span-page\">

          <div class=\"page-title\">
            <h1>
              <span class=\"red\">";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array()), "html", null, true);
        echo "</span>
            </h1>
            ";
        // line 17
        if ( !(null === $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "statuses", array()))) {
            // line 18
            echo "              <p class=\"xxmargin\">
                <strong>
                  ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "statuses", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                // line 21
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "name", array()), "html", null, true);
                if (($context["status"] != twig_last($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "statuses", array())))) {
                    echo ", ";
                }
                // line 22
                echo "                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            echo "                </strong>
              </p>
            ";
        }
        // line 26
        echo "            <p class=\"sub-title\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV programs with %cast%", array("%cast%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array())), "messages");
        echo "</p>
          </div>

          <div class=\"fullcontent\">
            <div class=\"block-title margin\">
              <h3>";
        // line 31
        echo $this->env->getExtension('translator')->getTranslator()->trans("Find <strong>%cast%</strong> soon in...", array("%cast%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array())), "messages");
        echo "</h3>
            </div>

            <div id=\"people-next-programs\" class=\"clearfix margin\">
              ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["next_broadcasts"]) ? $context["next_broadcasts"] : $this->getContext($context, "next_broadcasts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["next_broadcast"]) {
            // line 36
            echo "                <div class=\"grey-box\">
                  <p class=\"mini-program\">
                    <span>
                      ";
            // line 39
            echo $this->env->getExtension('translator')->getTranslator()->trans("%date% at <strong>%hour%</strong> on <strong>%channel%</strong>", array("%date%" => twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["next_broadcast"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["next_broadcast"], "start", array()), "none", "short")), "%channel%" => $this->getAttribute($context["next_broadcast"], "channel", array())), "messages");
            // line 42
            echo "                    </span>
                    <p class=\"title\"><a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["next_broadcast"], "program", array()), "program_url", array()), "html", null, true);
            echo "\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["next_broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
            echo "</strong></a></p>
                  </p>
                </div>
              ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 47
            echo "                <p class=\"clear-grey\"><strong class=\"red\">Pas de programmes</strong> avec <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array()), "html", null, true);
            echo "</strong> prochainement.</p>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['next_broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "            </div>
          </div> <!-- fullcontent -->

          <div class=\"fullcontent\">
            <div class=\"block-title margin\">
              <h3>";
        // line 54
        echo $this->env->getExtension('translator')->getTranslator()->trans("Last TV programs with <strong>%cast%</strong>", array("%cast%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array())), "messages");
        echo "</h3>
            </div>

            ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["previous_broadcasts"]) ? $context["previous_broadcasts"] : $this->getContext($context, "previous_broadcasts")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["previous_broadcast"]) {
            // line 58
            echo "              <div class=\"";
            if ($this->getAttribute($context["previous_broadcast"], "broadcasts", array(), "any", true, true)) {
                echo "mini-group";
            } else {
                echo "mini-program";
            }
            echo " ";
            if ((($this->getAttribute($this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array(), "any", false, true), "images", array(), "any", false, true), "small", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "images", array()), "small", array()))) || ($this->getAttribute($this->getAttribute($context["previous_broadcast"], "images", array(), "any", false, true), "small", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($context["previous_broadcast"], "images", array()), "small", array()))))) {
                echo "has-image clearfix";
            }
            echo "\">

                <!-- Groups -->
                ";
            // line 61
            if ($this->getAttribute($context["previous_broadcast"], "broadcasts", array(), "any", true, true)) {
                // line 62
                echo "                  ";
                ob_start();
                // line 63
                echo "                    <span class=\"program-gender small\">
                      <span class=\"program-gender-icon program-gender-icon";
                // line 64
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["previous_broadcast"], "broadcasts", array()), 0, array()), "program", array()), "gender_id", array()), "html", null, true);
                echo "\"></span>
                      <span>";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["previous_broadcast"], "broadcasts", array()), 0, array()), "program", array()), "gender", array()), "html", null, true);
                echo "</span>
                    </span>
                  ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 68
                echo "                  <p class=\"title\">
                    <strong><a href=\"";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($context["previous_broadcast"], "url", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["previous_broadcast"], "title", array()), "html", null, true);
                echo "</a></strong>
                    ";
                // line 70
                if ( !(null === $this->getAttribute($context["previous_broadcast"], "statuses", array()))) {
                    // line 71
                    echo "                      <br/>
                      ";
                    // line 72
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["previous_broadcast"], "statuses", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                        // line 73
                        echo "                        ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                        echo "
                        ";
                        // line 74
                        if ( !(null === $this->getAttribute($context["status"], "role", array()))) {
                            // line 75
                            echo "                          <span class=\"clear-grey\">(";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "role", array()), "html", null, true);
                            echo ")</span>
                        ";
                        }
                        // line 77
                        echo "                        ";
                        if (($context["status"] != twig_last($this->env, $this->getAttribute($context["previous_broadcast"], "statuses", array())))) {
                            echo ", ";
                        }
                        // line 78
                        echo "                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 79
                    echo "                    ";
                }
                // line 80
                echo "                  </p>
                  ";
                // line 81
                if ( !(null === $this->getAttribute($this->getAttribute($context["previous_broadcast"], "images", array()), "small", array()))) {
                    // line 82
                    echo "                    <div class=\"program-img program-img-small\">
                      <img src=\"";
                    // line 83
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "images", array()), "small", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "title", array()), "html", null, true);
                    echo "\" width=\"80\" height=\"60\">
                      <div class=\"cache\"></div>
                    </div>
                  ";
                }
                // line 87
                echo "                ";
            }
            // line 88
            echo "
                ";
            // line 89
            if ($this->getAttribute($context["previous_broadcast"], "broadcasts", array(), "any", true, true)) {
                // line 90
                echo "                  <div class=\"mini-programs\">
                    ";
                // line 91
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["previous_broadcast"], "broadcasts", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
                    // line 92
                    echo "                      <p>
                        <small>
                          ";
                    // line 94
                    echo $this->env->getExtension('translator')->getTranslator()->trans("%date% on <strong>%channel%</strong>", array("%date%" => twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["b"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "%channel%" => $this->getAttribute($context["b"], "channel", array())), "messages");
                    // line 97
                    echo "                        </small>
                        <br>
                        <span class=\"clear-grey\">";
                    // line 99
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["b"], "start", array()), "none", "short")), "html", null, true);
                    echo "</span> <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                    echo "\"><strong>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "title", array()), "html", null, true);
                    echo "</strong></a>
                        ";
                    // line 100
                    if ( !(null === $this->getAttribute($this->getAttribute($context["b"], "program", array()), "subtitle", array()))) {
                        echo " : ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "subtitle", array()), "html", null, true);
                    }
                    // line 101
                    echo "                      </p>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 103
                echo "                  </div>
                ";
            } else {
                // line 105
                echo "                  <p>
                    ";
                // line 106
                ob_start();
                // line 107
                echo "                      <span class=\"program-gender small\">
                        <span class=\"program-gender-icon program-gender-icon";
                // line 108
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "gender_id", array()), "html", null, true);
                echo "\"></span>
                        <span>";
                // line 109
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "gender", array()), "html", null, true);
                echo "</span>
                      </span>
                    ";
                echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                // line 112
                echo "
                    <small>
                      ";
                // line 114
                echo $this->env->getExtension('translator')->getTranslator()->trans("%date% on <strong>%channel%</strong>", array("%date%" => twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["previous_broadcast"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "%channel%" => $this->getAttribute($context["previous_broadcast"], "channel", array())), "messages");
                // line 117
                echo "                    </small>

                    <br>
                    <p class=\"title\">
                      <span class=\"clear-grey\">";
                // line 121
                echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["previous_broadcast"], "start", array()), "none", "short")), "html", null, true);
                echo "</span> <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\"><strong>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "title", array()), "html", null, true);
                echo "</strong></a>
                      ";
                // line 122
                if (($this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "subtitle", array()) != null)) {
                    echo " : ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["previous_broadcast"], "program", array()), "subtitle", array()), "html", null, true);
                }
                // line 123
                echo "                    </p>
                    ";
                // line 124
                if (($this->getAttribute($context["previous_broadcast"], "statuses", array()) != null)) {
                    // line 125
                    echo "                      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["previous_broadcast"], "statuses", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                        // line 126
                        echo "                        ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                        echo "
                        ";
                        // line 127
                        if (($this->getAttribute($context["status"], "role", array()) != null)) {
                            // line 128
                            echo "                          <span class=\"clear-grey\">(";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "role", array()), "html", null, true);
                            echo ")</span>
                        ";
                        }
                        // line 130
                        echo "                        ";
                        if (($context["status"] != twig_last($this->env, $this->getAttribute($context["previous_broadcast"], "statuses", array())))) {
                            echo ", ";
                        }
                        // line 131
                        echo "                      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 132
                    echo "                    ";
                }
                // line 133
                echo "                  </p>
                ";
            }
            // line 135
            echo "
              </div>
            ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 138
            echo "              <p class=\"clear-grey\">
                ";
            // line 139
            echo $this->env->getExtension('translator')->getTranslator()->trans("No programs with <strong>%cast%</strong> recently.", array("%cast%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "fullname", array())), "messages");
            // line 142
            echo "              </p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['previous_broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 144
        echo "
          </div> <!-- /fullcontent -->

        </div> <!-- /span.page -->

        <div class=\"span-sidebar\">
          ";
        // line 150
        $this->loadTemplate("partials/ads-banner.twig", "controllers/people/index.twig", 150)->display(array_merge($context, array("unique" => "af2eb201", "zone_id" => 9)));
        // line 151
        echo "        </div>

      </div>

    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "controllers/people/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 151,  403 => 150,  395 => 144,  388 => 142,  386 => 139,  383 => 138,  376 => 135,  372 => 133,  369 => 132,  363 => 131,  358 => 130,  352 => 128,  350 => 127,  345 => 126,  340 => 125,  338 => 124,  335 => 123,  330 => 122,  322 => 121,  316 => 117,  314 => 114,  310 => 112,  304 => 109,  300 => 108,  297 => 107,  295 => 106,  292 => 105,  288 => 103,  281 => 101,  276 => 100,  268 => 99,  264 => 97,  262 => 94,  258 => 92,  254 => 91,  251 => 90,  249 => 89,  246 => 88,  243 => 87,  234 => 83,  231 => 82,  229 => 81,  226 => 80,  223 => 79,  217 => 78,  212 => 77,  206 => 75,  204 => 74,  199 => 73,  195 => 72,  192 => 71,  190 => 70,  184 => 69,  181 => 68,  175 => 65,  171 => 64,  168 => 63,  165 => 62,  163 => 61,  148 => 58,  143 => 57,  137 => 54,  130 => 49,  121 => 47,  110 => 43,  107 => 42,  105 => 39,  100 => 36,  95 => 35,  88 => 31,  79 => 26,  74 => 23,  68 => 22,  62 => 21,  58 => 20,  54 => 18,  52 => 17,  47 => 15,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% include "partials/subnav-guide-tv.twig" %}*/
/* */
/*   <div id="content">*/
/*     <div class="container">*/
/* */
/*       <div class="row">*/
/*         <div class="span-page">*/
/* */
/*           <div class="page-title">*/
/*             <h1>*/
/*               <span class="red">{{ infos.fullname }}</span>*/
/*             </h1>*/
/*             {% if infos.statuses is not null %}*/
/*               <p class="xxmargin">*/
/*                 <strong>*/
/*                   {% for status in infos.statuses %}*/
/*                     {{ status.name }}{% if status != infos.statuses|last %}, {% endif %}*/
/*                   {% endfor %}*/
/*                 </strong>*/
/*               </p>*/
/*             {% endif %}*/
/*             <p class="sub-title">{% trans with {'%cast%': infos.fullname} %}TV programs with %cast%{% endtrans %}</p>*/
/*           </div>*/
/* */
/*           <div class="fullcontent">*/
/*             <div class="block-title margin">*/
/*               <h3>{% trans with {'%cast%': infos.fullname} %}Find <strong>%cast%</strong> soon in...{% endtrans %}</h3>*/
/*             </div>*/
/* */
/*             <div id="people-next-programs" class="clearfix margin">*/
/*               {% for next_broadcast in next_broadcasts %}*/
/*                 <div class="grey-box">*/
/*                   <p class="mini-program">*/
/*                     <span>*/
/*                       {% trans with {'%date%': next_broadcast.start|localizeddate('full', 'none', locale)|capitalize, '%hour%': next_broadcast.start|localizeddate('none', 'short'), '%channel%': next_broadcast.channel} %}*/
/*                       %date% at <strong>%hour%</strong> on <strong>%channel%</strong>*/
/*                       {% endtrans %}*/
/*                     </span>*/
/*                     <p class="title"><a href="{{ next_broadcast.program.program_url }}"><strong>{{ next_broadcast.program.fulltitle }}</strong></a></p>*/
/*                   </p>*/
/*                 </div>*/
/*               {% else %}*/
/*                 <p class="clear-grey"><strong class="red">Pas de programmes</strong> avec <strong>{{ infos.fullname }}</strong> prochainement.</p>*/
/*               {% endfor %}*/
/*             </div>*/
/*           </div> <!-- fullcontent -->*/
/* */
/*           <div class="fullcontent">*/
/*             <div class="block-title margin">*/
/*               <h3>{% trans with {'%cast%': infos.fullname} %}Last TV programs with <strong>%cast%</strong>{% endtrans %}</h3>*/
/*             </div>*/
/* */
/*             {% for previous_broadcast in previous_broadcasts %}*/
/*               <div class="{% if previous_broadcast.broadcasts is defined %}mini-group{% else %}mini-program{% endif %} {% if (previous_broadcast.program.images.small is defined and previous_broadcast.program.images.small is not null) or (previous_broadcast.images.small is defined and previous_broadcast.images.small is not null)  %}has-image clearfix{% endif %}">*/
/* */
/*                 <!-- Groups -->*/
/*                 {% if previous_broadcast.broadcasts is defined %}*/
/*                   {% spaceless %}*/
/*                     <span class="program-gender small">*/
/*                       <span class="program-gender-icon program-gender-icon{{ previous_broadcast.broadcasts.0.program.gender_id }}"></span>*/
/*                       <span>{{ previous_broadcast.broadcasts.0.program.gender }}</span>*/
/*                     </span>*/
/*                   {% endspaceless %}*/
/*                   <p class="title">*/
/*                     <strong><a href="{{ previous_broadcast.url }}">{{ previous_broadcast.title }}</a></strong>*/
/*                     {% if previous_broadcast.statuses is not null %}*/
/*                       <br/>*/
/*                       {% for status in previous_broadcast.statuses %}*/
/*                         {{ status.status }}*/
/*                         {% if status.role is not null %}*/
/*                           <span class="clear-grey">({{ status.role }})</span>*/
/*                         {% endif %}*/
/*                         {% if status != previous_broadcast.statuses|last %}, {% endif %}*/
/*                       {% endfor %}*/
/*                     {% endif %}*/
/*                   </p>*/
/*                   {% if previous_broadcast.images.small is not null %}*/
/*                     <div class="program-img program-img-small">*/
/*                       <img src="{{ previous_broadcast.images.small }}" alt="{{ previous_broadcast.program.title }}" width="80" height="60">*/
/*                       <div class="cache"></div>*/
/*                     </div>*/
/*                   {% endif %}*/
/*                 {% endif %}*/
/* */
/*                 {% if previous_broadcast.broadcasts is defined %}*/
/*                   <div class="mini-programs">*/
/*                     {% for b in previous_broadcast.broadcasts %}*/
/*                       <p>*/
/*                         <small>*/
/*                           {% trans with {'%date%': b.start|localizeddate('full', 'none', locale)|capitalize, '%channel%': b.channel} %}*/
/*                           %date% on <strong>%channel%</strong>*/
/*                           {% endtrans %}*/
/*                         </small>*/
/*                         <br>*/
/*                         <span class="clear-grey">{{ b.start|localizeddate('none', 'short') }}</span> <a href="{{ b.program.program_url }}"><strong>{{ b.program.title }}</strong></a>*/
/*                         {% if b.program.subtitle is not null %} : {{ b.program.subtitle }}{% endif %}*/
/*                       </p>*/
/*                     {% endfor %}*/
/*                   </div>*/
/*                 {% else %}*/
/*                   <p>*/
/*                     {% spaceless %}*/
/*                       <span class="program-gender small">*/
/*                         <span class="program-gender-icon program-gender-icon{{ previous_broadcast.program.gender_id }}"></span>*/
/*                         <span>{{ previous_broadcast.program.gender }}</span>*/
/*                       </span>*/
/*                     {% endspaceless %}*/
/* */
/*                     <small>*/
/*                       {% trans with {'%date%': previous_broadcast.start|localizeddate('full', 'none', locale)|capitalize, '%channel%': previous_broadcast.channel} %}*/
/*                       %date% on <strong>%channel%</strong>*/
/*                       {% endtrans %}*/
/*                     </small>*/
/* */
/*                     <br>*/
/*                     <p class="title">*/
/*                       <span class="clear-grey">{{ previous_broadcast.start|localizeddate('none', 'short') }}</span> <a href="{{ previous_broadcast.program.program_url }}"><strong>{{ previous_broadcast.program.title }}</strong></a>*/
/*                       {% if previous_broadcast.program.subtitle != null %} : {{ previous_broadcast.program.subtitle }}{% endif %}*/
/*                     </p>*/
/*                     {% if previous_broadcast.statuses != null %}*/
/*                       {% for status in previous_broadcast.statuses %}*/
/*                         {{ status.status }}*/
/*                         {% if status.role != null %}*/
/*                           <span class="clear-grey">({{ status.role }})</span>*/
/*                         {% endif %}*/
/*                         {% if status != previous_broadcast.statuses|last %}, {% endif %}*/
/*                       {% endfor %}*/
/*                     {% endif %}*/
/*                   </p>*/
/*                 {% endif %}*/
/* */
/*               </div>*/
/*             {% else %}*/
/*               <p class="clear-grey">*/
/*                 {% trans with {'%cast%': infos.fullname} %}*/
/*                 No programs with <strong>%cast%</strong> recently.*/
/*                 {% endtrans %}*/
/*               </p>*/
/*             {% endfor %}*/
/* */
/*           </div> <!-- /fullcontent -->*/
/* */
/*         </div> <!-- /span.page -->*/
/* */
/*         <div class="span-sidebar">*/
/*           {% include "partials/ads-banner.twig" with {'unique': "af2eb201", "zone_id": 9} %}*/
/*         </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/*   </div>*/
/* {% endblock content %}*/
/* */
