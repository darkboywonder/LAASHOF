import { ref } from 'vue';

export default function () {
    const files = ref([]);
    const fileList = ref(null);

    function addFiles(newFiles, allowMultiple) {
        let newUploadableFiles = [...newFiles]
            .map((file) => new UploadableFile(file))
            .filter((file) => !fileExists(file.id));

        files.value = allowMultiple
            ? files.value.concat(newUploadableFiles)
            : newUploadableFiles;

        fileList.value = files.value.map((item) => item.file);
    }

    function fileExists(otherId) {
        return files.value.some(({ id }) => id === otherId);
    }

    function removeFile(file) {
        const index = files.value.indexOf(file);

        if (index > -1) {
            files.value.splice(index, 1);
            fileList.value = files.value.map((item) => item.file);
        }
    }

    return { files, fileList, addFiles, removeFile };
}

class UploadableFile {
    constructor(file) {
        this.file = file;
        this.name = file.name;
        this.size = this.returnFileSize(file.size);
        this.id = `${file.name}-${file.size}-${file.lastModified}-${file.type}`;
        this.url = URL.createObjectURL(file);
        this.status = null;
    }

    returnFileSize(number) {
        if (number < 1024) {
            return `${number} bytes`;
        } else if (number >= 1024 && number < 1048576) {
            return `${(number / 1024).toFixed(1)} KB`;
        } else if (number >= 1048576) {
            return `${(number / 1048576).toFixed(1)} MB`;
        }
    }
}
