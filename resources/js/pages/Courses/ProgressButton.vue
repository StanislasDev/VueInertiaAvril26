<template>
    <div>
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" @click="toggleProgress">
            {{ this.isWatched ? 'Terminé' : 'Terminé ?' }}
        </button>
    </div>
</template>

<script lang="ts">
    // import { router } from '@inertiajs/vue3';
    import axios from 'axios';

    export default {
        props: ['episodeId', 'watchedEpisodes'],

        data() {
            return {
                watchedEp: this.watchedEpisodes,
                isWatched: null, // Initialement null, on déterminera sa valeur dans mounted
            }
        },

        methods: {
            toggleProgress() {
                // Implementation pour marquer l'épisode comme terminé pour l'utilisateur actuel
                // Cela pourrait impliquer une requête API pour enregistrer la complétion dans labase de données
                axios.post('/courses/toggle-progress', {
                // router.post('/courses/toggle-progress', {
                    episodeId: this.episodeId,
                })
                .then(response => {
                    if (response.status === 200) {
                        this.isWatched = !this.isWatched; // Inverser l'état de isWatched
                    }
                })
                .catch(error => {
                    // Gérer les erreurs, par exemple afficher un message d'erreur
                    console.log('Erreur lors du marquage de l\'épisode comme terminé', error);
                })
            },

            isWatchedEpisode() {
                // Vérifier si l'épisode est dans la liste des épisodes regardés par l'utilisateur actuel
                return this.watchedEp.find(episode => episode.id === this.episodeId) ? true : false;
            }
        },

        mounted() {
            this.isWatched = this.isWatchedEpisode();
        },
    }
</script>