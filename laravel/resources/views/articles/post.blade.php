<div class="container">
    <div class="card mb-2">
        <div class="card-header d-flex flex-row-reverse">
        </div>
        <div class="card-body">
					<div class="d-flex">
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
               <i class="fas fa-user-circle fa-3x mr-3"></i>
            </a>
            <a href="{{ route('users.show', ['name' => $article->user->name]) }}" class="text-dark">
              <div class="font-weight-bold">{{ $article->user->name }}</div>
						</a>
				  </div>
					<div class="card-title mt-4">{{ $article->body }}</div>
					<div class="card-text mt-3">投稿日時 {{ $article->created_at->format('Y-m-d') }}</div>
        </div>
    </div>
</div>

