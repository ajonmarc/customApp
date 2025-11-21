<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue'
import { Head } from '@inertiajs/vue3'
</script>

<template>
  <Head title="Manage analytics" />
  <AppLayout :breadcrumbs="[{ title: 'Manage analytics', href: '/superadmin/analytics' }]">
    <div class="p-8 text-center">
      <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border p-12">
        <h1 class="text-4xl font-bold mb-4">Manage analytics</h1>
        <p class="text-lg text-gray-600 dark:text-gray-400">Super Admin page is working perfectly!</p>
      </div>
    </div>
  </AppLayout>
</template>