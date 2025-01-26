<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInEmailRequest;
use App\Services\EmailTest\EmailTestService;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Exception;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;

class EmailTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SignInEmailRequest $request)
    {
        $emailTestService = new EmailTestService();
        
        if($emailTestService->storeEmail($request->email)['signed']) {
            session()->flash('msg', $emailTestService->storeEmail($request->email)['status'] ? 'Seu E-mail já foi adicionado a lista de testes!' : 'Seu E-mail ainda não foi adicionado a lista de testes!');
        } else {
            try {
                $personalRecipient = new class {
                    use Notifiable;
                    public function routeNotificationForMail($notification)
                    {
                        return 'marcosilvawk@gmail.com';
                    }
                };
                
                $details = [
                    'subject' => 'Novo e-mail PMv3',
                    'greeting' => 'E-mail',
                    'body' => 'E-mail: ' . $request->email,
                    'actionText' => 'Clique Aqui',
                    'actionUrl' => url('/'),
                    'thanks' => 'Obrigado por usar nosso aplicativo!'
                ];
                            
                Notification::send($personalRecipient, new EmailNotification($details));
            } catch (Exception $e) {
                Log::error($e);
            }
            session()->flash('msg', 'Seu E-mail foi cadastrado!');
        }

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
