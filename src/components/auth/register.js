export default function Register() {
  return {
    registerForm: {
      name: '',
      email: '',
      password: ''
    },
    async register() {
      if (
        this.registerForm.name === '' ||
        this.registerForm.email === '' ||
        this.registerForm.password === ''
      ) {
        return Swal.fire({
          title: 'Ops!',
          text: 'Required fields are empty.',
          icon: 'warning'
        });
      }
      this.loading = true;
      const response = await axios.post('/auth/register', this.registerForm);
      if (response.data.success) {
        this.loading = false;
        return Swal.fire({
          title: 'Success!',
          text: 'Registration completed successfully.',
          icon: 'success'
        });
      }
      Swal.fire({
        title: 'Ops!',
        text: 'Registration failed.',
        icon: 'error'
      });
      this.loading = false;
    }
  };
}