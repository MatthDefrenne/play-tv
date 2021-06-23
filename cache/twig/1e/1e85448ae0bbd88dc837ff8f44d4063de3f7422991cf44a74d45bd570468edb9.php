<?php

/* controllers/widgets/broadcasts-live_mobile.twig */
class __TwigTemplate_1ee46ca92d6f10f5bdb42c9112d4a122780b447aa440389895195360f919de4e extends Twig_Template
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
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["channels_broadcasts_live"]) ? $context["channels_broadcasts_live"] : $this->getContext($context, "channels_broadcasts_live")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["channel"]) {
            // line 2
            echo "  ";
            $this->loadTemplate("partials/item-broadcast_mobile.twig", "controllers/widgets/broadcasts-live_mobile.twig", 2)->display(array_merge($context, array("channel" => $context["channel"], "broadcasts" => $this->getAttribute($context["channel"], "broadcasts", array()), "is_live" => true)));
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['channel'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "controllers/widgets/broadcasts-live_mobile.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 2,  19 => 1,);
    }
}
/* {% for channel in channels_broadcasts_live %}*/
/*   {% include "partials/item-broadcast_mobile.twig" with {'channel': channel, 'broadcasts': channel.broadcasts, 'is_live': true} %}*/
/* {% endfor %}*/
/* */
