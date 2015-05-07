<?php namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

class OwnerMiddleware {

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Restricts access to edit on articles that are not owned by user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /** @var TYPE_NAME $articleSlug */
        $articleSlug = $request->segments()[1];
        $article = Article::whereSlug($articleSlug)->first();

        if ($article->user_id !== Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }

}
