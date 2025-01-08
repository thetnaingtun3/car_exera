<?php

namespace App\Helpers;


use Illuminate\Support\Facades\Storage;

class FileUpload
{
    public static function FileUploadOnServerAssignment($name, $user_name, $existing_name = null, $folder_name)
    {
        if (is_object($name) || $name instanceof \Livewire\TemporaryUploadedFile) {
            // Generate a unique name for the new image
//            $imageName = $user_name . '_' . uniqid() . '_' . $name->getClientOriginalName();

            $imageName = $user_name . '_' . uniqid() .  '.' . $name->getClientOriginalExtension();
            // Store the image in the specified folder in DigitalOcean Spaces
            $path = $name->storeAs('develop/' . $folder_name . '/', $imageName, 'spaces');
            // Set the image visibility to public
            Storage::disk('spaces')->setVisibility($path, 'public');
            // If there’s an existing image, delete it from DigitalOcean Spaces
            if ($existing_name && Storage::disk('spaces')->exists('develop/' . $folder_name . '/' . $existing_name)) {
                Storage::disk('spaces')->delete('develop/' . $folder_name . '/' . $existing_name);
            }
            // Return the name of the new image
            return $imageName;
        } elseif (is_string($name)) {
            return $name; // If $name is already a string, just return it
        }
        return null;
    }

    public static function FileUploadOnServer($name, $existing_name = null, $folder_name)
    {
        if (is_object($name) || $name instanceof \Livewire\TemporaryUploadedFile) {
            // Generate a unique name for the new image
            $imageName = uniqid() . '_' . $name->getClientOriginalName();
            // Store the image in the specified folder in DigitalOcean Spaces
            $path = $name->storeAs('develop/' . $folder_name . '/', $imageName, 'spaces');
            // Set the image visibility to public
            Storage::disk('spaces')->setVisibility($path, 'public');
            // If there’s an existing image, delete it from DigitalOcean Spaces
            if ($existing_name && Storage::disk('spaces')->exists('develop/' . $folder_name . '/' . $existing_name)) {
                Storage::disk('spaces')->delete('develop/' . $folder_name . '/' . $existing_name);
            }
            // Return the name of the new image
            return $imageName;
        } elseif (is_string($name)) {
            return $name; // If $name is already a string, just return it
        }
        return null;
    }

    public static function uploadVideoForServer($name, $existing_name = null, $folder_name)
    {
        // Check if $name is an object or instance of Livewire's TemporaryUploadedFile
        if (is_object($name) || $name instanceof \Livewire\TemporaryUploadedFile) {
            // Generate a unique name for the video
            $videoName = uniqid() . '_' . $name->getClientOriginalName();

            $path = $name->storeAs('videos/' . $folder_name . '/', $videoName, 'spaces');
            // Store the video in DigitalOcean Spaces under the specified folder
//            $name->storeAs('videos/' . $folder_name . '/', $videoName, 'spaces');

            Storage::disk('spaces')->setVisibility($path, 'public');
            // Check if an existing video needs to be deleted
            if ($existing_name && Storage::disk('spaces')->exists('videos/' . $folder_name . '/' . $existing_name)) {
                Storage::disk('spaces')->delete('videos/' . $folder_name . '/' . $existing_name);
            }

            // Return the name of the newly uploaded video
            return $videoName;
        } elseif (is_string($name)) {
            return $name; // Return the name if it’s already a string
        }

        return null; // Return null if input is not valid
    }
}
