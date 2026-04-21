<template>
    <div>
        <div class="bg-gray-200 rounded-full shadow-lg mb-6 w-full text-center">
            <div class="bg-gradient-to-r from-green-400 to-green-600 h-6 rounded-full overflow-hidden text-sm font-bold text-white flex items-center justify-center transition-width duration-500" :style="{ width: percentage + '%' }">
                <span class="drop-shadow">{{ percentage }}%</span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['watchedEpisodes', 'episodes'],

        computed: {
            percentage() {
                if (!this.episodes.length) return 0;

                let filteredEp = this.episodes.filter(courseEp => {
                    return this.watchedEpisodes.find(watchedEp => {
                        return watchedEp.id === courseEp.id;
                    });
                });

                return Math.ceil(filteredEp.length / this.episodes.length * 100);
            }
        },
    }
</script>