<?php
session_start();
if(isset($_SESSION['message'])){
    unset($_SESSION['message']);
}

if(isset($_SESSION['usn_var_id']) && isset($_SESSION['usn_username']) && isset($_SESSION['usn_email']) && isset($_SESSION['usn_mobile'])){
    ?>
    <html>
    <head>
        <script async="" src="https://www.google-analytics.com/analytics.js"></script><script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-10701068-1', 'auto');
            ga('send', 'pageview');
            ga('send', 'event', 'error-page', 'open', 'error-40x');
        </script>

        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
        <meta name="HandheldFriendly" content="True">
        <title>Error 404 (Not Found) | USN</title>
        <style>html, body {
                font-family: sans-serif;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
                background-color: #F7F8FB;
                height: 100%;
                -webkit-font-smoothing: antialiased;
            }

            body {
                margin: 0;
                padding: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }

            .message {
                text-align: center;
                align-self: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0px 20px;
                max-width: 450px;
            }

            .message__title {
                font-size: 22px;
                font-weight: 100;
                margin-top: 15px;
                color: #47494E;
                margin-bottom: 8px;
            }

            p {
                -webkit-margin-after: 0px;
                -webkit-margin-before: 0px;
                font-size: 15px;
                color: #7F828B;
                line-height: 21px;
                margin-bottom: 4px;
            }

            .btn {
                text-decoration: none;
                padding: 8px 15px;
                border-radius: 4px;
                margin-top: 10px;
                font-size: 14px;
                color: #7F828B;
                border: 1px solid #7F828B;
            }

            .hk-logo, .app-icon {
                fill: #DBE1EC;
            }

            .info {
                fill: #9FABBC;
            }

            body.friendly {
                background: -webkit-linear-gradient(-45deg, #b80303 0%, #000 100%);
                background: linear-gradient(135deg, #b80303 0%, #000 100%);
            }

            body.friendly .message__title {
                color: #fff;
            }

            body.friendly p {
                color: rgba(255, 255, 255, 0.6);
            }

            body.friendly .hk-logo, body.friendly .app-icon {
                fill: rgba(255, 255, 255, 0.9);
            }

            body.friendly .info {
                fill: rgba(255, 255, 255, 0.9);
            }

            body.friendly .btn {
                color: #fff;
                border: 1px solid rgba(255, 255, 255, 0.9);
            }

            .info_area {
                position: fixed;
                right: 12px;
                bottom: 12px;
            }

            .logo {
                position: fixed;
                left: 12px;
                bottom: 12px;
            }
            #footer {
                display: none;
            }
        </style>
        <script id="omapi-script" src="https://a.optnmstr.com/app/js/api.min.js" async=""></script><script src="https://a.optmstr.com/app/js/legacy-api.min.js" async=""></script><script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" async=""></script></head>
    <body data-gr-c-s-loaded="true">
    <div class="spacer"></div>
    <div class="message">
        <div class="message__title">404. That’s an error.</div>
        <p>The requested URL was not found on this server.</p>
        <a href="../../../"><p>Go To Home</p></a>
    </div>









    <!-- Optin monster -->

    </body>
    </html>
    <?php
}else{
    header('location:../../../');
}
?>