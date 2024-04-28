<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationEmail;


class MisReservas extends Component
{

    public $open=false;
    public $reserva;

    public function render()
    {
        return view('livewire.mis-reservas',[
            'reservas' => Reserva::where('id_cliente',auth()->user()->id)
            ->get()
        ]);
    }

    public function modal($band,$reserva){
        if ($band) {
            $this->open=true;
            $this->reserva=$reserva;
        }else{
            $this->open=false;
        }
    }

    public function delete(Reserva $reserva)
    {
        $reserva->delete();
    }

    public function pagar()
    {
        $this->reserva = Reserva::find($this->reserva['id']);
        $this->reserva->update(['pago' => true]);
        $user = auth()->user();
        $correo = new ConfirmationEmail(['user' => $user, 'reserva' => $this->reserva]);
        Mail::to($user->email)->send($correo);
        $this->open=false;
    }
}
