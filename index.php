<?php
    session_start();
    $_SESSION["check"] = 1;
    $_SESSION["url"] = "";
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Receive Temporary Response</title>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
        <link href="/static/css/main.css" rel="stylesheet" />

        <script src="/assets/jquery-3.5.1.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.js"></script>
        <script src="/static/js/main.js"></script>
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>
    <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand"><a href="/">RTR</a></h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>

            <main role="main" class="inner cover">
                <h1 class="cover-heading">Receive temporary response.</h1>
                <p class="lead">You can create temporary URL to receive response.<br>This tool shows request's HTTP header and details.</p>
                <p class="lead">
                    <a href="#" class="btn btn-lg btn-secondary main-create-url" onclick="create_url(this);">Create URL</a>
                </p>
            </main>

            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                </div>
            </footer>
        </div>
    </body>
</html>
