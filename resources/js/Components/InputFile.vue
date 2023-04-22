<script setup>
import { ref } from 'vue';
import useFileList from '@/Composables/file-list.js';
import { XCircleIcon } from '@heroicons/vue/24/outline';

const { files, fileList, addFiles, removeFile } = useFileList();

const props = defineProps({
    acceptLabel: String,
    disabled: Boolean,
    multiple: Boolean,
    label: String,
    accept: String,
});

const emit = defineEmits(['update:modelValue']);

const input = ref(null);

function broadcastFiles(event) {
    addFiles(event.target.files, props.multiple);
    emit(
        'update:modelValue',
        props.multiple ? fileList.value : fileList.value[0]
    );
}

function discardFile(file) {
    removeFile(file);
    emit(
        'update:modelValue',
        fileList.value.length > 0 ? fileList.value : null
    );
}
</script>

<template>
    <label
        :for="label"
        :class="
            (disabled
                ? 'cursor-not-allowed text-gray-500'
                : 'text-green-600 hover:text-green-700 cursor-pointer',
            'relative text-center rounded-md font-medium focus-within:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2')
        "
    >
        <div
            :class="[
                { 'bg-gray-50': disabled },
                'mt-1 rounded-md border-2 border-dashed border-gray-300 hover:border-green-500 px-2 pt-5 pb-6 hover:bg-green-100 hover:cursor-pointer',
            ]"
        >
            <div class="space-y-1 text-center">
                <svg
                    class="mx-auto h-12 w-12 text-gray-400"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 48 48"
                    aria-hidden="true"
                >
                    <path
                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    />
                </svg>
                <div class="flex justify-center text-sm text-gray-600">
                    <span>Click to upload a file</span>
                    <input
                        :disabled="disabled"
                        ref="input"
                        :id="label"
                        :name="label"
                        :accept="accept"
                        type="file"
                        class="sr-only"
                        :multiple="multiple"
                        @input="broadcastFiles"
                    />
                </div>
                <p class="text-xs text-gray-500">
                    {{ acceptLabel }} each up to 10MB
                </p>
                <div
                    v-for="file in files"
                    class="flex flex-1 items-center justify-between bg-green-100 border border-green-600 rounded-md p-2"
                >
                    <div class="flex space-x-2">
                        <img class="w-10 rounded-md" :src="file.url" />
                        <p class="flex flex-col">
                            <span class="text-left text-sm">{{
                                file.name
                            }}</span>
                            <span class="text-left text-xs">{{
                                file.size
                            }}</span>
                        </p>
                    </div>
                    <XCircleIcon
                        @click="discardFile(file)"
                        class="w-6 text-green-700 hover:cursor-pointer hover:text-green-900"
                    />
                </div>
            </div>
        </div>
    </label>
</template>
