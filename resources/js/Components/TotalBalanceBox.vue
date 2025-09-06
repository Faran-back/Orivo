<script setup>
    import {formatAmount} from '@/utils.js'

    defineProps({
        accounts: Array,
        totalBanks: Number,
        totalCurrentBalance: Number
    })

</script>

<template>
    <section class="total-balance">
        <div class="total-balance-chart">
            <!-- Total Balance Chart Placeholder -->
        </div>

        <div class="flex flex-col gap-6">
            <h2 class="header-2 ">
                Bank Accounts: {{ totalBanks }}
            </h2>
            <div class="flex flex-col gap-2">
                <p class="total-balance-label">
                    Total Current Balance
                </p>
                <p class="total-balance-amount flex-center gap-2">
                    <!-- <AnimatedCounter 
                        :amount="totalCurrentBalance"
                    /> -->
                {{ formatAmount(totalCurrentBalance) }}
                </p>    
            </div>
        </div>
    </section>
</template>