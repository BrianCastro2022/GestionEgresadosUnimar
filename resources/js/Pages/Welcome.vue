<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />
    <div class="bg-[#f0faff] text-black dark:bg-[#121212] dark:text-white">
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-7xl px-6 lg:px-8">
                <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                    <!-- Logo de la universidad -->
                    <div class="flex justify-center lg:col-start-2">
                        <img
                            src="/images/university-logo.png"
                            alt="Logo Universidad"
                            class="h-16 w-auto"
                        />
                    </div>
                </header>

                <main class="mt-6 text-center">
                    <!-- Título y mensaje de bienvenida -->
                    <h1 class="text-4xl font-bold text-[#0066cc]">Bienvenido a la Aplicación de Egresados</h1>
                    <p class="mt-4 text-xl text-gray-600">¡Conectando egresados con nuevas oportunidades!</p>

                    <!-- Botones según autenticación -->
                    <div v-if="canLogin && !$page.props.auth.user" class="mt-8 flex justify-center gap-4">
                        <Link
                            :href="route('login')"
                            class="px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] transition"
                        >
                            Iniciar sesión
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] transition"
                        >
                            Registrarse
                        </Link>
                    </div>

                    <div v-else-if="canLogin && $page.props.auth.user" class="mt-8 flex justify-center">
                        <Link
                            :href="route('dashboard')"
                            class="px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] dark:text-white dark:hover:bg-[#333333] dark:focus-visible:ring-white transition"
                        >
                            Ir al Dashboard
                        </Link>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    <p>Aplicación v{{ laravelVersion }} (PHP v{{ phpVersion }})</p>
                </footer>
            </div>
        </div>
    </div>
</template>
