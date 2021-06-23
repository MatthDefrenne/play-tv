<?php

/* controllers/widgets/block-next-programs-by-channel_mobile.twig */
class __TwigTemplate_467a791bc3147f14665a788a70e0871fd0c19afbc75eb510dd781018912b743a extends Twig_Template
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
        echo "<div class=\"pmd-LiveTvNextProgrammes\">

  <div class=\"pmd-Heading pmd-Heading--light\">
    <div class=\"pmd-Heading-words\">
      ";
        // line 5
        if (array_key_exists("channel", $context)) {
            // line 6
            echo "        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("What's next on %channel%", array("%channel%" => $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array())), "messages");
            // line 7
            echo "      ";
        } else {
            // line 8
            echo "        ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("What's next", array(), "messages");
            // line 9
            echo "      ";
        }
        // line 10
        echo "    </div>
  </div>

  <div class=\"pmd-js-LiveTvContent-nextProgramme\">
    <ul class=\"pmd-NextProgramme-list\">
      ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["next_programs"]) ? $context["next_programs"] : $this->getContext($context, "next_programs")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["broadcast"]) {
            // line 16
            echo "      <li class=\"pmd-NextProgramme-listItem\">
        <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "program_url", array()), "html", null, true);
            echo "\" class=\"pmd-NextProgramme-link\">
          <span class=\"pmd-NextProgramme-time\">";
            // line 18
            echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["broadcast"], "start", array()), "none", "short")), "html", null, true);
            echo "</span>
          <span class=\"pmd-NextProgramme-genre pmd-ProgrammeGenre pmd-ProgrammeGenre--right pmd-ProgrammeGenre--";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender_id", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "gender", array()), "html", null, true);
            echo "</span>
          <span class=\"pmd-NextProgramme-heading pmd-Text--truncate\">";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
            echo "</span>
        </a>
      </li>
      ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 24
            echo "      <li class=\"pmd-NextProgramme-listItem pmd-NextProgramme-listItem--empty\">
      ";
            // line 25
            echo $this->env->getExtension('translator')->getTranslator()->trans("No information", array(), "messages");
            // line 26
            echo "      </li>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "    </ul>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/block-next-programs-by-channel_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 28,  82 => 26,  80 => 25,  77 => 24,  68 => 20,  62 => 19,  58 => 18,  54 => 17,  51 => 16,  46 => 15,  39 => 10,  36 => 9,  33 => 8,  30 => 7,  27 => 6,  25 => 5,  19 => 1,);
    }
}
/* <div class="pmd-LiveTvNextProgrammes">*/
/* */
/*   <div class="pmd-Heading pmd-Heading--light">*/
/*     <div class="pmd-Heading-words">*/
/*       {% if channel is defined %}*/
/*         {% trans with {'%channel%': channel.name} %}What's next on %channel%{% endtrans %}*/
/*       {% else %}*/
/*         {% trans %}What's next{% endtrans %}*/
/*       {% endif %}*/
/*     </div>*/
/*   </div>*/
/* */
/*   <div class="pmd-js-LiveTvContent-nextProgramme">*/
/*     <ul class="pmd-NextProgramme-list">*/
/*       {% for broadcast in next_programs %}*/
/*       <li class="pmd-NextProgramme-listItem">*/
/*         <a href="{{ broadcast.program.program_url }}" class="pmd-NextProgramme-link">*/
/*           <span class="pmd-NextProgramme-time">{{ broadcast.start|localizeddate('none', 'short') }}</span>*/
/*           <span class="pmd-NextProgramme-genre pmd-ProgrammeGenre pmd-ProgrammeGenre--right pmd-ProgrammeGenre--{{ broadcast.program.gender_id }}">{{ broadcast.program.gender }}</span>*/
/*           <span class="pmd-NextProgramme-heading pmd-Text--truncate">{{ broadcast.program.fulltitle }}</span>*/
/*         </a>*/
/*       </li>*/
/*       {% else %}*/
/*       <li class="pmd-NextProgramme-listItem pmd-NextProgramme-listItem--empty">*/
/*       {% trans %}No information{% endtrans %}*/
/*       </li>*/
/*       {% endfor %}*/
/*     </ul>*/
/*   </div>*/
/* */
/* </div>*/
/* */
