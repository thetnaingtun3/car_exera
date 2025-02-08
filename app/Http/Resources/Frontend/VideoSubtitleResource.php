<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoSubtitleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
//    protected $productCode;
//    protected $chapter_id;
//
//    // Accept the product_code in the constructor
//    public function __construct($resource, $productCode = null, $chapter_id = null)
//    {
//        parent::__construct($resource);
//        $this->productCode = $productCode;
//        $this->chapter_id = $chapter_id;
//    }

    public function toArray(Request $request): array
    {

        $spaceDomain = config('custom.space_domain');
        $productCode = $this->chapterVideo->chapter->subject->product_code ?? ''; // Assuming relationships are set up
        $baseVideoUrl = $spaceDomain . '/videos/chapter_video/' . $productCode . '/' . $this->chapterVideo->chapter_id . '/';
        return [
            'id' => $this->id,
            'title' => $this->title,
            'subtitle_file' => $this->subtitle_file ? ($baseVideoUrl . $this->subtitle_file) : null,
        ];
    }
}
