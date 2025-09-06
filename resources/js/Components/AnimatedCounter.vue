<script setup>
import { Vue3Countup } from 'vue3-countup'

const props = defineProps({
  amount: [Number, String]
})

const numericAmount = Number(props.amount)
</script>

<template>
  <Vue3Countup
    :end-val="numericAmount"
    :duration="1"
    :options="{ decimalPlaces: 2, prefix: '$' }"
  />
</template>
