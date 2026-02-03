export default function RecoverPasword() {
  return {
    recoverPasswordForm: {
      email: ''
    },
    async handleRecoverPassword() {
      if (this.recoverPasswordForm.email === '') {
        return Swal.fire({
          title: 'Ops!',
          text: 'E-mail is required!',
          icon: 'warning'
        });
      }
      this.loading = true;
      const response = await axios.post('/auth/recover-password', this.recoverPasswordForm);
      if (response.data.success) {
        this.loading = false;
        return Swal.fire({
          title: 'Success!',
          text: `Password recovery email sent to the following email address: ${this.recoverPasswordForm.email}`,
          icon: 'success'
        });
      }
      Swal.fire({
        title: 'Ops!',
        text: `Check address: ${this.recoverPasswordForm.email}`,
        icon: 'error'
      });
      this.loading = false;
    }
  }
}