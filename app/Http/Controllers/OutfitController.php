<?php

namespace App\Http\Controllers;

use App\Models\Outfit;
use App\Models\Master;
use Illuminate\Http\Request;
use Validator;

class OutfitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $outfits = Outfit::orderBy('type', 'asc') -> paginate(10)->withQueryString();

        $dir = 'asc';
        $sort = 'type';
        $defaultMaster = 0;
        $masters = Master::all();
        $s = '';


        // Rušiavimas

        // pabaigti šią dalį

        if ($request -> sort_by && $request -> dir) {

            if ('type'== $request -> sort_by && 'asc'== $request -> dir) {
                $outfits = Outfit::orderBy('type') -> paginate(10)->withQueryString();
            }

            elseif ('type'== $request -> sort_by && 'desc'== $request -> dir) {
                $outfits = Outfit::orderBy('type', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
            }

            elseif ('size'== $request -> sort_by && 'asc'== $request -> dir) {
                $outfits = Outfit::orderBy('size') -> paginate(10)->withQueryString();
                $sort = 'size';
            }

            elseif ('size'== $request -> sort_by && 'desc'== $request -> dir) {
                $outfits = Outfit::orderBy('size', 'desc') -> paginate(10)->withQueryString();
                $dir = 'desc';
                $sort = 'size';
            }

            else {
                $outfit = Outfit::paginate(10)->withQueryString();
            }
        } 

        // Filtravimas

        elseif ($request -> master_id) {
            $outfits = Outfit::where('master_id', (int)$request -> master_id) -> paginate(10)->withQueryString();
            $defaultMaster = (int)$request -> master_id;
        }

        // Paieška

        elseif ($request -> s) {
            $outfits = Outfit::where('type', 'like', '%'.$request -> s.'%') -> paginate(10)->withQueryString();
            $s = $request -> s;
        }
        
        elseif ($request -> do_search) {
            $outfits = Outfit::where('type', 'like', '') -> paginate(10)->withQueryString();
        }

        else {
            $outfits = Outfit::paginate(10)->withQueryString();
        }

        return view('outfit.index', [
            'outfits' => $outfits,
            'dir' => $dir,
            'sort' => $sort,
            'masters' => $masters,
            'defaultMaster' => $defaultMaster,
            's' => $s
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $masters = Master::all();
        return view('outfit.create', ['masters' => $masters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'outfit_type' => ['required', 'min:3', 'max:50'],
            'outfit_color' => ['required', 'min:3', 'max:20'],
            'outfit_size' => ['required', 'min:3', 'max:22'],
            'outfit_about' => ['required'],
            'master_id' => ['required', 'integer', 'min:1']
        ],
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }

        $outfit = new Outfit;
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()->route('outfit.index')->with('success_message', 'Naujas outfitas sėkmingai įrašytas! 🤪');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function show(Outfit $outfit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function edit(Outfit $outfit)
    {
        $masters = Master::all();
        return view('outfit.edit', ['outfit' => $outfit, 'masters' => $masters]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outfit $outfit)
    {
        $validator = Validator::make($request->all(),
        [
            'outfit_type' => ['required', 'min:3', 'max:50'],
            'outfit_color' => ['required', 'min:3', 'max:20'],
            'outfit_size' => ['required', 'integer', 'min:1', 'max:22'],
            'outfit_about' => ['required'],
            'master_id' => ['required', 'integer', 'min:1']
        ],
        
        );
        
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        
        $outfit->type = $request->outfit_type;
        $outfit->color = $request->outfit_color;
        $outfit->size = $request->outfit_size;
        $outfit->about = $request->outfit_about;
        $outfit->master_id = $request->master_id;
        $outfit->save();
        return redirect()->route('outfit.index')->with('success_message', 'Outfitas sėkmingai atnaujintas! 😌');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outfit  $outfit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outfit $outfit)
    {
        $outfit->delete();
        return redirect()->route('outfit.index')->with('success_message', 'Outfitas sėkmingai ištrintas! 😊');
    }
}
