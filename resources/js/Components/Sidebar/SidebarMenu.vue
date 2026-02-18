<script setup lang="ts">
import SidebarMenuItem from "@/Components/Sidebar/SidebarMenuItem.vue";
import { ref } from "vue";

const menu = ref([
  {
    id: "reviews",
    name: "Отзывы",
    items: [
      {
        name: "Отзывы",
        route: "reviews.index",
      },
      {
        name: "Настройка",
        route: "options.index",
      },
    ],
  },
]);
</script>

<template>
  <div class="sidebar-menu">
    <SidebarMenuItem
      v-for="item in menu"
      :key="item.id"
      :id="item.id"
      :name="item.name"
      :items="item.items"
    />
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-menu {
  margin: 1.75rem 1rem 0;
}
</style>
