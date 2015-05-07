@extends('layouts.main')

@section('page_title', 'Edit Article')
@section('content')
    <!-- articles table section -->
    <article class="post-preview">
        <div class="row">
            <div class="inner-post">
                <header>
                    <h4 class="">Edit article</h4>
                        @if($errors->has())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </header><!-- End entry header -->

                <div>
                    {{--{{errors}}--}}
                    {{--{!! Form::open(array('url'=>'articles/'.$article->slug, 'files'=>true)) !!}--}}
                    {!! Form::model($article, ['route' => ['articles.update'], 'method' => 'PATCH']) !!}
                        <input name="id" type="hidden" value="{{$article->id}}">
                        @include('partials.articleForm')
                    {{--<div class="row ">--}}

                        {{--<input name="id" type="hidden" value="{{$article->id}}">--}}

                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" name="title" id="article-title" placeholder="Article title goes here" value="{{$article->title}}" >--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="img">Upload article image</label>--}}
                            {{--<input type="file" name="img" id="fileToUpload" class="">--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<textarea class="form-control" rows="20" name="body" id="article-body" value="" >{{strip_tags(str_replace('</p>', "\n", $article->body))}}</textarea>--}}
                        {{--</div>--}}

                        {{--<button type="submit" class="btn btn-primary pull-right">Submit</button>--}}
                    {{--</div>--}}
                    {!! Form::close() !!}
                </div><!-- .entry-content -->
            </div><!-- End .inner-post -->
        </div><!-- End row -->
    </article><!-- End article .post-preview -->

@stop

@section('sidebar')
    @include('partials.userSidebar')
@endsection