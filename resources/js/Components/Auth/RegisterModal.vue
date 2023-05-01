<script setup>
import EmailConfirmation from '@/Pages/EmailConfirmation.vue';
import { useModal } from "@/store/modalStore.js";
import { storeToRefs } from "pinia";

const modal = useModal();
const { registrationIsOpen } = storeToRefs(modal);

</script>

<template>
    <div v-if="registrationIsOpen" class="fixed z-100 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
        aria-modal="true" id="modal">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity modal-mask" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <button type="button" @click="modal.registrationClose()" class="bg-white rounded-md p-2
                        inline-flex items-center justify-center
                        text-gray-400 hover:text-gray-500
                        hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500
                        absolute top-0 right-0 h-16">
                    <span class="sr-only">Close menu</span>
                    <!-- Heroicon name: outline/x -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <EmailConfirmation />
            </div>
        </div>
    </div>
</template>
