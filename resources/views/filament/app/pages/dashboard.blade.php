<x-filament-panels::page>

    <div class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div class="lg:col-span-2 lg:row-span-2 lg:row-end-2">
            <div class="w-full">
                {{ $this->table }}
            </div>
        </div>
            <div class="lg:col-start-3 lg:row-end-1">
                <div class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5">
                    <dl class="flex flex-wrap">
                    
                
                    </dl>
                </div>
            </div>
    </div>

    <x-filament-actions::modals />
</x-filament-panels::page>
