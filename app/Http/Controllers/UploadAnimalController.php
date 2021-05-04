<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\animals;

class UploadAnimalController extends Controller
{
    public function UploadAnimal()

    {
        
        
        return view('uploadanimal');
    }

    public function animalUpload(Request $request){

        $animalModel = $this->validate(request(), [
            
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            
            ]);
            if ($request->hasFile('image')){
                //Gets the filename with the extension
                $fileNameWithExt = $request->file('image')->getClientOriginalName();
                //just gets the filename
                // $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                //Just gets the extension
                $extension = $request->file('image')->getClientOriginalExtension();
                //Gets the filename to store
                $fileNameToStore = $fileNameWithExt.'_'.time().'.'.$extension;
                //Uploads the image
                $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
                }
                else {
                $fileNameToStore = 'noimage.jpg';
                }
        
        //abort action if you are not an admin
        // if (Gate::denies('displayall')) {
        //     abort(403, 'Unauthorized action.');
        //     }

       /* Store animal into DATABASE */
        $animalModel = new animals;

        // $animalModel->userid = 1;   //set default user owner to the admin which is id 1.
        $animalModel->name = strip_tags($request->name);
        // $animalModel->type = strip_tags($request->type);
        $animalModel->DOB = strip_tags($request->date);
        $animalModel->description = strip_tags($request->comment);
        $animalModel->availability = 0;
        $animalModel->image = $fileNameToStore;
        $animalModel->save();

        return back()
            ->with('success', 'You have sucessfuly uploaded a new animal')
            ->with('animalid', $animalModel->id);
    }

}

