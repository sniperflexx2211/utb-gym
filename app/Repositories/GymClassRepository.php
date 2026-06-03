<?php
namespace App\Repositories;
use App\Models\GymClass;

class GymClassRepository {
    public function getAll() { return GymClass::with(['trainer', 'category'])->get(); }
    public function findById(int $id) { return GymClass::with(['trainer', 'category'])->findOrFail($id); }
    public function create(array $data) { return GymClass::create($data); }
    public function update(int $id, array $data) {
        $class = $this->findById($id);
        $class->update($data);
        return $class;
    }
    public function delete(int $id) { return GymClass::destroy($id); }
}