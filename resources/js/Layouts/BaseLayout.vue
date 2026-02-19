<script setup lang="ts">
import Header from "@/Components/Header/Header.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import { useAuth } from '@/composables/useAuth'
import { onMounted } from 'vue'

const { user, login, getUser } = useAuth();

onMounted(async () => {
  await getUser();
});
</script>

<template>
  <div class="layout">
    <Sidebar />
    <div class="layout-main">
      <Header />
      <div class="layout-content">
        <slot />
      </div>
    </div>
  </div>
</template>


<style lang="postcss" scoped>
@import url('https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap');

.font-sans {
  font-family: "Mulish", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
}

.layout {
  @apply flex;
  font-family: 'Mulish', sans-serif;
}

.layout-main {
  @apply flex flex-col flex-1;
  margin-left: 17.5rem;
}

.layout-content {
  @apply bg-white;
  margin-left: 2rem;
  margin-top: 1rem;
  margin-right: 2rem;
}
</style>