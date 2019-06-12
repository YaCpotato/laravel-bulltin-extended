<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container">
    {{-- 編集・削除ボタン --}}
    <div class="edit">
        <a href="{{ url('post/'.$post->id.'/edit') }}" class="btn btn-primary">
        編集
        </a>
    </div>

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
</div>