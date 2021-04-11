<template>
  <v-card class="mx-auto mb-3" max-width="600">
    <v-card-title>
      <v-icon large left>mdi-account-circle</v-icon>
      <span class="title font-weight-light">{{ post.user }}</span>
    </v-card-title>
    <v-card-text class="headline font-weight-bold">{{ post.tweet }}</v-card-text>
    <v-card-text class="headline">投稿日時 {{ post.createdAt }}</v-card-text>
    <v-card-actions class="d-flex flex-row-reverse pr-4">
      <v-icon right @click="del" v-show="post.userId === this.authId">mdi-delete</v-icon>
      <span>2</span>
      <v-btn @click="like" icon color="pink">
        <v-icon>mdi-heart</v-icon>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: ["post", "authId"],
  data: function() {
    return {
      url: `users/${this.post.user}`
    };
  },
  methods: {
    del: function() {
      this.$emit("del");
    },
    like: function() {
      alert("Like it!");
    }
  }
};
</script>
<style>
</style>
