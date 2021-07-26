@extends('_layouts.master')

@php
    $page->type = 'article';
@endphp

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="max-w-lg mx-auto mb-2">
    @endif

    <h1 class="mb-2 leading-none">{{ $page->title }}</h1>

    <p class="text-xl text-gray-700 md:mt-0">{{ $page->author }}  •  {{ date('F j, Y', $page->date) }}</p>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-flex items-center px-3 pt-2 pb-1 mr-4 text-xs font-semibold leading-none tracking-wide text-green-800 uppercase bg-gray-300 rounded hover:bg-green-200"
            >{{ $category }}</a>
        @endforeach
    @endif

    <div class="pb-4 mb-10 border-b border-green-200" v-pre>
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
