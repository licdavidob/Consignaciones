<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Consignaciones
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- Tabla --}}
        <x-table>
            <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            ID_Consignación
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Con Detenido
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Agencia
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            No. Averiguación Previa
                        </th>
                        <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                            Acciones
                        </th>
                    </tr>
                </thead class="border-b">
                <tbody>
                    @foreach ($resultado as $consignacion)
                    {{-- @php
                        $personas = $consignacion['Personas'];
                        foreach ($personas as $persona) {
                            // echo $persona['Nombre'];
                            echo json_encode($persona['Alias']);

                        }
                        // $alias = $personas['Nombre'];
                        // echo json_encode($alias);
                        // echo json_encode($personas);
                        // exit();
                    @endphp --}}
                        <tr class="bg-white border-b">
                            <td class="text-sm text-gray-900 font-light px-6 py-4">
                                {{-- {{$consignacion['ID_Consignacion']}} --}}
                                {{$consignacion->ID_Consignacion}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4">
                                {{$consignacion['Con Detenido']}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4">
                                {{$consignacion->Agencia}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4">
                                {{$consignacion->Averiguación}}

                            </td>
                            {{-- Acciones --}}
                            <td class="p-3 text-center">
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a><img src="img/show.svg" alt=""></a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a><img src="img/edit.svg" alt=""></a>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <a><img src="img/delete.svg" alt=""></a>
                                    </div>
                                </div>
                            </td>
                        </tr class="bg-white border-b">
                    @endforeach
                </tbody>
            </table>
        </x-table>

        {{-- {{ $resultado }} --}}
    </div>


</div>
