@extends('layouts.main')

@section('page_title', $user->fname.' '.$user->lname)
@section('content')

    <!-- articles table section -->
    <article class="post-preview">
        <div class="row">
            <div class="inner-post">
                <header>
                    <h4 class="entry-title">All Articles</h4>
                </header><!-- End entry header -->

                <div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>User</th>
                            <th>Date</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->user['fname']}}</td>
                                    <td>{{date('F j, Y', strtotime($article->publish_date))}}</td>
                                    <td><a href="/articles/{{$article->slug}}">{{$article->title}}</a></td>
                                    <td><a href="/articles/{{$article->slug}}/edit/">Edit</a></td>
                                    <td><a href="/articles/delete/{{$article->id}}" data-method="delete">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table><!-- End articles table -->
                    <div class="btn btn-primary pull-right btn-xs">Add article </div>
                </div><!-- .entry-content -->
            </div><!-- End .inner-post -->
        </div><!-- End row -->
    </article><!-- End article .post-preview -->


    <article class="post-preview">

        <div class="row">



            <div class="inner-post">

                <!-- users table -->
                <h4>Users</h4>
                <table class="table">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Join Date</th>
                        <th>Activity</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="/users/{{$user->id}}">{{$user->fname.' '.$user->lname}}</a></td>
                            <td>{{date('F j, Y', strtotime($user->created_at))}}</td>
                            <td>{{$user->articles()->count()}}  Articles written</td>
                            <td><a href="/articles/edit/">Edit</a></td>
                            <td><a href="/articles/delete/" data-method="delete">Delete</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table><!-- End users table -->
            </div><!-- End .inner-post -->
        </div><!-- End row -->
    </article><!-- End article .post-preview -->


@endsection

@section('sidebar')
    @include('partials.userSidebar')
@endsection