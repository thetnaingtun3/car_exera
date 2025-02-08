<?php

namespace App\Http\Resources\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'student_code' => $this->student_code,
            'email' => $this->email,
            'phone' => $this->phone,
            'country_id' => $this->country_id,
            'reg_type' => $this->reg_type,
            'status' => $this->status,
        ];
    }
}
