<?php

namespace App\Modules\Matches\Http\Controllers;

use App\Modules\Matches\Match;
use View;
use Widget;

class MatchesWidget extends Widget
{

    public function render(array $parameters = array())
    {
    	$limit = isset($parameters['limit']) ? (int) $parameters['limit'] : self::LIMIT;

        $matches = Match::whereState(Match::STATE_CLOSED)->whereFeatured(true)->orderBy('played_at', 'DESC')->take($limit)->get();

        if ($matches) {
            return View::make('matches::widget', compact('matches'))->render();
        }
    }

}