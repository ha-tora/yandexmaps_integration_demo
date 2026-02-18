<script setup lang="ts">
import GeoMark from "@/../assets/icons/geomark.svg";
</script>

<template>
  <button type="button" class="review-card-yandex-maps-button">
    <div class="review-card-yandex-maps-button-icon"><GeoMark /></div>
    <div class="review-card-yandex-maps-button-text">Яндекс Карты</div>
  </button>
</template>

<style lang="postcss" scoped>
.review-card-yandex-maps-button {
  @apply inline-flex items-center;
  border: 1px solid #DCE4EA;
  background-color: #ffffff;
  border-radius: 0.5rem;
  height: 1.5rem;
  width: 7rem;
  margin-bottom: 0.5rem;
}

.review-card-yandex-maps-button-icon {
  @apply shrink-0;
  width: 0.875rem;
  height: 0.875rem;
  margin-left: 0.3rem;
}

.review-card-yandex-maps-button-text {
  margin-left: 0.3rem;
  line-height: 1;
  font-size: 0.75rem;
}
</style>
