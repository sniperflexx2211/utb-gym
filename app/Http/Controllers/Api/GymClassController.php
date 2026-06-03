<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGymClassRequest;
use App\Http\Resources\GymClassResource;
use App\Services\GymClassService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GymClassController extends Controller {
    protected GymClassService $service;
    public function __construct(GymClassService $service) { $this->service = $service; }

    public function index(): AnonymousResourceCollection { return GymClassResource::collection($this->service->getAll()); }
    public function show(int $id): GymClassResource { return new GymClassResource($this->service->findById($id)); }
    public function store(StoreGymClassRequest $request): GymClassResource { return new GymClassResource($this->service->create($request->validated())); }
    public function update(StoreGymClassRequest $request, int $id): GymClassResource { return new GymClassResource($this->service->update($id, $request->validated())); }
    public function destroy(int $id): JsonResponse { $this->service->delete($id); return response()->json(['message' => 'Clase eliminada.']); }
}