import { resolve } from 'node:path'
import { defineConfig } from 'vite'

export default defineConfig({
  base: process.env.FIGMA_PUBLIC_URL ? `${process.env.FIGMA_PUBLIC_URL}/` : '/',
  build: {
    rollupOptions: {
      input: {
        login: resolve(__dirname, 'index.html'),
        dashboard: resolve(__dirname, 'dashboard.html'),
        pengaduan: resolve(__dirname, 'pengaduan.html'),
        history: resolve(__dirname, 'history.html'),
      },
    },
  },
  server: {
    host: process.env.FIGMA_DEV_SERVER_HOST || '0.0.0.0',
    port: Number(process.env.PORT || 8443),
    strictPort: true,
  },
  preview: {
    host: process.env.FIGMA_DEV_SERVER_HOST || '0.0.0.0',
    port: Number(process.env.PORT || 8443),
  },
})
