<template>
    <div>
        <h1 class="text-2xl font-bold mb-4 ml-4">{{ course.title }}</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="mb-2">
                <p class="text-gray-500 mb-2">Publié par <label class="font-semibold text-gray-600">{{ course.user?.name ?? 'Inconnu' }}</label></p>
                <p class="bg-gray-200 py-1 px-2 rounded-full text-sm text-gray-500 mb-1 inline-block hover:bg-gray-300 transition-colors duration-300">{{ course.episodes?.length ?? 0 }} Episodes</p>
            </div>
            <div class="text-2xl font-bold text-gray-800 mb-4">{{ this.courseShow.episodes?.[this.currentKey]?.title ?? 'Aucun épisode disponible' }}</div>
            <iframe :src="this.courseShow.episodes?.[this.currentKey]?.video_url ?? ''" class="w-full h-[100vh] rounded" :title="this.courseShow.episodes?.[this.currentKey]?.title ?? 'Épisode'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p class="text-gray-600 mb-4">{{ this.courseShow.episodes?.[this.currentKey]?.description ?? 'Aucune description disponible' }}</p>

            <h2 class="text-xl font-semibold mb-2">Episodes</h2>
            <ul v-for="(episode, index) in this.course.episodes" v-bind:key="episode.id" class="mb-2">
                <li class="bg-gray-100 py-2 px-4 rounded hover:bg-gray-200 transition-colors duration-300 flex items-center justify-between">
                    <!-- <Link :href="`/episodes/${episode.id}`" class="text-blue-500 hover:underline" preserve-scroll>{{ episode.title }}</Link> -->
                    épisode n°{{ index + 1 }} - {{ episode.title }}
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2" @click="switchEpisode(index)">Voir l'épisode</button>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    import AppLayout from '@/layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';

    export default {
        components: {
            AppLayout,
            Link,
        },

        props: ['course'],

        data() {
            return {
                courseShow: this.course,
                currentKey: 0,
            };
        },

        methods: {
            switchEpisode(index) {
                this.currentKey = index;

                window.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth',
                });
            }
        },

        mounted() {
            // console.log(this.course);
        },
    }
</script>