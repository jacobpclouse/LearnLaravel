<script setup lang="ts">
import type { DateRange } from 'reka-ui'
import { RangeCalendar } from '@/components/ui/range-calendar'
import { getLocalTimeZone, today } from '@internationalized/date'
import { ref, type Ref } from 'vue'

import {
  Card,
  CardHeader,
  CardTitle,
  CardDescription,
  CardContent,
} from '@/components/ui/card'

const start = today(getLocalTimeZone())
const end = start.add({ days: 7 })

const value = ref({
  start,
  end,
}) as Ref<DateRange>
</script>

<template>
  <Card class="h-full w-full flex flex-col">
    <CardHeader>
      <CardTitle>Select a Date Range</CardTitle>
      <CardDescription>Choose a week or any custom range</CardDescription>
    </CardHeader>
    <CardContent class="flex-1">
      <RangeCalendar v-model="value" class="rounded-md border w-full" />
    </CardContent>
  </Card>
</template>


<!-- <script setup lang="ts">
import type { DateRange } from 'reka-ui'
import { RangeCalendar } from '@/components/ui/range-calendar'
import { getLocalTimeZone, today } from '@internationalized/date'
import { type Ref, ref } from 'vue'

const start = today(getLocalTimeZone())
const end = start.add({ days: 7 })

const value = ref({
  start,
  end,
}) as Ref<DateRange>
</script>

<template>
  <RangeCalendar v-model="value" class="rounded-md border" />
</template> -->