<?php
//creado por mi-> config/app para cambiar el idionma a ingles solo colocar en
return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    // Mensajes generales de autenticación
    'failed' => 'Estas credenciales no coinciden con nuestros registros.',
    'throttle' => 'Demasiados intentos de inicio de sesión. Por favor, inténtalo de nuevo en :seconds segundos.',

    // Mensajes de validación de contraseñas
    'password' => 'La contraseña proporcionada es incorrecta.',
    'password_required' => 'El campo de contraseña es obligatorio.',
    'password_min' => 'La contraseña debe tener al menos :min caracteres.',
    'password_max' => 'La contraseña no debe tener más de :max caracteres.',
    'password_confirmed' => 'La confirmación de contraseña no coincide.',
    'password_strength' => 'La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial.',

    // Mensajes de validación de correos electrónicos
    'email_required' => 'El campo de correo electrónico es obligatorio.',
    'email_email' => 'El correo electrónico debe ser una dirección de correo válida.',
    'email_unique' => 'El correo electrónico ya ha sido registrado.',

    // Mensajes de validación de nombres de usuario
    'username_required' => 'El campo de nombre de usuario es obligatorio.',
    'username_unique' => 'El nombre de usuario ya ha sido registrado.',
    'username_alpha_num' => 'El nombre de usuario sólo puede contener letras y números.',
    'username_min' => 'El nombre de usuario debe tener al menos :min caracteres.',
    'username_max' => 'El nombre de usuario no debe tener más de :max caracteres.',
    'username_regex' => 'El formato del nombre de usuario es inválido.',

    // Mensajes de validación de nombres
    'name_required' => 'El campo de nombre es obligatorio.',
    'name_alpha_spaces' => 'El nombre sólo puede contener letras y espacios.',
    'name_min' => 'El nombre debe tener al menos :min caracteres.',
    'name_max' => 'El nombre no debe tener más de :max caracteres.',

    // Mensajes de validación de avatares
    'avatar_image' => 'El avatar debe ser una imagen.',
    'avatar_max' => 'El avatar no debe tener más de :max kilobytes.',
    'avatar_dimensions' => 'El avatar debe tener al menos :widthx:height píxeles.',

    // Mensajes de validación de tokens
    'token_invalid' => 'El token proporcionado es inválido.',
    'token_expired' => 'El token ha expirado.',
    'token_not_found' => 'No se encontró el token.',

    // Mensajes para verificación de correo electrónico
    'verification_email_sent' => 'Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.',
    'verification_check_email' => 'Antes de continuar, por favor verifica tu correo electrónico para obtener un enlace de verificación.',
    'verification_check_spam' => 'Si no has recibido el correo electrónico, un nuevo enlace de verificación puede ser enviado a tu dirección.',
    'verification_resend' => 'Reenviar correo de verificación',

    // Mensajes para restablecimiento de contraseña
    'reset_link_sent' => '¡Hemos enviado por correo electrónico el enlace para restablecer tu contraseña!',
    'reset_check_email' => 'Antes de continuar, por favor verifica tu correo electrónico para obtener un enlace para restablecer tu contraseña.',
    'reset_token_invalid' => 'Este token para restablecer la contraseña es inválido.',
    'password_reset' => '¡Tu contraseña ha sido restablecida!',
    'password_updated' => 'Tu contraseña ha sido actualizada.',
    'password_update_failed' => 'Error al actualizar la contraseña.',

    // Otros mensajes de autenticación
    'logged_in' => '¡Has iniciado sesión!',
    'logged_out' => '¡Has cerrado sesión!',
    'unauthorized' => 'Acción no autorizada.',
    '2fa_required' => 'Se requiere autenticación de dos factores para esta cuenta.',
    '2fa_invalid' => 'Código de autenticación de dos factores inválido.',
    'socialite_invalid_state' => 'Estado de socialite inválido.',
    'socialite_email_exists' => 'Este correo electrónico ya está registrado con otra cuenta.',
];
