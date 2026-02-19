<script setup lang="ts">
import SidebarSubmenu from "@/Components/Sidebar/SidebarSubmenu.vue";
import { defineProps, computed, defineAsyncComponent } from "vue";

interface Props {
  id: string;
  name: string;
  items: Array<{
    name: string;
    route: string;
  }>;
}

const props = defineProps<Props>();

const icons = import.meta.glob("/resources/assets/icons/menu/*.svg", { eager: true });

const icon = computed(() => {
  return icons[`/resources/assets/icons/menu/${props.id}.svg`]?.default ?? undefined;
});
</script>

<template>
  <div class="sidebar-menu-item">
    <button class="sidebar-menu-button">
      <component :is="icon" class="sidebar-menu-icon" />
      <span class="sidebar-menu-text">{{ name }}</span>
    </button>

    <SidebarSubmenu :items="items"/>
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-menu-item {
  width: 15.6rem;
}

.sidebar-menu-button {
  @apply flex items-center shadow-md rounded-2xl bg-white;
  width: 15.6rem;
  height: 3rem;
  color: #363740;
}

.sidebar-menu-icon {
  width: 3rem;
  height: 3rem;
  padding: 0.75rem;
}
</style>
