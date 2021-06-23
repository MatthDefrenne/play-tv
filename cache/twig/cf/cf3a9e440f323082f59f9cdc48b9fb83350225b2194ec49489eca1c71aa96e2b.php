<?php

/* controllers/pages/browser-choice.twig */
class __TwigTemplate_ca84b925163bd25224ba5eb613b939e88b448926f33116da68bb68e5d073d867 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layouts/full.twig", "controllers/pages/browser-choice.twig", 1);
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
        echo "  <div id=\"content\" class=\"pmd-StaticPage\">
    <div class=\"container pmd-StaticPage-wrapper\">

      <div class=\"row\">
        <article class=\"span16 ptv-BrowserChoice\">
          <div class=\"page-title\">
            <h1 class=\"red\">
              Vous utilisez un navigateur <strong>dépassé</strong> et <strong>risqué</strong>, il est temps de changer.
            </h1>
            <p class=\"sub-title\">
              Nous vous invitons à mettre a jour votre navigateur pour profiter de toutes les fonctionnalités de Play TV.
            </p>
          </div>
          <div class=\"text justify\">
            <h2>
              Pourquoi est-il risqué de continuer à utiliser ce navigateur ?
            </h2>
            <p>
              Il semblerait que votre la version de votre navigateur soit sortie il y a plusieurs années. Depuis ce temps, de l'eau a coulé sous les ponts et le Web a changé, évolué, progressé. Les navigateurs ont suivi le pas ! Ils deviennent de plus en plus performants, sécurisés et proposent plus d'options agréables pour la navigation. Cependant, votre version de navigateur est dépassée et ne permet plus de bénéficier pleinement de notre site playtv.fr ainsi que de millions d'autres sites web.
            </p>
            <h2>Que faire ?</h2>
            <p>
              Vous voulez changer ? Bien, vous êtes sur la bonne voie. Pour cela, nous vous proposons un certain nombre de navigateurs gratuits qui répondront très bien à vos besoins. Ils sont rapides et vous permettent de naviguer en toute sécurité. La démarche est simple, il vous suffit de cliquer sur l'un d'entre eux, de le télécharger et de l'installer.
            </p>
            <ul class=\"choice\">
              ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["browsers"]) ? $context["browsers"] : $this->getContext($context, "browsers")));
        foreach ($context['_seq'] as $context["_key"] => $context["browser"]) {
            // line 30
            echo "                <a href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["browser"], "url", array()), "html", null, true);
            echo "\" target=\"_blank\">
                  <li>
                    <p>
                      <i class=\"ptv-Browser-";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["browser"], "key", array()), "html", null, true);
            echo "\"></i>
                      ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["browser"], "name", array()), "html", null, true);
            echo "
                    </p>
                  </li>
                </a>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['browser'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "            </ul>
          </div>
        </article>
      </div>
    </div>
  </div>
<!-- /#content -->
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/browser-choice.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 39,  73 => 34,  69 => 33,  62 => 30,  58 => 29,  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "layouts/full.twig" %}*/
/* */
/* {% block content %}*/
/*   <div id="content" class="pmd-StaticPage">*/
/*     <div class="container pmd-StaticPage-wrapper">*/
/* */
/*       <div class="row">*/
/*         <article class="span16 ptv-BrowserChoice">*/
/*           <div class="page-title">*/
/*             <h1 class="red">*/
/*               Vous utilisez un navigateur <strong>dépassé</strong> et <strong>risqué</strong>, il est temps de changer.*/
/*             </h1>*/
/*             <p class="sub-title">*/
/*               Nous vous invitons à mettre a jour votre navigateur pour profiter de toutes les fonctionnalités de Play TV.*/
/*             </p>*/
/*           </div>*/
/*           <div class="text justify">*/
/*             <h2>*/
/*               Pourquoi est-il risqué de continuer à utiliser ce navigateur ?*/
/*             </h2>*/
/*             <p>*/
/*               Il semblerait que votre la version de votre navigateur soit sortie il y a plusieurs années. Depuis ce temps, de l'eau a coulé sous les ponts et le Web a changé, évolué, progressé. Les navigateurs ont suivi le pas ! Ils deviennent de plus en plus performants, sécurisés et proposent plus d'options agréables pour la navigation. Cependant, votre version de navigateur est dépassée et ne permet plus de bénéficier pleinement de notre site playtv.fr ainsi que de millions d'autres sites web.*/
/*             </p>*/
/*             <h2>Que faire ?</h2>*/
/*             <p>*/
/*               Vous voulez changer ? Bien, vous êtes sur la bonne voie. Pour cela, nous vous proposons un certain nombre de navigateurs gratuits qui répondront très bien à vos besoins. Ils sont rapides et vous permettent de naviguer en toute sécurité. La démarche est simple, il vous suffit de cliquer sur l'un d'entre eux, de le télécharger et de l'installer.*/
/*             </p>*/
/*             <ul class="choice">*/
/*               {% for browser in browsers %}*/
/*                 <a href="{{ browser.url }}" target="_blank">*/
/*                   <li>*/
/*                     <p>*/
/*                       <i class="ptv-Browser-{{ browser.key }}"></i>*/
/*                       {{ browser.name }}*/
/*                     </p>*/
/*                   </li>*/
/*                 </a>*/
/*               {% endfor %}*/
/*             </ul>*/
/*           </div>*/
/*         </article>*/
/*       </div>*/
/*     </div>*/
/*   </div>*/
/* <!-- /#content -->*/
/* {% endblock %}*/
/* */
