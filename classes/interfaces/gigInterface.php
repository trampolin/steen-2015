<?php

class GigInterface extends BasicInterface {

    public function __construct($db = null) {
        parent::__construct($db);
        $this->table = 'gigs';
    }

}

GigInterface::registerInterface();

