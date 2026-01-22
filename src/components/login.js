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
      this.loading = true;
    },
    async register() {
      this.loading = true;
      const response = await axios.post('/auth/register', this.registerForm);

      if (response.data.success) {
        Swal.fire({
          title: 'Success!',
          text: 'Registration completed successfully.',
          icon: 'success'
        });
        this.displayLoginForm = true;
        this.loading = false;
        return
      }

      Swal.fire({
        title: 'Error!',
        text: 'Login failed. Please check your credentials.',
        icon: 'error'
      });

      this.loading = false;
    }
  }
}