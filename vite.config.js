import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/js/app.js",
                "resources/sass/Вход.scss",
                "resources/sass/Главная.scss",
                "resources/sass/Контакты.scss",
                "resources/sass/О-нас.scss",
                "resources/sass/bb.scss",
                "resources/sass/cart.scss",
                "resources/sass/create.scss",
                "resources/sass/shop.scss",
                "resources/sass/show.scss",
                "resources/sass/table.scss",
            ],
            refresh: true,
        }),
    ],
});
