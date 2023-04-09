<?php

namespace App\Http\Controllers;

use App\Models\Films;
use App\Http\Requests\StoreFilmsRequest;
use App\Http\Requests\UpdateFilmsRequest;
use Illuminate\Http\Request;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $dataFilms = Films::where('films.idfilms','like','%'.$search.'%')
                ->orWhere('films.namafilm', 'like', '%' . $search . '%')
                ->paginate(8)->onEachSide(2)->fragment('flm');
        }else{
            $dataFilms = Films::paginate(8)->onEachSide(2)->fragment('flm');
        }
        return view('films.data')->with([
            'films' => $dataFilms,
            'search' => $search
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFilmsRequest $request)
    {
        $validate = $request->validated();

        $films = new films;
        $films->idfilms = $request->idfilms;
        $films->image = $request->file('image')->store('post-image');
        $films->namafilm = $request->namafilm;
        $films->durasi = $request->durasi;
        $films->genre = $request->genre;
        $films->sutradara = $request->sutradara;
        $films->image = $request->file('image')->store('post-image');
        $films->sinopsis = $request->sinopsis;
        $films->save();

        if($request->file('image')){
            $validatedDate['image']=$request->file('image')->store('post-image');
        }

        return redirect('films')->with('msg', 'Tambah Data Film Berhasil');



    }

    /**
     * Display the specified resource.
     */
    public function show(Films $films,$idfilms)
    {
        $data = $films->find($idfilms);
        return view('films.filmedit')->with([
            'idfilms' => $idfilms,
            'image' => $data->image,
            'namafilm' => $data->namafilm,
            'durasi' => $data->durasi,
            'genre' => $data->genre,
            'sutradara' => $data->sutradara,
            'sinopsis' => $data->sinopsis
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFilmsRequest $request, Films $films, $idfilms)
    {
        $data = $films->find($idfilms);
        $data->image = $request->file('image')->store('post-image');
        $data->namafilm = $request->namafilm;
        $data->durasi = $request->durasi;
        $data->genre = $request->genre;
        $data->sutradara = $request->sutradara;
        // $data->image = $request->file('image')->store('post-image');
        $data->sinopsis = $request->sinopsis;
        $data->save();

        if($request->file('image')){
            $validatedDate['image']=$request->file('image')->store('post-image');
        }

        return redirect('films')->with('msg', 'Data dengan nama film '.$data->namafilm.' berhasil diupdate');   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Films $films,$idfilms)
    {
        $data = $films->find($idfilms);

        $data->delete();

        return redirect('films')->with('msg', 'Data dengan nama film '.$data->namafilm.' berhasil dihapus');   
    }
}
