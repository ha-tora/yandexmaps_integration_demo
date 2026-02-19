<script setup lang="ts">
import { defineEmits, defineProps } from 'vue'

const props = defineProps<{loading: boolean}>();
</script>

<template>
  <button type="submit" class="option-save-button">
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
