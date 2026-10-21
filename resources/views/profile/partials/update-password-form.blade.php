<section>
    <header>
        <h2 class="text-lg font-medium">
            @lang('Update Password')
        </h2>

        <p class="mt-1 text-sm">
            @lang('Ensure your account is using a long, random password to stay secure.')
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Current Password')</legend>
            <input name="current_password" value="{{ old('password') }}" type="password"
                class="input w-full @error('password') input-error @enderror" autocomplete="current-password" />
            @error('password')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('New Password')</legend>
            <input name="password" value="{{ old('password') }}" type="password"
                class="input w-full @error('password') input-error @enderror" autocomplete="new-password" />
            @error('password')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Confirm Password')</legend>
            <input name="password_confirmation" type="password"
                class="input w-full @error('password_confirmation') input-error @enderror"
                autocomplete="new_confirmation" />
            @error('password_confirmation')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">@lang('Save')</button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm">@lang('Saved.')</p>
            @endif
        </div>
    </form>
</section>