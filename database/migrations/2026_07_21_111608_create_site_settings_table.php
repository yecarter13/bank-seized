<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        DB::table('site_settings')->insert([
            ['key' => 'whatsapp_number', 'value' => '447123456789'],
            ['key' => 'phone', 'value' => '01634 123 456'],
            ['key' => 'email', 'value' => 'support@auto-part-uk.service-etranger.fr'],
            ['key' => 'address', 'value' => '57a Broadway, Leigh-On-Sea, Essex, England, SS9 1PE'],
            ['key' => 'facebook_url', 'value' => '#'],
            ['key' => 'instagram_url', 'value' => '#'],
            ['key' => 'tiktok_url', 'value' => '#'],
            ['key' => 'twitter_url', 'value' => '#'],
            ['key' => 'opening_hours', 'value' => 'Mon-Fri: 8:00 AM - 6:00 PM'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
