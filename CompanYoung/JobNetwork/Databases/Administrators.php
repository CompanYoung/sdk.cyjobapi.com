<?php

namespace App\CompanYoung\JobNetwork\Databases;

use App\CompanYoung\Call;

class Administrators
{
    private $organizationId = 0;

    function __construct($organizationId)
    {
        $this->organizationId = $organizationId;
    }

    /**
     * Get data
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param string $email
     * @return array
     */
    public function sendResetLink($email)
    {
        return Call::communicate('POST', [
            "administrators/send-reset-link" => [
                'email' => $email
            ]
        ]);
    }

    public function sendInviteMail($email, $newAdmin)
    {
        return Call::communicate('POST', [
            "organizations/$this->organizationId/administrators/send-invite-mail" => [
                'email' => $email,
                'new_admin' => $newAdmin
            ]
        ]);
    }
    /**
     * Get data
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param string $token
     * @param string $password
     * @param string $passwordConfirmation
     * @return array
     */
    public function resetPassword($token, $password, $passwordConfirmation)
    {
        return Call::communicate('POST', [
            "administrators/reset-password" => [
                'pass_token' => $token,
                'password' => $password,
                'password_confirmation' => $passwordConfirmation,
            ]
        ]);
    }

    /**
     * Get data
     *
     * @link https://github.com/CompanYoung/docs.cyjobapi.com/blob/master/endpoints/users/POST_users_send_reset_link.md
     * @param string $email
     * @return array
     */
    public function validatePasswordResetToken($token)
    {
        return Call::communicate('POST', [
            "administrators/validate-reset-password-token" => [
                'token' => $token
            ]
        ]);
    }
}