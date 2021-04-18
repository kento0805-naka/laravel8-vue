<v-card class="mx-auto mb-3" max-width="800">
    <div class="d-flex justify-content-between">
        <v-card-title>
            <v-icon large left>mdi-account-circle</v-icon>
            <span class="title font-weight-light">{{ $user->name }}</span>
        </v-card-title>
        @if (Auth::id() === $user->id)
            <a class="text-muted mt-2" href="{{ route('users.edit', ['name' => $user->name ]) }}">
                <button class="btn btn-sm btn-outline-primary rounded">自己紹介文を編集</button>
            </a>
        @else
            <follow-button
              class="ml-auto mt-3 mr-3"
              :initial-is-followed-by='@json($user->isFollowedBy(Auth::user()))'
              :authorized='@json(Auth::check())'
              endpoint="{{ route('users.follow', ['name' => $user->name]) }}"
            >
            </follow-button>
        @endif
    </div>
    <v-card-text class="headline font-weight-bold">{{ $user->description }}</v-card-text>
    <div class="ml-3 mb-3 pb-3">
       <a class="mr-2">{{ $user->count_followings }} フォロー</a> 
       <a class="mr-2">{{ $user->count_followers }} フォロワー </a> 
        <a class="mr-2">{{ $user->articles->count()}} ツイート</a>
    </div>
</v-card>