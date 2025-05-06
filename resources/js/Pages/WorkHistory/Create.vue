<template>
    <AuthenticatedLayout>
      <template #header>
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
          Registrar Historial Laboral
        </h2>
      </template>
  
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6">
              <form @submit.prevent="submitForm">
                <div>
                  <label for="company" class="block text-sm font-medium text-gray-700">Empresa</label>
                  <input v-model="form.company" type="text" id="company" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                </div>
  
                <div class="mt-4">
                  <label for="position" class="block text-sm font-medium text-gray-700">Cargo</label>
                  <input v-model="form.position" type="text" id="position" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                </div>
  
                <div class="mt-4">
                  <label for="start_date" class="block text-sm font-medium text-gray-700">Fecha de inicio</label>
                  <input v-model="form.start_date" type="date" id="start_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required />
                </div>
  
                <div class="mt-4">
                  <label for="end_date" class="block text-sm font-medium text-gray-700">Fecha de fin</label>
                  <input v-model="form.end_date" type="date" id="end_date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
                </div>
  
                <div class="mt-4">
                  <label for="description" class="block text-sm font-medium text-gray-700">Descripción de funciones</label>
                  <textarea v-model="form.description" id="description" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" rows="4" required></textarea>
                </div>
  
                <div class="mt-6">
                  <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                    Registrar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>
  
  <script setup>
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { useForm } from '@inertiajs/inertia-vue3';
  
  // ✅ Crear el formulario con useForm directamente
  const form = useForm({
    company: '',
    position: '',
    start_date: '',
    end_date: '',
    description: '',
  });
  
  // ✅ Método para enviar el formulario
  const submitForm = () => {
    form.post(route('work-history.store'), {
      onSuccess: () => form.reset(), // Limpiar formulario si la creación fue exitosa
    });
  };
  </script>
  