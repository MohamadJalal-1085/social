<nav x-data="{ open: false }" class="bg-gray-800 border-bborder-gray-700">
    <x-slot name="content">
                        <x-dropdown-link :href="route('settings.edit')">
                            {{ __('Settings') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
    <div class="mt-3 space-y-1">
                

                <form method="POST" action="{{ route('logout') }}">
    </nav>