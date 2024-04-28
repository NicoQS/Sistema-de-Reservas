<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Reserva;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use phpDocumentor\Reflection\PseudoTypes\False_;

class CrearReserva extends Component
{

    public $open=false;
    public $fecha, $fechaActual, $reservas;

    public function render()
    {
        return view('livewire.crear-reserva');
    }

    public function mount(){
        $this->fechaActual = Carbon::now()->format('Y-m-d');
        $this->reservas = Reserva::all()->pluck('fecha')->toArray();
    }

    public function modal($band){
        if ($band) {
            $this->open=true;
        }else{
            $this->open=false;
        }
    }

    public function crearReserva($paga){
        $id_cliente = auth()->user()->id;
        $reserva = Reserva::create(
            [
                'fecha' => $this->fecha,
                'pago' => $paga,
                'id_cliente' => $id_cliente
            ]
        );
        if ($paga){
            $user = auth()->user();
            $correo = new ConfirmationEmail(['user' => $user, 'reserva' => $reserva]);
            Mail::to($user->email)->send($correo);
        }
        // Se redirecciona a la vista de reservas
        return redirect()->route('dashboard');
    }
}
