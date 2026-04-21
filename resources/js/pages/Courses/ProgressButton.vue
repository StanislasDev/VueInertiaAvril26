<template>
    <div>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" @click="toggleProgress">
            {{ isWatched ? 'Terminé' : 'Terminé ?' }}
        </button>
    </div>
</template>

<script lang="ts">
    import { router } from '@inertiajs/vue3';

    export default {
        props: ['episodeId', 'watchedEpisodes'],

        computed: {
            isWatched() {
                return this.watchedEpisodes.some(episode => episode.id === this.episodeId);
            }
        },

        methods: {
            toggleProgress() {
                router.post('/courses/toggle-progress', {
                    episodeId: this.episodeId,
                }, {
                    preserveScroll: true,
                })
            }
        },
    }
</script>