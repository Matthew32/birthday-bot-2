<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Telegram\Bot\Api;
use Telegram\Bot\Laravel\Facades\Telegram;

class BirthdayBot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:birthday-bot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder of birthdate of friends.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $telegram = new Api(config('telegram.bots.mybot.token'), true);
        $text = '';
        $file = fopen(storage_path('app/cumples.txt'), "r");
        while (!feof($file)) {
            $text .= fgets($file);
        }

        fclose($file);
        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $text,
            'parse_mode' => 'HTML'
        ]);

        return 0;
    }
}
