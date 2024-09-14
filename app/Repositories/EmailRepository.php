<?php
namespace App\Repositories;

use App\Models\Email;

class EmailRepository
{
    protected $model;

    public function __construct(Email $email)
    {
        $this->model = $email;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $email = $this->model->findOrFail($id);
        $email->update($data);
        return $email;
    }

    public function delete($id)
    {
        $email = $this->model->findOrFail($id);
        $email->delete();
        return true;
    }

    public function deleteWhereNotIn($field, $contactoId, $ids)
    {
        $this->model->where($field, $contactoId)
                    ->whereNotIn('id', $ids)
                    ->delete();
    }
}
