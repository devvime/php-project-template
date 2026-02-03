import Alpine from "alpinejs";

import Home from "./components/home.js";
import Login from "./components/auth/login.js";
import Register from "./components/auth/register.js";
import RecoverPasword from "./components/auth/recover_password.js";

Alpine.data("home", Home);
Alpine.data("login", Login);
Alpine.data("register", Register);
Alpine.data("recover_password", RecoverPasword);

Alpine.start();