<script setup>
import { useForm } from '@inertiajs/vue3';
// import AppLayout from '@/Layouts/AppLayout.vue';
import AppLayout from '@/layouts/AppLayout.vue';


const props = defineProps({
    entry: Object,
});

const form = useForm({
    title: props.entry.title,
    description: props.entry.description,
    // Other fields
    requestor: props.entry.requestor,
});

const submit = () => {
    form.put(route('entries.update', props.entry.id), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout title="Edit Entry">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Entry
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

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="requestor">
                                Requestor
                            </label>
                            <input v-model="form.requestor"
                                      class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                      id="requestor" 
                                      placeholder="Requestor"></input>
                            <div v-if="form.errors.requestor" class="text-red-500 text-xs italic">{{ form.errors.requestor }}</div>
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
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2"
                                    type="button"
                                    @click="$inertia.visit(route('entries.index'))">
                                Cancel
                            </button>
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit"
                                    :disabled="form.processing">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>