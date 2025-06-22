// Enhanced JavaScript validation for registration form
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('registerForm');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');
    const errorDiv = document.getElementById('passwordError');

    // Create additional error containers for each field
    function createErrorDiv(fieldId) {
        const errorId = fieldId + 'Error';
        if (!document.getElementById(errorId)) {
            const errorDiv = document.createElement('div');
            errorDiv.id = errorId;
            errorDiv.className = 'alert alert-danger d-none mt-1';
            document.getElementById(fieldId).parentNode.appendChild(errorDiv);
        }
        return document.getElementById(errorId);
    }

    // Create error divs for each field
    const usernameError = createErrorDiv('username');
    const emailError = createErrorDiv('email');
    const passwordErrorDiv = createErrorDiv('password');

    // Validation functions
    function validateUsername(value) {
        const errors = [];
        if (!value.trim()) {
            errors.push('Username tidak boleh kosong');
        } else if (value.length < 3) {
            errors.push('Username minimal 3 karakter');
        } else if (value.length > 20) {
            errors.push('Username maksimal 20 karakter');
        } else if (!/^[a-zA-Z0-9_]+$/.test(value)) {
            errors.push('Username hanya boleh mengandung huruf, angka, dan underscore');
        }
        return errors;
    }

    function validateEmail(value) {
        const errors = [];
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!value.trim()) {
            errors.push('Email tidak boleh kosong');
        } else if (!emailRegex.test(value)) {
            errors.push('Format email tidak valid, contoh: aIb0u@example.com');
        }
        return errors;
    }

    function validatePassword(value) {
        const errors = [];
        if (!value) {
            errors.push('Password tidak boleh kosong');
        } else if (value.length < 6) {
            errors.push('Password minimal 6 karakter');
        } else if (!/(?=.*[a-z])/.test(value)) {
            errors.push('Password harus mengandung minimal 1 huruf kecil');
        } else if (!/(?=.*[A-Z])/.test(value)) {
            errors.push('Password harus mengandung minimal 1 huruf besar');
        } else if (!/(?=.*\d)/.test(value)) {
            errors.push('Password harus mengandung minimal 1 angka');
        }
        return errors;
    }

    function validateConfirmPassword(password, confirm) {
        const errors = [];
        if (!confirm) {
            errors.push('Konfirmasi password tidak boleh kosong');
        } else if (password !== confirm) {
            errors.push('Password dan konfirmasi password tidak sama');
        }
        return errors;
    }

    // Display error function
    function displayErrors(errorDiv, errors) {
        if (errors.length > 0) {
            errorDiv.innerHTML = errors.join('<br>');
            errorDiv.classList.remove('d-none');
            return false;
        } else {
            errorDiv.classList.add('d-none');
            return true;
        }
    }

    // Real-time validation on input
    username.addEventListener('input', function () {
        const errors = validateUsername(this.value);
        displayErrors(usernameError, errors);
    });

    email.addEventListener('input', function () {
        const errors = validateEmail(this.value);
        displayErrors(emailError, errors);
    });

    password.addEventListener('input', function () {
        const errors = validatePassword(this.value);
        displayErrors(passwordErrorDiv, errors);

        // Also validate confirm password if it has value
        if (confirmPassword.value) {
            const confirmErrors = validateConfirmPassword(this.value, confirmPassword.value);
            displayErrors(errorDiv, confirmErrors);
        }
    });

    confirmPassword.addEventListener('input', function () {
        const errors = validateConfirmPassword(password.value, this.value);
        displayErrors(errorDiv, errors);
    });

    // Form submission validation
    form.addEventListener('submit', function (e) {
        let isValid = true;

        // Validate all fields
        const usernameErrors = validateUsername(username.value);
        const emailErrors = validateEmail(email.value);
        const passwordErrors = validatePassword(password.value);
        const confirmErrors = validateConfirmPassword(password.value, confirmPassword.value);

        // Display errors
        if (!displayErrors(usernameError, usernameErrors)) isValid = false;
        if (!displayErrors(emailError, emailErrors)) isValid = false;
        if (!displayErrors(passwordErrorDiv, passwordErrors)) isValid = false;
        if (!displayErrors(errorDiv, confirmErrors)) isValid = false;

        // Prevent submission if validation fails
        if (!isValid) {
            e.preventDefault();

            // Focus on first error field
            if (usernameErrors.length > 0) {
                username.focus();
            } else if (emailErrors.length > 0) {
                email.focus();
            } else if (passwordErrors.length > 0) {
                password.focus();
            } else if (confirmErrors.length > 0) {
                confirmPassword.focus();
            }
        }
    });

    // Add visual feedback for valid/invalid fields
    function addFieldValidationClasses() {
        [username, email, password, confirmPassword].forEach(field => {
            field.addEventListener('input', function () {
                // Remove previous classes
                this.classList.remove('is-valid', 'is-invalid');

                // Add appropriate class based on validation
                let errors = [];
                if (this === username) errors = validateUsername(this.value);
                else if (this === email) errors = validateEmail(this.value);
                else if (this === password) errors = validatePassword(this.value);
                else if (this === confirmPassword) errors = validateConfirmPassword(password.value, this.value);

                if (this.value && errors.length === 0) {
                    this.classList.add('is-valid');
                } else if (this.value && errors.length > 0) {
                    this.classList.add('is-invalid');
                }
            });
        });
    }

    // Initialize field validation classes
    addFieldValidationClasses();
});