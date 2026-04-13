<div class="px-4 py-6 sticky bottom-0 bg-white border-t border-gray-100 mt-auto z-10 w-full" style="margin-top: auto; background-color: #ffffff; border-top: 1px solid #f3f4f6;">
    <div class="mb-4 px-2">
        <p class="text-xs text-gray-500 font-medium uppercase tracking-wider mb-1" style="color: #6b7280; font-size: 0.75rem; font-weight: 500; text-transform: uppercase;">Logged in as</p>
        <p class="text-sm font-bold text-gray-900 truncate" style="color: #111827; font-size: 0.875rem; font-weight: 700;" title="{{ filament()->auth()->user()->name ?? 'Admin User' }}">
            {{ filament()->auth()->user()->name ?? 'Admin User' }}
        </p>
        <p class="text-xs text-gray-400 font-medium mt-1" style="color: #9ca3af; font-size: 0.75rem; font-weight: 500;">EGBookkeeping ADMIN</p>
    </div>

    <form method="POST" action="{{ route('filament.admin.auth.logout') }}">
        @csrf
        <button type="submit" class="flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg w-full text-center group" style="background-color: #fef2f2; color: #dc2626; transition: all 0.2s;" onmouseover="this.style.backgroundColor='#fee2e2'" onmouseout="this.style.backgroundColor='#fef2f2'">
            <x-heroicon-o-arrow-right-start-on-rectangle class="w-5 h-5" style="color: #dc2626;" />
            <span style="font-size: 0.875rem; font-weight: 600;">Logout</span>
        </button>
    </form>
</div>
