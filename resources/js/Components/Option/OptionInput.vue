<script setup lang="ts">
import { defineProps } from 'vue';

const props = defineProps<{value: string}>();
</script>

<template>
  <input
    :value="value"
    type="text"
    class="option-input-field"
    placeholder=""
  />
</template>

<style scoped>
.option-input-field {
  width: 30rem;
  height: 1.5rem;
  font-size: 0.75rem;
  color: #788397;
  padding-left: 0.5rem;
  border: 1px solid #DCE4EA;
  border-radius: 0.375rem;
  outline: none;
}
</style>
