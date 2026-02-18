<script setup lang="ts">
import { defineEmits, defineProps } from 'vue'

const props = defineProps<{loading: boolean}>();

const emit = defineEmits(['click']);

const onSubmit = async () => {
    emit('click');
}
</script>

<template>
  <button class="option-save-button" :click="onSubmit">
    Сохранить
  </button>
</template>

<style scoped>
.option-save-button {
  width: 8rem;
  height: 1.5rem;
  font-size: 0.75rem;
  background-color: #339AF0;
  color: #ffffff;
  border-radius: 0.375rem;
}
</style>
