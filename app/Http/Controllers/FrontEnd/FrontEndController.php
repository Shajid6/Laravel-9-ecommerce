<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    protected $listeners = ['CartAddedUpdated' => 'checkCartCount'];
    public $product;



    public function index()


    {

        $sliders = Slider::where('status', '0')->get();
        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();
        $brands=Brand::all();
        $newArraivalsProducts = Product::where('trending', '1')->latest()->take(15)->get();

        $categories = Category::whereNull('parent_id')
        ->with(['children'])
        ->get();
     
        return view('frontend.index', compact('sliders', 'featuredProducts','newArraivalsProducts','brands', 'categories',

  
      
    ));
}

    

    public function categories()
    {

        $categories = Category::whereNull('parent_id')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)

    {
        $category = Category::where('slug', $category_slug)->first();
       

        if ($category) {
            $products = $category->products()->get();

            return view('frontend.collections.products.index', compact('category'));
        } else {
            return redirect()->back();
        }
    }

    public function featured($category_slug)

    {
        
        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();

      

    return view('frontend.collections.products.featured', compact(' $featuredProducts'));
       
    }
    

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        if ($category) {
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            
            if ($product) {

                return view('frontend.collections.products.view', compact('product', 'category'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    public function searchProducts(Request $request)
    {
        if ($request->search) {
            $searchProducts = Product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10);
            return view('frontend.pages.search', compact('searchProducts'));
        } else {
            return redirect()->back()->with('message', 'Empty search');
        }
    }

    public function newArraival()
    {
        $newArraivalsProducts = Product::where('trending', '1')->latest()->take(15)->get();
        return view('frontend.pages.new-arraival', compact('newArraivalsProducts'));
    }
    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->latest()->take(15)->get();
        return view('frontend.pages.featuredProducts', compact('featuredProducts'));
    }

    public function hola()


    {

        $categories = Category::all();
        return view('frontend.hola', compact('categories'));
    }
    public function thanks()
    
    {
        $category=Category::all();
     
        $categories = Category::where('parent_id',null)->first();
     
        return view('frontend.thanks', compact('categories'));
    }


  }
           




