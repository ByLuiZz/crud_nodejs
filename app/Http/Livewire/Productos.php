<?php

namespace App\Http\Livewire;
use App\Models\Producto;

use Livewire\Component;

class Productos extends Component
{
    //definicion de variables
    public $productos, $nombre_producto, $cantidad, $precio, $id_producto;
    public $modal = 0;

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.productos');
    }

    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal=true;
    }

    public function cerrarModal(){
        $this->modal=false;
    }

    public function limpiarCampos(){
        $this->id_producto="";
        $this->nombre_producto="";
        $this->precio="";
        $this->cantidad="";
    }

    public function editar($id_producto){
        $producto = Producto::findOrFail($id_producto);
        $this->id_producto = $id_producto;
        $this->nombre_producto = $producto->nombre_producto;
        $this->precio = $producto->precio;
        $this->cantidad = $producto->cantidad;
        $this->abrirModal();
    }

    public function borrar($id_producto){
        Producto::find($id_producto)->delete();
    }

    public function guardar(){
        Producto::updateOrCreate(['id'=>$this->id_producto],
        [
            'nombre_producto' => $this->nombre_producto,
            'precio' => $this->precio,
            'cantidad' => $this->cantidad
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
