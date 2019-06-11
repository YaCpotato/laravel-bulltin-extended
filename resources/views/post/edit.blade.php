<div class="container ops-main">
    <div class="row">
        <div class="col-md-6">
            <h2>書籍登録</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <form action="/post/{{ $post->id }}" method="post">
            {{ csrf_field() }}
            @method('POST')
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