@extends('layouts.master');
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Article</h6>
        </div>
        <div class="card-body">
            <form action="https://localhost/quiz-3-im-laravel-juni-2020/public/article" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="title" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-user" id="content" placeholder="Content" cols="3" name="content"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tag" placeholder="Tag" name="tag">
                    <span>*Separated by commas (,)</span>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
