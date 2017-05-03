<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('Title') - Restoran App</title>
    <link rel="stylesheet" href="{{ASSETS_URL}}css/style.default.css" type="text/css" />
    <link rel="stylesheet" href="{{ASSETS_URL}}prettify/prettify.css" type="text/css" />
    <script type="text/javascript" src="{{ASSETS_URL}}prettify/prettify.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-migrate-1.1.1.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery-ui-1.9.2.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.flot.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.cookie.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/custom.js"></script>
    <script type="text/javascript" src="{{ASSETS_URL}}js/jquery.dataTables.min.js"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ASSETS_URL}}js/excanvas.min.js"></script><![endif]-->
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
                <li class="active"><a href="{{ADMIN_URL}}index/index"><span class="icon-align-justify"></span> Anasayfa</a></li>
                <li><a href="media.html"><span class="icon-picture"></span> Media</a></li>
                <li class="dropdown"><a href=""><span class="icon-briefcase"></span> UI Elements &amp; Widgets</a>
                    <ul>
                        <li><a href="elements.html">Theme Components</a></li>
                        <li><a href="bootstrap.html">Bootstrap Components</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href=""><span class="icon-th-list"></span> Tables</a>
                    <ul>
                        <li><a href="table-static.html">Static Table</a></li>
                        <li><a href="table-dynamic.html">Dynamic Table</a></li>
                    </ul>
                </li>
                <li><a href="typography.html"><span class="icon-font"></span> Typography</a></li>
                <li><a href="charts.html"><span class="icon-signal"></span> Graph &amp; Charts</a></li>
                <li><a href="messages.html"><span class="icon-envelope"></span> Messages</a></li>
                <li><a href="buttons.html"><span class="icon-hand-up"></span> Buttons &amp; Icons</a></li>
                <li class="dropdown"><a href=""><span class="icon-pencil"></span> Forms</a>
                    <ul>
                        <li><a href="forms.html">Form Styles</a></li>
                        <li><a href="wizards.html">Wizard Form</a></li>
                        <li><a href="wysiwyg.html">WYSIWYG</a></li>
                    </ul>
                </li>
                <li><a href="calendar.html"><span class="icon-calendar"></span> Calendar</a></li>
                <li><a href="animations.html"><span class="icon-play"></span> Animations</a></li>
                <li class="dropdown"><a href=""><span class="icon-book"></span> Other Pages</a>
                    <ul>
                        <li><a href="404.html">404 Error Page</a></li>
                        <li><a href="invoice.html">Invoice Page</a></li>
                        <li><a href="editprofile.html">Edit Profile</a></li>
                        <li><a href="grid.html">Grid Styles</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="stickyheader.html">Sticky Header Page</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="rightpanel">
        <div class="headerpanel">
            <a href="" class="showmenu"></a>

            <div class="headerright">
                <div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi, ThemePixels! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="editprofile.html"><span class="icon-edit"></span> Edit Profile</a></li>
                        <li><a href=""><span class="icon-wrench"></span> Account Settings</a></li>
                        <li><a href=""><span class="icon-eye-open"></span> Privacy Settings</a></li>
                        <li class="divider"></li>
                        <li><a href="index.html"><span class="icon-off"></span> Sign Out</a></li>
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
