<template>
    <div class="flex flex-col">
        <Link href="/" class="bank-card">
        <div class="bank-card_content">
            <div>
                <h1 class="text-16 font-semibold text-white">
                    {{ account.name || userName }}
                </h1>

                <p class="font-ibm-pex-serif font-black text-white">
                    {{ formatAmount(account.currentBalance) }}
                </p>
            </div>

            <article class="flex flex-col gap-2">
                <div class="flex justify-between items-center w-full">
                    <!-- Name on the left -->
                    <h1 class="text-12 font-semibold text-white">
                        {{ userName }}
                    </h1>

                    <!-- ●●/●● on the right -->
                    <h2 class="text-12 font-semibold text-white">
                        ●●/●●
                    </h2>
                </div>

                <p class="text-14 font-semibold tracking-[1.1px] text-white">
                    ●●●● ●●●● ●●●● <span class="text-16">1234</span>
                </p>
            </article>

        </div>

        <div class="bank-card_icon">
            <img src="/public/icons/Paypass.svg" width="20" height="24" alt="pay">
            <img src="/public/icons/mastercard.svg" width="45" height="32" class="ml-5" alt="mastercard">
        </div>

        <img src="/public/icons/lines.png" width="316" height="190" alt="" class="absolute left-0 top-0" />

        </Link>
    </div>
</template>

<script setup>

import { Link } from '@inertiajs/vue3'
import { formatAmount } from '@/utils.js'

defineProps({
    account: Object,
    userName: Array,
    showBalance: {
        type: Boolean,
        default: true
    }
})
</script>
