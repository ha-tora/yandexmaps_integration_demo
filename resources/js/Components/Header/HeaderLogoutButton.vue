<script setup lang="ts">
import LogoutIcon from '@/../assets/icons/logout.svg';
</script>

<template>
  <button class="header-logout">
    <LogoutIcon class="header-logout-icon" />
  </button>
</template>

<style lang="postcss" scoped>
.header-logout {
  @apply absolute;
  top: 1rem;
  right: 2.75rem;
  width: 2.75rem;
  height: 2.75rem;
}

.header-logout-icon {
  width: 2.75rem;
  height: 2.75rem;
}
</style>
