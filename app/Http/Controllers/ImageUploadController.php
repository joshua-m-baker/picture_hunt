<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {

        // Auth::check()
        $request->validate([
            'task_id' => 'required',
            'image' => 'required|mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        $path = $request->image->store('images');

        // TODO delete old file File::delete($filename);
        TaskComplete::updateOrCreate(
            ["task_id" => $request->get('task_id'), "user_id" => Auth::id()],
            ["image_path" => $path, "edited" => true]
        );

        return back()
            ->with('success','You have successfully upload image.');
    }
}
