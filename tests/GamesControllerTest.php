<?php
declare(strict_types=1);

namespace App\Http\Controllers; //Vi har lagt till denna, annars hittar den ej klassen GamesController

use Auth;
use PHPUnit\Framework\TestCase;

require dirname(__DIR__) . '/app/Http/Controllers/GamesController.php';

final class GameControllerTest extends TestCase
{
    public function testGetGameWithValidValue()
    {
      $getGame = new GamesController();
      /*
      //hämta ut data från viewn eller gör om till api från db
        $getGame = new GamesController();
        print($getGame);
        //$gameData = $getGame->get(1);
        $gamedata = $getGame->get(1);
        error_log($gamedata, 3, "test.txt");
        console.log($gamedata);
        //$this->assertEquals(1, $getGame->get(1));
      */
      $this->assertEquals(1, $getGame->oneTest(1));
    }
}
