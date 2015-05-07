@extends('layouts.main')

@section('page_title', 'Home')
@section('content')
    @foreach($articles as $article)
        <article class="post-preview">
            <div class="row">
                <a href="articles/{{ $article->slug }}"><img class="img-responsive" src="img/{{$article->img}}" alt="Edward Snowden a modern age hero"></a>
                <div class="inner-post">
                    <header>
                        <h2 class="entry-title"><a href="articles/{{ $article->slug }}">{{$article->title}}</a></h2>
                        <div class="entry-meta">
                            <span class="posted-on"><i class="fa fa-calendar"></i>{{date('F j, Y', strtotime($article->publish_date))}}</span>
                            <span class="byline">
                                <i class="fa fa-user"></i>
                                <span class="author vcard"><a class="url fn n" href="#author1">{{ucfirst(strtolower($article->user->fname))}}</a></span>
                            </span>
                        </div><!-- End .entry-meta -->
                    </header><!-- End entry header -->

                    <div class="entry-content">
                        {{--return first paragraph from article body--}}
{{--                        {{ substr($article->body, 3, (strpos($article->body, '</p>'))-3) }}--}}
                        {!! substr($article->body, 0, (strpos($article->body, '</p>'))) !!}
                        <p><a class="btn btn-primary pull-right" href="articles/{{ $article->slug }}" title="Sticky Post &#8211; Always Displayed On Top">Read More</a></p>
                    </div><!-- .entry-content -->
                </div><!-- End .inner-post -->
            </div><!-- End row -->
        </article><!-- End article .post-preview -->
    @endforeach
    {!! $articles->render() !!}
@stop