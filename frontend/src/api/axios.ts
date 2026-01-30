import axios from 'axios'

// Use environment variable for API URL
// This allows easy deployment to Netlify/Render without changing code
const apiClient = axios.create({
    baseURL: import.meta.env.VITE_API_URL || 'http://localhost:8000/api',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
    },
})

export default apiClient
