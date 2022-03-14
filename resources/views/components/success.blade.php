<div class="bg-theme text-white mt-[56px] py-10 px-4 md:mt-[72px] md:px-20 lg:px-0">
    <div class="mx-auto max-w-4xl">
        <h2 class="font-title text-3xl font-bold md:text-4xl">{{ __('success.title') }}</h2>
        <p class="font-medium">{{ __('success.explanations') }}</p>
        <p class="mt-3 mb-4">{{ __('success.please_share') }}</p>
        <div class="flex flex-row justify-center space-x-8">
            <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_FB') }}" target="_blank"
               title="{{ __('socials.facebook') }}"
            >
                <x-icons.facebook class="h-7 w-7"></x-icons.facebook>
            </a> <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_TW') }}"
                    target="_blank"
                    title="{{ __('socials.twitter') }}"
            >
                <x-icons.twitter class="h-7 w-7"></x-icons.twitter>
            </a> <a class="transition motion-safe:hover:scale-125" href="{{ env('LINK_POST_INSTA') }}"
                    target="_blank" title="{{ __('socials.instagram') }}"
            >
                <x-icons.instagram class="h-7 w-7"></x-icons.instagram>
            </a>
        </div>
    </div>
</div>
