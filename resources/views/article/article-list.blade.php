@extends('layouts.master');

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Article</h1>
        <a href="article/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Article</a>
    </div>
    @foreach ($articles as $article)
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$article->title}}</h6>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    {{$article->content}}
                </div>
            <br>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <a href="article/{{$article->article_id}}" class="btn btn-primary btn-icon-split btn-block">
                            <span class="text">View</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="article/{{$article->article_id}}/edit" class="btn btn-warning btn-icon-split btn-block">
                            <span class="text">Edit</span>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <form action="article/{{$article->article_id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-icon-split btn-block">
                                <span class="text">Delete</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        Swal.fire({
            title: 'Berhasil!',
            text: 'Memasangkan script sweet alert',
            icon: 'success',
            confirmButtonText: 'Cool'
        });
        console.log('DOM fully loaded and parsed');
    });

</script>

@endpush
