<?php

namespace App\Http\Resources\Frontend;

use App\Models\ChapterVideo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class ChapterVideoResource extends JsonResource
{
    protected $productCode;

    // Accept the product_code in the constructor
    public function __construct($resource, $productCode = null)
    {
        parent::__construct($resource);
        $this->productCode = $productCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        $spaceDomain = config('custom.space_domain');
        $productCode = $this->productCode; // Use the passed product_code or fallback

        $baseImageUrl = $spaceDomain . '/' . config('custom.server_folder_name') . '/chapter_video_thumbnail/';
        $baseVideoUrl = $spaceDomain . '/videos/chapter_video/' . $productCode . '/' . $this->chapter_id . '/';
        return [
            'id' => $this->id,
            'chapter_id' => $this->chapter_id,
            'title' => $this->title,
            'video_type' => $this->video_type,
            'video_script' => $this->video_script,
            'image' => $baseImageUrl . $this->video_thumbnail,
            'video' => $baseVideoUrl . $this->video_file,

            //            'normal_videos' => ChapterVideoResource::collection(
            //                $this->whenLoaded('videoSubtitle')->filter(function ($video) {
            //                    // Filter by 'video_type', 'status', and 'rank'
            //                    return $video->video_type === 'normal'
            //                        && $video->status === 'active'
            //
            //                        && $video->rank > 0;
            //                })->sortBy('rank')->map(function ($video) use ($productCode) {
            //                    // After filtering and sorting, map each video to the resource
            //                    return new ChapterVideoResource($video, $productCode);
            //                })
            //            ),
            'subtitles' => VideoSubtitleResource::collection($this->videoSubtitle),
            'rank' => $this->rank,
        ];
    }
}
