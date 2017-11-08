@extends('layouts.main')

@section('title','| View Post')

@section('content')

    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/articles">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Article ID: {{$article->id}}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <h1>{!! $article->title !!}</h1>

            <p class="lead">{!! $article->intro_text !!}</p>
            <p class="lead">{!! $article->main_text !!}</p>
        </div>
     

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($article->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ date('M j, Y H:i', strtotime($article->updated_at)) }}</dd>
                </dl>
                <hr>
                 @if(Auth::check())
                 @if(Auth::user()->id == $article->user_id)
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('articles.edit', 'Edit', array($article->id), array('class' => "btn btn-primary btn-block")) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['action' => ['ArticleController@destroy', $article->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close()!!}
                    </div>
                </div> 
                @endif
                @endif

                <div class="row">
                    <div class="col-md-12">
                        {{ Html::linkRoute('articles.index', '<< See All Articles', [], ['class' => 'btn btn-success btn-block', 'style' => 'margin-top:20px;' ])}}
                    </div>
                </div>       
            </div>
        </div>
    </div>

@endsection
