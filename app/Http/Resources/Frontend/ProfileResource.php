<?php

namespace App\Http\Resources\Frontend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{


    public function toArray(Request $request): array
    {
        return [
            'dob' => Carbon::parse($this->profile->dob)->format('d-m-Y'),
            'gender' => $this->profile->gender,
            'address' => $this->profile->address,
            'image' => empty($this->profile->profile_image) ? null : $this->profile->profile_image_url,
            'kyc_type' => $this->profile->kyc_type,
            'passport' => $this->profile->passport,
            'driver_license' => $this->profile->driver_license,
            'kyc_image' => empty($this->profile->kyc_image) ? null : $this->profile->kyc_image_url,
            'is_verify' => $this->profile->is_verify
        ];
    }
}
