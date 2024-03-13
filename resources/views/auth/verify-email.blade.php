<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Roʻyxatdan oʻtganingiz uchun tashakkur! Ishni boshlashdan oldin, biz sizga yuborgan havolani bosish orqali elektron pochta manzilingizni tasdiqlay olasizmi? Agar siz xat olmagan bo`lsangiz, biz sizga mamnuniyat bilan boshqasini yuboramiz.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Roʻyxatdan oʻtish paytida koʻrsatgan elektron pochta manzilingizga yangi tasdiqlash havolasi yuborildi.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Tasdiqlash xatini qayta yuborish') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Chiqish') }}
            </button>
        </form>
    </div>
</x-guest-layout>
