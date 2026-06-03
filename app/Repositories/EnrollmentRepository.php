<?php
namespace App\Repositories;
use App\Models\Enrollment;

class EnrollmentRepository {
    public function getAll() { return Enrollment::with(['user', 'gymClass'])->get(); }
    public function findById(int $id) { return Enrollment::with(['user', 'gymClass'])->findOrFail($id); }
    public function create(array $data) { return Enrollment::create($data); }
    public function update(int $id, array $data) {
        $enrollment = $this->findById($id);
        $enrollment->update($data);
        return $enrollment;
    }
    public function delete(int $id) { return Enrollment::destroy($id); }
}