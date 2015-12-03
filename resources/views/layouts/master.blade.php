<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>我的菜市場 Bazaars</title>
    <meta name="keywords" content="我的菜市場, bazaars, 宜蘭"/>
    <meta name="description" content="Bazaars" />
    <meta charset="utf-8">
    @yield('meta')

    @yield('css')

    <script src="{{ URL::asset('js/vendor.js') }}"></script>
    <script src="{{ URL::asset('_js_2/_conn.js') }}"></script>
    @yield('js')
</head>
<body>
    <div id="mainFrame" class="themes">
    <header>
        <div id="headerFrame">
        @yield('header')
        </div>
    </header>

    <nav>
        @yield('nav')
    </nav>

    <section>
        <div id="centerFrame">
        @yield('content')
        </div>
    </section>

    <footer>
        <div id="footerFrame" class="project-style hidden-xs">
            <p class="system-msg"></p>
            <p id="copyright" title="Copyright © 2015 All Rights Reserved">Copyright © 2015 All Rights Reserved</p>
        </div>
    </footer>
    </div>

    @yield('body_js')
</body>
</html>
