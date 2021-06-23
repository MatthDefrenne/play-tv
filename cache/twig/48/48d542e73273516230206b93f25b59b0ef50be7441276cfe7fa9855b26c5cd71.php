<?php

/* partials/opengraph.twig */
class __TwigTemplate_e1cebc7a50a99d8a1046f4ef4435646c5868323e050d1ddfae27c706dfa41913 extends Twig_Template
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
        ob_start();
        // line 2
        echo "<meta property=\"fb:app_id\" content=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["external_apis"]) ? $context["external_apis"] : $this->getContext($context, "external_apis")), "facebook", array()), "appId", array()), "html", null, true);
        echo "\">
<meta property=\"fb:admins\" content=\"100000359285231\">
<meta property=\"og:site_name\" content=\"Play TV\">
<meta property=\"og:locale\" content=\"fr_FR\">
<meta property=\"og:url\" content=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["current_url"]) ? $context["current_url"] : $this->getContext($context, "current_url")), "html", null, true);
        echo "\">
<meta name=\"twitter:site\" content=\"@PLAYTV_FR\">
<meta name=\"twitter:app:name:googleplay\" content=\"Play TV\">
";
        // line 9
        if (((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "programme_tv")) {
            // line 10
            echo "
  <meta property=\"og:type\" content=\"movie\">
  <meta property=\"og:title\" content=\"Regarder ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "fulltitle", array()), "html", null, true);
            if ($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array())) {
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "subtitle", array()), "html", null, true);
            }
            echo " en direct\">
  <meta property=\"og:description\" content=\"";
            // line 13
            echo twig_escape_filter($this->env, strip_tags(twig_truncate_filter($this->env, $this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "summary", array()), 250, false)), "html", null, true);
            echo "\">
  ";
            // line 14
            if ( !(null === $this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "images", array()), "source", array()))) {
                // line 15
                echo "  <meta property=\"og:image\" content=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["program"]) ? $context["program"] : $this->getContext($context, "program")), "images", array()), "source", array()), "html", null, true);
                echo "\">
  <meta name=\"twitter:card\" content=\"summary_large_image\">
  ";
            }
            // line 18
            echo "
";
        } elseif ((        // line 19
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "television")) {
            // line 20
            echo "
  ";
            // line 21
            if (array_key_exists("channel", $context)) {
                // line 22
                echo "    <meta property=\"og:title\" content=\"Regarder ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
                echo " en direct\">
    ";
                // line 23
                if ((array_key_exists("channel_broadcast_live", $context) &&  !(null === (isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live"))))) {
                    // line 24
                    echo "      <meta property=\"og:description\" content=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live")), "opengraph_description", array()), "html", null, true);
                    echo "\">
    ";
                } else {
                    // line 26
                    echo "      <meta property=\"og:description\" content=\"Regarder ";
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "name", array()), "html", null, true);
                    echo " en direct sur Play TV\">
    ";
                }
                // line 28
                echo "
    ";
                // line 29
                if (($this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : null), "program", array(), "any", true, true) &&  !(null === $this->getAttribute($this->getAttribute($this->getAttribute(                // line 30
(isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live")), "program", array()), "images", array()), "source", array())))) {
                    // line 32
                    echo "      <meta property=\"og:image\" content=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["channel_broadcast_live"]) ? $context["channel_broadcast_live"] : $this->getContext($context, "channel_broadcast_live")), "program", array()), "images", array()), "source", array()), "html", null, true);
                    echo "\">
      <meta name=\"twitter:card\" content=\"summary_large_image\">
    ";
                } elseif ( !(null === $this->getAttribute($this->getAttribute(                // line 34
(isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "source", array()))) {
                    // line 35
                    echo "      <meta property=\"og:image\" content=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "images", array()), "source", array()), "html", null, true);
                    echo "\">
      <meta name=\"twitter:card\" content=\"summary\">
    ";
                }
                // line 38
                echo "    <meta property=\"og:type\" content=\"video\">
    <meta property=\"og:video:url\" content=\"";
                // line 39
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["hosts"]) ? $context["hosts"] : $this->getContext($context, "hosts")), "current_full", array()), "html", null, true);
                echo "/player/embed/";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "alias", array()), "html", null, true);
                echo "/\">
    <meta property=\"og:video:type\" content=\"text/html\">
    <meta property=\"og:video:width\" content=\"610\">
    <meta property=\"og:video:height\" content=\"384\">
  ";
            } else {
                // line 44
                echo "    <meta property=\"og:title\" content=\"Live TV, la télévision en direct\">
    <meta property=\"og:description\" content=\"Regarder vos chaînes de télé en direct sur Play TV\">
    <meta name=\"twitter:card\" content=\"summary\">
  ";
            }
            // line 48
            echo "
";
        } elseif ((((        // line 49
(isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")) == "replay_tv") && ((isset($context["action_name"]) ? $context["action_name"] : $this->getContext($context, "action_name")) == "replay")) && array_key_exists("video", $context))) {
            // line 50
            echo "
  <meta property=\"og:type\" content=\"movie\">
  <meta property=\"og:title\" content=\"Revoir ";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "title", array()), "html", null, true);
            echo " en replay\">
  ";
            // line 53
            if ( !(null === $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "source", array()))) {
                // line 54
                echo "    <meta property=\"og:image\" content=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["video"]) ? $context["video"] : $this->getContext($context, "video")), "images", array()), "source", array()), "html", null, true);
                echo "\">
  ";
            }
            // line 56
            echo "  <meta name=\"twitter:card\" content=\"summary\">

";
        } elseif ( !(null === $this->getAttribute($this->getAttribute(        // line 58
(isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "title", array()))) {
            // line 59
            echo "
  <meta property=\"og:type\" content=\"website\">
  <meta property=\"og:title\" content=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["head"]) ? $context["head"] : $this->getContext($context, "head")), "meta", array()), "title", array()), "html", null, true);
            echo "\">
  <meta name=\"twitter:card\" content=\"summary\">

";
        }
        // line 65
        echo "<link rel=\"publisher\" href=\"https://plus.google.com/113118181508368604797\">
";
        echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
    }

    public function getTemplateName()
    {
        return "partials/opengraph.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 65,  162 => 61,  158 => 59,  156 => 58,  152 => 56,  146 => 54,  144 => 53,  140 => 52,  136 => 50,  134 => 49,  131 => 48,  125 => 44,  115 => 39,  112 => 38,  105 => 35,  103 => 34,  97 => 32,  95 => 30,  94 => 29,  91 => 28,  85 => 26,  79 => 24,  77 => 23,  72 => 22,  70 => 21,  67 => 20,  65 => 19,  62 => 18,  55 => 15,  53 => 14,  49 => 13,  41 => 12,  37 => 10,  35 => 9,  29 => 6,  21 => 2,  19 => 1,);
    }
}
/* {% spaceless %}*/
/* <meta property="fb:app_id" content="{{ external_apis.facebook.appId }}">*/
/* <meta property="fb:admins" content="100000359285231">*/
/* <meta property="og:site_name" content="Play TV">*/
/* <meta property="og:locale" content="fr_FR">*/
/* <meta property="og:url" content="{{ current_url }}">*/
/* <meta name="twitter:site" content="@PLAYTV_FR">*/
/* <meta name="twitter:app:name:googleplay" content="Play TV">*/
/* {% if controller_name == 'programme_tv' %}*/
/* */
/*   <meta property="og:type" content="movie">*/
/*   <meta property="og:title" content="Regarder {{ program.fulltitle }}{% if program.subtitle %} : {{ program.subtitle }}{% endif %} en direct">*/
/*   <meta property="og:description" content="{{ program.summary|truncate(250, false)|striptags }}">*/
/*   {% if program.images.source is not null %}*/
/*   <meta property="og:image" content="{{ program.images.source }}">*/
/*   <meta name="twitter:card" content="summary_large_image">*/
/*   {% endif %}*/
/* */
/* {% elseif controller_name == 'television' %}*/
/* */
/*   {% if channel is defined %}*/
/*     <meta property="og:title" content="Regarder {{ channel.name }} en direct">*/
/*     {% if channel_broadcast_live is defined and channel_broadcast_live is not null %}*/
/*       <meta property="og:description" content="{{ channel_broadcast_live.opengraph_description }}">*/
/*     {% else %}*/
/*       <meta property="og:description" content="Regarder {{ channel.name }} en direct sur Play TV">*/
/*     {% endif %}*/
/* */
/*     {% if channel_broadcast_live.program is defined*/
/*       and channel_broadcast_live.program.images.source is not null*/
/*     %}*/
/*       <meta property="og:image" content="{{ channel_broadcast_live.program.images.source }}">*/
/*       <meta name="twitter:card" content="summary_large_image">*/
/*     {% elseif channel.images.source is not null %}*/
/*       <meta property="og:image" content="{{ channel.images.source }}">*/
/*       <meta name="twitter:card" content="summary">*/
/*     {% endif %}*/
/*     <meta property="og:type" content="video">*/
/*     <meta property="og:video:url" content="{{ hosts.current_full }}/player/embed/{{ channel.alias }}/">*/
/*     <meta property="og:video:type" content="text/html">*/
/*     <meta property="og:video:width" content="610">*/
/*     <meta property="og:video:height" content="384">*/
/*   {% else %}*/
/*     <meta property="og:title" content="Live TV, la télévision en direct">*/
/*     <meta property="og:description" content="Regarder vos chaînes de télé en direct sur Play TV">*/
/*     <meta name="twitter:card" content="summary">*/
/*   {% endif %}*/
/* */
/* {% elseif controller_name == 'replay_tv' and action_name == 'replay' and video is defined %}*/
/* */
/*   <meta property="og:type" content="movie">*/
/*   <meta property="og:title" content="Revoir {{ video.title }} en replay">*/
/*   {% if video.images.source is not null %}*/
/*     <meta property="og:image" content="{{ video.images.source }}">*/
/*   {% endif %}*/
/*   <meta name="twitter:card" content="summary">*/
/* */
/* {% elseif head.meta.title is not null %}*/
/* */
/*   <meta property="og:type" content="website">*/
/*   <meta property="og:title" content="{{ head.meta.title }}">*/
/*   <meta name="twitter:card" content="summary">*/
/* */
/* {% endif %}*/
/* <link rel="publisher" href="https://plus.google.com/113118181508368604797">*/
/* {% endspaceless %}*/
/* */
