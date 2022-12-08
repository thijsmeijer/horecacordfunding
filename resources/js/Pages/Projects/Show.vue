<template>
    <GuestLayout>
        <img src="https://picsum.photos/800/200" class="object-cover h-48 w-full" alt="">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="space-y-4">
                    <div class="rounded-md bg-green-50 p-4" v-if="$page.props.flash.success">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">{{ $page.props.flash.success }}</p>
                            </div>
                            <div class="ml-auto pl-3">
                                <div class="-mx-1.5 -my-1.5">
                                    <button type="button"
                                            @click="$page.props.flash.success = null"
                                            class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                                        <span class="sr-only">Dismiss</span>
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                             fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a :href="$page.props.previousUrl">
                            <dl class="flex items-center space-x-2 text-blue-500">
                                <dt>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                                    </svg>
                                    <span class="sr-only">goback</span>
                                </dt>
                                <dd>
                                    <span>Terug</span>
                                </dd>
                            </dl>
                        </a>
                    </div>
                </div>
                <div class="overflow-hidden sm:rounded-lg">
                    <div class="p-6 space-y-2">
                        <div class="flex justify-between">
                            <div class="max-w-3xl w-full">
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
                                    class="bg-white max-w-2xl rounded-lg shadow-md border overflow-hidden w-full">
                                    <div class="flex justify-between">
                                        <div class="px-6 pt-6">
                                            <dl class="flex items-center space-x-2">
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
                                            <dl class="flex items-center space-x-2">
                                                <dt>
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                         class="text-slate-500 w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941"/>
                                                    </svg>
                                                    <span class="sr-only">opgehaald</span>
                                                </dt>
                                                <dd>
                                                    <span>{{ project.data.funding_progress }}% opgehaald</span>
                                                </dd>
                                            </dl>
                                            <dl class="flex items-center space-x-2">
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
                                            <dl class="flex items-center space-x-2">
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
                                        <div class="p-6" v-if="project.data.status === 'private'">
                                            <a :href="route('profile.projects.edit', project.data.id)" target="_blank"
                                               class="w-full block rounded-lg p-3 text-center text-white bg-blue-400">Aanpassen</a>
                                        </div>
                                        <div class="p-6" v-else>
                                            <a :href="route('investments.create', project.data.id)"
                                               class="w-full block rounded-lg p-3 text-center text-white bg-blue-400">Investeren</a>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-6">
                                            <p>Eigen inbreng: &euro;{{ project.data.formatted_own_contribution }}
                                                (10%)</p>
                                            <p>Externe inbreng: &euro;{{ project.data.formatted_external_contribution }}
                                                (30%)</p>
                                            <p>Crowdfunding: &euro;{{
                                                    project.data.formatted_crowdfunding_contribution
                                                }}
                                                (60%)</p>
                                        </div>
                                        <div class="space-y-2">
                                            <h2 class="text-center text-xl font-semibold">
                                                <span>&euro;{{ project.data.total_invested }}</span> van de
                                                <span>&euro;{{
                                                        project.data.formatted_crowdfunding_contribution
                                                    }} ({{ project.data.funding_progress }}%)</span>
                                                opgehaald.
                                            </h2>
                                            <!-- Progress bar -->
                                            <div class="w-full bg-gray-200 dark:bg-gray-700">
                                                <div
                                                    class="font-medium text-white font-bold text-center p-1.5 leading-none"
                                                    :class="{'bg-blue-400': project.data.funding_progress!== '0'}"
                                                    :style="'width:' + project.data.funding_progress + '%'">
                                                </div>
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
                                        <li v-else-if="project.data.status === 'private'" class="px-6 py-4 text-center">
                                            <span>Publiceer je project om investeringen te ontvangen.</span>
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

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';

export default {
    name: 'Project',
    components: {
        GuestLayout,
    },
    props: {
        project: Object,
    },
};
</script>
