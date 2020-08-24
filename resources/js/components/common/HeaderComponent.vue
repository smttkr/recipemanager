<template>
  <div>
    <div class="search-box mt-3">
      <div class="input-group">
        <input type="text" class="form-control" />
        <span class="input-group-btn">
          <button type="button" class="btn btn-primary">検索</button>
        </span>
      </div>
    </div>
    <div class="menu mt-1">
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
  </div>
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
.search-box {
  width: 30%;
}

.menu {
  font-size: 1.4rem;
  float: right;
}
.menu button {
  color: aliceblue;
}
.bookmark-box {
  width: 180px;
  top: 95%;
  right: 5px;
}
@media (max-width: 899px) {
  .logo {
    display: block;
  }
  .search-box {
    width: 90%;
  }

  .menu {
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
