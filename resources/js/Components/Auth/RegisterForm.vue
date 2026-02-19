<script setup lang="ts">
import AuthInput from "@/Components/Auth/AuthInput.vue";
import AuthSubmitButton from "@/Components/Auth/AuthSubmitButton.vue";
import { reactive } from "vue";

const user = reactive<{
    name: string,
    email: string,
    password: string,
}>({
    name: '',
    email: '',
    password: '',
});
</script>

<template>
  <form class="auth-form">
    <AuthInput
      label="Имя"
      key="name"
      :value="user.name"
      type=""
      autocomplete=""
    />

    <AuthInput
      label="Email"
      key="email"
      :value="user.email"
      type="email"
      autocomplete="email"
    />

    <AuthInput
      label="Пароль"
      key="password"
      :value="user.password"
      type="password"
      autocomplete="current-password"
    />
    
    <AuthSubmitButton text="Зарегистироваться"/>
  </form>
</template>

<style lang="postcss">
.auth-form {
  @apply flex flex-col items-center;
}
</style>
