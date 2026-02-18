<script setup lang="ts">
import AuthInput from "@/Components/Auth/AuthInput.vue";
import AuthSubmitButton from "@/Components/Auth/AuthSubmitButton.vue";
import { reactive } from "vue";

const credentials = reactive<{
    email: string,
    password: string,
}>({
    email: '',
    password: ''
});
</script>

<template>
  <form class="auth-form">
    <AuthInput
      label="Email"
      key="email"
      :value="credentials.email"
      type="email"
      autocomplete="email"
    />

    <AuthInput
      label="Пароль"
      key="password"
      :value="credentials.password"
      type="password"
      autocomplete="current-password"
    />
    
    <AuthSubmitButton text="Войти"/>
  </form>
</template>

<style lang="postcss">
.auth-form {
  @apply flex flex-col items-center;
}
</style>
