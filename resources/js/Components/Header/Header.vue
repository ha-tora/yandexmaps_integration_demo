<script setup lang="ts">
import HeaderLogoutButton from '@/Components/Header/HeaderLogoutButton.vue'
</script>

<template>
  <header class="header">
    <HeaderLogoutButton />
  </header>
</template>

<style lang="postcss" scoped>
.header {
  @apply bg-white relative;
  height: 4.7rem;
  border-bottom: 0.0625rem solid #DCE4EA;
}
</style>