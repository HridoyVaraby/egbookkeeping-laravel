<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-x-3 mb-4">
            <h2 class="text-lg font-bold text-gray-800 dark:text-white pb-2 border-b border-gray-100 dark:border-gray-800 w-full text-left">
                Quick Actions
            </h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('filament.admin.resources.posts.create') }}" class="p-4 border border-gray-200 dark:border-gray-800 rounded-lg hover:shadow-md transition bg-white dark:bg-gray-900 flex items-center gap-4">
                <div class="p-3 bg-primary-50 dark:bg-primary-900 rounded-lg shrink-0">
                    <x-heroicon-o-pencil-square class="w-6 h-6 text-primary-600 dark:text-primary-400" />
                </div>
                <div>
                    <p class="font-bold text-gray-900 dark:text-white">Create Post</p>
                    <p class="text-xs text-gray-500">Publish a new blog post</p>
                </div>
            </a>

            <a href="{{ route('filament.admin.resources.categories.index') }}" class="p-4 border border-gray-200 dark:border-gray-800 rounded-lg hover:shadow-md transition bg-white dark:bg-gray-900 flex items-center gap-4">
                <div class="p-3 bg-info-50 dark:bg-info-900 rounded-lg shrink-0">
                    <x-heroicon-o-tag class="w-6 h-6 text-info-600 dark:text-info-400" />
                </div>
                <div>
                    <p class="font-bold text-gray-900 dark:text-white">Manage Categories</p>
                    <p class="text-xs text-gray-500">Organize post categories</p>
                </div>
            </a>

            <a href="{{ route('filament.admin.resources.contact-submissions.index') }}" class="p-4 border border-gray-200 dark:border-gray-800 rounded-lg hover:shadow-md transition bg-white dark:bg-gray-900 flex items-center gap-4">
                <div class="p-3 bg-success-50 dark:bg-success-900 rounded-lg shrink-0">
                    <x-heroicon-o-inbox class="w-6 h-6 text-success-600 dark:text-success-400" />
                </div>
                <div>
                    <p class="font-bold text-gray-900 dark:text-white">View Submissions</p>
                    <p class="text-xs text-gray-500">Read contact messages</p>
                </div>
            </a>

            <a href="{{ route('filament.admin.pages.dashboard') }}" class="p-4 border border-gray-200 dark:border-gray-800 rounded-lg hover:shadow-md transition bg-white dark:bg-gray-900 flex items-center gap-4">
                <div class="p-3 bg-danger-50 dark:bg-danger-900 rounded-lg shrink-0">
                    <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-danger-600 dark:text-danger-400" />
                </div>
                <div>
                    <p class="font-bold text-gray-900 dark:text-white">Admin Settings</p>
                    <p class="text-xs text-gray-500">Manage site settings</p>
                </div>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
