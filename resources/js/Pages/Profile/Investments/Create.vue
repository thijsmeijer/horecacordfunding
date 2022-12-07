<template>

    <GuestLayout>
        <div class="flex justify-center max-w-6xl mx-auto mt-48">
            <div
                class="w-2/5 mx-auto shadow-md rounded-lg border space-y-8 flex flex-col justify-between overflow-hidden">
                <div>
                    <a
                        :href="route('projects.show', project.data.id)"
                        class="w-full h-52 bg-cover bg-center rounded relative overflow-hidden flex items-end group"
                        style="background-image: url('https://picsum.photos/800/200')">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-gray-700 opacity-70 group-hover:opacity-50 duration-150"></div>
                        <div class="relative z-20 pb-5 px-5 text-left text-white">
                            <h3 class="text-3xl font-bold mt-2">{{ project.data.name }}</h3>
                            <dl class="flex items-center space-x-2 font-semibold">
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
                    </a>
                    <div class="p-6 space-y-4">
                        <div class="font-semibold">
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
                    </div>
                </div>
                <div class="flex flex-col justify-between font-semibold">
                    <div class="space-y-2">
                        <h2 class="text-center text-xl font-semibold">
                            <span>&euro;{{ project.data.total_invested }}</span> van de
                            <span>&euro;{{ project.data.formatted_amount }}</span> ophehaald.
                        </h2>
                        <!-- Progress bar -->
                        <div class="w-full bg-gray-200 dark:bg-gray-700">
                            <div
                                class="bg-blue-400 font-medium text-white font-bold text-center p-1.5 leading-none"
                                :style="'width:' + project.data.total_invested_percent">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form @submit.prevent="submit" class="w-2/5 mx-auto p-6 shadow-md rounded-lg border space-y-8">
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   :placeholder="$page.props.user.name" v-model="form.name">
                        </div>
                        <InputError class="mt-2" :message="form.errors.name"/>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20"
                                     fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"/>
                                    <path
                                        d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"/>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email"
                                   class="block w-full rounded-md border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   :placeholder="$page.props.user.email" v-model="form.email">
                        </div>
                        <InputError class="mt-2" :message="form.errors.email"/>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">IBAN</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   placeholder="NL99 BANK 0123 4567 89" v-model="form.iban">
                        </div>
                        <InputError class="mt-2" :message="form.errors.iban"/>
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Te naam gestelde</label>
                        <div class="mt-1">
                            <input type="text" name="name" id="name"
                                   class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   :placeholder="$page.props.user.iban_name" v-model="form.iban_name">
                        </div>
                        <InputError class="mt-2" :message="form.errors.iban_name"/>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700">Bedrag</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">&euro;</span>
                            </div>
                            <input type="text" name="amount" id="amount"
                                   class="block w-full rounded-md border-gray-300 pl-7 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                   placeholder="0.00" aria-describedby="price-currency" v-model="form.amount">
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                <span class="text-gray-500 sm:text-sm" id="price-currency">EUR</span>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Graag het bedrag invullen zonder punten en
                            komma's. Het bedrag moet een honderdtal zijn.</p>
                        <InputError class="mt-2" :message="form.errors.amount"/>
                    </div>
                </div>
                <div>
                    <div class="flex justify-end">
                        <button
                            type="submit"
                            name="submit"
                            class="w-full block rounded-lg p-3 text-center text-white bg-blue-400"
                        >
                            Opslaan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </GuestLayout>

</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm} from '@inertiajs/inertia-vue3'
import InputError from '@/Components/InputError.vue';

export default {
    name: "CreateInvestment",
    components: {
        GuestLayout,
        InputError
    },
    props: {
        project: Object,
        user: Object,
    },
    setup(props) {
        const form = useForm({
            name: props.user.name,
            email: props.user.email,
            iban: props.user.iban,
            iban_name: props.user.iban_name,
            amount: '',
        })

        function submit() {
            this.form.post(route('investments.store', props.project.data.id), {
                preserveScroll: true
            })
        }

        return {
            form,
            submit,
        }
    }
}
</script>
