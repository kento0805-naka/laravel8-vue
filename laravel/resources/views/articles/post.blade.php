<div class="container">
  <v-card class="mx-auto mb-1" max-width="600">
    <v-card-title>
      <v-icon large left>mdi-account-circle</v-icon>
      <span class="title font-weight-light">{{ $article->user->name }}</span>
    </v-card-title> 
    <v-card-text class="headline font-weight-bold">{{ $article->body }}</v-card-text>
    <v-card-text class="headline">投稿日時 {{ $article->created_at->format('Y-m-d') }}</v-card-text>
    <v-card-actions class="d-flex flex-row-reverse pr-4">
      <span>2</span>
      <v-btn icon onclick="alert('ログインが必要です。')">
        <v-icon>mdi-heart</v-icon>
      </v-btn>
    </v-card-actions>
  </v-card>
</div>  

