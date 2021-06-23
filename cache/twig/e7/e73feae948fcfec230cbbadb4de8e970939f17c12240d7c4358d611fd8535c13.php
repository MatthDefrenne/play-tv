<?php

/* controllers/television/_tracking-netstat-fr24.twig */
class __TwigTemplate_02f23525622aea5c8e680b244f75bbcb8c8be90c58752d1d23047953a5125b3c extends Twig_Template
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
        // line 4
        echo "
";
        // line 5
        if (((($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 42) || ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 50)) || ($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 83))) {
            // line 6
            echo "
    <script>(function(f){var d=[],g=\"\",e=\"\",a=navigator,c=\"\";if(top!=self){if(a=a.userAgent,-1==a.indexOf(\"Safari\")){var b=a.indexOf(\"Opera\");if(-1==b||5<a.charAt(b+6)+0)if(b=a.indexOf(\"Mozilla\"),b=-1!=b?4<a.charAt(b+8):1,-1!=a.indexOf(\"compatible\")||b)eval(\"try{ns_0=top.document.referrer}catch(e){}\"),eval(\"try{l=top.document.location.href}catch(e){}\")}}else c=document.referrer,e=document.location.href;c.lastIndexOf(\"/\")==c.length-1&&(c=c.substring(c.lastIndexOf(\"/\"),0));b=f.indexOf(\"?\");if(-1!=b&&(a=f.substring(b+1),f=f.substring(0,b),a)){b=a.indexOf(\"&\");g=a.substring(0,-1==b?a.length:b);-1!=g.indexOf(\"=\")&&(g=\"\");g&&(a=a.substring(-1==b?a.length:b+1),a+=(a?\"&\":\"\")+\"ns_name=\"+g);0<c.length&&(a+=(a?\"&\":\"\")+\"ns_referrer=\"+escape(c));for(b=0;a.length;){c=a.indexOf(\"&\");-1==c&&(c=a.length);var h=a.substring(b,c);\"amp;\"==h.substring(0,4)&&(h=h.substring(4));h&&(d[d.length]=h);a=a.substring(c+1)}}a=e.indexOf(\"?\");if(a=-1==a?0:e.substring(a+1))for(;a.length;){c=a.indexOf(\"&\");-1==c&&(c=a.length);b=a.substring(0,a.substring(0,c).indexOf(\"=\"));e=a.substring(a.substring(0,c).indexOf(\"=\")+1,c);for(\"amp;\"==b.substring(0,4)&&(b=b.substring(4));\"=\"==e.substring(0,1);)e=e.substring(1);if(\"ns_name\"==b)g=e;else if(\"ns_or\"==b)for(b=0;b<d.length;b++)\"ns_referrer=\"==d[b].substring(0,12)&&(d[b]=\"ns_referrer=\"+e);else if(\"ns_\"==b.substring(0,3)&&e&&b){for(var i=h=0;i<d.length;i++)d[i].substring(0,d[i].indexOf(\"=\"))==b&&(d[i]=b+\"=\"+e,h=1);h||(d[d.length]=b+\"=\"+e)}a=a.substring(c+1)}if(g){e=b=\"\";for(c=0;c<d.length;c++)\"ns_name=\"!=d[c].substring(0,8)&&(\"ns_referrer=\"!=d[c].substring(0,12)?b+=\"&\"+d[c]:e=\"&\"+d[c]);b+=\"\";ns_pixelUrl=f+\"?\"+g+\"&ns__t=\"+(new Date).getTime();f=ns_pixelUrl+b+e;document.images?(ns_1=new Image,ns_1.src=f):\$(\"<img src=\"+f+' width=\"1\" height=\"1\" />').appendTo(\"body\")}})(\"http://fr.sitestat.com/aef/f24-part/s?";
            // line 7
            if (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 42)) {
                echo "playtv.fr";
            } elseif (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 50)) {
                echo "playtv.en";
            } elseif (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 83)) {
                echo "playtv.ar";
            }
            echo "\");</script>
    <noscript><img src=\"https://fr.sitestat.com/aef/f24-part/s?";
            // line 8
            if (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 42)) {
                echo "playtv.fr";
            } elseif (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 50)) {
                echo "playtv.en";
            } elseif (($this->getAttribute((isset($context["channel"]) ? $context["channel"] : $this->getContext($context, "channel")), "channel_id", array()) == 83)) {
                echo "playtv.ar";
            }
            echo "\" width=\"1\" height=\"1\" alt=\"\" /></noscript>

";
        }
    }

    public function getTemplateName()
    {
        return "controllers/television/_tracking-netstat-fr24.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  37 => 8,  27 => 7,  24 => 6,  22 => 5,  19 => 4,);
    }
}
/* {#*/
/*     @description: tracking nedstat pour FR24*/
/* #}*/
/* */
/* {% if channel.channel_id == 42 or channel.channel_id == 50 or channel.channel_id == 83 %}*/
/* */
/*     <script>(function(f){var d=[],g="",e="",a=navigator,c="";if(top!=self){if(a=a.userAgent,-1==a.indexOf("Safari")){var b=a.indexOf("Opera");if(-1==b||5<a.charAt(b+6)+0)if(b=a.indexOf("Mozilla"),b=-1!=b?4<a.charAt(b+8):1,-1!=a.indexOf("compatible")||b)eval("try{ns_0=top.document.referrer}catch(e){}"),eval("try{l=top.document.location.href}catch(e){}")}}else c=document.referrer,e=document.location.href;c.lastIndexOf("/")==c.length-1&&(c=c.substring(c.lastIndexOf("/"),0));b=f.indexOf("?");if(-1!=b&&(a=f.substring(b+1),f=f.substring(0,b),a)){b=a.indexOf("&");g=a.substring(0,-1==b?a.length:b);-1!=g.indexOf("=")&&(g="");g&&(a=a.substring(-1==b?a.length:b+1),a+=(a?"&":"")+"ns_name="+g);0<c.length&&(a+=(a?"&":"")+"ns_referrer="+escape(c));for(b=0;a.length;){c=a.indexOf("&");-1==c&&(c=a.length);var h=a.substring(b,c);"amp;"==h.substring(0,4)&&(h=h.substring(4));h&&(d[d.length]=h);a=a.substring(c+1)}}a=e.indexOf("?");if(a=-1==a?0:e.substring(a+1))for(;a.length;){c=a.indexOf("&");-1==c&&(c=a.length);b=a.substring(0,a.substring(0,c).indexOf("="));e=a.substring(a.substring(0,c).indexOf("=")+1,c);for("amp;"==b.substring(0,4)&&(b=b.substring(4));"="==e.substring(0,1);)e=e.substring(1);if("ns_name"==b)g=e;else if("ns_or"==b)for(b=0;b<d.length;b++)"ns_referrer="==d[b].substring(0,12)&&(d[b]="ns_referrer="+e);else if("ns_"==b.substring(0,3)&&e&&b){for(var i=h=0;i<d.length;i++)d[i].substring(0,d[i].indexOf("="))==b&&(d[i]=b+"="+e,h=1);h||(d[d.length]=b+"="+e)}a=a.substring(c+1)}if(g){e=b="";for(c=0;c<d.length;c++)"ns_name="!=d[c].substring(0,8)&&("ns_referrer="!=d[c].substring(0,12)?b+="&"+d[c]:e="&"+d[c]);b+="";ns_pixelUrl=f+"?"+g+"&ns__t="+(new Date).getTime();f=ns_pixelUrl+b+e;document.images?(ns_1=new Image,ns_1.src=f):$("<img src="+f+' width="1" height="1" />').appendTo("body")}})("http://fr.sitestat.com/aef/f24-part/s?{% if channel.channel_id == 42 %}playtv.fr{% elseif channel.channel_id == 50 %}playtv.en{% elseif channel.channel_id == 83 %}playtv.ar{% endif %}");</script>*/
/*     <noscript><img src="https://fr.sitestat.com/aef/f24-part/s?{% if channel.channel_id == 42 %}playtv.fr{% elseif channel.channel_id == 50 %}playtv.en{% elseif channel.channel_id == 83 %}playtv.ar{% endif %}" width="1" height="1" alt="" /></noscript>*/
/* */
/* {% endif %}*/
/* */
