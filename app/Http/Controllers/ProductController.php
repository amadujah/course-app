<?php

namespace App\Http\Controllers;

use App\Course;
use App\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'search');
    }
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
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
        $courses = Course::where('user_id', $userId)->get();
        return view('products.list_products', compact('products', 'fromCourse', 'user', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
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
        $product = Product::where('id', $id)->first();
        if ($product) {
            try {
                //Supprimer l'image correspondante au produit supprimé
                $file_path = public_path('images/' . $product->image);
                if (File::exists($file_path))
                    File::delete($file_path);
                $product->delete();
            } catch (\Exception $e) {
                logger($e);
            }
        }
        return redirect()->route('products.index');
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
        if ($products) {

            foreach ($products as $productId) {
                $product = Product::where('id', $productId)->first();
                $montant += $product->price;
                $productsArray[] = $product;
            }
            return view('courses.add_course', compact('productsArray', 'montant'));
        }
        return view('courses.add_course', compact('montant'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View|void
     */
    function search(Request $request)
    {
        $searchKey = $request->search_key;
        $categorie = $request->categorie;
        //Si c'est une requete du champ de recherche on fait la requete suivante sinon on cherche en fonction de
        //la catégorie
        if ($searchKey)
            $products = Product::where('libelle', 'LIKE', '%' . $searchKey . "%")->get();
        else {
            if ($categorie == 'all') {
                $products = Product::all();
            } else {
                $products = Product::where('categorie', $categorie)->get();
            }
        }
        if (!$products) {
            return abort(404);
        }
        if ($request->ajax()) {
            return response()->json(['list_products' => $products]);
        } else {
            $fromCourse = $request->fromCourse;
            $user = Auth::user();
            return view('products.list_products', compact('products', 'fromCourse', 'user'));
        }
    }
}
