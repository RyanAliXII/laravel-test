import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/todos/create.js",
                "resources/js/todos/edit.js",
                "resources/js/todos/index.js",
            ],
            refresh: true,
        }),
    ],
});
