@extends('app.layouts.app')
@section('content')
<div id="app">
    <article-component></article-component>

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
    <script src="{{ mix('/js/app.js') }} "></script>
@endsection
