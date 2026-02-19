<script setup lang="ts">
import { defineProps, defineEmits } from "vue";

const props = defineProps<{ text: string }>();
const emit = defineEmits(["submit"]);

const onSubmit = () => {
  emit("submit");
};
</script>

<template>
  <button :click="onSubmit" class="auth-submit">{{ text }}</button>
</template>

<style lang="postcss">
.auth-submit {
  @apply font-semibold shadow-md;
  width: 12rem;
  height: 2.25rem;
  margin-top: 0.75rem;
  border-radius: 0.375rem;
  background: #339af0;
  color: #ffffff;
  font-size: 1rem;
  line-height: 1.25rem;
}
</style>
