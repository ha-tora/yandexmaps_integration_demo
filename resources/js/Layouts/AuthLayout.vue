<script setup lang="ts">
import Logo from "@/../assets/logo.svg";
</script>

<template>
  <div class="auth">
    <div class="auth-container">
      <div class="auth-logo">
        <Logo />
      </div>

      <slot />
    </div>
  </div>
</template>

<style lang="postcss">
@import url("https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap");

.font-sans {
  font-family: "Mulish", sans-serif;
  font-optical-sizing: auto;
  font-style: normal;
}

.auth {
  @apply min-h-screen;
  background: #f6f8fa;
  font-size: 0.75rem;
}

.auth-container {
  @apply min-h-screen flex flex-col items-center justify-center;
  row-gap: 2rem;
  padding: 2rem 1rem;
}

.auth-logo {
  @apply flex items-center justify-center;
  width: 15rem;
  height: 2.625rem;
}
</style>
