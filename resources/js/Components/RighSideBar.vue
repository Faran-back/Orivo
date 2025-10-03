<script setup >
    import { Link } from '@inertiajs/vue3'
    import BankCard from './BankCard.vue';

    defineProps({
        user: Object,
        transactions: Array,
        banks: Array
    })
</script>


<template>
    <aside class="right-sidebar">
        <section class="flex flex-col pb-8">
            <div class="profile-banner" />
            <div class="profile">
                <div class="profile-img">
                    <span class="text-5xl font-bold text-blue-500">{{user.firstName[0]}}</span>
                </div>

                <div class="profile-details">
                    <h1 class="profile-name">
                        {{ user.firstName }} {{ user.lastName }}
                    </h1>
                    <p class="profile-email">
                        {{ user.email }}
                    </p>
                </div>
            </div> 
        </section>

        <section class="banks">
            <div class="flex w-full justify-between">
                <h2 class="header-2">My Banks</h2>
                <Link 
                    href="/"
                    class="flex gap-2">
                    <img src="/public/icons/plus.svg" alt="plus" height="20" width="20" />
                    <h2 class="text-14 font-semibold text-gray-600">
                        Add Bank
                    </h2>
                </Link>
            </div>

            <div v-if="banks.length > 0">
                <div class="relative flex flex-1 flex-col items-center justify-center gap-5">
                    <div class="relative z-10">
                        <BankCard 
                            :key="banks[0].$id"
                            :account="banks[0]"
                            :userName="user.firstName + ' ' + user.lastName"
                            :showBalance="false"
                        /> 
                    </div>
                    
                    <div v-if="banks[1]">
                        <div class="absolute right-0 top-8 z-0 w-[90%]">
                            <BankCard 
                                :key="banks[1].$id"
                                :account="banks[1]"
                                :userName="user.firstName + ' ' + user.lastName"
                                :showBalance="false"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </aside>
</template>
