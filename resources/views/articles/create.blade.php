@extends('layouts.main')

@section('page_title', 'New Article')
@section('content')
    <!-- articles table section -->
    <article class="post-preview">
        <div class="row">
            <div class="inner-post">
                <header>
                    @if($errors->has())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <h4 class="">Add article</h4>
                        <p>Make sure you fill all the fields</p>
                </header><!-- End entry header -->

                <div>
                    {{--{{errors}}--}}
                    {!! Form::open(array('url'=>'articles', 'files'=>true)) !!}
                        @include('partials.articleForm')
                    {{--<div class="row ">--}}

                        {{--<div class="form-group">--}}
                            {{--<input type="text" class="form-control" name="title" id="article-title" placeholder="Article title goes here" value="" required>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<label for="img">Upload article image</label>--}}
                            {{--<input type="file" name="img" id="fileToUpload" class="">--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<textarea class="form-control" rows="20" name="body" id="article-body" value="" required></textarea>--}}
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