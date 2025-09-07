
<script setup>
import { Chart as ChartJS, ArcElement, Tooltip, Legend } from 'chart.js'
import { Doughnut } from 'vue-chartjs'

ChartJS.register(ArcElement, Tooltip, Legend)

const data = {
  labels: ['Bank1', 'Bank2', 'Bank3'],
  datasets: [
    {
      label: 'Banks',
      backgroundColor: ['#0747b6', '#2265d8', '#2f91fa'],
      data: [1250, 2500, 3750]
    }
  ]
}

const options = {
  cutout: '60%',
  plugins: {
    legend: {
      display: false
    }
  }
}
</script>

<template>
  <Doughnut :data="data" :options="options"/>
</template>