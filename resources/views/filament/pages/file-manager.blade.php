<x-filament-panels::page>
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Sol Panel: Dosya Listesi (3 sütun) -->
        <div class="lg:col-span-3 space-y-6">
            <!-- Klasör Seçimi -->
            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-content p-6">
                    <div class="grid gap-4">
                        <div>
                            <label class="fi-fo-field-wrp-label inline-flex items-center gap-x-3">
                                <span class="text-sm font-medium leading-6 text-gray-950 dark:text-white">
                                    Klasör Seçin
                                </span>
                            </label>
                            <select wire:model.live="selectedDirectory" class="fi-select-input block w-full rounded-lg border-none bg-white py-1.5 pe-8 ps-3 text-base text-gray-950 shadow-sm ring-1 ring-gray-950/10 transition duration-75 focus:ring-2 focus:ring-primary-600 dark:bg-white/5 dark:text-white dark:ring-white/20 dark:focus:ring-primary-600 sm:text-sm sm:leading-6">
                                <option value="views">Views</option>
                                <option value="assets">Assets</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dosya Listesi -->
            <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                <div class="fi-section-header flex items-center gap-x-3 overflow-hidden px-6 py-4">
                    <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                        Dosyalar
                    </h3>
                </div>

                <div class="fi-section-content p-4">
                    @php
                        $result = $this->getCurrentFiles();
                        $files = $result['files'];
                        $basePath = $result['basePath'];
                    @endphp

                    @if(count($files) > 0)
                        <div class="space-y-0.5">
                            @foreach($files as $file)
                                @if($file['is_directory'])
                                    @php
                                        $isExpanded = $this->isFolderExpanded($file['full_path']);
                                        $isVisible = $this->isPathVisible($file['full_path'], $basePath);
                                    @endphp
                                    @if($isVisible)
                                        <button
                                            wire:click="toggleFolder('{{ $file['full_path'] }}')"
                                            class="w-full text-left py-1.5 text-xs font-semibold text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-white/5 rounded-md transition-colors"
                                            style="padding-left: {{ ($file['depth'] * 16) + 8 }}px; padding-right: 8px"
                                            title="{{ $file['relative_path'] }}">
                                            <span class="font-mono inline-flex items-center gap-1">
                                                <svg class="w-3 h-3 transition-transform {{ $isExpanded ? 'rotate-90' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                                                </svg>
                                                📁 {{ $file['name'] }}
                                            </span>
                                        </button>
                                    @endif
                                @else
                                    @php
                                        $isVisible = $this->isPathVisible($file['path'], $basePath);
                                    @endphp
                                    @if($isVisible)
                                        <button
                                            wire:click="selectFile('{{ $file['path'] }}')"
                                            class="w-full text-left rounded-md py-1.5 transition-colors {{ $selectedFile === $file['path'] ? 'bg-primary-50 ring-1 ring-primary-600 dark:bg-primary-500/10 dark:ring-primary-500' : 'hover:bg-gray-50 dark:hover:bg-white/5' }}"
                                            style="padding-left: {{ ($file['depth'] * 16) + 8 }}px; padding-right: 8px"
                                            title="{{ $file['relative_path'] }}"
                                        >
                                            <div class="flex items-center justify-between gap-2">
                                                <div class="min-w-0 flex-1 overflow-hidden">
                                                    <div class="flex items-center gap-1">
                                                        <span class="text-xs font-mono truncate {{ $selectedFile === $file['path'] ? 'text-primary-700 dark:text-primary-300' : 'text-gray-950 dark:text-white' }}">{{ $file['name'] }}</span>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <span class="text-xs text-gray-500 dark:text-gray-400">
                                                        {{ number_format($file['size'] / 1024, 2) }} KB
                                                    </span>
                                                </div>
                                            </div>
                                        </button>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    @else
                        <div class="flex flex-col items-center justify-center py-12">
                            <div class="flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800">
                                <svg class="h-6 w-6 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                </svg>
                            </div>
                            <h3 class="mt-4 text-sm font-semibold text-gray-950 dark:text-white">
                                Dosya yok
                            </h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 text-center">
                                Bu klasörde dosya bulunmuyor.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Sağ Panel: Kod Düzenleme (9 sütun) -->
        <div class="lg:col-span-9">
            @if($selectedFile)
                <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 h-full">
                    <div class="fi-section-header flex items-center justify-between gap-x-3 overflow-hidden px-6 py-4">
                        <div class="flex items-center gap-3">
                            <svg class="h-5 w-5 text-primary-600 dark:text-primary-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                            </svg>
                            <h3 class="fi-section-header-heading text-base font-semibold leading-6 text-gray-950 dark:text-white">
                                {{ basename($selectedFile) }}
                            </h3>
                        </div>
                        <x-filament::icon-button
                            icon="heroicon-o-x-mark"
                            wire:click="$set('selectedFile', null)"
                            color="gray"
                            size="sm"
                            tooltip="Kapat"
                        />
                    </div>

                    <div class="fi-section-content p-6">
                        <div class="grid gap-6" wire:key="editor-{{ md5($selectedFile) }}">
                            <div
                                x-data="codeEditor()"
                                x-init="init('{{ basename($selectedFile) }}', @js($fileContent))"
                            >
                                <div x-ref="editor" class="rounded-lg overflow-hidden ring-1 ring-gray-950/10 dark:ring-white/20" style="min-height: 600px;"></div>
                            </div>

                            <div class="flex flex-wrap items-center gap-3" x-data="{ saveFile() {
                                if (globalEditor) {
                                    $wire.set('fileContent', globalEditor.getValue()).then(() => {
                                        $wire.call('saveFile');
                                    });
                                } else {
                                    $wire.call('saveFile');
                                }
                            }}">
                                <x-filament::button
                                    @click="saveFile()"
                                    color="primary"
                                    size="lg"
                                >
                                    <svg class="h-5 w-5 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
                                    </svg>
                                    Kaydet
                                </x-filament::button>
                                <x-filament::button
                                    wire:click="$set('selectedFile', null)"
                                    color="gray"
                                    size="lg"
                                >
                                    <svg class="h-5 w-5 -ml-1 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    İptal
                                </x-filament::button>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="fi-section rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10 h-full flex items-center justify-center" style="min-height: 600px;">
                    <div class="text-center p-12">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-gray-100 dark:bg-gray-800 mx-auto">
                            <svg class="h-8 w-8 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                            </svg>
                        </div>
                        <h3 class="mt-6 text-lg font-semibold text-gray-950 dark:text-white">
                            Dosya seçilmedi
                        </h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            Düzenlemek için sol panelden bir dosya seçin.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/monokai.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/javascript/javascript.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/css/css.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/htmlmixed/htmlmixed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/edit/matchbrackets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/edit/closebrackets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/selection/active-line.min.js"></script>

    <style>
        .CodeMirror {
            height: 600px;
            font-family: 'Monaco', 'Menlo', 'Ubuntu Mono', 'Consolas', 'source-code-pro', monospace;
            font-size: 14px;
            line-height: 1.6;
        }
        .CodeMirror-gutters {
            background-color: #f9fafb;
            border-right: 1px solid #e5e7eb;
        }
        .dark .CodeMirror {
            background-color: #1f2937;
            color: #f9fafb;
        }
        .dark .CodeMirror-gutters {
            background-color: #111827;
            border-right: 1px solid #374151;
        }
        .dark .CodeMirror-linenumber {
            color: #6b7280;
        }
    </style>

    <script>
        let globalEditor = null;
        let globalObserver = null;

        function destroyGlobalEditor() {
            // Disconnect observer
            if (globalObserver) {
                globalObserver.disconnect();
                globalObserver = null;
            }

            // Remove CodeMirror instance completely
            if (globalEditor) {
                try {
                    // Clear all event handlers
                    globalEditor.off('change');

                    // Get the wrapper element
                    const wrapper = globalEditor.getWrapperElement();

                    // Remove from DOM
                    if (wrapper && wrapper.parentNode) {
                        wrapper.parentNode.removeChild(wrapper);
                    }

                    // Clear the instance
                    globalEditor = null;
                } catch (e) {
                    console.error('Error destroying editor:', e);
                    globalEditor = null;
                }
            }
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('codeEditor', () => ({
                currentFilename: '',
                currentContent: '',

                init(filename, content) {
                    console.log('Initializing editor with filename:', filename, 'content length:', content ? content.length : 0);
                    this.currentFilename = filename || '';
                    this.currentContent = content || '';
                    this.initEditor();
                },

                initEditor() {
                    // Validate we have a filename
                    if (!this.currentFilename) {
                        console.warn('No filename provided, skipping editor initialization');
                        return;
                    }

                    try {
                        // Always destroy previous editor first
                        destroyGlobalEditor();

                        // Clear container
                        this.$refs.editor.innerHTML = '';

                        // Small delay to ensure DOM is clean
                        setTimeout(() => {
                            try {
                                const isDark = document.documentElement.classList.contains('dark');
                                const mode = this.detectMode(this.currentFilename);

                                console.log('Creating CodeMirror with mode:', mode);

                                globalEditor = CodeMirror(this.$refs.editor, {
                                    value: this.currentContent || '',
                                    mode: mode,
                                    theme: isDark ? 'material-darker' : 'default',
                                    lineNumbers: true,
                                    lineWrapping: true,
                                    matchBrackets: true,
                                    autoCloseBrackets: true,
                                    styleActiveLine: true,
                                    indentUnit: 4,
                                    tabSize: 4,
                                    indentWithTabs: false,
                                    extraKeys: {
                                        "Tab": function(cm) {
                                            cm.replaceSelection("    ");
                                        }
                                    }
                                });

                                console.log('CodeMirror created successfully');

                                // Keep local content updated (don't sync to Livewire on every change)
                                globalEditor.on('change', (cm) => {
                                    this.currentContent = cm.getValue();
                                });

                                // Expose method to sync content to Livewire when saving
                                this.syncToLivewire = () => {
                                    if (globalEditor && this.$wire) {
                                        const content = globalEditor.getValue();
                                        this.$wire.set('fileContent', content);
                                    }
                                };

                                // Dark mode observer
                                globalObserver = new MutationObserver((mutations) => {
                                    mutations.forEach((mutation) => {
                                        if (mutation.attributeName === 'class' && globalEditor) {
                                            const isDark = document.documentElement.classList.contains('dark');
                                            globalEditor.setOption('theme', isDark ? 'material-darker' : 'default');
                                        }
                                    });
                                });

                                globalObserver.observe(document.documentElement, {
                                    attributes: true
                                });
                            } catch (error) {
                                console.error('CodeMirror initialization error:', error);
                                this.fallbackToTextarea();
                            }
                        }, 50);
                    } catch (error) {
                        console.error('Editor setup error:', error);
                        this.fallbackToTextarea();
                    }
                },

                fallbackToTextarea() {
                    this.$refs.editor.innerHTML = '<textarea class="w-full h-full p-3 font-mono text-sm border rounded dark:bg-gray-800 dark:text-white" rows="30">' + (this.currentContent || '') + '</textarea>';
                },

                detectMode(filename) {
                    // Safety check
                    if (!filename || typeof filename !== 'string') {
                        return 'text/plain';
                    }

                    // Check for blade.php files
                    if (filename.endsWith('.blade.php')) {
                        return 'application/x-httpd-php';
                    }

                    const ext = filename.split('.').pop().toLowerCase();
                    const modeMap = {
                        'html': 'htmlmixed',
                        'htm': 'htmlmixed',
                        'php': 'application/x-httpd-php',
                        'js': 'javascript',
                        'json': { name: 'javascript', json: true },
                        'css': 'css',
                        'scss': 'text/x-scss',
                        'less': 'text/x-less',
                        'xml': 'xml',
                        'svg': 'xml',
                        'txt': 'text/plain',
                        'md': 'markdown'
                    };
                    return modeMap[ext] || 'text/plain';
                }
            }));
        });

        // Cleanup when page unloads
        window.addEventListener('beforeunload', () => {
            destroyGlobalEditor();
        });
    </script>
    @endpush
</x-filament-panels::page>
