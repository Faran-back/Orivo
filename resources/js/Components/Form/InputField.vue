<script setup>
import FormLabel from './FormLabel.vue'
import FormMessage from './FormMessage.vue'

defineProps({
  modelValue: String,
  label: String,
  width: String,
  name: String,
  placeholder: String,
  type: { type: String, default: 'text' },
  error: String
})

defineEmits(['update:modelValue'])
</script>

<template>
  <div :class="['flex flex-col', width]">
    <FormLabel :for="name" :label="label" />

    <input
      :id="name"
      :type="type"
      :value="modelValue"
      :placeholder="placeholder"
      @input="$emit('update:modelValue', $event.target.value)"
      :class="[
        'w-full px-4 py-3 mb-1 rounded-lg border transition-all focus:outline-none focus:ring-2 focus:ring-black focus:border-black dark:bg-gray-800 dark:text-gray-100',
        error ? 'border-red-500 focus:ring-red-500' : 'border-gray-300'
      ]"
    />

    <FormMessage :message="error" />
  </div>
</template>
