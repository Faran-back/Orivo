<script setup>
import FormLabel from './FormLabel.vue'
import FormMessage from './FormMessage.vue'

defineProps({
  modelValue: String,
  label: String,
  name: String,
  placeholder: String,
  type: { type: String, default: 'text' },
  error: String
})

defineEmits(['update:modelValue'])
</script>

<template>
  <FormLabel :for="name" :label="label" />
  <input
    :id="name"
    :type="type"
    :value="modelValue"
    :placeholder="placeholder"
    @input="$emit('update:modelValue', $event.target.value)"
    class="w-full border rounded-md px-3 py-2 outline-none transition-all
           focus:ring-2 focus:ring-black focus:border-black
           border-gray-300 dark:border-gray-700"
    :class="{'border-red-500 focus:ring-red-500': error}"
  />
  <FormMessage :message="error" />
</template>
