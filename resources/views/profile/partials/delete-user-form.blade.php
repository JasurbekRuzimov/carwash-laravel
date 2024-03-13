<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profilni o`chirish') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Hisobingiz o`chirilgandan so`ng, uning barcha resurslari va ma`lumotlari butunlay o`chiriladi. Hisobingizni o`chirishdan oldin, saqlamoqchi bo`lgan har qanday ma`lumot yoki ma`lumotni yuklab oling.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Profilni o`chirish') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Hisobingiz o`chirilgandan so`ng, uning barcha resurslari va ma`lumotlari butunlay o`chiriladi. Hisobingizni o`chirishdan oldin, saqlamoqchi bo`lgan har qanday ma`lumot yoki ma`lumotni yuklab oling.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Profilni o`chirish') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
