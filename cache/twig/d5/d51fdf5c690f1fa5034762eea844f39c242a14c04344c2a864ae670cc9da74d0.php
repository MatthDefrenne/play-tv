<?php

/* controllers/programme-tv/index.twig */
class __TwigTemplate_5d9978fb997a79710819e01446f5a156100bf78b07a93c35f2464bf023244a93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/programme-tv/index.twig", 1);
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
        $this->loadTemplate("partials/subnav-guide-tv.twig", "controllers/programme-tv/index.twig", 4)->display($context);
        // line 5
        echo "
";
        // line 6
        if ( !(null === (isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")))) {
            // line 7
            echo "<div id=\"program-is-live\">
  <a href=\"
    ";
            // line 9
            if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "streamable", array())) {
                // line 10
                echo "      ";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "alias", array()))), "html", null, true);
                echo "
    ";
            } else {
                // line 12
                echo "      ";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "alias", array()))), "html", null, true);
                echo "
    ";
            }
            // line 14
            echo "  \">
    ";
            // line 15
            echo $this->env->getExtension('translator')->getTranslator()->trans("onair_channel_minutes_percent", array("%program%" => $this->getAttribute(            // line 16
(isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "%channel%" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 17
(isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "channel", array()), "name", array()), "%minutes%" => $this->env->getExtension('Playtv')->diffForHumans($this->getAttribute($this->getAttribute($this->getAttribute(            // line 18
(isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "elapsed", array()), "minutes", array())), "%percent%" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 19
(isset($context["is_live"]) ? $context["is_live"] : $this->getContext($context, "is_live")), "broadcast", array()), "elapsed", array()), "percent", array())), "program");
            // line 24
            echo "  </a>
</div>
";
        } elseif ((( !twig_test_empty(        // line 26
(isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts"))) && $this->getAttribute((isset($context["broadcasts"]) ? $context["broadcasts"] : null), 0, array(), "array", true, true)) && ($this->getAttribute($this->getAttribute((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")), 0, array(), "array"), "start_in", array()) <= 45))) {
            // line 27
            $context["next_broadcast"] = $this->getAttribute((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")), 0, array(), "array");
            // line 28
            echo "<div id=\"program-is-soon\">
  <a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute((isset($context["next_broadcast"]) ? $context["next_broadcast"] : $this->getContext($context, "next_broadcast")), "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute((isset($context["next_broadcast"]) ? $context["next_broadcast"] : $this->getContext($context, "next_broadcast")), "channel", array()), "alias", array()))), "html", null, true);
            echo "\">
  ";
            // line 30
            echo $this->env->getExtension('translator')->getTranslator()->transChoice("{0} « <strong>%program%</strong> » will be broadcast on <strong>%channel%</strong> in a few moments|[1,Inf] « <strong>%program%</strong> » will be broadcast on <strong>%channel%</strong> in %count% minutes", $this->getAttribute((isset($context["next_broadcast"]) ? $context["next_broadcast"] : $this->getContext($context, "next_broadcast")), "start_in", array()), array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "%channel%" => $this->getAttribute($this->getAttribute((isset($context["next_broadcast"]) ? $context["next_broadcast"] : $this->getContext($context, "next_broadcast")), "channel", array()), "name", array()), "%count%" => $this->getAttribute((isset($context["next_broadcast"]) ? $context["next_broadcast"] : $this->getContext($context, "next_broadcast")), "start_in", array())), "messages");
            // line 33
            echo "  </a>
</div>
";
        }
        // line 36
        echo "
<div id=\"content\">
  <div class=\"container\">

    <div class=\"row pmd-LiveProgram\">

      <div class=\"left-menu pmd-LiveProgram-left\">
        ";
        // line 43
        $this->loadTemplate("controllers/programme-tv/_details.twig", "controllers/programme-tv/index.twig", 43)->display(array_merge($context, array("output" => "complete")));
        // line 44
        echo "      </div>

      <div class=\"pmd-LiveProgram-center\">

        ";
        // line 48
        if ( !(null === (isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")))) {
            // line 49
            echo "          ";
            if (($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "previous_part", array(), "any", true, true) || $this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "next_part", array(), "any", true, true))) {
                // line 50
                echo "            <div id=\"program-parts\" class=\"clearfix\">
              ";
                // line 51
                if ($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "previous_part", array(), "any", true, true)) {
                    // line 52
                    echo "              <span class=\"previous\">&laquo;
                <a href=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "previous_part", array()), "program_url", array()), "html", null, true);
                    echo "\">
                ";
                    // line 54
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Part %part%", array("%part%" => $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "previous_part", array()), "bcast_abbr", array())), "messages");
                    // line 55
                    echo "                </a>
              </span>
              ";
                }
                // line 58
                echo "              ";
                if ($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "next_part", array(), "any", true, true)) {
                    // line 59
                    echo "              <span class=\"next\">
                <a href=\"";
                    // line 60
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "next_part", array()), "program_url", array()), "html", null, true);
                    echo "\">
                  ";
                    // line 61
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Part %part%", array("%part%" => $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "next_part", array()), "bcast_abbr", array())), "messages");
                    // line 62
                    echo "                </a> »
              </span>
              ";
                }
                // line 65
                echo "            </div>
          ";
            } elseif (($this->getAttribute(            // line 66
(isset($context["related_programs"]) ? $context["related_programs"] : null), "previous_episode", array(), "any", true, true) || $this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "next_episode", array(), "any", true, true))) {
                // line 67
                echo "            <div id=\"program-episodes\" class=\"clearfix\">
              ";
                // line 68
                if ($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "previous_episode", array(), "any", true, true)) {
                    // line 69
                    echo "              <span class=\"previous\">&laquo; <a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "previous_episode", array()), "program_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "previous_episode", array()), "bcast_abbr", array()), "html", null, true);
                    echo "</a></span>
              ";
                }
                // line 71
                echo "              ";
                if ($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : null), "next_episode", array(), "any", true, true)) {
                    // line 72
                    echo "              <span class=\"next\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "next_episode", array()), "program_url", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["related_programs"]) ? $context["related_programs"] : $this->getContext($context, "related_programs")), "next_episode", array()), "bcast_abbr", array()), "html", null, true);
                    echo "</a> »</span>
              ";
                }
                // line 74
                echo "            </div>
          ";
            }
            // line 76
            echo "        ";
        }
        // line 77
        echo "
        ";
        // line 78
        $this->loadTemplate("controllers/programme-tv/_title.twig", "controllers/programme-tv/index.twig", 78)->display(array_merge($context, array("program" => (isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")))));
        // line 79
        echo "
        <ul id=\"tabs\" class=\"tabs\">
          <li class=\"tab-selected\">
            <a href=\"#resume\" title=\"";
        // line 82
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "\" data-hash=\"resume\" data-event-tracker=\"PROGRAMMES-FICHE-resume\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Summary", array(), "messages");
        echo "</a>
          </li>
          <li>
            <a href=\"#casting\" title=\"Casting ";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "\" data-hash=\"casting\" data-event-tracker=\"PROGRAMMES-FICHE-casting\">";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Full cast", array(), "messages");
        echo "</a>
          </li>
          <li>
            <a href=\"#diffusions\" title=\"Diffusions ";
        // line 88
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
        echo "\" data-hash=\"diffusions\" data-event-tracker=\"PROGRAMMES-FICHE-diffusions\"><strong>";
        echo $this->env->getExtension('translator')->getTranslator()->trans("Broadcasts", array(), "messages");
        echo "</strong></a>
          </li>
          ";
        // line 90
        if ($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv")) {
            // line 91
            echo "          <li>
            <a href=\"#replay\" title=\"Revoir ";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
            echo "\" id=\"tab-replay\" data-hash=\"replay\" data-event-tracker=\"PROGRAMMES-FICHE-replay\"><strong>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("View in catch up", array(), "messages");
            echo "</strong></a>
          </li>
          ";
        }
        // line 95
        echo "        </ul><!-- tabs -->

        <div id=\"tab1\">

          <p class=\"text clear-grey\">
            ";
        // line 100
        echo $this->env->getExtension('translator')->getTranslator()->trans("Watch <strong>%program%</strong> live on the web", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
        // line 101
        echo "          </p>

          ";
        // line 103
        $this->loadTemplate("controllers/programme-tv/_resume.twig", "controllers/programme-tv/index.twig", 103)->display(array_merge($context, array("output" => "complete")));
        // line 104
        echo "
        </div><!-- tab 1 résumé -->

        <div id=\"tab2\">

          <p class=\"text clear-grey\">
            ";
        // line 110
        echo $this->env->getExtension('translator')->getTranslator()->trans("Cast team for <strong>%program%</strong>.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
        // line 111
        echo "          </p>

          ";
        // line 113
        if ($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "according_to", array(), "any", true, true)) {
            // line 114
            echo "          <ul class=\"program-casting\">
            ";
            // line 115
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "according_to", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                // line 116
                echo "            <li class=\"clearfix\">

                <p class=\"program-casting-status\">";
                // line 118
                echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                echo "</p>

                <ul class=\"program-casting-casts\">
                  ";
                // line 121
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                    // line 122
                    echo "                  <li>
                    <a href=\"";
                    // line 123
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "</a>
                    ";
                    // line 124
                    if ($this->getAttribute($context["cast"], "role", array())) {
                        echo "<span class=\"program-casting-role\">(";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                        echo ")</span>";
                    }
                    // line 125
                    echo "                    ";
                    if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                        echo "<span class=\"bullet\">&bull;</span>";
                    }
                    // line 126
                    echo "                  </li>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 128
                echo "                </ul>

            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 132
            echo "          </ul>
          ";
        }
        // line 134
        echo "
          ";
        // line 135
        if ($this->getAttribute((isset($context["casts"]) ? $context["casts"] : null), "casting", array(), "any", true, true)) {
            // line 136
            echo "          <ul class=\"program-casting\">
            ";
            // line 137
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["casts"]) ? $context["casts"] : $this->getContext($context, "casts")), "casting", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                // line 138
                echo "            <li class=\"clearfix\">

                <p class=\"program-casting-status\">";
                // line 140
                echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                echo "</p>

                <ul class=\"program-casting-casts\">
                  ";
                // line 143
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
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
                foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                    // line 144
                    echo "                  <li>
                    <a href=\"";
                    // line 145
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "url", array()), "html", null, true);
                    echo "\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                    echo "</a>
                    ";
                    // line 146
                    if ($this->getAttribute($context["cast"], "role", array())) {
                        echo "<span class=\"program-casting-role\">(";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                        echo ")</span>";
                    }
                    // line 147
                    echo "                    ";
                    if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                        echo "<span class=\"bullet\">&bull;</span>";
                    }
                    // line 148
                    echo "                  </li>
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 150
                echo "                </ul>

            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 154
            echo "          </ul>
          ";
        } else {
            // line 156
            echo "          <p class=\"text\">";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No cast for <strong>%program%</strong>.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            echo "</p>
          ";
        }
        // line 158
        echo "
        </div><!-- tab 2 casting -->

        <div id=\"tab3\">

          <p class=\"text clear-grey\">
            ";
        // line 164
        echo $this->env->getExtension('translator')->getTranslator()->trans("Broadcasts and Catch Up TV for <strong>%program%</strong>.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
        // line 165
        echo "          </p>

              ";
        // line 167
        if ( !twig_test_empty((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")))) {
            // line 168
            echo "              <div class=\"margin\">
              ";
            // line 169
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["broadcasts"]) ? $context["broadcasts"] : $this->getContext($context, "broadcasts")));
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
                // line 170
                echo "              ";
                if (($this->getAttribute($context["loop"], "index", array()) < 10)) {
                    // line 171
                    echo "
                ";
                    // line 172
                    if ($this->getAttribute($context["loop"], "first", array())) {
                        // line 173
                        echo "                <div class=\"program-broadcasts clearfix\">
                ";
                    }
                    // line 175
                    echo "
                  <div class=\"program-broadcast text\">
                    <a href=\"";
                    // line 177
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("chaine_tv", array("channel_id" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "alias", array()))), "html", null, true);
                    echo "\" class=\"channel-img channel-img-mini\" title=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "\">
                      <span>";
                    // line 178
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Watch <strong>%channel%</strong> live", array("%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array())), "messages");
                    echo "</span>
                      <img src=\"";
                    // line 179
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "images", array()), "mini", array()), "html", null, true);
                    echo "\" alt=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "\" width=\"36\" height=\"36\">
                    </a>
                    <p>
                      <small title=\"";
                    // line 182
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "full", "none", (isset($context["locale"]) ? $context["locale"] : $this->getContext($context, "locale"))))), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($this->getAttribute($context["broadcast"], "start", array()))), "html", null, true);
                    echo "</small>
                      <br>
                      ";
                    // line 184
                    echo $this->env->getExtension('translator')->getTranslator()->trans("On <strong>%channel%</strong> at <strong>%hour%</strong>", array("%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array()), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short"))), "messages");
                    // line 187
                    echo "                    </p>
                  </div>

                ";
                    // line 190
                    if ($this->getAttribute($context["loop"], "last", array())) {
                        // line 191
                        echo "                </div>
                ";
                    } elseif (($this->getAttribute(                    // line 192
$context["loop"], "index", array()) == 9)) {
                        // line 193
                        echo "                  <div class=\"program-broadcast text\">
                    <p class=\"xxbigger clear-grey more\">...</p>
                  </div>
                </div>
                ";
                    } elseif ((0 == $this->getAttribute(                    // line 197
$context["loop"], "index", array()) % 2)) {
                        // line 198
                        echo "                </div><div class=\"program-broadcasts clearfix\">
                ";
                    }
                    // line 200
                    echo "
              ";
                }
                // line 202
                echo "              ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 203
            echo "              </div>

              ";
        } else {
            // line 206
            echo "              <div class=\"margin text\">
                <p>
                  ";
            // line 208
            echo $this->env->getExtension('translator')->getTranslator()->trans("<strong class=\"red\">No replays</strong> for <strong>%program%</strong> in the next 7 days.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            // line 211
            echo "                </p>
              </div>
              ";
        }
        // line 214
        echo "
              <h2 class=\"block-title\">
                ";
        // line 216
        echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Previous broadcasts</strong> on TV", array(), "messages");
        // line 217
        echo "              </h2>
              ";
        // line 218
        if ( !twig_test_empty((isset($context["previous_broadcasts"]) ? $context["previous_broadcasts"] : $this->getContext($context, "previous_broadcasts")))) {
            // line 219
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["previous_broadcasts"]) ? $context["previous_broadcasts"] : $this->getContext($context, "previous_broadcasts")));
            foreach ($context['_seq'] as $context["year"] => $context["broadcasts"]) {
                // line 220
                echo "              <p class=\"text bigger clear-grey program-broadcasts-year-group\">
                ";
                // line 221
                echo $this->env->getExtension('translator')->getTranslator()->trans("Broadcasts in <strong>%year%</strong>", array("%year%" => $context["year"]), "messages");
                // line 222
                echo "              </p>

                ";
                // line 224
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["broadcasts"]);
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
                    // line 225
                    echo "                ";
                    if (($this->getAttribute($context["loop"], "index", array()) < 9)) {
                        // line 226
                        echo "
                  ";
                        // line 227
                        if ($this->getAttribute($context["loop"], "first", array())) {
                            // line 228
                            echo "                  <div class=\"program-broadcasts no-margin clearfix\">
                  ";
                        }
                        // line 230
                        echo "
                    ";
                        // line 231
                        if ( !twig_test_empty($this->getAttribute($context["broadcast"], "channel", array()))) {
                            // line 232
                            echo "                    <div class=\"program-broadcast grey-box xmargin text\">
                      <p>
                        ";
                            // line 234
                            echo $this->env->getExtension('translator')->getTranslator()->trans("On <strong>%channel%</strong>", array("%channel%" => $this->getAttribute($this->getAttribute($context["broadcast"], "channel", array()), "name", array())), "messages");
                            // line 237
                            echo "                        <br>
                        <small>
                          ";
                            // line 239
                            echo $this->env->getExtension('translator')->getTranslator()->trans("%date% at <strong>%hour%</strong>", array("%date%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "short", "none")), "%hour%" => call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short"))), "messages");
                            // line 242
                            echo "                        </small>
                      </p>
                    </div>
                    ";
                        }
                        // line 246
                        echo "
                  ";
                        // line 247
                        if ($this->getAttribute($context["loop"], "last", array())) {
                            // line 248
                            echo "                  </div>
                  ";
                        } elseif (($this->getAttribute(                        // line 249
$context["loop"], "index", array()) == 8)) {
                            // line 250
                            echo "                    <div class=\"program-broadcast grey-box xmargin text\">
                      <p title=\"";
                            // line 251
                            echo twig_escape_filter($this->env, (twig_length_filter($this->env, $context["broadcasts"]) - 9), "html", null, true);
                            echo " autres diffusions en {\$broadcasts@key} pour ";
                            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
                            echo "\" class=\"xxbigger center clear-grey more\">...</p>
                    </div>
                  </div>
                  ";
                        } elseif ((0 == $this->getAttribute(                        // line 254
$context["loop"], "index", array()) % 3)) {
                            // line 255
                            echo "                  </div>
                  <div class=\"program-broadcasts no-margin clearfix\">
                  ";
                        }
                        // line 258
                        echo "
                ";
                    }
                    // line 260
                    echo "                ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 261
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['year'], $context['broadcasts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 262
            echo "
              ";
        } else {
            // line 264
            echo "              <p class=\"text\">
                ";
            // line 265
            echo $this->env->getExtension('translator')->getTranslator()->trans("No broadcasts for <strong>%program%</strong> on TV in the last 30 days.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            // line 268
            echo "              </p>
              ";
        }
        // line 270
        echo "
        </div><!-- tab 3 diffusions -->

        ";
        // line 273
        if (($this->env->getExtension('playtv_feature')->hasFeature("catchup_tv") && ((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")) || (isset($context["group_videos"]) ? $context["group_videos"] : $this->getContext($context, "group_videos"))))) {
            // line 274
            echo "        <div id=\"tab4\">

          <div class=\"text clear-grey margin\">
            <p>
              ";
            // line 278
            echo $this->env->getExtension('translator')->getTranslator()->trans("Watch <strong>%program%</strong> in Catch Up TV for free.", array("%program%" => $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array())), "messages");
            // line 281
            echo "            </p>
          </div>

          ";
            // line 284
            if ((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos"))) {
                // line 285
                echo "          <div class=\"videos clearfix margin\">
            ";
                // line 286
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["videos"]) ? $context["videos"] : $this->getContext($context, "videos")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                    // line 287
                    echo "            ";
                    $this->loadTemplate("partials/item-replay-tv.twig", "controllers/programme-tv/index.twig", 287)->display(array_merge($context, array("video" => $context["video"])));
                    // line 288
                    echo "            ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 289
                echo "          </div>
          ";
            }
            // line 291
            echo "
          ";
            // line 292
            if ((isset($context["group_videos"]) ? $context["group_videos"] : $this->getContext($context, "group_videos"))) {
                // line 293
                echo "          <h2 class=\"block-title\">
            ";
                // line 294
                echo $this->env->getExtension('translator')->getTranslator()->trans("<strong>Other videos</strong> from %group%", array("%group%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array())), "messages");
                // line 297
                echo "          </h2>

          <div class=\"videos clearfix\">
            ";
                // line 300
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["group_videos"]) ? $context["group_videos"] : $this->getContext($context, "group_videos")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["video"]) {
                    // line 301
                    echo "            ";
                    $this->loadTemplate("partials/item-replay-tv.twig", "controllers/programme-tv/index.twig", 301)->display(array_merge($context, array("video" => $context["video"])));
                    // line 302
                    echo "            ";
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['video'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 303
                echo "          </div>
          ";
            }
            // line 305
            echo "
        </div><!-- tab4 replay-tv -->
        ";
        }
        // line 308
        echo "
      </div>

    <div class=\"pmd-LiveProgram-right\">

      ";
        // line 313
        if ((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group"))) {
            // line 314
            echo "      <div id=\"program-group\" class=\"clearfix margin grey-box\">
        ";
            // line 315
            if ( !(null === $this->getAttribute($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "images", array()), "small", array()))) {
                // line 316
                echo "        <a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "url", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array()), "html", null, true);
                echo "\" class=\"program-img program-img-small\">
          <img src=\"";
                // line 317
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "images", array()), "small", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array()), "html", null, true);
                echo "\" width=\"80\" height=\"60\" />
          <span class=\"cache\"></span>
        </a>
        ";
            }
            // line 321
            echo "        <h2>
          <a href=\"";
            // line 322
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "url", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "title", array()), "html", null, true);
            echo "</a>
        </h2>
        <p class=\"clear-grey\">
          <strong>";
            // line 325
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "type_title", array()), "html", null, true);
            echo "</strong>
        </p>
        <p class=\"clear-grey\">
          ";
            // line 328
            if ($this->getAttribute((isset($context["group"]) ? $context["group"] : null), "seasons", array(), "any", true, true)) {
                // line 329
                echo "            ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("%count_seasons% saisons, %count_episodes% episodes", array("%count_seasons%" => $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "seasons", array()), "%count_episodes%" => twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()))), "messages");
                // line 332
                echo "          ";
            } else {
                // line 333
                echo "            ";
                echo $this->env->getExtension('translator')->getTranslator()->trans("%count% programmes", array("%count%" => twig_length_filter($this->env, $this->getAttribute((isset($context["group"]) ? $context["group"] : $this->getContext($context, "group")), "programs", array()))), "messages");
                // line 336
                echo "          ";
            }
            // line 337
            echo "        </p>
      </div>
      ";
        }
        // line 340
        echo "
      <div class=\"margin\">
        ";
        // line 342
        $this->loadTemplate("partials/ads-banner.twig", "controllers/programme-tv/index.twig", 342)->display(array_merge($context, array("unique" => "aea23cf0", "zone_id" => 36)));
        // line 343
        echo "      </div>

    </div>

</div>

</div>

  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/programme-tv/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  909 => 343,  907 => 342,  903 => 340,  898 => 337,  895 => 336,  892 => 333,  889 => 332,  886 => 329,  884 => 328,  878 => 325,  870 => 322,  867 => 321,  858 => 317,  851 => 316,  849 => 315,  846 => 314,  844 => 313,  837 => 308,  832 => 305,  828 => 303,  814 => 302,  811 => 301,  794 => 300,  789 => 297,  787 => 294,  784 => 293,  782 => 292,  779 => 291,  775 => 289,  761 => 288,  758 => 287,  741 => 286,  738 => 285,  736 => 284,  731 => 281,  729 => 278,  723 => 274,  721 => 273,  716 => 270,  712 => 268,  710 => 265,  707 => 264,  703 => 262,  697 => 261,  683 => 260,  679 => 258,  674 => 255,  672 => 254,  664 => 251,  661 => 250,  659 => 249,  656 => 248,  654 => 247,  651 => 246,  645 => 242,  643 => 239,  639 => 237,  637 => 234,  633 => 232,  631 => 231,  628 => 230,  624 => 228,  622 => 227,  619 => 226,  616 => 225,  599 => 224,  595 => 222,  593 => 221,  590 => 220,  585 => 219,  583 => 218,  580 => 217,  578 => 216,  574 => 214,  569 => 211,  567 => 208,  563 => 206,  558 => 203,  544 => 202,  540 => 200,  536 => 198,  534 => 197,  528 => 193,  526 => 192,  523 => 191,  521 => 190,  516 => 187,  514 => 184,  507 => 182,  499 => 179,  495 => 178,  489 => 177,  485 => 175,  481 => 173,  479 => 172,  476 => 171,  473 => 170,  456 => 169,  453 => 168,  451 => 167,  447 => 165,  445 => 164,  437 => 158,  431 => 156,  427 => 154,  418 => 150,  403 => 148,  398 => 147,  392 => 146,  384 => 145,  381 => 144,  364 => 143,  358 => 140,  354 => 138,  350 => 137,  347 => 136,  345 => 135,  342 => 134,  338 => 132,  329 => 128,  314 => 126,  309 => 125,  303 => 124,  295 => 123,  292 => 122,  275 => 121,  269 => 118,  265 => 116,  261 => 115,  258 => 114,  256 => 113,  252 => 111,  250 => 110,  242 => 104,  240 => 103,  236 => 101,  234 => 100,  227 => 95,  219 => 92,  216 => 91,  214 => 90,  207 => 88,  199 => 85,  191 => 82,  186 => 79,  184 => 78,  181 => 77,  178 => 76,  174 => 74,  166 => 72,  163 => 71,  155 => 69,  153 => 68,  150 => 67,  148 => 66,  145 => 65,  140 => 62,  138 => 61,  134 => 60,  131 => 59,  128 => 58,  123 => 55,  121 => 54,  117 => 53,  114 => 52,  112 => 51,  109 => 50,  106 => 49,  104 => 48,  98 => 44,  96 => 43,  87 => 36,  82 => 33,  80 => 30,  76 => 29,  73 => 28,  71 => 27,  69 => 26,  65 => 24,  63 => 19,  62 => 18,  61 => 17,  60 => 16,  59 => 15,  56 => 14,  50 => 12,  44 => 10,  42 => 9,  38 => 7,  36 => 6,  33 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* {% include "partials/subnav-guide-tv.twig" %}*/
/* */
/* {% if is_live is not null %}*/
/* <div id="program-is-live">*/
/*   <a href="*/
/*     {% if is_live.broadcast.channel.streamable %}*/
/*       {{ path('television_channel_single', {'channel_id': is_live.broadcast.channel.id, 'channel_alias': is_live.broadcast.channel.alias}) }}*/
/*     {% else %}*/
/*       {{ path('chaine_tv', {'channel_id': is_live.broadcast.channel.id, 'channel_alias': is_live.broadcast.channel.alias}) }}*/
/*     {% endif %}*/
/*   ">*/
/*     {% trans with {*/
/*         '%program%': program.fulltitle,*/
/*         '%channel%': is_live.broadcast.channel.name,*/
/*         '%minutes%': is_live.broadcast.elapsed.minutes|diff_for_humans,*/
/*         '%percent%': is_live.broadcast.elapsed.percent*/
/*       } from "program"*/
/*       %}*/
/*       onair_channel_minutes_percent*/
/*     {% endtrans %}*/
/*   </a>*/
/* </div>*/
/* {% elseif broadcasts is not empty and broadcasts[0] is defined and broadcasts[0].start_in <= 45 %}*/
/* {% set next_broadcast = broadcasts[0] %}*/
/* <div id="program-is-soon">*/
/*   <a href="{{ path('chaine_tv', {'channel_id': next_broadcast.channel.id, 'channel_alias': next_broadcast.channel.alias}) }}">*/
/*   {% transchoice next_broadcast.start_in with {'%program%': program.fulltitle, '%channel%': next_broadcast.channel.name} %}*/
/*     {0} « <strong>%program%</strong> » will be broadcast on <strong>%channel%</strong> in a few moments|[1,Inf] « <strong>%program%</strong> » will be broadcast on <strong>%channel%</strong> in %count% minutes*/
/*   {% endtranschoice %}*/
/*   </a>*/
/* </div>*/
/* {% endif %}*/
/* */
/* <div id="content">*/
/*   <div class="container">*/
/* */
/*     <div class="row pmd-LiveProgram">*/
/* */
/*       <div class="left-menu pmd-LiveProgram-left">*/
/*         {% include "controllers/programme-tv/_details.twig" with {"output": "complete"} %}*/
/*       </div>*/
/* */
/*       <div class="pmd-LiveProgram-center">*/
/* */
/*         {% if related_programs is not null %}*/
/*           {% if related_programs.previous_part is defined or related_programs.next_part is defined %}*/
/*             <div id="program-parts" class="clearfix">*/
/*               {% if related_programs.previous_part is defined %}*/
/*               <span class="previous">&laquo;*/
/*                 <a href="{{ related_programs.previous_part.program_url }}">*/
/*                 {% trans with {'%part%': related_programs.previous_part.bcast_abbr} %}Part %part%{% endtrans %}*/
/*                 </a>*/
/*               </span>*/
/*               {% endif %}*/
/*               {% if related_programs.next_part is defined %}*/
/*               <span class="next">*/
/*                 <a href="{{ related_programs.next_part.program_url }}">*/
/*                   {% trans with {'%part%': related_programs.next_part.bcast_abbr} %}Part %part%{% endtrans %}*/
/*                 </a> »*/
/*               </span>*/
/*               {% endif %}*/
/*             </div>*/
/*           {% elseif related_programs.previous_episode is defined or related_programs.next_episode is defined %}*/
/*             <div id="program-episodes" class="clearfix">*/
/*               {% if related_programs.previous_episode is defined %}*/
/*               <span class="previous">&laquo; <a href="{{ related_programs.previous_episode.program_url }}">{{ related_programs.previous_episode.bcast_abbr }}</a></span>*/
/*               {% endif %}*/
/*               {% if related_programs.next_episode is defined %}*/
/*               <span class="next"><a href="{{ related_programs.next_episode.program_url }}">{{ related_programs.next_episode.bcast_abbr }}</a> »</span>*/
/*               {% endif %}*/
/*             </div>*/
/*           {% endif %}*/
/*         {% endif %}*/
/* */
/*         {% include "controllers/programme-tv/_title.twig" with {program: program} %}*/
/* */
/*         <ul id="tabs" class="tabs">*/
/*           <li class="tab-selected">*/
/*             <a href="#resume" title="{{ program.fulltitle }}" data-hash="resume" data-event-tracker="PROGRAMMES-FICHE-resume">{% trans %}Summary{% endtrans %}</a>*/
/*           </li>*/
/*           <li>*/
/*             <a href="#casting" title="Casting {{ program.fulltitle }}" data-hash="casting" data-event-tracker="PROGRAMMES-FICHE-casting">{% trans %}Full cast{% endtrans %}</a>*/
/*           </li>*/
/*           <li>*/
/*             <a href="#diffusions" title="Diffusions {{ program.fulltitle }}" data-hash="diffusions" data-event-tracker="PROGRAMMES-FICHE-diffusions"><strong>{% trans %}Broadcasts{% endtrans %}</strong></a>*/
/*           </li>*/
/*           {% if has_feature('catchup_tv') %}*/
/*           <li>*/
/*             <a href="#replay" title="Revoir {{ program.fulltitle }}" id="tab-replay" data-hash="replay" data-event-tracker="PROGRAMMES-FICHE-replay"><strong>{% trans %}View in catch up{% endtrans %}</strong></a>*/
/*           </li>*/
/*           {% endif %}*/
/*         </ul><!-- tabs -->*/
/* */
/*         <div id="tab1">*/
/* */
/*           <p class="text clear-grey">*/
/*             {% trans with {'%program%': program.fulltitle} %}Watch <strong>%program%</strong> live on the web{% endtrans %}*/
/*           </p>*/
/* */
/*           {% include "controllers/programme-tv/_resume.twig" with {"output": "complete"} %}*/
/* */
/*         </div><!-- tab 1 résumé -->*/
/* */
/*         <div id="tab2">*/
/* */
/*           <p class="text clear-grey">*/
/*             {% trans with {'%program%': program.fulltitle} %}Cast team for <strong>%program%</strong>.{% endtrans %}*/
/*           </p>*/
/* */
/*           {% if casts.according_to is defined %}*/
/*           <ul class="program-casting">*/
/*             {% for status in casts.according_to %}*/
/*             <li class="clearfix">*/
/* */
/*                 <p class="program-casting-status">{{ status.status }}</p>*/
/* */
/*                 <ul class="program-casting-casts">*/
/*                   {% for cast in status.casts %}*/
/*                   <li>*/
/*                     <a href="{{ cast.url }}" title="{{ cast.fullname }}">{{ cast.fullname }}</a>*/
/*                     {% if cast.role %}<span class="program-casting-role">({{ cast.role }})</span>{% endif %}*/
/*                     {% if loop.last == false %}<span class="bullet">&bull;</span>{% endif %}*/
/*                   </li>*/
/*                   {% endfor %}*/
/*                 </ul>*/
/* */
/*             </li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*           {% endif %}*/
/* */
/*           {% if casts.casting is defined %}*/
/*           <ul class="program-casting">*/
/*             {% for status in casts.casting %}*/
/*             <li class="clearfix">*/
/* */
/*                 <p class="program-casting-status">{{ status.status }}</p>*/
/* */
/*                 <ul class="program-casting-casts">*/
/*                   {% for cast in status.casts %}*/
/*                   <li>*/
/*                     <a href="{{ cast.url }}" title="{{ cast.fullname }}">{{ cast.fullname }}</a>*/
/*                     {% if cast.role %}<span class="program-casting-role">({{ cast.role }})</span>{% endif %}*/
/*                     {% if loop.last == false %}<span class="bullet">&bull;</span>{% endif %}*/
/*                   </li>*/
/*                   {% endfor %}*/
/*                 </ul>*/
/* */
/*             </li>*/
/*             {% endfor %}*/
/*           </ul>*/
/*           {% else %}*/
/*           <p class="text">{% trans with {'%program%': program.fulltitle} %}No cast for <strong>%program%</strong>.{% endtrans %}</p>*/
/*           {% endif %}*/
/* */
/*         </div><!-- tab 2 casting -->*/
/* */
/*         <div id="tab3">*/
/* */
/*           <p class="text clear-grey">*/
/*             {% trans with {'%program%': program.fulltitle} %}Broadcasts and Catch Up TV for <strong>%program%</strong>.{% endtrans %}*/
/*           </p>*/
/* */
/*               {% if broadcasts is not empty %}*/
/*               <div class="margin">*/
/*               {% for broadcast in broadcasts %}*/
/*               {% if loop.index < 10 %}*/
/* */
/*                 {% if loop.first %}*/
/*                 <div class="program-broadcasts clearfix">*/
/*                 {% endif %}*/
/* */
/*                   <div class="program-broadcast text">*/
/*                     <a href="{{ path('chaine_tv', {'channel_id': broadcast.channel.id, 'channel_alias': broadcast.channel.alias}) }}" class="channel-img channel-img-mini" title="{{ broadcast.channel.name }}">*/
/*                       <span>{% trans with {'%channel%': broadcast.channel.name} %}Watch <strong>%channel%</strong> live{% endtrans %}</span>*/
/*                       <img src="{{ broadcast.channel.images.mini }}" alt="{{ broadcast.channel.name }}" width="36" height="36">*/
/*                     </a>*/
/*                     <p>*/
/*                       <small title="{{ broadcast.start|localizeddate('full', 'none', locale)|capitalize }}">{{ date_for_humans(broadcast.start)|capitalize }}</small>*/
/*                       <br>*/
/*                       {% trans with {'%channel%': broadcast.channel.name, '%hour%': broadcast.start|localizeddate('none', 'short')} %}*/
/*                       On <strong>%channel%</strong> at <strong>%hour%</strong>*/
/*                       {% endtrans %}*/
/*                     </p>*/
/*                   </div>*/
/* */
/*                 {% if loop.last %}*/
/*                 </div>*/
/*                 {% elseif loop.index == 9 %}*/
/*                   <div class="program-broadcast text">*/
/*                     <p class="xxbigger clear-grey more">...</p>*/
/*                   </div>*/
/*                 </div>*/
/*                 {% elseif loop.index is divisible by (2) %}*/
/*                 </div><div class="program-broadcasts clearfix">*/
/*                 {% endif %}*/
/* */
/*               {% endif %}*/
/*               {% endfor %}*/
/*               </div>*/
/* */
/*               {% else %}*/
/*               <div class="margin text">*/
/*                 <p>*/
/*                   {% trans with {'%program%': program.fulltitle} %}*/
/*                   <strong class="red">No replays</strong> for <strong>%program%</strong> in the next 7 days.*/
/*                   {% endtrans %}*/
/*                 </p>*/
/*               </div>*/
/*               {% endif %}*/
/* */
/*               <h2 class="block-title">*/
/*                 {% trans %}<strong>Previous broadcasts</strong> on TV{% endtrans %}*/
/*               </h2>*/
/*               {% if previous_broadcasts is not empty %}*/
/*               {% for year, broadcasts in previous_broadcasts %}*/
/*               <p class="text bigger clear-grey program-broadcasts-year-group">*/
/*                 {% trans with {'%year%': year} %}Broadcasts in <strong>%year%</strong>{% endtrans %}*/
/*               </p>*/
/* */
/*                 {% for broadcast in broadcasts %}*/
/*                 {% if loop.index < 9 %}*/
/* */
/*                   {% if loop.first %}*/
/*                   <div class="program-broadcasts no-margin clearfix">*/
/*                   {% endif %}*/
/* */
/*                     {% if broadcast.channel is not empty %}*/
/*                     <div class="program-broadcast grey-box xmargin text">*/
/*                       <p>*/
/*                         {% trans with {'%channel%': broadcast.channel.name} %}*/
/*                         On <strong>%channel%</strong>*/
/*                         {% endtrans %}*/
/*                         <br>*/
/*                         <small>*/
/*                           {% trans with {'%date%': broadcast.start|localizeddate('short', 'none'), '%hour%': broadcast.start|localizeddate('none', 'short')} %}*/
/*                           %date% at <strong>%hour%</strong>*/
/*                           {% endtrans %}*/
/*                         </small>*/
/*                       </p>*/
/*                     </div>*/
/*                     {% endif %}*/
/* */
/*                   {% if loop.last %}*/
/*                   </div>*/
/*                   {% elseif loop.index == 8 %}*/
/*                     <div class="program-broadcast grey-box xmargin text">*/
/*                       <p title="{{ broadcasts|length-9 }} autres diffusions en {$broadcasts@key} pour {{ program.fulltitle }}" class="xxbigger center clear-grey more">...</p>*/
/*                     </div>*/
/*                   </div>*/
/*                   {% elseif loop.index is divisible by (3) %}*/
/*                   </div>*/
/*                   <div class="program-broadcasts no-margin clearfix">*/
/*                   {% endif %}*/
/* */
/*                 {% endif %}*/
/*                 {% endfor %}*/
/*               {% endfor %}*/
/* */
/*               {% else %}*/
/*               <p class="text">*/
/*                 {% trans with {'%program%': program.fulltitle} %}*/
/*                 No broadcasts for <strong>%program%</strong> on TV in the last 30 days.*/
/*                 {% endtrans %}*/
/*               </p>*/
/*               {% endif %}*/
/* */
/*         </div><!-- tab 3 diffusions -->*/
/* */
/*         {% if has_feature('catchup_tv') and (videos or group_videos) %}*/
/*         <div id="tab4">*/
/* */
/*           <div class="text clear-grey margin">*/
/*             <p>*/
/*               {% trans with {'%program%': program.fulltitle} %}*/
/*                 Watch <strong>%program%</strong> in Catch Up TV for free.*/
/*               {% endtrans %}*/
/*             </p>*/
/*           </div>*/
/* */
/*           {% if videos %}*/
/*           <div class="videos clearfix margin">*/
/*             {% for video in videos %}*/
/*             {% include "partials/item-replay-tv.twig" with {"video": video} %}*/
/*             {% endfor %}*/
/*           </div>*/
/*           {% endif %}*/
/* */
/*           {% if group_videos %}*/
/*           <h2 class="block-title">*/
/*             {% trans with {'%group%': group.title} %}*/
/*               <strong>Other videos</strong> from %group%*/
/*             {% endtrans %}*/
/*           </h2>*/
/* */
/*           <div class="videos clearfix">*/
/*             {% for video in group_videos %}*/
/*             {% include "partials/item-replay-tv.twig" with {"video": video} %}*/
/*             {% endfor %}*/
/*           </div>*/
/*           {% endif %}*/
/* */
/*         </div><!-- tab4 replay-tv -->*/
/*         {% endif %}*/
/* */
/*       </div>*/
/* */
/*     <div class="pmd-LiveProgram-right">*/
/* */
/*       {% if group %}*/
/*       <div id="program-group" class="clearfix margin grey-box">*/
/*         {% if group.images.small is not null %}*/
/*         <a href="{{ group.url }}" title="{{ group.title }}" class="program-img program-img-small">*/
/*           <img src="{{ group.images.small }}" alt="{{ group.title }}" width="80" height="60" />*/
/*           <span class="cache"></span>*/
/*         </a>*/
/*         {% endif %}*/
/*         <h2>*/
/*           <a href="{{ group.url }}">{{ group.title }}</a>*/
/*         </h2>*/
/*         <p class="clear-grey">*/
/*           <strong>{{ group.type_title }}</strong>*/
/*         </p>*/
/*         <p class="clear-grey">*/
/*           {% if group.seasons is defined %}*/
/*             {% trans with {'%count_seasons%': group.seasons, '%count_episodes%': group.programs|length} %}*/
/*               %count_seasons% saisons, %count_episodes% episodes*/
/*             {% endtrans %}*/
/*           {% else %}*/
/*             {% trans with {'%count%': group.programs|length} %}*/
/*               %count% programmes*/
/*             {% endtrans %}*/
/*           {% endif %}*/
/*         </p>*/
/*       </div>*/
/*       {% endif %}*/
/* */
/*       <div class="margin">*/
/*         {% include "partials/ads-banner.twig" with {'unique': "aea23cf0", "zone_id": 36} %}*/
/*       </div>*/
/* */
/*     </div>*/
/* */
/* </div>*/
/* */
/* </div>*/
/* */
/*   </div>*/
/* </div>*/
/* {% endblock %}*/
/* */
