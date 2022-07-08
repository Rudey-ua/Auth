<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('event', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        $query = "DELIMITER //
        CREATE EVENT cr_purchase
        ON SCHEDULE EVERY '0:01' MINUTE_SECOND
        DO
        BEGIN
            SELECT id, user_id INTO @id, @user_id FROM advertisements
            WHERE time = CURRENT_TIMESTAMP;
            
            IF @id is NOT NULL THEN
                INSERT purchases(advertisement_id, user_id) VALUES(@id, @user_id);
                UPDATE advertisements SET price = (SELECT MAX(price) FROM bids WHERE advertisement_id = @id) WHERE id = @id;
            END IF;
            
        END //
        DELIMITER ;";
        DB::unprepared($query);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("drop event cr_purchase");
    }
};
