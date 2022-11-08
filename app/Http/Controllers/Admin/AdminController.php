<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    public function index()
    {

        $totallProduct = Product::count();
        $totallCategory = Category::count();
        $totallBrand = Brand::count();
        $totallAllUser = User::count();

        $totallUser = User::where('role_as', '0')->count();
        $totallAdmin = User::where('role_as', '1')->count();


      
        $todayDate = Carbon:: now()->format('Y-m-d');
        $thisMonth= Carbon::now()->format('m');
        $thisYear = Carbon:: now()->format('Y');

        $totallOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereDate('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereDate('created_at', $thisYear)->count();

        return view('admin.dashboard', compact(

            'totallOrder',
            'todayOrder',
            'thisMonthOrder',
            'thisYearOrder',
            'totallCategory',
            'totallBrand',
            'totallProduct',
            'totallAllUser',
            'totallUser',
            'totallAdmin',
         


        ));
    }
}
