<?php
namespace App\Repositories;

use App\Models\Telefono;

class TelefonoRepository
{
    protected $model;

    public function __construct(Telefono $telefono)
    {
        $this->model = $telefono;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $telefono = $this->model->findOrFail($id);
        $telefono->update($data);
        return $telefono;
    }

    public function delete($id)
    {
        $telefono = $this->model->findOrFail($id);
        $telefono->delete();
        return true;
    }

    public function deleteWhereNotIn($field, $contactoId, $ids)
    {
        $this->model->where($field, $contactoId)
                    ->whereNotIn('id', $ids)
                    ->delete();
    }
}
