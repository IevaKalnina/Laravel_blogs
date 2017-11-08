@extends('layouts.main')

@section('title', '| Edit Blog Post')

@section('content')
    
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/articles">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit / Article ID: {{$article->id}}</li>
        </ol>
    </nav>

    <div class="row">      
        <div class="col-md-8">
            {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' =>'PUT']) !!}

            {{ Form::label('title', 'Title:')}}
            {{ Form::text('title', null,["class" => 'form-control input-lg'])}}
            
            {{ Form::label('intro_text', 'Intro text:',  ['class' => 'form-spacing-top'])}}
            {{ Form::textarea('intro_text', null, ["class" => 'form-control'])}}
            
            {{ Form::label('main_text', 'Main text:', ['class' => 'form-spacing-top'])}}
            {{ Form::textarea('main_text', null, ["class" => 'form-control'])}} 

            {{--  {{Form::label('img','Image link:',  ['class' => 'form-spacing-top'])}}
            {{Form::text('img', null, ['class' => 'form-control', 'placeholder' => 'Example: <img src="">'])}}  --}}
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
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('articles.show', 'Cancel', array($article->id), array('class' => "btn btn-danger btn-block")) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block'])}}
                    </div>
                </div>        
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection