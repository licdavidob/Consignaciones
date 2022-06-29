
{{-- <h1> --}}
    {{-- Testing --}}
    {{-- @foreach ($consignaciones as $consignacion) --}}
        {{-- {{ $consignacion }} --}}
        {{-- {{ $consignacion->Averiguacion }} --}}
        {{-- {{ $consignacion->Averiguacion['Averiguacion'] }} --}}
    {{-- @endforeach --}}
    {{-- {{ $consignaciones[0]['ID_Consignacion'] }} --}}
    
{{-- </h1> --}}



<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</div>
