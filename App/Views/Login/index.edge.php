<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restoran App</title>
    <link rel="stylesheet" href="{{ASSETS_URL}}css/style.default.css" type="text/css" />
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-migrate-1.1.1.min.js"></script>
</head>

<body class="loginbody">

<div class="loginwrapper">
    @if ($alert)
    <div class="alert alert-error">
        <strong>Dikkat!</strong> {{ $alert }}
    </div>
    @endif


    <div class="loginwrap zindex100 bounceInDown">
        <h1 class="logintitle"><span class="iconfa-lock"></span> Giriş Yapın <span class="subtitle">giriş yapın!</span></h1>
        <div class="loginwrapperinner">
            <form id="loginform" action="" method="post">
                <p class=" bounceIn"><input type="text" id="username" name="username" placeholder="Kullanıcı Adı" /></p>
                <p class=" bounceIn"><input type="password" id="password" name="password" placeholder="Şifre" /></p>
                <p class=" bounceIn"><button class="btn btn-default btn-block">Gönder</button></p>
            </form>
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow fadeInUp"></div>
</div><!--loginwrapper-->

</body>
</html>
