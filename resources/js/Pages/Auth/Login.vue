<script setup lang="ts">
import AuthLayout from "@/Layouts/AuthLayout.vue";
import LoginForm from "@/Components/Auth/LoginForm.vue";
</script>

<template>
  <AuthLayout>
    <div class="auth-card">
      <div class="auth-title">Вход</div>

      <LoginForm />

      <div class="auth-footer">
        <span class="auth-footer-text">Нет аккаунта?</span>
        <a class="auth-link" href="#">Зарегистрироваться</a>
      </div>
    </div>
  </AuthLayout>
</template>

<style lang="postcss">
.auth-card {
  @apply shadow-md;
  background: #ffffff;
  border-radius: 0.75rem;
  padding: 2rem;
}

.auth-title {
  @apply font-bold text-center;
  margin: 0.75rem 0 1.75rem;
  font-size: 1.5rem;
  line-height: 2rem;
  color: #252733;
}

.auth-footer {
  @apply flex items-center justify-center;
  margin-top: 0.75rem;
  column-gap: 0.25rem;
  font-size: 0.75rem;
  line-height: 1rem;
  color: #252733;
}

.auth-footer-text {
  @apply font-semibold;
}

.auth-link {
  @apply font-semibold;
  color: #252733;
  text-decoration: underline;
  text-underline-offset: 0.2rem;
}
</style>
