<section>
    <header>
        <div></div>
        <h2 class="text-lg font-medium text">
            @lang('Profile Information')
        </h2>

        <p class="mt-1 text-sm text">
            @lang("Update your account's profile information and email address.")
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input name="name" value="{{ old('name') }}" type="text"
                class="input w-full @error('name') input-error @enderror" required autofocus autocomplete="name" />
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Email')</legend>
                <input name="email" value="{{ old('email') }}" type="email"
                    class="input w-full @error('email') input-error @enderror" required autocomplete="username" />
                @error('email')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>

                    <button form="send-verification" class="btn btn-link">
                        @lang('Your email address is unverified. Click here to re-send the verification email.')
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            @lang('A new verification link has been sent to your email address.')
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">
                @lang('Save')
            </button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-600">@lang('Saved.')</p>
            @endif
        </div>
    </form>
</section>