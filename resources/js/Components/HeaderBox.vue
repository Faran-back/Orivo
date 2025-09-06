<script setup>
    defineProps({
      type: String,
      title: String,
      user: String,
      subtext: String
    })
</script>

<template>
    <div class="header-box">
        <h1 
            class="header-box-title">
            {{ title }}
            <span 
                v-if="type === 'greeting'"
                class="text-bankGradient"> 
             {{ user }}
            </span>
        </h1>
        <p
            class="header-box-subtext">
            {{ subtext }}
        </p>
    </div>
</template>

