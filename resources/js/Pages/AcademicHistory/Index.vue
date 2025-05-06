<script setup>
import { Head } from '@inertiajs/vue3';
defineProps({ histories: Array });
</script>

<template>
    <Head title="Historial Académico" />
    <div class="max-w-4xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Mi Historial Académico</h1>

        <div v-if="histories.length === 0" class="text-gray-600">
            No has registrado historial académico aún.
        </div>

        <ul v-else class="space-y-4">
            <li
                v-for="(item, index) in histories"
                :key="index"
                class="border rounded p-4 shadow-sm bg-white"
            >
                <p><strong>Institución:</strong> {{ item.institution }}</p>
                <p><strong>Tipo:</strong> {{ item.study_type }}</p>
                <p><strong>Finalizado:</strong> {{ new Date(item.completion_date).toLocaleDateString() }}</p>

                <!-- Botones de acción -->
                <div class="mt-4 flex space-x-2">
                    <button class="text-blue-600 hover:underline">Editar</button>
                    <button class="text-red-600 hover:underline">Eliminar</button>
                </div>
            </li>
        </ul>
    </div>
</template>
