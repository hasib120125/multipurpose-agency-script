import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig(({ command }) => {
    const isProduction = command === 'build';

    return {
        build: {
            commonjsOptions: {
                include: ["tailwind.config.js", "node_modules/**"],
            },
            rollupOptions: {
                output: {
                    manualChunks: {
                        vue: ['vue', 'vue-router', 'pinia'],
                    },
                },
            },
        },
        optimizeDeps: {
            include: ["tailwind-config"],
        },
        plugins: [
            laravel({
                input: {
                    front: [
                        "resources/js/front/app.js",
                        "resources/css/front/app.css",
                    ],
                    admin: [
                        "resources/js/admin/app.js",
                        "resources/css/admin/app.css",
                    ],
                    vendor: [
                        // "resources/js/vendor/accordion/index.js",
                        // "resources/js/vendor/alert/index.js",
                    ],
                    components: [
                        // "resources/js/components/donut-chart/index.js",
                        // "resources/js/components/tiny-slider/index.js",
                    ],
                },
                refresh: true,
            }),
            vue(),
        ],
        resolve: {
            alias: {
                "tailwind-config": path.resolve(__dirname, "./tailwind.config.js"),
            },
            extensions: ['.js', '.json', '.vue'],
        },
    };
});
