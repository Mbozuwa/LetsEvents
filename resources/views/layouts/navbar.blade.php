            <div id="sidebar-nav" class="sidebar">
                <div class="sidebar-scroll">
                    <nav>
                        @if (Auth::check())
                            <ul class="nav">
                                <li><a href="/profile/{{Auth::user()->id}}" class=""><i class="lnr lnr-user"></i> <span>Profile</span></a></li>
                            </ul>
                        @endif
                        <ul class="nav">
                            <li><a href="/" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>