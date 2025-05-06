<template>
    <AuthenticatedLayout>
      <template #header>
        <div class="flex justify-between items-center">
          <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Historial Laboral
          </h2>
          <button
            @click="goToDashboard"
            class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded"
          >
            Volver al Dashboard
          </button>
        </div>
      </template>
  
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6">
              <table class="min-w-full bg-white">
                <thead>
                  <tr>
                    <th class="py-2 px-4 text-left">Empresa</th>
                    <th class="py-2 px-4 text-left">Cargo</th>
                    <th class="py-2 px-4 text-left">Fecha de inicio</th>
                    <th class="py-2 px-4 text-left">Fecha de fin</th>
                    <th class="py-2 px-4 text-left">Descripción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(work, index) in props.workHistories" :key="index">
                    <td class="py-2 px-4">{{ work.company }}</td>
                    <td class="py-2 px-4">{{ work.position }}</td>
                    <td class="py-2 px-4">{{ work.start_date }}</td>
                    <td class="py-2 px-4">{{ work.end_date || 'Actualidad' }}</td>
                    <td class="py-2 px-4">{{ work.description }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import { defineProps } from 'vue';
  import { router } from '@inertiajs/inertia';
  
  const props = defineProps({
    workHistories: {
      type: Array,
      required: true,
    },
  });
  
  // Navegación al dashboard
  const goToDashboard = () => {
    router.visit(route('dashboard'));
  };
  </script>
  