<section x-data="login" class="login-section">
  <div class="login">
    <template x-if="displayLoginForm" x-transition>
      <div class="signin-form">
        <div class="card">
          <div class="card-body">
            <h3>Login</h3>
            <input type="email" placeholder="Email..." class="form-control mb-2" x-model="loginForm.email" />
            <input type="password" placeholder="Password..." class="form-control mb-3" x-model="loginForm.password" />
            <button class="btn btn-success" @click="login">Login</button>
            <button class="btn btn-primary" @click="displayLoginForm = false">Register</button>
            <template x-if="loading">
              <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </template>
          </div>
        </div>
      </div>
    </template>
    <template x-if="!displayLoginForm">
      <? add_template('pages/auth/register') ?>
    </template>
  </div>
</section>