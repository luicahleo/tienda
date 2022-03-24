
<style>
    #navigation-menu{
        height: calc(100vh - 4rem);
    }
</style>


{{-- sticky top-0  esto es para que el menu se quede pegado en la parte de arriba y al hacer scroll no baje con nostros--}}
<header class="bg-trueGray-700 sticky top-0  ">
    <div class="container flex items-center h-16 ">
        <a href=""
            class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>
        {{-- no olvidarme, para usar componentes jetstream, tengo que publicarlos con php artisan vendor:publish --tag=jetstream-views --}}
        {{-- los componentes ahora estana en, resources/views/vendor\jetstream --}}

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />

        </a>

        @livewire('search')

        <!-- Settings Dropdown -->
        <div class="mx-6 relative ">
            {{-- solo vamos a mostrar la imagen si es que estamos logueados --}}
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
            <x-jet-dropdown align="right" width="48">

                <x-slot name="trigger">
                    <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                </x-slot>

                <x-slot name="content">
                    
                    <x-jet-dropdown-link href="{{ route('login') }}">
                        {{ __('Login') }}
                    </x-jet-dropdown-link>

                    <x-jet-dropdown-link href="{{ route('register') }}">
                        {{ __('Register') }}
                    </x-jet-dropdown-link>
                </x-slot>
            
            </x-jet-dropdown>
            @endauth
        </div>

        @livewire('dropdown-cart')

    </div>

    <nav id="navigation-menu" class="bg-trueGray-700 bg-opacity-25 w-full absolute">

        <div class="container h-full">
            <div class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    @foreach ($categories as $category)
                    <li class="text-trueGray-500 hover:bg-orange-500 hover:text-white">
                        <a href="" class="py-2 px-4 text-sm flex items-center">
                            <span class="flex justify-center w-9">
                                {{-- {!! xxxx !!} con  esto escapamos el codigo html, es decir para que nos imprima el codigo html y no lo imprima como texto plano --}}
                                {!!$category->icon!!}
                            </span>
                            {{$category->name}}
                        </a>

                        <div class=" bg-red-500 absolute w-3/4 h-full top-0 right-0">

                        </div>
                    </li>
                        
                    @endforeach

                </ul>
                <div class="col-span-3 bg-gray-100">

                </div>

            </div>

        </div>
    </nav>
</header>
