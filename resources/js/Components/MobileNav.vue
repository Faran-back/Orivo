<script setup>
import { ref } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'
import { sidebarLinks } from '@/constants.js'

const isOpen = ref(false)

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
    <section>
        <!-- Trigger -->
        <button @click="isOpen = true" class="p-2">
            <img src="/public/icons/hamburger.svg" alt="menu" class="h-7 w-7 cursor-pointer">
        </button>

        <!-- Overlay -->
        <transition name="fade">
            <div v-if="isOpen" class="fixed inset-0 bg-black/50 z-40" @click="isOpen = false" />
        </transition>

        <!-- Sheet -->
        <transition name="slide">
            <div v-if="isOpen"
                class="fixed top-0 right-0 h-full w-72 bg-white shadow-xl z-50 p-6 rounded-l-2xl flex flex-col">
                <!-- Logo -->
                <Link href="/" class="mb-6 cursor-pointer flex items-center gap-2">
                <img src="/public/icons/logo.svg" alt="Horizon" class="h-14 w-14" />
                <h1 class="text-lg font-bold font-ibm-plex-serif">Horizon</h1>
                </Link>

                <!-- Sidebar Links -->
                <nav class="flex flex-col gap-3">
                    <Link v-for="item in sidebarLinks" :key="item.label" :href="item.route"
                        class="mobilenav-sheet_close w-full flex items-center gap-3 px-3 py-2 rounded-lg"
                        :class="{ 'bg-bank-gradient text-white': isActive(item.route) }">
                    <img :src="item.imgURL" alt="nav-icon" class="w-6 h-6"
                        :class="{ 'brightness-[3]': isActive(item.route) }" />
                    <p :class="['text-16 font-semibold', { 'text-white': isActive(item.route) }]">
                        {{ item.label }}
                    </p>
                    </Link>
                    USER
                </nav>
                FOOTBAR
            </div>
        </transition>

    </section>
</template>

<style>
/* Fade overlay */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

/* Slide from right */
.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
    transform: translateX(100%);
}
</style>
