<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreGymClassRequest extends FormRequest {
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'name' => 'required|string|max:255',
            'trainer_id' => 'required|exists:trainers,id',
            'category_id' => 'required|exists:categories,id',
            'capacity' => 'required|integer|min:1',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'day' => 'required|in:lunes,martes,miercoles,jueves,viernes,sabado,domingo',
        ];
    }
}