<template>

    <GuestLayout>
        <form @submit.prevent="submit" class="max-w-md mx-auto mt-36 p-6 shadow-md rounded-lg border space-y-8">

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Naam</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="Naam" v-model="form.name">
                    </div>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="Email" v-model="form.email">
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">IBAN</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="IBAN" v-model="form.iban">
                    </div>
                </div>
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Te naam gestelde</label>
                    <div class="mt-1">
                        <input type="text" name="name" id="name"
                               class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               placeholder="Te naam gestelde" v-model="form.iban_name">
                    </div>
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
                </div>
            </div>
        </form>
    </GuestLayout>

</template>

<script>
import GuestLayout from '@/Layouts/GuestLayout.vue'
import {Inertia} from '@inertiajs/inertia'
import {useForm} from '@inertiajs/inertia-vue3'

export default {
    name: "CreateInvestment",
    components: {
        GuestLayout
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
            this.form.post(route('investments.store'), {
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
