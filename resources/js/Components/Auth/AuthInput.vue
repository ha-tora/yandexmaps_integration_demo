<script setup lang="ts">
import { defineProps } from "vue";

interface Props {
  label: string;
  key: string;
  value: string;
  type: string;
  autocomplete: string | undefined;
}

const props = defineProps<Props>();

const emit = defineEmits(['update:value']);

const onUpdate = (event: Event) => {
  const target = event.target as HTMLInputElement
  emit('update:value', target.value);
}
</script>

<template>
  <label class="auth-field">
    <div class="auth-label">{{ label }}</div>
    <input class="auth-input" :type="type" :autocomplete="autocomplete" :value="value" @input="onUpdate"/>
  </label>
</template>

<style lang="postcss">
.auth-field {
  @apply flex flex-col;
  width: 17rem;
  row-gap: 0.375rem;
}

.auth-field + .auth-field {
  margin-top: 1.25rem;
}

.auth-label {
  @apply font-medium;
  font-size: 0.75rem;
  line-height: 1rem;
  color: #6c757d;
}

.auth-input {
  @apply w-full;
  height: 2.25rem;
  background: #ffffff;
  border: 1px solid #dce4ea;
  border-radius: 0.375rem;
  padding: 0 0.75rem;
  color: #252733;
  outline: none;
  font-size: 1rem;
}
</style>
