<div class="container flex items-center gap-3">

    @if($setting && $setting->logo)

        <img
            src="{{ asset('storage/' . $setting->logo) }}"
            class="w-7 h-7 rounded object-cover">

    @endif

    <div>

        <h2 class="font-bold">
            {{ $setting->company_name ?? 'Mini ERP' }}
        </h2>

    </div>

</div>


<div class="bg-white shadow px-6 py-4 flex justify-between">

    <h2 class="font-bold">
        Admin Panel
    </h2>

    <div>
        {{ auth()->user()->name }}
    </div>

</div>