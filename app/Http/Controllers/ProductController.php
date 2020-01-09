<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Boolean;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Boolean $fromCourse
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();
        //Cette variable permet de savoir si la requete vient de l'ajout de course
        $fromCourse = $request->fromCourse;
        $userId = -1;
        if (Auth::user())
            $userId = Auth::user()->getAuthIdentifier();

        $user = User::where('id', $userId)->first();
        return view('list_products', compact('products', 'fromCourse', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        var_dump($request);

        $product = new Product();

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|image',
            'categorie' => 'required',
            'price' => 'required',
            'availability' => 'required'
        ]);
        $product->libelle = $request->title;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->categorie = $request->categorie;
        if ($request->availability == 'disponible')
            $product->disponibilite = true;
        else
            $product->disponibilite = false;
        $file = $request->file('image');
        //getting timestamp
        $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
        $name = $timestamp . '-' . $file->getClientOriginalName();
        $file->move(public_path() . '/images/', $name);
        $product->image = $name;
        $product->save();
        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @param Request $request
     */
    public function addCourse(Request $request)
    {
        $products = Input::get('products');
        $productsArray = [];
        $montant = 0;
        //Recuperer les donnees des produits choisis
        foreach ($products as $productId) {
            $product = Product::where('id', $productId)->first();
            $montant += $product->price;
            $productsArray[] = $product;
        }
        if (isset($productsArray))
            return view('add_course', compact('productsArray', 'montant'));
        else
            return view('add_course');
    }

    public function search(Request $request)
    {
        $searchKey = $request->search_key;
        //Si c'est une requete du champ de recherche on fait la requete suivante sinon on cherche en fonction de
        //la catégorie
        if ($searchKey)
            $products = Product::where('libelle', 'LIKE', '%' . $searchKey . "%")->get();
        else
            $products = Product::where('categorie', $request->categorie)->get();
        if (!$products) {
            return abort(404);
        }
        if ($request->ajax()) {
            return response()->json(['list_products' => $products]);
        } else {
            $fromCourse = $request->fromCourse;
            $user = Auth::user();
            return view('list_products', compact('products', 'fromCourse', 'user'));
        }
    }
}
