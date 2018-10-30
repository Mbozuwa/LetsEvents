            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li><a href="/" class=""><i class="lnr lnr-home"></i> <span>{{ __('msg.nav.home') }}</span></a></li>
                        @if (Auth::check())
                                <li><a href="/profile/{{ Auth::user()->id }}" class=""><i class="lnr lnr-user"></i> <span>{{ __('msg.nav.profile') }}</span></a></li>
                        @endif
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-list"></i> <span>{{ __('msg.nav.events') }}</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/events/index" class="active">{{ __('msg.nav.overview') }}</a></li>
                                        @foreach ($categories as $category)
                                        <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        @if (Auth::check())
                        <ul class="nav">
                            <li><a href="/events/user" class=""><i class="fas fa-basketball-ball"></i> <span>{{ __('msg.nav.myEvents') }}</span></a></li>
                        @if ( Auth::user()->role_id == 2)
                            <li><a href="/admin" class=""><i class="fas fa-toolbox""></i> <span>{{ __('msg.nav.admin') }}</span></a></li>
                        @endif
                        @endif
                        </ul>
                    </nav>
                </div>
            </div>
