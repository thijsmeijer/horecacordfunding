<template>

    <GuestLayout>
        <form @submit.prevent="submit" class="max-w-md mx-auto mt-36 p-6 shadow-md rounded-lg border space-y-8">
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="John Doe" v-model="form.name">
                    </div>
                    <InputError class="mt-2" :message="form.errors.name"/>
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="relative mt-1 rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path
                                    d="M3 4a2 2 0 00-2 2v1.161l8.441 4.221a1.25 1.25 0 001.118 0L19 7.162V6a2 2 0 00-2-2H3z"/>
                                <path
                                    d="M19 8.839l-7.77 3.885a2.75 2.75 0 01-2.46 0L1 8.839V14a2 2 0 002 2h14a2 2 0 002-2V8.839z"/>
                            </svg>
                        </div>
                        <input type="email" name="email" id="email"
                               class="block w-full rounded-md border-gray-300 pl-10 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="johndoe@voorbeeld.nl" v-model="form.email">
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
                               placeholder="John Doe" v-model="form.iban_name">
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
                preserveScroll: true,
                onSuccess: () => {
                    Inertia.reload()
                }
            })
        }

        return {
            form,
            submit,
        }
    }
}
</script>
