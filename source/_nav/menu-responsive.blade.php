<nav id="js-nav-menu" class="hidden w-auto px-2 pt-6 pb-2 bg-gray-200 shadow lg:hidden">
    <ul class="my-0">
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Blog"
                href="/blog"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/blog') ? 'active text-green-500' : 'text-green-600 hover:text-green-500' }}"
            >Blog</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} About"
                href="/about"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/about') ? 'active text-green-500' : 'text-green-600 hover:text-green-500' }}"
            >About</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Contact"
                href="/contact"
                class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/contact') ? 'active text-green-500' : 'text-green-600 hover:text-green-500' }}"
            >Contact</a>
        </li>
    </ul>
</nav>
