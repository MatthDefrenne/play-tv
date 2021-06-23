<?php

/* controllers/widgets/television-content.twig */
class __TwigTemplate_2678d0f39e998ae3729517332e993a366ff91a3feedca6852ffc87a405103960 extends Twig_Template
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
        echo "<div class=\"pmd-TvPageMainContent\">

  <h2 class=\"pmd-TvPageMainContent-title\">
  ";
        // line 4
        echo $this->env->getExtension('translator')->getTranslator()->trans("Now", array(), "messages");
        // line 5
        echo "  </h2>

  <div class=\"pmd-TvPageMainContentThumbnails\">
    ";
        // line 8
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
            // line 9
            echo "    <div class=\"pmd-TvPageMainContentThumbnailsItem\">
    ";
            // line 10
            $context["preview_link"] = $this->env->getExtension('routing')->getPath("television_channel_single", array("channel_id" => $this->getAttribute($this->getAttribute(            // line 11
$context["broadcast"], "channel", array()), "id", array()), "channel_alias" => $this->getAttribute($this->getAttribute(            // line 12
$context["broadcast"], "channel", array()), "alias", array())));
            // line 15
            echo "    ";
            $this->loadTemplate("partials/thumbnail.twig", "controllers/widgets/television-content.twig", 15)->display(array_merge($context, array("data_attributes" => array("poor_preview" => ((($this->getAttribute($this->getAttribute($this->getAttribute(            // line 17
$context["broadcast"], "program", array(), "any", false, true), "images", array(), "any", false, true), "xlarge", array(), "any", true, true) &&  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "images", array()), "xlarge", array())))) ? ("false") : ("true")), "channel_logo" => "true", "progress" => "true", "size" => "small", "type" => "play", "trailer_button" => (($this->getAttribute($this->getAttribute(            // line 22
$context["broadcast"], "program", array()), "trailer", array())) ? ("true") : ("false")), "preview_animation" => "true"), "preview" => array("link" =>             // line 26
(isset($context["preview_link"]) ? $context["preview_link"] : $this->getContext($context, "preview_link")), "classes" => "pmd-js-TelevisionContent-fakeRemote", "identifier" => $this->getAttribute($this->getAttribute(            // line 28
$context["broadcast"], "channel", array()), "alias", array()), "image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 30
$context["broadcast"], "program", array()), "images", array()), "xlarge", array()), "title" => $this->getAttribute($this->getAttribute(            // line 31
$context["broadcast"], "program", array()), "fulltitle", array())), "nofollow" => true), "trailer" => array("classes" => "pmd-js-TrailerButton2", "href" => (("/trailer/" . $this->getAttribute($this->getAttribute(            // line 37
$context["broadcast"], "program", array()), "id", array())) . "/?autoplay=1&skin=minimal")), "progress" => array("percentage" => (($this->getAttribute(            // line 41
$context["broadcast"], "progress", array(), "any", true, true)) ? ($this->getAttribute($context["broadcast"], "progress", array())) : (0))), "text" => array("firstline" => (((("<a href=" . $this->getAttribute($this->getAttribute(            // line 44
$context["broadcast"], "program", array()), "program_url", array())) . ">") . $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "fulltitle", array())) . "</a>"), "secondline" => (((("<a href=" . $this->getAttribute($this->getAttribute(            // line 45
$context["broadcast"], "program", array()), "program_url", array())) . " rel=\"nofollow\">") . $this->getAttribute($this->getAttribute($context["broadcast"], "program", array()), "subtitle", array())) . "</a>")), "channel" => array("image" => array("src" => $this->getAttribute($this->getAttribute($this->getAttribute(            // line 49
$context["broadcast"], "channel", array()), "images", array()), "medium", array()), "alt" => $this->getAttribute($this->getAttribute(            // line 50
$context["broadcast"], "channel", array()), "name", array()))))));
            // line 55
            echo "    </div>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['broadcast'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 57
        echo "  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "controllers/widgets/television-content.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 57,  70 => 55,  68 => 50,  67 => 49,  66 => 45,  65 => 44,  64 => 41,  63 => 37,  62 => 31,  61 => 30,  60 => 28,  59 => 26,  58 => 22,  57 => 17,  55 => 15,  53 => 12,  52 => 11,  51 => 10,  48 => 9,  31 => 8,  26 => 5,  24 => 4,  19 => 1,);
    }
}
/* <div class="pmd-TvPageMainContent">*/
/* */
/*   <h2 class="pmd-TvPageMainContent-title">*/
/*   {% trans %}Now{% endtrans %}*/
/*   </h2>*/
/* */
/*   <div class="pmd-TvPageMainContentThumbnails">*/
/*     {% for broadcast in broadcasts %}*/
/*     <div class="pmd-TvPageMainContentThumbnailsItem">*/
/*     {% set preview_link = path('television_channel_single', {*/
/*         'channel_id': broadcast.channel.id,*/
/*         'channel_alias': broadcast.channel.alias*/
/*       })*/
/*     %}*/
/*     {% include 'partials/thumbnail.twig' with {*/
/*       'data_attributes': {*/
/*         'poor_preview': broadcast.program.images.xlarge is defined and broadcast.program.images.xlarge is not empty ? 'false' : 'true',*/
/*         'channel_logo': 'true',*/
/*         'progress': 'true',*/
/*         'size': 'small',*/
/*         'type': 'play',*/
/*         'trailer_button': broadcast.program.trailer ? 'true' : 'false',*/
/*         'preview_animation': 'true'*/
/*       },*/
/*       'preview': {*/
/*         'link': preview_link,*/
/*         'classes': 'pmd-js-TelevisionContent-fakeRemote',*/
/*         'identifier': broadcast.channel.alias,*/
/*         'image': {*/
/*           'src': broadcast.program.images.xlarge,*/
/*           'title': broadcast.program.fulltitle*/
/*         },*/
/*         'nofollow': true*/
/*       },*/
/*       'trailer': {*/
/*         'classes': 'pmd-js-TrailerButton2',*/
/*         'href': '/trailer/' ~ broadcast.program.id ~ '/?autoplay=1&skin=minimal'*/
/*       },*/
/* */
/*       'progress': {*/
/*         'percentage': broadcast.progress is defined ? broadcast.progress : 0*/
/*       },*/
/*       'text': {*/
/*         'firstline': '<a href=' ~ broadcast.program.program_url ~ '>' ~ broadcast.program.fulltitle ~ '</a>',*/
/*         'secondline': '<a href=' ~ broadcast.program.program_url ~ ' rel="nofollow">' ~ broadcast.program.subtitle ~ '</a>'*/
/*       },*/
/*       'channel': {*/
/*         'image': {*/
/*           'src': broadcast.channel.images.medium,*/
/*           'alt': broadcast.channel.name*/
/*         }*/
/*       }*/
/*     }*/
/*     %}*/
/*     </div>*/
/*     {% endfor %}*/
/*   </div>*/
/* */
/* </div>*/
/* */
