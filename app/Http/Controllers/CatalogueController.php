<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catalogue;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogues = Catalogue::all();
        return view('adm.catalogue.catalogue', compact('catalogues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.catalogue.catalogue-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sub' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        
        $catalogue = new Catalogue([
            'name' => $request->get('name'),
            'sub' => $request->get('sub'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'image_url' => $imageName,
        ]);

        $catalogue->save();

        return redirect('/admin/katalog')->with('success', 'Data Katalog diperbarui!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogue = Catalogue::find($id);
        return view('adm.catalogue.catalogue-detail', compact('catalogue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalogue = Catalogue::find($id);
        return view('adm.catalogue.catalogue-edit', compact('catalogue'));
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
        $request->validate([
            'name' => 'required',
            'sub' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $catalogue = Catalogue::find($id);

        if ($request->image != null){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $image_path = public_path('images')."/".$catalogue->image_url;  // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $catalogue->image_url = $imageName;
        }
        
        $catalogue->name =  $request->get('name');
        $catalogue->sub =  $request->get('sub');
        $catalogue->description =  $request->get('description');
        $catalogue->price =  $request->get('price');
    
        $catalogue->save();

        return redirect('/admin/katalog')->with('success', 'Data Katalog diperbarui!');
    }

    /**
     * Recatalogue the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $catalogue = Catalogue::find($id);
        $image_path = public_path('images')."/".$catalogue->image_url;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $catalogue->delete();
        return redirect('/admin/katalog')->with('success', 'Data Katalog berhasil dihapus!');
    }
}
