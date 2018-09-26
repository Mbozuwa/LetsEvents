            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li><a href="/" class=""><i class="lnr lnr-home"></i> <span>Startpagina</span></a></li>
                        @if (Auth::check())
                                <li><a href="/profile/{{ Auth::user()->id }}" class=""><i class="lnr lnr-user"></i> <span>Profiel</span></a></li>
                        @endif
                            <li>
                                <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-list"></i> <span>Evenementen</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                                <div id="subPages" class="collapse ">
                                    <ul class="nav">
                                        <li><a href="/events/index" class="active">Overzicht</a></li>
                                        @foreach ($categories as $category)
                                        <li><a href="/categories/{{ $category->id }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>
                        </ul>
                        @if (Auth::check())
                        <ul class="nav">
                            <li><a href="/events/user" class=""><i class="fas fa-basketball-ball"></i> <span>Mijn evenementen</span></a></li>
                        @endif
                        </ul>
                    </nav>
                </div>
            </div>
