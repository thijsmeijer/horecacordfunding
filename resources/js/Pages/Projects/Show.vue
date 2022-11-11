<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>

<template>
    <GuestLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-3xl font-bold mb-4">{{ project.data.name }}</h1>
                        <p>
                            <strong>Ondernemer:</strong> {{ project.data.user }}
                        </p>
                        <p>
                            <strong>Beschrijving:</strong> {{ project.data.description }}
                        </p>
                        <p>
                            <strong>Locatie:</strong> {{ project.data.location }}
                        </p>
                        <p>
                            <strong>Duur:</strong> {{ project.data.duration }} dagen
                        </p>
                        <p>
                            <strong>Doelbedrag:</strong> {{ project.data.amount }} euro
                        </p>
                        <p>
                            <strong>Rente:</strong> {{ project.data.interest_rate }}
                        </p>
                        <ul>
                            <li v-for="investment in project.data.investments" :key="investment.id">
                                <strong>Investering:</strong> {{ investment.amount }} euro
                            </li>
                        </ul>
                        <ul role="list"
                            class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                            <li class="relative">
                                <div
                                    class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                    <img
                                        src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                        alt="" class="pointer-events-none object-cover group-hover:opacity-75">
                                </div>
                            </li>
                            <li class="relative">
                                <div
                                    class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                    <img
                                        src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                        alt="" class="pointer-events-none object-cover group-hover:opacity-75">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
