
<section>
    <div class=" ">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 text-primary ">
            {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400  ">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
            <input id="current_password" name="current_password" type="password" class="form-control mt-1" autocomplete="current-password">
            @if($errors->updatePassword->has('current_password'))
                <div class="invalid-feedback mt-2">
                    {{ $errors->updatePassword->first('current_password') }}
                </div>
            @endif
        </div>
        
        {{-- <div>
            <x-input-label for="current_password" :value="__('Current Password')" />
            <x-text-input id="current_password" name="current_password" type="password" class="mt-1 block w-full" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div> --}}
        <div>
            <label for="password" class="form-label">{{ __('New Password') }}</label>
            <input id="password" name="password" type="password" class="form-control mt-1" autocomplete="new-password">
            @if($errors->updatePassword->has('password'))
                <div class="invalid-feedback mt-2">
                    {{ $errors->updatePassword->first('password') }}
                </div>
            @endif
        </div>
        
        {{-- <div>
            <x-input-label for="password" :value="__('New Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div> --}}

        {{-- <div>
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div> --}}
        <div>
            <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control mt-1" autocomplete="new-password">
            @if($errors->updatePassword->has('password_confirmation'))
                <div class="invalid-feedback mt-2">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </div>
            @endif
        </div>
        
        <div class="flex items-center gap-4">
           
            <button class="btn btn-primary m-3">{{ __('Sauvegarder') }}</button>
            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Sauvegarder.') }}</p>
            @endif
        </div>
    </form>
</div>
</section>
