<script setup>
defineProps({
  for: String,
  label: String
})
</script>

<template>
  <label :for="for" class="text-sm font-medium">
    {{ label }}
  </label>
</template>