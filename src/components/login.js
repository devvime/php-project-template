export default function Login() {
  return {
    displayLoginForm: true,
    loading: false,
    loginForm: {
      email: '',
      password: ''
    },
    registerForm: {
      name: '',
      email: '',
      password: ''
    },
    async login() {
      if (this.loginForm.email === '' || this.loginForm.password === '') {
        return Swal.fire({
          title: 'Error!',
          text: 'Required fields are empty.',
          icon: 'warning'
        });
      }
      this.loading = true;
      const response = await axios.post('/auth/login', this.registerForm);
      if (response.data.token) {
        this.loading = false;
        location.href = '/app';
      }
      Swal.fire({
        title: 'Error!',
        text: response.data.message,
        icon: 'warning'
      });
      this.loading = false;
    },
    async register() {
      if (this.registerForm.name === '' || this.registerForm.email === '' || this.registerForm.password === '') {
        return Swal.fire({
          title: 'Error!',
          text: 'Required fields are empty.',
          icon: 'warning'
        });
      }
      this.loading = true;
      const response = await axios.post('/auth/register', this.registerForm);
      if (response.data.success) {
        this.displayLoginForm = true;
        this.loading = false;
        return Swal.fire({
          title: 'Success!',
          text: 'Registration completed successfully.',
          icon: 'success'
        });
      }
      Swal.fire({
        title: 'Error!',
        text: 'Registration failed.',
        icon: 'error'
      });
      this.loading = false;
    }
  }
}