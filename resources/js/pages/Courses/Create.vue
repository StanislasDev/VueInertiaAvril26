<template>
  <div class="min-h-screen bg-gray-50 flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-6 transition-all duration-300 hover:shadow-2xl">

      <!-- Header -->
      <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-900">Créer une formation</h1>
        <p class="text-sm text-gray-500 mt-1">Veuillez entrer les informations de la formation.</p>
      </div>

        <Form class="space-y-5" action="/courses" method="post"
            #default="{
            errors,
            hasErrors,
            processing,
            progress,
            wasSuccessful,
            recentlySuccessful,
            setError,
            clearErrors,
            resetAndClearErrors,
            defaults,
            isDirty,
            reset,
            submit,
            }"
        >

            <!-- TITLE -->
            <div class="relative">
            <input
                name="title"
                type="text"
                placeholder=" "
                class="peer w-full px-3 pt-5 pb-2 rounded-xl border
                    border-gray-300 focus:border-indigo-500
                    focus:ring-2 focus:ring-indigo-100 outline-none transition"
            />
            <label
                class="absolute left-3 top-2 text-xs text-gray-500 transition-all
                    peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm
                    peer-focus:top-2 peer-focus:text-xs peer-focus:text-indigo-600"
            >
                Titre
            </label>

            <p v-if="errors.title" class="text-red-500 text-xs mt-1 animate-pulse">
                {{ errors.title }}
            </p>
            </div>

            <!-- DESCRIPTION -->
            <div class="relative">
            <textarea
                name="description"
                rows="3"
                placeholder=" "
                class="peer w-full px-3 pt-5 pb-2 rounded-xl border
                    border-gray-300 focus:border-indigo-500
                    focus:ring-2 focus:ring-indigo-100 outline-none transition resize-none"
            ></textarea>

            <label
                class="absolute left-3 top-2 text-xs text-gray-500 transition-all
                    peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-sm
                    peer-focus:top-2 peer-focus:text-xs peer-focus:text-indigo-600"
            >
                Description
            </label>

            <p v-if="errors.description" class="text-red-500 text-xs mt-1 animate-pulse">
                {{ errors.description }}
            </p>
            </div>

            <!-- IMAGE -->
            <!-- <div
            class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center
                    hover:border-indigo-400 transition cursor-pointer"
            @click="$refs.file.click()"
            >
            <input ref="file" type="file" class="hidden" @change="handleFile" />

            <div v-if="!preview">
                <p class="text-sm text-gray-500">Ajouter une image</p>
            </div>

            <div v-else class="relative">
                <img :src="preview" class="w-full h-40 object-cover rounded-lg" />
                <button
                type="button"
                @click.stop="removeImage"
                class="absolute top-2 right-2 bg-black/60 text-white px-2 py-1 text-xs rounded"
                >
                ✕
                </button>
            </div>
            </div> -->

            <!-- SUCCESS MESSAGE -->
            <transition name="fade">
            <p v-if="recentlySuccessful" class="text-green-500 text-sm text-center">
                Formation créée avec succès 🎉
            </p>
            </transition>

            <!-- BUTTON -->
            <button
            type="submit"
            :disabled="processing"
            class="w-full flex items-center justify-center gap-2 py-2.5 rounded-xl
                    bg-indigo-600 text-white hover:bg-indigo-700
                    active:scale-[0.98] transition disabled:opacity-50"
            >
            <span >{{ processing ? "Création..." : "Créer la formation" }}</span>
            </button>

        </Form>
    </div>
  </div>
</template>

<script>
import { Form } from '@inertiajs/vue3'

export default {
    components: {
        Form
    }
}
</script>

<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>