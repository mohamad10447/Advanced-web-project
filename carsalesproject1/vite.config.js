// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    laravel({
      input: [
        'resources/css/main.css',
        'resources/js/main.js',
      ],
      refresh: true,
    }),
  ],
  server: {
    port: 8000,  // Set Vite server to use port 8000
    open: true,   // Automatically open the browser
    strictPort: true,  // If true, will prevent using a different port
  },
});
