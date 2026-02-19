<script setup lang="ts">
import AuthInput from "@/Components/Auth/AuthInput.vue";
import AuthSubmitButton from "@/Components/Auth/AuthSubmitButton.vue";
import { router } from "@inertiajs/vue3";
import { useAuth } from "@/composables/useAuth";
import { ref, reactive } from "vue";
import { Credentials } from "@/types/user";

const credentials = reactive<Credentials>({
  email: "",
  password: "",
});
const error = ref<string>();
const loading = ref<boolean>(false);

const { login } = useAuth();

const onSubmit = async () => {
  error.value = undefined;
  loading.value = true;
  
  try {
    await login(credentials);
    router.visit(route("home"));
  } catch (e) {
    error.value = "Неверный логин или пароль";
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <form @submit.prevent="onSubmit" class="auth-form">
    <AuthInput
      label="Email"
      key="email"
      :value="credentials.email"
      type="email"
      autocomplete="email"
      @update:value="(email) => (credentials.email = email)"
    />

    <AuthInput
      label="Пароль"
      key="password"
      :value="credentials.password"
      type="password"
      autocomplete="current-password"
      @update:value="(password) => (credentials.password = password)"
    />

    <AuthSubmitButton text="Войти" />
  </form>
</template>

<style lang="postcss">
.auth-form {
  @apply flex flex-col items-center;
}
</style>
