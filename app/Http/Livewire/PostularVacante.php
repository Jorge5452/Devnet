<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();
        //Almacenar la CV en el storage
        $cv =  $this->cv->store('public/cv');        
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //Crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv'],
        ]);

        //Crear notificacion y envio de email
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id ));

        //Mostrar el usuario un mensaje de exito
        session()->flash('mensaje', 'Te has postulado correctamente a la vacante');

        //Redireccionar al usuario
        return redirect()->back();


    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
