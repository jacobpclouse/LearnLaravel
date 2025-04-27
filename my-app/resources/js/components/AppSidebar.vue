<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, PlusCircle, List, ChevronsLeftRightEllipsis, Github } from 'lucide-vue-next';
// Icons here: https://lucide.dev/icons/
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Main Dashboard',
        href: '/',
        // href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Create Item',
        href: '/entries/create',
        icon: PlusCircle,
    },
    {
        title: 'View All Items',
        href: '/entries',
        icon: List,
    },

];

const footerNavItems: NavItem[] = [
    {
        title: 'My Github Profile',
        href: 'https://github.com/jacobpclouse',
        icon: Github,
    },
    {
        title: 'My Website',
        href: 'https://www.jacobpclouse.com/',
        icon: ChevronsLeftRightEllipsis,
    },
    // {
    //     title: 'Github Repo',
    //     href: 'https://github.com/laravel/vue-starter-kit',
    //     icon: Folder,
    // },
    // {
    //     title: 'Documentation',
    //     href: 'https://laravel.com/docs/starter-kits',
    //     icon: BookOpen,
    // },
];
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
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
    <slot />
</template>
