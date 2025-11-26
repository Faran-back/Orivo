<script setup>

defineProps({
  name: String,       
  error: String        
})

</script>

<template>
  <div class="flex flex-col gap-1 w-full">
    <slot />             <!-- Input + Label will be inserted here -->
    <slot name="description" />
    <slot name="error" />
  </div>
</template>
