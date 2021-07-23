$outfits = Outfit::all();
return view('outfit.index', ['outfits' => $outfits]);

