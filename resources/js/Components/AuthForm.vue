<script setup>
import { ref } from "vue";
import InputField from '@/Components/Form/InputField.vue'
import { z } from 'zod'
import { Loader2 } from "lucide-vue-next";
import { Link } from "@inertiajs/vue3";

// Props
defineProps({
    type: String,
    email: String,
    password: String,
});

// Form state
const form = ref({
  email: '',
  password: ''
})

const setIsLoading = ref(false)

const errors = ref({})

// Zod validation schema
const schema = z.object({
  email: z.string().email('Invalid email'),
  password: z.string().min(8, 'Minimum 8 characters')
})

// Submit handler
const submitForm = () => {
  const result = schema.safeParse(form.value)

  if (!result.success) {
    errors.value = result.error.flatten().fieldErrors
  } else {
    errors.value = {}
    setIsLoading.value = true
    console.log('Form submitted', form.value)
    setIsLoading.value = false
  }
}

// Fake user (null → show form)
const user = ref(null)
</script>

<template>
  <section class="auth-form">
    <!-- HEADER -->
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
        <h1 class="text-24 font-semibold text-gray-900">
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

    <!-- IF USER EXISTS → SHOW PLAID LINK -->
    <div v-if="user">
      PLAID LINK LOL
    </div>

    <!-- ELSE → SHOW AUTH FORM -->
    <div v-else>
      <form @submit.prevent="submitForm" class="flex flex-col gap-4">

        <!-- Email -->
        <InputField
          v-model="form.email"
          label="Email"
          name="email"
          placeholder="contact@horizon.pro"
          :error="errors.email?.[0]"
        />

        <!-- Password -->
        <InputField
          v-model="form.password"
          label="Password"
          name="password"
          type="password"
          placeholder="Enter your password"
          :error="errors.password?.[0]"
        />

        <!-- Submit Button -->
        <button
          type="submit"
          class="form-btn px-2 py-2 flex items-center justify-center"
          :disabled="setIsLoading"
        >
          <div v-if="setIsLoading" class="flex items-center gap-2">
            <Loader2 size="20" class="animate-spin" />
            <span>Loading...</span>
          </div>


          <div v-else>
            <div v-if="type === 'sign-in'">
              Sign In
            </div>

            <div v-else>
              Sign Up
            </div>
          </div>
        </button>
      </form>
    </div>

    <footer class="flex justify-center gap-1">
      <div v-if="type === 'sign-in'" class="text-14 font-normal text-gray-600">
        Don't have an account? &nbsp; 
        <span class="form-link">
          <Link href="/sign-up"> Sign up </Link>
        </span>
      </div>

      <div v-else class="text-14 font-normal text-gray-600">
        Already have an account?  &nbsp;
        <span class="form-link">
          <Link href="/sign-in"> Sign in </Link>
        </span>
      </div>
    </footer>
  </section>
</template>
