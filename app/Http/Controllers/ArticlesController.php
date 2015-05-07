<?php namespace App\Http\Controllers;

use App\Article;
use App\User;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\EditArticleRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Request;
use Input;
use Validator;
use Session;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'show']);
        $this->middleware('owner', ['only' => 'edit, update, destroy']);
    }

    /**
     * Return Single article View based on $slug param
     *
     * @param Article $article
     * @return \Illuminate\View\View
     * @internal param $slug
     */
    public function show(Article $article, Tag $tags)
    {
//        $articles = Article::whereSlug($slug)->get();
//        $articles = Article::where('slug', '=', $slug)->get();//same as above

        return view('articles.show', compact('article', 'tags'));
    }



    /**
     * Return create article View
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }



    /**
     * Save a new article
     *
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateArticleRequest $request)
    {

//        $input = Request::all(); //same as line below
        $input = $request->all();
        $input['publish_date'] = Carbon::now();
        $input['user_id'] = Auth::user()->id;
        $input['slug'] = Str::slug($request['title']);
        $input['deleted'] = 0;
        $input['body'] = $this->paragraphFormat($request['body']);


        // Build the $request for our validation
        $img = array('img' => Input::file('img'));

        // Within the ruleset, make sure we let the validator know that this
        // file should be an image
        $rules = array(
            'img' => 'image',
            'img' => 'required'
        );

        // Now pass the$request and rules into the validator
        $validator = Validator::make($img, $rules);

        // Check to see if validation fails or passes
        if ($validator->fails())
        {
            // Redirect with a helpful message to inform the user that
            // the provided file was not an adequate type
            return Redirect::back()->withInput()->withErrors($validator);
        } else
        {
            // checking file is valid.
            if (Input::file('img')->isValid())
            {
                $destinationPath = 'img/'; // upload path
                $extension = Input::file('img')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renaming image
                Input::file('img')->move($destinationPath, $fileName); // uploading file to given path
                $input['img'] = $fileName;
                Session::flash('success', 'Upload successfully');// sending back with message

                // Actually go and store the file now, then inform
                // the user we successfully uploaded the file they chose
                //return Redirect::to('/')->with('message', 'Success: File upload was successful');
                $article = Article::create($input);
                $article->tags()->attach($request->input('tag_list'));

                return redirect('/users/'.$input['user_id']);
            }
            else
            {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');
                return Redirect::back()->withInput;
            }
        }

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Response
     * @internal param int $id
     */
    public function edit(Article $article)
    {

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }


    /**
     * Update the specified article in storage.
     *
     * @param EditArticleRequest $request
     * @param User $user
     * @return Response
     * @internal param int $id
     */
    public function update(EditArticleRequest $request)
    {
        $input = $request->all();
//        dd($request->all());
        $article = Article::find($input['id']);
//        $article->update($request->all());// ia toate valorile din $request si le updateaza in $article
        $article->title = $input['title'];
        $article->body = $this->paragraphFormat($input['body']);
        $article->slug = str_slug($input['title']);
        $article->save();
        $article->tags()->sync($request->input('tag_list'));


//        $id = Auth::user()->id;
//        $redirect_path = '/users/'.$id;
//        return redirect($redirect_path);
        return redirect("/users/".$article->user_id);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return Redirect::back();
    }



    /**
     * Return article body with paragraph tags for each paragraph
     *
     * @param $article_text
     * @return string
     */
    private function paragraphFormat($article_text)
    {
        $article_lines = explode("\r\n", $article_text);
        $formated_text = "";
        foreach($article_lines as $line)
        {
            $formated_text .= "<p>".$line."</p>";
        }

        return $formated_text;
    }

}
