@extends('layouts.main')
{{--{{dd($articles)}}--}}
@section('page_title', $article->slug)
@section('content')
        <article class="post-preview">
            <div class="row">
                <img class="img-responsive" src="/img/{{$article->img}}" alt="Edward Snowden a modern age hero">
                <div class="inner-post">
                    <header>
                        <h2 class="entry-title">{{$article->title}}</h2>
                        <div class="entry-meta">
                            <span class="posted-on"><i class="fa fa-calendar"></i>{{date('F j, Y', strtotime($article->publish_date))}}</span>
                            <span class="byline">
                                <i class="fa fa-user"></i>
                                <span class="author vcard"><a class="url fn n" href="#author1">{{$article->user->fname}}</a></span>
                            </span>
                        </div><!-- End .entry-meta -->
                    </header><!-- End entry header -->

                    <div class="entry-content">
                        {{--return first paragraph from article body--}}
                        {!! $article->body !!}
                        <p><a class="btn btn-primary pull-right" href="{{ URL::previous() }}" title="Sticky Post &#8211; Always Displayed On Top" >Back</a></p>
                    </div><!-- .entry-content -->
                    @unless ($article->tags->isEmpty())
                        <div class="row">
                            <div class="tagcloud">
                                <h5>TAGS</h5>
                                @foreach($article->tags as $tag)
                                    <a href="#cat1" class="" >{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    @endunless
                </div><!-- End .inner-post -->
            </div><!-- End row -->
        </article><!-- End article .post-preview -->
@endsection