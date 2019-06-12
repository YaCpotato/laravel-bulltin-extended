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
        <th class="text-center"><th>
        <th class="text-center">ID</th>
        <th class="text-center">ユーザーID</th>
        <th class="text-center">タイトル</th>
        <th class="text-center">コンテンツ</th>
      </tr>
      @foreach($posts as $post)
      <tr>
      <td></td>
      <td>
          <a href="{{ url('post/'.$post->id) }}">{{ $post->id }}</a>
        </td>
        <td>{{ $post->UserId }}</td>
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
      @endforeach
    </table>
  </div>
</div>
