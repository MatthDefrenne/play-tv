<?php

/* controllers/chaine-tv/en-direct.twig */
class __TwigTemplate_88d67619d3344c28059ff9974e71f1885557d21d3006858d3b6dce7ffc5fa4fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/chaine-tv/en-direct.twig", 1);
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
        $this->loadTemplate("controllers/chaine-tv/en-direct.twig", "controllers/chaine-tv/en-direct.twig", 5, "1898575212")->display(array_merge($context, array("tab_active" => "live")));
        // line 15
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/en-direct.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 15,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/chaine-tv/en-direct.twig */
class __TwigTemplate_88d67619d3344c28059ff9974e71f1885557d21d3006858d3b6dce7ffc5fa4fc_1898575212 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/chaine-tv/skeleton.twig", "controllers/chaine-tv/en-direct.twig", 5);
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
        echo "      <h2 class=\"block-title\">
        ";
        // line 9
        echo $this->env->getExtension('translator')->getTranslator()->trans("Now on <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
        // line 10
        echo "      </h2>
      ";
        // line 11
        echo (isset($context["block_broadcasts"]) ? $context["block_broadcasts"] : $this->getContext($context, "block_broadcasts"));
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/en-direct.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  90 => 10,  88 => 9,  85 => 8,  82 => 7,  65 => 5,  36 => 15,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/chaine-tv/skeleton.twig" with {"tab_active": "live"} %}*/
/* */
/*     {% block embed_content %}*/
/*       <h2 class="block-title">*/
/*         {% trans with {'%channel%': infos.name} %}Now on <strong>%channel%</strong>{% endtrans %}*/
/*       </h2>*/
/*       {{ block_broadcasts|raw }}*/
/*     {% endblock %}*/
/* */
/*   {% endembed %}*/
/* */
/* {% endblock %}*/
/* */
