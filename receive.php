<?php
    session_start();
    
    if($_SESSION["url"] == ""){
        require "./res_list.php";
        
        $headers = apache_request_headers();
        notification($headers, $_SERVER["REMOTE_ADDR"], $_SERVER['REQUEST_URI']);
        exit(0);
    }
    
    if($_SESSION["url"] != $_SERVER['REQUEST_URI']){
        header("Location: /", 302);
    }
    $url = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Receive Temporary Response</title>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" />
        <link href="/static/css/main.css" rel="stylesheet" />
        <link href="/static/css/receive.css" rel="stylesheet" />

        <script src="/assets/jquery-3.5.1.min.js"></script>
        <script src="/assets/bootstrap/js/bootstrap.js"></script>
        <script src="/assets/pusher.min.js"></script>
        <script src="/static/js/config.js"></script>
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
    <body>
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <header class="masthead mb-auto">
                <div class="inner">
                    <h3 class="masthead-brand"><a href="/">RTR</a></h3>
                    <nav class="nav nav-masthead justify-content-center">
                        <a class="nav-link active" href="/">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Contact</a>
                    </nav>
                </div>
            </header>
            <h3 class="cover-heading">Your temporary URL is</h3>
            <br><code><?php echo $url; ?></code><br><br><br>
            <h5><img src="/static/images/loading.gif" width="50"> Receiving request to here... <img src="/static/images/loading.gif" width="50"></h5>
            <div class="shadow p-3 mb-5 bg-white rounded receive-result">
                Recent request list
            </div>
            <footer class="mastfoot mt-auto">
                <div class="inner">
                    <p>Cover template for <a href="https://getbootstrap.com/">Bootstrap</a>, by <a href="https://twitter.com/mdo">@mdo</a>.</p>
                </div>
            </footer>
        </div>
        <script src="/static/js/main.js"></script>
    </body>
</html>
