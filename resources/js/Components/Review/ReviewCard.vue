<script setup lang="ts">
import GeoMark from "@/../assets/icons/geomark.svg";
import ReviewCardStars from "@/Components/Review/ReviewCardStars.vue";
import moment from "moment";
import { defineProps, computed } from "vue";
import { Review } from "@/types/review";
import { Link } from "@inertiajs/vue3";

const props = defineProps<{ review: Review }>();

const date = computed(() => {
  return moment(props.review.created_at).format("DD.MM.YYYY HH:mm:ss");
});

const text = computed(() => {
  if (!props.review.text) return "";
  return props.review.text.length > 420
    ? props.review.text.slice(0, 450) + "..."
    : props.review.text;
});
</script>

<template>
  <article class="review-card">
    <div class="review-card-head">
      <div class="review-card-date">
        <div class="review-card-date-text">{{ date }}</div>
        <Link class="review-card-branch">Филиал 1</Link>
        <div class="review-card-pin">
          <GeoMark />
        </div>
      </div>

      <ReviewCardStars :rating="review.rating"/>
    </div>

    <div class="review-card-author">
      <div class="review-card-author-name">
        {{ review.author.name }}
      </div>
      <div class="review-card-author-phone">
        <!-- Где брать номер? -->
      </div>
    </div>

    <div class="review-card-text">{{ text }}</div>
  </article>
</template>

<style lang="postcss" scoped>
.review-card {
  background-color: #ffffff;
  border: 1px solid #e0e7ec;
  height: 9.5rem;
  box-shadow: 0px 3px 6px rgba(92, 101, 111, 0.3);
  border-radius: 0.75rem;
  padding-top: 1.125rem;
  padding-right: 1.5rem;
  padding-bottom: 2rem;
  padding-left: 1rem;
}

.review-card-head {
  @apply flex items-start justify-between;
  column-gap: 1rem;
}

.review-card-date {
  @apply flex items-center font-bold;
  column-gap: 0.5rem;
  line-height: 1;
}

.review-card-date-text {
  @apply font-bold;
  white-space: nowrap;
}

.review-card-branch {
  @apply font-bold;
  white-space: nowrap;
}

.review-card-pin {
  @apply shrink-0;
  width: 0.875rem;
  height: 0.875rem;
}

.review-card-author {
  @apply inline-flex;
  margin-top: 0.625rem;
  line-height: 1;
}

.review-card-author-name {
  @apply font-bold;
}

.review-card-author-phone {
  @apply font-bold;
  font-size: 0.625rem;
  margin-left: 0.75rem;
}

.review-card-text {
  @apply font-normal;
  margin-top: 0.625rem;
  color: #000000;
  line-height: 1.25rem;
}
</style>
