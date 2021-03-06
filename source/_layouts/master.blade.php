<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Khula:300,300i,400,400i,600,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-green-100">
        <header class="flex items-center h-24 py-4" role="banner">
            <div class="container flex items-center max-w-6xl px-4 mx-auto lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        {{-- <img class="h-8 mr-3 md:h-10" src="/assets/img/logo.svg" alt="{{ $page->siteName }} logo" /> --}}
                        <div class="flex items-baseline justify-center w-12 h-12 p-0.5 text-4xl font-bold text-red-500 bg-green-400 rounded">b</div>

                        {{-- <h1 class="my-0 text-lg font-semibold text-red-500 uppercase md:text-2xl hover:text-red-600">{{ $page->siteName }}</h1> --}}
                    </a>
                </div>

                <div id="vue-search" class="flex items-center justify-end flex-1">
                    <search></search>

                    @include('_nav.menu')

                    @include('_nav.menu-toggle')
                </div>
            </div>
        </header>

        @include('_nav.menu-responsive')

        <main role="main" class="container flex-auto w-full max-w-4xl px-6 py-16 mx-auto">
            @yield('body')
        </main>

        <footer class="py-4 mt-12 text-sm text-center" role="contentinfo">
            <ul class="flex flex-col justify-center list-none md:flex-row">
                <li>
                    &copy; <a href="https://blogh.bergh.tech" title="Bergh Tech website">Jaco van den Bergh</a> {{ date('Y') }}
                </li>
                <li class="hidden px-2 md:inline">???</li>
                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>
                </li>
            </ul>
        </footer>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')
    </body>
</html>
