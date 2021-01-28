<?php

namespace App\Validator;

class MensagemValidator
{
	public static function validate(& $data) {
        if(!isset($data['funcionario_id'])) {
            $id = \Auth::id();
            if(isset($id))
                $data['funcionario_id'] = $id;
        }

        if(isset($data['destinatario'])) {
            $destinatario = \App\Models\Funcionario::where('nome', 'like', $data['destinatario'])->first();
            if($destinatario != null)
                $data['destinatario_id'] = $destinatario->id;
        }
		$validator = \Validator::make($data, \App\Models\Mensagem::$rules, \App\Models\Mensagem::$messages);

		if(isset($data['funcionario_id']) && isset($data['destinatario_id']) && $data['funcionario_id'] == $data['destinatario_id'])
			$validator->errors()->add('destinatario_id', 'O funcionario não pode enviar uma mensagem para si mesmo' );

		if(!$validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Mensagem");

	}
}
