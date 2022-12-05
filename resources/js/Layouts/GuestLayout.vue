<template>
    <div>
        <div class="min-h-screen">
            <nav class="sticky top-0 z-50 bg-blue-500">
                <div class="bg-white border-b border-gray-200 shadow">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16 items-center">
                            <div class="flex">
                                <div class="shrink-0 flex items-center">
                                    <Link :href="route('projects.index')">
                                        <h1 class="text-2xl font-bold text-gray-800">Horeca Crowdfunding</h1>
                                    </Link>
                                </div>
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <div class="ml-3 relative space-x-4" v-if="$page.props.auth.user">
                                    <Link :href="route('home')" class="text-slate-800 font-semibold">Home
                                    </Link>
                                    <Link :href="route('projects.index')" class="text-slate-800 font-semibold">Projecten
                                    </Link>
                                    <Link :href="route('dashboard')" class="text-slate-800 font-semibold">Dashboard
                                    </Link>
                                    <Link :href="route('logout')" method="post" class="text-red-400 font-semibold">
                                        Uitloggen
                                    </Link>
                                </div>
                                <div class="ml-3 relative space-x-4" v-else>
                                    <Link :href="route('register')" class="text-slate-800 font-semibold">Registreer
                                    </Link>
                                    <Link :href="route('login')" class="text-slate-800 font-semibold">Inloggen</Link>
                                </div>
                            </div>

                            <div class="sm:hidden">
                                <!--             Hamburger button               -->
                                <button type="button"
                                        @click="toggleMenu"
                                        class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400">
                                    <span class="sr-only">Open main menu</span>
                                    <svg v-if="!showMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 6h16M4 12h16M4 18h16"/>
                                    </svg>
                                    <svg v-if="showMenu" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--        Hamburger menu        -->
                <div v-if="showMenu" class="absolute shadow w-full border-b border-gray-200 z-50 bg-white md:hidden">
                    <div>
                        <div class="flex flex-col">
                            <Link :href="route('home')"
                                  class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                  :class="{'border-blue-400': route().current('home')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                                <span>Home</span>
                            </Link>
                            <Link :href="route('projects.index')"
                                  class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                  :class="{'border-blue-400': route().current('projects.index')}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122"/>
                                </svg>
                                <span>Projecten</span>
                            </Link>
                            <span v-if="$page.props.auth.user">
                                <Link :href="route('dashboard')"
                                      class="p-3 flex border-r-4 text-slate-800 space-x-3 font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 01-1.125-1.125v-3.75zM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-8.25zM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 01-1.125-1.125v-2.25z"/>
                                    </svg>
                                    <span>Dashboard</span>
                                </Link>
                                <Link :href="route('logout')" method="post"
                                      class="p-3 flex border-r-4 text-red-400 space-x-3 font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5"
                                         stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                                    </svg>
                                    <span>Uitloggen</span>
                                </Link>
                            </span>
                            <span v-else>
                                <Link :href="route('register')"
                                      class="p-3 text-slate-800 border-r-4 font-semibold flex space-x-3"
                                      :class="{'border-blue-400': route().current('register')}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                    </svg>
                                    <span>Registreren</span>
                                </Link>
                                <Link :href="route('login')"
                                      class="p-3 text-blue-500 border-r-4 font-semibold flex space-x-3"
                                      :class="{'border-blue-400': route().current('login')}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                                    </svg>
                                    <span>Inloggen</span>
                                </Link>
                            </span>
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header"/>
                </div>
            </header>

            <main>
                <slot/>
            </main>
        </div>
    </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components: {Link},
    data() {
        return {
            showMenu: false
        }
    },
    methods: {
        toggleMenu() {
            this.showMenu = !this.showMenu;
        }
    }
}
</script>
