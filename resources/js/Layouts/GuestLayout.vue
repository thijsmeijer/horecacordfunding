<script setup>
import {Link} from '@inertiajs/inertia-vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="p-12 w-full flex justify-between">
            <h1 class="text-2xl font-bold text-gray-700">Horeca Crowdfunding</h1>
            <div class="flex space-x-4">
                <Link href="/login" class="text-sm text-gray-700 underline">Login</Link>
                <Link href="/register" class="text-sm text-gray-700 underline">Register</Link>
            </div>
        </div>

        <slot/>
    </div>
</template>
