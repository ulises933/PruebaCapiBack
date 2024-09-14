<?php
namespace App\Repositories;

use App\Models\Direccion;

class DireccionRepository
{
    protected $model;

    public function __construct(Direccion $direccion)
    {
        $this->model = $direccion;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        $direccion = $this->model->findOrFail($id);
        $direccion->update($data);
        return $direccion;
    }

    public function delete($id)
    {
        $direccion = $this->model->findOrFail($id);
        $direccion->delete();
        return true;
    }

    public function deleteWhereNotIn($field, $contactoId, $ids)
    {
        $this->model->where($field, $contactoId)
                    ->whereNotIn('id', $ids)
                    ->delete();
    }
}

