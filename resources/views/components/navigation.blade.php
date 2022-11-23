<header class="relative">
    <div class=" ">
        <div class="sm:hidden">
            <a href="#" onclick="toggleMenuSideBar(event)">
                <img class="m-2 h-3 w-auto" src="{{asset('storage/img/menu_91084.png')}}" alt="">
            </a>
        </div>
        <div class="hidden sm:flex sm:justify-start items-center justify-between font-medium text-gray-100">
            <div class="hidden items-center justify-start sm:flex sm:flex-1 text-xl">
                <a href="{{ route('home') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb px-1">Home</a>
                <a href="{{ route('questionUser.list') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb ml-2 px-1">Helper</a>
            </div>

            <div class="hidden items-center justify-end sm:flex sm:flex-1 text-xl">
                @auth
                    <a href="{{ route('users.logout') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb mr-2 px-1">Logout</a>
                    @if (Auth::user()->id == 1)
                        <a href="{{ route('users.list') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb px-1">Users</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb mr-2 px-1">Login</a>
                    <a href="{{ route('users.create') }}" onclick="opsMenuWebSelected(event)" class="opsMenuWeb mr-2 px-1">Register</a>
                @endauth
            </div>
        </div>
    </div>
</header>

<menu onclick="toggleMenuSideBar(event)">
    <ul>
        <li><a href="{{ route('home') }}" class="align-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
            </svg>
            Home
            </a>
        </li>
        <li><a href="{{ route('questionUser.list') }}" class="align-bottom">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                <path fill-rule="evenodd" d="M13.2 2.24a.75.75 0 00.04 1.06l2.1 1.95H6.75a.75.75 0 000 1.5h8.59l-2.1 1.95a.75.75 0 101.02 1.1l3.5-3.25a.75.75 0 000-1.1l-3.5-3.25a.75.75 0 00-1.06.04zm-6.4 8a.75.75 0 00-1.06-.04l-3.5 3.25a.75.75 0 000 1.1l3.5 3.25a.75.75 0 101.02-1.1l-2.1-1.95h8.59a.75.75 0 000-1.5H4.66l2.1-1.95a.75.75 0 00.04-1.06z" clip-rule="evenodd" />
            </svg>
            Helper
            </a>
        </li>
        @guest
            <li><a href="{{ route('login') }}" class="align-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                    <path fill-rule="evenodd" d="M10 2a.75.75 0 01.75.75v7.5a.75.75 0 01-1.5 0v-7.5A.75.75 0 0110 2zM5.404 4.343a.75.75 0 010 1.06 6.5 6.5 0 109.192 0 .75.75 0 111.06-1.06 8 8 0 11-11.313 0 .75.75 0 011.06 0z" clip-rule="evenodd" />
                </svg>
                Login
                </a>
            </li>
            <li><a href="{{ route('users.create') }}" class="align-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                    <path d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                </svg>
                Register
                </a>
            </li>
        @else
            <li><a href="{{ route('users.logout') }}" class="align-bottom">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                    <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z" clip-rule="evenodd" />
                </svg>
                Logout
                </a>
            </li>
            @if (Auth::user()->id == 1)
                <li><a href="{{ route('users.list') }}" class="align-bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 inline-block text-amber-500">
                        <path d="M7 8a3 3 0 100-6 3 3 0 000 6zM14.5 9a2.5 2.5 0 100-5 2.5 2.5 0 000 5zM1.615 16.428a1.224 1.224 0 01-.569-1.175 6.002 6.002 0 0111.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 017 18a9.953 9.953 0 01-5.385-1.572zM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 00-1.588-3.755 4.502 4.502 0 015.874 2.636.818.818 0 01-.36.98A7.465 7.465 0 0114.5 16z" />
                    </svg>
                    Lista de Usuarios
                    </a>
                </li>
            @endif
        @endguest
    </ul>
</menu>

