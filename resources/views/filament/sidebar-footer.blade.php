<div class="px-4 py-6 mt-10">
    <div class="mb-4">
        <p class="text-sm font-bold text-gray-900 border-b border-gray-200 pb-2 mb-2">EGBookkeeping</p>
        <p class="text-xs text-gray-400 font-semibold tracking-wider">ADMIN</p>
    </div>

    <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
        @csrf
        <button type="submit" class="flex items-center gap-3 px-3 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors w-full text-left">
            <x-heroicon-o-arrow-right-start-on-rectangle class="w-5 h-5 text-gray-400" />
            Logout
        </button>
    </form>
</div>
