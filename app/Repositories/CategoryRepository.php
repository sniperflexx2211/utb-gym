<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAll()
    {
        return Category::with('gymClasses')->get();
    }

    public function findById(int $id)
    {
        return Category::with('gymClasses')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update(int $id, array $data)
    {
        $category = $this->findById($id);
        $category->update($data);
        return $category;
    }

    public function delete(int $id)
    {
        // Usamos destroy en lugar de delete() en la instancia.
        // Esto elimina el registro por su ID y a Intelephense le encanta.
        return Category::destroy($id);
    }
}