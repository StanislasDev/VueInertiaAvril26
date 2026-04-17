<script setup lang="ts">
import { useNavigationLoader } from '@/composables/useNavigationLoader';
import { Spinner } from '@/components/ui/spinner';

const { isNavigating } = useNavigationLoader();
</script>

<template>
    <div
        v-if="isNavigating"
        class="fixed inset-0 z-50 flex items-center justify-center bg-slate-950/70 backdrop-blur-sm text-white"
    >
        <div class="flex flex-col items-center gap-3 rounded-3xl bg-slate-900/90 px-6 py-5 shadow-2xl shadow-slate-950/40 ring-1 ring-white/10">
            <Spinner class="size-6 text-white" />
            <p class="text-sm font-medium">Chargement...</p>
        </div>
    </div>
</template>
