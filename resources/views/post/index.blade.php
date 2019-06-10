<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
<form action="post/create" methods="get">
{{ csrf_field() }}
  <input type="submit" value="新規投稿">
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
        <th class="text-center">ユーザーID</th>
        <th class="text-center">コンテンツ</th>
      </tr>
      @foreach($posts as $post)
      <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->UserId }}</td>
        <td>{{ $post->content }}</td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
