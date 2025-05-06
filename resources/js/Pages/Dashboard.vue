<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center space-x-4">
                <!-- Logo de la universidad -->
                <img
                    src="/images/university-logo.png"
                    alt="Logo Universidad"
                    class="h-10 w-auto"
                />
                <h2 class="text-xl font-semibold leading-tight text-[#0066cc]">
                    Dashboard
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 space-y-6">
                        <p class="text-xl text-gray-600">¡Estás conectado!</p>

                        <!-- Botón para registrar habilidades -->
                        <Link
                            href="/graduate-skills/create"
                            class="inline-block px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] transition"
                        >
                            Registrar Habilidades del Egresado
                        </Link>

                        <!-- Botón para registrar historial laboral -->
                        <Link
                            href="/work-history/create"
                            class="inline-block px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] transition"
                        >
                            Registrar Historial Laboral
                        </Link>

                        <!-- Botón para consultar historial laboral -->
                        <Link
                            href="/work-history"
                            class="inline-block px-6 py-3 text-[#0066cc] ring-1 ring-[#0066cc] rounded-lg hover:bg-[#f2f7ff] focus:outline-none focus-visible:ring-[#005bb5] transition"
                        >
                            Consultar Historial Laboral
                        </Link>

                        <!-- Botón para registrar historial académico -->
                        <Link
                            href="/academic-history/create"
                            class="inline-block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition"
                        >
                            Registrar Historial Académico
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
