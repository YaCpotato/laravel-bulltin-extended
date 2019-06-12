<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>内容編集</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <form action="{{ url('post/'.$post->id) }}" method="post">
            @csrf
            @method('PUT')
            <input name="_method" type="hidden" value="PUT">
                <div class="form-group">
                    <label for="content">内容</label>
                    <input type="text" class="form-control" name="content">
                </div>
                <button type="submit" class="btn btn-default">登録</button>
                <a href="/post">戻る</a>
            </form>
        </div>
    </div>
</div>