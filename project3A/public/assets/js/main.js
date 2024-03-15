'use strict'

// VALIDATE REGISTER

// Password
const password = document.getElementById('password')
const errPassword = document.getElementById('err-password')
password.addEventListener('blur', function() {
    const passwordValue = password.value
    const regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/
    const isValidPassword = regex.test(passwordValue)

    if (!isValidPassword) {
        errPassword.classList.remove('d-none')
        errPassword.innerHTML = 'Mật khẩu phải trên 8 kí tự và bao gồm kí tự số và kí tự đặc biệt!'
    } else {
        errPassword.innerHTML = ''
        errPassword.classList.add('d-none')
    }
})

// Confirm Password
const cfPassword = document.getElementById('cf-password')
cfPassword.addEventListener('blur', function() {
    const errCfPassword = document.getElementById('err-cf-password')
    const isValidCfPassword = document.getElementById('password').value === cfPassword.value

    if (!isValidCfPassword) {
        errCfPassword.classList.remove('d-none')
        errCfPassword.innerHTML = 'Mật khẩu không khớp'
    } else {
        errCfPassword.innerHTML = ''
        errCfPassword.classList.add('d-none')
    }
})

// FullName
const fullName = document.getElementById('fullName')
const errFullName = document.getElementById('err-fullName')
fullName.addEventListener('blur', function() {
    const fullNameValue = fullName.value
    const regex = /[^a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễếệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]/u
    const isValidFullName = regex.test(fullNameValue)

    if (!isValidFullName) {
        errFullName.classList.remove('d-none')
        errFullName.innerHTML = 'Tên không được chứa số'
    } else {
        errFullName.innerHTML = ''
        errFullName.classList.add('d-none')
    }
})

// Phone
const phone = document.getElementById('phone')
const errPhone = document.getElementById('err-phone')
phone.addEventListener('blur', function() {
    const phoneValue = phone.value
    const regex = /^[0-9]{10}$/
    const isValidPhone = regex.test(phoneValue)

    if (!isValidPhone) {
        errPhone.classList.remove('d-none')
        errPhone.innerHTML = 'Số điện thoại phải có 10 số và không tồn tại chữ'
    } else {
        errPhone.innerHTML = ''
        errPhone.classList.add('d-none')
    }
})


// VALIDATE LOGIN

