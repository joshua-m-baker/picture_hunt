<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskComplete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

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


        $task = TaskComplete::where('task_id', '=', $request->get('task_id'))
            ->where('user_id', '=', Auth::id())
            ->first();

        if ($task->image_path != null){
            //delete old file to save space
            File::delete(storage_path('app/'.$task->image_path));
        }

        $path = $request->image->store('images');
        $task->image_path = $path;
        $task->edited = true;

        $task->save();

        return back()
            ->with('success','You have successfully upload image.');
    }

    public function imageRotate(Request $request)
    {
        $task = TaskComplete::find($request->get('task_complete_id'));
        $path = storage_path('app/'.$task->image_path);

        $img = Image::make($path);
        $img->rotate(-90);

        $img->save();

        return back();
    }
}
