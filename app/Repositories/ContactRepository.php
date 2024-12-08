<?php

namespace App\Repositories;

use App\Models\Contact;
use Illuminate\Support\Collection;

class ContactRepository
{

    public function all(): Collection
    {
        return Contact::with('coordinate')->get();
    }

    public function create(Contact $contact): bool
    {
       return $contact->save();
    }
}
