<?php
namespace App\Http\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GymClassResource extends JsonResource {
    public function toArray(Request $request): array {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'capacity' => $this->capacity,
            'schedule' => "{$this->day} de {$this->start_time} a {$this->end_time}",
            'trainer' => $this->whenLoaded('trainer', fn() => $this->trainer->user->name),
            'category' => $this->whenLoaded('category', fn() => $this->category->name),
        ];
    }
}