<template>
    <div>
        <h1 class="text-2xl font-bold mb-4 ml-4">{{ course.title }}</h1>

        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="mb-2">
                <p class="text-gray-500 mb-2">Publié par <label class="font-semibold text-gray-600">{{ course.user?.name ?? 'Inconnu' }}</label></p>
                <p class="bg-gray-200 py-1 px-2 rounded-full text-sm text-gray-500 mb-1 inline-block hover:bg-gray-300 transition-colors duration-300">{{ course.episodes?.length ?? 0 }} Episodes</p>
            </div>
            <p class="text-gray-600 mb-4">{{ course.description }}</p>

            <h2 class="text-xl font-semibold mb-2">Episodes</h2>
            <ul>
                <li v-for="episode in course.episodes" :key="episode.id" class="mb-2">
                    <Link :href="`/episodes/${episode.id}`" class="text-blue-500 hover:underline" preserve-scroll>{{ episode.title }}</Link>
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
            };
        },
    }
</script>