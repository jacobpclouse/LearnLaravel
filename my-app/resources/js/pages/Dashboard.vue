<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';

// my sample components -- fill with real data
// create a new page and then have it hooked into authentication
import SimpleCard from '@/components/SimpleCard.vue'
import SimpleTable from '@/components/SimpleTable.vue';
import SimpleStepper from '@/components/SimpleStepper.vue';
import SimpleCalendar from '@/components/SimpleCalendar.vue';

import DashboardTable from './Entries/DashboardTable.vue';


// Define props to receive entries from controller
defineProps({
    entries: {
        type: Array,
        default: () => []
    }
});


const breadcrumbs: BreadcrumbItem[] = [

    {
        title: 'Create Item',
        href: '/entries/create', 
    },
    {
        title: 'Dashboard!!',// this is the selected page
        href: '/',
        // href: '/dashboard',
    },
];
</script>

<template>
    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">

        <!-- In your dashboard navigation component -->
        <NavLink :href="route('entries.create')" :active="route().current('entries.create')">
            New Entry
        </NavLink>
        
        <!-- <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4"> -->
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <!-- <PlaceholderPattern /> -->
                    <SimpleCard />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <!-- <PlaceholderPattern /> -->
                     <SimpleStepper />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <!-- <PlaceholderPattern /> -->
                     <SimpleCalendar />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <!-- <PlaceholderPattern /> -->
                 <!-- GPT MADE THE TABLE! -->
                <!-- <SimpleTable /> -->
                <!-- REPLACE THE SIMPLETABLE WITH DATA-->
                <!-- <DashboardTable/> -->
                <DashboardTable :entriesAll="entries" />
                <!-- <DashboardTable all="entries" /> -->
            </div>
        </div>
    </AppLayout>
</template>
