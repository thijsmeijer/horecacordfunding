<template>
    <Head title="Edit project"></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Project {{ project.data.name }}
            </h2>
        </template>
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Project informatie</h3>
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan niet meer veranderd worden na het
                            publiek maken van dit project.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="project_name" class="block text-sm font-medium text-gray-700">Project
                                        naam</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="project_name"
                                            id="project_name"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            :placeholder="project.data.name"
                                            v-model="form.name"
                                            :disabled="project.data.status === 'public'"
                                            :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Gevraagd
                                        bedrag</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span
                                            class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="amount"
                                            id="amount"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="100000"
                                            v-model="form.amount"
                                            :disabled="project.data.status === 'public'"
                                            :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Graag het bedrag invullen zonder punten en
                                        komma's.</p>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="interest" class="block text-sm font-medium text-gray-700">Rente</label>
                                    <div class="mt-1 flex">
                                        <div class="col-span-6 sm:col-span-3">
                                            <select
                                                id="interest"
                                                name="interest"
                                                class="block w-full rounded-l-md border border-gray-300 bg-white py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                                v-model="form.interest_rate"
                                                :disabled="project.data.status === 'public'"
                                                :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                            >
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </div>
                                        <span
                                            class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="duration" class="block text-sm font-medium text-gray-700">Duur</label>
                                    <div class="mt-1 flex">
                                        <div class="col-span-6 sm:col-span-3">
                                            <select
                                                id="duration"
                                                name="duration"
                                                class="block w-full rounded-l-md border border-gray-300 bg-white py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                                v-model="form.duration"
                                                :disabled="project.data.status === 'public'"
                                                :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                            >
                                                <option>12</option>
                                                <option>24</option>
                                                <option>36</option>
                                                <option>48</option>
                                                <option>60</option>
                                            </select>
                                        </div>
                                        <span
                                            class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">maanden</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="iban" class="block text-sm font-medium text-gray-700">IBAN</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="iban"
                                            id="iban"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="IBAN"
                                            v-model="form.iban"
                                            :disabled="project.data.status === 'public'"
                                            :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                        />
                                    </div>
                                    <div class="mt-1 flex rounded-md items-center">
                                            <span class="mr-2">
                                                Naam
                                            </span>
                                        <input
                                            type="text"
                                            name="iban_name"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="IBAN Tenaamstelling"
                                            v-model="form.iban_name"
                                            :disabled="project.data.status === 'public'"
                                            :class="{'bg-gray-200 cursor-not-allowed': project.data.status === 'public'}"
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan na het publiek maken van dit project
                            nog gewijzigt worden.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Project
                                        locatie</label>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="location"
                                            id="location"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Een mooie locatie"
                                            v-model="form.location"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="about" class="block text-sm font-medium text-gray-700">Alles over jouw
                                    project</label>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="15"
                                              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                              v-model="form.description"/>
                                </div>
                            </div>
                            <div class="sm:col-span-6" v-if="project.data.status === 'private'">
                                <label for="about" class="block text-sm font-bold">Maak jouw project publiek</label>
                                <div class="mt-1">
                                    <span class="text-red-500 text-sm">Let op! De instellingen van dit project kunnen niet meer gewijzigd worden nadat het publiek is gemaakt. </span>
                                    <select
                                        id="duration"
                                        name="duration"
                                        class="block w-1/4 rounded-md border border-gray-300 bg-white py-2 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
                                        v-model="form.status"
                                    >
                                        <option>private</option>
                                        <option>public</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        type="submit"
                        @click.prevent="submit"
                        class="my-4 inline-flex py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Opslaan
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

</template>

<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';

export default {
    name: "Edit",
    components: {
        AuthenticatedLayout,
        Head,
    },
    props: {
        project: Object,
    },
    setup(props) {
        let values = props.project.data;

        const form = useForm(
            values,
        );

        return {form}
    },
    methods: {
        submit() {
            this.form.patch(route('projects.update', this.project.data.id), {
                preserveScroll: true,

            });
        },
    },
}
</script>

