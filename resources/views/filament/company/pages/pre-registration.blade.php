<x-filament::page>
    @php
        $companyId = request()->route('tenant');

        $uuid = \App\Models\Company::find($companyId)->uuid;
    @endphp

    <div class="flex gap-x-3 items-center">
        <a href="{{ route('pre-register', ['company' => '8edce2a8-bbef-4231-9f33-d096c5edf9fb']) }}" target="_blank"
            class="inline-block px-4 py-2 bg-blue-600 text-xl font-bold rounded-lg hover:bg-blue-700">
            Preregister a user/visitor
        </a>
        <div class="w-10 h-10 inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
            </svg>
        </div>
    </div>

</x-filament::page>
