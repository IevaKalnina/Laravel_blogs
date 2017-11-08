@extends('layouts.main')

@section('title', '| All Articles')

@section('content')

    <div class="row">
        <div class="col-md-9">
            <h1>All Articles</h1>
        </div>

        {{--  available only for signed in userss  --}}
        @if(Auth::check())
        <div class="col-md-3">
            <a href="{{ route('articles.create')}}" class="btn btn-primary" id="btn_create_article">Create New Article</a>
        </div>
        @endif
        <div class="col-md-12">
            <hr>
        </div>
    </div>{{--  end of the row  --}}

    <div class="row">
        <div class="col-md-12" style="vertical-align: top;">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Article<th>
                   <th>Author</th>
                    <th>CreatedAt</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th>{!! $article->id !!}</th>
                            <td> 
                                <p>{!! $article->title !!}</p>
                            </td>
                            <td> 
                                <p> {!!substr($article->intro_text, 0, 300)!!}{{strlen($article->intro_text) > 300 ? "..." : ""}}</p>
                            </td>
                            <td>
                                <p>{{ $article->author }}</p>
                            </td>
                            <td>{{ date('M j, Y', strtotime($article->created_at))}}</td>
                            <td><a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary btn-sm" id="button">View</a>
                            @if(Auth::check())
                            @if(Auth::user()->id == $article->user_id)
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm" id="button">Edit</a></td>
                            @endif
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="col-md-12" id="pagination">
            <ul>
                {!! $articles->links()!!}
            </ul>
            </div>
        </div>
    </div>

@endsection