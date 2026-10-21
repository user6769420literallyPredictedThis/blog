@extends('partials.layout')
@section('content')
    <form method="POST" action="{{ route('password.confirm') }}" class="card bg-base-300 shadow-sm w-2/3 mx-auto p-3">
        <div class="mb-4 text-sm text-600">
            @lang('This is a secure area of the application. Please confirm your password before continuing.')
        </div>
        @csrf

        <!-- Password -->

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Password')</legend>
            <input name="password" value="{{ old('password') }}" type="password"
                class="input w-full @error('password') input-error @enderror" required autocomplete="current-password" />
            @error('password')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="flex items-center justify-end mt-4">
            <button class="btn btn-primary">
                @lang('Confirm')
            </button>
        </div>
    </form>
@endsection