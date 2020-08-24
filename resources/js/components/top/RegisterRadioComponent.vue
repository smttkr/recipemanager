<template>
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">形態</label>
    <div class="col-md-6 d-flex align-items-center row">
      <label for="owner" class="text-center mb-0 col-6">
        <input
          type="radio"
          name="radio"
          id="owner"
          value="owner"
          @input="$emit('input', $event.target.value)"
        />オーナー</label
      >
      <label for="staff" class=" text-center mb-0 col-6">
        <input
          type="radio"
          name="radio"
          id="staff"
          value="staff"
          @input="$emit('input', $event.target.value)"
        />スタッフ</label
      >
    </div>
  </div>
</template>

<script>
export default {
  props: ["radio"],
};
</script>

<style></style>
