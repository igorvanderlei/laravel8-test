<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Funcionario  extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    protected $fillable = ['nome', 'departamento_id', 'password'];
    public static $rules= ['nome' => 'required|min:5|max:100',
			               'departamento_id' => 'required',
                           'password' => "required|min:8|confirmed" ];
    public static $messages = ['nome.*' => 'O campo nome é obrigatório e deve ter entre 5 e 100 caracteres',
			       'departamento_id.*' => 'O funcionário precisa estar associado a um departamento'
 ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function departamento() {
	    return $this->belongsTo('\App\Models\Departamento');
    }

    public function caixaSaida() {
	return $this->hasMany('\App\Models\Mensagem');
    }

    public function caixaEntrada() {
	return $this->hasMany('\App\Models\Mensagem', 'destinatario_id');
    }

    public function enviarMensagem($titulo, $texto, $destinatario) {
	    $mensagem = new Mensagem;
	    $mensagem->titulo = $titulo;
	    $mensagem->texto = $texto;
	    $mensagem->destinatario()->associate($destinatario);
	    $this->caixaSaida()->save($mensagem);

        /*$mensagem->funcionario_id = $this->id;
        $mensagem->destinatario_id = $destinatario_id;
        $mensagem->save();*/
    }

}
