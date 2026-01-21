import Alpine from "alpinejs";

import Home from "./components/home.js";
import Login from "./components/login.js";

Alpine.data("home", Home);
Alpine.data("login", Login);

Alpine.start();