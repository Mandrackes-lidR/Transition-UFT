<nav
    class="bg-white dark:bg-dark
    text-theme dark:text-white
    z-50 shadow-md
    fixed top-0 right-0 left-0
    flex flex-wrap items-center justify-between md:flex-row md:flex-nowrap md:justify-start
    min-h-[56px] md:min-h-[64px] lg:min-h-[72px]
    py-0 px-2 md:px-4 md:py-1 lg:py-2"
    id="nav"
>
    <a class="font-title font-bold tracking-wider text-xl sm:text-2xl md:text-3xl lg:text-4xl dark:text-theme-light transition filter hover:drop-shadow transform focus:outline-none motion-safe:focus:scale-110"
       href="{{ route('home') }}"
    > {{ config('app.name') }}
        {{--<x-icons.logo class="h-7 sm:h-9 lg:h-11"/>--}}
    </a>

    <div class="font-medium flex items-center space-x-4 ml-auto sm:space-x-6 md:space-x-9">
        {{--Manifesto--}}
        <a class="{{ Route::is('home') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-gray-300 focus:outline-none focus:underline"
           href="{{ route('home') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
                />
            </svg>
            <p class="hidden md:block">{{ __('header.manifesto') }}</p>
        </a>
        {{--Signatures--}}
        <a class="{{ Route::is('signatures') ? 'text-theme-dark dark:text-theme-light md:text-theme md:dark:text-white md:font-bold' : '' }}
            flex space-x-1 transition hover:text-theme-dark dark:hover:text-gray-300 focus:outline-none focus:underline"
           href="{{ route('signatures') }}"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 h-5 w-5" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor"
            >
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                />
            </svg>
            <p class="hidden md:block">{{ __('header.signatures') }}</p>
        </a>
        {{--Sign--}}
        <a
            class="flex space-x-1 btn text-sm rounded-full border-theme dark:border-white bg-theme dark:bg-white text-white dark:text-gray-800 hover:bg-white dark:hover:bg-dark hover:text-theme dark:hover:text-white focus:ring-theme dark:focus:ring-white focus:ring-offset-white dark:focus:ring-offset-dark md:h-auto md:px-4 lg:text-base"
            @if(Route::is('home'))
                onclick="scrollToForm()" href="javascript:void(0)"
            @else
                href="{{ route('home') }}#form"
            @endif
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"/>
                <path fill-rule="evenodd"
                      d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                      clip-rule="evenodd"
                />
            </svg>
            <p class="hidden sm:block">{{ __('form.submit') }}</p>
        </a>
    </div>
</nav>
