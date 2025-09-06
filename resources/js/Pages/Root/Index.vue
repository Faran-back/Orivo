<template>
  <RootLayout>
    <section class="home">
        <div class="home-content">
            <header class="home-header">
                <HeaderBox
                    type="greeting"
                    title="Welcome"
                    user="Faran"
                    subtext="Access and manage your accounts and transactions"
                />
            </header>
        </div>
    </section>
  </RootLayout>
</template>

<script setup>
    import RootLayout from '@/Layouts/RootLayout.vue'
    import HeaderBox from '@/Components/HeaderBox.vue'
</script>
