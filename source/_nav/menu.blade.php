<nav class="items-center justify-end hidden text-lg lg:flex">
    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 {{ $page->isActive('/blog') ? 'active text-green-600' : 'text-green-700' }} hover:text-green-600">
        Blog
    </a>

    <a title="{{ $page->siteName }} About" href="/about"
        class="ml-6 {{ $page->isActive('/about') ? 'active text-green-600' : 'text-green-700' }} hover:text-green-600">
        About
    </a>
{{-- 
    <a title="{{ $page->siteName }} Contact" href="/contact"
        class="ml-6 {{ $page->isActive('/contact') ? 'active text-green-600' : 'text-green-700' }} hover:text-green-600">
        Contact
    </a> --}}
</nav>
