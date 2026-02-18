<script setup lang="ts">
import { Rating } from "@/types/rating";
import ReviewRatingCardStars from "@/Components/Review/ReviewRatingCardStars.vue";
import { defineProps } from "vue";

const props = defineProps<{rating: Rating}>();
</script>

<template>
  <aside v-if="rating" class="review-rating-card">
    <div class="review-rating-header">
      <div class="review-rating-count">{{ rating.stars_count }}</div>
      <ReviewRatingCardStars :rating="rating.stars_count" />
    </div>
    <div class="review-rating-total">Всего отзывов: {{ rating.reviews_count }}</div>    
  </aside>
</template>

<style lang="postcss" scoped>
.review-rating-card {
  background-color: #ffffff;
  border: 1px solid #e0e7ec;
  height: 9.5rem;
  box-shadow: 0px 3px 6px rgba(92, 101, 111, 0.3);
  border-radius: 0.75rem;
  border-radius: 0.75rem;
  padding: 1.5rem 1rem 1rem;
}

.review-rating-count {
  @apply font-medium;
  font-size: 2.5rem;
  line-height: 1;
  color: #363740;
}

.review-rating-total {
  @apply font-bold;
}

.review-rating-header {
  @apply flex items-center justify-center relative;
  column-gap: 0.75rem;
  padding-bottom: 2.125rem;
}

.review-rating-header::after {
  content: "";
  position: absolute;
  left: 0;
  right: 0;
  bottom: 1rem;
  height: 0.125rem;
  background: #f1f4f7;
}
</style>
