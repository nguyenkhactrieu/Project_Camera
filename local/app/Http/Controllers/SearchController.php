<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sanpham;

class SearchController extends Controller
{
    public function getSearch (Request $req){
    	$sanpham = new sanpham();
    	$sanpham_search = $sanpham->getSearch($req->key);
    	/*
    	|
    	|	paginate() with "key" search
    	|	in view, use "appends(Request::only('key'))"
    	|	"Key" is name of tag input search.
    	|
    	*/
    	return view('page.search', compact('sanpham_search'));
    }
}
