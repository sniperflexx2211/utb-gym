<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEnrollmentRequest;
use App\Models\Enrollment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'gymClass'])->get();
        return response()->json(['data' => $enrollments]);
    }

    public function show(int $id)
    {
        $enrollment = Enrollment::with(['user', 'gymClass'])->findOrFail($id);
        return response()->json(['data' => $enrollment]);
    }

    public function store(StoreEnrollmentRequest $request)
    {
        $enrollment = Enrollment::create($request->validated());
        return response()->json(['data' => $enrollment], 201);
    }

    public function update(StoreEnrollmentRequest $request, int $id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update($request->validated());
        return response()->json(['data' => $enrollment]);
    }

    public function destroy(int $id): JsonResponse
    {
        Enrollment::destroy($id);
        return response()->json(['message' => 'Inscripción eliminada correctamente.']);
    }
}