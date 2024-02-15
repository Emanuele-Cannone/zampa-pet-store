@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('article.article_vendor') .' - '.$article->id }}</h1>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="{{ route('articles.update', $article) }}">
        @csrf
        @method('PUT')
        @include('article.partials.form')

        <div class="d-flex justify-content-end py-2">
            <button type="submit" class="btn btn-warning">{{ __('common.edit') }}</button>
        </div>
    </form>
    <!-- /.content -->
@endsection
