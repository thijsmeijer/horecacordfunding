<template>
    <GuestLayout>
        <img src="https://picsum.photos/800/200" class="w-full max-h-48">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 space-y-2">
                        <div class="flex justify-between">
                            <div class="max-w-3xl">
                                <div class="mb-4">
                                    <h1 class="text-3xl font-bold">{{ project.data.name }}</h1>
                                    <dl class="flex items-center space-x-2 text-slate-400">
                                        <dt>
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                            </svg>
                                            <span class="sr-only">locatie</span>
                                        </dt>
                                        <dd>
                                            <span>{{ project.data.location }}</span>
                                        </dd>
                                    </dl>
                                </div>
                                <div
                                    class="bg-white max-w-2xl rounded-lg shadow-md border overflow-hidden font-semibold">
                                    <div class="flex justify-between">
                                        <div class="px-6 pt-6">
                                            <dl class="flex items-center space-x-2 text-lg">
                                                <dt>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor"
                                                         class="text-slate-500 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                                    </svg>
                                                    <span class="sr-only">ondernemer</span>
                                                </dt>
                                                <dd>
                                                    <span>{{ project.data.user }}</span>
                                                </dd>
                                            </dl>
                                            <dl class="flex items-center space-x-2 text-lg">
                                                <dt>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor"
                                                         class="text-slate-500 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                                                    </svg>
                                                    <span class="sr-only">duur</span>
                                                </dt>
                                                <dd>
                                                    <span>{{ project.data.duration }} maanden</span>
                                                </dd>
                                            </dl>
                                            <dl class="flex items-center space-x-2 text-lg">
                                                <dt>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5"
                                                         stroke="currentColor" class="text-slate-500 h-6 w-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                                                    </svg>
                                                    <span class="sr-only">rente</span>
                                                </dt>
                                                <dd>
                                                    <span>{{ project.data.interest_rate }}%</span>
                                                </dd>
                                            </dl>
                                        </div>
                                        <div class="p-6">
                                            <a :href="route('investments.create', project.data.id)"
                                               class="w-full block rounded-lg p-3 text-center text-white bg-blue-400">Investeren</a>
                                        </div>
                                    </div>
                                    <div class="space-y-2 pt-10">
                                        <h2 class="text-center text-xl font-semibold">
                                            <span>&euro;{{ project.data.total_invested }}</span> van de
                                            <span>&euro;{{ project.data.formatted_amount }}</span> ophehaald.
                                        </h2>
                                        <!-- Progress bar -->
                                        <div class="w-full bg-gray-200 dark:bg-gray-700">
                                            <div
                                                class="bg-blue-400 font-medium text-white font-bold text-center p-3 leading-none"
                                                :style="'width:' + project.data.total_invested_percent">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="mt-8 space-y-10">
                                    <div class="space-y-4">
                                        <div class="prose prose-slate" v-html="project.data.description">
                                        </div>
                                    </div>
                                    <ul role="list"
                                        class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                                        <li class="relative">
                                            <div
                                                class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                                <img
                                                    src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                                    alt=""
                                                    class="pointer-events-none object-cover group-hover:opacity-75">
                                            </div>
                                        </li>
                                        <li class="relative">
                                            <div
                                                class="group aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                                <img
                                                    src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80"
                                                    alt=""
                                                    class="pointer-events-none object-cover group-hover:opacity-75">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="overflow-hidden rounded-lg border bg-white w-72 shadow-md">
                                    <ul role="list" class="divide-y divide-gray-200">
                                        <li v-if="project.data.investments.length > 0"
                                            v-for="investment in project.data.investments"
                                            class="px-6 py-4 text-center flex justify-between">
                                            <span>&euro;{{ investment.amount }}</span>
                                            <span class="text-slate-500">{{ investment.invested_at }}</span>
                                        </li>
                                        <li v-else class="px-6 py-4 text-center">
                                            <span>Er zijn nog geen investeringen gedaan, wees de eerste door <a
                                                class="text-blue-400 underline"
                                                :href="route('investments.create', project.data.id)">nu te investeren</a>!</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';

defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>
