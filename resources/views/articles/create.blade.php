@extends('layouts.main')

@section('title', '| Create New Article')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')
    <div class="container">

            {{--  breadcrumb  --}}
            <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/articles">Articles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create New Article</li>
            </ol>
            </nav>

        {{--  <div class="row">  --}}
            <div class="col-md-10 col-md-offset-1">
                <h2>Create New Article</h2>
                <hr> 

                {{--  open a form  --}}
                {!! Form::open(array('route' => 'articles.store', 'data-parsley-validate' => '')) !!}
                    
                    {{Form::label('title','Title:')}}
                    {{Form::text('title', null, array('class' => 'form-control', 'style' => 'margin-bottom: 20px;', 'required' => '', 'maxlength'=> '255'))}}

                    {{Form::label('intro_text','Intro text:')}}
                    {{Form::textarea('intro_text', null, array('class' => 'form-control', 'style' => 'margin-bottom: 20px;', 'required' => ''))}}

                    {{Form::label('main_text','Main text:')}}
                    {{Form::textarea('main_text', null, array('class' => 'form-control', 'style' => 'margin-bottom: 20px;', 'required' => ''))}}

                   {{--   {{Form::label('img','Image link:')}}
                    {{Form::text('img', null, array('class' => 'form-control', 'placeholder' => 'Example: <img src="">'))}}  --}}
                    

                    {{Form::submit('Create Article', array('class' =>'btn btn-success btn-lg', 'style' => 'margin-top: 20px;'))}}

                {{--  close a form  --}}
                {!! Form::close() !!}
            </div>
      {{--    </div>  --}}
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js')!!}
@endsection

