@extends('layouts.master');
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Update Article</h6>
        </div>
        <div class="card-body">
            <form action="https://localhost/quiz-3-im-laravel-juni-2020/public/article/{{$article->article_id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="title" placeholder="Title" name="title" value="{{$article->title}}">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-user" id="content" placeholder="Content" cols="3" name="content">{{$article->content}}</textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tag" placeholder="Tag" name="tag" value="{{$article->tag}}">
                    <span>*Separated by commas (,)</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-user btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
