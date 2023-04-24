<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Matt\Birthday\Application\UseCases\Get;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

class BirthdayBot extends Command
{
    protected Get $birthdayGetUseCase;

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
     * @param Get $birthdayGetUseCase
     */
    public function __construct(Get $birthdayGetUseCase)
    {
        parent::__construct();
        $this->birthdayGetUseCase = $birthdayGetUseCase;
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws TelegramSDKException
     */
    public function handle(Get $birthdayGetUseCase)
    {
        $telegram = new Api(config('telegram.bots.mybot.token'), false);

        $birthdays = $birthdayGetUseCase();
        $birthdays = $this->formatBirthdays($birthdays);
        if ($birthdays) {
            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => implode("\r\n", $birthdays),
                'parse_mode' => 'HTML'
            ]);
        }
        return 0;
    }

    protected function formatBirthdays($birthdays)
    {
        return array_map(function ($birthday) {
            return $birthday['name'] . ' ' . Carbon::createFromTimeString($birthday['birthdate'] . ' 00:00:00')->format('d M');
        }, $birthdays);
    }
}
