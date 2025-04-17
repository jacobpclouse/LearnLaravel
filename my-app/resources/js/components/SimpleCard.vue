<script setup lang="ts">
import {
  Card,
  CardHeader,
  CardTitle,
  CardDescription,
  CardContent,
  CardFooter,
} from '@/components/ui/card'
</script>

<template>
  <Card class="h-full w-full flex flex-col justify-between">
    <CardHeader>
      <CardTitle>Quick Stats</CardTitle>
      <CardDescription>Overview of your activity today</CardDescription>
    </CardHeader>
    <CardContent class="flex-1">
      <div class="flex flex-col gap-2">
        <div>Total Users: <span class="font-bold">1,234</span></div>
        <div>New Signups: <span class="font-bold">56</span></div>
        <div>Active Sessions: <span class="font-bold">89</span></div>
      </div>
    </CardContent>
    <CardFooter>
      <p class="text-sm text-muted-foreground">Updated just now</p>
    </CardFooter>
  </Card>
</template>
