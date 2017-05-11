<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('Title') - Restoran App</title>
    <link rel="stylesheet" href="{{ASSETS_URL}}css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="{{ASSETS_URL}}prettify/prettify.css" type="text/css" />
    <script type="text/javascript" src="{{ASSETS_URL}}prettify/prettify.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-1.9.1.min.js"></script>
    <script src="{{ASSETS_URL}}Uploads/jquery.fileuploader.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.flot.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.cookie.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/custom.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.dataTables.min.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ASSETS_URL}}js/excanvas.min.js"></script><![endif]-->


    <link href="{{ASSETS_URL}}Uploads/jquery.fileuploader.css" media="all" rel="stylesheet">
</head>

<body>

<div class="mainwrapper">
    <div class="leftpanel">

        <div class="logopanel">
            <h1><a href="dashboard.html">Restoran App <span>v0.0.1</span></a></h1>
        </div>

        <div class="datewidget">Cumhuriyet Üniversitesi</div>

        <div class="searchwidget">
            <form action="results.html" method="post" style="opacity:0">
                <div class="input-append">
                    <input type="text" style="display:none" disabled class="span2 search-query" placeholder="Search here...">
                    <button type="submit" disabled class="btn"><span class="icon-search"></span></button>
                </div>
            </form>
        </div>

        <div class="leftmenu">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-header">Ana Menü</li>
                <li class="active"><a href="{{ADMIN_URL}}orders"><span class="icon-align-justify"></span> Siparişler</a></li>

                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> Kategoriler</a>
                    <ul>
                        <li><a href="{{ADMIN_URL}}categories/add">Kategori Ekle</a></li>
                        <li><a href="{{ADMIN_URL}}categories">Kategoriler</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-th-list"></span> Ürünler</a>
                    <ul>
                        <li><a href="{{ADMIN_URL}}products/add">Ürün Ekle</a></li>
                        <li><a href="{{ADMIN_URL}}products">Ürünler</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href=""><span class="iconsweets-table"></span> Masalar</a>
                    <ul>
                        <li><a href="{{ADMIN_URL}}desks/add">Masa Ekle</a></li>
                        <li><a href="{{ADMIN_URL}}desks">Masalar</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a href=""><span class="icon-user"></span> Kullanıcılar</a>
                    <ul>
                        <li><a href="{{ADMIN_URL}}users/add">Kullanıcı Ekle</a></li>
                        <li><a href="{{ADMIN_URL}}users">Kullanıcılar</a></li>
                    </ul>
                </li>

                <li><a href="{{ADMIN_URL}}login/logout"><span class="icon-remove"></span> Çıkış</a></li>

            </ul>
        </div>
    </div>

    <div class="rightpanel">
        <div class="headerpanel">
            <a href="" class="showmenu"></a>

            <div class="headerright">
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="">Merhaba, Admin! <b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="divider"></li>
                        <li><a href="{{ADMIN_URL}}login/logout"><span class="icon-off"></span> Çıkış Yap</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="breadcrumbwidget">

        </div>
        <div class="pagetitle">
            <h1>@yield('Title')</h1>
        </div>

        <div class="maincontent">
            <div class="contentinner content-dashboard">
                @section('Body')
                    404 Error
                @show
            </div>
        </div>

    </div>

    <div class="clearfix"></div>

    <div class="footer">
        <div class="footerleft">Restoran App v0.0.1</div>
        <div class="footerright"></div>
    </div>
</div>

<script>
    $(function(){
        jQuery('#dyntable').dataTable({
            "sPaginationType": "full_numbers",
            "aaSortingFixed": [[0,'asc']],
            "fnDrawCallback": function(oSettings) {
                jQuery.uniform.update();
            }
        });
    });
</script>

</body>
</html>
