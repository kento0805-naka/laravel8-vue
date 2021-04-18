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
        @endif
    </div>
    <v-card-text class="headline font-weight-bold">{{ $user->description }}</v-card-text>
</v-card>