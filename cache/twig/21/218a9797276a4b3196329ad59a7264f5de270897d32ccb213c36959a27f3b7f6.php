<?php

/* controllers/widgets/block-live-program-by-channel_mobile.twig */
class __TwigTemplate_02e1ea11c9f7a7d8f587daa3a6f146b10c9d8a1e3ded9870b3b8afee0a5668c4 extends Twig_Template
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
        echo "<div class=\"pmd-LiveTvSummary\">

  ";
        // line 3
        if ((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program"))) {
            // line 4
            echo "  <h3 class=\"pmd-LiveTvSummary-heading\">
    ";
            // line 5
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "fulltitle", array()), "html", null, true);
            if ($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "year", array())) {
                echo " (";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "year", array()), "html", null, true);
                echo ")";
            }
            // line 6
            echo "  </h3>
  <p class=\"pmd-LiveTvSummary-sentence\">
    ";
            // line 8
            ob_start();
            // line 9
            echo "    ";
            echo twig_escape_filter($this->env, strip_tags($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "program", array()), "summary", array())), "html", null, true);
            echo "
    ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 11
            echo "  </p>
  ";
        } else {
            // line 13
            echo "  <p class=\"pmd-LiveTvSummary-sentence\">
    ";
            // line 14
            echo $this->env->getExtension('translator')->getTranslator()->trans("No summary for this program.", array(), "messages");
            // line 17
            echo "  </p>
  ";
        }
        // line 19
        echo "
</div>

";
        // line 22
        if ((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program"))) {
            // line 23
            echo "<div class=\"pmd-ProgrammeDetailsCasting\">

  <ul class=\"pmd-ProgrammeDetailsCasting-headingList\">
    ";
            // line 26
            if ($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : null), "casts", array(), "any", false, true), "according_to", array(), "any", true, true)) {
                // line 27
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "casts", array()), "according_to", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                    // line 28
                    echo "    <li class=\"pmd-ProgrammeDetailsCasting-headingListItem\">
      <p class=\"pmd-ProgrammeDetailsCasting-headingWord\">";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                    echo " :</p>
      <ul class=\"pmd-ProgrammeDetailsCasting-contentList\">
        ";
                    // line 31
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                        // line 32
                        echo "        <li class=\"pmd-ProgrammeDetailsCasting-contentListItem\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                        if ($this->getAttribute($context["cast"], "role", array())) {
                            echo " (";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                            echo ")";
                        }
                        echo "</li>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 34
                    echo "      </ul>
    </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 37
                echo "    ";
            }
            // line 38
            echo "
    ";
            // line 39
            if ($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : null), "casts", array(), "any", false, true), "casting", array(), "any", true, true)) {
                // line 40
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute((isset($context["live_program"]) ? $context["live_program"] : $this->getContext($context, "live_program")), "casts", array()), "casting", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["status"]) {
                    // line 41
                    echo "    <li class=\"pmd-ProgrammeDetailsCasting-headingListItem\">
      <p class=\"pmd-ProgrammeDetailsCasting-headingWord\">";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["status"], "status", array()), "html", null, true);
                    echo " :</p>
      <ul class=\"pmd-ProgrammeDetailsCasting-contentList\">
        ";
                    // line 44
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["status"], "casts", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["cast"]) {
                        // line 45
                        echo "        <li class=\"pmd-ProgrammeDetailsCasting-contentListItem\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "fullname", array()), "html", null, true);
                        if ($this->getAttribute($context["cast"], "role", array())) {
                            echo " (";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["cast"], "role", array()), "html", null, true);
                            echo ")";
                        }
                        echo "</li>
        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cast'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 47
                    echo "      </ul>
    </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['status'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "    ";
            }
            // line 51
            echo "  </ul>

</div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/widgets/block-live-program-by-channel_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 51,  160 => 50,  152 => 47,  138 => 45,  134 => 44,  129 => 42,  126 => 41,  121 => 40,  119 => 39,  116 => 38,  113 => 37,  105 => 34,  91 => 32,  87 => 31,  82 => 29,  79 => 28,  74 => 27,  72 => 26,  67 => 23,  65 => 22,  60 => 19,  56 => 17,  54 => 14,  51 => 13,  47 => 11,  41 => 9,  39 => 8,  35 => 6,  28 => 5,  25 => 4,  23 => 3,  19 => 1,);
    }
}
/* <div class="pmd-LiveTvSummary">*/
/* */
/*   {% if live_program %}*/
/*   <h3 class="pmd-LiveTvSummary-heading">*/
/*     {{ live_program.program.fulltitle }}{% if live_program.program.year %} ({{ live_program.program.year }}){% endif %}*/
/*   </h3>*/
/*   <p class="pmd-LiveTvSummary-sentence">*/
/*     {% spaceless %}*/
/*     {{ live_program.program.summary|striptags }}*/
/*     {% endspaceless %}*/
/*   </p>*/
/*   {% else %}*/
/*   <p class="pmd-LiveTvSummary-sentence">*/
/*     {% trans %}*/
/*     No summary for this program.*/
/*     {% endtrans %}*/
/*   </p>*/
/*   {% endif %}*/
/* */
/* </div>*/
/* */
/* {% if live_program %}*/
/* <div class="pmd-ProgrammeDetailsCasting">*/
/* */
/*   <ul class="pmd-ProgrammeDetailsCasting-headingList">*/
/*     {% if live_program.casts.according_to is defined %}*/
/*     {% for status in live_program.casts.according_to %}*/
/*     <li class="pmd-ProgrammeDetailsCasting-headingListItem">*/
/*       <p class="pmd-ProgrammeDetailsCasting-headingWord">{{ status.status }} :</p>*/
/*       <ul class="pmd-ProgrammeDetailsCasting-contentList">*/
/*         {% for cast in status.casts %}*/
/*         <li class="pmd-ProgrammeDetailsCasting-contentListItem">{{ cast.fullname }}{% if cast.role %} ({{ cast.role }}){% endif %}</li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </li>*/
/*     {% endfor %}*/
/*     {% endif %}*/
/* */
/*     {% if live_program.casts.casting is defined %}*/
/*     {% for status in live_program.casts.casting %}*/
/*     <li class="pmd-ProgrammeDetailsCasting-headingListItem">*/
/*       <p class="pmd-ProgrammeDetailsCasting-headingWord">{{ status.status }} :</p>*/
/*       <ul class="pmd-ProgrammeDetailsCasting-contentList">*/
/*         {% for cast in status.casts %}*/
/*         <li class="pmd-ProgrammeDetailsCasting-contentListItem">{{ cast.fullname }}{% if cast.role %} ({{ cast.role }}){% endif %}</li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </li>*/
/*     {% endfor %}*/
/*     {% endif %}*/
/*   </ul>*/
/* */
/* </div>*/
/* {% endif %}*/
/* */
