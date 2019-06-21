<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
<form action="post/create" methods="get">
{{ csrf_field() }}
  <input type="submit" value="新規投稿" class="btn btn-primary">
</form>
<div class="row">
  <div class="col-md-12">
    <h3 class="ops-title">投稿一覧</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-11 col-md-offset-1">
  <table class="table text-center">
      <tr>
        <th class="text-center">ID</th>
        <th class="text-center">リアクト</th>
        <th class="text-center">ユーザーID</th>
        <th class="text-center">親ID</th>
        <th class="text-center">次ID</th>
        <th class="text-center">タイトル</th>
        <th class="text-center">コンテンツ</th>
      </tr>
      @foreach($postList as $post)
      <tr>
      <td><a href="{{ url('post/'.$post->id) }}">{{ $post->id -1 }}</a></td>
      <td><form action="{{ url('post/'.$post->id) }}" method="get">
            <input type="hidden" name="type" value="reply">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align">ボタン</button>
          </form></td>
        <td>{{ $post->UserId }}</td>
        <td>{{ $post->toId }}</td>
        <td>{{ $post->nextId -1 }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td>
          <form action="{{ url('post/'.$post->id) }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @foreach($childList as $child)
      @if($child->toId == $post->id)
      <td><a href="{{ url('post/'.$child->id) }}">{{ $child->id -1 }}</a></td>
      <td><form action="{{ url('post/'.$child->id) }}" method="get">
            <input type="hidden" name="type" value="reply">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align">ボタン</button>
          </form></td>
        <td>{{ $child->UserId }}</td>
        <td>{{ $child->toId -1 }}</td>
        <td>{{ $child->nextId }}</td>
        <td>{{ $child->title }}</td>
        <td>{{ $child->content }}</td>
        <td>
          <form action="{{ url('post/'.$child->id) }}" method="post">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
          </form>
        </td>
      </tr>
      @endif
      @endforeach
      @endforeach
    </table>
  </div>
</div>
