<?php

/* controllers/ui/block-account-header.twig */
class __TwigTemplate_bacb34287b3d0cfc5bda7169c6d31d08efc2f5d034dd2436c85a704476601a69 extends Twig_Template
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
        if ((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account"))) {
            // line 2
            echo "  <a class=\"pmd-js-HeaderAccount-link pmd-HeaderAccount-avatar\">
    <img
      data-src=\"";
            // line 4
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 40, 1 => 40), "method", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : null), "getAvatar", array(0 => 40, 1 => 40), "method"), ((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture.png"))) : (((isset($context["apps_base_url"]) ? $context["apps_base_url"] : $this->getContext($context, "apps_base_url")) . "/images/avatars/user-picture.png"))), "html", null, true);
            echo "\"
      src=\"data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==\"
      width=\"40\"
      height=\"40\"
      onload=\"lzld(this)\">
  </a>
  <ul class=\"pmd-js-HeaderAccount-menu pmd-HeaderAccountMenu\">
    <li class=\"pmd-HeaderAccountMenu-item\">
      <a href=\"/mon-compte/\" class=\"pmd-HeaderAccountMenu-link\">";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "getUsername", array()), "html", null, true);
            echo "</a>
    </li>
    ";
            // line 14
            if (($this->getAttribute((isset($context["current_account"]) ? $context["current_account"] : $this->getContext($context, "current_account")), "isPremium", array()) == false)) {
                // line 15
                echo "    <li class=\"pmd-HeaderAccountMenu-item\">
      <a href=\"/nos-offres/\" class=\"pmd-HeaderAccountMenu-link\">Découvrir nos offres</a>
    </li>
    ";
            }
            // line 19
            echo "    <li class=\"pmd-HeaderAccountMenu-item\">
      <a href=\"/deconnexion/\" rel=\"nofollow\" class=\"";
            // line 20
            if (!twig_in_filter((isset($context["controller_name"]) ? $context["controller_name"] : $this->getContext($context, "controller_name")), array(0 => "account", 1 => "bouncer"))) {
                echo "pmd-js-HeaderAccount-logout ";
            }
            echo "pmd-HeaderAccountMenu-link pmd-HeaderAccountMenu-link--highlight\">Déconnexion</a>
    </li>
  </ul>
";
        } else {
            // line 24
            echo "  <a href=\"/connexion/\" rel=\"nofollow\" class=\"pmd-js-loginHandler pmd-HeaderAccount-login\">Connexion</a>
";
        }
    }

    public function getTemplateName()
    {
        return "controllers/ui/block-account-header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 24,  52 => 20,  49 => 19,  43 => 15,  41 => 14,  36 => 12,  25 => 4,  21 => 2,  19 => 1,);
    }
}
/* {% if current_account %}*/
/*   <a class="pmd-js-HeaderAccount-link pmd-HeaderAccount-avatar">*/
/*     <img*/
/*       data-src="{{ current_account.getAvatar(40, 40)|default(apps_base_url ~ "/images/avatars/user-picture.png") }}"*/
/*       src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="*/
/*       width="40"*/
/*       height="40"*/
/*       onload="lzld(this)">*/
/*   </a>*/
/*   <ul class="pmd-js-HeaderAccount-menu pmd-HeaderAccountMenu">*/
/*     <li class="pmd-HeaderAccountMenu-item">*/
/*       <a href="/mon-compte/" class="pmd-HeaderAccountMenu-link">{{ current_account.getUsername }}</a>*/
/*     </li>*/
/*     {% if current_account.isPremium == false %}*/
/*     <li class="pmd-HeaderAccountMenu-item">*/
/*       <a href="/nos-offres/" class="pmd-HeaderAccountMenu-link">Découvrir nos offres</a>*/
/*     </li>*/
/*     {% endif %}*/
/*     <li class="pmd-HeaderAccountMenu-item">*/
/*       <a href="/deconnexion/" rel="nofollow" class="{% if controller_name not in ['account', 'bouncer'] %}pmd-js-HeaderAccount-logout {% endif %}pmd-HeaderAccountMenu-link pmd-HeaderAccountMenu-link--highlight">Déconnexion</a>*/
/*     </li>*/
/*   </ul>*/
/* {% else %}*/
/*   <a href="/connexion/" rel="nofollow" class="pmd-js-loginHandler pmd-HeaderAccount-login">Connexion</a>*/
/* {% endif %}*/
/* */
