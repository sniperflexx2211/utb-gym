<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    public function findById(int $id): Category
    {
        return $this->repository->findById($id);
    }

    public function create(array $data): Category
    {
        return $this->repository->create($data);
    }

    public function update(int $id, array $data): Category
    {
        return $this->repository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}