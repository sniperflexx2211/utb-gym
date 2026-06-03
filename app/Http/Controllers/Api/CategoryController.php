<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryController extends Controller
{
    protected CategoryService $service;

    public function __construct(CategoryService $service)
    {
        $this->service = $service;
    }

    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection($this->service->getAll());
    }

    public function show(int $id): CategoryResource
    {
        return new CategoryResource($this->service->findById($id));
    }

    public function store(StoreCategoryRequest $request): CategoryResource
    {
        $category = $this->service->create($request->validated());
        return new CategoryResource($category);
    }

    public function update(StoreCategoryRequest $request, int $id): CategoryResource
    {
        $category = $this->service->update($id, $request->validated());
        return new CategoryResource($category);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Categoría eliminada correctamente.']);
    }
}