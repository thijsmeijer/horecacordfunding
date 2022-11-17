<template>
    <Head title="Investeringen" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Investeringen
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div class="flex flex-row justify-between mb-10">
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold">
                                        {{ user.data.name }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ user.data.email }}
                                    </div>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold">
                                        {{ user.data.total_invested }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        geïnvesteerd
                                    </div>
                                </div>
                            </div>
                            <div class="mt-8 flex flex-col">
                                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-300">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Project</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Datum</th>
                                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">geïnvesteerd</th>

                                                </tr>
                                                </thead>
                                                <tbody class="divide-y divide-gray-200 bg-white">
                                                <tr v-for="investment in user.data.investments">
                                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{ investment.project.name }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ investment.created_at }}</td>
                                                    <td class="whitespace-nowrap px-3 py-4 text-sm font-bold">{{ investment.amount }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/inertia-vue3';

export default {
    name: "Information",
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        user: Object,
    },
}
</script>
