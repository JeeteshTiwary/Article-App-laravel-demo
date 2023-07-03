<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $page = str_replace(url('/'), '', Request::url());
                        echo $page;
                    @endphp

                    @switch($page)
                        @case('/dashboard')
                            @if (Session::has('msg'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('msg') }}
                                </div>
                            @endif
                            <center>
                                <h3>Welcome to the Dashboard</h3>
                            </center>
                        @break

                        @case('/article')
                            <center>
                                <h3>Welcome to the Articles Page</h3>
                            </center>
                        @break

                        @case('/article/create')
                            <center>
                                <h3>Welcome to the Create Article Page</h3>
                            </center>
                        @break

                        @case('/article/{article}')
                            <center>
                                <h3>Welcome to the Show Article Page</h3>
                            </center>
                        @break

                        @default
                            <center>
                                <h3>Invalid Page</h3>
                            </center>
                    @endswitch
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
