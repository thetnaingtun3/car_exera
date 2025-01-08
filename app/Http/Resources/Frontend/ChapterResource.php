<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use phpDocumentor\Reflection\Types\False_;

class ChapterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $history = 'no_answer'; // Default history if the user is unauthenticated

        // Check if the user is authenticated
        $user = auth('api')->user();

        // If authenticated, check if quiz history exists for this chapter exercise
        if ($user) {
            // Loop through the chapter exercises and fetch the quiz history
            foreach ($this->chapterexercises as $chapterExercise) {
                $quizHistory = $chapterExercise->history->first(); // Get the first related quiz history for this chapter exercise

                if ($quizHistory) {
                    $history = $quizHistory->result; // 'pass' or 'fail'
                }
            }
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'premium_type' => $this->premium_type,
            'history' => $history, // 'no_answer' or the result from quiz history
            //  'assignment' => $this->type == 'end_chapter' && $history == "pass" && $this->assignment === 'active' ? true : false,
        ];
    }
}
