<?php

namespace App\Http\Resources\Frontend;

use App\Models\QuizHistory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $history = 'no_answer';

        // Check for the Authorization header
        $authHeader = $request->header('Authorization');

        // Check if there is an authorization header and the user is authenticated
        if ($authHeader && auth('api')->check()) {
            // Get the authenticated user
            $user = auth('api')->user();

            // Find the quiz history for the user and this chapter exercise
            $quizHistory = QuizHistory::where('chapter_exercise_id', $this->id)
                ->where('user_id', $user->id)
                ->first();

            // If there is a quiz history record, set the result
            if ($quizHistory) {
                $history = $quizHistory->result; // 'pass' or 'fail'
            }
        } else {
            // If the user is not authenticated, set the history to 'no_answer'
            $history = 'no_answer';
        }

        return [
            'id' => $this->id,
            'chapter_id' => $this->chapter_id,
            'title' => $this->title,
            'pass_mark' => $this->pass_mark,
            'time' => $this->time,
            'qty' => $this->qty,
            'history' => $history, // Result from quiz history or 'no_answer'
        ];
    }

}
