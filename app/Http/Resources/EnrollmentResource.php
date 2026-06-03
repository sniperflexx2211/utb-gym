<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnrollmentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'gym_class_id' => $this->gym_class_id,
            'enrollment_date' => $this->enrollment_date,
            'status' => $this->status,
        ];
    }
}