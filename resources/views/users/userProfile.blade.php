@extends('layouts.main')

@section('page_title', $user->fname.' '.$user->lname)
@section('content')
    <!-- articles table section -->
    <article class="post-preview">
        <div class="row">
            <div class="inner-post">
                <header>
                    <h4 class="entry-title">{{$user->fname}}'s Articles</h4>
                </header><!-- End entry header -->

                <div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->articles as $article)
                            <tr>
                                <td>{{date('F j, Y', strtotime($article->publish_date))}}</td>
                                <td><a href="/articles/{{$article->slug}}">{{$article->title}}</a></td>
                                <td><a href="/articles/{{$article->slug}}/edit/">Edit</a></td>
                                {{--<td><a href="/articles/{{$article->id}}">Delete</a></td>--}}
                                <td><a href="/articles/delete/{{$article->id}}" data-method="delete">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table><!-- End articles table -->
                    <a href="/articles/create"><div class="btn btn-primary pull-right btn-xs">Add article</div></a>
                </div><!-- .entry-content -->
            </div><!-- End .inner-post -->
        </div><!-- End row -->
    </article><!-- End article .post-preview -->

@endsection

@section('sidebar')
    @include('partials.userSidebar')
@endsection