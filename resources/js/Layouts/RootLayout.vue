<template>
  <div class="flex">
    <Sidebar />
    <main class="flex-1 p-6">
      <slot />
    </main>
  </div>
</template>

<script setup>
import Sidebar from '@/Components/Sidebar.vue'
</script>
