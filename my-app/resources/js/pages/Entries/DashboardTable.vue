<script setup lang="ts">
import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table' // adjust the path if needed
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, router } from '@inertiajs/vue3';

// Entries are passed as props from the controller
defineProps({
    entries: Array,
});

// defineProps({
//   entries: {
//     type: Array,
//     default: () => []
//   }
// });
</script>

<template>
  <Table>
    <TableHeader>
      <TableRow>
        <TableHead>Title</TableHead>
        <TableHead>Description</TableHead>
        <TableHead>Id</TableHead>
      </TableRow>
    </TableHeader>
    <TableBody>
      <!-- Fixed: use entry instead of entries in the loop -->
      <TableRow v-for="entry in entries" :key="entry.id">
        <TableCell>{{ entry.title }}</TableCell>
        <TableCell>{{ entry.description }}</TableCell>
        <TableCell>{{ entry.id }}</TableCell>
      </TableRow>
      <!-- Add a fallback row if no entries exist -->
      <TableRow v-if="!entries || entries.length === 0">
        <TableCell colspan="3" class="text-center py-6">
          No entries found. Please create some entries.
        </TableCell>
      </TableRow>
    </TableBody>
  </Table>
</template>