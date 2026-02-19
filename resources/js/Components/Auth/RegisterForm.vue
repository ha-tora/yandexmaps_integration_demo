<script setup lang="ts">
import AuthInput from "@/Components/Auth/AuthInput.vue";
import AuthSubmitButton from "@/Components/Auth/AuthSubmitButton.vue";
import { router } from "@inertiajs/vue3";
import { useAuth } from '@/composables/useAuth';
import { ref, reactive } from "vue";
import { RegisterUserDTO } from "@/types/user";

const user = reactive<RegisterUserDTO>({
  name: "",
  email: "",
  password: "",
});
const error = ref<string>();
const loading = ref<boolean>(false);

const { register } = useAuth();

const onSubmit = async () => {
  error.value = undefined;
  loading.value = true;

  try {
    await register(user);
    router.visit(route("home"));
  } catch (e) {
    error.value = "Неверный формат данных";
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <form @submit.prevent="onSubmit" class="auth-form">
    <AuthInput
      label="Имя"
      key="name"
      :value="user.name"
      type=""
      autocomplete=""
      @update:value="(name) => (user.name = name)"
    />

    <AuthInput
      label="Email"
      key="email"
      :value="user.email"
      type="email"
      autocomplete="email"
      @update:value="(email) => (user.email = email)"
    />

    <AuthInput
      label="Пароль"
      key="password"
      :value="user.password"
      type="password"
      autocomplete="current-password"
      @update:value="(password) => (user.password = password)"
    />

    <AuthSubmitButton text="Зарегистироваться" />
  </form>
</template>

<style lang="postcss">
.auth-form {
  @apply flex flex-col items-center;
}
</style>
