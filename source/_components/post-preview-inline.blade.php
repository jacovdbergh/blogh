<div class="flex flex-col mb-4">
    <p class="my-2 font-medium text-gray-700">
        {{ $post->getDate()->format('F j, Y') }}
    </p>

    <h2 class="mt-0 text-3xl">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="font-bold text-red-500 hover:text-red-600"
        >{{ $post->title }}</a>
    </h2>

    <p class="mt-0 mb-4">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="mb-2 font-semibold tracking-wide uppercase"
    >Read</a>
</div>
