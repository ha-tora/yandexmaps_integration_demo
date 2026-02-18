<script setup lang="ts">
import SidebarHead from "@/Components/Sidebar/SidebarHead.vue";
import SidebarMenu from "@/Components/Sidebar/SidebarMenu.vue";
</script>

<template>
  <aside class="sidebar">
    <SidebarHead />
    <SidebarMenu />
  </aside>
</template>

<style lang="postcss" scoped>
.sidebar {
  @apply fixed top-0 left-0;
  width: 17.5rem;
  height: 100vh;
  background-color: #F6F8FA;
}
</style>
