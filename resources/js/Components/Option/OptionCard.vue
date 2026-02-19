<script setup lang="ts">
import OptionInput from '@/Components/Option/OptionInput.vue'
import { Option } from '@/types/option'
import { defineProps, defineEmits } from 'vue'

const props = defineProps<{option: Option}>();

const emit = defineEmits(['update:option']);

const onUpdate = (option: Option) => {
  emit('update:option', option);
}
</script>

<template>
  <div class="option-card">
    <h2 class="option-title">
      {{ option.title }}
    </h2>

    <p class="option-description">
      {{ option.description }}
    </p>

    <OptionInput :value="option.value" @update:value="(value) => { option.value = value }"/>
  </div>
</template>

<style lang="postcss" scoped>
.option-card {
  @apply flex flex-col;
  margin: 0 0 1rem;
}

.option-title {
  @apply font-semibold;
  font-size: 1rem;
  color: #252733;
}

.option-description {
  @apply font-semibold;
  margin: 1rem 0 0.5rem;
  font-size: 0.75rem;
  color: #6C757D;
}
</style>

