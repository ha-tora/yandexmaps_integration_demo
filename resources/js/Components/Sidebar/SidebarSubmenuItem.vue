<script setup lang="ts">
import { defineProps, computed } from 'vue';
import { Link } from '@inertiajs/vue3';

interface Props {
  name: string;
  route: string;
}

const props = defineProps<Props>();
const isActive = computed<boolean>(() => {
  return route().current() === props.route;
})
const url = computed(() => route(props.route));
</script>

<template>
  <div class="sidebar-submenu-item">
    <Link class="sidebar-submenu-button" :active="isActive" :href="url">
      {{ name }}
    </Link>
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-submenu-item {
  margin-top: 0.3rem;
}

.sidebar-submenu-button {
  @apply w-full rounded-2xl;
  height: 1.5rem;
  padding-left: 3rem;
  font-size: 0.75rem;
  color: #363740;
  display: flex;
  align-items: center;
}

.sidebar-submenu-button:hover {
  @apply transition duration-500 hover:shadow-md hover:bg-white;
}

.sidebar-submenu-button[active="true"] {
  @apply shadow-md bg-white
}
</style>
