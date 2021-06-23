<?php

/* controllers/pages/_mentions-legales.twig */
class __TwigTemplate_3a7acc22ed89270bbec90439981daa8fc3206a43c72102a04d24accb4cbafe96 extends Twig_Template
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
        echo "<article class=\"span13\">

  <div class=\"page-title\">
    <h1>Page. <span class=\"red\">Mentions légales</span></h1>
  </div>

  <div class=\"text bigger\">
    <h2>La société</h2>
    <p>
      Le site internet ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " est une publication de la société :<br>PLAYMEDIA, S.A.S au capital de 212 870 euros inscrite au RCS de Paris, numéro d'identification 513 229 013.
    </p>
    <p>
      <strong>Directeur de publication :</strong>
    </p>
    <p>M. John Galloula</p>
    <p>
      <strong>Siège social :</strong>
    </p>
    <p>42 rue de Maubeuge<br>75009 PARIS</p>
    <p>
      <em>
        Pour toute réclamation concernant le site et/ou son contenu veuillez nous contacter : <a href=\"mailto:contact@playmedia.fr\">contact@playmedia.fr</a>
      </em>
    </p>
    <h2>Hébergeur</h2>
    <p>PLAYMEDIA SAS<br>42 rue de Maubeuge<br>75009 PARIS<br>France</p>
    <h2>C.S.A. (Conseil Supérieur de l'Audiovisuel)</h2>
    <p>
      Conformément au décret n°2005-1335 du 31 octobre 2005 relatif au régime déclaratif des distributeurs audiovisuels, la société PLAYMEDIA SAS a effectué la déclaration des services distribués sur le site internet ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["request"]) ? $context["request"] : $this->getContext($context, "request")), "host", array()), "html", null, true);
        echo " :
    </p>
    <p>
      <a class=\"button\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, (isset($context["static_base_url"]) ? $context["static_base_url"] : $this->getContext($context, "static_base_url")), "html", null, true);
        echo "/files/csa_chaines_accessibles_playtv_02_2014.pdf\" title=\"Liste des chaines accessibles Play TV\">
        <strong>Liste des chaines accessibles Play TV</strong> »
      </a>
    </p>

    <h2>I.N.P.I. (Institut National de la Propriété Industrielle)</h2>
    <p>
      La marque PLAY TV.FR est enregistrée à l'INPI sous le numéro d'identification 3474336.<br>La marque PLAY MEDIA est enregistrée à l'INPI sous le numéro d'identification 3573665.
    </p>
  </div>

</article>
";
    }

    public function getTemplateName()
    {
        return "controllers/pages/_mentions-legales.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 32,  52 => 29,  30 => 10,  19 => 1,);
    }
}
/* <article class="span13">*/
/* */
/*   <div class="page-title">*/
/*     <h1>Page. <span class="red">Mentions légales</span></h1>*/
/*   </div>*/
/* */
/*   <div class="text bigger">*/
/*     <h2>La société</h2>*/
/*     <p>*/
/*       Le site internet {{ request.host }} est une publication de la société :<br>PLAYMEDIA, S.A.S au capital de 212 870 euros inscrite au RCS de Paris, numéro d'identification 513 229 013.*/
/*     </p>*/
/*     <p>*/
/*       <strong>Directeur de publication :</strong>*/
/*     </p>*/
/*     <p>M. John Galloula</p>*/
/*     <p>*/
/*       <strong>Siège social :</strong>*/
/*     </p>*/
/*     <p>42 rue de Maubeuge<br>75009 PARIS</p>*/
/*     <p>*/
/*       <em>*/
/*         Pour toute réclamation concernant le site et/ou son contenu veuillez nous contacter : <a href="mailto:contact@playmedia.fr">contact@playmedia.fr</a>*/
/*       </em>*/
/*     </p>*/
/*     <h2>Hébergeur</h2>*/
/*     <p>PLAYMEDIA SAS<br>42 rue de Maubeuge<br>75009 PARIS<br>France</p>*/
/*     <h2>C.S.A. (Conseil Supérieur de l'Audiovisuel)</h2>*/
/*     <p>*/
/*       Conformément au décret n°2005-1335 du 31 octobre 2005 relatif au régime déclaratif des distributeurs audiovisuels, la société PLAYMEDIA SAS a effectué la déclaration des services distribués sur le site internet {{ request.host }} :*/
/*     </p>*/
/*     <p>*/
/*       <a class="button" href="{{ static_base_url }}/files/csa_chaines_accessibles_playtv_02_2014.pdf" title="Liste des chaines accessibles Play TV">*/
/*         <strong>Liste des chaines accessibles Play TV</strong> »*/
/*       </a>*/
/*     </p>*/
/* */
/*     <h2>I.N.P.I. (Institut National de la Propriété Industrielle)</h2>*/
/*     <p>*/
/*       La marque PLAY TV.FR est enregistrée à l'INPI sous le numéro d'identification 3474336.<br>La marque PLAY MEDIA est enregistrée à l'INPI sous le numéro d'identification 3573665.*/
/*     </p>*/
/*   </div>*/
/* */
/* </article>*/
/* */
