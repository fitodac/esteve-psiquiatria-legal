import { defineStore } from "pinia";

export const useModal = defineStore("modal", {
    state: () => ({
        isOpen: false,
        registrationIsOpen: false,
    }),

    actions: {
        open() {
            this.isOpen = true;
        },
        close() {
            this.isOpen = false;
        },
        registrationOpen() {
            this.registrationIsOpen = true;
        },
        registrationClose() {
            this.registrationIsOpen = false;
        },
    },
});
