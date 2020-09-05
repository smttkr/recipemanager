<template>
  <transition name="slide-y">
    <div v-if="show" @click.self="close" class="edit-modal-bg">
      <form
        v-if="editType === 'name'"
        key="name"
        ref="nameEdit"
        :action="'/users/' + userId"
        method="POST"
        class="edit-form"
      >
        <input type="hidden" name="_token" :value="csrf" />
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="type" value="name" />
        <label>ニックネーム</label><br />
        <small class="text-danger">{{ errors }}</small>
        <input
          type="text"
          name="name"
          class="form-control"
          v-model.trim="name"
          autofocus
          autocomplete="off"
          placeholder="6文字以内"
        />
        <div class="btn-box my-1">
          <button
            type="button"
            @click="close"
            class="btn btn-outline-dark mx-2"
          >
            キャンセル
          </button>
          <button
            @click="validate('name', $event)"
            type="button"
            :disabled="processing"
            class="btn btn-primary my-1"
          >
            送信
          </button>
        </div>
      </form>

      <form
        enctype="multipart/form-data"
        v-if="editType === 'image'"
        key="image"
        ref="imageEdit"
        :action="'/users/' + userId"
        method="POST"
        class="edit-form"
      >
        <input type="hidden" name="_token" :value="csrf" />
        <input type="hidden" name="_method" value="PUT" />
        <input type="hidden" name="type" value="image" />
        <img v-show="imageData" :src="imageData" alt="" class="preview" />
        <label>プロフィール画像</label>
        <small class="text-danger">
          {{ errors }}
        </small>
        <input
          @change="onFileChange"
          type="file"
          name="profile_image"
          class="form-control"
          autofocus
          autocomplete="off"
          accept="image/*"
        />
        <div class="btn-box my-1">
          <button
            type="button"
            @click="close"
            class="btn btn-outline-dark mx-2"
          >
            キャンセル
          </button>
          <button
            @click="validate('image', $event)"
            :disabled="processing"
            type="button"
            class="btn btn-primary my-1"
          >
            送信
          </button>
        </div>
      </form>
    </div>
  </transition>
</template>

<script>
export default {
  props: ["show", "userId", "editType", "csrf"],
  data() {
    return {
      name: "",
      errors: "",
      imageData: "",
    };
  },
  methods: {
    onFileChange(e) {
      let files = e.target.files;
      if (files.length > 0) {
        let file = files[0];
        let reader = new FileReader();
        reader.onload = (e) => {
          this.imageData = e.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
    validate(type) {
      this.startProcessing();
      let error = "";
      if (type === "name") {
        let n = this.name;
        if (n.length < 1) {
          error = "入力されていません";
        } else if (n.length > 6) {
          error = "6文字を超えています";
        }
      }
      if (type === "image") {
        let i = this.imageData;
        if (i.length < 1) {
          error = "選択されていません";
        } else if (i.slice(0, 11) !== "data:image/") {
          error = "選択している形式が間違っています";
        }
      }

      if (error.length > 0) {
        this.errors = error;
        endProcessing();
      } else {
        this.submitUpdate(type);
      }
    },
    submitUpdate(type) {
      if (type === "name") {
        this.$refs.nameEdit.submit();
      } else if (type === "image") {
        this.$refs.imageEdit.submit();
      }
      this.close();
    },
    close() {
      this.$emit("close");
      this.errors = "";
      this.imageData = "";
    },
  },
};
</script>

<style scoped>
.edit-modal-bg {
  position: fixed;
  display: flex;
  background: rgba(0, 0, 0, 0.8);
  width: 100%;
  height: 100%;
  left: 0;
  top: 0;
  justify-content: center;
  align-items: center;
}
.edit-form {
  display: block;
  min-width: 250px;
  width: 35%;
  background-color: white;
  padding: 1% 1% 0.5%;
  border-radius: 6px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}
form .preview {
  display: block;
  margin: 0 auto;
  object-fit: cover;
  width: 200px;
  height: 200px;
}

.slide-y-enter-active {
  animation: slide-y-in 0.3s;
}
.slide-y-leave-active {
  animation: slide-y-in 0.3s reverse;
}

@keyframes slide-y-in {
  from {
    transform: translateY(-200%);
  }

  to {
    transform: translateY(0%);
  }
}

@media (max-width: 899px) {
  .input-group {
    width: 100%;
  }
}
</style>
