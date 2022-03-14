<footer class="w-full bg-theme-dark text-white text-sm py-10 px-4 md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <div
            class="flex flex-col-reverse items-center space-y-4 space-y-reverse sm:flex-row sm:justify-between sm:space-y-0"
        >
            <div>
                <p>© {{ date('Y') }} - {{ env('OUR_NAME') }}</p>
            </div>
        </div>
        <div class="my-8">
            <div class="flex flex-col space-y-6 md:flex-row md:justify-between md:space-y-0">
                <div class="flex flex-row justify-center space-x-8">
                    <a class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                       href="{{ env('LINK_FACEBOOK') }}"
                       target="_blank" title="Facebook"
                    >
                        <x-icons.facebook class="h-6 w-6"></x-icons.facebook>
                    </a> <a
                        class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ env('LINK_TWITTER') }}" target="_blank" title="Twitter"
                    >
                        <x-icons.twitter class="h-6 w-6"></x-icons.twitter>
                    </a> <a
                        class="transition motion-safe:hover:scale-125 focus:outline-none motion-safe:focus:scale-125"
                        href="{{ env('LINK_INSTAGRAM') }}" target="_blank" title="Instagram"
                    >
                        <x-icons.instagram class="h-6 w-6"></x-icons.instagram>
                    </a>
                </div>
                <div class="md:text-right">
                    <p>
                        <a class="font-semibold hover:text-gray-200 focus:outline-none focus:underline"
                           href="{{ asset('files/Sources.pdf') }}" target="_blank"
                        >{{ __('footer.sources') }}</a>
                    </p>
                </div>
            </div>
            <div class="flex flex-col mt-4 space-y-4 md:flex-row md:justify-between md:space-y-0">
                <address>
                    <a class="font-semibold not-italic hover:text-gray-200 focus:outline-none focus:underline"
                       href="mailto:{{ env('MAIL_REPLY_TO_ADDRESS') }}"
                    >{{ env('MAIL_REPLY_TO_ADDRESS') }}</a>
                </address>
                <div class="md:text-right">
                    <a class="font-semibold hover:text-gray-200 focus:outline-none focus:underline"
                       href="{{ env('LINK_PRIVACY') }}" target="_blank"
                    >{{ __('footer.privacy') }}</a>
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-4 mt-6 md:flex-row-reverse md:justify-between md:items-center md:space-y-0">
            <nav class="mx-auto md:mx-0">
                <a class="btn text-sm uppercase bg-theme hover:bg-theme-dark text-theme-dark hover:text-theme hover:border-theme focus:ring-theme focus:ring-offset-theme-dark flex items-center space-x-2"
                   onclick="toggleDarkMode()" href="javascript:void(0)"
                   aria-label="{{ __('footer.switch_mode.title') }}"
                >
                    <p>{{ __('footer.switch_mode.text') }}</p>
                    <svg id="dark" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                         fill="currentColor"
                    >
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"/>
                    </svg>
                    <svg id="light" xmlns="http://www.w3.org/2000/svg" class="hidden h-5 w-5" viewBox="0 0 20 20"
                         fill="currentColor"
                    >
                        <path fill-rule="evenodd"
                              d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                              clip-rule="evenodd"
                        />
                    </svg>
                </a>
            </nav>
            <div class="flex justify-center space-x-2 uppercase text-theme text-sm">
                <p>
                    {{ __('footer.signature.who') }}
                    <a class="font-semibold hover:animate-pulse focus:outline-none focus:underline" target="_blank"
                       href="{{ env('APP_AUTHOR_URL') }}"
                    >{{ env('APP_AUTHOR') }}</a>
                    {{ __('footer.signature.what') }}
                </p>
                <a class="transition hover:animate-pulse focus:outline-none motion-safe:focus:scale-125"
                   href="https://tailwindcss.com" target="_blank" title="TailwindCSS"
                >
                    <svg class="h-5 w-5" viewBox="0 0 30 18" fill="currentColor">
                        <path
                            d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0zM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9z"
                        ></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>
