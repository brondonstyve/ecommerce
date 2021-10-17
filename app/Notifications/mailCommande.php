<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class mailCommande extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nouvelle Commande')
                    ->line("Salut Mr Admin, Une nouvelle commande vient d'être passée par un client")
                    ->line('Code commande: '. $notifiable->codeCom)
                    ->line('Nom: '. $notifiable->nom.' '.$notifiable->prenom)
                    ->line('email: '.$notifiable->email)
                    ->line('Téléphone: '.$notifiable->telephone)
                    ->line('adresse: '.$notifiable->adresse)
                    ->line('Ville Pays: '.$notifiable->ville.' '.$notifiable->pays)
                    ->line('Montant: '.$notifiable->montant_total)
                    ->action(' Voir la commande', url("/commande-Admin"))
                    ->line('Si vous n\'êtes pas à l\'origine de ce mail, bien vouloir l\'ignorer')
                    ->line('Merci!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
