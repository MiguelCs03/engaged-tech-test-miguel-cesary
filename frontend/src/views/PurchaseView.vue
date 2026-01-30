<template>
  <div class="purchase-page">
    <div class="purchase-container">
      <button @click="goBack" class="back-button">
        ← Volver
      </button>
      
      <div class="purchase-card card fade-in-up">
        <div class="card-header">
          <h1 class="title">Completa tu Compra</h1>
          <p class="subtitle">Ingresa tus datos para finalizar la compra</p>
        </div>
        
        <form @submit.prevent="handleSubmit" class="purchase-form">
          <div class="input-group">
            <label for="nombre">Nombre *</label>
            <input
              id="nombre"
              v-model="formData.nombre"
              type="text"
              placeholder="Ingresa tu nombre"
              :class="{ error: errors.nombre }"
              required
            />
            <span v-if="errors.nombre" class="error-message">{{ errors.nombre }}</span>
          </div>
          
          <div class="input-group">
            <label for="apellido">Apellido *</label>
            <input
              id="apellido"
              v-model="formData.apellido"
              type="text"
              placeholder="Ingresa tu apellido"
              :class="{ error: errors.apellido }"
              required
            />
            <span v-if="errors.apellido" class="error-message">{{ errors.apellido }}</span>
          </div>
          
          <div class="input-group">
            <label for="correo">Correo Electrónico *</label>
            <input
              id="correo"
              v-model="formData.correo"
              type="email"
              placeholder="ejemplo@correo.com"
              :class="{ error: errors.correo }"
              required
            />
            <span v-if="errors.correo" class="error-message">{{ errors.correo }}</span>
          </div>
          
          <div v-if="successMessage" class="success-message">
            {{ successMessage }}
          </div>
          
          <div v-if="errorMessage" class="error-alert">
            {{ errorMessage }}
          </div>
          
          <button 
            type="submit" 
            class="btn btn-primary btn-submit"
            :disabled="isLoading"
          >
            <span v-if="!isLoading" class="btn-text">Enviar Compra</span>
            <span v-else class="loading-container">
              <span class="loading"></span>
              <span class="btn-text">Procesando...</span>
            </span>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import apiClient from '../api/axios'

const router = useRouter()

const formData = reactive({
  nombre: '',
  apellido: '',
  correo: ''
})

const errors = reactive({
  nombre: '',
  apellido: '',
  correo: ''
})

const isLoading = ref(false)
const successMessage = ref('')
const errorMessage = ref('')

const goBack = () => {
  router.push('/')
}

const validateForm = () => {
  let isValid = true
  
  // Reset errors
  errors.nombre = ''
  errors.apellido = ''
  errors.correo = ''
  
  if (!formData.nombre.trim()) {
    errors.nombre = 'El nombre es requerido'
    isValid = false
  }
  
  if (!formData.apellido.trim()) {
    errors.apellido = 'El apellido es requerido'
    isValid = false
  }
  
  if (!formData.correo.trim()) {
    errors.correo = 'El correo es requerido'
    isValid = false
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(formData.correo)) {
    errors.correo = 'Ingresa un correo válido'
    isValid = false
  }
  
  return isValid
}

const handleSubmit = async () => {
  successMessage.value = ''
  errorMessage.value = ''
  
  if (!validateForm()) {
    return
  }
  
  isLoading.value = true
  
  try {
    const response = await apiClient.post('/purchase', formData)
    
    if (response.data.success) {
      successMessage.value = response.data.message
      // Reset form
      formData.nombre = ''
      formData.apellido = ''
      formData.correo = ''
      
      // Redirect after 3 seconds
      setTimeout(() => {
        router.push('/')
      }, 3000)
    }
  } catch (error: any) {
    if (error.response?.data?.message) {
      errorMessage.value = error.response.data.message
    } else {
      errorMessage.value = 'Error al procesar la compra. Por favor, intenta nuevamente.'
    }
  } finally {
    isLoading.value = false
  }
}
</script>

<style scoped>
.purchase-page {
  width: 100%;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
}

.purchase-container {
  max-width: 600px;
  width: 100%;
}

.back-button {
  background: rgba(255, 255, 255, 0.2);
  backdrop-filter: blur(10px);
  color: white;
  border: 2px solid rgba(255, 255, 255, 0.3);
  padding: 12px 24px;
  border-radius: 50px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  margin-bottom: 25px;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 8px;
}

.back-button:hover {
  background: rgba(255, 255, 255, 0.3);
  transform: translateX(-5px);
}

.purchase-card {
  background: rgba(255, 255, 255, 0.98);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.card-header {
  padding: 40px 40px 30px;
  text-align: center;
  border-bottom: 2px solid #f7fafc;
}

.title {
  font-size: 36px;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 10px;
}

.subtitle {
  font-size: 16px;
  color: #718096;
  font-weight: 500;
}

.purchase-form {
  padding: 40px;
}

.btn-submit {
  width: 100%;
  margin-top: 10px;
}

.loading-container {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
}

.error-alert {
  background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
  color: white;
  padding: 20px 30px;
  border-radius: 15px;
  margin: 20px 0;
  font-weight: 600;
  text-align: center;
  box-shadow: 0 10px 30px rgba(245, 101, 101, 0.3);
  animation: fadeInUp 0.5s ease-out;
}

@media (max-width: 768px) {
  .card-header {
    padding: 30px 25px 20px;
  }
  
  .title {
    font-size: 28px;
  }
  
  .purchase-form {
    padding: 30px 25px;
  }
  
  .back-button {
    padding: 10px 20px;
    font-size: 14px;
  }
}
</style>
