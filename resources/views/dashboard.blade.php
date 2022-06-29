{{-- <x-app-layout> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Para llamar a un componente se usa livewire('nombre de la vista del componente', ['Parametros']) --}}
            {{-- @livewire('show-consignaciones',['title' => 'Titulo de prueba']) --}}
        </div>
    </div>
    {{-- <p> --}}

{{--         
        @foreach ($consignaciones as $consignacion)
            {{ $consignacion }}
            {{ $consignacion->Averiguacion }}
            {{ $consignacion->Averiguacion['Averiguacion'] }}
        @endforeach
        {{ $consignaciones[0]['ID_Consignacion'] }} --}}
    {{-- </p> --}}
{{-- </x-app-layout> --}}
