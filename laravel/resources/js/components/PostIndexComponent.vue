<template>
  <div class="container" style="width: 100%;">
    <div class="d-flex flex-row-reverse">
      <button type="button" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus fa-3x"></i>
      </button>
    </div>
    <post-card
      v-for="post in posts"
      :key="post.id"
      :post="post"
      @del="deletePost(post.id)"
      :auth-id="userId"
    ></post-card>
    <v-pagination dark v-model="page" :length="length" :total-visible="10"></v-pagination>
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">好きなことをつぶやこう！</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form v-on:submit.prevent="addNewPost" class="mb-4 mt-1">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" v-model="newTweet" />
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">投稿</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PostCard from "./PostCard";
export default {
  props: ["userName"],
  components: {
    PostCard
  },
  created() {
    this.getPosts();
  },
  data: function() {
    return {
      posts: [],
      name: this.userName.name,
      newTweet: "",
      date: "",
      userId: this.userName.id,
      postId: 1,
      page: 1,
      length: 0
    };
  },
  computed: {
    currentTime: function() {
      this.date = new Date();
      return this.date.toLocaleDateString();
    }
  },
  methods: {
    addNewPost: function() {
      let post = {
        id: this.postId++,
        user: this.name,
        tweet: this.newTweet,
        createdAt: this.currentTime,
        userId: this.userId
      };
      let posts = this.posts;

      if (this.newTweet == "") {
        alert("入力してください");
        return;
      }

      axios
        .post("/article", post)
        .then(function(res) {
          // TODO: article apiの受信データ処理を行う
        })
        .catch(function(err) {
          // TODO: エラー発生時の処理を行う
        });

      if (this.posts.length === 5) {
        this.posts.pop(4);
      }
      this.posts.unshift(post);
      this.newTweet = "";
    },
    getPosts: function() {
      let post = this.posts;
      let setPostId = this.setPostId;
      let setLength = this.setLength;
      let formatDate = this.formatDate;
      let length = this.length;
      let page = this.page;

      axios
        .get("/api/article/fetchAllArticles?page=" + page)
        .then(function(res) {
          res.data.data.forEach(function(article) {
            post.push({
              id: article.id,
              user: article.user_name,
              tweet: article.body,
              createdAt: formatDate(article.created_at),
              userId: article.user_id
            });
          });
          setLength(res.data.last_page);
        })
        .then(function(res) {
          setPostId(post[0].id);
        });
    },
    deletePost: function(id) {
      const judge = confirm("投稿を削除しますか？");

      if (!judge) {
        return;
      }

      let posts = this.posts;
      const selectedPost = posts.find(function(item) {
        return item.id === id;
      });

      posts.some(function(val, index) {
        if (val === selectedPost) {
          posts.splice(index, 1);
        }
      });

      axios
        .delete("/article/" + id)
        .then(function(res) {
          // TODO: article apiの受信データ処理を行う
        })
        .catch(function(err) {
          // TODO: エラー発生時の処理を行う
        });
    },
    setPostId: function(id) {
      this.postId += id;
    },
    setLength: function(num) {
      this.length = num;
    },
    formatDate: function(date) {
      return date
        .split("")
        .splice(0, 10)
        .join("");
    }
  },
  watch: {
    page: function(num) {
      this.posts = [];
      this.getPosts();
    }
  }
};
</script>

<style>
</style>
