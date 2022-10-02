<?php

namespace App\Console\Commands;

use App\DiceGame\Player;
use Illuminate\Console\Command;

class DiceGameRun extends Command
{
    /**
     * @var string
     */
    protected $signature = 'dice-game:run {--numberOfPlayers=3} {--numberOfDices=4}';

    private array $players;

    /**
     * @var string
     */
    protected $description = 'Running the dice game';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $numberOfPlayer = $this->option('numberOfPlayers');
        $numberOfDices = $this->option('numberOfDices');
        $turn = 1;

        for ($playerIndex = 0; $playerIndex < $numberOfPlayer; $playerIndex += 1) {
            $this->setPlayers([
                ...$this->getPlayers(),
                ...[
                    (new Player(0, $numberOfDices)),
                ],
            ]);
        }

        do {
            $diceResults = [];
            /** @var Player $player */
            foreach ($this->getPlayers() as $player) {

            }
        } while (!$this->gameStop());
        return 0;
    }

    /**
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    /**
     * @param array $players
     */
    public function setPlayers(array $players): void
    {
        $this->players = $players;
    }

    private function gameStop(): bool
    {
        return count(
            array_filter(
                $this->getPlayers(),
                function (Player $player) {
                    return $player->getNumberOfDices();
                },
            )
            ) <= 1;
    }

    private function rollTheDice(): int
    {
        return mt_rand(1, 6);
    }
}
