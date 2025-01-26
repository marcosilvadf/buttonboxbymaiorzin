<?php
namespace App\Services\EmailTest;

use App\Models\EmailTest;
use Exception;
use Illuminate\Support\Facades\Log;

class EmailTestService {
    /**
     * Salva o e-mail no banco de dados.
     *
     * @param string $email
     * @throws Exception
     */

    public function storeEmail(string $email)
    {
        $state = EmailTest::where('email', $email);
        if ($state->exists()) {
            return ['signed' => true, 'status' => $state->first()->state_test];
        }

        EmailTest::create(['email' => $email]);
        return ['signed' => false, 'status' => false];
    }
}