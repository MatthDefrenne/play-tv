<?php

/* controllers/chaine-tv/index.twig */
class __TwigTemplate_4b308e23afa4fb28e1c35928a64fffbfb3d641fa8e91280f5a0d08b9856b0023 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/chaine-tv/index.twig", 1);
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
        $this->loadTemplate("controllers/chaine-tv/index.twig", "controllers/chaine-tv/index.twig", 5, "1875443568")->display(array_merge($context, array("tab_active" => "resume")));
        // line 39
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 39,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/chaine-tv/index.twig */
class __TwigTemplate_4b308e23afa4fb28e1c35928a64fffbfb3d641fa8e91280f5a0d08b9856b0023_1875443568 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/chaine-tv/skeleton.twig", "controllers/chaine-tv/index.twig", 5);
        $this->blocks = array(
            'embed_content' => array($this, 'block_embed_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "controllers/chaine-tv/skeleton.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_embed_content($context, array $blocks = array())
    {
        // line 8
        echo "    <h2 class=\"block-title\">
      ";
        // line 9
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "is_radio", array())) {
            // line 10
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Description of <strong>%channel%</strong> radio", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
            // line 11
            echo "      ";
        } else {
            // line 12
            echo "      ";
            echo $this->env->getExtension('translator')->getTranslator()->trans("Description of <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
            // line 13
            echo "      ";
        }
        // line 14
        echo "    </h2>
    <div class=\"text program-summary bigger padding\">
    ";
        // line 16
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description", array())) {
            // line 17
            echo "      ";
            echo $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "description", array());
            echo "
    ";
        } else {
            // line 19
            echo "      <p>";
            echo $this->env->getExtension('translator')->getTranslator()->trans("No description for <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
            echo " <span class=\"clear-grey\">—</span></p>
    ";
        }
        // line 21
        echo "    </div>

    ";
        // line 23
        if ((isset($context["is_website_fr"]) ? $context["is_website_fr"] : $this->getContext($context, "is_website_fr"))) {
            // line 24
            echo "    <div id=\"taboola-description-chaine-desktop\" class=\"pmd-js-AdsTaboola pmd-AdsTaboola\"></div>
    ";
        }
        // line 26
        echo "
    ";
        // line 27
        if ($this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "previous_name", array())) {
            // line 28
            echo "    <h2 class=\"block-title\">
      ";
            // line 29
            echo $this->env->getExtension('translator')->getTranslator()->trans("Former names of <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
            // line 30
            echo "    </h2>
    <div class=\"text\">
      ";
            // line 32
            echo $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "previous_name", array());
            echo "
    </div>
    ";
        }
        // line 35
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 35,  144 => 32,  140 => 30,  138 => 29,  135 => 28,  133 => 27,  130 => 26,  126 => 24,  124 => 23,  120 => 21,  114 => 19,  108 => 17,  106 => 16,  102 => 14,  99 => 13,  96 => 12,  93 => 11,  90 => 10,  88 => 9,  85 => 8,  82 => 7,  65 => 5,  36 => 39,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/chaine-tv/skeleton.twig" with {"tab_active": "resume"} %}*/
/* */
/*     {% block embed_content %}*/
/*     <h2 class="block-title">*/
/*       {% if infos.is_radio %}*/
/*       {% trans with {'%channel%': infos.name} %}Description of <strong>%channel%</strong> radio{% endtrans %}*/
/*       {% else %}*/
/*       {% trans with {'%channel%': infos.name} %}Description of <strong>%channel%</strong>{% endtrans %}*/
/*       {% endif %}*/
/*     </h2>*/
/*     <div class="text program-summary bigger padding">*/
/*     {% if infos.description %}*/
/*       {{ infos.description|raw }}*/
/*     {% else %}*/
/*       <p>{% trans with {'%channel%': infos.name} %}No description for <strong>%channel%</strong>{% endtrans %} <span class="clear-grey">—</span></p>*/
/*     {% endif %}*/
/*     </div>*/
/* */
/*     {% if is_website_fr %}*/
/*     <div id="taboola-description-chaine-desktop" class="pmd-js-AdsTaboola pmd-AdsTaboola"></div>*/
/*     {% endif %}*/
/* */
/*     {%if infos.previous_name %}*/
/*     <h2 class="block-title">*/
/*       {% trans with {'%channel%': infos.name} %}Former names of <strong>%channel%</strong>{% endtrans %}*/
/*     </h2>*/
/*     <div class="text">*/
/*       {{ infos.previous_name|raw }}*/
/*     </div>*/
/*     {% endif %}*/
/* */
/*     {% endblock %}*/
/* */
/*   {% endembed %}*/
/* */
/* {% endblock %}*/
/* */
