<script setup lang="ts">
import { ref, defineProps, defineEmits } from "vue";
import SidebarSubmenuItem from "@/Components/Sidebar/SidebarSubmenuItem.vue";

interface Props {
  items: array<{
    name: string,
    route: string,
  }>;
}

const props = defineProps<Props>();
</script>

<template>
  <div class="sidebar-submenu">
    <SidebarSubmenuItem v-for="item in items" :key="item.name" :name="item.name" :route="item.route" />
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-submenu {
  margin-top: 0.6rem;
}
</style>

