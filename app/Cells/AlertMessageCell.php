<?php

namespace App\Cells;

use CodeIgniter\View\Cells\Cell;

class AlertMessageCell extends Cell
{
    public $messageType = "ok";
    public $messageHeader;
    public $message;
}
