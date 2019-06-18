<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container">
@if($type != "reply")
    {{-- 編集・削除ボタン --}}
    <div class="edit">
        <a href="{{ url('post/'.$post->id.'/edit') }}" class="btn btn-primary">
        編集
        </a>
    </div>
@else
    {{-- 記事内容 --}}
    <dl class="row">
        <dd class="col-md-10">
            <time itemprop="dateCreated" datetime="{{ $post->created_at }}">
                {{ $post->created_at }}
            </time>
        </dd>
    </dl>
    <hr>
    <div id="post-content">
        {{ $post->content }}
    </div>
@endif
    @if($type == "reply")
        <span>{{ $post->content }}へのリアクトです</span>
        <div class="container">
        <form action="{{ url('post') }}" method="POST">
        <input type="hidden" name="id" value="{{ $post->id }}">
        {{ csrf_field() }}
            @method('POST')
            <div class="form-group">
                <label for="content">{{ __('content') }}</label>
                <textarea id="content" class="form-control" name="content" rows="8" required></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">投稿</button>
        </form>
    </div>
    @endif
</div>