<form class="text-theme-dark dark:text-white grid grid-cols-1 gap-6 md:grid-cols-2 mt-10"
      method="POST" action="{{ route('sign') }}"
>
    @csrf
    <div>
        <label class="text-sm font-medium" for="first-name">{!! __('form.first_name.label') !!}<span
                class="text-accent"
            >*</span></label>
        <div class="mt-1">
            <input class="caret-theme @error('first_name') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="text" name="first_name" id="first-name" placeholder="{{ __('form.first_name.placeholder') }}"
                   value="{{ old('first_name') }}"
            >
            @error('first_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div>
        <label class="text-sm font-medium" for="last-name">{!! __('form.last_name.label') !!}<span class="text-accent"
            >*</span></label>
        <div class="mt-1">
            <input class="caret-theme @error('last_name') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="text" name="last_name" id="last-name" placeholder="{{ __('form.last_name.placeholder') }}"
                   value="{{ old('last_name') }}"
            >
            @error('last_name')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="md:col-span-2">
        <label class="text-sm font-medium" for="email">{!! __('form.email.label') !!}<span class="text-accent">*</span></label>
        <div class="mt-1">
            <input class="caret-theme @error('email') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                   type="email" name="email" id="email" placeholder="{{ __('form.email.placeholder') }}"
                   value="{{ old('email') }}"
            >
            @error('email')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div>
        <label class="text-sm font-medium" for="institution">{!! __('form.institution.label') !!}<span
                class="text-accent"
            >*</span></label>
        <div class="mt-1">
            <select
                class="caret-theme @error('institution_id') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                type="text" name="institution_id" id="institution"
            >
                <option value="" class="text-gray-500">{{ __('form.institution.placeholder') }}</option>
                @forelse($institutions as $institution)
                    <option value="{{ $institution->id }}"
                            @if(old('institution_id') == $institution->id) selected @endif
                    >{{ $institution->name }}</option>
                @empty
                    <option value="">...</option>
                @endforelse
            </select>
            @error('institution_id')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div>
        <label class="text-sm font-medium" for="category">{!! __('form.category.label') !!}<span class="text-accent"
            >*</span></label>
        <div class="mt-1">
            <select class="caret-theme @error('category') border-red-600 focus:border-red-500 caret-red-500 @enderror"
                    type="text" name="category" id="category"
            >
                <option value="" class="text-gray-500">{{ __('form.category.placeholder') }}</option>
                @forelse($categories as $category)
                    <option value="{{ $category->value }}" @if(old('category') == $category->value) selected @endif
                    >{{ __($category->name) }}</option>
                @empty
                    <option value="">...</option>
                @endforelse
            </select>
            @error('category')
            <div class="text-xs text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="md:col-span-2">
        <div class="flex items-start">
            <input class="mt-1 @error('register') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                   type="checkbox" id="register-checkbox" name="register"
            > <label class="text-sm text-justify block ml-2 mt-[1px]" for="register-checkbox"
            ><span class="text-accent">*</span>{!! __('form.accept') !!}</label>
        </div>
        @error('register')
        <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:col-span-2">
        <div class="flex items-start">
            <input class="mt-1 @error('contactable') border-red-600 focus:border-red-500 focus:ring-red-500 @enderror"
                   type="checkbox" id="contactable-checkbox" name="contactable"
            > <label class="text-sm text-justify block ml-2 mt-[2px]" for="contactable-checkbox"
            >{!! __('form.contact') !!}</label>
        </div>
        @error('contactable')
        <div class="text-xs text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:col-span-2">
        <button
            class="btn w-full rounded-full border-theme bg-theme text-white px-4 hover:bg-white dark:hover:bg-darker hover:text-theme dark:hover:text-theme-light dark:hover:border-theme-light focus:ring-theme dark:focus:ring-theme-light focus:ring-offset-white dark:focus:ring-offset-darker md:w-auto md:px-8 md:text-base md:h-auto md:block md:mx-auto"
            type="submit"
        >{{ __('form.submit') }}</button>
    </div>
</form>
