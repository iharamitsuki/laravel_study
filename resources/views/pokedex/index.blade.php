<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <section class="text-gray-600 body-font">
                <div class="container px-24 py-10 mx-auto bg-gray-700 mt">
                    <div class="p-4 mb-4 h-20 border-8 border-double">
                        <h2 class="mb-10 text-2xl text-green-600 flex justify-center">ポケモン図鑑</h2>
                        {{-- <form method="get" action="{{ route('pokemon') }}">
                            <input type="text" name="seach" placeholder="検索">
                            <button>検索する</button>
                        </form> --}}
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @php  $i = 0; @endphp
                        @foreach ($pokeinfos as $poke)
                            @if ($i < 151)
                                <div class="xl:w-1/6 md:w-1/6 p-1">
                                    <h3 class="tracking-widest text-green-500 text-xs font-medium title-font">No.{{ $poke['p_id'] }} {{ $poke['en_name'] }}</h3>
                                    <div class="flex justify-center bg-gray-200 p-6 rounded-md">
                                        <img class="object-cover h-35" src="{{ $poke['front_default'] }}" alt="content">
                                    </div>
                                </div>
                            @endif
                        @php $i++; @endphp
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>

