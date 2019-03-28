<?php

namespace Database\Migrations;

use App\Utility\Migration;

class PostTable extends Migration{

    public function start() {
        $this->table("posts");
        $this->int("id", false, true);
        $this->primary("id");
        $this->text('post_name', true);
        $this->text('post', true);
        $this->run();
    }
}