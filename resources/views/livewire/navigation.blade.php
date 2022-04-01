{{-- sticky top-0  esto es para que el menu se quede pegado en la parte de arriba y al hacer scroll no baje con nostros --}}
{{-- voy a usar Alpine porque ya viene instalado con jetstream, y cuando uso x-data, alpine considera que solo trabajara 
    en esa parte usandolo como componente, pudiendo asi usar las variables en otro lugar donde defina x-data --}}
<header class="sticky top-0 bg-trueGray-700" x-data="dropdown()">
    <div class="container flex items-center h-16 ">
        {{-- icono que contiene la palabra categorias --}}
        <a x-on:click="show()"
            class="flex flex-col items-center justify-center h-full px-4 font-semibold text-white bg-white bg-opacity-25 cursor-pointer">
            <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>
        {{-- no olvidarme, para usar componentes jetstream, tengo que publicarlos con php artisan vendor:publish --tag=jetstream-views --}}
        {{-- los componentes ahora estana en, resources/views/vendor\jetstream --}}

        <a href="/" class="mx-6">
            <x-jet-application-mark class="block w-auto h-9" />

        </a>

        @livewire('search')

        <!-- Settings Dropdown -->
        <div class="relative mx-6 ">
            {{-- solo vamos a mostrar la imagen si es que estamos logueados --}}
            @auth
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                            <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}"
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
                        <i class="text-3xl text-white cursor-pointer fas fa-user-circle"></i>
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
    {{-- la parte de :class..... es para que tome el valor de la variable open, porque no se abria el menu al poner la clase hidden --}}
    <nav id="navigation-menu" 
        x-on:click="show()"


        :class="{'block': open, 'hidden': !open}"
        class="absolute w-full bg-opacity-25 bg-trueGray-700">

        <div class="container h-full">
            
            {{-- el evento x-on-click.away es para ejecutar la accion cuando das click en cualquier parte menos en la del menu --}}
            <div x-on:click.away="close()" class="relative grid h-full grid-cols-4" >
                <ul class="bg-white">
                    @foreach ($categories as $category)
                        <li class=" navigation-link text-trueGray-500 hover:bg-orange-500 hover:text-white">
                            <a href="" class="flex items-center px-4 py-2 text-sm">
                                <span class="flex justify-center w-9">
                                    {{-- {!! xxxx !!} con  esto escapamos el codigo html, es decir para que nos imprima el codigo html y no lo imprima como texto plano --}}
                                    {!! $category->icon !!}
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="absolute top-0 right-0 hidden w-3/4 h-full bg-gray-100 navigation-submenu">
                                {{-- llamamos al componente para mostrar category --}}
                                <x-navigation-subcategories :category="$category" />

                            </div>
                        </li>
                    @endforeach

                </ul>
                <div class="col-span-3 bg-gray-100">

                    {{-- llamamos al componente para mostrar subcategorias --}}
                    {{-- para pasar un objeto al componente usamos :    osea :category="el objeto" --}}
                    <x-navigation-subcategories :category="$categories->first()" />

                </div>

            </div>
    </nav>
</header>

