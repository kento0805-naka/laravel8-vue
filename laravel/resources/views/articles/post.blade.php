<div class="container">
  <v-card class="mx-auto mb-1" max-width="600">
    <v-card-title>
      <v-icon large left>mdi-account-circle</v-icon>
      <span class="title font-weight-light">{{ $article->user->name }}</span>
    </v-card-title> 
    <v-card-text class="headline font-weight-bold">{{ $article->body }}</v-card-text>
    <v-card-text class="headline">投稿日時 {{ $article->created_at->format('Y-m-d') }}</v-card-text>
    @if(Auth::id() === $article->user_id)
      <v-card-actions class="d-flex flex-row-reverse pr-4">
        <a class="dropdown-item text-danger" data-toggle="modal" data-target="#modal-delete-{{ $article->id }}" style="width: 10px;">
          <v-icon>mdi-delete</v-icon>
        </a>
      </v-card-actions>
    </v-card>
    <div id="modal-delete-{{ $article->id }}" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{ route('article.destroy', ['article' => $article]) }}">
            @csrf
            @method('DELETE')
            <div class="modal-body">
              投稿を削除します。よろしいですか？
            </div>
            <div class="modal-footer justify-content-between">
              <a class="btn btn-outline-grey" data-dismiss="modal">キャンセル</a>
              <button type="submit" class="btn btn-danger">削除する</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  @endif
</div>  

