<nav class="top-menu">
    <a
        href="{{ route('homepage') }}"
        class="top-menu__item{{ $current_menu_item === 'homepage' ? ' top-menu__item--highlighted' : '' }}"
    >
        Home
    </a>
    <a
        href="{{ route('about-us') }}"
        class="top-menu__item{{ $current_menu_item === 'about-us' ? ' top-menu__item--highlighted' : '' }}"
    >
        About
    </a>

    @guest
        <a
            href="{{ route('login') }}"
            class="top-menu__item top-menu__item--pull-right{{ $current_menu_item === 'login' ? ' top-menu__item--highlighted' : '' }}"
        >
            Log in
        </a>
        <a
            href="{{ route('register') }}"
            class="top-menu__item{{ $current_menu_item === 'register' ? ' top-menu__item--highlighted' : '' }}"
        >
            Register
        </a>
    @endguest

    @auth

        <span class="top-menu__item top-menu__item--pull-right">
            Logged in as {{ auth()->user()->name }} &nbsp;

            <form action="{{ route('logout') }}" method="post">

                @csrf

                <button>Logout</button>

            </form>
        </span>
    @endauth
</nav>