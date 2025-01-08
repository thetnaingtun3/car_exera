<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterDetailsResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $productCode = $this->subject->product_code;
        return
            [
                'id' => $this->id,
                'title' => $this->title,
                'feedback' => $this->feedback,
                'subject_id' => $this->subject_id,
                'type' => $this->type,
                'rank' => $this->rank,

                'normal_videos' => ChapterVideoResource::collection(
                    $this->whenLoaded('chaptervideos')->filter(function ($video) {
                        // Filter by 'video_type', 'status', and 'rank'
                        return $video->video_type === 'normal'
                            && $video->status === 'active'
                            && $video->rank > 0;
                    })->sortBy('rank')->map(function ($video) use ($productCode) {
                        // After filtering and sorting, map each video to the resource
                        return new ChapterVideoResource($video, $productCode);
                    })
                ),
                'chapter_notes' => ChapterNoteResource::collection($this->whenLoaded('chapternotes'))->where('status', 'active')->where("rank", ">", 0)->sortBy('rank'),
                'youtube_videos' => ChapterYoutubeVideoResource::collection($this->chaptervideos->where('video_type', 'youtube')->where('status', 'active')->where("rank", ">", 0)->sortBy('rank')),
                'chapter_exercise' => ExerciseDetailResource::collection($this->chapterexercises),

            ];
    }
}
