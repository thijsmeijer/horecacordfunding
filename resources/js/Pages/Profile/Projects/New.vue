<template>
    <Head title="New project" ></Head>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Start een nieuw project
            </h2>
        </template>
<!--        <div v-for="error in form.errors">-->
<!--            {{ error }}-->
<!--        </div>-->
        <div>
            <div class="md:grid md:grid-cols-3 md:gap-6 mt-4">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Project informatie</h3>
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan niet meer veranderd worden na het publiek maken van dit project.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="project_name" class="block text-sm font-medium text-gray-700">Project naam</label>
                                    <div v-if="form.errors.name" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                        {{ form.errors.name }}
                                    </div>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="project_name"
                                            id="project_name"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="Jouw project naam"
                                            v-model="form.name"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="amount" class="block text-sm font-medium text-gray-700">Gevraagd bedrag</label>
                                    <div v-if="form.errors.amount" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                        {{ form.errors.amount }}
                                    </div>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <span class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">€</span>
                                        <input
                                            type="text"
                                            name="amount"
                                            id="amount"
                                            class="block w-full flex-1 rounded-none rounded-r-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="100000"
                                            v-model="form.amount"
                                        />
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Graag het bedrag invullen zonder punten en komma's.</p>
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
                                        <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">%</span>
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
                                            >
                                                <option>12</option>
                                                <option>24</option>
                                                <option>36</option>
                                                <option>48</option>
                                                <option>60</option>
                                            </select>
                                        </div>
                                        <span class="inline-flex items-center rounded-r-md border border-l-0 border-gray-300 bg-gray-50 px-3 text-sm text-gray-500">maanden</span>
                                    </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="iban" class="block text-sm font-medium text-gray-700">IBAN</label>
                                    <div v-if="form.errors.iban" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                        {{ form.errors.iban }}
                                    </div>
                                    <div v-if="form.errors.iban_name" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                        {{ form.errors.name }}
                                    </div>
                                    <div class="mt-1 flex rounded-md shadow-sm">
                                        <input
                                            type="text"
                                            name="iban"
                                            id="iban"
                                            class="block w-full flex-1 rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                            placeholder="NL00RABO0000000000"
                                            v-model="form.iban"
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
                        <p class="mt-1 text-sm text-gray-600">Deze informatie kan na het publiek maken van dit project nog gewijzigt worden.</p>
                    </div>
                </div>
                <div class="mt-5 md:col-span-2 md:mt-0">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="location" class="block text-sm font-medium text-gray-700">Project locatie</label>
                                    <div v-if="form.errors.location" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                        {{ form.errors.location }}
                                    </div>
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
                                <label for="about" class="block text-sm font-medium text-gray-700">Alles over jouw project</label>
                                <div v-if="form.errors.description" class="bg-red-500 text-white py-1 px-4 pr-0 rounded mb-4 shadow-lg">
                                    {{ form.errors.description }}
                                </div>
                                <div class="mt-1">
                                    <textarea id="about" name="about" rows="15" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" v-model="form.description"/>
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
    name: "New",
    components: {
        AuthenticatedLayout,
        Head
    },
    props: {
        user: Object,
    },
    setup(props) {
        const form = useForm(
            {
                name: '',
                description: '',
                amount: '',
                duration: 24,
                interest_rate: 7,
                iban: props.user.iban,
                iban_name: props.user.iban_name,
                location: '',
            });

        return {form}
    },
    methods: {
        submit() {
            this.form.post(route('projects.store'));
        }
    }
}
</script>
