import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import basicSsl from '@vitejs/plugin-basic-ssl'

export default defineConfig({
  server: {
    hmr: {
      host: 'localhost',
    },
  },
  plugins: [
      laravel({
          input: 'resources/js/app.js',
          refresh: true,
      }),
      vue({
          template: {
              transformAssetUrls: {
                  base: null,
                  includeAbsolute: false,
              },
          },
      }),
  ],
});
