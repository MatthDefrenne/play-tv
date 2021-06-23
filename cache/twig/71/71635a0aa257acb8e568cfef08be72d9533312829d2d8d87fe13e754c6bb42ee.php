<?php

/* controllers/live-tweets/_last-prime-chart.twig */
class __TwigTemplate_69bfcf333d2c60049b18e7c06d4a184d321ab9f40bdece7d95da04962c90b027 extends Twig_Template
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
        if ((isset($context["tweets_per_minute"]) ? $context["tweets_per_minute"] : $this->getContext($context, "tweets_per_minute"))) {
            // line 2
            echo "  ";
            ob_start();
            // line 3
            echo "    <script src=\"https://www.google.com/jsapi\"></script>
    <script>
      google.load(\"visualization\", \"1\", {packages:[\"corechart\"]});

      google.setOnLoadCallback(function()
      {
        var data = google.visualization.arrayToDataTable([
          [\"Heure\", \"Tweets\"],
          ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tweets_per_minute"]) ? $context["tweets_per_minute"] : $this->getContext($context, "tweets_per_minute")));
            foreach ($context['_seq'] as $context["date"] => $context["tweets"]) {
                // line 12
                echo "            [\"";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $context["date"], "H:i"), "html", null, true);
                echo "\", ";
                echo twig_escape_filter($this->env, $context["tweets"], "html", null, true);
                echo "],
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['date'], $context['tweets'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "        ]);

        var chart = new google.visualization.LineChart(document.getElementById(\"tweets_per_minute_chart\"));

        chart.draw(data, {
          width: \"100%\",
          height: 150,
          lineWidth: 2,
          legend: { position: \"none\" },
          tooltip: { },
          chartArea: { left: 0, top: 0, width: \"100%\", height: 136 },
          curveType: \"function\",
          enableInteractivity: true,
          hAxis: { textPosition: \"out\", textStyle: { color: \"#aaa\", fontName: \"arial\", fontSize: 9 }, slantedText: false },
          vAxis: { textPosition: \"in\", format: \"#\", textStyle: { color: \"#aaa\", fontName: \"arial\", fontSize: 9 }, gridlines: { color: \"#ddd\", count: 4 }, logScale: true, minValue: 0, maxValue: ";
            // line 28
            echo twig_escape_filter($this->env, max((isset($context["tweets_per_minute"]) ? $context["tweets_per_minute"] : $this->getContext($context, "tweets_per_minute"))), "html", null, true);
            echo ", baseline: 0, baselineColor: \"#ccc\" }
        });
      });
    </script>
  ";
            echo trim(preg_replace('/>\s+</', '><', ob_get_clean()));
            // line 33
            echo "
  <div class=\"block-title margin\">
    <p class=\"right clear-grey\">Tweets</p>
    <h2><strong>Soirée de la veille</strong></h2>
  </div>

  <div id=\"tweets_per_minute_chart\"></div>
";
        }
        // line 41
        echo "
";
    }

    public function getTemplateName()
    {
        return "controllers/live-tweets/_last-prime-chart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 41,  73 => 33,  65 => 28,  49 => 14,  38 => 12,  34 => 11,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if tweets_per_minute %}*/
/*   {% spaceless %}*/
/*     <script src="https://www.google.com/jsapi"></script>*/
/*     <script>*/
/*       google.load("visualization", "1", {packages:["corechart"]});*/
/* */
/*       google.setOnLoadCallback(function()*/
/*       {*/
/*         var data = google.visualization.arrayToDataTable([*/
/*           ["Heure", "Tweets"],*/
/*           {% for date, tweets in tweets_per_minute %}*/
/*             ["{{ date|date('H:i') }}", {{ tweets }}],*/
/*           {% endfor %}*/
/*         ]);*/
/* */
/*         var chart = new google.visualization.LineChart(document.getElementById("tweets_per_minute_chart"));*/
/* */
/*         chart.draw(data, {*/
/*           width: "100%",*/
/*           height: 150,*/
/*           lineWidth: 2,*/
/*           legend: { position: "none" },*/
/*           tooltip: { },*/
/*           chartArea: { left: 0, top: 0, width: "100%", height: 136 },*/
/*           curveType: "function",*/
/*           enableInteractivity: true,*/
/*           hAxis: { textPosition: "out", textStyle: { color: "#aaa", fontName: "arial", fontSize: 9 }, slantedText: false },*/
/*           vAxis: { textPosition: "in", format: "#", textStyle: { color: "#aaa", fontName: "arial", fontSize: 9 }, gridlines: { color: "#ddd", count: 4 }, logScale: true, minValue: 0, maxValue: {{ max(tweets_per_minute) }}, baseline: 0, baselineColor: "#ccc" }*/
/*         });*/
/*       });*/
/*     </script>*/
/*   {% endspaceless %}*/
/* */
/*   <div class="block-title margin">*/
/*     <p class="right clear-grey">Tweets</p>*/
/*     <h2><strong>Soirée de la veille</strong></h2>*/
/*   </div>*/
/* */
/*   <div id="tweets_per_minute_chart"></div>*/
/* {% endif %}*/
/* */
/* */
