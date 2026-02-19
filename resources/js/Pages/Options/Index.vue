<script setup lang="ts">
import BaseLayout from "@/Layouts/BaseLayout.vue";
import OptionCard from '@/Components/Option/OptionCard.vue'
import OptionSaveButton from '@/Components/Option/OptionSaveButton.vue'
import { Option } from '@/types/option'
import { onMounted } from 'vue'
import { useValidation } from '@/composables/useValidation'
import { useOptions } from '@/composables/useOptions'

interface Props{
  options: Array<Option>
}

const props = defineProps<Props>();

const { options, loading, updateOptions } = useOptions();
options.value = props.options;  

const validationRules = Object.fromEntries(Object.entries(options.value).map(([key, option]) => {
  return [option.key, option.validationRules];
}))

const values = Object.fromEntries(options.value.map((option) => {
  return [option.key, option.value];
}));

const { errors, validate, setErrors } = useValidation(validationRules);


const submit = async () => {
  // loading.value = true;

  // if (!validate(form.value)) {
  //   return (loading.value = false);
  // }

  //   await updateOptions();
};

</script>

<template>
  <BaseLayout>
    <OptionCard v-for="option in options" :key="option.key" :option="option"/>

    <OptionSaveButton :loading="loading" @click="submit"/>
  </BaseLayout>
</template>
