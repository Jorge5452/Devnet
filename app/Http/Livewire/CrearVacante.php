<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use \Livewire\WithFileUploads;


    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024',
    ];


    public function CrearVacante()
    {
        $datos = $this->validate();
        //Almacenar la imagen en el storage
        $imagen =  $this->imagen->store('public/vacantes');        
        $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        //Crear Vacante
        Vacante::create([
            'titulo'=>          $datos['titulo'],
            'imagen'=>          $datos['imagen'],
            'descripcion'=>     $datos['descripcion'],
            'ultimo_dia'=>      $datos['ultimo_dia'],
            'salario_id'=>      $datos['salario'],
            'categoria_id'=>    $datos['categoria'],
            'empresa'=>         $datos['empresa'],
            'user_id'=>         auth()->user()->id,
        ]);

        //Crear mensaje
        session()->flash('mensaje', 'La vacante se creo correctamente');


        //Redireccionar al usuario
        return redirect()->route('vacantes.index');


    }

    public function render()
    {
        //Podemos consultar la BD desde aqui

        $salarios = Salario::all();
        $categorias = Categoria::all();


        return view('livewire.crear-vacante', [
            'salarios' => $salarios,
            'categorias' => $categorias
        ]);
    }
}
