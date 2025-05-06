<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

const props = defineProps({
  defaultSkills: Object
})

const form = useForm({
  technical_skills: [],
  soft_skills: [],
  other_technical: '',
  other_soft: ''
})

const submit = () => {
  // Fusionar habilidades seleccionadas + personalizadas
  if (form.other_technical.trim()) {
    form.technical_skills.push(...form.other_technical.split(',').map(skill => skill.trim()))
  }
  if (form.other_soft.trim()) {
    form.soft_skills.push(...form.other_soft.split(',').map(skill => skill.trim()))
  }

  form.post(route('graduate-skills.store'))
}
</script>

<template>
  <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-xl">
    <h2 class="text-2xl font-bold mb-6">Registro de Habilidades del Egresado</h2>

    <form @submit.prevent="submit" class="space-y-6">
      <!-- Habilidades Técnicas -->
      <div>
        <label class="block text-lg font-semibold mb-2">Habilidades Técnicas (Duras)</label>
        <div class="grid grid-cols-2 gap-2">
          <label v-for="skill in props.defaultSkills.technical" :key="skill" class="flex items-center space-x-2">
            <input type="checkbox" :value="skill" v-model="form.technical_skills" />
            <span>{{ skill }}</span>
          </label>
        </div>

        <input
          v-model="form.other_technical"
          type="text"
          placeholder="Otras habilidades técnicas (separa con comas)"
          class="mt-3 w-full border rounded px-3 py-2"
        />
      </div>

      <!-- Habilidades Blandas -->
      <div>
        <label class="block text-lg font-semibold mb-2">Habilidades Interpersonales (Blandas)</label>
        <div class="grid grid-cols-2 gap-2">
          <label v-for="skill in props.defaultSkills.soft" :key="skill" class="flex items-center space-x-2">
            <input type="checkbox" :value="skill" v-model="form.soft_skills" />
            <span>{{ skill }}</span>
          </label>
        </div>

        <input
          v-model="form.other_soft"
          type="text"
          placeholder="Otras habilidades blandas (separa con comas)"
          class="mt-3 w-full border rounded px-3 py-2"
        />
      </div>

      <!-- Botón -->
      <div class="flex justify-end">
        <button
          type="submit"
          class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded"
        >
          Guardar Habilidades
        </button>
      </div>
    </form>
  </div>
</template>
