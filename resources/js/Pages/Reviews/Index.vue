<script setup lang="ts">
import ReviewCard from "@/Components/Review/ReviewCard.vue";
import ReviewYandexMapsButton from "@/Components/Review/ReviewYandexMapsButton.vue";
import ReviewRatingCard from "@/Components/Review/ReviewRatingCard.vue";
import BaseLayout from "@/Layouts/BaseLayout.vue";
import { useReviews } from "@/composables/useReviews";
import { useRating } from "@/composables/useRating";
import { onMounted, defineProps } from "vue";

const props = defineProps<{business_url: string}>();

const { reviews, pagination, fetchReviews, loading: reviewsLoading } = useReviews();
const { rating, fetchRating, loading: ratingLoading } = useRating();

onMounted(() => {
  fetchReviews(1, 50);
  fetchRating();
});
</script>

<template>
  <BaseLayout>
    <div class="layout-main">
      <ReviewYandexMapsButton :href="business_url"/>
      <div class="reviews-grid">
        <div class="reviews-list">
          <ReviewCard v-for="review in reviews" :key="review.id" :review="review" />
        </div>
        <ReviewRatingCard v-if="rating" :rating="rating" />
      </div>
    </div>
  </BaseLayout>
</template>

<style lang="postcss" scoped>
.reviews-grid {
  @apply grid items-start;
  grid-template-columns: minmax(47.5rem, 1fr) 16.25rem;
  grid-template-rows: auto 1fr;
  column-gap: 1.25rem;
  row-gap: 0.5rem;
  font-size: 0.75rem;
  color: #363740;
}

.reviews-list {
  @apply flex flex-col;
  row-gap: 1.25rem;
}
</style>
