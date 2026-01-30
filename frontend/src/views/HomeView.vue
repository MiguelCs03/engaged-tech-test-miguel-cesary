<template>
  <div class="product-page">
    <div class="product-card card fade-in-up">
      <div class="product-image-container">
        <img 
          src="/product.png" 
          alt="Premium Product" 
          class="product-image float"
        />
        <div class="gradient-overlay"></div>
      </div>
      
      <div class="product-content">
        <div class="product-badge">PREMIUM</div>
        <h1 class="product-title">Producto Exclusivo</h1>
        <p class="product-description">
          Descubre la mejor experiencia con nuestro producto premium. 
          Diseñado con la más alta calidad y tecnología de vanguardia.
        </p>
        
        <div class="product-features">
          <div class="feature">
            <span class="feature-icon">✨</span>
            <span>Calidad Premium</span>
          </div>
          <div class="feature">
            <span class="feature-icon">🚀</span>
            <span>Tecnología Avanzada</span>
          </div>
          <div class="feature">
            <span class="feature-icon">🎯</span>
            <span>Resultados Garantizados</span>
          </div>
        </div>
        
        <div class="product-price">
          <span class="price-label">Precio Especial</span>
          <span class="price">$299.99</span>
        </div>
        
        <button @click="goToPurchase" class="btn btn-primary btn-purchase">
          <span class="btn-text">Comprar Ahora</span>
          <span class="btn-icon">→</span>
        </button>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { useRouter } from 'vue-router'

const router = useRouter()

const goToPurchase = () => {
  router.push('/purchase')
}
</script>

<style scoped>
.product-page {
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  padding: 40px 20px;
}

.product-card {
  max-width: 450px;
  width: 100%;
  background: rgba(255, 255, 255, 0.98);
  backdrop-filter: blur(20px);
  border: 1px solid rgba(255, 255, 255, 0.3);
}

.product-image-container {
  position: relative;
  width: 100%;
  height: 350px;
  overflow: hidden;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.product-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

.product-card:hover .product-image {
  transform: scale(1.1);
}

.gradient-overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 100px;
  background: linear-gradient(to top, rgba(255, 255, 255, 1), transparent);
}

.product-content {
  padding: 40px 35px;
}

.product-badge {
  display: inline-block;
  background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
  color: white;
  padding: 8px 20px;
  border-radius: 50px;
  font-size: 12px;
  font-weight: 800;
  letter-spacing: 1.5px;
  margin-bottom: 20px;
  box-shadow: 0 5px 15px rgba(245, 87, 108, 0.3);
}

.product-title {
  font-size: 36px;
  font-weight: 800;
  color: #2d3748;
  margin-bottom: 15px;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.product-description {
  font-size: 16px;
  line-height: 1.7;
  color: #718096;
  margin-bottom: 30px;
}

.product-features {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin-bottom: 30px;
}

.feature {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 15px;
  font-weight: 600;
  color: #4a5568;
}

.feature-icon {
  font-size: 24px;
}

.product-price {
  display: flex;
  flex-direction: column;
  margin-bottom: 30px;
  padding: 25px;
  background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
  border-radius: 20px;
  text-align: center;
}

.price-label {
  font-size: 14px;
  font-weight: 600;
  color: #718096;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin-bottom: 8px;
}

.price {
  font-size: 48px;
  font-weight: 800;
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.btn-purchase {
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  font-size: 18px;
  position: relative;
  overflow: hidden;
}

.btn-purchase::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
  transition: left 0.5s;
}

.btn-purchase:hover::before {
  left: 100%;
}

.btn-icon {
  font-size: 24px;
  transition: transform 0.3s ease;
}

.btn-purchase:hover .btn-icon {
  transform: translateX(5px);
}

@media (max-width: 768px) {
  .product-card {
    max-width: 100%;
  }
  
  .product-content {
    padding: 30px 25px;
  }
  
  .product-title {
    font-size: 28px;
  }
  
  .price {
    font-size: 38px;
  }
}
</style>
