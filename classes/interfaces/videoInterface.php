<?php

class VideoInterface extends BasicInterface {

    public function __construct($db = null) {
        parent::__construct($db);
        $this->table = 'videos';
    }

}

VideoInterface::registerInterface();