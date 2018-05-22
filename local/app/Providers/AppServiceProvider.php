<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\loai;
use App\slide;
use App\sanpham;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        *   default http - 
        *   setting https
        */
        /*if (env('APP_ENV') == 'local') {
            $this->app['url']->forceScheme('https');
        }*/
        // view share
        view()->composer('slide',function($view_share){
            $slide = slide::all();
            $loai_sanpham = loai::all();
            $view_share->with('loai_sp', $loai_sanpham);
        });
        view()->composer('slide',function($view){
            $slide = slide::all();
            $view->with('slide', $slide);
        });
        //
        // VIEW SHARE -> sanpham_xemnhieu.blade.php
        // 
        
        view()->composer('sanpham_xemnhieu', function($view){
            $sanpham_xemnhieu = sanpham::orderBy('webma_sanpham.LuotXem','desc')
            ->join('webma_loaisp','webma_sanpham.idLoai','=','webma_loaisp.idLoai')
            ->join('webma_chungloaisp', 'webma_loaisp.idCL','=','webma_chungloaisp.idCL')
            ->skip(0)->take(5)->get();
            $view->with('sanpham_xemnhieu', $sanpham_xemnhieu);
        });
        view()->composer('header' , function($view){
            $menu = loai::all();
            $view->with('header', $menu );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
