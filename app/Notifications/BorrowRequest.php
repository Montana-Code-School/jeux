<?php

namespace App\Notifications;

use App\User;
use App\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BorrowRequest extends Notification
{
    use Queueable;
    use Notifiable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $borrower, Game $game)
    {
        $this->borrower = $borrower;
        $this->game = $game;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->subject('Borrow request.')
                    ->line($this->user->name . ' Would like to borrow a game.')
                    ->action('Allow to borrow game', url('/')) //Need to find where to send notifications
                    ->line('Thank you!');
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
          'friend_id' => $this->borrower->id,
          'friend_name' => $this->borrower->name,
          'user_name' => $this->borrower->username,
          'friend_avatar' => $this->borrower->image,
          'game_id' => $this->game->id,
          'game_name' => $this->game->name,
          'game_image' => $this->game->image
        ];
    }
}
