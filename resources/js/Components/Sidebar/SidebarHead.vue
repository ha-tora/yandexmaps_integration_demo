<script setup lang="ts">
import SidebarHeadLogo from '@/Components/Sidebar/SidebarHeadLogo.vue'
import { useAuth } from '@/composables/useAuth'

const { user } = useAuth();
</script>

<template>
  <div class="sidebar-head">
    <SidebarHeadLogo />
    <div v-if="user" class="sidebar-account">
      {{ user.name }} 
    </div>
  </div>
</template>

<style lang="postcss" scoped>
.sidebar-logo {
  margin-top: 2rem;
  margin-left: 2rem;
  margin-right: 2rem;
}

.sidebar-account {
  margin-top: 1rem;
  margin-left: 1rem;
  font-weight: bold;
  color: #6C757D;
}
</style>
