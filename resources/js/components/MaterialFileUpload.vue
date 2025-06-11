<template>
    <div>
        <!-- Основной файл -->
        <div class="mb-4">
            <label>Приложение 1</label>
            <input class="inline-block mt-1 form-control"
                type="file"
                ref="mainFile"
                accept="image/*,.pdf"
                @change="handleFileChange('main')"
            >
            <div v-if="previews.main" class="preview">
                <img v-if="isImage(previews.main)" :src="previews.main.url" width="100">
                <span v-else>{{ previews.main.name }}</span>
            </div>
        </div>

        <!-- Дополнительный файл -->
        <div class="mb-4">
            <label>Приложение 2</label>
            <input class="inline-block mt-1 form-control"
                type="file"
                ref="additionalFile"
                accept="image/*,.pdf"
                @change="handleFileChange('additional')"
            >
            <div v-if="previews.additional" class="preview">
                <img v-if="isImage(previews.additional)" :src="previews.additional.url" width="100">
                <span v-else>{{ previews.additional.name }}</span>
            </div>
        </div>

        <button class="inline-block mt-1 form-control" @click="submitFiles" :disabled="!hasFiles">Сохранить файлы</button>
    </div>
</template>

<script>
export default {
    props: {
        materialId: {
            type: Number,
            required: true
        }
    },
    data() {
        return {
            previews: {
                main: null,
                additional: null
            }
        }
    },
    computed: {
        hasFiles() {
            return this.previews.main !== null
        }
    },
    methods: {
        handleFileChange(type) {
            const fileInput = this.$refs[`${type}File`]
            const file = fileInput.files[0]

            if (!file) return

            this.previews[type] = {
                name: file.name,
                type: file.type,
                url: file.type.startsWith('image/') ? URL.createObjectURL(file) : null
            }
        },
        isImage(file) {
            return file?.type?.startsWith('image/')
        },
        async submitFiles() {
            const formData = new FormData()
            formData.append('material_id', this.materialId)

            if (this.previews.main) {
                formData.append('files[]', this.$refs.mainFile.files[0])
            }
            if (this.previews.additional) {
                formData.append('files[]', this.$refs.additionalFile.files[0])
            }

            try {
                const response = await axios.post('/api/material-files', formData, {
                    headers: {
                        'Authorization': `Bearer ${localStorage.getItem('token')}`,
                        'Content-Type': 'multipart/form-data'
                    }
                })

                this.$emit('upload-success', response.data)
            } catch (error) {
                console.error('Ошибка загрузки файлов:', error)
            }
        }
    }
}
</script>

<style scoped>
.preview {
    margin-top: 10px;
    padding: 10px;
    border: 1px dashed #ccc;
}
</style>
