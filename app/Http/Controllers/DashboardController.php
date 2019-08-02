<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Presentation;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function showCreate()
    {
        return view('create');
    }

    public function modify()
    {
        $presentations = Presentation::all();

        return view('modify', compact('presentations'));
    }

    public function edit($id)
    {
        $presentation = Presentation::find($id);

        return view('edit', compact('presentation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'title'=>'required',
        'description'=> 'required',
        'name_of_image' => 'required',
        'filename' => 'required'
      ]);

        $presentation = Presentation::find($id);

        if ($request->hasFile('filename'))
        {
            //storing and getting an original filename
            $filename = $request->filename->getClientOriginalName();
            $request->filename->storeAs('public/upload',$filename);
            //filesize
            $size_of_file = $request->filename->getClientSize();
            //removing previous presentation
            $removePresentation = Storage::delete("public/upload/$presentation->filename");

            $presentation->filename = $filename;
            $presentation->size_of_file = $size_of_file;
        }
        
        if ($request->hasFile('name_of_image'))
        {
            //storing and getting an original filename
            $name_of_image = $request->name_of_image->getClientOriginalName();
            $request->name_of_image->storeAs('public/upload',$name_of_image);
            //filesize
            $size_of_image = $request->name_of_image->getClientSize();
            //removing previous file
            $removeImage = Storage::delete("public/upload/$presentation->name_of_image");

            $presentation->name_of_image = $name_of_image;
            $presentation->size_of_image = $size_of_image;
        }
          $presentation->title = $request->get('title');
          $presentation->description = $request->get('description');

          $presentation->save();

          return redirect('dashboard/modify');
    }

    public function destroy($id)
    {
        $presentation = Presentation::find($id);
        $image=$presentation->name_of_image;
        $file=$presentation->filename;
        $removeFiles = Storage::delete(["public/upload/$image","public/upload/$file"]);
        $presentation->delete();

        return back();
        
    }
}
