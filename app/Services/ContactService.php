<?php

namespace App\Services;

use App\Constants\ValidatorConstants;
use App\Exceptions\ValidationException;
use App\Models\Contact;
use App\Repositories\ContactRepository;
use Illuminate\Support\Collection;
use Illuminate\Validation\Validator;
class ContactService
{

    public function __construct(
        private readonly ContactRepository $contactRepository
    )
    {
    }

    public function getAll(): Collection
    {
        return $this->contactRepository->all();
    }



    public function create(Contact $contact): ?Contact
    {
        $validate = $this->validateCreate($contact);

        if($validate->fails()){
            throw new ValidationException(errors: $validate->errors()->toArray());
        }

        if($this->contactRepository->create($contact)){
            return $contact;
        }

        return null;
    }

    private function validateCreate(Contact $contact) : Validator{
        $rules = [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'cpf' => ['required', 'string', 'min:11', 'max:11']
        ];
        return \Illuminate\Support\Facades\Validator::make($contact->toArray(), $rules, ValidatorConstants::MESSAGES, [
            'name' => 'nome'
        ]);
    }
}
