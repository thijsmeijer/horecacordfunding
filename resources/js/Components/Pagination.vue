<template>
    <div v-if="links.length > 3" class="mt-16 flex justify-center">
        <div class="flex flex-wrap">
            <template v-for="(link, k) in links" :key="k">
                <div v-if="link.url === null"
                     class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 shadow-md rounded"
                     v-html="link.label"/>
                <inertia-link v-else
                              class="mr-1 mb-1 px-4 py-3 text-sm leading-4 shadow-md rounded"
                              :class="{ 'bg-blue-400 text-white': link.active }" :href="link.url" v-html="link.label"/>
            </template>
        </div>
    </div>
</template>

<script setup>
import {InertiaLink} from '@inertiajs/inertia-vue3';
</script>

<script>
export default {
    props: {
        links: Array,
    },
}
</script>
