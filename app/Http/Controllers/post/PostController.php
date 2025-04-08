<?php

namespace App\Http\Controllers\post;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\post\CreatePostRequest;
use App\Models\Post;
use Intervention\Image\Laravel\Facades\Image;

class PostController extends Controller
{
    public function store(CreatePostRequest $request) {
        $validatedData = $request->validated();
        $image = $request->file("image");

        $nameImage = Str::uuid() . "." . $image->extension();
        $imageServer = Image::read($image);
        $imagePath = public_path("uploads") . "/" . $nameImage;
        $imageServer->save($imagePath);


        Post::create([
            "title" => $validatedData["title"],
            "description" => $validatedData["description"],
            "image" => $nameImage,
            "user_id" => auth()->user()->id
        ]);

        return response()->json([
            "message" => "Publicación creada correctamente",
        ], 200);
    }
}
