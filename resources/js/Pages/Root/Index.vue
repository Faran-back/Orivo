<script setup>
    import RootLayout from '@/Layouts/RootLayout.vue'
    import HeaderBox from '@/Components/HeaderBox.vue'
    import TotalBalanceBox from '@/Components/TotalBalanceBox.vue'
    import RighSideBar from '@/Components/RighSideBar.vue'

    const loggedIn = { 
        firstName: 'Faran', 
        lastName: 'Naeem', 
        email: 'johndoe@example.com'
    }
</script>

<template>
    <RootLayout>
        <section class="home">
            <div class="home-content">
                <header class="home-header">
                    <HeaderBox type="greeting" title="Welcome" user="Faran"
                        subtext="Access and manage your accounts and transactions" />

                    <TotalBalanceBox :accounts="[]" :totalBanks="1" :totalCurrentBalance="1250.35" />
                </header>
                RECENT TRANSACTIONS
            </div>

            <RighSideBar 
                :user="loggedIn"
                :transactions="[]"
                :banks="[ { currentBalance: 1250.35 }, { currentBalance: 2500 } ]"
            />
        </section>
            
        </RootLayout>

    
</template>

