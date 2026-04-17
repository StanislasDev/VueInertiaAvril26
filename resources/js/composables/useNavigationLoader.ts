import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const isNavigating = ref(false);

export function initializeNavigationLoader(): void {
    router.on('start', () => {
        isNavigating.value = true;
    });

    const reset = () => {
        isNavigating.value = false;
    };

    router.on('finish', reset);
    router.on('error', reset);
    router.on('cancel', reset);
}

export function useNavigationLoader() {
    return {
        isNavigating,
    };
}
