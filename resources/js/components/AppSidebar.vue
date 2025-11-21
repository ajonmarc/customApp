<!-- resources/js/components/AppSidebar.vue -->
<script setup lang="ts">
import { computed } from 'vue'
import { usePage, Link } from '@inertiajs/vue3'
import {
  LayoutGrid,
  Users,
  Shield,
  Settings,
  FileText,
  BarChart3,
  Package,
  BookOpen,
  UserCog,
  Home,
  Lock,
  Folder,
} from 'lucide-vue-next'

import NavMain from '@/components/NavMain.vue'
import NavFooter from '@/components/NavFooter.vue'
import NavUser from '@/components/NavUser.vue'
import {
  Sidebar,
  SidebarContent,
  SidebarFooter,
  SidebarHeader,
  SidebarMenu,
  SidebarMenuButton,
  SidebarMenuItem,
} from '@/components/ui/sidebar'
import AppLogo from './AppLogo.vue'
import { dashboard } from '@/routes'
import type { NavItem } from '@/types'

// Get current user role
const user = usePage().props.auth.user as any

// DYNAMIC MENU — changes automatically based on role
const mainNavItems = computed<NavItem[]>(() => {
  const base = [{ title: 'Dashboard', href: dashboard(), icon: LayoutGrid }]

  // SuperAdmin — GOD MODE
  if (user?.role === 'SuperAdmin') {
    return [
      ...base,
      { title: 'All Users',       href: '/superadmin/users',     icon: Users },
      { title: 'Manage Admins',   href: '/superadmin/admins',    icon: Shield },
      { title: 'Roles & Perms',   href: '/superadmin/roles',     icon: Lock },
      { title: 'System Settings', href: '/superadmin/settings',  icon: Settings },
      { title: 'Audit Logs',      href: '/superadmin/logs',      icon: FileText },
      { title: 'Analytics',       href: '/superadmin/analytics', icon: BarChart3 },
    ]
  }

  // Admin — Management access
  if (user?.role === 'Admin') {
    return [
      ...base,
      { title: 'Manage Users', href: '/admin/users',    icon: UserCog },
      { title: 'Content',      href: '/admin/content',  icon: Package },
      { title: 'Reports',      href: '/admin/reports',  icon: BarChart3 },
      { title: 'Settings',     href: '/admin/settings', icon: Settings },
    ]
  }

  // Regular User — Minimal
  return [
    ...base,
    { title: 'My Profile', href: '/user/profile', icon: Home },
    { title: 'My Orders',  href: '/user/orders',  icon: Package },
    { title: 'Support',    href: '/user/support', icon: BookOpen },
  ]
})

const footerNavItems: NavItem[] = [
  { title: 'Documentation', href: 'https://laravel.com/docs', icon: BookOpen },
  { title: 'GitHub',        href: 'https://github.com',       icon: Folder },
]
</script>

<template>
  <Sidebar collapsible="icon" variant="inset">
    <SidebarHeader>
      <SidebarMenu>
        <SidebarMenuItem>
          <SidebarMenuButton size="lg" as-child>
            <Link :href="dashboard()">
              <AppLogo />
            </Link>
          </SidebarMenuButton>
        </SidebarMenuItem>
      </SidebarMenu>
    </SidebarHeader>

    <SidebarContent>
      <NavMain :items="mainNavItems" />
    </SidebarContent>

    <SidebarFooter>
      <NavFooter :items="footerNavItems" />
      <NavUser />
    </SidebarFooter>
  </Sidebar>
</template>