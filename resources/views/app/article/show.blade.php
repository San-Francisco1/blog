@extends('app.layouts.app')
@section('content')
<div id="app">
    <div class="row mt-5">
        <div class="col-12">
            <article-component></article-component>
            <img src="{{$article->img}}" class="border rounded mx-auto d-block" alt="...">
            <h5 class="mt-5">{{$article->title}}</h5>
            <p>
                @foreach($article->tags as $tag)
                    @if($loop->last)
                        <span class="tag">{{$tag->label}}</span>
                    @else
                        <span class="tag">{{$tag->label}} |</span>
                    @endif
                @endforeach
            </p>
            <p class="card-text">{{$article->body}}</p>
            <p>Опубликовано:  <i>{{$article->publishedAtForHumans()}}</i> </p>
            <div class="mt-3">
                <span class="badge bg-primary">{{$article->state->likes}} <i class="far fa-thumbs-up"></i> </span>
                <span class="badge bg-danger">{{$article->state->views}} <i class="far fa-eye"></i> </span>
            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <form action="">
            <div class="mb-3">
                <label for="commentSubject" class="form-label">Тема комментария</label>
                <input type="text" class="form-control" id="commentSubject">
            </div>
            <div class="mb-3">
                <label for="commentBody" class="form-label">Комментарий</label>
                <textarea type="text" class="form-control" id="commentBody" rows="3"></textarea>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>
        <div class="my_toast-container pb-5 mt-5 mx-auto">
            @foreach($article->comments as $comment)
                <div class="my_toast showing" style="width: 100%;">
                    <div class="my_toast-header">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/User-avatar.svg" class="rounded me-2" alt="...">
                        <strong class="me-auto">{{$comment->subject}}</strong>
                        <small class="text-muted">{{$comment->createdAtForHumans()}}</small>
                    </div>
                    <div class="my_toast-body">
                        {{$comment->body}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('vue')
    <script src=" {{ mix('/js/app.js') }} "></script>
@endsection
