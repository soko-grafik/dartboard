<?php
namespace Application\Controller;

use Application\Model\Event;
use Application\Model\Game;
use Application\Model\Hit;
use Ouzo\Controller;

class HitsController extends Controller
{
    public function index()
    {
        $field = $this->params['field'];
        $game = Game::currentGame();
        $currentGameUser = $game->current_game_user;
        if ($currentGameUser->getLeftShoots() !== null) {
            $hit = Hit::createFor($field, $currentGameUser);

            Event::create(['name' => 'hit', 'params' => json_encode([
                'field' => $hit->field,
                'multiplier' => $hit->multiplier,
                'scored' => $hit->isScored(),
                'winner' => $currentGameUser->isWinner(),
            ])]);

        } else {
            Event::create(['name' => 'next_player', 'params' => '']);
        }
    }
}
