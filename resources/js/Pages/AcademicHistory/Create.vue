<script setup>
import { Head, useForm } from '@inertiajs/vue3';

const form = useForm({
    institution: '',
    study_type: 'Pregrado',
    completion_date: '',
});

function submit() {
    form.post(route('academic-history.store'));
}
</script>

<template>
    <Head title="Registrar Historial Académico" />
    <div class="max-w-2xl mx-auto py-10">
        <h1 class="text-2xl font-bold mb-6">Registrar Historial Académico</h1>

        <form @submit.prevent="submit" class="space-y-6">
            <div>
                <label class="block font-semibold">Institución</label>
                <input v-model="form.institution" type="text" class="w-full rounded border p-2" required />
            </div>

            <div>
                <label class="block font-semibold">Tipo de Estudio</label>
                <select v-model="form.study_type" class="w-full rounded border p-2" required>
                    <option>Pregrado</option>
                    <option>Posgrado</option>
                    <option>Certificación</option>
                    <option>Otro</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold">Fecha de Finalización</label>
                <input v-model="form.completion_date" type="date" class="w-full rounded border p-2" required />
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Guardar
            </button>
        </form>
    </div>
</template>
