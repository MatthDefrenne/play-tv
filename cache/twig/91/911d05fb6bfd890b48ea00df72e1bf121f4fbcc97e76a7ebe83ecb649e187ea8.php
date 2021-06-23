<?php

/* controllers/chaine-tv/a-suivre.twig */
class __TwigTemplate_ff406df07aaeec5d5622d85337d8558fe88c28ad45aee182c198f362a966cea7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/chaine-tv/a-suivre.twig", 1);
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
        $this->loadTemplate("controllers/chaine-tv/a-suivre.twig", "controllers/chaine-tv/a-suivre.twig", 5, "1234034457")->display(array_merge($context, array("tab_active" => "next")));
        // line 14
        echo "\$

";
    }

    public function getTemplateName()
    {
        return "controllers/chaine-tv/a-suivre.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 14,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}


/* controllers/chaine-tv/a-suivre.twig */
class __TwigTemplate_ff406df07aaeec5d5622d85337d8558fe88c28ad45aee182c198f362a966cea7_1234034457 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 5
        $this->parent = $this->loadTemplate("controllers/chaine-tv/skeleton.twig", "controllers/chaine-tv/a-suivre.twig", 5);
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
        echo $this->env->getExtension('translator')->getTranslator()->trans("Next programs on <strong>%channel%</strong>", array("%channel%" => $this->getAttribute((isset($context["infos"]) ? $context["infos"] : $this->getContext($context, "infos")), "name", array())), "messages");
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
        return "controllers/chaine-tv/a-suivre.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 11,  91 => 10,  89 => 9,  86 => 8,  83 => 7,  66 => 5,  36 => 14,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/* */
/*   {% embed "controllers/chaine-tv/skeleton.twig" with {"tab_active": "next"} %}*/
/* */
/*     {% block embed_content %}*/
/*       <h2 class="block-title">*/
/*         {% trans with {'%channel%': infos.name} %}Next programs on <strong>%channel%</strong>{% endtrans %}*/
/*       </h2>*/
/*       {{ block_broadcasts|raw }}*/
/*     {% endblock %}*/
/* */
/*   {% endembed %}$*/
/* */
/* {% endblock %}*/
/* */
