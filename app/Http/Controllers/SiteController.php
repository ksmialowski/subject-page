<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Presentation;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{

    public function index()
    {
        $presentations = Presentation::all();

        return view('index', compact('presentations'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'min:10',
        'attachment' => 'mimes:pdf,ppt,docx,doc,xls'
      ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'bodyMessage' => $request->message,
            'attachment' => $request->attachment
        );

        Mail::send('email_template', $data, function($message) use ($data)
        {
            $message->to('crytek6@gmail.com');
            $message->subject('Sieci Komputerowe - PREZENTACJA');
            $message->from('crytek6@gmail.com');
            $message->attach($data['attachment']->getRealPath(), array(
                'as' => 'attachment.' . $data['attachment']->getClientOriginalExtension(),
                'mime' => $data['attachment']->getMimeType())
                );
        });

        return back();
    }

    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required',
        'description' => 'required',
        'name_of_image' => 'required',
        'filename' => 'required'
      ]);

      //storing and getting an original filename
      $name_of_image = $request->name_of_image->getClientOriginalName();
      $request->name_of_image->storeAs('public/upload',$name_of_image);
      $filename = $request->filename->getClientOriginalName();
      $request->filename->storeAs('public/upload',$filename);

      //filesize
      $size_of_image = $request->name_of_image->getClientSize();
      $size_of_file = $request->filename->getClientSize();

      $presentation = new Presentation([
        'title' => $request->get('title'),
        'description' => $request->get('description'),
        'name_of_image' => $name_of_image, 
        'size_of_image' => $size_of_image,
        'filename' => $filename,
        'size_of_file' => $size_of_file
      ]);
      $presentation->save();

      return back();
    }
}
