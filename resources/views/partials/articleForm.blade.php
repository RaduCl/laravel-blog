<div class="row ">

    <div class="form-group">
        {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'article-title', 'placeholder' => 'Article title goes here']) !!}
    </div>

    <div class="form-group">
        {!! Form::select('tag_list[]', $tags, null, ['class' => 'form-control', 'multiple', 'id' => 'tag_list']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('img', 'Upload article image') !!}
        {!! Form::file('img') !!}
    </div>

    @if (!isset($article))
    <div class="form-group">
        {!! Form::textarea('body', null, [
            'class' => 'form-control',
            'id' => 'article-body',
            'rows' => '20',
            'placeholder' => 'Article body goes here'
        ]) !!}
    </div>
    @else
    <div class="form-group">
        <textarea class="form-control" rows="20" name="body" id="article-body" placeholder="Article body goes here" value="">{{ strip_tags(str_replace('</p>', "\n", $article->body))}}</textarea>
    </div>
    @endif
    <button type="submit" class="btn btn-primary pull-right">Submit</button>
</div>

@section('header')
    <!-- Select js for Form Select -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('footer')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script>
        $(tag_list).select2();
    </script>
@endsection