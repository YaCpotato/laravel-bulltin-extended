<head>
  <title>Laravel Sample</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<div class="container">
    <form action="{{ url('post') }}" method="POST">
    {{ csrf_field() }}
        @method('POST')
        <div class="form-group">
            <label for="content">{{ __('content') }}</label>
            <textarea id="content" class="form-control" name="content" rows="8" required></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">投稿</button>
    </form>
</div>