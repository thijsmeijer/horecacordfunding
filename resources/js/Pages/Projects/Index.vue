<template>

    <Head title="Projecten"/>

    <GuestLayout>
        <div class="max-w-6xl mx-auto mt-10">
            <div class="my-10 grid grid-cols-6 gap-4">
                <div class="relative mt-1 flex items-center col-span-4">
                    <input
                        v-model="form.search"
                        @input="search"
                        type="text" name="search" id="search"
                        placeholder="Zoek een project"
                        class="block w-full rounded-md border-gray-300 pr-12 shadow-sm focus:border-blue-400 focus:ring-blue-400 sm:text-sm">
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-6 h-6 text-slate-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </div>
                </div>
                <div class="col-span-2">
                    <select id="sort" name="sort"
                            v-model="form.sort"
                            @change="search"
                            class="mt-1 block w-full rounded-md border-gray-300 py-2 pl-3 pr-10 text-base focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                        <option disabled>Datum</option>
                        <option value="newest">Nieuwste</option>
                        <option value="oldest">Oudste</option>
                        <option disabled>Funding</option>
                        <option value="highest">Hoogste</option>
                        <option value="lowest">Laagste</option>
                    </select>
                </div>
            </div>
            <div v-if="projects.data.length > 0" class="grid grid-cols-4 gap-6">
                <div v-for="project in projects.data"
                     :key="project.id"
                     class="overflow-hidden rounded-md shadow-xl flex flex-col">
                    <div class="relative bg-gray-900">
                        <img
                            src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                            class="h-auto w-full" :class="{'opacity-30': project.status === 'private'}"
                            alt="Restaurant"/>
                        <div class="absolute inset-0 z-10 flex items-center justify-center"
                             v-if="project.status === 'private'">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                 class="w-8 h-8 text-red-500">
                                <path fill-rule="evenodd"
                                      d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between p-5 h-full">
                        <div>
                            <h2 class="text-lg font-medium leading-none text-slate-500 mb-4">
                                {{ project.name }}
                                <span class="block text-sm text-slate-400">{{ project.location }}</span>
                            </h2>
                        </div>
                        <div>
                            <dl class="flex items-center space-x-2">
                                <dt>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="text-slate-500 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                    </svg>
                                    <span class="sr-only">investering</span>
                                </dt>
                                <dd>
                                    <span>&euro;{{ project.formatted_amount }}</span>
                                </dd>
                            </dl>

                            <dl class="flex space-x-2 items-center">
                                <dt>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="text-slate-500 w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z"/>
                                    </svg>
                                    <span class="sr-only">looptijd</span>
                                </dt>
                                <dd>
                                    <span>{{ project.duration }} maanden</span>
                                </dd>
                            </dl>
                            <dl class="flex space-x-2 items-center">
                                <dt>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="text-slate-500 h-4 w-4">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z"/>
                                    </svg>
                                    <span class="sr-only">Rendament</span>
                                </dt>
                                <dd><span>{{ project.interest_rate }}% rente</span>
                                </dd>
                            </dl>
                            <div class="pt-4">
                                <a :href="route('projects.show', project.id)"
                                   class="w-full block rounded py-2 text-center text-white bg-blue-400">Bekijken</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else class="w-full mx-auto">
                <h1 class="text-center text-2xl font-bold py-4">Oeps!</h1>
                <p class="text-center text-lg">Wij hebben geen projecten kunnen vinden.</p>
            </div>
            <pagination :links="projects.meta.links"/>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';
import Pagination from "@/Components/Pagination.vue";

export default {
    components: {GuestLayout, Head, Link, Pagination, useForm},
    props: {
        projects: Object,
        sorting: String,
        search: String,
    },
    setup(props) {
        const form = useForm({
            search: props.search || '',
            sort: props.sorting || 'newest',
        });

        const search = () => {
            if (form.processing) {
                return;
            }

            form.get(route('projects.index'), {
                preserveState: true,
                onSuccess: (page) => {
                    props.projects = page.props.projects;
                },
            });
        };

        return {
            form,
            search,
        };
    }
};
</script>
