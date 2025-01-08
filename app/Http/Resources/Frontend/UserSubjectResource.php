<?php

namespace App\Http\Resources\Frontend;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class UserSubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {


        return [
            'subject_id' => $this->subject_id,
            'cohort' => $this->cohort_id !== null ? $this->cohort->name : null,
            'expire_at' => Carbon::parse($this->expire_at)->format('d m Y'),
            'subject' => new SubjectResource($this->subject),
        ];
    }
}
