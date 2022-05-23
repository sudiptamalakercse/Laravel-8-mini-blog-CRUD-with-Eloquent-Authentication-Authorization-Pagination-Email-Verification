@php
$email=old('email');
@endphp

<x-forgot_password_email_field
title='Enter Your Email Address'
heading='Enter Your Email Address'
:email="$email"
userType="blogger"
/>