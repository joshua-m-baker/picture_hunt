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
        ]);

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'required|image|mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $path = $request->image->store('images');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new TaskComplete([
                "task_id" => $request->get('task_id'),
                "user_id" => Auth::id(),
                "image_path" => $path
            ]);
            $product->save(); // Finally, save the record.
        }

        return back()
            ->with('success','You have successfully upload image.');
    }
}
