<?php

/* controllers/programmes-tv/_filters.twig */
class __TwigTemplate_806803f28216557a6c7576b829d07f24fd23a8abf7586ab685a25252a51dab7b extends Twig_Template
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
        // line 2
        $context["date_format"] = (((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) ? ("d-m-Y") : ("Y-m-d"));
        // line 3
        echo "<div id=\"programs-date-dropdown\" class=\"bar-dropdown separator\">

  <div class=\"default-value pmd-Text--truncate\">
    ";
        // line 6
        ob_start();
        // line 7
        echo "    ";
        if ( !(null === (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) {
            // line 8
            echo "      ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            echo "
    ";
        } else {
            // line 10
            echo "      ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, "now", "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
            echo "
    ";
        }
        // line 12
        echo "    <span class=\"icon\"><i></i></span>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 14
        echo "  </div>
  <div class=\"list-values\">
    <ul>
    ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dates"]) ? $context["dates"] : $this->getContext($context, "dates")));
        foreach ($context['_seq'] as $context["_key"] => $context["d"]) {
            // line 18
            echo "      ";
            $context["route_params"] = array("date" => twig_date_format_filter($this->env,             // line 19
$context["d"], (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))));
            // line 21
            echo "      ";
            if ( !(null === (isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")))) {
                // line 22
                echo "        ";
                $context["route_name"] = (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) ? ("programmes_timeslot_network") : ("programmes_timeslot"));
                // line 23
                echo "        ";
                $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("from_hour" => $this->getAttribute(                // line 24
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array"), "to_hour" => $this->getAttribute(                // line 25
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array")));
                // line 27
                echo "      ";
            } else {
                // line 28
                echo "        ";
                $context["route_name"] = (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) ? ("programmes_prime_date_network") : ("programmes_prime_date"));
                // line 29
                echo "      ";
            }
            // line 30
            echo "      ";
            if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
                // line 31
                echo "        ";
                $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("network" => $this->getAttribute(                // line 32
(isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array())));
                // line 34
                echo "      ";
            }
            // line 35
            echo "      <li>
        <a href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\"";
            if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == $context["d"])) {
                echo " class=\"selected\"";
            }
            echo ">
          ";
            // line 37
            if (((isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")) == $context["d"])) {
                // line 38
                echo "            ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Today", array(), "messages");
                // line 39
                echo "          ";
            } else {
                // line 40
                echo "            ";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $context["d"], "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
                echo "
          ";
            }
            // line 42
            echo "        </a>
      </li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['d'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "    </ul>
  </div>

</div>

";
        // line 51
        echo "<div id=\"programs-timeslot-dropdown\" class=\"bar-dropdown separator\">

  <div class=\"default-value\">
    ";
        // line 54
        ob_start();
        // line 55
        echo "    ";
        if ((null === (isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")))) {
            // line 56
            echo "      ";
            if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "ce_soir")) {
                // line 57
                echo "        ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("Evening", array(), "messages");
                // line 58
                echo "      ";
            } else {
                // line 59
                echo "        ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["now_timeslot"]) ? $context["now_timeslot"] : $this->getContext($context, "now_timeslot")), 0, array(), "array"), "html", null, true);
                echo "h à ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["now_timeslot"]) ? $context["now_timeslot"] : $this->getContext($context, "now_timeslot")), 1, array(), "array"), "html", null, true);
                echo "h
      ";
            }
            // line 61
            echo "    ";
        } elseif ((((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) == (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date"))) && ($this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array") == $this->getAttribute((isset($context["now_timeslot"]) ? $context["now_timeslot"] : $this->getContext($context, "now_timeslot")), 0, array(), "array")))) {
            // line 62
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Live", array(), "messages");
            // line 63
            echo "    ";
        } else {
            // line 64
            echo "      ";
            $context["trans_params"] = array("%from_hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (("now " . $this->getAttribute(            // line 65
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array")) . ":00"), "none", "short")), "%to_hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (("now " . $this->getAttribute(            // line 66
(isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array")) . ":00"), "none", "short")));
            // line 68
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("%from_hour% to %to_hour%", array_merge(array("%from_hour%" =>             // line 69
(isset($context["from_hour"]) ? $context["from_hour"] : null), "%to_hour%" => (isset($context["to_hour"]) ? $context["to_hour"] : null)),             // line 68
(isset($context["trans_params"]) ? $context["trans_params"] : $this->getContext($context, "trans_params"))), "messages");
            // line 71
            echo "    ";
        }
        // line 72
        echo "    <span class=\"icon\"><i></i></span>
    ";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
        // line 74
        echo "  </div>
  <div class=\"list-values\">
    <ul>
      ";
        // line 77
        $context["route_name"] = (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) ? ("programmes_prime_date_network") : ("programmes_prime_date"));
        // line 78
        echo "      ";
        $context["route_params"] = array("date" => (( !(null ===         // line 79
(isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) ? (twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))) : (twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))))));
        // line 81
        echo "      ";
        if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
            // line 82
            echo "        ";
            $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("network" => $this->getAttribute(            // line 83
(isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array())));
            // line 85
            echo "      ";
        }
        // line 86
        echo "      <li class=\"separation\">
        <a href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\"";
        if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "ce_soir")) {
            echo " class=\"selected\"";
        }
        echo "><strong>Soirée</strong></a>
      </li>
      ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["timeslots"]) ? $context["timeslots"] : $this->getContext($context, "timeslots")));
        foreach ($context['_seq'] as $context["_key"] => $context["t"]) {
            // line 90
            echo "
      ";
            // line 91
            $context["route_name"] = (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) ? ("programmes_timeslot_network") : ("programmes_timeslot"));
            // line 92
            echo "      ";
            $context["route_params"] = array("date" => (( !(null ===             // line 93
(isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) ? (twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format")))) : (twig_date_format_filter($this->env, (isset($context["now"]) ? $context["now"] : $this->getContext($context, "now")), (isset($context["date_format"]) ? $context["date_format"] : $this->getContext($context, "date_format"))))), "from_hour" => $this->getAttribute(            // line 94
$context["t"], 0, array(), "array"), "to_hour" => $this->getAttribute(            // line 95
$context["t"], 1, array(), "array"));
            // line 97
            echo "      ";
            if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
                // line 98
                echo "        ";
                $context["route_params"] = twig_array_merge((isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params")), array("network" => $this->getAttribute(                // line 99
(isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array())));
                // line 101
                echo "      ";
            }
            // line 102
            echo "
      <li>
        <a href=\"";
            // line 104
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
            echo "\"";
            if (( !(null === (isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot"))) && ($this->getAttribute($context["t"], 0, array(), "array") == $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array")))) {
                echo " class=\"selected\"";
            }
            echo ">
          ";
            // line 105
            $context["trans_params"] = array("%from_hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (("now " . $this->getAttribute(            // line 106
$context["t"], 0, array(), "array")) . ":00"), "none", "short")), "%to_hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, (("now " . $this->getAttribute(            // line 107
$context["t"], 1, array(), "array")) . ":00"), "none", "short")));
            // line 109
            echo "          ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("%from_hour% to %to_hour%", array_merge(array("%from_hour%" =>             // line 110
(isset($context["from_hour"]) ? $context["from_hour"] : null), "%to_hour%" => (isset($context["to_hour"]) ? $context["to_hour"] : null)),             // line 109
(isset($context["trans_params"]) ? $context["trans_params"] : $this->getContext($context, "trans_params"))), "messages");
            // line 112
            echo "        </a>
      </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 115
        echo "    </ul>
  </div>

</div>

";
        // line 121
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 122
            echo "<div id=\"programs-timeslot-network\" class=\"bar-dropdown separator\">

  <div class=\"default-value\">
   ";
            // line 125
            ob_start();
            // line 126
            echo "    ";
            if ((null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
                // line 127
                echo "      Play TV + TNT
    ";
            } else {
                // line 129
                echo "      ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "network", array()), "html", null, true);
                echo "
    ";
            }
            // line 131
            echo "    <span class=\"icon\"><i></i></span>
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 133
            echo "  </div>
  <div class=\"list-values\">
    <ul>
      <li>
        <a href=\"/programmes-tv/";
            // line 137
            if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "ce_soir")) {
                echo "ce-soir/";
            }
            if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) != (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")))) {
                if ( !(null === (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "d-m-Y"), "html", null, true);
                    echo "/";
                }
                if ( !(null === (isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")))) {
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array"), "html", null, true);
                    echo "h-";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array"), "html", null, true);
                    echo "h/";
                }
            } elseif (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "timeslot")) {
                echo "en-direct/";
            }
            echo "\"";
            if ((null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
                echo " class=\"selected\"";
            }
            echo ">Play TV + TNT</a>
      </li>
      ";
            // line 139
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["networks"]) ? $context["networks"] : $this->getContext($context, "networks")));
            foreach ($context['_seq'] as $context["_key"] => $context["network"]) {
                // line 140
                echo "      <li>
        <a href=\"/programmes-tv/";
                // line 141
                if (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "ce_soir")) {
                    echo "ce-soir/";
                }
                if (((isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")) != (isset($context["now_date"]) ? $context["now_date"] : $this->getContext($context, "now_date")))) {
                    if ( !(null === (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")))) {
                        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, (isset($context["selected_date"]) ? $context["selected_date"] : $this->getContext($context, "selected_date")), "d-m-Y"), "html", null, true);
                        echo "/";
                    }
                    if ( !(null === (isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")))) {
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 0, array(), "array"), "html", null, true);
                        echo "h-";
                        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["selected_timeslot"]) ? $context["selected_timeslot"] : $this->getContext($context, "selected_timeslot")), 1, array(), "array"), "html", null, true);
                        echo "h/";
                    }
                } elseif (((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "timeslot")) {
                    echo "en-direct/";
                }
                echo twig_escape_filter($this->env, $this->getAttribute($context["network"], "alias", array()), "html", null, true);
                echo "/\"";
                if (( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network"))) && ($this->getAttribute((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array()) == $this->getAttribute($context["network"], "alias", array())))) {
                    echo " class=\"selected\"";
                }
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["network"], "network", array()), "html", null, true);
                echo "</a>
      </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['network'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 144
            echo "    </ul>
  </div>

</div>
";
        }
        // line 149
        echo "
";
        // line 151
        echo "<div class=\"separator\" id=\"programs-timeslot-time-icon\">
  ";
        // line 152
        if ( !(null === (isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")))) {
            // line 153
            echo "    ";
            $context["route_name"] = "programmes_en_direct_with_params";
            // line 154
            echo "    ";
            $context["route_params"] = array("network" => $this->getAttribute((isset($context["selected_network"]) ? $context["selected_network"] : $this->getContext($context, "selected_network")), "alias", array()));
            // line 155
            echo "  ";
        } else {
            // line 156
            echo "    ";
            $context["route_name"] = "programmes_en_direct";
            // line 157
            echo "    ";
            $context["route_params"] = array();
            // line 158
            echo "  ";
        }
        // line 159
        echo "  <a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), (isset($context["route_params"]) ? $context["route_params"] : $this->getContext($context, "route_params"))), "html", null, true);
        echo "\" title=\"";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Live on TV", array(), "messages");
        echo "\"></a>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programmes-tv/_filters.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 159,  403 => 158,  400 => 157,  397 => 156,  394 => 155,  391 => 154,  388 => 153,  386 => 152,  383 => 151,  380 => 149,  373 => 144,  341 => 141,  338 => 140,  334 => 139,  309 => 137,  303 => 133,  299 => 131,  293 => 129,  289 => 127,  286 => 126,  284 => 125,  279 => 122,  277 => 121,  270 => 115,  262 => 112,  260 => 109,  259 => 110,  257 => 109,  255 => 107,  254 => 106,  253 => 105,  245 => 104,  241 => 102,  238 => 101,  236 => 99,  234 => 98,  231 => 97,  229 => 95,  228 => 94,  227 => 93,  225 => 92,  223 => 91,  220 => 90,  216 => 89,  207 => 87,  204 => 86,  201 => 85,  199 => 83,  197 => 82,  194 => 81,  192 => 79,  190 => 78,  188 => 77,  183 => 74,  179 => 72,  176 => 71,  174 => 68,  173 => 69,  171 => 68,  169 => 66,  168 => 65,  166 => 64,  163 => 63,  160 => 62,  157 => 61,  149 => 59,  146 => 58,  143 => 57,  140 => 56,  137 => 55,  135 => 54,  130 => 51,  123 => 45,  115 => 42,  109 => 40,  106 => 39,  103 => 38,  101 => 37,  93 => 36,  90 => 35,  87 => 34,  85 => 32,  83 => 31,  80 => 30,  77 => 29,  74 => 28,  71 => 27,  69 => 25,  68 => 24,  66 => 23,  63 => 22,  60 => 21,  58 => 19,  56 => 18,  52 => 17,  47 => 14,  43 => 12,  37 => 10,  31 => 8,  28 => 7,  26 => 6,  21 => 3,  19 => 2,);
    }
}
/* {# dates select #}*/
/* {% set date_format = is_website_fr ? 'd-m-Y' : 'Y-m-d' %}*/
/* <div id="programs-date-dropdown" class="bar-dropdown separator">*/
/* */
/*   <div class="default-value pmd-Text--truncate">*/
/*     {% spaceless %}*/
/*     {% if selected_date is not null %}*/
/*       {{ selected_date|localizeddate('full', 'none', locale)|capitalize }}*/
/*     {% else %}*/
/*       {{ "now"|localizeddate('full', 'none', locale)|capitalize }}*/
/*     {% endif %}*/
/*     <span class="icon"><i></i></span>*/
/*     {% endspaceless %}*/
/*   </div>*/
/*   <div class="list-values">*/
/*     <ul>*/
/*     {% for d in dates %}*/
/*       {% set route_params = {*/
/*         'date': d|date(date_format)*/
/*       } %}*/
/*       {% if selected_timeslot is not null %}*/
/*         {% set route_name = selected_network is not null ? 'programmes_timeslot_network' : 'programmes_timeslot' %}*/
/*         {% set route_params = route_params|merge({*/
/*           'from_hour': selected_timeslot[0],*/
/*           'to_hour': selected_timeslot[1]*/
/*         }) %}*/
/*       {% else %}*/
/*         {% set route_name = selected_network is not null ? 'programmes_prime_date_network' : 'programmes_prime_date' %}*/
/*       {% endif %}*/
/*       {% if selected_network is not null %}*/
/*         {% set route_params = route_params|merge({*/
/*           'network': selected_network.alias*/
/*         }) %}*/
/*       {% endif %}*/
/*       <li>*/
/*         <a href="{{ path(route_name, route_params) }}"{% if selected_date == d %} class="selected"{% endif %}>*/
/*           {% if now_date == d %}*/
/*             {% trans %}Today{% endtrans %}*/
/*           {% else %}*/
/*             {{ d|localizeddate('full', 'none', locale)|capitalize }}*/
/*           {% endif %}*/
/*         </a>*/
/*       </li>*/
/*     {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* */
/* </div>*/
/* */
/* {# timeslots select #}*/
/* <div id="programs-timeslot-dropdown" class="bar-dropdown separator">*/
/* */
/*   <div class="default-value">*/
/*     {% spaceless %}*/
/*     {% if selected_timeslot is null %}*/
/*       {% if action_name == 'ce_soir' %}*/
/*         {% trans %}Evening{% endtrans %}*/
/*       {% else %}*/
/*         {{ now_timeslot[0] }}h à {{ now_timeslot[1] }}h*/
/*       {% endif %}*/
/*     {% elseif selected_date == now_date and selected_timeslot[0] == now_timeslot[0] %}*/
/*       {% trans %}Live{% endtrans %}*/
/*     {% else %}*/
/*       {% set trans_params = {*/
/*         '%from_hour%': ('now ' ~ selected_timeslot[0] ~ ':00')|localizeddate('none', 'short'),*/
/*         '%to_hour%': ('now ' ~ selected_timeslot[1] ~ ':00')|localizeddate('none', 'short')*/
/*       } %}*/
/*       {% trans with trans_params %}*/
/*         %from_hour% to %to_hour%*/
/*       {% endtrans %}*/
/*     {% endif %}*/
/*     <span class="icon"><i></i></span>*/
/*     {% endspaceless %}*/
/*   </div>*/
/*   <div class="list-values">*/
/*     <ul>*/
/*       {% set route_name = selected_network is not null ? 'programmes_prime_date_network' : 'programmes_prime_date' %}*/
/*       {% set route_params = {*/
/*         'date': selected_date is not null ? selected_date|date(date_format) : now|date(date_format)*/
/*       } %}*/
/*       {% if selected_network is not null %}*/
/*         {% set route_params = route_params|merge({*/
/*           'network': selected_network.alias*/
/*         }) %}*/
/*       {% endif %}*/
/*       <li class="separation">*/
/*         <a href="{{ path(route_name, route_params) }}"{% if action_name == 'ce_soir' %} class="selected"{% endif %}><strong>Soirée</strong></a>*/
/*       </li>*/
/*       {% for t in timeslots %}*/
/* */
/*       {% set route_name = selected_network is not null ? 'programmes_timeslot_network' : 'programmes_timeslot' %}*/
/*       {% set route_params = {*/
/*         'date': selected_date is not null ? selected_date|date(date_format) : now|date(date_format),*/
/*         'from_hour': t[0],*/
/*         'to_hour': t[1]*/
/*       } %}*/
/*       {% if selected_network is not null %}*/
/*         {% set route_params = route_params|merge({*/
/*           'network': selected_network.alias*/
/*         }) %}*/
/*       {% endif %}*/
/* */
/*       <li>*/
/*         <a href="{{ path(route_name, route_params) }}"{% if selected_timeslot is not null and t[0] == selected_timeslot[0] %} class="selected"{% endif %}>*/
/*           {% set trans_params = {*/
/*             '%from_hour%': ('now ' ~ t[0] ~ ':00')|localizeddate('none', 'short'),*/
/*             '%to_hour%': ('now ' ~ t[1] ~ ':00')|localizeddate('none', 'short')*/
/*           } %}*/
/*           {% trans with trans_params %}*/
/*             %from_hour% to %to_hour%*/
/*           {% endtrans %}*/
/*         </a>*/
/*       </li>*/
/*       {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* */
/* </div>*/
/* */
/* {# networks select #}*/
/* {% if is_website_fr %}*/
/* <div id="programs-timeslot-network" class="bar-dropdown separator">*/
/* */
/*   <div class="default-value">*/
/*    {% spaceless %}*/
/*     {% if selected_network is null %}*/
/*       Play TV + TNT*/
/*     {% else %}*/
/*       {{ selected_network.network }}*/
/*     {% endif %}*/
/*     <span class="icon"><i></i></span>*/
/*     {% endspaceless %}*/
/*   </div>*/
/*   <div class="list-values">*/
/*     <ul>*/
/*       <li>*/
/*         <a href="/programmes-tv/{% if action_name == 'ce_soir' %}ce-soir/{% endif %}{% if selected_date != now_date %}{% if selected_date is not null %}{{ selected_date|date("d-m-Y") }}/{% endif %}{% if selected_timeslot is not null %}{{ selected_timeslot[0] }}h-{{ selected_timeslot[1] }}h/{% endif %}{% elseif action_name == 'timeslot' %}en-direct/{% endif %}"{% if selected_network is null %} class="selected"{% endif %}>Play TV + TNT</a>*/
/*       </li>*/
/*       {% for network in networks %}*/
/*       <li>*/
/*         <a href="/programmes-tv/{% if action_name == 'ce_soir' %}ce-soir/{% endif %}{% if selected_date != now_date %}{% if selected_date is not null %}{{ selected_date|date("d-m-Y") }}/{% endif %}{% if selected_timeslot is not null %}{{ selected_timeslot[0] }}h-{{ selected_timeslot[1] }}h/{% endif %}{% elseif action_name == 'timeslot' %}en-direct/{% endif %}{{ network.alias }}/"{% if selected_network is not null and selected_network.alias == network.alias %} class="selected"{% endif %}>{{ network.network }}</a>*/
/*       </li>*/
/*       {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* */
/* </div>*/
/* {% endif %}*/
/* */
/* {# live link #}*/
/* <div class="separator" id="programs-timeslot-time-icon">*/
/*   {% if selected_network is not null %}*/
/*     {% set route_name = 'programmes_en_direct_with_params' %}*/
/*     {% set route_params = {'network': selected_network.alias} %}*/
/*   {% else %}*/
/*     {% set route_name = 'programmes_en_direct' %}*/
/*     {% set route_params = {} %}*/
/*   {% endif %}*/
/*   <a href="{{ path(route_name, route_params) }}" title="{% trans %}Live on TV{% endtrans %}"></a>*/
/* </div>*/
/* */
