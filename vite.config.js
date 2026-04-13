import { defineConfig } from 'vite'
import tailwindcss from '@tailwindcss/vite'
import laravel from 'laravel-vite-plugin'
import { wordpressPlugin, wordpressThemeJson } from '@roots/vite-plugin'

export default defineConfig({
  server: {
    host: 'infukongres.local', // 🔁 <-- zmiana z 'localhost'
    port: 5201,
    strictPort: true,
    cors: true,
   /*  origin: 'http://infukongres.local:5180', */

    hmr: {
      protocol: 'ws',
     /*  host: 'infukongres.local', // 🔁 <-- tu też! */
      port: 5201,
    },
  },

  base: '/build/', // 🔁 zgodne z tym, co generuje @vite()

  plugins: [
    tailwindcss(),

    laravel({
      input: [
        'resources/css/app.css',
        'resources/js/app.js',
        'resources/css/editor.css',
        'resources/js/editor.js',
      ],
      refresh: true,
    }),

    wordpressPlugin(),

    wordpressThemeJson({
      disableTailwindColors: false,
      disableTailwindFonts: false,
      disableTailwindFontSizes: false,
    }),
  ],

  resolve: {
    alias: {
      '@scripts': '/resources/js',
      '@styles': '/resources/css',
      '@fonts': '/resources/fonts',
      '@images': '/resources/images',
    },
  },
})
