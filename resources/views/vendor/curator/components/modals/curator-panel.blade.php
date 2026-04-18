<div
    x-data="{
        handleItemClick: function (mediaId = null, event) {
            if (! mediaId) return;

            if ($wire.isMultiple && event && event.{{ config('curator.multi_select_key') }}) {
                if (this.isSelected(mediaId)) {
                    let toRemove = Object.values($wire.selected).find(obj => obj.id == mediaId)
                    $wire.removeFromSelection(toRemove.id);
                    return;
                }

                $wire.addToSelection(mediaId);

                return;
            }

            if ($wire.selected.length === 1 && $wire.selected[0].id != mediaId) {
                $wire.removeFromSelection($wire.selected[0].id);
                $wire.addToSelection(mediaId);
                return;
            }

            if ($wire.selected.length === 1 && $wire.selected[0].id == mediaId) {
                $wire.removeFromSelection($wire.selected[0].id);
                return;
            }

            $wire.addToSelection(mediaId);
        },
        isSelected: function (mediaId = null) {
            if ($wire.selected.length === 0) return false;

            return Object.values($wire.selected).find(obj => obj.id == mediaId) !== undefined;
        },
    }"
    class="curator-panel h-full absolute inset-0 flex flex-col"
>
    <!-- Toolbar -->
    <div class="curator-panel-toolbar px-6 py-4 flex items-center justify-between bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-b border-gray-200 dark:border-gray-800 z-20 sticky top-0">
        <div class="flex items-center gap-3">
            <x-filament::button
                size="sm"
                color="danger"
                variant="light"
                x-on:click="$wire.selected = []"
                x-show="$wire.selected.length > 1"
                class="hover:bg-danger-50 dark:hover:bg-danger-900/20"
            >
                {{ trans('curator::views.panel.deselect_all') }}
            </x-filament::button>
            @if($currentPage < $lastPage)
            <x-filament::button
                size="sm"
                color="primary"
                variant="outlined"
                wire:click="loadMoreFiles()"
                class="font-medium"
            >
                {{ trans('curator::views.panel.load_more') }}
            </x-filament::button>
            @endif
            @if ($isMultiple)
                @if (config('curator.multi_select_key') === 'metaKey')
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-widest">{{ trans('curator::views.panel.add_multiple_file', ['key' => 'Cmd']) }}</p>
                @else
                    <p class="text-xs font-medium text-gray-500 uppercase tracking-widest">{{ trans('curator::views.panel.add_multiple_file', ['key' => config('curator.multi_select_key')]) }}</p>
                @endif
            @endif
        </div>
        <label class="border border-gray-300 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-800/50 rounded-lg relative flex items-center shadow-sm w-72 transition-all focus-within:ring-2 focus-within:ring-primary-500/20 focus-within:border-primary-500">
            <span class="sr-only">{{ trans('curator::views.panel.search_label') }}</span>
            <x-filament::icon
                alias="curator::icons.check"
                icon="heroicon-s-magnifying-glass"
                class="w-4 h-4 absolute top-2 left-3 rtl:left-0 rtl:right-3 text-gray-400"
            />
            <input
                type="search"
                placeholder="{{ trans('curator::views.panel.search_placeholder') }}"
                wire:model.live.debounce.500ms="search"
                class="block w-full transition text-sm py-2 !ps-9 !pe-4 border-none focus:ring-0 disabled:opacity-70 bg-transparent placeholder-gray-400 font-medium text-gray-900 dark:text-white"
            />
            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="animate-spin h-4 w-4 text-gray-400 dark:text-gray-500 sm absolute right-2" wire:loading.delay wire:target="search">
                <path clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill-rule="evenodd" fill="currentColor" opacity="0.2"></path>
                <path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path>
            </svg>
        </label>
    </div>
    <!-- End Toolbar -->

    <div class="flex-1 relative flex overflow-hidden bg-gray-50 dark:bg-gray-950/50" style="flex-direction: row;">

        <!-- Gallery -->
        <div class="curator-panel-gallery flex-1 h-full overflow-auto p-6 scroll-smooth">
            <ul class="curator-picker-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(140px, 1fr)); gap: 1.5rem;">
                @forelse ($files as $file)
                    <li
                        wire:key="media-{{ $file['id'] }}" 
                        class="relative group rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 ring-1 ring-gray-200 dark:ring-gray-800 bg-white dark:bg-gray-900 cursor-pointer"
                        style="aspect-ratio: 1 / 1;"
                        x-bind:class="{
                            'opacity-50 scale-95': $wire.selected.length > 0 && !isSelected('{{ $file['id'] }}'),
                            'scale-95 ring-2 ring-primary-500 shadow-lg': isSelected('{{ $file['id'] }}')
                        }"
                    >

                        <button
                            type="button"
                            x-on:click="handleItemClick('{{ $file['id'] }}', $event)"
                            class="block w-full h-full overflow-hidden outline-none"
                        >
                            @if (str_contains($file['type'], 'image'))
                                <img
                                    src="{{ $file['thumbnail_url'] }}"
                                    alt="{{ $file['alt'] ?? '' }}"
                                    loading="lazy"
                                    class="block w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110 checkered"
                                />
                            @else
                                <div class="curator-document-image grid place-items-center w-full h-full text-xs uppercase relative">
                                    <div class="relative grid place-items-center w-full h-full">
                                        @if (str_contains($file['type'], 'video'))
                                            <x-filament::icon
                                                alias="curator::icons.video-camera"
                                                icon="heroicon-o-video-camera"
                                                class="w-16 h-16 opacity-20"
                                            />
                                        @else
                                            <x-filament::icon
                                                alias="curator::icons.document"
                                                icon="heroicon-o-document"
                                                class="w-16 h-16 opacity-20"
                                            />
                                        @endif
                                    </div>
                                    <span class="block absolute">{{ $file['ext'] }}</span>
                                </div>
                            @endif
                        </button>

                        <div class="absolute inset-x-0 bottom-0 p-3 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none flex flex-col justify-end text-left">
                            <p class="text-xs font-semibold text-white truncate drop-shadow-md tracking-wide">
                                {{ $file['pretty_name'] }}
                            </p>
                            <p class="text-[10px] text-gray-300 font-mono mt-0.5 truncate uppercase">
                                {{ $file['ext'] }}
                            </p>
                        </div>

                        <button
                            type="button"
                            x-on:click="handleItemClick('{{ $file['id'] }}', $event)"
                            x-show="isSelected('{{ $file['id'] }}')"
                            x-cloak
                            class="absolute inset-0 flex items-center justify-center w-full h-full rounded shadow text-primary-600 bg-primary-500/10 backdrop-blur-sm transition-all"
                        >
                            <span class="flex items-center justify-center w-10 h-10 text-white rounded-full bg-primary-600 shadow-2xl scale-in-center transform transition-transform scale-110">
                                <x-filament::icon
                                    alias="curator::icons.check"
                                    icon="heroicon-s-check"
                                    class="w-6 h-6" style="stroke-width: 3px;"
                                />
                            </span>
                            <span class="sr-only">
                                {{ trans('curator::views.panel.deselect') }}
                            </span>
                        </button>
                    </li>
                @empty
                    <li class="col-span-full">
                        <div class="flex flex-col items-center justify-center py-24 text-center">
                            <div class="p-4 rounded-full bg-gray-100 dark:bg-gray-800 mb-4">
                                <x-filament::icon icon="heroicon-o-photo" class="w-12 h-12 text-gray-400" />
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">{{ trans('curator::views.panel.empty') }}</h3>
                            <p class="text-sm text-gray-500">Upload an image in the sidebar to get started.</p>
                        </div>
                    </li>
                @endforelse
            </ul>
        </div>
        <!-- End Gallery -->

        <!-- Sidebar -->
        <div class="curator-panel-sidebar h-full overflow-hidden bg-white dark:bg-gray-950 flex flex-col border-l border-gray-200 dark:border-gray-800 shadow-2xl z-[1] shrink-0" style="width: 384px;">
            <div class="flex-1 overflow-hidden">
                <div class="flex flex-col h-full overflow-y-auto">
                    <h4 class="font-bold py-4 px-6 mb-0 text-lg tracking-tight border-b border-gray-100 dark:border-gray-800/60 bg-gray-50/50 dark:bg-gray-900/50">
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-500 dark:from-white dark:to-gray-400">
                            {{
                                count($selected) === 1
                                    ? trans('curator::views.panel.edit_media')
                                    : trans('curator::views.panel.add_files')
                            }}
                        </span>
                    </h4>

                    <div class="flex-1 overflow-auto px-6 pb-6 pt-6">
                        <div class="h-full">
                            @if (count($selected) !== 1)
                                <div class="mb-4 text-[11px] font-bold text-gray-500 uppercase tracking-widest flex items-center gap-2">
                                    <x-filament::icon icon="heroicon-m-arrow-up-tray" class="w-4 h-4" />
                                    Upload New Media
                                </div>
                                <div class="mb-8 rounded-xl border-2 border-dashed border-gray-200 dark:border-gray-700 bg-gray-50/50 dark:bg-gray-900/30 transition-all hover:bg-gray-50 dark:hover:bg-gray-800/80 relative group" style="min-height: 200px; padding: 1.5rem;">
                                    {{ $this->form }}
                                    <div class="absolute inset-0 pointer-events-none border-2 border-primary-500 rounded-xl opacity-0 group-hover:opacity-10 transition-opacity"></div>
                                </div>
                                
                                <div class="mb-4 text-[11px] font-bold text-gray-500 uppercase tracking-widest flex items-center gap-2">
                                    <x-filament::icon icon="heroicon-m-adjustments-horizontal" class="w-4 h-4" />
                                    Actions
                                </div>
                            @else
                                <div class="mb-6 mt-px">
                                    {{ $this->form }}
                                </div>
                            @endif
                            
                            <x-filament-actions::modals />
                        </div>
                    </div>

                    <div class="flex items-center justify-between mt-auto gap-3 py-4 px-6 border-t border-gray-200 bg-gray-50 dark:border-gray-800 dark:bg-gray-900/50 shadow-md">
                        @if (count($selected) !== 1)
                            <div>
                                @if ($this->addFilesAction->isVisible())
                                    {{ $this->addFilesAction }}
                                @endif
                                {{ $this->addInsertFilesAction }}
                            </div>
                        @endif
                        @if (count($selected) === 1)
                            <div class="flex gap-3">
                                @if ($this->updateFileAction->isVisible())
                                    {{ $this->updateFileAction }}
                                @endif
                                {{ $this->cancelEditAction }}
                            </div>
                        @endif
                        @if (count($selected) > 0)
                            <div class="ml-auto w-full flex justify-end">
                                {{ $this->insertMediaAction }}
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <!-- End Sidebar -->
    </div>
</div>
