<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            @lang('Delete Account')
        </h2>

        <p class="mt-1 text-sm">
            @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')
        </p>
    </header>

    <button class="btn btn-error" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">@lang('Delete Account')</button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                @lang('Are you sure you want to delete your account?')
            </h2>

            <p class="mt-1 text-sm">
                @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.')
            </p>

            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Password')</legend>
                <input name="password" value="{{ old('password') }}" type="password"
                    class="input w-full @error('password') input-error @enderror"/>
                @error('password')
                    <p class="label text-error">{{ $message }}</p>
                @enderror
            </fieldset>

            <div class="mt-6 flex justify-end">
                <button class="btn btn-secondary" x-on:click="$dispatch('close')">
                    @lang('Cancel')
                </button>

                <button class="ms-3">
                    @lang('Delete Account')
                </button>
            </div>
        </form>
    </x-modal>
</section>