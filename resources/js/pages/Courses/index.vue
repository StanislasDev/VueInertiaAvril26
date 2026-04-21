<template>
    <Head title="Formations" />
    <div>
        <h1 class="text-2xl font-bold mb-4 ml-4">Les formations</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div v-for="course in courseList" :key="course.id" class="bg-white rounded-lg shadow-md p-4">
                <div class="mb-2">
                    <h2 class="text-xl font-semibold mb-2">{{ course.title }}</h2>
                    <p class="text-gray-500 mb-2">Publié par <label class="font-semibold text-gray-600">{{ course.user.name }}</label></p>
                    <div class="flex justify-between items-center gap-2">
                        <p class="bg-gray-200 py-1 px-2 rounded-full text-sm text-gray-500 mb-1 inline-block hover:bg-gray-300 transition-colors duration-300">{{ course.episodes_count }} Episodes</p>
                        <span class="bg-green-200 py-1 px-2 rounded-full text-sm text-green-500 mb-1 inline-block hover:bg-green-300 transition-colors duration-300">{{ course.participants }} Participant<span v-if="course.participants > 1">s</span></span>
                    </div>
                </div>
                <p class="text-gray-600 mb-4">{{ course.description }}</p>
                <Link :href="`/courses/${course.id}`" class="bg-blue-500 text-white py-2 px-4 font-semibold rounded hover:bg-blue-600 transition-colors duration-300" preserve-scroll>Voir la formation</Link>
            </div>
        </div>
        
    </div>
</template>

<script>
import AppLayout from '@/layouts/AppLayout.vue';
import { Link, Head } from '@inertiajs/vue3';

export default {
    components: {
        AppLayout,
        Link,
        Head,
    },

    props: ['courses'],

    data() {
        return {
            courseList: this.courses,
        };
    },

    mounted() {
        console.log(this.courseList);
    },
}
</script>