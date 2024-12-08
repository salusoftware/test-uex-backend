<?php

namespace App\Constants;

class ValidatorConstants
{
    const MESSAGES = array(
        'string' => 'O campo :attribute precisa ser do tipo string.',
        'required' => 'O campo :attribute é obrigatório.',
        'max' => 'O campo :attribute não pode utrapassar :max caracteres',
        'min' => 'O campo :attribute precisa conter no mínimo :min caracteres',
        'unique' => 'O campo :attribute já existe na base de dados.'
    );
}
