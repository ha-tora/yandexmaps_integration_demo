<script setup lang="ts">
import StarEmpty from "@/../assets/icons/stars/star-empty.svg";
import StarFull from "@/../assets/icons/stars/star-full.svg";
import { defineProps } from "vue";

const props = defineProps<{ rating: number }>();
</script>

<template>
  <div class="review-card-stars">
    <template v-for="i in 5">
      <div v-if="i <= rating" class="review-card-stars-icon"><StarFull /></div>
      <div v-else class="review-card-stars-icon"><StarEmpty /></div>
    </template>
  </div>
</template>

<style lang="postcss" scoped>
.review-card-stars {
  @apply inline-grid items-center;
  grid-auto-flow: column;
  gap: 0.2rem;
}

.review-card-stars-icon {
  @apply shrink-0;
  width: 0.875rem;
  height: 0.875rem;
}
</style>
