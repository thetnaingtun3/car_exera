<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'    => $this->id,
            'chapter_exercise_id' => $this->chapter_exercise_id,
            'question'  => $this->question,
            'options' => json_decode($this->options),
            'answer' => $this->answer,
        ];
    }
}
