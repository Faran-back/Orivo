<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { sidebarLinks } from '@/constants.js'

const page = usePage()
const pathName = page.url

const isActive = (itemRoute) => {
  return pathName === itemRoute || pathName.startsWith(itemRoute + '/')
}

defineProps({
  user: Object
})
</script>

<template>
  <section class="sidebar">
    <nav class="flex flex-col gap-4">
      <!-- Logo -->
      <Link href="/" class="mb-12 cursor-pointer flex items-center gap-2">
        <img src="/public/icons/logo.svg" alt="Horizon" class="h-10 w-10 max-xl:size-14" />
        <h1 class="sidebar-logo">Horizon</h1>
      </Link>

      <!-- Sidebar Links -->
      <Link
        v-for="item in sidebarLinks"
        :key="item.label"
        :href="item.route"
        class="sidebar-link"
        :class="{ 'bg-bank-gradient': isActive(item.route) }"
      >
      <div class="relative size-6">
        <img 
            :src="item.imgURL" 
            alt="nav-icon" 
            fill
            :class="{ 'brightness-[3] invert-0': isActive(item.route) }"
          >
        </div>
        <p 
        :class="['sidebar-label', { '!text-white': isActive(item.route) }]">
          {{ item.label }}
        </p>
      </Link>
      USER
    </nav>
    FOOTER
  </section>
</template>
