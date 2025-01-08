<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChapterYoutubeVideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
            [
                'id' => $this->id,
                'chapter_id' => $this->chapter_id,
                'title' => $this->title,
                'video_type' => $this->video_type,
                'video_file' => $this->youtube_embed_link,
                'rank' => $this->rank
            ];
    }
}
