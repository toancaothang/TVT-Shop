<?php

namespace App\Providers;
use App\Models\DanhMuc;
use App\Models\MauSP;
use App\Models\AnhSP;
use App\Models\SanPham;
use App\Models\Cart;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
$view->with(['category'=>DanhMuc::where('status',1)->orderBy('category_name','ASC')->get()
        ]);
        if (Auth::check()){
        $quickcart = Cart::join('product_model','cart.pro_model_id','=','product_model.id')->
        join('product','cart.product_id','=','product.id')
        ->where('user_id',Auth::user()->id)->get(['cart.id as cid',
           'cart.pro_quantity',
           'product_model.model_name',
           'product_model.image',
           'product.capacity',
           'product.price',
           'product.sale',
           'product_model.id',
           'product_model.category_id',
           'product.stock'
    ]);
    $view->with('quickcart', $quickcart );
}
             

});

    }
}
