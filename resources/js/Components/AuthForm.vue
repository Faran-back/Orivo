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
  password: '',
first_name: '',
last_name: '', 
address: '',
city: '',
state: '',
ssn: '',
dateOfBirth: '',
  
})

const setIsLoading = ref(false)

const errors = ref({})

// Zod validation schema
const schema = z.object({
  email: z.string().email('Invalid email'),
  password: z.string().min(8),
  first_name: z.string().min(3),  
  last_name: z.string().min(3),
  address: z.string().max(50),
  city: z.string().min(3).max(10),
  state: z.string().min(2).max(2),
  postalCode: z.string().min(3).max(6),
  ssn: z.string().max(4),
  dateOfBirth: z.string().max(8),

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
      <form @submit.prevent="submitForm" class="flex flex-col gap-6">

        <template v-if="type === 'sign-up'" >
        <!-- First Name + Last Name -->
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
             <InputField 
               v-model="form.first_name"
               name="firstName"
               label="First Name"
               placeholder="John"
               width="w-full"
               :error="errors.first_name?.[0]"
             />

             <InputField 
               v-model="form.last_name"
               name="lastName"
               label="Last Name"
               placeholder="Doe"
               width="w-full"
               :error="errors.last_name?.[0]"
             />
           </div>

            <InputField 
               v-model="form.address"
               name="address"
               label="Address"
               placeholder="Enter your specific address"
               :error="errors.state?.[0]"
             />

               <InputField 
               v-model="form.city"
               name="city"
               label="City"
               placeholder="Enter your city"
               :error="errors.state?.[0]"
             />

           <!-- State + Postal Code -->
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
             <InputField 
               v-model="form.state"
               name="state"
               label="State"
               placeholder="NY"
               width="w-full"
               :error="errors.state?.[0]"
             />

             <InputField 
               v-model="form.postalCode"
               name="postalCode"
               label="Postal Code"
               placeholder="11101"
               width="w-full"
               :error="errors.postalCode?.[0]"
             />
           </div>

           <!-- Date of Birth + SSN -->
           <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
             <InputField 
               v-model="form.dateOfBirth"
               name="dateOfBirth"
               label="Date of Birth"
               placeholder="yyyy-mm-dd"
               width="w-full"
               :error="errors.dateOfBirth?.[0]"
             />

             <InputField 
               v-model="form.ssn"
               name="ssn"
               label="SSN"
               placeholder="1234"
               width="w-full"
               :error="errors.ssn?.[0]"
             />
           </div>
        </template>
          
          <InputField 
             v-model="form.email"
             name="email"
             label="Email"
             placeholder="Horizon@support.net"
             :error="errors.email?.[0]"
           />

            <InputField 
             v-model="form.password"
             name="password"
             label="Password"
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
