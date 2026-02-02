<template x-if="!displayLoginForm" x-transition>
  <div class="register-form">
    <div class="card">
      <div class="card-body">
        <h3>Register</h3>
        <input type="text" placeholder="Name..." class="form-control mb-2" x-model="registerForm.name" />
        <input type="email" placeholder="Email..." class="form-control mb-2" x-model="registerForm.email" />
        <input type="password" placeholder="Password..." class="form-control mb-3" x-model="registerForm.password" />
        <button class="btn btn-success" @click="register">Register</button>
        <button class="btn btn-primary" @click="displayLoginForm = true">Back</button>
        <template x-if="loading">
          <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </template>
      </div>
    </div>
  </div>
</template>