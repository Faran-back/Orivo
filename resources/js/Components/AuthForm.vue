<script setup>
import { ref } from "vue";
import InputField from '@/Components/Form/InputField.vue'
import { z } from 'zod'

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

const errors = ref({})

// Zod validation schema
const schema = z.object({
  email: z.string().email('Invalid email'),
  password: z.string().min(6, 'Minimum 6 characters')
})

// Submit handler
const submitForm = () => {
  const result = schema.safeParse(form.value)

  if (!result.success) {
    errors.value = result.error.flatten().fieldErrors
  } else {
    errors.value = {}
    console.log('Form submitted', form.value)
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
          placeholder="**********"
          :error="errors.password?.[0]"
        />

        <!-- Submit Button -->
        <button
          type="submit"
          class="form-btn px-2 py-2"
        >
          Submit
        </button>
      </form>
    </div>
  </section>
</template>
