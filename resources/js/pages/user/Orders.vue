<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Manage orders" />
  <AppLayout :breadcrumbs="[{ title: 'Manage orders', href: '/user/orders' }]">
    <div class="p-8 text-center">
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-12">
        <h1 class="text-4xl font-bold mb-4">Manage orders</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">Regular user page is working perfectly!</p>
      </div>
    </div>
  </AppLayout>
</template>