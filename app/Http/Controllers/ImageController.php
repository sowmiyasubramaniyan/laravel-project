<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view("index",compact("images"));
    }

      public function uploadImage(Request $request) {

       
       $image = $request->file('image');

        $imageName = time(). ".". $image->extension();

        $image->move(public_path('uploads'), $imageName);

        $imageStatus = Image::create([
            "image_name" => $imageName
        ]);

        if(!is_null($imageStatus)) {

            return back()->with("success", "Image uploaded successfully.");
        }

        else {
            return back()->with("failed", "Failed to upload image.");
        }
    }

     public function deleteImage(Request $request) {

        $image = Image::find($request->id);

        unlink("uploads/".$image->image_name);

        Image::where("id", $image->id)->delete();

        return back()->with("success", "Image deleted successfully.");

    }

}
