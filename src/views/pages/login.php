<section x-data="login" class="login-section">
    <div class="login">
        <template x-if="displayLoginForm" x-transition>
            <div class="signin-form">
                <h3>Login</h3>
                <input type="email" placeholder="Email..." class="form-control mb-2" />
                <input type="password" placeholder="Password..." class="form-control mb-3" />
                <button class="btn btn-success">Login</button>
                <button class="btn btn-primary" @click="displayLoginForm = false">Register</button>
            </div>
        </template>
        <template x-if="!displayLoginForm" x-transition>
            <div class="register-form">
                <h3>Register</h3>
                <input type="text" placeholder="Name..." class="form-control mb-2" />
                <input type="email" placeholder="Email..." class="form-control mb-2" />
                <input type="password" placeholder="Password..." class="form-control mb-3" />
                <button class="btn btn-success">Register</button>
                <button class="btn btn-primary" @click="displayLoginForm = true">Back</button>
            </div>
        </template>
    </div>
</section>