<template>
    <div>
        <h1 class="text-2xl font-bold mb-4">Courses</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div v-for="course in courseList" :key="course.id" class="bg-white rounded-lg shadow-md p-4">
                <h2 class="text-xl font-semibold mb-2">{{ course.title }}</h2>
                <p class="text-gray-600 mb-4">{{ course.description }}</p>
                <a :href="`/courses/${course.id}`" class="text-blue-500 hover:underline">View Course</a>
            </div>
        </div>
        
    </div>
</template>

<script>
import AppLayout from '@/layouts/AppLayout.vue';

export default {
    components: {
        AppLayout,
    },

    data() {
        return {
            courseList: this.courses,
        };
    },


    props: ['courses'],

    mounted() {
        console.log(this.courseList);
    },
}
</script>