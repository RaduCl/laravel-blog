<?php namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomePageController extends Controller {


	//
    public function index()
    {

//        $articles = Article::orderBy('publish_date', 'desc')->get();
//        $articles = Article::latest('publish_date')->get();
//        $articles = Article::latest('publish_date')->paginate(2);
        $articles = Article::latest('publish_date')->paginate(2);
        return view('pages.homePage', compact('articles'));

    }

    /**
     *
     * @return \Illuminate\View\View
     */

}
