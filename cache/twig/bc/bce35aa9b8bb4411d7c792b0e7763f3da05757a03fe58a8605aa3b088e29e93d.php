<?php

/* controllers/programmes-tv/timeslot.twig */
class __TwigTemplate_9c677be3cf8cda6a0e29d6c5d4dd3d00d949d852f2668dd4fe5cc025adcc8bbc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/programmes-tv/timeslot.twig", 1);
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
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/programmes-tv/timeslot.twig", 4)->display(array_merge($context, array("subnav_active" => "live")));
        // line 5
        echo "
<div id=\"content\">
  <div class=\"container\">

    <div class=\"row\">
      <div class=\"span16\">

        <div class=\"section-title\">
          <p class=\"right clear-grey\">";
        // line 13
        echo $this->env->getExtension('translator')->getTranslator()->trans("TV programs guide", array(), "messages");
        echo "</p>
          ";
        // line 14
        ob_start();
        // line 15
        echo "          <h1>
            <strong>
              <a href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "uri", array()), "html", null, true);
        echo "\">
                ";
        // line 18
        if ((((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) >= (isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time"))) && ((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) < (isset($context["to_time"]) ? $context["to_time"] : $this->getContext($context, "to_time"))))) {
            // line 19
            echo "                  ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live on TV", array(), "messages");
            // line 20
            echo "                ";
        } else {
            // line 21
            echo "                  ";
            $context["trans_params"] = array("%start_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute(            // line 22
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array")), "%end_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute(            // line 23
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array")));
            // line 25
            echo "                  ";
            if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")))) {
                // line 26
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Today from %start_time% to %end_time%", array_merge(array("%start_time%" =>                 // line 27
(isset($context["start_time"]) ? $context["start_time"] : null), "%end_time%" => (isset($context["end_time"]) ? $context["end_time"] : null)),                 // line 26
(isset($context["trans_params"]) ? $context["trans_params"] : $this->getContext($context, "trans_params"))), "messages");
                // line 29
                echo "                  ";
            } else {
                // line 30
                echo "                    ";
                $context["trans_params"] = twig_array_merge((isset($context["trans_params"]) ? $context["trans_params"] : $this->getContext($context, "trans_params")), array("%date%" => twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env,                 // line 31
(isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale")))))));
                // line 33
                echo "                    ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("%date% from %start_time% to %end_time%", array_merge(array("%date%" =>                 // line 34
(isset($context["date"]) ? $context["date"] : null), "%start_time%" => (isset($context["start_time"]) ? $context["start_time"] : null), "%end_time%" => (isset($context["end_time"]) ? $context["end_time"] : null)),                 // line 33
(isset($context["trans_params"]) ? $context["trans_params"] : $this->getContext($context, "trans_params"))), "messages");
                // line 36
                echo "                  ";
            }
            // line 37
            echo "                ";
        }
        // line 38
        echo "              </a>
            </strong>
            ";
        // line 40
        if ((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network"))) {
            // line 41
            echo "            <span> (bouquet <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "network", array()), "html", null, true);
            echo "</strong>)</span>
            ";
        }
        // line 43
        echo "          </h1>
          ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 45
        echo "        </div>

        <div id=\"programs-timeslot\">

          <div id=\"programs-timeslot-hours\">

            <div id=\"programs-title-bar\">
              <div class=\"right\">
                ";
        // line 53
        $this->loadTemplate("controllers/programmes-tv/_filters.twig", "controllers/programmes-tv/timeslot.twig", 53)->display($context);
        // line 54
        echo "              </div>
            </div>

            <div id=\"programs-timeslot-bar\">

              <div id=\"programs-timeslot-bar-bg\">
                <span class=\"hour-time t-1\"></span>
                <span class=\"half-time t-2\"></span>
                <span class=\"hour-time t-3\"></span>
                <span class=\"half-time t-4\"></span>
                <span class=\"hour-time t-5\"></span>
                <span class=\"half-time t-6\"></span>
                <span class=\"hour-time t-7\"></span>
              </div>

              <div class=\"hour\" style=\"left:104px;\">
                ";
        // line 70
        echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array")), "html", null, true);
        echo "
              </div>
              <div class=\"hour hour-small\" style=\"left:352px;\">
                ";
        // line 73
        if ((($this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array") + 1) == 24)) {
            // line 74
            echo "                  ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->localizedTimeslot($this->env, "00:00"), "html", null, true);
            echo "
                ";
        } else {
            // line 76
            echo "                  ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->localizedTimeslot($this->env, ($this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array") + 1)), "html", null, true);
            echo "
                ";
        }
        // line 78
        echo "              </div>
              <div class=\"hour hour-small\" style=\"left:599px;\">
                ";
        // line 80
        echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->localizedTimeslot($this->env, ($this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array") - 1)), "html", null, true);
        echo "
              </div>
              <div class=\"hour\" style=\"left:846px;\">
                ";
        // line 83
        echo twig_escape_filter($this->env, $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array")), "html", null, true);
        echo "
              </div>

              ";
        // line 86
        $context["date_format"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? ("d-m-Y") : ("Y-m-d"));
        // line 87
        echo "              ";
        $context["route_name"] = (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) ? ("programmes_timeslot_network") : ("programmes_timeslot"));
        // line 88
        echo "
              ";
        // line 89
        $context["route_params"] = array("date" => ((($this->getAttribute(        // line 90
(isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 0, array(), "array") == 23)) ? (twig_date_format_filter($this->env, ((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) - 86400), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))) : (twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))))), "from_hour" => $this->getAttribute(        // line 91
(isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 0, array(), "array"), "to_hour" => $this->getAttribute(        // line 92
(isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 1, array(), "array"));
        // line 94
        echo "              ";
        if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
            // line 95
            echo "                ";
            $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("network" => $this->getAttribute(            // line 96
(isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array())));
            // line 98
            echo "              ";
        }
        // line 99
        echo "              <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\" id=\"programs-timeslot-previous\" class=\"nav-arrow\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->transChoice("{23} From %start_time% to %end_time% (D-1)|]0,Inf] From %start_time% to %end_time%", $this->getAttribute((isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 0, array(), "array"), array("%start_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 0, array(), "array")), "%end_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["previous_timeslot"]) ? $context["previous_timeslot"] : $this->getContext($context, "previous_timeslot")), 1, array(), "array"))), "messages");
        echo "\"></a>

              ";
        // line 101
        $context["route_params"] = array("date" => ((($this->getAttribute(        // line 102
(isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 0, array(), "array") == 2)) ? (twig_date_format_filter($this->env, ((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) + 86400), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))) : (twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))))), "from_hour" => $this->getAttribute(        // line 103
(isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 0, array(), "array"), "to_hour" => $this->getAttribute(        // line 104
(isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 1, array(), "array"));
        // line 106
        echo "              ";
        if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
            // line 107
            echo "                ";
            $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("network" => $this->getAttribute(            // line 108
(isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array())));
            // line 110
            echo "              ";
        }
        // line 111
        echo "              <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\" id=\"programs-timeslot-next\" class=\"nav-arrow\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->transChoice("{2} From %start_time% to %end_time% (D+1)|]0,Inf] From %start_time% to %end_time%", $this->getAttribute((isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 0, array(), "array"), array("%start_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 0, array(), "array")), "%end_time%" => $this->env->getExtension('Playtv')->localizedTimeslot($this->env, $this->getAttribute((isset($context["next_timeslot"]) ? $context["next_timeslot"] : $this->getContext($context, "next_timeslot")), 1, array(), "array"))), "messages");
        echo "\"></a>

              <a href=\"#\" id=\"programs-timeslot-up\" title=\"";
        // line 113
        echo $this->env->getExtension('translator')->getTranslator()->trans("Scroll to top", array(), "messages");
        echo "\"></a>

              ";
        // line 115
        if ((((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) >= (isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time"))) && ((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) < (isset($context["to_time"]) ? $context["to_time"] : $this->getContext($context, "to_time"))))) {
            // line 116
            echo "              <div id=\"programs-timeslot-now-icon\" style=\"left:";
            echo twig_escape_filter($this->env, (185 + (twig_round((((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) - (isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time"))) / 60), 0, "floor") * 4)), "html", null, true);
            echo "px;\" class=\"hour-mark\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), "H:i"), "html", null, true);
            echo "</div>
              ";
        }
        // line 118
        echo "
            </div>
          </div><!-- #programs-timeslot-hours -->

          ";
        // line 122
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts_channels"]) ? $context["broadcasts_channels"] : $this->getContext($context, "broadcasts_channels")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 123
            echo "          <div class=\"channel";
            if ($this->getAttribute($context["loop"], "first", array())) {
                echo " channel-first";
            }
            if (($this->getAttribute($context["loop"], "index", array()) % 2 == 0)) {
                echo " channel-alt";
            }
            echo "\">

            ";
            // line 125
            $context["route_params"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? (array("channel_alias" => $this->getAttribute($context["channel"], "alias", array()))) : (array("channel_id" => $this->getAttribute($context["channel"], "id", array()), "channel_alias" => $this->getAttribute($context["channel"], "alias", array()))));
            // line 126
            echo "            <a class=\"channel-img\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\" title=\"";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute($context["channel"], "name", array())), "messages");
            echo "\">
              <span>";
            // line 127
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch %channel% live", array("%channel%" => $this->getAttribute($context["channel"], "name", array())), "messages");
            echo "</span>
              <img src=\"";
            // line 128
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["channel"], "images", array()), "small", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["channel"], "name", array()), "html", null, true);
            echo "\" width=\"60\" height=\"60\">
            </a>

            <div class=\"programs\">
              <div class=\"container\"";
            // line 132
            if (($this->getAttribute($this->getAttribute($this->getAttribute($context["channel"], "broadcasts", array()), 0, array(), "array"), "bcast_duration", array()) != $this->getAttribute($this->getAttribute($this->getAttribute($context["channel"], "broadcasts", array()), 0, array(), "array"), "real_duration", array()))) {
                echo " style=\"left:-";
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute($context["channel"], "broadcasts", array()), 0, array(), "array"), "bcast_duration", array()) - $this->getAttribute($this->getAttribute($this->getAttribute($context["channel"], "broadcasts", array()), 0, array(), "array"), "real_duration", array())) * 4), "html", null, true);
                echo "px;\"";
            }
            echo ">
                ";
            // line 133
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["channel"], "broadcasts", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["b"]) {
                // line 134
                echo "                  ";
                if ($this->getAttribute($context["b"], "program", array(), "any", true, true)) {
                    // line 135
                    echo "                    ";
                    $context["width"] = (4 * $this->getAttribute($context["b"], "bcast_duration", array()));
                    // line 136
                    echo "
                    ";
                    // line 137
                    if (((array_key_exists("last_program_short", $context) && ((isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")) != false)) && (($this->getAttribute($context["b"], "bcast_duration", array()) > 10) || (($this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender_id", array()) == 20) && ($this->getAttribute($context["b"], "bcast_duration", array()) > 3))))) {
                        // line 138
                        echo "                      <div class=\"program\" style=\"width:";
                        echo twig_escape_filter($this->env, (isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")), "html", null, true);
                        echo "px;\">
                        ";
                        // line 139
                        if (((isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")) > 15)) {
                            // line 140
                            echo "                          <span class=\"icon-external\" title=\"";
                            echo twig_escape_filter($this->env, (isset($context["last_program_title"]) ? $context["last_program_title"] : $this->getContext($context, "last_program_title")), "html", null, true);
                            echo "\">...</span>
                        ";
                        }
                        // line 142
                        echo "                      </div> ";
                        // line 143
                        echo "                    ";
                    }
                    // line 144
                    echo "
                    ";
                    // line 146
                    echo "                    ";
                    if (($this->getAttribute($context["b"], "real_duration", array()) > 0)) {
                        // line 147
                        echo "                      ";
                        // line 148
                        echo "                      ";
                        if ((($this->getAttribute($context["b"], "bcast_duration", array()) > 10) || (($this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender_id", array()) == 20) && ($this->getAttribute($context["b"], "bcast_duration", array()) > 3)))) {
                            // line 149
                            echo "                        <div class=\"program\" style=\"width:";
                            echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
                            echo "px;\">
                          ";
                            // line 150
                            if ((($this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender_id", array()) == 20) && ($this->getAttribute($context["b"], "bcast_duration", array()) > 3))) {
                                echo " ";
                                // line 151
                                echo "                            <a href=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                                echo "\" title=\"";
                                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "title", array()), "html", null, true);
                                echo "\">
                              <i class=\"icons-meteo icon\" title=\"";
                                // line 152
                                echo $this->env->getExtension('translator')->getTranslator()->trans("Weather", array(), "messages");
                                echo "\"></i>
                            </a>
                          ";
                            } else {
                                // line 155
                                echo "                            ";
                                // line 156
                                echo "                            ";
                                if ((($this->getAttribute($context["b"], "real_duration", array()) > 10) && $this->getAttribute($this->getAttribute($context["b"], "program", array(), "any", false, true), "program_id", array(), "any", true, true))) {
                                    // line 157
                                    echo "                              <div class=\"content ";
                                    if ($this->getAttribute($this->getAttribute($context["b"], "program", array()), "trailer", array())) {
                                        echo "pmd-Text--truncate";
                                    }
                                    echo "\"";
                                    if (((twig_first($this->env, $this->getAttribute($context["channel"], "broadcasts", array())) == $context["b"]) && ($this->getAttribute($context["b"], "bcast_duration", array()) != $this->getAttribute($context["b"], "real_duration", array())))) {
                                        echo " style=\"margin-left:";
                                        echo twig_escape_filter($this->env, ((($this->getAttribute($context["b"], "bcast_duration", array()) * 4) - ($this->getAttribute($context["b"], "real_duration", array()) * 4)) + 8), "html", null, true);
                                        echo "px;\"";
                                    }
                                    echo ">

                                <!-- Affichage de l'image -->
                                ";
                                    // line 160
                                    if (( !(null === $this->getAttribute($this->getAttribute($this->getAttribute($context["b"], "program", array()), "images", array()), "small", array())) && ($this->getAttribute($context["b"], "real_duration", array()) > 59))) {
                                        // line 161
                                        echo "                                  <a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                                        echo "\" title=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "title", array()), "html", null, true);
                                        echo "\" class=\"program-img program-img-small ";
                                        if ($this->getAttribute($this->getAttribute($context["b"], "program", array()), "trailer", array())) {
                                            echo "pmd-js-TrailerButton";
                                        }
                                        echo "\" data-program-id=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "id", array()), "html", null, true);
                                        echo "\">
                                    <img src=\"";
                                        // line 162
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["b"], "program", array()), "images", array()), "small", array()), "html", null, true);
                                        echo "\" width=\"80\" height=\"60\" alt=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "\">
                                    <span class=\"cache\"></span>
                                    ";
                                        // line 164
                                        if ($this->getAttribute($this->getAttribute($context["b"], "program", array()), "trailer", array())) {
                                            // line 165
                                            echo "                                      <span class=\"pmd-TrailerIcon\"></span>
                                    ";
                                        }
                                        // line 167
                                        echo "                                  </a>
                                ";
                                    }
                                    // line 169
                                    echo "
                                <small class=\"infos\">
                                  ";
                                    // line 172
                                    echo "                                  <span class=\"start\" title=\"";
                                    echo $this->env->getExtension('translator')->getTranslator()->trans("Duration: %duration%", array("%duration%" => $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($this->getAttribute($context["b"], "program", array()), "duration", array()))), "messages");
                                    echo "\">";
                                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["b"], "start", array()), "H:i"), "html", null, true);
                                    echo "</span>
                                  <!-- Note du programme -->
                                  ";
                                    // line 174
                                    if (($this->getAttribute($this->getAttribute($context["b"], "program", array()), "stars", array()) > 0)) {
                                        // line 175
                                        echo "                                  <span class=\"ptv-Timeslot-rating\">
                                    <i class=\"ptv-Rating-";
                                        // line 176
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "stars", array()), "html", null, true);
                                        echo "\"></i>
                                  </span>
                                  ";
                                    }
                                    // line 179
                                    echo "                                  <!-- Genre du programme -->
                                  ";
                                    // line 180
                                    if ((($this->getAttribute($context["b"], "real_duration", array()) > 14) &&  !(null === $this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender", array())))) {
                                        // line 181
                                        echo "                                    ";
                                        ob_start();
                                        // line 182
                                        echo "                                      <span class=\"program-gender small\">
                                        <span class=\"program-gender-icon program-gender-icon";
                                        // line 183
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender_id", array()), "html", null, true);
                                        echo "\"></span>
                                        <span>";
                                        // line 184
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender", array()), "html", null, true);
                                        echo "</span>
                                      </span>
                                    ";
                                        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
                                        // line 187
                                        echo "                                  ";
                                    }
                                    // line 188
                                    echo "                                </small>

                                <!-- Titre du programme -->
                                ";
                                    // line 191
                                    if ((($this->getAttribute($context["b"], "real_duration", array()) > 59) && ($this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()) < 38))) {
                                        // line 192
                                        echo "                                  <a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                                        echo "\" class=\"big-title\" title=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "\">";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "</a>
                                  ";
                                        // line 193
                                        if ($this->getAttribute($this->getAttribute($context["b"], "program", array()), "trailer", array())) {
                                            // line 194
                                            echo "                                    <br>
                                    <a href=\"#\" class=\"pmd-js-TrailerButton pmd-Button pmd-TrailerButton pmd-TrailerButton--timeslot\" data-program-id=\"";
                                            // line 195
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "id", array()), "html", null, true);
                                            echo "\" data-program-alias=\"";
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "alias", array()), "html", null, true);
                                            echo "\">
                                      <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer\">
                                        <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--trailer\"></use>
                                      </svg>
                                      ";
                                            // line 199
                                            echo $this->env->getExtension('translator')->getTranslator()->trans("Trailer", array(), "messages");
                                            // line 200
                                            echo "                                    </a>
                                  ";
                                        } elseif ( !(null === $this->getAttribute($this->getAttribute(                                        // line 201
$context["b"], "program", array()), "subtitle", array()))) {
                                            // line 202
                                            echo "                                    <br>
                                    <span class=\"clear-grey\">";
                                            // line 203
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "subtitle", array()), "html", null, true);
                                            echo "</span>
                                  ";
                                        } elseif ( !(null === $this->getAttribute($this->getAttribute(                                        // line 204
$context["b"], "program", array()), "originaltitle", array()))) {
                                            // line 205
                                            echo "                                    <br>
                                    <span class=\"clear-grey\">";
                                            // line 206
                                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "originaltitle", array()), "html", null, true);
                                            echo "</span>
                                  ";
                                        }
                                        // line 208
                                        echo "                                ";
                                    } elseif (($this->getAttribute($context["b"], "real_duration", array()) > 29)) {
                                        // line 209
                                        echo "                                  <a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                                        echo "\" class=\"medium-title\" title=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "\">";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "</a>
                                ";
                                    } else {
                                        // line 211
                                        echo "                                  <a href=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "program_url", array()), "html", null, true);
                                        echo "\" title=\"";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "\">";
                                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                        echo "</a>
                                ";
                                    }
                                    // line 213
                                    echo "
                              </div>

                            ";
                                } elseif ( !$this->getAttribute(                                // line 216
$context["b"], "program_id", array(), "any", true, true)) {
                                    echo " ";
                                    // line 217
                                    echo "                              <span class=\"icon-unknown\" title=\"";
                                    echo $this->env->getExtension('translator')->getTranslator()->trans("Unknown program", array(), "messages");
                                    echo "\">?</span>
                            ";
                                } else {
                                    // line 218
                                    echo " ";
                                    // line 219
                                    echo "                              <span class=\"icon-external\" title=\"";
                                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()), "html", null, true);
                                    echo "\">...</span>
                            ";
                                }
                                // line 221
                                echo "
                          ";
                            }
                            // line 223
                            echo "
                        </div>

                      ";
                            // line 227
                            echo "                      ";
                        } else {
                            // line 228
                            echo "
                        ";
                            // line 229
                            if (( !array_key_exists("last_program_short", $context) || ((isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")) == false))) {
                                // line 230
                                echo "                          ";
                                $context["last_program_short"] = 0;
                                // line 231
                                echo "                          ";
                                if ( !(null === $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()))) {
                                    // line 232
                                    echo "                            ";
                                    $context["last_program_title"] = ((($this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()) . " (") . $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($context["b"], "bcast_duration", array()))) . ")");
                                    // line 233
                                    echo "                          ";
                                }
                                // line 234
                                echo "                        ";
                            } else {
                                // line 235
                                echo "                          ";
                                if ( !(null === $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array()))) {
                                    // line 236
                                    echo "                            ";
                                    $context["last_program_title"] = (isset($context["last_program_title"]) ? $context["last_program_title"] : $this->getContext($context, "last_program_title"));
                                    // line 237
                                    echo "                            ";
                                    if ( !twig_test_empty((isset($context["last_program_title"]) ? $context["last_program_title"] : $this->getContext($context, "last_program_title")))) {
                                        // line 238
                                        echo "                              ";
                                        $context["last_program_title"] = ((isset($context["last_program_title"]) ? $context["last_program_title"] : $this->getContext($context, "last_program_title")) . ",");
                                        // line 239
                                        echo "                            ";
                                    }
                                    // line 240
                                    echo "                            ";
                                    $context["last_program_title"] = (((((isset($context["last_program_title"]) ? $context["last_program_title"] : $this->getContext($context, "last_program_title")) . $this->getAttribute($this->getAttribute($context["b"], "program", array()), "fulltitle", array())) . " (") . $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($context["b"], "bcast_duration", array()))) . ")");
                                    // line 241
                                    echo "                          ";
                                }
                                // line 242
                                echo "                        ";
                            }
                            // line 243
                            echo "
                        ";
                            // line 244
                            $context["total"] = ((isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")) + (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")));
                            // line 245
                            echo "
                      ";
                        }
                        // line 247
                        echo "
                      ";
                        // line 249
                        echo "                      ";
                        if ((($this->getAttribute($context["b"], "bcast_duration", array()) > 10) || (($this->getAttribute($this->getAttribute($context["b"], "program", array()), "gender_id", array()) == 20) && ($this->getAttribute($context["b"], "bcast_duration", array()) > 3)))) {
                            // line 250
                            echo "                        ";
                            $context["last_program_short"] = false;
                            // line 251
                            echo "                      ";
                        } elseif ((twig_last($this->env, $this->getAttribute($context["channel"], "broadcasts", array())) == $context["b"])) {
                            // line 252
                            echo "                        <div class=\"program\" style=\"width:";
                            echo twig_escape_filter($this->env, (isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")), "html", null, true);
                            echo "px;\">
                          ";
                            // line 253
                            if (((isset($context["last_program_short"]) ? $context["last_program_short"] : $this->getContext($context, "last_program_short")) > 15)) {
                                // line 254
                                echo "                            <span class=\"icon-external\" title=\"";
                                echo $this->env->getExtension('translator')->getTranslator()->trans("Short programs", array(), "messages");
                                echo "\">...</span>
                          ";
                            }
                            // line 256
                            echo "                        </div> ";
                            // line 257
                            echo "                        ";
                            $context["last_program_short"] = false;
                            // line 258
                            echo "                      ";
                        } else {
                            // line 259
                            echo "                        ";
                            $context["last_program_short"] = (isset($context["total"]) ? $context["total"] : $this->getContext($context, "total"));
                            // line 260
                            echo "                      ";
                        }
                        // line 261
                        echo "
                    ";
                    }
                    // line 263
                    echo "
                  ";
                } else {
                    // line 265
                    echo "                    ";
                    $context["width"] = 880;
                    // line 266
                    echo "                    <div class=\"program\" style=\"width:";
                    echo twig_escape_filter($this->env, (isset($context["width"]) ? $context["width"] : $this->getContext($context, "width")), "html", null, true);
                    echo "px;\">
                      <span class=\"icon-unknown\" title=\"";
                    // line 267
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Unknown program", array(), "messages");
                    echo "\">?</span>
                    </div>
                  ";
                }
                // line 270
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['b'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 271
            echo "              </div>
            </div><!-- program -->

          </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 276
        echo "
        ";
        // line 277
        if ((((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) >= (isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time"))) && ((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) < (isset($context["to_time"]) ? $context["to_time"] : $this->getContext($context, "to_time"))))) {
            // line 278
            echo "        <div id=\"programs-timeslot-now\" style=\"left:";
            echo twig_escape_filter($this->env, (185 + (twig_round((((isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")) - (isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time"))) / 60), 0, "floor") * 4)), "html", null, true);
            echo "px;\" class=\"hour-mark\"></div>
        ";
        }
        // line 280
        echo "        <div class=\"hour-mark\" style=\"left:106px;\"></div>
        <div class=\"hour-mark hour-dash\" style=\"left:186px;\"></div>
        <div class=\"hour-mark hour-dash\" style=\"left:426px;\"></div>
        <div class=\"hour-mark hour-dash\" style=\"left:666px;\"></div>
        <div class=\"hour-mark hour-dash\" style=\"left:906px;\"></div>
        <div class=\"hour-mark\" style=\"left:987px;\"></div>

      </div>

      </div>

    </div>

  </div>
</div> <!-- /#content -->

<script>var from_time = ";
        // line 296
        echo twig_escape_filter($this->env, ((array_key_exists("from_time", $context)) ? (_twig_default_filter((isset($context["from_time"]) ? $context["from_time"] : $this->getContext($context, "from_time")), null)) : (null)), "html", null, true);
        echo ";</script>
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/timeslot.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  753 => 296,  735 => 280,  729 => 278,  727 => 277,  724 => 276,  706 => 271,  700 => 270,  694 => 267,  689 => 266,  686 => 265,  682 => 263,  678 => 261,  675 => 260,  672 => 259,  669 => 258,  666 => 257,  664 => 256,  658 => 254,  656 => 253,  651 => 252,  648 => 251,  645 => 250,  642 => 249,  639 => 247,  635 => 245,  633 => 244,  630 => 243,  627 => 242,  624 => 241,  621 => 240,  618 => 239,  615 => 238,  612 => 237,  609 => 236,  606 => 235,  603 => 234,  600 => 233,  597 => 232,  594 => 231,  591 => 230,  589 => 229,  586 => 228,  583 => 227,  578 => 223,  574 => 221,  568 => 219,  566 => 218,  560 => 217,  557 => 216,  552 => 213,  542 => 211,  532 => 209,  529 => 208,  524 => 206,  521 => 205,  519 => 204,  515 => 203,  512 => 202,  510 => 201,  507 => 200,  505 => 199,  496 => 195,  493 => 194,  491 => 193,  482 => 192,  480 => 191,  475 => 188,  472 => 187,  466 => 184,  462 => 183,  459 => 182,  456 => 181,  454 => 180,  451 => 179,  445 => 176,  442 => 175,  440 => 174,  432 => 172,  428 => 169,  424 => 167,  420 => 165,  418 => 164,  411 => 162,  398 => 161,  396 => 160,  381 => 157,  378 => 156,  376 => 155,  370 => 152,  363 => 151,  360 => 150,  355 => 149,  352 => 148,  350 => 147,  347 => 146,  344 => 144,  341 => 143,  339 => 142,  333 => 140,  331 => 139,  326 => 138,  324 => 137,  321 => 136,  318 => 135,  315 => 134,  311 => 133,  303 => 132,  294 => 128,  290 => 127,  283 => 126,  281 => 125,  270 => 123,  253 => 122,  247 => 118,  239 => 116,  237 => 115,  232 => 113,  224 => 111,  221 => 110,  219 => 108,  217 => 107,  214 => 106,  212 => 104,  211 => 103,  210 => 102,  209 => 101,  201 => 99,  198 => 98,  196 => 96,  194 => 95,  191 => 94,  189 => 92,  188 => 91,  187 => 90,  186 => 89,  183 => 88,  180 => 87,  178 => 86,  172 => 83,  166 => 80,  162 => 78,  156 => 76,  150 => 74,  148 => 73,  142 => 70,  124 => 54,  122 => 53,  112 => 45,  108 => 43,  102 => 41,  100 => 40,  96 => 38,  93 => 37,  90 => 36,  88 => 33,  87 => 34,  85 => 33,  83 => 31,  81 => 30,  78 => 29,  76 => 26,  75 => 27,  73 => 26,  70 => 25,  68 => 23,  67 => 22,  65 => 21,  62 => 20,  59 => 19,  57 => 18,  53 => 17,  49 => 15,  47 => 14,  43 => 13,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" with {"subnav_active": "live"} %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row">*/
/*       <div class="span16">*/
/* */
/*         <div class="section-title">*/
/*           <p class="right clear-grey">{% trans %}TV programs guide{% endtrans %}</p>*/
/*           {% spaceless %}*/
/*           <h1>*/
/*             <strong>*/
/*               <a href="{{ request.uri }}">*/
/*                 {% if now >= from_time and now < to_time %}*/
/*                   {% trans %}Live on TV{% endtrans %}*/
/*                 {% else %}*/
/*                   {% set trans_params = {*/
/*                     '%start_time%': selected_timeslot[0]|localizedtimeslot,*/
/*                     '%end_time%': selected_timeslot[1]|localizedtimeslot*/
/*                   } %}*/
/*                   {% if selected_date == now_date %}*/
/*                     {% trans with trans_params %}*/
/*                     Today from %start_time% to %end_time%*/
/*                     {% endtrans %}*/
/*                   {% else %}*/
/*                     {% set trans_params = trans_params|merge({*/
/*                       '%date%': selected_date|localizeddate('full', 'none', locale)|capitalize*/
/*                     }) %}*/
/*                     {% trans with trans_params %}*/
/*                     %date% from %start_time% to %end_time%*/
/*                     {% endtrans %}*/
/*                   {% endif %}*/
/*                 {% endif %}*/
/*               </a>*/
/*             </strong>*/
/*             {% if selected_network %}*/
/*             <span> (bouquet <strong>{{ selected_network.network }}</strong>)</span>*/
/*             {% endif %}*/
/*           </h1>*/
/*           {% endspaceless %}*/
/*         </div>*/
/* */
/*         <div id="programs-timeslot">*/
/* */
/*           <div id="programs-timeslot-hours">*/
/* */
/*             <div id="programs-title-bar">*/
/*               <div class="right">*/
/*                 {% include "controllers/programmes-tv/_filters.twig" %}*/
/*               </div>*/
/*             </div>*/
/* */
/*             <div id="programs-timeslot-bar">*/
/* */
/*               <div id="programs-timeslot-bar-bg">*/
/*                 <span class="hour-time t-1"></span>*/
/*                 <span class="half-time t-2"></span>*/
/*                 <span class="hour-time t-3"></span>*/
/*                 <span class="half-time t-4"></span>*/
/*                 <span class="hour-time t-5"></span>*/
/*                 <span class="half-time t-6"></span>*/
/*                 <span class="hour-time t-7"></span>*/
/*               </div>*/
/* */
/*               <div class="hour" style="left:104px;">*/
/*                 {{ selected_timeslot[0]|localizedtimeslot }}*/
/*               </div>*/
/*               <div class="hour hour-small" style="left:352px;">*/
/*                 {% if selected_timeslot[0] + 1 == 24 %}*/
/*                   {{ '00:00'|localizedtimeslot }}*/
/*                 {% else %}*/
/*                   {{ (selected_timeslot[0] + 1)|localizedtimeslot }}*/
/*                 {% endif %}*/
/*               </div>*/
/*               <div class="hour hour-small" style="left:599px;">*/
/*                 {{ (selected_timeslot[1] - 1)|localizedtimeslot }}*/
/*               </div>*/
/*               <div class="hour" style="left:846px;">*/
/*                 {{ selected_timeslot[1]|localizedtimeslot }}*/
/*               </div>*/
/* */
/*               {% set date_format = is_website_fr ? 'd-m-Y': 'Y-m-d' %}*/
/*               {% set route_name = selected_network is not null ? 'programmes_timeslot_network' : 'programmes_timeslot' %}*/
/* */
/*               {% set route_params = {*/
/*                 'date': previous_timeslot[0] == 23 ? (selected_date-86400)|date(date_format) : selected_date|date(date_format),*/
/*                 'from_hour': previous_timeslot[0],*/
/*                 'to_hour': previous_timeslot[1]*/
/*               } %}*/
/*               {% if selected_network is not null %}*/
/*                 {% set route_params = route_params|merge({*/
/*                   'network': selected_network.alias*/
/*                 }) %}*/
/*               {% endif %}*/
/*               <a href="{{ path(route_name, route_params) }}" id="programs-timeslot-previous" class="nav-arrow" title="{% transchoice previous_timeslot[0] with {'%start_time%': previous_timeslot[0]|localizedtimeslot, '%end_time%': previous_timeslot[1]|localizedtimeslot} %}{23} From %start_time% to %end_time% (D-1)|]0,Inf] From %start_time% to %end_time%{% endtranschoice %}"></a>*/
/* */
/*               {% set route_params = {*/
/*                 'date': next_timeslot[0] == 2 ? (selected_date+86400)|date(date_format) : selected_date|date(date_format),*/
/*                 'from_hour': next_timeslot[0],*/
/*                 'to_hour': next_timeslot[1]*/
/*               } %}*/
/*               {% if selected_network is not null %}*/
/*                 {% set route_params = route_params|merge({*/
/*                   'network': selected_network.alias*/
/*                 }) %}*/
/*               {% endif %}*/
/*               <a href="{{ path(route_name, route_params) }}" id="programs-timeslot-next" class="nav-arrow" title="{% transchoice next_timeslot[0] with {'%start_time%': next_timeslot[0]|localizedtimeslot, '%end_time%': next_timeslot[1]|localizedtimeslot} %}{2} From %start_time% to %end_time% (D+1)|]0,Inf] From %start_time% to %end_time%{% endtranschoice %}"></a>*/
/* */
/*               <a href="#" id="programs-timeslot-up" title="{% trans %}Scroll to top{% endtrans %}"></a>*/
/* */
/*               {% if now >= from_time and now < to_time %}*/
/*               <div id="programs-timeslot-now-icon" style="left:{{ 185 + ((now - from_time) / 60)|round(0, 'floor') * 4 }}px;" class="hour-mark">{{ now|date("H:i") }}</div>*/
/*               {% endif %}*/
/* */
/*             </div>*/
/*           </div><!-- #programs-timeslot-hours -->*/
/* */
/*           {% for channel in broadcasts_channels %}*/
/*           <div class="channel{% if loop.first %} channel-first{% endif %}{% if loop.index is even %} channel-alt{% endif %}">*/
/* */
/*             {% set route_params = is_website_fr ? {'channel_alias': channel.alias} : {'channel_id': channel.id, 'channel_alias': channel.alias} %}*/
/*             <a class="channel-img" href="{{ path('chaine_tv', route_params) }}" title="{% trans with {'%channel%': channel.name} %}Watch %channel% live{% endtrans %}">*/
/*               <span>{% trans with {'%channel%': channel.name} %}Watch %channel% live{% endtrans %}</span>*/
/*               <img src="{{ channel.images.small }}" alt="{{ channel.name }}" width="60" height="60">*/
/*             </a>*/
/* */
/*             <div class="programs">*/
/*               <div class="container"{% if channel.broadcasts[0].bcast_duration != channel.broadcasts[0].real_duration %} style="left:-{{ (channel.broadcasts[0].bcast_duration - channel.broadcasts[0].real_duration)*4 }}px;"{% endif %}>*/
/*                 {% for b in channel.broadcasts %}*/
/*                   {% if b.program is defined %}*/
/*                     {% set width = 4*b.bcast_duration %}*/
/* */
/*                     {% if (last_program_short is defined and last_program_short != false) and (b.bcast_duration > 10 or (b.program.gender_id == 20 and b.bcast_duration > 3)) %}*/
/*                       <div class="program" style="width:{{ last_program_short }}px;">*/
/*                         {% if last_program_short > 15 %}*/
/*                           <span class="icon-external" title="{{ last_program_title }}">...</span>*/
/*                         {% endif %}*/
/*                       </div> {# <!-- close .program for short programs --> #}*/
/*                     {% endif %}*/
/* */
/*                     {# <!-- Si le programme a une durée > 0 dans la tranche --> #}*/
/*                     {% if b.real_duration > 0 %}*/
/*                       {# <!-- Si le programme a une durée > 10mn OU que c'est une météo (> 3mn) --> #}*/
/*                       {% if b.bcast_duration > 10 or (b.program.gender_id == 20 and b.bcast_duration > 3) %}*/
/*                         <div class="program" style="width:{{ width }}px;">*/
/*                           {% if b.program.gender_id == 20 and b.bcast_duration > 3 %} {# <!-- Si c'est une météo, on affiche un logo --> #}*/
/*                             <a href="{{ b.program.program_url }}" title="{{ b.program.title }}">*/
/*                               <i class="icons-meteo icon" title="{% trans %}Weather{% endtrans %}"></i>*/
/*                             </a>*/
/*                           {% else %}*/
/*                             {# <!-- Si c'est un vrai programme dt la durée ds la tranche > 10mn --> #}*/
/*                             {% if b.real_duration > 10 and b.program.program_id is defined %}*/
/*                               <div class="content {% if b.program.trailer %}pmd-Text--truncate{% endif %}"{% if channel.broadcasts|first == b and b.bcast_duration != b.real_duration %} style="margin-left:{{ (b.bcast_duration*4 - b.real_duration*4)+8 }}px;"{% endif %}>*/
/* */
/*                                 <!-- Affichage de l'image -->*/
/*                                 {% if b.program.images.small is not null and b.real_duration > 59 %}*/
/*                                   <a href="{{ b.program.program_url }}" title="{{ b.program.title }}" class="program-img program-img-small {% if b.program.trailer %}pmd-js-TrailerButton{% endif %}" data-program-id="{{ b.program.id }}">*/
/*                                     <img src="{{ b.program.images.small }}" width="80" height="60" alt="{{ b.program.fulltitle }}">*/
/*                                     <span class="cache"></span>*/
/*                                     {% if b.program.trailer %}*/
/*                                       <span class="pmd-TrailerIcon"></span>*/
/*                                     {% endif %}*/
/*                                   </a>*/
/*                                 {% endif %}*/
/* */
/*                                 <small class="infos">*/
/*                                   {# <!-- Heure de début --> #}*/
/*                                   <span class="start" title="{% trans with {'%duration%': b.program.duration|diff_for_humans} %}Duration: %duration%{% endtrans %}">{{ b.start|date('H:i') }}</span>*/
/*                                   <!-- Note du programme -->*/
/*                                   {% if b.program.stars > 0 %}*/
/*                                   <span class="ptv-Timeslot-rating">*/
/*                                     <i class="ptv-Rating-{{ b.program.stars }}"></i>*/
/*                                   </span>*/
/*                                   {% endif %}*/
/*                                   <!-- Genre du programme -->*/
/*                                   {% if b.real_duration > 14 and b.program.gender is not null %}*/
/*                                     {% spaceless %}*/
/*                                       <span class="program-gender small">*/
/*                                         <span class="program-gender-icon program-gender-icon{{ b.program.gender_id }}"></span>*/
/*                                         <span>{{ b.program.gender }}</span>*/
/*                                       </span>*/
/*                                     {% endspaceless %}*/
/*                                   {% endif %}*/
/*                                 </small>*/
/* */
/*                                 <!-- Titre du programme -->*/
/*                                 {% if b.real_duration > 59 and b.program.fulltitle < 38 %}*/
/*                                   <a href="{{ b.program.program_url }}" class="big-title" title="{{ b.program.fulltitle }}">{{ b.program.fulltitle }}</a>*/
/*                                   {% if b.program.trailer %}*/
/*                                     <br>*/
/*                                     <a href="#" class="pmd-js-TrailerButton pmd-Button pmd-TrailerButton pmd-TrailerButton--timeslot" data-program-id="{{ b.program.id }}" data-program-alias="{{ b.program.alias}}">*/
/*                                       <svg role="img" class="pmd-Svg pmd-Svg--trailer">*/
/*                                         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--trailer"></use>*/
/*                                       </svg>*/
/*                                       {% trans %}Trailer{% endtrans %}*/
/*                                     </a>*/
/*                                   {% elseif b.program.subtitle is not null %}*/
/*                                     <br>*/
/*                                     <span class="clear-grey">{{ b.program.subtitle }}</span>*/
/*                                   {% elseif b.program.originaltitle is not null %}*/
/*                                     <br>*/
/*                                     <span class="clear-grey">{{ b.program.originaltitle }}</span>*/
/*                                   {% endif %}*/
/*                                 {% elseif b.real_duration > 29 %}*/
/*                                   <a href="{{ b.program.program_url }}" class="medium-title" title="{{ b.program.fulltitle }}">{{ b.program.fulltitle }}</a>*/
/*                                 {% else %}*/
/*                                   <a href="{{ b.program.program_url }}" title="{{ b.program.fulltitle }}">{{ b.program.fulltitle }}</a>*/
/*                                 {% endif %}*/
/* */
/*                               </div>*/
/* */
/*                             {% elseif b.program_id is not defined %} {# <!-- Pas de programme --> #}*/
/*                               <span class="icon-unknown" title="{% trans %}Unknown program{% endtrans %}">?</span>*/
/*                             {% else %} {# <!-- Programme trop court --> #}*/
/*                               <span class="icon-external" title="{{ b.program.fulltitle }}">...</span>*/
/*                             {% endif %}*/
/* */
/*                           {% endif %}*/
/* */
/*                         </div>*/
/* */
/*                       {# <!-- Si le programme est hors de la tranche, traitements etc. --> #}*/
/*                       {% else %}*/
/* */
/*                         {% if last_program_short is not defined or last_program_short == false %}*/
/*                           {% set last_program_short = 0 %}*/
/*                           {% if b.program.fulltitle is not null %}*/
/*                             {% set last_program_title = b.program.fulltitle ~ ' (' ~ b.bcast_duration|diff_for_humans ~ ')' %}*/
/*                           {% endif %}*/
/*                         {% else %}*/
/*                           {% if b.program.fulltitle is not null %}*/
/*                             {% set last_program_title = last_program_title %}*/
/*                             {% if last_program_title is not empty %}*/
/*                               {% set last_program_title = last_program_title ~ ',' %}*/
/*                             {% endif %}*/
/*                             {% set last_program_title = last_program_title ~ b.program.fulltitle ~ ' (' ~ b.bcast_duration|diff_for_humans ~ ')' %}*/
/*                           {% endif %}*/
/*                         {% endif %}*/
/* */
/*                         {% set total = last_program_short + width %}*/
/* */
/*                       {% endif %}*/
/* */
/*                       {# <!-- Traitements et fermeture de balises --> #}*/
/*                       {% if b.bcast_duration > 10 or (b.program.gender_id == 20 and b.bcast_duration > 3) %}*/
/*                         {% set last_program_short = false %}*/
/*                       {% elseif channel.broadcasts|last == b %}*/
/*                         <div class="program" style="width:{{ last_program_short }}px;">*/
/*                           {% if last_program_short > 15 %}*/
/*                             <span class="icon-external" title="{% trans %}Short programs{% endtrans %}">...</span>*/
/*                           {% endif %}*/
/*                         </div> {# <!-- close .program for short programs --> #}*/
/*                         {% set last_program_short = false %}*/
/*                       {% else %}*/
/*                         {% set last_program_short = total %}*/
/*                       {% endif %}*/
/* */
/*                     {% endif %}*/
/* */
/*                   {% else %}*/
/*                     {% set width = 880 %}*/
/*                     <div class="program" style="width:{{ width }}px;">*/
/*                       <span class="icon-unknown" title="{% trans %}Unknown program{% endtrans %}">?</span>*/
/*                     </div>*/
/*                   {% endif %}*/
/*                 {% endfor %}*/
/*               </div>*/
/*             </div><!-- program -->*/
/* */
/*           </div>*/
/*         {% endfor %}*/
/* */
/*         {% if now >= from_time and now < to_time %}*/
/*         <div id="programs-timeslot-now" style="left:{{ 185 + ((now - from_time) / 60)|round(0, 'floor') * 4 }}px;" class="hour-mark"></div>*/
/*         {% endif %}*/
/*         <div class="hour-mark" style="left:106px;"></div>*/
/*         <div class="hour-mark hour-dash" style="left:186px;"></div>*/
/*         <div class="hour-mark hour-dash" style="left:426px;"></div>*/
/*         <div class="hour-mark hour-dash" style="left:666px;"></div>*/
/*         <div class="hour-mark hour-dash" style="left:906px;"></div>*/
/*         <div class="hour-mark" style="left:987px;"></div>*/
/* */
/*       </div>*/
/* */
/*       </div>*/
/* */
/*     </div>*/
/* */
/*   </div>*/
/* </div> <!-- /#content -->*/
/* */
/* <script>var from_time = {{ from_time|default(null) }};</script>*/
/* {% endblock %}*/
/* */
