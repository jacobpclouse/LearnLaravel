<!-- <script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue'; -->

<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
// import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    title: '',
    description: '',
    // Other fields
});

const submit = () => {
    form.post(route('entries.store'), {
        onSuccess: () => {
            form.reset();
            // Maybe show success message
        },
    });
};
</script>

<template>
    <AppLayout title="Create Entry">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Entry
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                    <form @submit.prevent="submit">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                Title
                            </label>
                            <input v-model="form.title" 
                                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                   id="title" 
                                   type="text" 
                                   placeholder="Title">
                            <div v-if="form.errors.title" class="text-red-500 text-xs italic">{{ form.errors.title }}</div>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                Description
                            </label>
                            <textarea v-model="form.description"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      id="description" 
                                      placeholder="Description"></textarea>
                            <div v-if="form.errors.description" class="text-red-500 text-xs italic">{{ form.errors.description }}</div>
                        </div>
                        
                        <div class="flex items-center justify-end">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit"
                                    :disabled="form.processing">
                                Create
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>