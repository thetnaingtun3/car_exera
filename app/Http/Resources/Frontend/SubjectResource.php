<?php

namespace App\Http\Resources\Frontend;

use App\Models\UserSubject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray($request)
    {
        $user = null;

        if (Auth::guard('api')->check()) {
            $user = Auth::guard('api')->user();

            // Check if the current subject is associated with the authenticated user in the UserSubject table
            $user_subject = UserSubject::where('subject_id', $this->id)
                ->where('user_id', Auth::guard('api')->id())
                ->first();

            // Determine the access type: 'premium' if user_subject exists, otherwise 'no_premium'
            $access_type = $user_subject ? 'premium' : 'no_premium';
        }

        $response = [
            "id" => $this->id,
            "admin_id" => $this->admin_id,
            "category_id" => $this->category_id,
            "teacher_info" => new TeacherResource($this->teacher),

            "title" => $this->title,
            "slug_title" => $this->slug_title,

            "image" => $this->image_url,
            "app_image" => $this->app_image_url,
            "intro_video" => $this->intro_video_url,
            "thumbnail" => $this->thumbnail_image_url,

//            "intro_video" => asset('storage/videos/intro-video/' . $this->intro_video),
            "outline" => $this->outline,
            "about_program" => $this->about_program,
            "who_attend" => $this->who_attend,

            "extend_price" => $this->extend_price,
            "discount" => $this->discount,
            "original_price" => $this->original_price,
            "price" => $this->price,

            "rank" => $this->rank,
            "type" => $this->type,
            "status" => $this->status,

            "product_code" => $this->product_code,
        ];

        // Add access_type to the response only if the user is authenticated
        if ($user) {
            $response["access_type"] = $access_type;
        }

        return $response;
    }
}
