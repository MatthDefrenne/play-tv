<?php

/* controllers/index/_carrousel.twig */
class __TwigTemplate_b7cb52d24a39aa3d3604f51850df5f741c03d5a6a876219300dcd1f7553f0081 extends Twig_Template
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
        if ((isset($context["superfeatured_broadcasts"]) ? $context["superfeatured_broadcasts"] : $this->getContext($context, "superfeatured_broadcasts"))) {
            // line 2
            echo "<div class=\"pmd-HomepageCarrousel pmd-js-HomepageCarrousel\">
  ";
            // line 3
            ob_start();
            // line 4
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["superfeatured_broadcasts"]) ? $context["superfeatured_broadcasts"] : $this->getContext($context, "superfeatured_broadcasts")));
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
            foreach ($context['_seq'] as $context["_key"] => $context["featured_broadcast"]) {
                // line 5
                echo "      <div class=\"pmd-HomepageCarrouselSlide pmd-js-HomepageCarrousel-item\">

        <div class=\"pmd-HomepageCarrouselSlide-imageContainer\">
          <div class=\"pmd-HomepageCarrouselSlide-imageBeautifier\">
            ";
                // line 9
                if (($this->getAttribute($context["loop"], "index", array()) <= 1)) {
                    // line 10
                    echo "            <img
              src=\"";
                    // line 11
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "images", array()), "sf_image_large", array()), "html", null, true);
                    echo "\"
              ";
                    // line 13
                    echo "              ";
                    // line 14
                    echo "              class=\"pmd-HomepageCarrouselSlide-image\"
              alt=\"\">
            ";
                } else {
                    // line 17
                    echo "            <img
              src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
              data-flickity-lazyload=\"";
                    // line 19
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "images", array()), "sf_image_large", array()), "html", null, true);
                    echo "\"
              ";
                    // line 21
                    echo "              ";
                    // line 22
                    echo "              class=\"pmd-HomepageCarrouselSlide-image\"
              alt=\"\">
            ";
                }
                // line 25
                echo "          </div>
        </div>

        <div class=\"pmd-HomepageCarrouselSlide-textContainer\" title=\"";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                echo "\">
          <div class=\"pmd-HomepageCarrouselSlide-title\">
            <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "program_url", array()), "html", null, true);
                echo "\" class=\"pmd-Text--inherit\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "fulltitle", array()), "html", null, true);
                echo "</a>
          </div>
          <div class=\"pmd-HomepageCarrouselSlide-info\">

            ";
                // line 34
                if (($this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array(), "any", false, true), "stars", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "stars", array()) > 0))) {
                    // line 35
                    echo "            <div class=\"pmd-HomepageCarrouselSlideTrailerRating\">
              ";
                    // line 36
                    $this->loadTemplate("partials/rating.twig", "controllers/index/_carrousel.twig", 36)->display(array_merge($context, array("rate" => $this->getAttribute($this->getAttribute(                    // line 37
$context["featured_broadcast"], "program", array()), "stars", array()))));
                    // line 40
                    echo "            </div>
            ";
                }
                // line 42
                echo "
            ";
                // line 57
                echo "
          </div>
          <div class=\"pmd-HomepageCarrouselSlide-date\">
            ";
                // line 60
                if ($this->getAttribute($context["featured_broadcast"], "is_live", array())) {
                    // line 61
                    echo "              En ce moment sur ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "
            ";
                } else {
                    // line 63
                    echo "              ";
                    echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->env->getExtension('Playtv')->dateForHumans($this->getAttribute($context["featured_broadcast"], "start", array()), "shorten")), "html", null, true);
                    echo " à ";
                    echo twig_escape_filter($this->env, call_user_func_array($this->env->getFilter('localizeddate')->getCallable(), array($this->env, $this->getAttribute($context["featured_broadcast"], "start", array()), "none", "short")), "html", null, true);
                    echo " sur ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["featured_broadcast"], "channel", array()), "name", array()), "html", null, true);
                    echo "
            ";
                }
                // line 65
                echo "          </div>

          ";
                // line 67
                if ( !(null === $this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "trailer", array()))) {
                    // line 68
                    echo "          ";
                    $context["trailerLink"] = (("/trailer/" . $this->getAttribute($this->getAttribute($context["featured_broadcast"], "program", array()), "id", array())) . "/?autoplay=1&skin=minimal");
                    // line 69
                    echo "          <a href=\"";
                    echo twig_escape_filter($this->env, (isset($context["trailerLink"]) ? $context["trailerLink"] : $this->getContext($context, "trailerLink")), "html", null, true);
                    echo "\" rel=\"nofollow\" class=\"pmd-js-TrailerButton2 pmd-Button pmd-TrailerButton pmd-TrailerButton--carrousel\">
            <svg role=\"img\" class=\"pmd-Svg pmd-Svg--trailer\">
              <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#pmd-Svg--trailer\"></use>
            </svg>
            ";
                    // line 73
                    echo $this->env->getExtension('translator')->getTranslator()->trans("Trailer", array(), "messages");
                    // line 74
                    echo "          </a>
          ";
                }
                // line 76
                echo "
          ";
                // line 80
                echo "        </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['featured_broadcast'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 84
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/index/_carrousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 84,  164 => 80,  161 => 76,  157 => 74,  155 => 73,  147 => 69,  144 => 68,  142 => 67,  138 => 65,  128 => 63,  122 => 61,  120 => 60,  115 => 57,  112 => 42,  108 => 40,  106 => 37,  105 => 36,  102 => 35,  100 => 34,  91 => 30,  86 => 28,  81 => 25,  76 => 22,  74 => 21,  70 => 19,  66 => 17,  61 => 14,  59 => 13,  55 => 11,  52 => 10,  50 => 9,  44 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if superfeatured_broadcasts %}*/
/* <div class="pmd-HomepageCarrousel pmd-js-HomepageCarrousel">*/
/*   {% spaceless %}*/
/*     {% for featured_broadcast in superfeatured_broadcasts %}*/
/*       <div class="pmd-HomepageCarrouselSlide pmd-js-HomepageCarrousel-item">*/
/* */
/*         <div class="pmd-HomepageCarrouselSlide-imageContainer">*/
/*           <div class="pmd-HomepageCarrouselSlide-imageBeautifier">*/
/*             {% if loop.index <= 1 %}*/
/*             <img*/
/*               src="{{ featured_broadcast.program.images.sf_image_large }}"*/
/*               {# @debug #}*/
/*               {# src="{{ featured_broadcast.program.images.sf_image_large|default('https://cldup.com/tg9wTTenEc.jpg') }}" #}*/
/*               class="pmd-HomepageCarrouselSlide-image"*/
/*               alt="">*/
/*             {% else %}*/
/*             <img*/
/*               src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*               data-flickity-lazyload="{{ featured_broadcast.program.images.sf_image_large }}"*/
/*               {# @debug #}*/
/*               {# data-flickity-lazyload="{{ featured_broadcast.program.images.sf_image_large|default('https://cldup.com/tg9wTTenEc.jpg')}}" #}*/
/*               class="pmd-HomepageCarrouselSlide-image"*/
/*               alt="">*/
/*             {% endif %}*/
/*           </div>*/
/*         </div>*/
/* */
/*         <div class="pmd-HomepageCarrouselSlide-textContainer" title="{{ featured_broadcast.program.fulltitle }}">*/
/*           <div class="pmd-HomepageCarrouselSlide-title">*/
/*             <a href="{{ featured_broadcast.program.program_url }}" class="pmd-Text--inherit">{{ featured_broadcast.program.fulltitle }}</a>*/
/*           </div>*/
/*           <div class="pmd-HomepageCarrouselSlide-info">*/
/* */
/*             {% if featured_broadcast.program.stars is defined and featured_broadcast.program.stars > 0 %}*/
/*             <div class="pmd-HomepageCarrouselSlideTrailerRating">*/
/*               {% include 'partials/rating.twig' with {*/
/*                   rate: featured_broadcast.program.stars*/
/*                 }*/
/*               %}*/
/*             </div>*/
/*             {% endif %}*/
/* */
/*             {# {% if featured_broadcast.program.trailer is defined %}*/
/*             {% set trailerLink = '/trailer/' ~ featured_broadcast.program.id ~ '/?autoplay=1&skin=minimal' %}*/
/* */
/*             <div class="pmd-HomepageCarrouselSlideTrailer">*/
/*               <a href="{{ trailerLink }}" class="pmd-HomepageCarrouselSlideTrailer-link pmd-js-TrailerButton2" rel="nofollow">*/
/*                 <span class="pmd-HomepageCarrouselSlideTrailer-iconContainer">*/
/*                   <svg role="img" class="pmd-Svg pmd-Svg--play-standard pmd-HomepageCarrouselSlideTrailer-icon">*/
/*                     <use xlink:href="#pmd-Svg--play-standard"></use>*/
/*                   </svg>*/
/*                 </span>*/
/*                 <span class="pmd-HomepageCarrouselSlideTrailer-text">Voir la bande-annonce</span>*/
/*               </a>*/
/*             </div>*/
/*             {% endif %} #}*/
/* */
/*           </div>*/
/*           <div class="pmd-HomepageCarrouselSlide-date">*/
/*             {% if featured_broadcast.is_live %}*/
/*               En ce moment sur {{ featured_broadcast.channel.name }}*/
/*             {% else %}*/
/*               {{ date_for_humans(featured_broadcast.start, 'shorten')|capitalize }} à {{ featured_broadcast.start|localizeddate('none', 'short') }} sur {{ featured_broadcast.channel.name }}*/
/*             {% endif %}*/
/*           </div>*/
/* */
/*           {% if featured_broadcast.program.trailer is not null %}*/
/*           {% set trailerLink = '/trailer/' ~ featured_broadcast.program.id ~ '/?autoplay=1&skin=minimal' %}*/
/*           <a href="{{ trailerLink }}" rel="nofollow" class="pmd-js-TrailerButton2 pmd-Button pmd-TrailerButton pmd-TrailerButton--carrousel">*/
/*             <svg role="img" class="pmd-Svg pmd-Svg--trailer">*/
/*               <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#pmd-Svg--trailer"></use>*/
/*             </svg>*/
/*             {% trans %}Trailer{% endtrans %}*/
/*           </a>*/
/*           {% endif %}*/
/* */
/*           {# <a class="pmd-HomepageCarrouselSlide-more" href="{{ featured_broadcast.program.program_url }}" rel="nofollow">*/
/*             + d'informations*/
/*           </a> #}*/
/*         </div>*/
/*       </div>*/
/*     {% endfor %}*/
/* {% endspaceless %}*/
/* </div>*/
/* {% endif %}*/
/* */
