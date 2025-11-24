<script setup>
defineProps({
    name: String,
    label: String,
    placeholder: String
});
</script>

<template>
    <div class="w-full mt-5 px-3 mb-6 md:mb-0">
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            :for="name"
        >
            {{ label }}
        </label>

        <input
            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
            :name="name"
            type="text"
            :placeholder="placeholder"
        />
    </div>
</template>
