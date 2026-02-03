export default function Login() {
  return {
    displayLoginForm: true,
    loading: false,
    loginForm: {
      email: '',
      password: ''
    },
    async login() {
      if (
        this.loginForm.email === '' ||
        this.loginForm.password === ''
      ) {
        return Swal.fire({
          title: 'Ops!',
          text: 'Required fields are empty.',
          icon: 'warning'
        });
      }
      this.loading = true;
      const response = await axios.post('/auth/login', this.loginForm);
      if (response.data.token) {
        this.loading = false;
        return location.href = '/app';
      }
      Swal.fire({
        title: 'Ops!',
        text: response.data.message,
        icon: 'warning'
      });
      this.loading = false;
    }
  }
}