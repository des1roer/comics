<!DOCTYPE html>
<html>
<head>
    <title>Comics</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment-with-locales.min.js"></script>
    <link rel="icon" href="http://faviconka.ru/ico/faviconka_ru_1005.png" type="image/x-icon"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="css/css.css" media="screen"/>
</head>
<body>

<div class="wrapper">
    <div v-if="loader" class="modal-mask">
        <div class="modal-wrapper">
            <center>
                <div class="loader"></div>
            </center>
        </div>
    </div>
    <section class="content">
        <div class="columns">
            <main class="main">
                <section id="hero-image">
                    <img id="ifr" :src="img" @click.prevent="next">
                </section>
            </main>
            <aside class="sidebar-first">
                <a class="carousel-control left" href="#" data-slide="prev" @click.prevent="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a></aside>
            <aside class="sidebar-second">
                <a class="carousel-control right" href="#" data-slide="next" @click.prevent="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </aside>
        </div>
    </section>
    <!--<footer class="footer">Footer: Fixed height</footer>-->
</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.2/vue.min.js'></script>
<script src="js/app.js?1.2"></script>
</body>
</html>
