<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $collection = Contact::paginate(5);
            return view('contact.list', compact('collection'));
        }
        return view('contact.main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.input',["contact"=>new Contact]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'sosmed' => 'required',
            'link' => 'required',
            'gambar' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('sosmed')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('sosmed'),
                ]);
            }  elseif ($errors->has('link')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('link'),
                ]);
            } elseif ($errors->has('gambar')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('gambar'),
                ]);
            }
        }

        $contact = new Contact;
        $contact->sosmed = $request->sosmed;
        $contact->link = $request->link;
        $contact->gambar = request()->file('gambar')->store("contact");
        $contact->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kontak ' . $request->sosmed . ' Tersimpan',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('contact.input', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $validator = Validator::make($request->all(), [
            'sosmed' => 'required',
            'link' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('sosmed')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('sosmed'),
                ]);
            }  elseif ($errors->has('link')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('link'),
                ]);
            }
        }

        $contact->sosmed = $request->sosmed;
        $contact->link = $request->link;
        if(request()->file('gambar')){
            Storage::delete($contact->gambar);
            $contact->gambar =$contact->gambar;
            $file = request()->file('gambar')->store("contact");
            $contact->gambar =$file;
        }
        $contact->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Kontak ' . $request->sosmed . ' Tersimpan',
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        Storage::delete($contact->gambar);
        $contact->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Menu ' . $contact->sosmed . ' Dihapus',
        ]);
    }
}
