<script setup lang="ts">
import { defineProps, computed } from 'vue';
import { Link } from '@inertiajs/vue3'

interface Props {
  name: string;
  route: string;
}

const props = defineProps<Props>();
const isActive = computed(() => route().current(props.route));
const url = computed(() => route(props.route));
</script>

<template>
  <div class="sidebar-submenu-item">
    <Link class="sidebar-submenu-button" :class="{ active: isActive }" :href="url">
      {{ name }}
    </Link>
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-submenu-item {
  margin-top: 0.3rem;
}

.sidebar-submenu-button {
  @apply w-full rounded-2xl transition duration-300 hover:shadow-md hover:bg-white ;
  height: 1.5rem;
  padding-left: 3rem;
  font-size: 0.75rem;
  color: #363740;
  display: flex;
  align-items: center;
}

.sidebar-submenu-button:active {
  @apply shadow-md bg-white
}
</style>
