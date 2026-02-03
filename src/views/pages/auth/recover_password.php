<div class="recover-password-form" x-data="recover_password">
  <div class="card">
    <div class="card-body">
      <h3>Register</h3>
      <input type="email" placeholder="Email..." class="form-control mb-2" x-model="recoverPasswordForm.email" />
      <button class="btn btn-success" @click="handleRecoverPassword">Recover password</button>
      <button class="btn btn-primary" @click="currentForm = 'login'">Back</button>
      <template x-if="loading">
        <div class="spinner-border" role="status">
          <span class="visually-hidden">Loading...</span>
        </div>
      </template>
    </div>
  </div>
</div>