<x-slot name="header">
    <h1 class="tetx-gray-900">Catalogo de Bodega</h1>
</x-slot>

<div class="py-12">
    <div class="max-w-7x1 mx-auto sm:px6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">

    
        <button wire:click="crear()" class="bg-green-500 hover:bg-green-600 text-black font-bold py-2 px-4 my-3">Añadir Producto</button>
        @if($modal)
          @include('livewire.crear')
        @endif
        <table class= "table-fixed w-full">
        <thead>
            <tr class="bg-indigo-600 text-white">
                <th class= "px-4 py-2">ID</th>
                <th class= "px-4 py-2">Nombre del producto</th>
                <th class= "px-4 py-2">Precio</th>
                <th class= "px-4 py-2">Cantidad</th>
                <th class= "px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td class="border px-4 py-2">{{$producto->id}}</td>
                <td class="border px-4 py-2">{{$producto->nombre_producto}}</td>
                <td class="border px-4 py-2">{{$producto->precio}}</td>
                <td class="border px-4 py-2">{{$producto->cantidad}}</td>

                <td>
                    <button wire:click="editar({{$producto->id}})" class="bg-blue-500 hover:bg-blue-600 text-black font-bold py-2 px-4">Editar</button>
                    <button wire:click="borrar({{$producto->id}})" class="bg-red-500 hover:bg-red-700 text-black font-bold py-2 px-4">Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
