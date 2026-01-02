<template>
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h3 class="text-lg font-bold text-gray-800">{{ reference }}</h3>
                <p class="text-sm text-gray-600">{{ date }}</p>
            </div>
            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-xs font-semibold">
                {{ status }}
            </span>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 mb-2"><strong>Description:</strong></p>
            <p class="text-sm text-gray-600">{{ description }}</p>
        </div>
        <div class="mb-4">
            <p class="text-gray-700 mb-2"><strong>Adresse:</strong></p>
            <p class="text-sm text-gray-600">{{ adress }}</p>
        </div>
        <div class="mb-4">
            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-xs" v-for="option in options">{{ option
                }}</span>
        </div>
        <div class="mb-4 p-3 bg-gray-50 rounded">
            <p class="text-xs text-gray-600 mb-1">Offres reçues:</p>
            <p class="text-sm font-semibold text-gray-800">{{ (offersCount > 0) ? offersCount + " offres(prix masqué)" :
                "aucun offer" }}
            </p>
        </div>
        <div class="flex space-x-2">
            <a href="commande-livreur-detail.html?id=4"
                class="flex-1 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition text-center">
                Voir détails
            </a>
            <button class="px-4 py-2 border border-indigo-600 text-indigo-600 rounded-lg hover:bg-indigo-50 transition">
                <FontAwesomeIcon :icon="faPaperPlane" />
            </button>
        </div>
    </div>
</template>

<script setup lang="ts">
import { faPaperPlane } from '@fortawesome/free-regular-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
defineProps<{
    reference: string
    date: string
    status: string
    adress: string
    description: string
    offersCount: number
    options: Array<string>
}>()

</script>