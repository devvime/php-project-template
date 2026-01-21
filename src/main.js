import Alpine from "alpinejs";

import Home from "./pages/home.js";
import Login from "./pages/login.js";

Alpine.data("home", Home);
Alpine.data("login", Login);

Alpine.start();