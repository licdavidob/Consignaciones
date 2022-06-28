<h1>
    Testing
    @foreach ($consignaciones as $consignacion)
        {{-- {{ $consignacion }} --}}
        {{-- {{ $consignacion->Averiguacion }} --}}
        {{ $consignacion->Averiguacion['Averiguacion'] }}
    @endforeach
    {{-- {{ $consignaciones[0]['ID_Consignacion'] }} --}}
    
</h1>