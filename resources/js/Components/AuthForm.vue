<script setup>
import { ref } from "vue";
import CustomInput from "./CustomInput.vue";

defineProps({
    type: String,
    email: String,
    password: String,
});

const user = ref(null);
</script>

<template>
    <section class="auth-form">
        <header class="flex flex-col gap-5 md:gap-8">
            <Link href="/" class="mb-12 cursor-pointer flex items-center gap-2">
                <img
                    src="/public/icons/logo.svg"
                    alt="Horizon"
                    class="h-10 w-10 max-xl:size-14"
                />
                <h1 class="sidebar-logo">Horizon</h1>
            </Link>

            <div class="flex flex-col gap-1 md:gap-3">
                <h1 class="text-24 lg:text-24 font-semibold text-gray-900">
                    {{
                        user
                            ? "Link Account"
                            : type === "sign-in"
                            ? "Sign In"
                            : "Sign Up"
                    }}
                </h1>
                <p class="font-normal text-gray-600">
                    {{
                        user
                            ? "Link your account to get started"
                            : "Please enter your details"
                    }}
                </p>
            </div>
        </header>

        <div v-if="user">PLAID LINK LOL</div>

        <div v-else>
             FORM
        </div>
    </section>
</template>
