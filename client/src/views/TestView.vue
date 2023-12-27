<!-- ImageUpload.vue -->

<template>
    <div>
      <input type="file" @change="handleFileChange" />
      <button @click="uploadImage">Upload Image</button>
    </div>
  </template>
  
  <script setup lang="ts">
  import { ref } from 'vue';
  
  const selectedFile = ref<File | null>(null);
  
  const handleFileChange = (event: Event) => {
    const input = event.target as HTMLInputElement;
    if (input.files && input.files.length > 0) {
      selectedFile.value = input.files[0];
    }
  };
  
  const uploadImage = async () => {
    if (selectedFile.value) {
      const formData = new FormData();
      formData.append('image', selectedFile.value);
  
      try {
        // LaravelのAPIエンドポイントにPOSTリクエストを送信
        const response = await fetch('http://127.0.0.1:8000/api/article', {
          method: 'POST',
          body: formData,
        });
  
        if (response.ok) {
          // アップロード成功の処理
          console.log('Image uploaded successfully');
        } else {
          // アップロード失敗の処理
          console.error('Image upload failed');
        }
      } catch (error) {
        console.error('Error during image upload:', error);
      }
    }
  };
  </script>
  