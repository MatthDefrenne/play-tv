<?php

/* partials/paginate-replay-tv.twig */
class __TwigTemplate_bc052e6cbec118062003640650aece842211c00948cd4f65ec8c3469e0cc1efe extends Twig_Template
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
        $context["edgepadding"] = 1;
        // line 2
        $context["padding"] = 2;
        // line 3
        echo "
";
        // line 4
        $context["route_name"] = "replay_videos";
        // line 5
        if (($this->getAttribute((isset($context["page_params"]) ? $context["page_params"] : null), "channel_id", array(), "any", true, true) || $this->getAttribute((isset($context["page_params"]) ? $context["page_params"] : null), "channel_alias", array(), "any", true, true))) {
            // line 6
            echo "  ";
            $context["route_name"] = "replay_channel_videos";
        }
        // line 8
        echo "
";
        // line 9
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) != 1)) {
            // line 10
            echo "  <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["page_params"]) ? $context["page_params"] : $this->getContext($context, "page_params")), array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - 1)))), "html", null, true);
            echo "\" class=\"previous\">&laquo;</a>
";
        } else {
            // line 12
            echo "  <span class=\"previous clear-grey\">&laquo;</span>
";
        }
        // line 14
        echo "
";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages"))));
        foreach ($context['_seq'] as $context["_key"] => $context["paginate"]) {
            // line 16
            echo "  ";
            if (((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) < 11)) {
                // line 17
                echo "    <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["page_params"]) ? $context["page_params"] : $this->getContext($context, "page_params")), array("page" => $context["paginate"]))), "html", null, true);
                echo "\" class=\"nb ";
                if (($context["paginate"] == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                    echo "clear-grey";
                }
                echo "\">
      ";
                // line 18
                echo twig_escape_filter($this->env, $context["paginate"], "html", null, true);
                echo "
    </a>
  ";
            } else {
                // line 21
                echo "    ";
                if (((($context["paginate"] < ((isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding")) + 1)) || ($context["paginate"] > ((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) - (isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding"))))) || ($context["paginate"] == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page"))))) {
                    // line 22
                    echo "      ";
                    if ((($context["paginate"] == ((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) - ((isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding")) - 1))) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) > (((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) - (isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding"))) + (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding")))))) {
                        // line 23
                        echo "        <span class=\"more\">...</span>
      ";
                    }
                    // line 25
                    echo "      <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["page_params"]) ? $context["page_params"] : $this->getContext($context, "page_params")), array("page" => $context["paginate"]))), "html", null, true);
                    echo "\" class=\"nb ";
                    if (($context["paginate"] == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                        echo "clear-grey";
                    }
                    echo "\">
        ";
                    // line 26
                    echo twig_escape_filter($this->env, $context["paginate"], "html", null, true);
                    echo "
      </a>
      ";
                    // line 28
                    if ((($context["paginate"] == (isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding"))) && ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) < (((isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding")) - (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding"))) + 1)))) {
                        // line 29
                        echo "        <span class=\"more\">...</span>
      ";
                    }
                    // line 31
                    echo "    ";
                } elseif (((($context["paginate"] > (isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding"))) && ($context["paginate"] > (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding"))) - 1))) && ($context["paginate"] < (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding"))) + 1)))) {
                    // line 32
                    echo "      ";
                    if ((($context["paginate"] == ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding")))) && (((isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding")) + 1) != ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) - (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding")))))) {
                        // line 33
                        echo "        <span class=\"more\">...</span>
      ";
                    }
                    // line 35
                    echo "      <a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["page_params"]) ? $context["page_params"] : $this->getContext($context, "page_params")), array("page" => $context["paginate"]))), "html", null, true);
                    echo "\" class=\"nb ";
                    if (($context["paginate"] == (isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")))) {
                        echo "clear-grey";
                    }
                    echo "\">
        ";
                    // line 36
                    echo twig_escape_filter($this->env, $context["paginate"], "html", null, true);
                    echo "
      </a>
      ";
                    // line 38
                    if ((($context["paginate"] == ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding")))) && (((isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")) - (isset($context["edgepadding"]) ? $context["edgepadding"] : $this->getContext($context, "edgepadding"))) != ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + (isset($context["padding"]) ? $context["padding"] : $this->getContext($context, "padding")))))) {
                        // line 39
                        echo "        <span class=\"more\">...</span>
      ";
                    }
                    // line 41
                    echo "    ";
                }
                // line 42
                echo "  ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['paginate'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "
";
        // line 45
        if (((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) != (isset($context["pages"]) ? $context["pages"] : $this->getContext($context, "pages")))) {
            // line 46
            echo "  <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath((isset($context["route_name"]) ? $context["route_name"] : $this->getContext($context, "route_name")), twig_array_merge((isset($context["page_params"]) ? $context["page_params"] : $this->getContext($context, "page_params")), array("page" => ((isset($context["page"]) ? $context["page"] : $this->getContext($context, "page")) + 1)))), "html", null, true);
            echo "\" class=\"next\">»</a>
";
        } else {
            // line 48
            echo "  <span class=\"next clear-grey\">»</span>
";
        }
    }

    public function getTemplateName()
    {
        return "partials/paginate-replay-tv.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  155 => 48,  149 => 46,  147 => 45,  144 => 44,  137 => 42,  134 => 41,  130 => 39,  128 => 38,  123 => 36,  114 => 35,  110 => 33,  107 => 32,  104 => 31,  100 => 29,  98 => 28,  93 => 26,  84 => 25,  80 => 23,  77 => 22,  74 => 21,  68 => 18,  59 => 17,  56 => 16,  52 => 15,  49 => 14,  45 => 12,  39 => 10,  37 => 9,  34 => 8,  30 => 6,  28 => 5,  26 => 4,  23 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% set edgepadding = 1 %}*/
/* {% set padding = 2 %}*/
/* */
/* {% set route_name = 'replay_videos' %}*/
/* {% if page_params.channel_id is defined or page_params.channel_alias is defined %}*/
/*   {% set route_name = 'replay_channel_videos' %}*/
/* {% endif %}*/
/* */
/* {% if page != 1 %}*/
/*   <a href="{{ path(route_name, page_params|merge({'page': page - 1})) }}" class="previous">&laquo;</a>*/
/* {% else %}*/
/*   <span class="previous clear-grey">&laquo;</span>*/
/* {% endif %}*/
/* */
/* {% for paginate in 1..pages %}*/
/*   {% if pages < 11 %}*/
/*     <a href="{{ path(route_name, page_params|merge({'page': paginate})) }}" class="nb {% if paginate == page %}clear-grey{% endif %}">*/
/*       {{ paginate }}*/
/*     </a>*/
/*   {% else %}*/
/*     {% if paginate < (edgepadding + 1) or paginate > (pages - edgepadding) or paginate == page %}*/
/*       {% if paginate == (pages - (edgepadding - 1)) and page > (pages - edgepadding + padding) %}*/
/*         <span class="more">...</span>*/
/*       {% endif %}*/
/*       <a href="{{ path(route_name, page_params|merge({'page': paginate})) }}" class="nb {% if paginate == page %}clear-grey{% endif %}">*/
/*         {{ paginate }}*/
/*       </a>*/
/*       {% if paginate == edgepadding and page < (edgepadding - padding + 1) %}*/
/*         <span class="more">...</span>*/
/*       {% endif %}*/
/*     {% elseif (paginate > edgepadding and (paginate > page - padding - 1) and (paginate < page + padding + 1)) %}*/
/*       {% if paginate == (page - padding) and (edgepadding + 1) != (page - padding) %}*/
/*         <span class="more">...</span>*/
/*       {% endif %}*/
/*       <a href="{{ path(route_name, page_params|merge({'page': paginate})) }}" class="nb {% if paginate == page %}clear-grey{% endif %}">*/
/*         {{ paginate }}*/
/*       </a>*/
/*       {% if paginate == (page + padding) and (pages - edgepadding) != (page + padding) %}*/
/*         <span class="more">...</span>*/
/*       {% endif %}*/
/*     {% endif %}*/
/*   {% endif %}*/
/* {% endfor %}*/
/* */
/* {% if page != pages %}*/
/*   <a href="{{ path(route_name, page_params|merge({'page': page + 1})) }}" class="next">»</a>*/
/* {% else %}*/
/*   <span class="next clear-grey">»</span>*/
/* {% endif %}*/
/* */
