<template>
  <header class="bg-light cf">
    <h1 class="logo">RecipeManager</h1>
    <div class="user">
      <span>testman</span>
      <span class="logout-btn ml-4"><a href="">ログアウト</a></span>
    </div>
    <div class="search-box mt-5">
      <div class="input-group mt-4">
        <input type="text" class="form-control" />
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary">検索</button>
        </span>
      </div>
    </div>
    <div class="menu">
      <button type="button" class="btn btn-outline-secondary btn-sm">
        新規作成
      </button>
      <button type="button" class="btn btn-outline-secondary btn-sm ml-2">
        ユーザー一覧
      </button>
      <button
        type="button"
        class="btn btn-outline-secondary btn-sm ml-2"
        @click="openBookmark"
      >
        ブックマーク
      </button>
      <bookmark-component :bookmarkShow="bookmarkShow"></bookmark-component>
    </div>
  </header>
</template>

<script>
export default {
  data() {
    return {
      bookmarkShow: false,
    };
  },
  methods: {
    openBookmark() {
      if (this.bookmarkShow === false) {
        this.bookmarkShow = true;
        setTimeout(this.closeBookmark, 4000);
      } else {
        this.bookmarkShow = false;
      }
    },
    closeBookmark() {
      this.bookmarkShow = false;
    },
  },
};
</script>

<style scoped>
header {
  padding: 20px 40px;
  position: relative;
}
header .logo {
  display: inline-block;
}
header .search-box {
  width: 30%;
}
header .user {
  float: right;
  margin-top: 10px;
  font-size: 1.4rem;
}

header .menu {
  font-size: 1.4rem;
  float: right;
}
header .bookmark-box {
  width: 180px;
  top: 95%;
  right: 5px;
}

@media (max-width: 899px) {
  header .logo {
    display: block;
  }
  header .search-box {
    width: 90%;
  }
  header .user {
    font-size: 1rem;
  }
  header .menu {
    margin-top: 10px;
    float: none;
    text-align: center;
  }
  header .bookmark-box {
    width: 100px;
    min-height: 100px;
  }
}
</style>
