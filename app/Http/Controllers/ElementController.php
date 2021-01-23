<?php

namespace App\Http\Controllers;

use App\Models\Element;
use Carbon\Carbon;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Element::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $element = new Element;
        $element->fill(Input::only($element->fillable));
        if(!isset($element->titol_element))
        {
            $element->titol_element = '--';
        }
        if(!isset($element->desc_element))
        {
            $element->desc_element = '--';
        }
        if(!isset($element->date_element))
        {
            $element->date_element = new Carbon();
        }

        $element->save();
        return redirect('api/element/' . $element->id_mst_element . '/edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $element = Element::find($id);
        return view('element.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $element =  Element::findOrFail($id);
        if (Input::has('path_imatge_element')){
            if ($element->path_imatge_element <> Input::get('path_imatge_element')){
                self::esborrarImatge($element->path_imatge_element);
            }
        }
        $element->fill(Input::only($element->fillable))->save();
        return redirect('api/inici')->with('success', 'Element modificat!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $element = Element::findOrFail($id);
        $element->delete();
        return redirect('/api/inici')->with('success', 'Element eliminat!');
    }

    public function changeImage(Request $request, $id)
    {
        $nou_fitxer = '';
        $file = Input::file('uploadImage');
        if (isset($file)){
            $destinationPath = '/img/';
            $filename = 'id_' . $id . '_' . str_slug(preg_replace('/\\.[^.\\s]{3,4}$/', '', $file->getClientOriginalName()));
            $extension = strtolower($file->getClientOriginalExtension());
            $full_filename = $filename . '.' . $extension;
            $i = 1;

            while (File::exists(public_path($destinationPath) . '/' . $full_filename) == true) {
                $full_filename = $filename . '_' . $i . '.' . $extension;
                $i++;
            }
            if (!is_dir(public_path($destinationPath))) {
                $newDir = public_path($destinationPath);
                File::makeDirectory($newDir, 0755, true);
            }
            if (substr($file->getMimeType(), 0, 5) == 'image') {
                $img = \Intervention\Image\Facades\Image::make($file->getRealPath());
                $nou_fitxer = $destinationPath . $full_filename;
                $img->save(public_path() . $nou_fitxer);

            }
        }
        return response()->json(['path_imatge' => $nou_fitxer]);
    }

    public function esborrarImatge($file)
    {
        if (strtolower($file) <> '/img/noimage.png' && strtolower($file) <> '/img/noimage.png') {
            File::delete(public_path() . $file);
        }
    }
}
