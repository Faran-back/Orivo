<script setup>
import CountUp from 'vue-countup-v3'

const props = defineProps({
  amount: [Number, String]
})

</script>

<template>
  <div class="w-full">
    <count-up
      :end-val="amount"
      :duration="1"
      :options="{ decimalPlaces: 2, prefix: '$' }"
    />
  </div>
</template>
