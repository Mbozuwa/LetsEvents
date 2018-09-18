            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        <ul class="nav">
                            <li><a href="/" class=""><i class="lnr lnr-home"></i> <span>Thuispagina</span></a></li>
                        </ul>
                        @if (Auth::check())
                            <ul class="nav">
                                <li><a href="/profile/{{ Auth::user()->id }}" class=""><i class="lnr lnr-user"></i> <span>Profiel</span></a></li>
                        @endif
                                <li><a href="/events/index" class=""><i class="lnr lnr-menu"></i> <span>Events</span></a></li>
                            </ul>
                    </nav>
                </div>
            </div>
