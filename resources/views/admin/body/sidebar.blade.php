<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Home Slider Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('home.slider')}} ">Home Slide</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>About Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('about.page')}} ">About Page</a></li>
                        <li><a href=" {{ route('about.multi.image')}} ">About Multi Image</a></li>
                        <li><a href=" {{ route('all.multi.image')}} ">All Multi Image</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Portfolio Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('all.portifolio')}} ">All Portfilio </a></li>

                        <li><a href=" {{ route('add.portifolio')}}" >Add Portfilio </a></li>

                    </ul>
                </li>
                <li class="menu-title">Pages</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('all.blog.category') }} ">All Blog Category</a></li>

                        <li><a href=" {{ route('add.blog.category') }} ">Add Blog Category</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Blog Page</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('all.blog') }} ">All Blogs </a></li>

                        <li><a href=" {{ route('add.blog') }} ">Add Blogs </a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-mail-send-line"></i>
                        <span>Footer Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href=" {{ route('footer.setup') }} ">Footer Setup </a></li>

                    </ul>
                </li>






            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
