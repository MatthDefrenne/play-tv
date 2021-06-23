<?php

/* controllers/replay-tv/_javascript.twig */
class __TwigTemplate_89c32b960da3a3d9289d5e1089e26983a5279db3da87856289eb648addfaf6b8 extends Twig_Template
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
        echo "<script type=\"text/javascript\">
  (function(win, doc, app) {
    app.Data = app.Data || {};
    app.Data.ReplayTv = app.Data.ReplayTv || {
      channel: undefined,
      gender: undefined,
      date: undefined
    };
    ";
        // line 9
        $context["whitelist"] = array(0 => "id", 1 => "name", 2 => "alias", 3 => "has_programs", 4 => "images", 5 => "has_social_tv", 6 => "disabled", 7 => "skip_ads", 8 => "highlight", 9 => "streaming_source", 10 => "is_adult", 11 => "streaming_spec");
        // line 10
        echo "    ";
        if ((array_key_exists("channel", $context) && (isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")))) {
            // line 11
            echo "      app.Data.ReplayTv.channel = ";
            echo twig_jsonencode_filter($this->env->getExtension('Playtv')->channelsWhitelist((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), (isset($context["whitelist"]) ? $context["whitelist"] : $this->getContext($context, "whitelist")), false));
            echo ";
    ";
        }
        // line 13
        echo "
    ";
        // line 14
        if ((isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias"))) {
            // line 15
            echo "      app.Data.ReplayTv.gender = ";
            echo twig_jsonencode_filter((isset($context["gender_alias"]) ? $context["gender_alias"] : $this->getContext($context, "gender_alias")));
            echo ";
    ";
        }
        // line 17
        echo "
    ";
        // line 18
        if ((isset($context["date"]) ? $context["date"] : $this->getContext($context, "date"))) {
            // line 19
            echo "      app.Data.ReplayTv.date = ";
            echo twig_jsonencode_filter((isset($context["date"]) ? $context["date"] : $this->getContext($context, "date")));
            echo ";
    ";
        }
        // line 21
        echo "
  })(window, window.document, window.ptv || (window.ptv = {}));
</script>
";
    }

    public function getTemplateName()
    {
        return "controllers/replay-tv/_javascript.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 21,  56 => 19,  54 => 18,  51 => 17,  45 => 15,  43 => 14,  40 => 13,  34 => 11,  31 => 10,  29 => 9,  19 => 1,);
    }
}
/* <script type="text/javascript">*/
/*   (function(win, doc, app) {*/
/*     app.Data = app.Data || {};*/
/*     app.Data.ReplayTv = app.Data.ReplayTv || {*/
/*       channel: undefined,*/
/*       gender: undefined,*/
/*       date: undefined*/
/*     };*/
/*     {% set whitelist = ["id", "name", "alias", "has_programs", "images", "has_social_tv", "disabled", "skip_ads", "highlight", "streaming_source", "is_adult", "streaming_spec"] %}*/
/*     {% if channel is defined and channel %}*/
/*       app.Data.ReplayTv.channel = {{ channels_whitelist(channel, whitelist, false)|json_encode()|raw }};*/
/*     {% endif %}*/
/* */
/*     {% if gender_alias %}*/
/*       app.Data.ReplayTv.gender = {{ gender_alias|json_encode()|raw }};*/
/*     {% endif %}*/
/* */
/*     {% if date %}*/
/*       app.Data.ReplayTv.date = {{ date|json_encode()|raw }};*/
/*     {% endif %}*/
/* */
/*   })(window, window.document, window.ptv || (window.ptv = {}));*/
/* </script>*/
/* */
