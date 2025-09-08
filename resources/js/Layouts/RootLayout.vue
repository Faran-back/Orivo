<script setup>
  import Sidebar from '@/Components/Sidebar.vue'
import MobileNav from '../Components/MobileNav.vue';

  const loggedIn = {
    firstName: 'John',
    lastName: 'Doe',
    email: 'johndoe@example.com'
  }
</script>

<template>
  <div class="flex h-screen w-full font-inter">
    
    <Sidebar 
      :user="loggedIn"
    />

    <!-- NAVIGATION FOR MOBILE DEVICES -->
    <div class="flex size-full flex-col">
      <div class="root-layout">
        <img 
        src="/public/icons/logo.svg"
        alt="logo"
        class="h-30 w-30">

        <div>
          <MobileNav 
            :user="loggedIn"
          />
        </div>
      </div>
      <main class="flex-1 p-6">
        <slot />
      </main>
    </div>
  </div>
</template>
