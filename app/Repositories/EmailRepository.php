<?php

namespace App\Repositories;

use App\Models\Email;

class EmailRepository
{
    public function create(array $data)
    {
        return Email::create($data);
    }

    public function update($id, array $data)
    {
        $email = Email::findOrFail($id);
        $email->update($data);
        return $email;
    }

    public function delete($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
        return true;
    }
}

