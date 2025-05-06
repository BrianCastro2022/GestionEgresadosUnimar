<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard Coordinador" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-green-800">
                Panel del Coordinador de Egresados
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
                <div class="bg-white p-6 rounded shadow">
                    <p class="text-gray-800">Bienvenido, coordinador.</p>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
