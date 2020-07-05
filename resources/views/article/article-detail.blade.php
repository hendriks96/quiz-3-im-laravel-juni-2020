@extends('layouts.master');

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Article Detail</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$article->title}}</h6>
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <span>{{$article->content}}</span>
            </div>
            <div class="col-md-12">
                <span>{{$article->slug}}</span>
            </div>

            <div class="col-md-12">
                <div class="row">
                    @foreach ($article->tags as $itemTag)
                        <div class="col-sm-2" style="margin-top: 12px;">
                            <a href="#" class="btn btn-icon-split btn-success btn-block">
                                <span class="text">{{$itemTag}}</span>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

@endsection
