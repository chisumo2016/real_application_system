<nav id="primary-menu" class="primary-menu">
    <a href='javascript:void(0)' id="menu-icon-trigger" class="menu-icon-trigger showhide">
                            <span id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                                <svg width="1000px" height="1000px">
                                    <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                                    <path id="pathE" d="M 300 500 L 700 500"></path>
                                    <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                                </svg>
                            </span>
    </a>
    <ul class="primary-menu-menu" style="overflow: hidden;">
        @foreach($categories as $category)
            <li class="">
                <a href="{{ route('category.single',['id'=>$category->id]) }}">{{ $category->name }}</a>
            </li>
        @endforeach




        {{--<li class="">--}}
            {{--<a href="">VIDEOS</a>--}}
        {{--</li>--}}
        {{--<li class="">--}}
            {{--<a href="">DISCUSSIONS</a>--}}
        {{--</li>--}}
        {{--<li class="">--}}
            {{--<a href="">TUTORIALS</a>--}}
        {{--</li>--}}
        {{--<li class="">--}}
            {{--<a href="">NEWSLETTER</a>--}}
        {{--</li>--}}
    </ul>
</nav>

