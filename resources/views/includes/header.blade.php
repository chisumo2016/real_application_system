<header class="header" id="site-header">
    <div class="container">
        <div class="header-content-wrapper">
            <div class="logo">
                <div class="logo-text">
                    <div class="logo-title">{{ $setting->site_name }}</div>
                </div>
            </div>

           @include('includes.nav')

            <ul class="nav-add">
                <li class="search search_main" style="color: black; margin-top: 5px;">
                    <a href="#" class="js-open-search">
                        <i class="seoicon-loupe"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>