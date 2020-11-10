<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=1024" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>Dream Team | presentation </title>

    <meta name="description" content="impress.js is a presentation tool based on the power of CSS3 transforms and transitions in modern browsers and inspired by the idea behind prezi.com." />
    <meta name="author" content="Bartek Szopka" />

    <link href="//fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />


    <link href="css/impress.css" rel="stylesheet" />
    <link href="css/impress-common.css" rel="stylesheet" />

</head>


<body class="impress-not-supported">



    <div class="fallback-message">
        <p>Your browser <b>doesn't support the features required</b> by impress.js, so you are presented with a simplified version of this presentation.</p>
        <p>For the best experience please use the latest <b>Chrome</b>, <b>Safari</b> or <b>Firefox</b> browser.</p>
    </div>


    <div id="impress"
        data-transition-duration="1000"

        data-width="1024"
        data-height="768"
        data-max-scale="3"
        data-min-scale="0"
        data-perspective="1000"

        data-autoplay="7">
        <!--
        <div id="bored" class="step slide" data-x="-1000" data-y="-1500" data-autoplay="10">
            <q>Vous ne vous ennuyez pas
                <b>avec toutes ces présentations</b> basées sur des diapositives?</q>
        </div>

        <div class="step slide" data-x="0" data-y="-1500">
            <q>Dream Team aide les équipes à travailler de manière plus collaborative et à en faire plus. <strong>Les tableaux, </strong> listes et cartes <strong>Dream Team</strong> permettent aux équipes d'organiser et de hiérarchiser les projets ?</q>
        </div>

        <div class="step slide" data-x="1000" data-y="-1500">
            <q> Travaillez avec n'importe quelle équipe
                Que ce soit pour le travail,  <strong>un projet parallèle </strong> ou même les prochaines vacances en famille, <strong>Dream Team aide votre équipe</strong> à rester organisée.</q>
        </div>
    -->

        <div id="title" class="step" data-x="0" data-y="0" data-scale="4">
            <span class="try">Rejoins-nous </span>
            <h1>Dream.Team<sup>*</sup></h1>
            <span class="footnote"><sup>*</sup> votre rythme votre équipe vos besoins</span>
        </div>

        <div id="its" class="step" data-x="850" data-y="3000" data-rotate="90" data-scale="5">
            <p>Informations en un coup d'œil,
                 des pièces jointes,  Collaborez sur des projets du début à la fin. <strong>Plongez dans les détails </strong> <br/>
                 en ajoutant des commentaires, <a href="@route('board')">ENTREZ</a> <br/>
                 des dates d'échéance et plus directement  <strong></strong> aux cartes Dream Team.</p>
        </div>

        <div id="big" class="step" data-x="3500" data-y="2100" data-rotate="180" data-scale="6">
            <p>DREAM <b>3D</b> <span class="thoughts">TEAM</span></p>
        </div>


        <div id="tiny" class="step" data-x="2825" data-y="2325" data-z="-3000" data-rotate="300" data-scale="1">
            <p>C'est <b>Genial </b>! </p>
        </div>


        <div id="ing" class="step" data-x="3500" data-y="-850" data-z="0" data-rotate="270" data-scale="6">
            <p>*<b class="positioning">travail d'équipe</b>,<b class="rotating">rapidité</b> avec<b class="scaling">Brainstorming</b> travail informatisé</p>
        </div>

        <div id="imagination" class="step" data-x="6700" data-y="-300" data-scale="6">
            <p>La seule <b>limite</b> est votre <b class="imagination">imagination</b></p>
        </div>

        <div id="source" class="step" data-x="6300" data-y="2000" data-rotate="20" data-scale="4">
            <p>Trois dimension?</p>
            <q><a href="@route('board')">ENTREZ</a>Notre equipe et interconnectée et on veille sur vous</q>
        </div>

        <div id="one-more-thing" class="step" data-x="6000" data-y="4000" data-scale="2">
            <p>Encore une chose ...</p>
        </div>


        <div id="its-in-3d" class="step" data-x="6200" data-y="4300" data-z="-100" data-rotate-x="-40" data-rotate-y="10" data-scale="2">
            <p><span class="have">Tu aimes </span> <span class="you">partager ? </span> <span class="noticed">puis</span> <span class="its">travailler</span> <span class="in">rapidement</span> ?</p>
            <span class="footnote">* Alors crée ton équipe ;-)</span>
        </div>


        <div id="overview" class="step" data-x="3000" data-y="1500" data-z="0" data-scale="10">
        </div>

    </div>

    <div id="impress-toolbar"></div>


    {{-- <div class="hint">
        <p> Utilisez une barre d'espace ou les touches fléchées pour naviguer.<br/>
            Appuyez sur «P» pour lancer la console du haut-parleur.</p>
    </div> --}}
<script>
if ("ontouchstart" in document.documentElement) {
    document.querySelector(".hint").innerHTML = "<p>Swipe left or right to navigate</p>";
}
</script>


<script src="js/impress.js"></script>
<script>impress().init();</script>



</body>
</html>

